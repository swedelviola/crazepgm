<?php
require 'connection.php';
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
  <link rel=”stylesheet” href=”css/bootstrap.css”>
<link rel=”stylesheet” href=”css/bootstrap-responsive.css”>
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/Dashboard.css"><div id="formFooter">
  
  <title>Events</title>
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
  <a href="event.php" id="hell" active>Events</a><br>
  <a href="addcomp.php">Add Competition</a><br>
  <a href="changewei.php">Change weightage</a><br>
  <a href="checkwei.php">Current weightage</a><br>
  <a href="feedback.php">Feedback</a><br>
</div>
<br>
<br>
<div class="main">
    <?php
    $eventname= $_POST['event'];
    ?>
    <div class="row" id="contain-card">
      <div class="col-md-6">
        <div class="card " style="margin:20px 15px 20px 15px">
          <div class="card-header text-right" style="background:#ffa852;color:#fff">
          <h5>Event Details: </h5>
          <br><br>
          </div><br><br>
          <div class="card-body">
            

    <h5>Problems registered under this event: </h5><br><br>
    <table class="table table-bordered">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Question</th>
                </tr>
              </thead>
              <tbody>
     <?php
  $sel="SELECT pname from problem p , event e where e.e_id=p.e_id and e.ename='$eventname'"; 
  // query to reterive pname of selected event
  $res=mysqli_query($conn,$sel) or die(mysqli_error($result));
  $r=mysqli_num_rows($res);
                $i=1;
                  if ($r > 0) {
// output data of each row
                while($row = mysqli_fetch_assoc($res)) { 
                  echo "<tr><td>" . $i . "</td>  <td>" . $row["pname"]. "</td></tr>";
                  $i=$i+1;
                }
                  } else { echo "0 results";}
                  ?>
                </tbody>

</table>

</div>
<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
