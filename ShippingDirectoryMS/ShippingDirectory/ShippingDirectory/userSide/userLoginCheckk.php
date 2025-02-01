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
	$emp_id = $_POST['emp_id'];
	$password = $_POST['password'];

	$sql = " select * from userregister where emp_id='$emp_id'";
	$query = mysqli_query($con,$sql);

	$row = mysqli_num_rows($query);
		if($row == 1){
			echo "login successful";
			$_SESSION['user'] = $emp_id;
			header('location:home.php');
		}else{
			echo "login failed";
			header('location:userLogin.php');
		}

}
