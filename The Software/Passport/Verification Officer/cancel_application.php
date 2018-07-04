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
			$sql="UPDATE app_stage join app_info on app_stage.s_aid=app_info.i_aid set app_stage.p6_e_dt=now() , app_info.a_stage=60 where app_stage.s_aid='$s_aid'";
			if ($link->query($sql) == TRUE) 
         	{
                echo "APPLICATION CANCELLED";
         	} 
         	else 
         	{
             echo "Error: " . $sql . "<br>" . $link->error;
         	}
           }
         $link->close();
?>