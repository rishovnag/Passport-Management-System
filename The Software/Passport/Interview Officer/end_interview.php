<?php
		session_start();
		$link = mysqli_connect("localhost","root","","sys_passport");
		if (!$link) {
    	die('Could not connect: ' . mysqli_error($link));
		}
		$eid = $_SESSION['eid'];
		$s_aid = $_SESSION['s_aid'];
		if ($_SERVER['REQUEST_METHOD']=='POST')	
        {
			$comment=$_POST['comment'];
			$sql="UPDATE app_stage join app_info on app_stage.s_aid=app_info.i_aid set app_stage.p4_e_time=now() , app_stage.p4_comm='$comment', app_info.a_stage=5 where app_stage.s_aid='$s_aid'";
			if ($link->query($sql) == TRUE) 
         	{
                echo "INTERVIEW COMPLETED SUCCESSFULLY";
         	} 
         	else 
         	{
             echo "Error: " . $sql . "<br>" . $conn->error;
         	}
           }
         $link->close();
?>