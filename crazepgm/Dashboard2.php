<?php
require 'connection.php';
$admin = $_SESSION['admin'];
if($admin == null)
{
  header("Location: Login&Registration.php");
}
$_SESSION['admin']=$admin;
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
    
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/Dashboard.css"><div id="formFooter">
  
  <title>Leaderboard</title>
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
  <a href="Dashboard.php" id="hell" active>Leaderboard</a><br>
  <a href="event.php">Events</a><br>
  <a href="addcomp.php">Add Competition</a><br>
  <a href="changewei.php">Change weightage</a><br>
  <a href="checkwei.php">Current weightage</a><br>
  <a href="feedback.php">Feedback</a><br>
</div>


<div class="main">
  <form method="POST" action="#">
<label>Choose the event name:</label><br><br>
<div class="form-check">
  <?php
  $sel="SELECT ename from event";    //quesry to reterive event names to be display
  $res=mysqli_query($conn,$sel) or die(mysqli_error($result));
  $r=mysqli_num_rows($res);
                  if ($r > 0) {
// output data of each row
                while($row = mysqli_fetch_assoc($res)) { ?>
  <input type="radio" class="form-check-input" name="radio"  value="<?php echo $row['ename']  ?>">
  <label class="form-check-label" for="Event name"> <?php echo $row['ename'] ?> </label><br>
<?php } }
  ?>

</div>
<br><br>
<input type="submit" name="submit" value="submit">
</form>
<?php
  if(isset($_POST['radio']))
  {
$eventname=$_POST['radio'];
?>
<div class="row" id="contain-card">
      <div class="col-md-6">
        <div class="card " style="margin:20px 15px 20px 15px">
          <div class="card-header text-right" style="background:#ffa852;color:#fff">
           
          <b> <?php echo $_POST['radio'] ?></b>
          </div>
          <div class="card-body">
            <h2 class="ui-title text-sec-headline-xs">Leaderboard Score</h2>
            <table class="table ">
              <thead class="thead-dark">
                  <tr>
                    <th scope="col">Rank</th>
                    <th scope="col">Username</th>
                    <th scope="col">Marks</th>
                  </tr>
                </thead>
                <tbody>
                   <?php
                  $sql="SELECT u.name, s.escores from user u , scores s , event e where s.u_id=u.u_id and e.e_id=s.e_id and e.ename='$eventname' order by(escores) desc"; //query to reterive user names and their scores to display
                  $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

                  $r=mysqli_num_rows($result);
                    $i=1;
                  if ($r > 0) {
// output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                  echo "<tr><td>" . $i. "</td><td>" . $row["name"] . "</td><td>" . $row["escores"]. "</td></tr>";
                  $i=$i+1;
                }
                  } else { echo "0 results";}  }
                  ?>

                </tbody>
              </table>
          </div>
</div>
</div>
</div
><br>

          </div>



</body>
</html>
