<?php
    session_start();
	$link = mysqli_connect("localhost","root","","sys_passport");
	if (!$link) {
    	die('Could not connect: ' . mysqli_error($link));
	}
	$eid = $_SESSION['eid'];
	$s_aid=$_SESSION['s_aid'];
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$sql2="UPDATE app_stage SET p4_eid='$eid', p4_s_time=now() where p4_eid IS NULL and s_aid='$s_aid'";
		if ($link->query($sql2) === TRUE) 
         	{
                echo "INTERVIEW STARTED";
         	} 
         	else 
         	{
             echo "Error: " . $sql . "<br>" . $conn->error;
         	}
	}
?>