<?php
require 'connection.php';
session_start();

// $admin = $_SESSION['admin'];
// if($admin == null)
// {
//   header("Location: Login&Registration.php");
// }
// $_SESSION['admin']=$admin;
$nf=$_SESSION['nf'];
$e_id= $_SESSION['e_id'];
$p_id= $_SESSION['p_id'];
$stmt = $conn->prepare("INSERT into `testcase` (`e_id`,`p_id`,`input`,`output`) values('$e_id','$p_id',?,?)");
include 'calcout.php';





?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
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
      	<h5>Test cases</h5>
          </div>
<div class="card-body">
	<form>
<?php 

  $stmt1 = $conn->prepare("SELECT * from `testcase` where `e_id`=$e_id and $p_id=$p_id");
  $stmt1->execute();
  $result=$stmt1->get_result();
  $count=mysqli_num_rows($result);
  if($count>=1)
  {
    echo "<h5>Test case added successfully!!!</h5>";?>
            <br>
            <button type="submit" class="btn btn-primary" formaction="addcomp8.php">Add another question</button>

            <br>
            <br>
            <button type="submit" class="btn btn-primary" formaction="addcomp.php">Done</button>
  <?php } 
  else
  {
    echo "<h5>Test case NOT added!!!\nTry again!!</h5>";
    //header("Location: addcomp5.php");
  }

  ?>

		        <!--<br>
            <button type="submit" class="btn btn-primary" formaction="addcomp8.php">Add another question</button>

            <br>
            <br>
            <button type="submit" class="btn btn-primary" formaction="addcomp.php">Done</button>-->
        </form>
        </div>
    </div>
</div>
</div>
</body>
</html>
