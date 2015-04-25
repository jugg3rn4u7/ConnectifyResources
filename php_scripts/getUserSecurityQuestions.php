<?php
// PHP variable to store the host address
$dbhost = 'connectifydbinstance.cl7ia31oqlit.us-east-1.rds.amazonaws.com';

// PHP variable to store the username
$username = 'connectify';

// PHP variable to store the password
$password = 'password123';

// PHP variable to store the Database name  
$dbname = 'connectifydb';

  $link = mysqli_connect($dbhost, $username, $password, $dbname, 5555);
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $email_id = $_POST["email_id"];

  $query = "select security_questions.question, user_security.security_answer" .
   " FROM connectifydb.user_security, connectifydb.security_questions" .
   " where user_security.question_id = security_questions.question_id and user_id = " .
   "(select user_id FROM connectifydb.user where user_email = '$email_id')";
   
   $result = mysqli_query($link,$query);
  
   $count = mysqli_affected_rows($link);

   $output["tag"] = "Get Security Questions";
   
    if($count > 0)
    {
        $counter = 0;
        $output["result"] = "success";
        while ($row = mysqli_fetch_row($result)) 
        {
          $output["questionaire"][$counter]["q"] = $row[0];
          $output["questionaire"][$counter]["a"] = $row[1];
          $counter++;
        }

        $query = "select password from connectifydb.user where user_email = '$email_id'";
        $result = mysqli_query($link,$query);
        while ($row = mysqli_fetch_row($result)) 
        {
          $output["password"] = $row[0];
        }
   
    }     
    else
    {
       $output["result"] = "failed"; 
    }

     print(json_encode($output));
?>