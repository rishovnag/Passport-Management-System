<?php
		session_start();
		$eidErr=$eid=$e_pwd="";
		$res=" ";
		include "connection.php";
			$conn = OpenCon();
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			
			if (empty($_POST["eid"])) 
				$eidErr = "USER ID is required";
			else
			{
				$eid=$_POST["eid"];
				$e_pwd=$_POST["e_pwd"];
			}
			
			$sql1="SELECT e_pwd,e_type FROM employee WHERE eid='$eid'";
		
			$result=$conn->query($sql1);
				if ($result->num_rows > 0)
				{
					$row = mysqli_fetch_assoc($result);
					
					if(strcmp($row['e_pwd'],$e_pwd)==0)
					{
						$_SESSION['eid']=$eid;
						if ($row['e_type']>=1 and $row['e_type']<=7 )
						echo $row['e_type'];
					}
				}
					else
					{
						
						echo '0';
					}
				
		}
?>		