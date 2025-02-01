<?php
session_start();
require 'dbcon.php';

if(isset($_POST['update_shippingDirectoryDetails']))
{
     $id = mysqli_real_escape_string($con, $_POST['id']);

    $companyname = mysqli_real_escape_string($con, $_POST['companyname']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $certified = mysqli_real_escape_string($con, $_POST['certified']);
    $categoryName = mysqli_real_escape_string($con, $_POST['categoryName']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $tell = mysqli_real_escape_string($con, $_POST['tell']);
    $fax = mysqli_real_escape_string($con, $_POST['fax']);
    $website = mysqli_real_escape_string($con, $_POST['website']);
    
    $homeaddress = mysqli_real_escape_string($con, $_POST['homeaddress']);
    $linkname = mysqli_real_escape_string($con, $_POST['linkname']); // New: link name
    $link = mysqli_real_escape_string($con, $_POST['link']);

    $query = "UPDATE form_responses SET companyname='$companyname', name='$name', address='$address', certified='$certified', categoryName='$categoryName', email='$email', tell='$tell', fax='$fax', website='$website', homeaddress='$homeaddress', linkname='$linkname', link='$link'  WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Shipping Directory Updated Successfully";
        header("Location: home.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Shipping Directory Not Updated";
        header("Location: home.php");
        exit(0);
    }

}

if(isset($_POST['save_student']))
{
    $companyname = mysqli_real_escape_string($con, $_POST['companyname']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $certified = mysqli_real_escape_string($con, $_POST['certified']);
    $categoryName = mysqli_real_escape_string($con, $_POST['categoryName']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $tell = mysqli_real_escape_string($con, $_POST['tell']);
    $fax = mysqli_real_escape_string($con, $_POST['fax']);
    $website = mysqli_real_escape_string($con, $_POST['website']);
  
    $homeaddress = mysqli_real_escape_string($con, $_POST['homeaddress']);
    $linkname = mysqli_real_escape_string($con, $_POST['linkname']); // New: link name
    $link = mysqli_real_escape_string($con, $_POST['link']);    

    $query = "INSERT INTO form_responses (companyname,name,address,certified,categoryName,email,tell,fax,website,homeaddress,linkname,link) VALUES('$companyname','$name','$address','$certified','$categoryName','$email','$tell','$fax','$website', '$homeaddress',' $linkname','$link')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "directory details Insert Successfully";
        header("Location:shippingCategoryAdd.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "directory details Not Inserted";
        header("Location: shippingCategoryAdd.php");
        exit(0);
    }
}

if(isset($_POST['save_categoryList']))
{    $categoryName = mysqli_real_escape_string($con, $_POST['categoryName']);
   

    $query = "INSERT INTO categorynamelist (categoryName) VALUES ('$categoryName')";
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        header("Location: addCatagory.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Category Name Not Created";
        header("Location: addCatagory.php");
        exit(0);
    }
}


if(isset($_POST['save_categoryType']))
{     $categoryType = mysqli_real_escape_string($con, $_POST['categoryType']);

    $query = "INSERT INTO categoryType (categoryType) VALUES ('$categoryType')";
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        header("Location: addCatagoryType.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Category type Not Created";
        header("Location: addCatagoryType.php");
        exit(0);
    }
}

if(isset($_POST['remove_shippingDirectoryDetails'])) 
{
    
    $id = mysqli_real_escape_string($con, $_POST['id']);

    
    $query = "DELETE FROM form_responses WHERE id='$id' ";
    $query_run = mysqli_query($con, $query); 

 
    if($query_run)
    {
        $_SESSION['message'] = "Shipping Directory Removed Successfully";
        header("Location: home.php");
        exit(0);
    }
    else
    {
        
        $_SESSION['message'] = "Shipping Directory Not Removed";
        header("Location: home.php");
        exit(0);
    }
}
else 
{
    
    $_SESSION['message'] = "Invalid Request";
    header("Location: home.php");
    exit(0);
}

?>


?>