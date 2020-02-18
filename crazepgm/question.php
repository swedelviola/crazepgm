<?php 
//make the slides proper It should be not visible
  include 'connection.php';
  session_start();
  $pid = $_GET['pid'];
  $eid=$_SESSION['eid'];
  $uid=$_SESSION['uid'];
  $username = $_SESSION['username'];
  if($pid == null)
    header("Location: errorQuestion.php");
  if($username == null)
    header("Location: errorLoginPage.php");
  $_SESSION['pid']=$pid;
  $sql="SELECT * FROM `problem` WHERE p_id = $pid";
  $result = $con->query($sql);
  if ($result->num_rows > 0)
  {
    while($row = $result->fetch_assoc())
    {
      $pname=$row['pname'];
      $description=$row['description'];
      $constraints=$row['constraints'];
      $sample_input=$row['sample_input'];
      $sample_output=$row['sample_output'];
      $eid=$row['e_id'];
    }
  }
  else
  {
    header("Location: errorQuestion.php");
  }

//have hidden fields for pid eid uid
 ?>
<!DOCTYPE html>
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
  <script src="js/vendor/modernizr-2.8.3.min.js"></script>
  <script src="js/vendor/jquery-1.12.0.min.js"></script>
  <title></title>
  <style type="text/css" media="screen">
    #editor {
         height: 400px;
         width: 100%;
    }
  ::-webkit-scrollbar {
  width: 5px;
}
 divi{
  background-color: darkgrey;
  width: 300px;
  border: 2px black;
  padding: 50px;
  margin: 20px;
}
</style>
<script>
function ajax_post(){
    var hr = new XMLHttpRequest();
    var url = "subcode.php";
    var code = document.getElementById("text").value;
    var ip = document.getElementById("textfield2").value;
    var cbox=document.getElementById("cbox").value;
  var uid=document.getElementById("uid").value;
  var eid=document.getElementById("eid").value;
  var pid=document.getElementById("pid").value;
  var vars = "text="+encodeURIComponent(code)+"&textfield2="+ip+"&cbox="+cbox+"&eid="+eid+"&pid="+pid+"&uid="+uid;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
      if(hr.readyState == 4 && hr.status == 200) {
        var return_data = hr.responseText;
      document.getElementById("divi").innerHTML ="Output: "+return_data;
      }
    }
    hr.send(vars); // Actually execute the request
    document.getElementById("divi").innerHTML = "Output: processing...";
}
</script>
<script>
function ajax_run(){
    var hr = new XMLHttpRequest();
    var url = "runcode.php";
    var code = document.getElementById("text").value;
    var ip = document.getElementById("textfield2").value;
    var cbox=document.getElementById("cbox").value;
  var uid=document.getElementById("uid").value;
  var eid=document.getElementById("eid").value;
  var pid=document.getElementById("pid").value;
  var vars = "text="+encodeURIComponent(code)+"&textfield2="+ip+"&cbox="+cbox+"&eid="+eid+"&pid="+pid+"&uid="+uid;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
      if(hr.readyState == 4 && hr.status == 200) {
        var return_data = hr.responseText;
      document.getElementById("divi").innerHTML ="Output: "+return_data;
      }
    }
    hr.send(vars); // Actually execute the request
    document.getElementById("divi").innerHTML = "Output: processing...";
}
</script>
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
          <li class="nav-item"><a class="nav-link" href="#">Leaderboard</a></li>
          <li class="nav-item  active"><a class="nav-link" href="/index.html"> Events</a></li>
          <li class="nav-item"><a class="nav-link" href="#"> Rules</a></li>
          <li class="nav-item"><a class="nav-link" href="#">CLock</a></li>
          <li class="nav-item dropdown nav-element-left"><a class="nav-link drop-down-toggle" href="#" id="navbardrop" data-toggle="dropdown"><span class="fa fa-user"></span> <?php echo $_SESSION['username']; ?></a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">.</a>
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
          <h1>Solve Question</h1>
          <br>
          <h4>Event-id: <?php echo $eid ?></h1>
        </div>
        <div class="col-12 col-sm">
        </div>
      </div>
    </div>
  </header>
  <div style="background:#F3F7F7;padding:50px 0px 50px 0px">
    <div class="container">
      <ul class="nav nav-tabs" style="background:#fff">
        <li class="nav-item">
          <a class="nav-link active" href="#question" role="tab1" data-toggle="tab"><b>Question</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#leaderboard" role="tab2" data-toggle="tab"><b>Leaderbord</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#submission" role="tab3" data-toggle="tab"><b>Submission</b></a>
        </li>
      </ul>
      <div class="tab-content"  style="background:#fff">
      <div role="tabl" class="tab-pane fade show active" id="question">
          <h3>Question id: <small><?php echo $pid; ?></small></h3>
          <p><?php echo nl2br($pname); ?></p> <br>
          <p><?php echo nl2br($description); ?></p><br>
          <p><?php echo nl2br($constraints); ?></p><br>
          <p><?php echo nl2br($sample_input); ?></p><br>
          <p><?php echo nl2br($sample_output); ?></p>
      </div>
      <div role="tabpane2" class="tab-pane fade show active" id="leaderboard">
        <?php $stm1="SELECT FIND_IN_SET(pscore, ( SELECT GROUP_CONCAT( pscore ORDER BY pscore) FROM code_table ) ) AS rank FROM code_table where u_id = $uid";
          $result = $con->query($stm1);
          if ($result->num_rows > 0)
          {
            while($row = $result->fetch_assoc())
            { ?>
          <h3>Leaderboard <br><br><small>Your Rank is: <?php echo $row["rank"]; }?><br></small></h3>
          <?php }else
          {
            echo "<h3> You have not submitted yet. Code NOW!!";
          } ?><br>
            

            <div class="main">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Serial No</th>
          <th scope="col">Name</th>
          <th scope="col">Program Weightage</th>
        </tr>
      </thead>
      <tbody>
        <?php
  //STARTED HERE
        $srl_no=1;
        $stm="SELECT u.name,c.pscore from user u, code_table c where c.u_id = u.u_id order by pscore";
        $result=mysqli_query($conn,$stm) or die(mysqli_error($conn));
        $r=mysqli_num_rows($result);
                  if ($r <= 0)
                    echo "<h3> NO SUBMISSIONS YET<h3>";
                    else {
                     while($row = mysqli_fetch_assoc($result)) {        ?>
                    
        <tr>
          <td><?php echo ($srl_no++); ?></td>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['pscore']?></td>
    </tr>
    <?php }} ?>
      </tbody>
    </table>

      </div>
  </div>

<!-- ENDS HERE -->
          
        <div role="tabpane3" class="tab-pane fade show active" id="submission">
          <h3>Submission <br><small>Least Weight correct code:</small></h3>
          <p>
            <?php
              $query="select code from `code_table` where u_id=$uid and e_id=$eid and p_id=$pid";
              if($result=mysqli_query($connection,$query))
              {
                $c=mysqli_num_rows($result);
                if($c!=0)
                {
                  $row=mysqli_fetch_assoc($result);
                  echo nl2br($row['code']);
                }
              }
            ?>
          </p>
        </div>
        
        <!--<div role="tabpane2" class="tab-pane " id="leaderbord">
          <h3>leaderbord <small>.....</small></h3>
          <p> ... </p>
        </div>
        <div role="tabpane3" class="tab-pane " id="submission">
          <h3>Submission <small>.....</small></h3>
          <p> ... </p>-->
        
      </div>
    </div>
     <div class="container" style="margin:50px auto">
      <h2>Input</h2>
    <h3>Do not include any header files</h3>
      <div style="background:#fff;padding:30px">
      </div>
      <!-- <div class="input-group">
        <textarea readonly class="form-control col-12" id="text_compiler" aria-label="With textarea" style="background:#1C2434;overflow:hidden;height:140px">
          #include<stdio.h>
          #include<string.h>
          #include<ctype.h>
          int main()
          {
        </textarea>
        <textarea class="form-control col-12" id="text_compiler" aria-label="With textarea" style="background:#1C2434">
        </textarea>
      </div> -->
      <div id="editor"><?php
      $query="select lastcode from `code_table` where u_id=$uid and e_id=$eid and p_id=$pid";
      if($result=mysqli_query($connection,$query))
      {
        $c=mysqli_num_rows($result);
        if($c!=0)
        {
          $row=mysqli_fetch_assoc($result);
          echo nl2br($row['lastcode']);
        }
      }
    ?>
   </div>
<!-- do not open a form -->
<input type="hidden" name="uid" id="uid" value=<?php echo $uid; ?> >
<input type="hidden" name="pid" id="pid" value=<?php echo $pid; ?> >
<input type="hidden" name="eid" id="eid" value=<?php echo $eid; ?> >
<input type="hidden" name="text" id="text"><br>
<input type="hidden" name="cbox" id="cbox" value="0">
<input type="checkbox" name="checkbox" id="checkbox" onchange="toggleTextArea();" value="0"> Click here to provide custom input
<textarea style="display: none;" class="form-control" name="textfield2" rows="8" cols="100" id="textfield2"></textarea>
<br><br>
<input type="button" name="run" value="Run" onClick="store();ajax_run();">
<input type="submit" name="submit" id="st" value="Submit" onClick="store();ajax_post();">


<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.7/ace.js" type="text/javascript" charset="utf-8"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.session.setMode("ace/mode/c_cpp");
  editor.setShowPrintMargin(false);
  editor.gotoLine(1,1); 
  //editor.setValue("#include<stdio.h>\n#include<ctype.h>");
    var formObj = document.getElementById('text');
function store(){
formObj.value=editor.session.getValue();
}
function toggleTextArea() {
  var theCheck = checkbox;
  var theTextArea = textfield2;
  if(theCheck.checked == true) {
    theTextArea.style.display = "block";
    document.getElementById('cbox').value='1';
  } else {
    theTextArea.style.display = "none";
    theCheck.value=0;
    document.getElementById('cbox').value='0';
  }
}
      </script>
    <br /><br />
<span id="divi" class="divi"></span> <!--make a box or whatever(css) -->
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