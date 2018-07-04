<?php
        $link = mysqli_connect("localhost","root","","sys_passport");
	    if (!$link)
        {
    	   die('Could not connect: ' . mysqli_error($link));
	   }
		if ($_SERVER['REQUEST_METHOD']=='POST')	
        {
			$e_id=$_POST['e_id'];
			$e_nm=$_POST['e_nm'];
			$emp_type=$_POST['emp_type'];
			$sql="UPDATE employee set e_name='$e_nm', e_type='$emp_type' where eid='$e_id';";
			if ($link->query($sql) === TRUE) 
         	{
                echo "RECORD UPDATED SUCCESSFULLY";
         	} 
         	else 
         	{
             echo "Error: " . $sql . "<br>" . $link->error;
         	}
           }
         $link->close();
?>