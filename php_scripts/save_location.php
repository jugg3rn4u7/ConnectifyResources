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
     $lat = $_POST["lat"];
	 $lng = $_POST["lng"];
	 echo $lat."<br>";
	 echo $lng;
   
   $query = "UPDATE user SET lat='$lat',lng='$lng' where user_id='$user_id';";
   $result = mysqli_query($link,$query);
  
   $count = mysqli_affected_rows($link);
   echo $count;
   echo $result;
   
    if($count > 0)
     {
       $output["update"] = "Add location Success"; 
     }
     else
     {
       $output["update"] = "Add location Failed"; 
     }

     print(json_encode($output));
?>