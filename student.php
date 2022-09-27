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

if(isset($_GET['del'])){
    $id=$_GET['del'];
    $sql ="DELETE FROM student WHERE ID='$id'";
    $query=$conn->query($sql);
    if($conn->query($sql)){
        $_SESSION['success']="Successfully deleted!";
    }else{
         $_SESSION['error']=$conn->error;
    }

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
    <body style="background:lightblue;">
        <nav class="navbar" style="background:#2c3e50">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="#"> <i></i> Kasama Police Station</a>
            </div>
        <ul class="nav navbar-nav">
             <li class="active"><a href="scan.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
              <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog"></span> Maintenance <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="student.php"><span class="glyphicon glyphicon-user"></span> Employee</a></li>
                 <li><a href="newstudent.php"><span class="glyphicon glyphicon-plus-sign"></span> New Employee</a></li>
                  <li><a href="attendance.php"><span class="glyphicon glyphicon-calendar"></span> Attendance</a></li>

                </ul>
              </li>
              <li><a href="#"><span class="glyphicon glyphicon-align-justify"></span></a></li>
              <li><a href="scan.php"><span class="glyphicon glyphicon-time"></span> Check Attendance</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <!--<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>-->
              <li><a href="#"><span class="glyphicon glyphicon-log-in"></span></a></li>
            </ul>
          </div>
        </nav>
       <div class="container">
            <div class="row">
                
                <div class="col-md-12">
               <?php
                    if(isset($_SESSION['error'])){
                      echo "
                        <div class='alert alert-danger alert-dismissible' style='background:red;color:#fff'>
                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                          <h4><i class='icon fa fa-warning'></i> Error!</h4>
                          ".$_SESSION['error']."
                        </div>
                      ";
                      unset($_SESSION['error']);
                    }
                    if(isset($_SESSION['success'])){
                      echo "
                        <div class='alert alert-success alert-dismissible' style='background:green;color:#fff'>
                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                          <h4><i class='icon fa fa-check'></i> Success!</h4>
                          ".$_SESSION['success']."
                        </div>
                      ";
                      unset($_SESSION['success']);
                    }
                  ?>
                  <h3><marquee>All Employees at this station</marquee></a></h3>
                <div style="border-radius: 5px;padding:10px;background:#fff;" >
                  <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Employee ID</td>
                        <td>Department</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>NRC</td>
                        <td>Gender</td>
                        <td>Contact</td>
                        <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                           $sql ="SELECT * FROM student";
                           $query = $conn->query($sql);
                           $cnt =1;
                           while ($row = $query->fetch_assoc()){
                        ?>
                            <tr>
                                <td><?php echo $cnt;?></td>
                                <td><?php echo $row['STUDENTID'];?></td>
                                <td><?php echo $row['FIRSTNAME'];?></td>
                                <td><?php echo $row['MNAME'];?></td>
                                <td><?php echo $row['LASTNAME'];?></td>
                                <td><?php echo $row['AGE'];?></td>
                                <td><?php echo $row['GENDER'];?></td>
                                <td><?php echo $row['CONTACT'];?></td>
                                <td><a href="edit_student.php?edit=<?php echo $row['ID'];?>" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
                                <a href="student.php?del=<?php echo $row['ID'];?>" class="btn btn-danger" onClick="return confirm('Do you really want to delete?')"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                </td>
                            </tr>
                        <?php
                             $cnt++;
                        }
                        ?>
                    </tbody>
                  </table>
                  
                </div>
                
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