<?php
	include 'db_connect.php';
		extract($_POST);
		if(empty($id)){
				$i= 1;
				while($i == 1){
					$e_num="";
					$chk  = $conn->query("SELECT * FROM time where id = '$e_num' ")->num_rows;
					if($chk <= 0){
						$i = 0;
					}
				}
				// echo "INSERT INTO `time` VALUES('', '$e_num','$start_time', '$end_time',  '$name')";
				// exit;
				$save=$conn->query("INSERT INTO `time` VALUES('','$name','$start_time', '$end_time')") ;
				if($save){
						echo json_encode(array('status'=>1,'msg'=>"Data successfully Saved"));
				}		
		}else{
			$save=$conn->query("UPDATE `time` set start_time='$start_time',end_time='$end_time',name='$name' where id = $id ") ;
				if($save){
						echo json_encode(array('status'=>1,'msg'=>"Data successfully Updated"));
				}
		}	
$conn->close();