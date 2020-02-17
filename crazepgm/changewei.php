<?php
require 'connection.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel=”stylesheet” href=”css/bootstrap.css”>
<link rel=”stylesheet” href=”css/bootstrap-responsive.css”>
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/Dashboard.css"><div id="formFooter">
  
  <title>Change weightage</title>
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
  <a href="addcomp.php" >Add Competition</a><br>
  <a href="changewei.php" id="hell" active>Change weightage</a><br>
  <a href="checkwei.php">Current weightage</a><br>
  <a href="feedback.php">Feedback</a><br>
</div>
<br>
<br>
<div class="main">
  <?php
  date_default_timezone_set('Asia/Kolkata');
  $datetime= date("Y-m-d");    //today datetime  
  ?>

  <div class="row" id="contain-card">
      <div class="col-md-6">
        <div class="card " style="margin:20px 15px 20px 15px">
          <div class="card-header text-right" style="background:#ffa852;color:#fff">
          <b>Change weightage: </b>
          <br><br>
          </div><br><br>
          <div class="card-body">
            <div class="form-group">
              <form method="POST" action="changewei2.php">
              <label for="usr">Enter event name to change weightage</label>
              <input type="text" name="events" class="form-control" id="usr" required>
              <br><br>
              <input type="submit" value="submit">
            </form>
            </div><br><br>
          </div>
        </div>
      </div>
    </div>





  <div class="row" id="contain-card">
      <div class="col-md-6">
        <div class="card " style="margin:20px 15px 20px 15px">
          <div class="card-header text-right" style="background:#ffa852;color:#fff">
          <b>Upcoming Events </b>
          <br><br>
          
          <?php
          $today= date("Y-m-d h:i:sa");
          //$startdate = strtotime("now");
          $sql="SELECT ename from event where defaults=2"; 
          //query to reterive ongoing and upcominig events
          $res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
          $r=mysqli_num_rows($res);
                  if ($r > 0) {
  // output data of each row
                 ?>
          </div><br><br>
          <div class="card-body">
            <h7 class="ui-title text-sec-headline-xs">Event List:</h7>
            <br><br>
            <div class="col">
            <ul class="list-group">
            <?php while($row = mysqli_fetch_assoc($res)) { ?> 
            <li class="list-group-item"> <?php echo $row['ename'] ?></li>
          <?php } } else { ?>
           <h7 class="ui-title text-sec-headline-xs"> NO EVENTS </h7>
         <?php } ?>
          </ul>
          </div>
          
          </div>
        </div>
      </div>
  </div>

  
  <br>
  <br>
  <br>


</div>
<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
