<html>

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
   
  $query = "select * from connectifydb.interest;";
  $result = mysqli_query($link,$query);

  $count = 0;

    while ($row = mysqli_fetch_row($result)) 
    {
      $output[$count]["interest_id"] = $row[0];
      $output[$count]["interest_name"] = $row[1];
      $output[$count]["interest_text"] = $row[2];

      $count++;
    }

  print(json_encode($output));
?>

</html>