<?php 
 
    $dbhost = "localhost";
    $dbuser="root";
    $dbpass="";
    $db="chungu";
$mysqli_query($dbhost,$dbuser,$dbpass);
    $conn=mysqli_connect_db($db);

//if($conn->connect_error){
	//echo"Error-404";

//}else{
//	echo"connected";
//}

$username =$_POST['username'];
$password =$_POST['password'];

    $sql="SELECT * FROM log WHERE username ='$username' AND password ='$password'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	if($row['username'] == $username && $row['password'] == $password){
		echo"login successfully";
	}
	else{
		echo"Access denied!";
	}
	exit();
?>


	
