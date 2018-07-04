<?php
		session_start();
		$link = mysqli_connect("localhost","root","","sys_passport");
		if (!$link) {
    	die('Could not connect: ' . mysqli_error($link));
		}
		$eid = $_SESSION['eid'];
		$s_aid = $_SESSION['aid'];
		if ($_SERVER['REQUEST_METHOD']=='POST')	
        {
			$comment=$_POST['comment'];
			$sql="UPDATE app_stage join app_info on app_stage.s_aid=app_info.i_aid set app_stage.p2_e_dt=now() , app_stage.p2_comm='$comment' where app_stage.s_aid='$s_aid'";
			if ($link->query($sql) == TRUE) 
         	{
				$sql1="UPDATE app_info set a_stage=3 where i_aid='$s_aid' and a_stage=2";
				if ($link->query($sql1) == TRUE)
				{
					echo "VERIFICATION COMPLETED SUCCESSFULLY";
				} 
				else 
				{
					echo "Error: " . $sql . "<br>" . $link->error;
				}
			}
		}
         $link->close();
?>