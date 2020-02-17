<?php
require 'connection.php';
session_start();
// $admin = $_SESSION['admin'];
// if($admin == null)
// {
//   header("Location: Login&Registration.php");
// }
// $_SESSION['admin']=$admin;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
 
<script src="custom_script_1.js"></script>
<script src="custom_script_2.js"></script>
<link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">

  

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/Dashboard.css">
  <title>Add Competition</title>
</head>
<body>

	<nav class="navbar navbar-dark navbar-expand-sm fixed-top" style="background:#232f34">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#" style="color:#ffa852">Crazy Programming <br><h3 >Admin</h3> </a>
      <li>
        <a onClick="logout()" id="log" href="logout.php" class="navbar-brand pull-right" style="color:#F0F0F0"  >Logout</a>
    </li>
    </div>
  </nav>  


  <div class="sidenav">
    <br><br>
  <a href="Dashboard.php" >Leaderboard</a><br>
  <a href="event.php" >Events</a><br>
  <a href="addcomp.php" id="hell" active>Add Competition</a><br>
  <a href="changewei.php">Change weightage</a><br>
  <a href="checkwei.php">Current weightage</a><br>
  <a href="feedback.php">Feedback</a><br>
  <a href="edit.php">Edit</a><br>
</div>
<br>
<br>
<div class="main">
  <div class="row" id="contain-card">
      <div class="col-md-8">
        <div class="card " style="margin:20px 15px 20px 15px">
          <div class="card-header text-right" style="background:#ffa852;">
          <b>New competition</b>
          </div>
          <div class="card-body">
            <h4 class="ui-title text-sec-headline-xs">Add event details:</h4><br>
            <form method="POST" action="addcomp3.php">
              <div class="form-group row"> 
              <label for="event name" class="col-sm-2 col-form-label" >Event name:</label>                      
              <input type="text" id="var" name="eventname" placeholder="Name should be unique" required>
              </div>

              <?php
              if($_SESSION['default']==1){   // used to check if name give is unique 
               echo "EVENT NAME SHOULD BE UNIQUE";
            }
            ?>
                <div class="form-group row">
                  <label for="example-datetime-local-input" class="col-2 col-form-label">Start Date and Time</label>
                  <div class="col-10">
                    <input class="form-control" type="datetime-local" name="startdate" id="example-datetime-local-input" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="example-datetime-local-input" class="col-2 col-form-label">End Date and Time</label>
                  <div class="col-10">
                    <input class="form-control" type="datetime-local" name="enddate" id="example-datetime-local-input" required>
                  </div>
                </div>

              <button type="submit" class="btn btn-primary" formaction="addcomp3.php">Next</button>

            </form>
         </div>
        </div>
      </div>
    </div>
    <br><br>

</div>
<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
