
<?php
require 'connection.php';
$emailid=$_POST['username'];
$a=uniqid();
$b=rand();
$s=$a.$b;
$msg="Click on the given link to reset your password http://localhost/crazy/trendy/forgetpass.php?id=$s .This Link will expire in 10 minutes.";

$msg=wordwrap($msg,50);
$quer="select * from `user` where email_id='$emailid'";
        $result=mysqli_query($connection,$quer) or die(mysqli_error($connection));
        $count=mysqli_num_rows($result);
        if($count==1){
            if(mail($emailid,"Reset Link",$msg,'From: visvig66@gmail.com')){
               $query=$connection->prepare("insert into `fpass`(email_id,uniqstr) values(?,?)");
			   $query->bind_param('ss',$emailid,$s);
			   $query->execute();
			   echo "Mail has been sent";
            }
	        else
			   echo "fail";
        }
        else{
		
             $error ='Not Registered, Please Sign Up';
			 header('location: '."forgetpass.php?error=$error");
		}
?>