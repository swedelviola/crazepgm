<!DOCTYPE html>
<?php
session_start();
$username = $_SESSION['username'];
$eid = $_SESSION['eid'];
if($eid == null)
  header("Location: errorQuestion.php");
if( $username == null)
  header("Location: errorLoginPage.php");
include("connection.php");
$_SESSION['eid']=$eid;

// date_default_timezone_set("India");
$current_date=date("Y-m-d H:i:s");


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
          <li class="nav-item"><a class="nav-link" href="leaderboard.php">Leaderboard</a></li>
          <li class="nav-item active"><a class="nav-link" href="index.php"> Events</a></li>
          <li class="nav-item"><a class="nav-link" href="checkWeightage.php">Check Weightage</a></li>
          <li class="nav-item dropdown nav-element-left"><a class="nav-link drop-down-toggle" href="#" id="navbardrop" data-toggle="dropdown"><span class="fa fa-user"></span> <?php echo $username; ?></a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="myAcc.php">My profile</a>
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
          <h1>Weightage</h1>
          <br><br>
          <h5>Event-id: <?php echo $eid; ?></h5>
        </div>
        <div class="col-12 col-sm">
        </div>
      </div>
    </div>
  </header>

  <div  style="background:#F3F7F7">
    <div class="row" id="contain-card">
			
      <div class="main">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Serial No</th>
          <th scope="col">Symbols/Keywords</th>
          <th scope="col">Weightage</th>
        </tr>
      </thead>
      <tbody>
        <?php
  
        $stm="SELECT `alphabets`, `arithmetic_operator`, `assignment_operator`, `bitwise_operator`, `digits`, `dollar`, `underscore`, `relational_operator`, `auto`, `break`, `cases`, `char_val`, `const`, `continue_loop`, `default_val`, `do`, `double_val`, `else_stm`, `enum`, `extern`, `float_val`, `for_loop`, `goto`, `if_stm`, `intval`, `long_val`, `register`, `return_val`, `short`, `signed`, `sizeof`, `static`, `struct`, `switch`, `typedef`, `union_op`, `unsigned_val`, `void`, `volatile`, `while_loop` from weight where e_id=$eid";
        $result=mysqli_query($conn,$stm) or die(mysqli_error($conn));
        $r=mysqli_num_rows($result);
                  if ($r <= 0)
                    header("Location: errorQuestion.php");
                    else {
                     while($row = mysqli_fetch_assoc($result)) {        ?>
                    
        <tr>
          <td>1</td>
        <td>Alphabets</td>
        <td><?php echo $row['alphabets']?></td>
    </tr>
    <tr>
      <td>2</td>
      <td>Arithmetic Operators</td>
        <td><?php echo $row['arithmetic_operator']?> </td>
    </tr>

    <tr>
        <td>3</td>
        <td>Assignment Operator</td>
        <td><?php echo $row['assignment_operator']?> </td>
    </tr>

    <tr>
      <td>4</td>
        <td>Bitwise Operator</td>
        <td><?php echo $row['bitwise_operator']?> </td>
    </tr>

    <tr>
      <td>5</td>
        <td>Digits</td>
        <td><?php echo $row['digits']?> </td>
    </tr>

    <tr>
      <td>6</td>
        <td>Dollar</td>
        <td><?php echo $row['dollar']?></td>
    </tr>

    <tr>
      <td>7</td>
        <td>Underscore</td>
        <td><?php echo $row['underscore']?> </td>
      </tr>

      <tr>
        <td>8</td>
        <td>Relational Operators</td>
        <td><?php echo $row['relational_operator']?> </td>
    </tr>

    <tr>
      <td>9</td>
        <td>auto</td>
        <td><?php echo $row['auto']?> </td>
    </tr>

    <tr>
        <td>10</td>
        <td>break</td>
        <td><?php echo $row['break']?> </td>
    </tr>

    <tr>
      <td>11</td>
        <td>case</td>
        <td><?php echo $row['cases']?> </td>
    </tr>

    <tr>
      <td>12</td>
        <td>char</td>
        <td><?php echo $row['char_val']?> </td>
    </tr>

    <tr>
      <td>13</td>
        <td>const</label>
        <td><?php echo $row['const']?> </td>
    </tr>

    <tr>
      <td>14</td>
        <td>continue</td>
        <td><?php echo $row['continue_loop']?> </td>
    </tr>

    <tr>
      <td>15</td>
        <td>default</td>
        <td><?php echo $row['default_val']?> </td>
    </tr>

    <tr>
      <td>16</td>
        <td>do</td>
        <td><?php echo $row['do']?> </td>
    </tr>

    <tr>
      <td>17</td>
        <td>double</td>
        <td><?php echo $row['double_val']?> </td>
    </tr>

    <tr>
      <td>18</td>
        <td>else</td>
        <td><?php echo $row['else_stm']?> </td>
    </tr>

    <tr>
      <td>19</td>
        <td>enum</td>
        <td><?php echo $row['enum']?> </td>
    </tr>

    <tr>
      <td>20</td>
        <td>extern</td>
        <td><?php echo $row['extern']?> </td>
    </tr>

    <tr>
      <td>21</td>
        <td>float</td>
        <td><?php echo $row['float_val']?> </td>
    </tr>

    <tr>
      <td>22</td>
        <td>for</td>
        <td><?php echo $row['for_loop']?> </td>
    </tr>

    <tr>
      <td>23</td>
        <td>goto</td>
        <td><?php echo $row['goto']?> </td>
    </tr>

    <tr>
      <td>24</td>
        <td>if</td>
        <td><?php echo $row['if_stm']?> </td>
    </tr>

    <tr>
      <td>25</td>
        <td>int</label>
        <td><?php echo $row['intval']?> </td>
    </tr>

    <tr>
      <td>26</td>
        <td>long</td>
        <td><?php echo $row['long_val']?> </td>
    </tr>

    <tr>
      <td>27</td>
        <td>register</td>
        <td><?php echo $row['register']?> </td>
    </tr>

    <tr>
      <td>28</td>
        <td>return</td>
        <td><?php echo $row['return_val']?> </td>
    </tr>

    <tr>
      <td>29</td>
        <td>short</td>
        <td><?php echo $row['short']?> </td>
    </tr>

    <tr>
      <td>30</td>
        <td>signed</td>
        <td><?php echo $row['signed']?> </td>
    </tr>

    <tr>
      <td>31</td>
        <td>sizeof</td>
        <td><?php echo $row['sizeof']?></td>
    </tr>

    <tr>
      <td>32</td>
        <td>static</td>
        <td><?php echo $row['static']?> </td>
    </tr>

    <tr>
      <td>33</td>
        <td>struct</td>
        <td><?php echo $row['struct']?> </td>
    </tr>

    <tr>
      <td>34</td>
        <td>switch</td>
        <td><?php echo $row['switch']?> </td>
    </tr>

    <tr>
      <td>35</td>
        <td>typedef</td>
        <td><?php echo $row['typedef']?> </td>
    </tr>

    <tr>
      <td>36</td>
        <td>union</td>
        <td><?php echo $row['union_op']?> </td>
    </tr>

    <tr>
      <td>37</td>
        <td>unsigned</td>
        <td><?php echo $row['unsigned_val']?> </td>
    </tr>

    <tr>
      <td>38</td>
        <td>void</td>
        <td><?php echo $row['void']?> </td>
    </tr>

    <tr>
      <td>39</td>
        <td>volatile</td>
        <td><?php echo $row['volatile']?> </td>
    </tr>

    <tr>
      <td>40</td>
        <td>while</td>
        <td><?php echo $row['while_loop']?> </td>
      </tr>
    <?php }} ?>
      </tbody>
    </table>

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
