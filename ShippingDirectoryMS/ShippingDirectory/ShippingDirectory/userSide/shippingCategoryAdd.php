<?php 
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['user'])) {
    header('location:adminLogin.php');
    exit();
}



	$db = mysqli_connect("localhost", "root", "","shippingdirectorydb");
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
	   }

	   $categoryQuery = mysqli_query($db, "SELECT categoryName FROM categorynamelist");
       

?>

 
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <title> Sri Lanka Ports Authority</title>
    <!-- viewport meta -->
    <link rel="icon" type="image/x-icon" href="https://www.slpa.lk//favicon.ico" />

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

<!-- CSS -->
<style>
<?php include 'css/shippingCategoryAdd.css';?>
</style>

<script>
	
		function validate() {
    var companyname = document.form.companyname.value;
    var name= document.form.name.value;
    var address = document.form.address.value;
    var certified = document.form.certified.value;
    var categoryName = document.form.categoryName.value;
    var email = document.form.email.value;
    var tell = document.form.tell.value;
    var fax = document.form.fax.value;
    var website = document.form.website.value;
    var linkname = document.form.linkname.value;
    var link = document.form.link.value;

    if (companyname == "") {
        
    }
    if (name == "") {
        
    }
    if (address == "") {
    }
    if (certified == "") { 
    }
    if (categoryName == "") {
        
    }
    if (email == "") {
        
    }
    if (tell == "") {
        
    }
    if (fax == "") {
        
    }
    if (website == "") {
        
    }
    if (homeaddress == "") {
        
    }
    if (linkname == "") {
        
    } 
    if (link == "") {
        
    }

    // If you don't want to prevent form submission even with blank fields
    return true; 
}

	
	
</script>

</head>
<body>


	<!-- include header -->
	<?php include 'headerLogoutt.php';?>



	<div class="ecContainer">
	<?php include('messages.php'); ?>
		<div class="ecContent">
			<div class="addImg">
				<img alt="" src="image/Container-Ship.png">
			</div>

			<form name="form" action="code.php" method="post"
				onsubmit="return validate()">
				<span class="addTitle">ADD SHIPPING DIRECTORY  DETAILS</span>
				<div class="ecfrom">
					<div class="leftForm">
						<label>Company Name :</label>
						<input type="text" name="companyname" class="formInput"
							placeholder="Company Name" />

							<label> Name:</label>
                             <input type="text" name="name" class="formInput" placeholder=" Name" />

                             <label> Address:</label>
                             <input type="text" name="address" class="formInput"placeholder="Address" >	
                             <label> certified:</label>
                             <input type="text" name="certified" class="formInput"placeholder="Certified" >	
                             <label>Website :</label>
						<input type="text" name="website" class="formInput"
							placeholder="Enter Website" />
                            <label>Home Address :</label>
						<input type="text" name="homeaddress" class="formInput"
							placeholder="Enter Home Address" />

					</div>

					<div class="rightForm">
                        
						<label> Catagory Name:</label>
						<select name="categoryName" class="formInput" placeholder="Category Name">
                           <option value="" disabled selected>Category Name</option>
                          <?php
                             while($row = mysqli_fetch_array($categoryQuery)){
                                ?>
                                   <option value="<?php echo $row['categoryName']; ?>"> 
                                         <?php echo $row['categoryName']; ?>
                                   </option>
                                       <?php
                                                }
                                                    ?>
                                        </select>


						<label>Email :</label>
						<input type="text" name="email" class="formInput"
							placeholder="Enter Email" />

						<label>tell :</label>
						<input type='text' name="tell"  class="formInput" placeholder="Enter Tell">

                        <label>Fax :</label>
						<input type="text" name="fax" class="formInput" placeholder="Enter Fax" />

                        
                        <label>Link Name:</label>
            <input type="text" name="linkname" class="formInput" placeholder="Enter Link Name" />

            <label>Link URL:</label>
            <input type="text" name="link" class="formInput" placeholder="Enter Link URL" />

								
					</div>
				</div>
				<div class="formBtn">
					<button type="reset" class="reBtn" style="color:white;font-weight: bold;font-size: 16px;">RESET</button>
					<button type="submit"  style="color:white;font-weight: bold;font-size: 16px;" value="submit" name="save_student" class="addBtn">ADD Details</button>
				</div>
			</form>
		</div>
	</div>



	<!-- include footer -->
	<?php include 'footer.php'; ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>