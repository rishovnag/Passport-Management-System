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
			
			$sql="UPDATE app_stage join app_info on app_stage.s_aid=app_info.i_aid set app_stage.p6_e_dt=now() , app_info.a_stage=7 where app_stage.s_aid='$s_aid'";
			if ($link->query($sql) == TRUE) 
         	{
				//generate passport number here (insert in the region demarcated )
				$id1=1;
				$sql1 = "SELECT * FROM dum_passport ORDER BY pno DESC LIMIT 1";
				$result = $link->query($sql1);
				if ($result->num_rows > 0)
				{
    
					while($row = $result->fetch_assoc())
					{
						$id2= $row["pno"];
						$id1 = substr($id2, 0,8);
						$id1=$id1+1;		
					}
				}
				else	
					$id1='10000001';
				//end here
				
				$sql2="SELECT * from application where aid='$s_aid'";
				$result = $link->query($sql2);
				if ($result->num_rows > 0)
				{
					$row = $result->fetch_assoc();
					$A_GIVEN_NAME=$row['a_given_name'];
					$A_LAST_NAME=$row['a_last_name'];
					$A_GUARDIAN=$row['a_guardian'];
					$A_SPOUSE=$row['a_spouse'];
					$A_SEX=$row['a_sex'];
					$A_DOB=$row['a_dob'];	
					$A_POB=$row['a_pob']; 
					$A_ADDRESS=$row['a_address'];
					$A_AADHAR=$row['a_aadhar'];
				
					if((strcmp($A_SPOUSE,'')==0) and (strcmp($A_GUARDIAN,'')==0))
					{
						$sql3 = "INSERT INTO dum_passport (pno,p_given_name,p_last_name,	p_sex,	p_dob,	p_pob, p_address,	p_aadhar,p_issue_date) 
						VALUES ( '$id1',	'$A_GIVEN_NAME',	'$A_LAST_NAME',	'$A_SEX',	'$A_DOB',	'$A_POB', '$A_ADDRESS',	'$A_AADHAR',now())";
					}
					elseif (strcmp($A_SPOUSE,'')==0)
					{
						$sql3 = "INSERT INTO dum_passport (pno,p_given_name,p_last_name,p_guardian,	p_sex,	p_dob,	p_pob, p_address,	p_aadhar,p_issue_date) 
						VALUES ( '$id1',	'$A_GIVEN_NAME',	'$A_LAST_NAME','$A_GUARDIAN',	'$A_SEX',	'$A_DOB',	'$A_POB', '$A_ADDRESS',	'$A_AADHAR',now())";
					}
					elseif ( strcmp($A_GUARDIAN,'')==0)
					{
						$sql3 = "INSERT INTO dum_passport (pno,p_given_name,p_last_name,p_spouse,	p_sex,	p_dob,	p_pob, p_address,	p_aadhar,p_issue_date) 
						VALUES ( '$id1',	'$A_GIVEN_NAME',	'$A_LAST_NAME','$A_SPOUSE',	'$A_SEX',	'$A_DOB',	'$A_POB', '$A_ADDRESS',	'$A_AADHAR',now())";
					}
					else
					{
						$sql3 = "INSERT INTO dum_passport (pno,p_given_name,p_last_name,p_spouse,p_guardian	p_sex,	p_dob,	p_pob, p_address,	p_aadhar,p_issue_date) 
						VALUES ( '$id1',	'$A_GIVEN_NAME',	'$A_LAST_NAME','$A_SPOUSE','$A_GUARDIAN',	'$A_SEX',	'$A_DOB',	'$A_POB', '$A_ADDRESS',	'$A_AADHAR',now())";
					} 
					if ($link->query($sql3) == TRUE) 
					{
						
				
						echo "PASSPORT SENT TO BE PRINTED ";
					} 
					else 
					{
						echo "Error: " . $sql . "<br>" . $link->error;
					}
				}
			}
         
		}
		$link->close();
?>