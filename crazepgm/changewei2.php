<?php
require 'connection.php';
session_start();
$_SESSION['ename']= $_POST['events']; 
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
	<div class="jumbotron" id="jumbo">
	<p> Set the weightage for the event ... :</p><br>
	<?php
	$ename= $_POST['events'];
	$stmt= "SELECT ename from event where ename='$ename' and defaults=2 limit 1";
	$res=mysqli_query($conn,$stmt) or die(mysqli_error($conn));
	$r=mysqli_num_rows($res);
	if ($r == 1) {
			$sql="SELECT e_id from event where ename='$ename'";
    $res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $r=mysqli_num_rows($res);
                  if ($r > 0) {
                    while($row = mysqli_fetch_assoc($res)) {
                      $e_id=$row['e_id'];
                    }
                  }

	    	$stm="SELECT `alphabets`, `arithmetic_operator`, `assignment_operator`, `bitwise_operator`, `digits`, `dollar`, `underscore`, `relational_operator`, `auto`, `break`, `cases`, `char_val`, `const`, `continue_loop`, `default_val`, `do`, `double_val`, `else_stm`, `enum`, `extern`, `float_val`, `for_loop`, `goto`, `if_stm`, `intval`, `long_val`, `register`, `return_val`, `short`, `signed`, `sizeof`, `static`, `struct`, `switch`, `typedef`, `union_op`, `unsigned_val`, `void`, `volatile`, `while_loop` from weight where e_id=$e_id";
	    	$result=mysqli_query($conn,$stm) or die(mysqli_error($conn));
	    	$r=mysqli_num_rows($result);
                  if ($r > 0) {
                  	 while($row = mysqli_fetch_assoc($result)) {	    	?>
	<form action="changewei3.php" method="POST">
		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">Alphabets</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['alphabets']?> min="0"  name="a">
		</div>

		<div class="form-group row">
	  		<label for="arithmetic_operator" class="col-sm-2 col-form-label">Arithmetic Operators</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['arithmetic_operator']?> min="0"  name="b">
		</div>

		<div class="form-group row">
	  		<label for="assignment_operator" class="col-sm-2 col-form-label">Assignment Operator</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['assignment_operator']?> min="0"  name="c">
		</div>

		<div class="form-group row">
	  		<label for="bitwise_operator" class="col-sm-2 col-form-label">Bitwise Operator</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber"  value=<?php echo $row['bitwise_operator']?> min="0" name="d">
		</div>

		<div class="form-group row">
	  		<label for="digits" class="col-sm-2 col-form-label">Digits</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['digits']?> min="0"  name="e">
		</div>

		<div class="form-group row">
	  		<label for="dollar" class="col-sm-2 col-form-label">Dollar</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber"  value=<?php echo $row['dollar']?> min="0" name="f">
		</div>

		<div class="form-group row">
	    	<label for="underscore" class="col-sm-2 col-form-label">Underscore</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" min="0" value=<?php echo $row['underscore']?> name="g">
	  	</div>

	  	<div class="form-group row">
	  		<label for="relational_operator" class="col-sm-2 col-form-label">Relational Operators</label><br>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber"  value=<?php echo $row['relational_operator']?> min="0" name="h">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">auto</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['auto']?> min="0" name="i">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">break</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['break']?> min="0" name="j">
		</div>

		<div class="form-group row">
	  		<label for="case" class="col-sm-2 col-form-label">case</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['cases']?> min="0" name="k">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">char</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['char_val']?> min="0"  name="l">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">const</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['const']?> min="0"  name="m">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">continue</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['continue_loop']?> min="0"  name="n">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">default</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['default_val']?> min="0"  name="o">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">do</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['do']?> min="0"  name="p">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">double</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['double_val']?> min="0" name="q">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">else</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['else_stm']?> min="0" name="r">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">enum</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['enum']?> min="0"  name="s">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">extern</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['extern']?> min="0"  name="t">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">float</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['float_val']?> min="0"  name="u">
		</div>

		<div class="form-group row">
	  		<label for="for" class="col-sm-2 col-form-label">for</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['for_loop']?> min="0"  name="v">
		</div>

		<div class="form-group row">
	  		<label for="goto" class="col-sm-2 col-form-label">goto</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['goto']?> min="0"  name="w">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">if</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['if_stm']?> min="0"  name="x">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">int</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['intval']?> min="0"  name="y">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">long</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['long_val']?> min="0"  name="z">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">register</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['register']?> min="0"  name="ab">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">return</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['return_val']?> min="0"  name="cd">
		</div>

		<div class="form-group row">
	  		<label for="if-else" class="col-sm-2 col-form-label">short</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['short']?> min="0"  name="ef">
		</div>

		<div class="form-group row">
	  		<label for="switch" class="col-sm-2 col-form-label">signed</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['signed']?> min="0"  name="gh">
		</div>

		<div class="form-group row">
	  		<label for="switch" class="col-sm-2 col-form-label">sizeof</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['sizeof']?> min="0"  name="ij">
		</div>

		<div class="form-group row">
	  		<label for="switch" class="col-sm-2 col-form-label">static</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['static']?> min="0"  name="kl">
		</div>

		<div class="form-group row">
	  		<label for="switch" class="col-sm-2 col-form-label">struct</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['struct']?> min="0"  name="mn">
		</div>

		<div class="form-group row">
	  		<label for="switch" class="col-sm-2 col-form-label">switch</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['switch']?> min="0"  name="op">
		</div>

		<div class="form-group row">
	  		<label for="switch" class="col-sm-2 col-form-label">typedef</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['typedef']?> min="0"  name="qr">
		</div>

		<div class="form-group row">
	  		<label for="switch" class="col-sm-2 col-form-label">union</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['union_op']?> min="0"  name="st">
		</div>

		<div class="form-group row">
	  		<label for="switch" class="col-sm-2 col-form-label">unsigned</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['unsigned_val']?> min="0"  name="uv">
		</div>

		<div class="form-group row">
	  		<label for="switch" class="col-sm-2 col-form-label">void</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['void']?> min="0"  name="wx">
		</div>

		<div class="form-group row">
	  		<label for="switch" class="col-sm-2 col-form-label">volatile</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['volatile']?> min="0"  name="yz">
		</div>

		<div class="form-group row">
	  		<label for="while" class="col-sm-2 col-form-label">while</label>
	    	<input type="number" id="replyNumber" data-bind="value:replyNumber" value=<?php echo $row['while_loop']?> min="0"  name="abc">
		</div>

		
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
<?php }} } else{ header("location:"."changewei.php");}?>
</div>
</div>

</body>
</html>
