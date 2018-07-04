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
            $e_pwd=$_POST['e_pwd'];
			$emp_type=$_POST['emp_type'];
			$sql="INSERT INTO employee value('$e_id','$e_nm','$e_pwd','$emp_type');";
			if ($link->query($sql) === TRUE) 
         	{
                echo "New record created successfully";
         	} 
         	else 
         	{
             echo "Error: " . $sql . "<br>" . $link->error;
         	}
           }
         $link->close();
?>