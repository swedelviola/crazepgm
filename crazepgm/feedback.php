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
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/Dashboard.css">
  <title>Feedback</title>
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
  <a href="changewei.php" >Change weightage</a><br>
  <a href="checkwei.php" >Current weightage</a><br>
  <a href="feedback.php" id="hell" active>Feedback</a><br>
</div>
<br>
<br>
<div class="main">
  <div class="row" id="contain-card">
      <div class="col-md-8">
        <div class="card " style="margin:20px 15px 20px 15px">
          <div class="card-header text-right" style="background:#ffa852;">
            <?php
              $sql= "SELECT feedbacks,id from feedback where defaults=0";
              $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
              $r=mysqli_num_rows($result);
              if($r >0){
            ?>

          <b>Feedback</b>
          </div>
          <div class="card-body">
            <h4 class="ui-title text-sec-headline-xs">Feedabcks:</h4><br>
            <form action="feedback2.php" method="GET">
                <div class="form-check">
                  <?php
                    while($row = mysqli_fetch_assoc($result)){ 
                      $i=0; 
                      ?>
                  <input type="checkbox" class="form-check-input" name="feed[]" id="feed" value=<?php echo $row['id'] ?> >
                  <label class="form-check-label" for="materialUnchecked"><?php echo $row['feedbacks'] ?> </label>
                </div> <br>
                <?php
              }} else { echo "NO FEEDBACKS"; }
                ?>
                  <br><br>
                  <button type="submit" class="btn btn-primary" formaction="feedback2.php">Read</button>
              



            </form>
          </div>
        </div>
      </div>
    </div>
    <br><br>

</div>
</body>
</html>
