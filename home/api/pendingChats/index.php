<?php 
	// db connections
	include '../dbcon.php';
	global $conn;


	// responses
	$status0 = array('status'=>'0');	// no pending chat
	$error1 = array('status'=>'-1');	// updating attr 'received' failed
	$error2 = array('status'=>'-2');	// request parameters empty
	$data = array(); // data contains Node response

	// needs to be taken from the request
	$receiver = 'yash.choukse123@gmail.com';
	$sender = 'aditya@iecse.xyz';


	// check for empty
	if($sender == '' || $receiver == ''){
		echo json_encode($error2);
		exit();
	}

	function getData($rec,$sen){

		global $data;
		global $conn;

		$qry = "SELECT * FROM qmessages WHERE sender = '$sen' AND receiver = '$rec' AND received = 'false'";

		$result = mysqli_query($conn,$qry);
		if(mysqli_num_rows($result) > 0)
		{
			while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
			{
				array_push($data, $row);
				$tmp = $row['time_stamp'];
				// update 'received' attribute
				$qry2 = "UPDATE qmessages SET received = 'true' WHERE sender = '$sen' AND receiver = '$rec' AND time_stamp = '$tmp'";	
				if($result2 = mysqli_query($conn,$qry2))
				{
					//success
					return 1;
				}
				else{
					echo json_encode($error1);
					exit();
				}
			}

		}
		else
		{
			return -1;
		}
	}

	// controller code
	if(getData($receiver,$sender) == 1){
		echo json_encode($data);
	}
	else{
		echo json_encode($status0);
	}
	// getData($sender,$receiver);
	
		
?>