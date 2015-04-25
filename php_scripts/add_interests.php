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
	 $user_id = $_POST["user_id"];
     $interests = $_POST["selected_interests"];
	 echo $interests;
   
   $query = "INSERT INTO user_interest VALUES ('$user_id','$interests');";
   $result = mysqli_query($link,$query);
  
   $count = mysqli_affected_rows($link);
   echo $count;
   echo $result;
   
    if($count > 0)
     {
       $output["insert"] = "Add interest Success"; 
     }
     else
     {
       $output["insert"] = "Add interest Failed"; 
     }

     print(json_encode($output));
?>