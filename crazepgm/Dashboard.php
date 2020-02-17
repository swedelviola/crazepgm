
<?php
require 'connection.php';
//$admin = $_SESSION['admin'];
//if($admin == null)
//{
  //header("Location: Login&Registration.php");
//}
//$_SESSION['admin']=$admin;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
   

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="./css/Dashboard.css">
  
  <title>Leaderboard</title>
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
  <a href="Dashboard.php" id="hell" active >Leaderboard</a><br>
  <a href="event.php" >Events</a><br>
  <a href="addcomp.php" >Add Competition</a><br>
  <a href="changewei.php">Change weightage</a><br>
  <a href="checkwei.php">Current weightage</a><br>
  <a href="feedback.php">Feedback</a><br>
</div>


<div class="main">
  <form method="POST" action="Dashboard2.php">
<label>Choose the event name:</label><br><br>
<div class="form-check">
  <?php
  $sel="SELECT ename from event";    //quesry to reterive event names to be display
  $res=mysqli_query($conn,$sel) or die(mysqli_error($result));
  $r=mysqli_num_rows($res);
                  if ($r > 0) {
// output data of each row
                while($row = mysqli_fetch_assoc($res)) { ?>
  <input type="radio" class="form-check-input" name="radio" value="<?php echo $row['ename']; ?>" >
  <label class="form-check-label" for="Event name"> <?php echo $row['ename'] ?> </label><br>
<?php } }
  ?>

</div>
<br><br>
<input type="submit" name="submit">
</form>

</body>
</html>
