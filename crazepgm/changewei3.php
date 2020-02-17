<?php
require 'connection.php';
session_start();
$admin = $_SESSION['admin'];
if($admin == null)
{
  header("Location: Login&Registration.php");
}
$_SESSION['admin']=$admin;
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
  $ename = $_SESSION['ename'];
    $sql="SELECT e_id from event where ename='$ename'";
    $res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $r=mysqli_num_rows($res);
                  if ($r > 0) {
                    while($row = mysqli_fetch_assoc($res)) {
                      $e_id=$row['e_id'];
                    }
                  }

   
    $stm="UPDATE `weight` set `alphabets`='$a', `arithmetic_operator`='$b', `assignment_operator`='$c', `bitwise_operator`='$d', `digits`='$e', `dollar`='$f', `underscore`='$g', `relational_operator`='$h', `auto`='$i', `break`='$j', `cases`='$k', `char_val`='$l', `const`='$m', `continue_loop`='$n', `default_val`='$o', `do`='$p', `double_val`='$q', `else_stm`='$r', `enum`='$s', `extern`='$t', `float_val`='$u', `for_loop`='$v', `goto`='$w', `if_stm`='$x', `intval`='$y', `long_val`='$z', `register`='$ab', `return_val`='$cd', `short`='$ef', `signed`='$gh', `sizeof`='$ij', `static`='$kl', `struct`='$mn', `switch`='$op', `typedef`='$qr', `union_op`='$st', `unsigned_val`='$uv', `void`='$wx', `volatile`='$yz', `while_loop`='$abc' where e_id=$e_id ";
   // insert into database
    $result =mysqli_query($conn,$stm) or die(mysqli_error($conn));
    $r=mysqli_num_rows($res);
                  if ($r > 0) {
                    header("location:"."changewei.php");
                  } else {
                    header("location:"."changewei.php");
                  }

  ?>    

    
