<?php
    session_start();
    $server = "localhost";
    $username="root";
    $password="";
    $dbname="qrcodedb";

    $conn = new mysqli($server,$username,$password,$dbname);

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


		$sql = "UPDATE `student` SET `FIRSTNAME`='$FIRSTNAME',`MNAME`='$MNAME',`LASTNAME`='$LASTNAME',`AGE`='$AGE]',`GENDER`='$GENDER',`CONTACT`='$CONTACT' WHERE STUDENTID='$STUDENTID'";
			if($conn->query($sql)){
			 $_SESSION['success'] = 'Student information successfully updated!!';
	 		}else{
	 		 $_SESSION['error'] = $conn->error;
  		 	}			
		
}else{
 	$_SESSION['error'] = $conn->error;
}	


header("location: student.php");
	   
$conn->close();
?>