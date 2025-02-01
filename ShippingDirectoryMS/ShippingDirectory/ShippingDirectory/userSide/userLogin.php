<?php 
session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="ISO-8859-1">
	<title>User Login</title>

	<style>
		<?php include 'css/userLogin.css'; ?>
	</style>

</head>

<body>

	<!-- Include Header -->
	<?php include 'headerLogoutt.php'; ?>

	<div class="containerLogin">
		<div class="loginContent">
			<div class="logImg">
				<img alt="" src="image/user-Login.png">
			</div>

			<div class="form-body">
				<form action="userLoginCheckk.php" method="post">

					<div class="logTitle">
						<span>User Login</span>
					</div>

					<br> 
					<span class="logSubTitle">Login here using your Employee ID and Password</span>
					
					<div class="form-group">
						<label>Employee ID</label> 
						<input type="text"  name="emp_id" class="form-control" placeholder="Enter Employee ID" required="required">
						<small>Don't share your <span class="smMsg">Employee ID and Password</span> with anyone else.</small>
					</div>

					<div class="form-group">
						<label>Password</label> 
						<input  type="password" name="password" class="form-control" placeholder="Password" required="required">
					</div>

					<br>
					<button type="submit" class="loginBtn" name="submit">LOGIN</button>
					Don't have an account? <a href="userRegister.php">Register</a>
				</form>
			</div>
		</div>
	</div>

	<!-- Include Footer -->
	<?php include 'footer.php'; ?>

</body>
</html>
