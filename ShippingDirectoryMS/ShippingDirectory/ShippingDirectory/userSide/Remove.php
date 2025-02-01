<?php
    session_start();
	require 'dbcon.php';
  
 ?>
 
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <title> Sri Lanka Ports Authority - Remove Empty Container</title>
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
  
            <?php
            if(isset($_GET['id']))
            {
                $id = mysqli_real_escape_string($con, $_GET['id']);
                $query = "SELECT * FROM form_responses WHERE id='$id' ";
                $query_run = mysqli_query($con, $query);

                if(mysqli_num_rows($query_run) > 0)
                {
                    $student = mysqli_fetch_array($query_run);
            ?>
			<form name="form" action="code.php" method="post"
				onsubmit="return validate()">
				<span class="addTitle">REMOVE </span>
				<div class="ecfrom">
					<div class="leftForm">
                    <input type="hidden" name="id" value="<?= $student['id']; ?>">
					<label>Company Name :</label>
						<input type="text" name="companyname" class="formInput"
						value="<?=$student['companyname'];?>"
							placeholder="Company Name" />
						
							

							<label>Name:</label>
						<input type="text" name="name" class="formInput"
						value="<?=$student['name'];?>"
							placeholder="Name" autocomplete />

							<label> Address:</label>
						<input type="text" name="address" class="formInput"
						value="<?=$student['address'];?>"
							placeholder="Address" autocomplete />

							
							<label> Certified:</label>
						<input type="text" name="certified" class="formInput"
						value="<?=$student['certified'];?>"
							placeholder="Certified" />

							<label>Website :</label>
						<input type="text" name="website" class="formInput"
						value="<?=$student['website'];?>"
							placeholder="Website" />

							<label>Home Address :</label>
						<input type="text" name="homeaddress" class="formInput"
						value="<?=$student['homeaddress'];?>"
							placeholder="Home Address" />
							
					</div>

					<div class="rightForm">
					<label> Catagory Name:</label>
						<input type="text" name="categoryName" class="formInput"
						value="<?=$student['categoryName'];?>"	
						placeholder="Category Name" />
						
						

						<label>Email :</label>
						<input type="text" name="email" class="formInput"
						value="<?=$student['email'];?>"	
							placeholder="Enter Email" />

						<label>tell :</label>
						<input type='text' name="tell"  class="formInput"
						value="<?=$student['tell'];?>"	 placeholder="Enter Tell">

                        <label>Fax :</label>
						<input type="text" name="fax" class="formInput" 
						value="<?=$student['fax'];?>"	placeholder="Enter Fax" />

                        <label>Category Type :</label>
                        <input type="text" name="categoryType" class="formInput"
						value="<?=$student['categoryType'];?>"	 placeholder="Category Type">
						<label>Link Name :</label>
							<input type="text" name="linkname" class="formInput"
						value="<?=$student['linkname'];?>"
							placeholder="Link Name" />
							<label>Link URL :</label>
							<input type="text" name="link" class="formInput"
						value="<?=$student['link'];?>"
							placeholder="Link Name" />
				</div>
                            

					<!-- <div>
						<%=(request.getAttribute("errMessage") == null) ? "" : request.getAttribute("errMessage")%>
					</div> -->

				</div>
				<div class="formBtn">
					<button type="reset" class="reBtn" style="color:white;font-weight: bold;font-size: 16px;">RESET</button>
					<button type="submit" style="color:white;font-weight: bold;font-size: 16px;" value="submit" name="remove_shippingDirectoryDetails" class="addBtn">REMOVE CONTAINER</button>
				</div>
			</form>
			<?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
		</div>
	</div>



	<!-- include footer -->
	<?php include 'footer.php'; ?>

</body>
</html>