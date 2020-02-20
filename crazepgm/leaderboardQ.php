<!DOCTYPE html>
<?php

session_start();
$username =$_SESSION['username'];
if($username == null)
{
  $username = $_GET['username'];
  if($username == '0')
  {
    header("Location: Login&Registration.php");
  }
  else
  {
    header("Location: errorLoginPage.php");
  }
}
include("connection.php");
$_SESSION['username'] = $username;

date_default_timezone_set("Asia/Dhaka");
$current_date=date("Y-m-d H:i:s");


	$sql = "SELECT * FROM event";
	$result = mysqli_query($db,$sql);
	$rowcount=mysqli_num_rows($result);
$totalrows=mysqli_query($db,$sql);

	$sql5="SELECT * FROM event where defaults=0";
	$result5=mysqli_query($db,$sql5);
	$rowcount5=mysqli_num_rows($result5);
	$diff=$rowcount5-1;
	if($diff<0){
		$diff=0;
		$eid=null;
	}

	$sql1 ="SELECT * FROM (SELECT * FROM event where defaults=0 ORDER BY start_date) as newd ORDER BY e_id LIMIT $diff,1";
	$result1 = mysqli_query($db,$sql1);
		while($row3 = $result1->fetch_assoc()) {
		$eid=	$row3['e_id'];
		//echo $eid;
		}
		$newiterate=mysqli_query($db,$sql1);
		if($eid===null){
			$sql2 ="SELECT * from event order by defaults";
		}else{
			$sql2 ="SELECT * from event where e_id not in ($eid) order by defaults";
		}

	$result2 = mysqli_query($db,$sql2);
	$rowcount2=mysqli_num_rows($result2);
$result4 = mysqli_query($db,$sql2);
// while($row5 = $result1->fetch_assoc()) {
//
// 	$date1=date_create($current_date);
// 	$date2=date_create($row5['end_date']);
// 	$difference=date_diff($date1,$date2);
// 	$d=$difference->format('%R%i');
// 	$x=strpos($d,'-');
// if($x===0){
// $sql3 ="UPDATE `event` SET `default`=1 where e_id=$row5[e_id]" ;
// $result3 = mysqli_query($db,$sql3);
// }
// }

	while($row1 = $totalrows->fetch_assoc()) {

		$date1=date_create($current_date);
		$date2=date_create($row1['end_date']);
		$dates2=date_create($row1['start_date']);
		$difference=date_diff($date1,$date2);
		$difference1=date_diff($date1,$dates2);
		$d=$difference->format('%R%i');
		$ds=$difference1->format('%R%i');
		$x=strpos($d,'-');
		$y=strpos($ds,'+');
		if($y===0){
		$sql6 ="UPDATE `event` SET `defaults`=2 where e_id=$row1[e_id]" ;
		$result6 = mysqli_query($db,$sql6);
	}else{
		$sql6 ="UPDATE `event` SET `defaults`=0 where e_id=$row1[e_id]" ;
		$result6 = mysqli_query($db,$sql6);
	}
	if($x===0){
  $sql3 ="UPDATE `event` SET `defaults`=1 where e_id=$row1[e_id]" ;
	$result3 = mysqli_query($db,$sql3);
	}
}

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
      <a class="navbar-brand" href="#" style="color:#f9AA33">Crazy</a>
      <div class="collapse navbar-collapse nav-pos" id="Navbar">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item "><a class="nav-link" href="leaderboardQ.php">Leaderboard</a></li>
          <li class="nav-item active"><a class="nav-link" href="#"> Events</a></li>
          <li class="nav-item"><a class="nav-link" href="#"> Rules</a></li>
          <li class="nav-item"><a class="nav-link" href="#"><?php echo $current_date; ?></a></li>
          <li class="nav-item dropdown nav-element-left"><a class="nav-link drop-down-toggle" href="#" id="navbardrop" data-toggle="dropdown"><span class="fa fa-user"></span> <?php echo $username; ?></a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">.</a>
              <a class="dropdown-item" href="myprofile.php">My profile</a>
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
          <h1>Events Leaderboard</h1>
        </div>
        <div class="col-12 col-sm">
        </div>
      </div>
    </div>
  </header>

  <div  style="background:#F3F7F7">
    <div class="row" id="contain-card">
			<?php if ($rowcount==1 or $rowcount>1){ ?>
				<?php   while($row = $newiterate->fetch_assoc()) {  ?>
				<div class="col-md-6">
	        <div class="card " style="margin:20px 15px 20px 15px">
	          <div class="card-header text-right" style="background:#f9AA33;color:#fff">
	          <b>New</b>
	          </div>
	          <div class="card-body">

	            <h3 class="base-card-title" title="Interview Preparation Kit" id="base-card-1" style="color:#000000"><?php echo $row['e_id'].": ".$row['ename']; ?></h3>

	            <div class="progress" style="height:5px">
	              <div class="progress-bar" role="progressbar" style="width: 4%;height:5px;background:#000000" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
	            </div>

	            <h2 class="ui-title text-sec-headline-xs" style="padding:25px 5px 20px 5px"><b style="color:#000000">4%</b>(3/69 challenges solved)</h2>
                <div class="row">
	              <div class="col-sm-6">
                  <?php $eid = $row['e_id']; ?>
	                <a href="leaderboard.php?eid=<?php echo $eid; ?>" class="btn btn-primary btn-block border-0" style="background:#f9AA33"><b>Leaderboard --></b></a>
	              </div>
	            </div>
	          </div>
	          <div class="card-footer text-muted text-center">
	            2 days ago
	          </div>
	        </div>
	      </div>
			<?php } }
			if($rowcount>1){

				while($row2 = $result4->fetch_assoc()) {
					$date11=date_create($current_date);
					$date12=date_create($row2['end_date']);
					$date13=date_create($row2['start_date']);
					$differences=date_diff($date11,$date12);
					$differencess=date_diff($date11,$date13);
					$di=$differences->format('%a');
					$d1=$differencess->format('%a');
				if($row2['defaults']==0){ ?>
		<div class="col-md-6">
        <div class="card " style="margin:20px 15px 20px 15px">
          <div class="card-header text-right" style="background:#FFAB91;color:#232F34">
          <b>Featured</b>
          </div>
          <div class="card-body">

            <h3 class="base-card-title" title="Interview Preparation Kit" id="base-card-1" style="color:#000000"><?php echo $row2['ename']; ?></h3>

            <div class="progress" style="height:5px">
              <div class="progress-bar" role="progressbar" style="width: 4%;height:5px;background:#000000" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <h2 class="ui-title text-sec-headline-xs" style="padding:25px 5px 20px 5px"><b style="color:#000000">4%</b>(3/69 challenges solved)</h2>
             <div class="row">
              <div class="col-sm-6">
                <?php $eid = $row2['e_id']; ?>
                  <a href="leaderboard.php?eid=<?php echo $eid; ?>" class="btn btn-primary btn-block border-0" style="background:#f9AA33"><b>Leaderboard --></b></a>
               </div>
            </div>
          </div>
          <div class="card-footer text-muted text-center">
            <?php echo $d1 ?> days ago
          </div>
        </div>
      </div>
		<?php }elseif($row2['defaults']==1){ ?>
      <div class="col-md-6">
        <div class="card " style="margin:20px 15px 20px 15px">
          <div class="card-header text-right" style="background:#F3F7F7;color:#232F34">
          <b>Disabled</b>
          </div>
          <div class="card-body">
            <!-- <h2 class="ui-title text-sec-headline-xs">INTERVIEW PREPARATION</h2> -->
            <h3 class="base-card-title" title="Interview Preparation Kit" id="base-card-1" style="color:#000000"><?php echo $row2['ename']; ?></h3>

            <div class="progress" style="height:5px">
              <div class="progress-bar" role="progressbar" style="width: 4%;height:5px;background:#000000" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <h2 class="ui-title text-sec-headline-xs" style="padding:25px 5px 20px 5px"><b style="color:#000000">4%</b>(3/69 challenges solved)</h2>
             <div class="row">
              <div class="col-sm-6">
                <?php $eid = $row2['e_id']; ?>
                  <a href="leaderboard.php?eid=<?php echo $eid; ?>" class="btn btn-primary btn-block border-0 " style="background:#f9AA33"><b>Leaderboard --></b></a>
               </div>
            </div>
          </div>
          <div class="card-footer text-muted text-center">
              <?php echo $di ?> days ago
          </div>
        </div>
      </div>
			<?php }}} ?>
    </div>
  </div>



  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-4 offset-1 col-sm-2">
          <h5>Links</h5>
          <ul class="list-unstyled">
            <li><a href="LandingPage.php">Home</a></li>
            <li><a href="LandingPage.php">About</a></li>
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
