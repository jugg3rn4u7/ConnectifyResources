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

	 $emailid = $_POST["email"];
   $q1 = $_POST["q1"];
   $a1 = $_POST["a1"];
   $q2 = $_POST["q2"];
	 $a2 = $_POST["a2"];
   $q3 = $_POST["q3"];
   $a3 = $_POST["a3"];
 
   $getUserId = "select user_id from connectifydb.user where user_email='". $emailid ."'";
   $result = mysqli_query($link,$getUserId);

   while ($row = mysqli_fetch_row($result)) {
      $output["userid"] = $row[0];
    }

    $getQuestionid = "select sq.question_id from security_questions sq where sq.question in ('". $q1 ."', '". $q2 ."', '". $q3 ."')";
    $result1 = mysqli_query($link,$getQuestionid);

    $index = 0;

    while ($row = mysqli_fetch_row($result1)) {
      $output1[$index++] = $row[0];
    }
    
    $i1 = "insert into connectifydb.user_security values(". $output["userid"] .",". $output1[0] .",'". $a1 ."')";
    mysqli_query($link,$i1);

    $i2 = "insert into connectifydb.user_security values(". $output["userid"] .",". $output1[1] .",'". $a2 ."')";
    mysqli_query($link,$i2);

    $i3 = "insert into connectifydb.user_security values(". $output["userid"] .",". $output1[2] .",'". $a3 ."')";
    mysqli_query($link,$i3);

    $res["result"] = "Security questions set"; 

    print(json_encode($res));
?>

</html>
