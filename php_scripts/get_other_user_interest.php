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
   
   $query = "SELECT interests FROM user_interest where user_id='$user_id'";
   $result = mysqli_query($link,$query);
  
   $count = mysqli_affected_rows($link);
   
    if($count > 0)
     {
	     $output["result"] = "Get other user interest success";

       if ($_REQUEST["flag"] == 1) {
          $output["result"] = "Get other user interest success - notification";
       }

       while ($row = mysqli_fetch_row($result)) {
    			 $output["interests"] = $row[0];
    		}
     }
     else
     {
       $output["interests"] = "Get other user interest Failed - notification"; 
     }

     print(json_encode($output));
?>