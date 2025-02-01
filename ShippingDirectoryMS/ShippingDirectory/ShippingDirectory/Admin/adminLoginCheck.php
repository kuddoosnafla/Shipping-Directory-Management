<?php
session_start();


$con = mysqli_connect('localhost', 'root' );
if($con){
	echo "conenction successful";
}else{
	echo "no connection";
}

$db = mysqli_select_db($con, 'shippingdirectorydb');

if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = " select * from adminlogin where username='$username' and password='$password' ";
	$query = mysqli_query($con,$sql);

	$row = mysqli_num_rows($query);
		if($row == 1){
			echo "login successful";
			$_SESSION['user'] = $username;
			header('location:adminhome.php');
		}else{
			echo "login failed";
			header('location:adminLogin.php');
		}

}
