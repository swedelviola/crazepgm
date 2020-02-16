<?php

session_start();
$eid = $_SESSION['eid'];
$username = $_SESSION['username'];
$_SESSION['username']=$username;
$_SESSION['eid']=$eid;

if($eid == null)
  header("Location : index.php");

include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel=”stylesheet” href=”css/bootstrap.css”>
<link rel=”stylesheet” href=”css/bootstrap-responsive.css”>
  <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="file:///C:/Users/sonar/Downloads/bootstrap-4.3.1-dist/css/bootstrap.min.css">

  <script type="text/javascript" src="file:///C:/Users/sonar/Downloads/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>


  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/Dashboard.css"><div id="formFooter">
  
  <title>Check weightage</title>
</head>
<body>

	<nav class="navbar navbar-dark navbar-expand-sm fixed-top" style="background:#232f34">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#" style="color:#ffa852">Crazy Programming <br><h3 >Admin</h3> </a>
      <li>
        <a onClick="logout()" id="log" href="Login.html" class="navbar-brand pull-right" style="color:#F0F0F0"  >Logout</a>
    </li>
    </div>
  </nav>


  <div class="sidenav">
    <br><br>
  <a href="Dashboard.php" >Leaderboard</a><br>
  <a href="event.php" >Events</a><br>
  <a href="addcomp.php" >Add Competition</a><br>
  <a href="changewei.php" >Change weightage</a><br>
  <a href="checkwei.php" id="hell" active>Current weightage</a><br>
  <a href="feedback.php">Feedback</a><br>
</div>
<br>
<br>
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
                  if ($r > 0) {
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
  
</body>

</html>