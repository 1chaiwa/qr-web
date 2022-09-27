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


// sql to delete a record
  $sql ="DELETE FROM attendance WHERE STUDENTID=' '";
    $query=$conn->query($sql);

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();

?> 
