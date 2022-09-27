<?php
    session_start();
    $server = "localhost";
    $username="root";
    $password="";
    $dbname="qrcodedb";

    $conn =  new mysqli($server,$username,$password,$dbname);

    if($conn->connect_error){
        die("Connection failed" .$conn->connect_error);
    }

    if(isset($_POST['submit'])){
        
        $STUDENTID =$_POST['STUDENTID'];
		$FIRSTNAME =$_POST['FIRSTNAME'];
		$MNAME =$_POST['MNAME'];
		$LASTNAME =$_POST['LASTNAME'];
		$AGE =$_POST['AGE'];
		$GENDER =$_POST['GENDER'];
		$CONTACT =$_POST['CONTACT'];


		$sql = "SELECT * FROM student WHERE STUDENTID = '$STUDENTID'";
		$query = $conn->query($sql);

		if($query->num_rows > 0 ){
			$_SESSION['error'] = 'Student: '.$STUDENTID.' Already exist!';
		}else{

		$sql = "INSERT INTO `student`(`STUDENTID`, `FIRSTNAME`, `MNAME`, `LASTNAME`, `AGE`, `GENDER`, `CONTACT`) VALUES ('$STUDENTID','$FIRSTNAME','$MNAME','$LASTNAME','$AGE','$GENDER','$CONTACT')";
			if($conn->query($sql)){
			 $_SESSION['success'] = 'New record Successfuly Saved!';
	 		}else{
	 		 $_SESSION['error'] = $conn->error;
  		 	}			
		}
}else{
 	$_SESSION['error'] = $conn->error;
}	


header("location: newstudent.php");
	   
$conn->close();
?>