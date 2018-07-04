<?php

    /* Attempt MySQL server connection. Assuming you are running MySQL

    server with default setting (user 'root' with no password) */
	session_start();
    $link = mysqli_connect("localhost", "root", "", "sys_passport");

     
	$eid=$_SESSION['eid'];
    // Check connection

    if($link === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }
    
	$A_ID=$_SESSION["a_id"] ;
	
	$A_GIVEN_NAME = $_SESSION['A_GIVEN_NAME'];
	
	$A_LAST_NAME = $_SESSION['A_LAST_NAME'];
	
	$A_POB = $_SESSION['A_POB'];
	
	$A_GUARDIAN = $_SESSION['A_GUARDIAN'];

	$A_SPOUSE = $_SESSION['A_SPOUSE'];

	$A_B_NO = $_SESSION['A_B_NO'];

	$A_CITY = $_SESSION['A_CITY'];

	$A_STATE = $_SESSION['A_STATE'];

	$A_PIN = $_SESSION['A_PIN'];

	$A_AADHAR = $_SESSION['A_AADHAR'];
    
	
	$A_SEX = $_SESSION['A_SEX'];
    
    $A_DOB = $_SESSION['A_DOB'];

	$A_PIN=trim($A_PIN," ");
	$A_AADHAR=trim($A_AADHAR," ");
	$A_ADDRESS =  $A_B_NO . "  " . $A_CITY ."  ". $A_STATE ."  ". $A_PIN;

	$A_TYPE1=$_SESSION["type"];
	if((strcmp($A_SPOUSE,'')==0) and (strcmp($A_GUARDIAN,'')==0))
	{
		$sql = "INSERT INTO application (aid,	a_type,	a_given_name,	a_last_name,	a_sex,	a_dob,	a_pob, a_address,	a_aadhar) 
	VALUES ( '$A_ID',	'$A_TYPE1',	'$A_GIVEN_NAME',	'$A_LAST_NAME',	'$A_SEX',	'$A_DOB',	'$A_POB', '$A_ADDRESS',	'$A_AADHAR')";
	}
	elseif (strcmp($A_SPOUSE,'')==0){
    $sql = "INSERT INTO application (aid,	a_type,	a_given_name,	a_last_name,	a_sex,	a_dob,	a_pob,	a_guardian,		a_address,	a_aadhar) 
	VALUES ( '$A_ID',	'$A_TYPE1',	'$A_GIVEN_NAME',	'$A_LAST_NAME',	'$A_SEX',	'$A_DOB',	'$A_POB',	'$A_GUARDIAN'	,	'$A_ADDRESS',	'$A_AADHAR')";

    }
	elseif ( strcmp($A_GUARDIAN,'')==0)
	{
		    $sql = "INSERT INTO application (aid,	a_type,	a_given_name,	a_last_name,	a_sex,	a_dob,	a_pob,	a_spouse,	a_address,	a_aadhar) 
	VALUES ( '$A_ID',	'$A_TYPE1',	'$A_GIVEN_NAME',	'$A_LAST_NAME',	'$A_SEX',	'$A_DOB',	'$A_POB',	'$A_SPOUSE',	'$A_ADDRESS',	'$A_AADHAR')";


	}
	else
	{
		    $sql = "INSERT INTO application (aid,	a_type,	a_given_name,	a_last_name,	a_sex,	a_dob,	a_pob,	a_guardian,	a_spouse,	a_address,	a_aadhar) 
	VALUES ( '$A_ID',	'$A_TYPE1',	'$A_GIVEN_NAME',	'$A_LAST_NAME',	'$A_SEX',	'$A_DOB',	'$A_POB',	'$A_GUARDIAN'	,'$A_SPOUSE',	'$A_ADDRESS',	'$A_AADHAR')";


	}
    if(mysqli_query($link, $sql)){

        echo "Records added successfully.";

    } else{

        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

    }
	
	$sql = "INSERT INTO app_info (i_aid, a_stage) VALUES ( '$A_ID', 1)";

    if(mysqli_query($link, $sql)){

        echo "Records added successfully.";

    } else{

        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

    }
	$sql = "INSERT INTO app_stage (s_aid,p1_eid,p1_s_dt) VALUES ('$A_ID','$eid',now())";
	if(mysqli_query($link, $sql))
	{  
		echo "Records added successfully.";
			
		

    } else{

        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

    }
	header('Location:imageupload.php');

    // close connection

    mysqli_close($link);

    ?>
