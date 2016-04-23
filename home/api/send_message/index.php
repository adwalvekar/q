<?php 
session_start();
if(isset($_SESSION['username'])){
		include_once('./include/dbcon.php');
	if(isset($_POST['message'])){
		$username=$_SESSION['username'];
		$receiver=$_POST['receiver'];
		$message=$_POST['message'];
		$timestamp=$_POST['timestamp'];
		$query="INSERT INTO qmessages VALUES(default,'$username','$receiver','$message',NULL,'$timestamp','false','false',NULL)";
		$result=mysqli_query($link,$query);
		if($result){
			echo json_encode(array('status'=>true));
		}else{
			echo json_encode(array('status'=>false,'description'=>'SQL Error'));
			echo $query;
		}
	}
	else if(isset($_POST['Suabmit'])){
		$username=$_SESSION['username'];
		$receiver=$_POST['receiver'];
		$timestamp=$_POST['timestamp'];
		$targetDir=__DIR__.'/uploads';
		$fi = new FilesystemIterator(__DIR__.'/uploads/', FilesystemIterator::SKIP_DOTS);
		$number= iterator_count($fi);
		$dot=".";
		$file=$_FILES["uploadFile"]["name"];
		$resul=explode($dot, $file);
		$ext = end($resul);
		$first = $number+1;
		$target_file= $targetDir.'/'.$first.'.'."$ext";

		move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $target_file);
		$query="INSERT INTO qmessages VALUES(default,'$username','$receiver',NULL,'$target_file','$timestamp','false','false',NULL)";
		$result=mysqli_query($link,$query);
		if($result){
			echo json_encode(array('status'=>true));
		}else{
			echo json_encode(array('status'=>false,'description'=>'SQL Error'));
			echo $query;
		}
	}else{
		echo json_encode(array('status'=>false,'description'=>'Empty Message'));
	}
}else{
	echo json_encode(array('status'=>false,'description'=>'User Not Logged in'));
}
?>
