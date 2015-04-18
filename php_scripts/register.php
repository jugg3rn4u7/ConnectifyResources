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

     $firstname = $_POST["firstname"];
     $lastname = $_POST["lastname"];
     $password = $_POST["password"];
	   $emailid= $_POST["emailid"];
   
   $query = "INSERT INTO user(user_FirstName, user_LastName, user_email, password ) VALUES ('$firstname','$lastname','$emailid','$password');";

   $result = mysqli_query($link,$query);
  
   $count = mysqli_affected_rows($link);

   $query = "select user_id FROM user where user_email = '$emailid'";
   $result = mysqli_query($link,$query);
   while ($row = mysqli_fetch_row($result)) 
   {
      $output["user_id"] = $row[0];
   }
   
    if($count > 0)
     {
       $output["insert"] = "Register Success"; 
     }
     else
     {
       $output["insert"] = "Register Failed"; 
     }

     print(json_encode($output));
?>