<?php 
	function router($destinaiton){
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	header("Location: https://$host$uri/$destinaiton");
	
}
 ?>