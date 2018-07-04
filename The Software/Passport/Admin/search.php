<?php
$link = mysqli_connect("localhost","root","","sys_passport");
	    if (!$link)
        {
    	   die('Could not connect: ' . mysqli_error($link));
	   }      
               /*echo "Connected Successfully";*/
			   
$e_id=$_REQUEST['e_id'];
$sql="SELECT * FROM employee WHERE eid='$e_id'";
$result=$link->query($sql);
$row = mysqli_fetch_assoc($result);
$json = $row;
print (json_encode($json));
?>