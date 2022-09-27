<?php session_start();?>

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
              <a class="navbar-brand" href="#"> <i class="glyphicon glyphicon-plus-sign"></i>  Add Employee</a>
            </div>
        <ul class="nav navbar-nav">
              <li class="active"><a href="scan.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
              <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog"></span> Maintenance <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="Student.php"><span class="glyphicon glyphicon-user"></span> Employee</a></li>
                 <li><a href="newstudent.php"><span class="glyphicon glyphicon-plus-sign"></span> New Employee</a></li>
                  <li><a href="attendance.php"><span class="glyphicon glyphicon-calendar"></span> Attendance</a></li>

                </ul>
              </li>
              <li><a href="#"><span class="glyphicon glyphicon-align-justify"></span> Reports</a></li>
              <li><a href="scan.php"><span class="glyphicon glyphicon-time"></span> Check Attendance</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <!--<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>-->
              <li><a href="index.html"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
          </div>
        </nav>
       <div class="container">
            <div class="row">
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
                <div class="col-md-6">
                     <form class="form-horizontal" method="POST" action="new_student_save.php">
                        <div class="form-group">
                            <label>Employee ID</label>
                            <input type="text" name="STUDENTID" class="form-control" placeholder="Enter Employee ID" required>
                        </div>
                       
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="MNAME" class="form-control" placeholder="Enter Subject1" required>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="LASTNAME" class="form-control" placeholder="Enter Subject2" required>
                        </div>
                         <div class="form-group">
                           <label>Department</label>
                        
                            <select  name="DEPARTMENT" class="form-control" required>
                                <option seleted disabled>Select Department</option>
                                <option>CID</option>
                                <option>Forensic</option>
                                <option>Accounts</option>
                                <option>Arresting</option>
                                <option>HR</option>
                                <option>Costable</option>
                            </select>
                        </div>
                         <div class="form-group">
                            <label>NRC</label>
                            <input type="text" name="AGE" class="form-control" placeholder="Enter NRC" required>
                        </div>
                         <div class="form-group">
                            <label>Gender</label>
                        
                            <select  name="GENDER" class="form-control" required>
                                <option seleted disabled>Select Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                         <div class="form-group">
                            <label>Contact</label>
                            <input type="text" name="CONTACT" class="form-control" placeholder="Enter Contact" required>
                        </div>
                         <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary"> <span class="glyphicon glyphicon-plus"></span> Submit</button>
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