<?php 
include_once('./include/dbcon.php');
include_once('./include/router.php');
$data=$_POST['email'];
$query="SELECT * FROM users WHERE user_email='$data'";
$result= mysqli_query($link,$query);
if($result){
	if(mysqli_num_rows($result)==1){
		session_start();
		$_SESSION['user_email']=$data;
		//router('index.php');
		echo 1;
	}else{
		$query="INSERT INTO users VALUES('$data',default)";
		$result= mysqli_query($link,$query);
		if($result){
		session_start();
		$_SESSION['user_email']=$data;
		// router('index.php');
		echo 1;
		}
	}
}else{
	echo $query;
}
?>