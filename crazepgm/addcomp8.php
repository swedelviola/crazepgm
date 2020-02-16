<?php 

//   $admin = $_SESSION['admin'];
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
  <!--<link rel="stylesheet" type="text/css" href="/home/shru/Downloads/bootstrap-4.3.1-dist/css/bootstrap.min.css">
  <script type="text/javascript" src="/home/shru/Downloads/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>-->
  
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
                3 
                1 2
                100 200
                10 40
              </textarea>
            </div>

            <h7>Add sample output:</h7>
            <div class="form-group">
              <textarea id="text-arr" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="5" name="sampleoutput" required>
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
