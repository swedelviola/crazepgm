<!DOCTYPE html>
<?php
session_start();
$username = $_SESSION['username'];
$eid = $_GET['eid'];
if($eid == null)
  header("Location: errorQuestion.php");
if( $username == null)
  header("Location: errorLoginPage.php");
include("connection.php");
$_SESSION['eid']=$eid;

// date_default_timezone_set("India");
$current_date=date("Y-m-d H:i:s");

  echo $eid;
	$sql = "SELECT * FROM problem where e_id=$eid";
	$result = mysqli_query($db,$sql);
	$rowcount=mysqli_num_rows($result);
  if($rowcount == 0)
  {
    header("Location: errorQuestion.php");
  }
	//echo $rowcount;
	$sql1 ="SELECT * FROM problem where e_id=$eid ORDER BY p_id LIMIT 0,1";
	$result1 = mysqli_query($db,$sql1);
	$sql2 ="SELECT * FROM problem where e_id=$eid ORDER BY p_id LIMIT 1,$rowcount";
	$result2 = mysqli_query($db,$sql2);



?>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/community.css">
  <link rel="stylesheet" href="css/dashbord.css">
  <link rel="stylesheet" href="css/styles.css">
  <title></title>
</head>

<body>
  <nav class="navbar navbar-dark navbar-expand-sm fixed-top" style="background:#232f34">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="index.php" style="color:#f9AA33">Crazy</a>
      <div class="collapse navbar-collapse nav-pos" id="Navbar">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item"><a class="nav-link" href="leaderboard.php">leaderboardQ</a></li>
          <li class="nav-item active"><a class="nav-link" href="#"> Events</a></li>
          <li class="nav-item"><a class="nav-link" href="test.php">Check Weightage</a></li>
          <li class="nav-item"><a class="nav-link" href="#">CLock</a></li>
          <li class="nav-item dropdown nav-element-left"><a class="nav-link drop-down-toggle" href="#" id="navbardrop" data-toggle="dropdown"><span class="fa fa-user"></span> <?php echo $username; ?></a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">.</a>
              <a class="dropdown-item" href="#">.</a>
              <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="jumbotron">
    <div class="container">
      <div class="row row-header">
        <div class="col-12 col-sm-6">
          <h1>Problems</h1>
          <br>
          <h4>Event-id: <?php echo $eid ?></h4>
        </div>
        <div class="col-12 col-sm">
        </div>
      </div>
    </div>
  </header>

  <div  style="background:#F3F7F7">
    <div class="row" id="contain-card">
			<?php   while($row = $result1->fetch_assoc()) {  ?>
      <div class="col-md-4">
        <div class="card " style="margin:15px">
          <div class="card-body">
            <h2 class="ui-title text-sec-headline-xs"><?php echo "Qid: ".$row['p_id']; ?></h2>
            <h3 class="base-card-title" title="Interview Preparation Kit" id="base-card-1" style="color:#000000"><?php echo $row['pname'] ?></h3>
             <div class="row">
              <div class="col-sm-6">
                <?php $pid = $row['p_id']; ?>
                <a href="question.php?pid=<?php echo $pid; ?>" class="btn btn-primary btn-block border-0" style="background:#f9AA33;font-size:12px"><b>Continue Practice</b></a>
               </div>
            </div>
          </div>
        </div>
      </div>
		<?php } ?>
		<?php  if($rowcount>1){
		 while($row1 = $result2->fetch_assoc()) {  ?>
      <div class="col-md-4">
        <div class="card " style="margin:15px">
          <div class="card-body">
            <h2 class="ui-title text-sec-headline-xs"><?php echo $row1['pname'] ?></h2>
            <h3 class="base-card-title" title="Interview Preparation Kit" id="base-card-1" style="color:#000000"><?php echo $row1['pname'] ?></h3>
             <div class="row">
              <div class="col-sm-6">
                <?php $pid = $row1['p_id'] ?>
                <a href="question.php?pid=<?php echo $pid; ?>" class="btn btn-block " style="border-color:#f9AA33;color:#f9AA33;font-size:12px"><b>Continue Practice</b></a>

               </div>
            </div>
          </div>
        </div>
      </div>
		<?php } }?>
      

      </div>
  </div>


  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-4 offset-1 col-sm-2">
          <h5>Links</h5>
          <ul class="list-unstyled">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </div>
        <div class="col-7 col-sm-5">
          <h5>Our Address</h5>
          <address>
            Kens Residency,B-102<br>
            1st Main,16th Cross,Pai Layout<br>
            Bangalore-560016<br>
            <i class="fa fa-phone fa-lg"></i>: +91 8867525797<br>
            <i class="fa fa-fax fa-lg"></i>: <br>
            <i class="fa fa-envelope fa-lg"></i>:
            <a href="mailto:shubshubham1@gmail.com">shubshubham1@gmail.com</a>

          </address>
        </div>
        <div class="col-12 col-sm-4 align-self-center">
          <div class="text-center">
            <a class="btn btn-social-icon btn-google" href="http://google.com/+"><i class="fa fa-google-plus"></i></a>
            <a class="btn btn-social-icon btn-facebook" href="http://www.facebook.com/profile.php?id="><i class="fa fa-facebook"></i></a>
            <a class="btn btn-social-icon btn-linkedin" href="http://www.linkedin.com/in/"><i class="fa fa-linkedin"></i></a>
            <a class="btn btn-social-icon btn-twitter" href="http://twitter.com/"><i class="fa fa-twitter"></i></a>
            <a class="btn btn-social-icon btn-google" href="http://youtube.com/"><i class="fa fa-youtube"></i></a>
            <a class="btn btn-social-icon" href="mailto:"><i class="fa fa-envelope-o"></i></a>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-auto">
          <p>© Copyright </p>
        </div>
      </div>
    </div>
  </footer>

  <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
  <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>
