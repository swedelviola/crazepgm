<?php
require 'connection.php';
$verified=$_GET['id'];
$query=$connection->prepare("select * from `user` where verified=?");
$query->bind_param('s',$verified);
$query->execute();
$result=$query->get_result();
$count=mysqli_num_rows($result);
if($count==1){
$row=mysqli_fetch_assoc($result);
$emailid=$row['email_id'];
$query=$connection->prepare("update `user` set verified='1' where email_id=?");
$query->bind_param('s',$emailid);
if($query->execute()){
   header("location: "."Login&Registration.php");
}
}

?>