<?php 
session_start();
require 'dbcon.php';

$db = mysqli_connect("localhost", "root", "", "shippingdirectorydb");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

$sql = "SELECT * FROM categorynamelist";
$querycategoryName = mysqli_query($db, $sql);

$categoryName = "SELECT * FROM categorytype";
$querycategoryType = mysqli_query($db, $categoryName);
?>	   
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sri Lanka Ports Authority</title>
    <link rel="icon" type="image/x-icon" href="https://www.slpa.lk//favicon.ico" />
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
            if(isset($_GET['id'])) {
                $id = mysqli_real_escape_string($db, $_GET['id']);
                $query = "SELECT * FROM form_responses WHERE id='$id' ";
                $query_run = mysqli_query($db, $query);

                if(mysqli_num_rows($query_run) > 0) {
                    $rows = mysqli_fetch_array($query_run);
            ?>
            <form name="form" action="code.php" method="post" onsubmit="return validate()">
                <span class="addTitle" style="margin-left: 50px;">UPDATE DETAILS</span>
                <div class="ecfrom">
                    <div class="leftForm">
                        <input type="hidden" name="id" value="<?= $rows['id']; ?>">

                        <label>Company Name :</label>
                        <input type="text" name="companyname" class="formInput" value="<?=$rows['companyname'];?>" placeholder="Company Name" />

                        <label>Name:</label>
                        <input type="text" name="name" class="formInput" value="<?=$rows['name'];?>" placeholder="Name" autocomplete />

                        <label>Address:</label>
                        <input type="text" name="address" class="formInput" value="<?=$rows['address'];?>" placeholder="Address" autocomplete />

                        <label>Certified:</label>
                        <input type="text" name="certified" class="formInput" value="<?=$rows['certified'];?>" placeholder="Certified" />

                        <label>Website:</label>
                        <input type="text" name="website" class="formInput" value="<?=$rows['website'];?>" placeholder="Website" />

                        <label>Home Address:</label>
                        <input type="text" name="homeaddress" class="formInput" value="<?=$rows['homeaddress'];?>" placeholder="Home Address" />
                    </div>

                    <div class="rightForm">
                        <label>Category Name:</label>
                        <select name="categoryName" class="formInput">
                            <option value="">Select a Category</option>
                            <?php
                            while ($row = mysqli_fetch_array($querycategoryName)) {
                                $selected = ($row['categoryName'] === $rows['categoryName']) ? 'selected' : '';
                            ?>
                                <option value="<?= htmlspecialchars($row['categoryName']); ?>" <?= $selected; ?>>
                                    <?= htmlspecialchars($row['categoryName']); ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>

                        <label>Email:</label>
                        <input type="text" name="email" class="formInput" value="<?=$rows['email'];?>" placeholder="Enter Email" />

                        <label>Tell:</label>
                        <input type="text" name="tell" class="formInput" value="<?=$rows['tell'];?>" placeholder="Enter Tell">

                        <label>Fax:</label>
                        <input type="text" name="fax" class="formInput" value="<?=$rows['fax'];?>" placeholder="Enter Fax" />

                   

                        <label>Link Name:</label>
                        <input type="text" name="linkname" class="formInput" value="<?=$rows['linkname'];?>" placeholder="Link Name" />

                        <label>Link URL:</label>
                        <input type="text" name="link" class="formInput" value="<?=$rows['link'];?>" placeholder="Link URL" />
                    </div>
                </div>
                <div class="formBtn">
                    <button type="reset" class="reBtn" style="color:white;font-weight: bold;font-size: 16px;">RESET</button>
                    <button type="submit" style="color:white;font-weight: bold;font-size: 16px;" value="submit" name="update_shippingDirectoryDetails" class="addBtn">UPDATE</button>
                </div>
            </form>
            <?php
                } else {
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
