<?php
session_start();

include 'dbconfig.php';
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="ISO-8859-1">
	<title>User Register</title>

	<!-- CSS -->
	<style>
		<?php include 'css/userLogin.css'; ?>
	</style>

</head>

<body>

	<!-- include header -->
	<?php include 'header.php'; ?>
	<!-- include navBar -->


	<div class="containerLogin">

		<div class="loginContent">
			<div class="logImg">
				<img alt="" src="image/user-Login.png">
			</div>

			<div class="form-body">
				<form action="userRegisterCheck.php" method="post">

					<div class="logTitle">
						<span>user Register</span>
					</div>
					
					
                    <div class="form-group">
					
                 <label>Employee ID</label>
                   <input type="text" name="emp_id" class="form-control" placeholder="Enter Employee Id" required="required">
                  </div>
                    <div class="form-group">
						<label >Name</label> <input type="text" name="name" class="form-control" placeholder="Enter your Name" required="required"> 	
					</div>
					<div class="form-group">
						<label >Password</label> <input type="password" name="password" class="form-control"  placeholder="Password" required="required">
					</div>

					<br>
					<button type="submit" class="loginBtn" name="submit">Register</button>
                    Already have an account? <a href="userLogin.php">Login</a>
				</form>
			</div>
		</div>
	</div>

	<!-- include footer -->
	<?php include 'footer.php'; ?>


</body>

</html>