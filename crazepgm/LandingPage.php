<?php 
//GIVE THE NAME OF ERROR MESSAGE CORRECTLY
  session_start();
  if(isset($_SESSION['username']))
    $username = $_SESSION['username'];
  else
    $username = null;
  $_SESSION['username'] = $username;
  if(isset($_GET['status']))
  {
      $status = $_GET['status'];
  }
  else
    $status = 1;
  if($status==0)
  {
    echo "You have successfully logged out"; //style this. This is not being displayed.
  }
 ?>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<link rel="stylesheet" href="css/LandingPage.css" />
<title>First page</title>
</head>
<body>
<div class="container">
  <nav class="navbar">
      <ul>
          <li><a href="#home">Home</a></li>
        <li><a href="index.php"><?php if($username == null){echo "SIGN IN / SIGN UP";} else{ echo "Dashboard";} ?></a></li> 
        <li><a href="#about">About</a></li>
<!--        <li><a href='#rules'>Rules</a></li>  -->
        <li><a href="#sponsors">Sponsors</a></li>
          <li><a href="#contact">Contact</a></li>
          <?php if($username!=null)
                  echo '<li><a href="logout.php">Logout</a></li>';
          ?>
      
            
    </ul>
      </nav>
    <section id="home">
        <h1><b>Welcome Crazy Coder!</b></h1>
    <p class="lead">Code-Innovate-Experiment </p>
  </section>
  <section id="about">
      <h1>About</h1>
      <p class="lead">Crazy programming is all about how effient codes one can write in C. The code which carries the least weight wins!! This encourages the participants to write crazy looking codes, and hence the name of the event! Particiants are given a set of problems for which they'll have to code in C with as less of the programming language constructs as possible! </p>
  </section>
 <section id="rules">
      <h1>Rules</h1>
      <p class="lead">
          <ol>
<li>1. The C code that the user submits should compile with gcc-4.4.6+ (Turbo C shouldn't be used).</li><br>
<li>2. The prize structure will be put up on the website and any disputes regarding the prize money should be addressed to the Analytics Genix Team. </li><br>
<li>3. The live leader board is only for Information purpose and can't be cited as the final reference.</li><br>
<li>4. The decision of the Analytics Genix team shall be final and binding.</li><br>
<li>5. The objective of the event is to test a programmer's ability to write correct code and also to minimize the Code Weight. This is meant to be fun event and not an algorithmic challenge.</li><br>
<li>6. You may try to solve a problem as a team, but then make sure that there is only one submission made for a discussed solution in a contest. Submitting the same solution (even algorithm) by the different members of the team or a discussion group is not fair and only the first submitted code will be considered.</li><br>
</ol>
</p>
  </section>
 
  <section id="sponsors" >
      <h1>Sponsors</h1>
      <p class="lead">This event is sponsored by XYZ, ABC!</p>
  </section>
  <section id="contact">
      <h1>Contact</h1>
      <p class="lead">Contact us at abcd@crazyprogrammers.com for queries</p>
  </section>
</div>
</body>
</html>
