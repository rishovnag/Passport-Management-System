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
			$sql="UPDATE  app_info join app_stage on app_info.i_aid = app_stage.s_aid set app_info.pay_amt=250 , app_info.pay_mode='CASH', app_info.a_stage=99 where app_info.i_aid='$s_aid'";
			if ($link->query($sql) == TRUE) 
         	{
                echo "REFUND COMPLETED SUCCESSFULLY";
         	} 
         	else 
         	{
             echo "Error: " . $sql . "<br>" . $conn->error;
         	}
           }
         $link->close();
?>