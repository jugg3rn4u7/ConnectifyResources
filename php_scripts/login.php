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
	 $username = $_POST["username"];
     $password = $_POST["password"];
   
   $query = "SELECT * FROM user WHERE user_email = '$username' AND password = '$password' LIMIT 1;";
   $result = mysqli_query($link,$query);
  
   $count = mysqli_affected_rows($link);
   
    if($count > 0)
     {
		$output["select"] = "Login Success"; 
		while ($row = mysqli_fetch_row($result)) {
			$output["userid"] = $row[0];
			$output["user_Fname"] = $row[1];
			$output["user_Lname"] = $row[2];
			$output["user_email"] = $row[3];
		}
         
     }
     
     else
     {
       $output["select"] = "Login Failed";
     }

     print(json_encode($output));
?>