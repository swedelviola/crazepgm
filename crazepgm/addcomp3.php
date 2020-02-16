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
<?php
	date_default_timezone_set('Asia/Kolkata');
	$eventname =$_POST['eventname'];
	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];
	$date1 = date("Y-m-d h:i:sa"); //current date time
	$sql = "SELECT ename from event where ename='$eventname' limit 1"; //check for unique event name
	$res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	$r=mysqli_num_rows($res);
                  if ($r == 0) {

                  	if($date1 < $startdate)
    					{
                  	$stmt="INSERT into event(`ename`,`start_date`,`end_date`,`defaults`) values('$eventname','$startdate','$enddate',2)";  //insert into database
                  	$result=mysqli_query($conn,$stmt) or die(mysqli_error($conn));
                  	$e_id = $conn->insert_id;
    				$_SESSION['e_id']=$e_id;
    				} else if($date1 > $enddate){
    					$stmt="INSERT into event(`ename`,`start_date`,`end_date`,`defaults`) values('$eventname','$startdate','$enddate',1)";  //insert into database
                  	$result=mysqli_query($conn,$stmt) or die(mysqli_error($conn));
                  	$e_id = $conn->insert_id;
    				$_SESSION['e_id']=$e_id;
    				
    				} else{
                  	$stmt="INSERT into event(`ename`,`start_date`,`end_date`,`defaults`) values('$eventname','$startdate','$enddate',0)";  //insert into database
                  	$result=mysqli_query($conn,$stmt) or die(mysqli_error($conn));
                  	$e_id = $conn->insert_id;
    				$_SESSION['e_id']=$e_id;
    				
    				}
    			} 
    			else {
    				echo "Event name should be unique";
    				$_SESSION['default']=1;
    				header('location: '."addcomp2.php");
    			}
?>
<br>
<div class="main">
	<div class="jumbotron" id="jumbo">
	<p> Set the weightage for the event ... :</p><br>
	
	<form action="addcomp4.php" method="POST">
		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">Alphabets</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="10" min="0" value="10" name="a">
		</div>

		<div class="form-group row">
	  		<label for="arithmetic_operator" class="col-sm-2 col-form-label">Arithmetic Operators</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="1000" min="0" value="1000" name="b">
		</div>

		<div class="form-group row">
	  		<label for="assignment_operator" class="col-sm-2 col-form-label">Assignment Operator</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="5" min="0" value="5" name="c">
		</div>

		<div class="form-group row">
	  		<label for="bitwise_operator" class="col-sm-2 col-form-label">Bitwise Operator</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="10" min="0" value="10" name="d">
		</div>

		<div class="form-group row">
	  		<label for="digits" class="col-sm-2 col-form-label">Digits</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="100" min="0" value="100" name="e">
		</div>

		<div class="form-group row">
	  		<label for="dollar" class="col-sm-2 col-form-label">Dollar</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="10" min="0" value="10" name="f">
		</div>

		<div class="form-group row">
	    	<label for="underscore" class="col-sm-2 col-form-label">Underscore</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="10" min="0" value="10" name="g">
	  	</div>

	  	<div class="form-group row">
	  		<label for="relational_operator" class="col-sm-2 col-form-label">Relational Operators</label><br>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="50" min="0" value="50" name="h">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">auto</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="0" min="0" value="0" name="i">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">break</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="0" min="0" value="0" name="j">
		</div>

		<div class="form-group row">
	  		<label for="case" class="col-sm-2 col-form-label">case</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="50" min="0" value="50" name="k">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">char</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="0" min="0" value="0" name="l">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">const</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="0" min="0" value="0" name="m">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">continue</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="0" min="0" value="0" name="n">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">default</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="0" min="0" value="0" name="o">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">do</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="0" min="0" value="0" name="p">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">double</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="0" min="0" value="0" name="q">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">else</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="0" min="0" value="0" name="r">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">enum</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="0" min="0" value="0" name="s">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">extern</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="0" min="0" value="0" name="t">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">float</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="0" min="0" value="0" name="u">
		</div>

		<div class="form-group row">
	  		<label for="for" class="col-sm-2 col-form-label">for</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="5000" min="0" value="5000" name="v">
		</div>

		<div class="form-group row">
	  		<label for="goto" class="col-sm-2 col-form-label">goto</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="100" min="0" value="100" name="w">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">if</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="0" min="0" value="0" name="x">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">int</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="0" min="0" value="0" name="y">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">long</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="0" min="0" value="0" name="z">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">register</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="0" min="0" value="0" name="ab">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">return</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="0" min="0" value="0" name="cd">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">short</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="0" min="0" value="0" name="ef">
		</div>

		<div class="form-group row">
	  		<label for="switch" class="col-sm-2 col-form-label">signed</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="0" min="0" value="0" name="gh">
		</div>

		<div class="form-group row">
	  		<label for="switch" class="col-sm-2 col-form-label">sizeof</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="0" min="0" value="0" name="ij">
		</div>

		<div class="form-group row">
	  		<label for="switch" class="col-sm-2 col-form-label">static</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="0" min="0" value="0" name="kl">
		</div>

		<div class="form-group row">
	  		<label for="switch" class="col-sm-2 col-form-label">struct</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="0" min="0" value="0" name="mn">
		</div>

		<div class="form-group row">
	  		<label for="switch" class="col-sm-2 col-form-label">switch</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="500" min="0" value="500" name="op">
		</div>

		<div class="form-group row">
	  		<label for="switch" class="col-sm-2 col-form-label">typedef</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="0" min="0" value="0" name="qr">
		</div>

		<div class="form-group row">
	  		<label for="switch" class="col-sm-2 col-form-label">union</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="0" min="0" value="0" name="st">
		</div>

		<div class="form-group row">
	  		<label for="switch" class="col-sm-2 col-form-label">unsigned</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="0" min="0" value="0" name="uv">
		</div>

		<div class="form-group row">
	  		<label for="switch" class="col-sm-2 col-form-label">void</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="0" min="0" value="0" name="wx">
		</div>

		<div class="form-group row">
	  		<label for="switch" class="col-sm-2 col-form-label">volatile</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="0" min="0" value="0" name="yz">
		</div>

		<div class="form-group row">
	  		<label for="while" class="col-sm-2 col-form-label">while</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" placeholder="3000" min="0" value="3000" name="abc">
		</div>

		
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
</div>

</body>
</html>
