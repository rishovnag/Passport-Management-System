<?php
		session_start();
		$link = mysqli_connect("localhost","root","","sys_passport");
		if (!$link) {
    	die('Could not connect: ' . mysqli_error($link));
		}
		$eid = $_SESSION['eid'];
		$aid = $_SESSION['aid'];
		if ($_SERVER['REQUEST_METHOD']=='POST')	
        {
			
			$sql="UPDATE app_info set a_stage=20 where i_aid='$aid'";
			if ($link->query($sql) === TRUE) 
         	{
                echo "APPLICATION CANCELLED";
         	} 
         	else 
         	{
             echo "Error: " . $sql . "<br>" . $conn->error;
         	}
           }
         $link->close();
?>