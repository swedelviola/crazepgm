<?php
require 'connection.php';
session_start();
$error="";
if(!empty($_POST['username']) and !empty($_POST['password'])){
		$username=trim($_POST['username']);
        $password=trim($_POST['password']);
        if($username == "admin@crazyprog")
        {
            if($password == "super-strong-password")
            {
                $_SESSION['admin'] = $username;
                header('location: '.'addcomp.php');
            }
            else
            {
                $error = "Wrong password!!";
                header('location: '."Login&Registration.php?error2=$error");
            }
        }
        else
        {
            $username=trim($_POST['username']);
            $password=trim($_POST['password']);
            $query=$connection->prepare("select * from `user` where email_id=? and password=?");
            $query->bind_param("ss",$username,$password);
            $query->execute();
            $result=$query->get_result();
            $count=mysqli_num_rows($result);
            if($count==1){
                    $row=mysqli_fetch_assoc($result);
                    if($row['verified']==1){
                    $_SESSION['uid']=$row['u_id'];
                    $_SESSION['username'] = $username;
                    header('location: '.'index.php');
                    }
                    else{
                      $error="please verify your email id";
                      header('location: '."Login&Registration.php?error2=$error");
                    }
            }
            else{
            
                 $error ='Invalid Login Credentials';
                 header('location: '."Login&Registration.php?error=$error");
            }
        }
    }
    else{
        $error= "Enter valid username and password";
        header('location: '."Login&Registration.php?error=$error");
    }
?>