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
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
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
<?php
  $e_id= $_SESSION['e_id'];         //values from form
  $pname= $_POST['pname'];
  $sample_input = trim($_POST['sampleinput']);
  $sample_output = trim($_POST['sampleoutput']);
  $constraints = trim($_POST['constraints']);
  $description=trim($_POST['description']);
  $samplepgm=html_entity_decode(trim($_POST['samplepgm']));
  $nf=$_POST['nt'];
  $_SESSION['nf']=$nf;


  $sql="INSERT into problem (`pname`,`description`,`constraints`,`sample_input`,`sample_output`,`sample_pgm`,`e_id`) values ('$pname','$description','$constraints','$sample_input','$sample_output','$samplepgm','$e_id')";  //insert values into database INSERT INTO `problem` (`p_id`, `pname`, `description`, `constraints`, `sample_input`, `sample_output`, `sample_pgm`, `e_id`) VALUES ('23', 'a', 'a', 'a', 'a', 'a', 'a', '70');
  $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
                    $p_id = $conn->insert_id;
            $_SESSION['p_id']=$p_id;   //store the resent created record id
?>
<br>
<div class="main">
    

    <div class="row" id="contain-card">
      <div class="col-md-8">
        <div class="card " style="margin:20px 15px 20px 15px">
          <div class="card-header text-right" style="background:#ffa852;">
          <b>Upcoming events</b>
          </div>
          <form method="POST" action="addcomp6.php">
          <div class="card-body">
                       <span>
					    <textarea name="code"readonly >
						<?php echo htmlentities($samplepgm); ?>
						</textarea>
					   </span>
            <h4 class="ui-title text-sec-headline-xs">Add test cases:</h4>
            <br><br>
             <?php
            while($nf>0){ ?>

            <h7>Add test case inputs:</h7><br>

            <div class="form-group">
              <textarea id="text-arr" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="5" name="<?php echo "ip$nf" ?>" required>
              Test case inputs
            
            </textarea>
            </div> <br>
            <?php $nf=$nf-1;
          }
            ?>
            <br>
            <br>
            <br>
            <button type="submit" class="btn btn-primary" formaction="addcomp6.php">Add test case</button>
          </form>
          </div>
        </div>
      </div>
    </div>

</div>
</body>
</html>
