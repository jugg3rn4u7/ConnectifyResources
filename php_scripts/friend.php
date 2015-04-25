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

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
	    
$user_id = $_POST["user_id"];
$other_user_id = $_POST["other_user_id"];
	 
$query = "INSERT INTO connectifydb.user_friends VALUES ('$user_id','$other_user_id')";
$result = mysqli_query($link,$query);
  
$count = mysqli_affected_rows($link);
   
if($count > 0) 
{
  $output["result"] = "Add friend success"; 
} else
{
  $output["result"] = "Add friend failed"; 
}

print(json_encode($output));
?>