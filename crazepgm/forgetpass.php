<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<link
	rel ="stylesheet"
	href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
``	integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhnd0JK28anvf"
	crossorigin="anonymous"
/>

<link rel="stylesheet" href="css/forgetpass.css" />
<title>Slider form</title>
</head>
<body>
	<div class="container" id="container">
	<div class="form-container sign-in-container">
		<form action="changepass.php" method="POST">
			<h1>Change Password</h1>
			<?php
			require 'connection.php';
			if(isset($_GET['e'])){
				$email=$_GET['e'];
				$query="select * from `user` where email_id='$email'";
				$result=mysqli_query($connection,$query) or die(mysqli_error($connection));
				$count=mysqli_num_rows($result);
				if($count==1){
						echo "<input type='hidden' name='username' value='$email'>";
					}
				else{	
					header('location: '."Login&Registration.php");
				}
			}
			else 
				header('location: '.'Login&Registration.php');
			?>
                        <input type="password" name="pass1" placeholder="New Password" id="pass1" onkeyup='check();' required />
			<input type="password" name="pass2" placeholder="Retype Password" id="pass2" onkeyup='check();' required />
			<span id='mess'></span>
			<br>
			 <h3 style="color:red"><?php
              if(isset($_GET['error'])){
				echo $_GET['error'];
			 }
			?></h3>
			<br>
                        <button type="submit" id="submit" disabled>Set Password</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Forgot password?</h1>
				<p>No worries! Just set a new password and login again :)</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Forgot password?</h1>
				<p>No worries! Just set a new password and login again :)</p>
                                
			</div>
		</div>
	</div>
</div>
<script src="main.js"></script>
<script>
function check() {
  if (document.getElementById('pass1').value == document.getElementById('pass2').value) {
    document.getElementById('mess').style.color = 'green';
    document.getElementById('mess').innerHTML = '';
	document.getElementById('submit').disabled = false;
  } else {
    document.getElementById('mess').style.color = 'red';
    document.getElementById('mess').innerHTML = 'Password not matching';
	document.getElementById('submit').disabled = true;
  }
}
</script>
</body>
</html>