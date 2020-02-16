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
		<form action="sndmail.php" method="POST">
			<h1>Reset Password</h1>
			<br>
			<h3>Enter Your Email id</h3>
                        <input type="text" name="username" placeholder="Email id" required />
						<br>
                        <button type="submit" id="submit">Submit</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Forgot password?</h1>
				<p>No worries! Just set a new password and login again :)</p>
				<button class="ghost" id="signIn">Sign In</button>
				<br>
				<h3 style="color:red"><?php
              if(isset($_GET['error'])){
				echo $_GET['error'];
			 }
			?></h3>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Forgot password?</h1>
				<p>Just enter your Email_id and we will send you a link to reset password :)</p>
                                
			</div>
		</div>
	</div>
</div>
<script src="main.js"></script>

</body>
</html>