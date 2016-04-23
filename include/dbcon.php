<?php 
$config=file_get_contents("config.json",true);
$configValues=json_decode($config,TRUE);
$username=$configValues['db']['username'];
$password=$configValues['db']['password'];
$db=$configValues['db']['db'];
$host=$configValues['db']['host'];
$link=mysqli_connect($host,$username,$password,$db);
if($link->connect_error){
	die("Couldn't connect to Database");
}
