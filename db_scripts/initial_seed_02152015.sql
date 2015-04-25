CREATE DATABASE IF NOT EXISTS connectify;


CREATE TABLE IF NOT EXISTS connectify.user
(
    user_id int NOT NULL,
    user_FirstName varchar(255),
    user_LastName varchar(255),
    user_email varchar(255),
    PRIMARY KEY (user_id)
); 


CREATE TABLE IF NOT EXISTS connectify.interest
(
   interest_id int NOT NULL,
   interest_name varchar(255),
   interest_image blob,
   PRIMARY KEY (interest_id)
);


CREATE TABLE IF NOT EXISTS connectify.media
(
  user_id int,
  user_image blob,
  FOREIGN KEY (user_id) REFERENCES connectify.user(user_id)  
);


CREATE TABLE IF NOT EXISTS connectify.user_interest
(
user_id int,
interest_id int,
FOREIGN KEY (user_id) REFERENCES connectify.user(user_id),
FOREIGN KEY (interest_id) REFERENCES connectify.interest(interest_id)
);


INSERT INTO connectify.interests
(interest_id,interest_name,interest_image)
VALUES
(1,'cricket',LOAD_FILE('D:/cricket.jpg'));


select interest_image from connectify.interest;

INSERT INTO connectify.interest
(interest_id,interest_name)
VALUES(1,'cricket');

UPDATE connectify.interest
SET interest_image = LOAD_FILE('C:/stuff/cricket.jpg')
WHERE interest_id = 1;