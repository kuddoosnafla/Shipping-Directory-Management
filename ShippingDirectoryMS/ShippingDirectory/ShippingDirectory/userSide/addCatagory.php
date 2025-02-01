<?php
session_start();

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION['user'])) {
    header('location:userLogin.php'); // Redirect to login page if not logged in
    exit();
}


// Database connection
include('dbcon.php');


?>


<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <title> Sri Lanka Ports Authority - Insert Category List</title>
    <!-- viewport meta -->
    <link rel="icon" type="image/x-icon" href="https://www.slpa.lk//favicon.ico" />

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

	<!-- CSS -->
	<style>
		<?php include 'css/addCategory.css'; ?>
	</style>

	<script>
		function validate() {
			var categoryName = document.form.categoryName.value;

			if (categoryName == null || categoryName == "") {
				alert("category-Name can't be blank");
				return false;
			}
		}
	</script>

</head>

<body>


	<!-- include header -->
	<?php include 'headerLogoutt.php'; ?>


	<div class="categoryList">
		<?php include('messages.php'); ?>
		<div class="content">
			<form name="form" action="code.php" method="post" onsubmit="return validate()">
				<span class="categoryListTitle">ADD SHIPPING DIRECTORY CATEGORY DETAILS</span>
				<div class="categoryForm">
				



						
				

					<div class="rightForm">

						<label> Category Name :</label>
						<input type="text" name="categoryName" class="formInput" placeholder="Enter Category Name" />

					</div>

					<!-- <div>
						<%=(request.getAttribute("errMessage") == null) ? "" : request.getAttribute("errMessage")%>
					</div> -->

				</div>
				<div class="formBtn">
					<button type="reset" class="reBtn" style="color:white;font-weight: bold;font-size: 16px;">RESET</button>
					<button type="submit" value="submit" name="save_categoryList" class="addBtn" style="color:white;font-weight: bold;font-size: 16px;">SAVE CATEGORY-NAME</button>
				</div>
			</form>
		</div>
	</div>



	<!-- include footer -->
	<?php include 'footer.php'; ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>