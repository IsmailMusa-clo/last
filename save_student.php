<?php
	include 'admin/db_connect.php';
		extract($_POST);
		if(empty($id)){
					
		}else{
			$save=$conn->query("UPDATE `student` set firstname='$firstname',middlename='$middlename',lastname='$lastname',year_acadmic='$year_acadmic',department='$department',password='$password' where id = $id ") ;
				if($save){
						echo json_encode(array('status'=>1,'msg'=>"Data successfully Updated"));
				}
		}	

$conn->close();