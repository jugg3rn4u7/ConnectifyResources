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
   
$query = "SELECT u.user_id, CONCAT(u.user_FirstName,' ',u.user_LastName) as username 
FROM connectifydb.user_friends f, connectifydb.user u where f.friend_id = u.user_id and f.user_id = '$user_id'";

$result = mysqli_query($link,$query);

$count = 0;

$output["q"] = "Get Friends List";

while ($row = mysqli_fetch_row($result)) 
{
  $output["friends"][$count]["userId"] = $row[0];
  $output["friends"][$count]["username"] = $row[1];

  $count++;
}

$output["result"] = "success";

print(json_encode($output));
?>