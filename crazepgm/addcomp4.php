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

<br>
<div class="main">

  <?php

  $a = $_POST['a'];  //values from form
  $b = $_POST['b'];
  $c = $_POST['c'];
  $d = $_POST['d'];
  $e = $_POST['e'];
  $f = $_POST['f'];
  $g = $_POST['g'];
  $h = $_POST['h'];
  $i = $_POST['i'];
  $j = $_POST['j'];
  $k = $_POST['k'];
  $l = $_POST['l'];
  $m = $_POST['m'];
  $n = $_POST['n'];
  $o = $_POST['o'];
  $p = $_POST['p'];
  $q = $_POST['q'];
  $r = $_POST['r'];
  $s = $_POST['s'];
  $t = $_POST['t'];
  $u = $_POST['u'];
  $v = $_POST['v'];
  $w = $_POST['w'];
  $x = $_POST['x'];
  $y = $_POST['y'];
  $z = $_POST['z'];
  $ab = $_POST['ab'];
  $cd = $_POST['cd'];
  $ef = $_POST['ef'];
  $gh = $_POST['gh'];
  $ij = $_POST['ij'];
  $kl = $_POST['kl'];
  $mn = $_POST['mn'];
  $op = $_POST['op'];
  $qr = $_POST['qr'];
  $st = $_POST['st'];
  $uv = $_POST['uv'];
  $wx = $_POST['wx'];
  $yz = $_POST['yz'];
  $abc = $_POST['abc'];
  $e_id = $_SESSION['e_id'];
   
    $stm="INSERT INTO `weight` (`e_id`, `alphabets`, `arithmetic_operator`, `assignment_operator`, `bitwise_operator`, `digits`, `dollar`, `underscore`, `relational_operator`, `auto`, `break`, `cases`, `char_val`, `const`, `continue_loop`, `default_val`, `do`, `double_val`, `else_stm`, `enum`, `extern`, `float_val`, `for_loop`, `goto`, `if_stm`, `intval`, `long_val`, `register`, `return_val`, `short`, `signed`, `sizeof`, `static`, `struct`, `switch`, `typedef`, `union_op`, `unsigned_val`, `void`, `volatile`, `while_loop`) VALUES('$e_id','$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t','$u','$v','$w','$x','$y','$z','$ab','$cd','$ef','$gh','$ij','$kl','$mn','$op','$qr','$st','$uv','$wx','$yz','$abc')";
   // insert into database
    $result =mysqli_query($conn,$stm) or die(mysqli_error($conn));

  ?>    

    <div class="row" id="contain-card">
      <div class="col-md-8">
        <div class="card " style="margin:20px 15px 20px 15px">
          <div class="card-header text-right" style="background:#ffa852;">
          <b>Upcoming events</b>
          </div>
          <form method="POST" action="addcomp5.php">
          <div class="card-body">
            <h4 class="ui-title text-sec-headline-xs">Add questions for upcoming Competitions</h4>
            <br>
            

            <h7>Add questions below:</h7><br>
            <div class="form-group">
              <textarea id="text-arr" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="5" name="pname" required>
              Sample Question  

              Write a code to add two numbers
            
            </textarea>
            </div>

            <h7>Add description for question</h7>
            <div class="form-group">
              <textarea id="text-arr" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="5" name="description" required>
                Input:
                The first line contains an integer T, total number of test cases.
                Then follow T lines, each line contains two Integers A and B.
                Output:
                Add A and B and display it.

              </textarea>
            </div>

            <h7>Add constraints:</h7>
            <div class="form-group">
              <textarea id="text-arr" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="5" name="constraints" required>
                Constraints
                *1 ≤ T ≤ 1000
                *1 ≤ A,B ≤ 10000

              </textarea>
            </div>

            <h7>Add sample input:</h7>
            <div class="form-group">
              <textarea id="text-arr" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="5" name="sampleinput" required>
                Sample Input:
                3 
                1 2
                100 200
                10 40

              </textarea>
            </div>

            <h7>Add sample output:</h7>
            <div class="form-group">
              <textarea id="text-arr" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="5" name="sampleoutput" required>
                Sample Output:
                3
                300
                50

              </textarea>
            </div>

            <h7>Add Sample Program that works :</h7>
            <div class="form-group">
              <textarea id="text-arr" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="5" name="samplepgm" required>
			  
              </textarea>
            </div>
            <br>
            
            <lable>No.of testcases: </lable>
            <input type="number" name="nt">
            <br>
            <br>
            <button type="submit" class="btn btn-primary" formaction="addcomp5.php">Add test cases</button>
          </form>
          </div>
        </div>
      </div>
    </div>

</div>
</body>
</html>
