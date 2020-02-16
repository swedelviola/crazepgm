
<?php
require 'connection.php';
if(!empty($_POST['username']) and !empty($_POST['password']) and !empty($_POST['Name'] and !empty($_POST['cpass']))){
		$username=trim(strtolower($_POST['username']));
        $password=trim($_POST['password']);
		$name=trim($_POST['Name']);
		
        $query="select * from `user` where email_id='$username'";
        $result=mysqli_query($connection,$query) or die(mysqli_error($connection));
        $count=mysqli_num_rows($result);
		$row=mysqli_fetch_assoc($result);
        if($count==1){
			if($row['verified']==1){
			$error="Email id already used. Sign in into your account!";
			}
			else{
				$error="Email id already used. Please Verify!";
	        header('location: '."Login&Registration.php?error2=$error");
			
        }
		}
        else{
			$a=rand();
            $b=rand();
			$d=uniqid();
            $c=$a+$b+54636;
			$c=$c.$d;
		   $query=$connection->prepare("insert into `user`(name,email_id,password,verified) values(?,?,?,?) ");
		   $query->bind_param('ssss',$name,$username,$password,$c);
		   if($query->execute()){
			   $msg="Click on the given link to Activate your account http://localhost/crazy/trendy/activate.php?id=$c";
			   if(mail($username,"Activation Link",$msg,'From: visvig66@gmail.com')){
				   $error="Email is sent to Your Email Id. Please verify by clicking it on the link sent";
               header('location: '."Login&Registration.php?error2=$error");
            }
			else{
				$error="Error ! Try again";
			   header('location: '."Login&Registration.php?error2=$error");
			}
		}
    }
}
    else{
        $error= "Enter valid username and password";
		header('location: '."Login&Registration.php?error2=$error");
    }
?>