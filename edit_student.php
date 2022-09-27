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

if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    $sql ="SELECT * FROM student WHERE ID='$id'";
    $query=$conn->query($sql);
    $row = $query->fetch_assoc();
}

?>
<html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>QR Code | Log in</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1">

        <script type="text/javascript" src="js/instascan.min.js"></script>
        <!-- DataTables -->
        <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">

<html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>QR Code | Log in</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1">

        <script type="text/javascript" src="js/instascan.min.js"></script>
        <!-- DataTables -->
        <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
        #divvideo{
             box-shadow: 0px 0px 1px 1px rgba(0, 0, 0, 0.1);
        }
        </style>
    </head>
    <body style="background:#eee">
        <nav class="navbar" style="background:#2c3e50">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="#"> <i class="glyphicon glyphicon-qrcode"></i>  QR Code Attendance</a>
            </div>
        <ul class="nav navbar-nav">
              <li class="active"><a href="land.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
              <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog"></span> Maintenance <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="Student.php"><span class="glyphicon glyphicon-user"></span> Student</a></li>
                 <li><a href="newstudent.php"><span class="glyphicon glyphicon-plus-sign"></span> New Student</a></li>
                  <li><a href="attendance.php"><span class="glyphicon glyphicon-calendar"></span> Attendance</a></li>

                </ul>
              </li>
              <li><a href="#"><span class="glyphicon glyphicon-align-justify"></span> Reports</a></li>
              <li><a href="land.php"><span class="glyphicon glyphicon-time"></span> Check Attendance</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <!--<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>-->
              <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
          </div>
        </nav>
       <div class="container">
            <div class="row">
               
                <div class="col-md-12">
                     <form class="form-horizontal" method="POST" action="edit_student_save.php">
                      
                        <input type="hidden" name="STUDENTID" class="form-control" value="<?php echo $row['STUDENTID'];?>" required>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="FIRSTNAME" class="form-control" value="<?php echo $row['FIRSTNAME'];?>" placeholder="Enter FirsT Name" required>
                        </div>
                        <div class="form-group">
                            <label>Middle Name</label>
                            <input type="text" name="MNAME" class="form-control" value="<?php echo $row['MNAME'];?>" placeholder="Enter Middle Name" required>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="LASTNAME" class="form-control" value="<?php echo $row['LASTNAME'];?>" placeholder="Enter Last Name" required>
                        </div>
                         <div class="form-group">
                            <label>Age</label>
                            <input type="text" name="AGE" class="form-control" value="<?php echo $row['AGE'];?>" placeholder="Enter Age" required>
                        </div>
                         <div class="form-group">
                            <label>Gender</label>
                        
                            <select  name="GENDER" class="form-control" required>
                                <option seleted disabled><?php echo $row['GENDER'];?></option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                         <div class="form-group">
                            <label>Contact</label>
                            <input type="text" name="CONTACT" value="<?php echo $row['CONTACT'];?>" class="form-control" placeholder="Enter Contact" required>
                        </div>
                         <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary"> <span class="glyphicon glyphicon-edit"></span> Update</button>
                        </div>
                     </form>

                
                </div>
                
            </div>
                        
        </div>
       
        <script src="plugins/jquery/jquery.min.js"></script>
        <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

        <script>
          $(function () {
            $("#example1").DataTable({
              "responsive": true,
              "autoWidth": false,
            });
            $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
            });
          });
        </script>
        
    </body>
</html>