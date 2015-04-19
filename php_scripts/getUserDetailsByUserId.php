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

	 $user_id= $_POST["user_id"];
   
   $query = "select * FROM connectifydb.user where user_id = '$user_id'";

   $result = mysqli_query($link,$query);

   $count = mysqli_affected_rows($link);
  
   while ($row = mysqli_fetch_row($result)) 
   {
      $output["userId"] = $row[0];
      $output["firstName"] = $row[1];
      $output["lastName"] = $row[2];
      $output["email"] = $row[3];
      $output["lat"] = $row[5];
      $output["long"] = $row[6];
   }

   $output["result"] = "Get UserDetails";
   
    if($count > 0)
     {
       $output["UserDetails"] = "Success"; 
     }
     else
     {
       $output["UserDetails"] = "Failed"; 
     }

     print(json_encode($output));
?>