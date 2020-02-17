<?php
require 'connection.php';
$emailid=$_POST['username'];
$password=trim($_POST['pass1']);
$query="update `user` set password='$password' where email_id='$emailid'";
$result=mysqli_query($connection,$query) or die(mysqli_error($connection));
if($result){
	echo "Successfully password changed";
}
?>
