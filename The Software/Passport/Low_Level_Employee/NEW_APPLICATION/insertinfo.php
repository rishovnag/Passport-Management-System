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
	if($_SESSION["type"]=='N')
	 $Payment=300;
elseif ($_SESSION["type"]=='U')
	$Payment=300;
elseif($_SESSION["type"]=='R')
	$Payment=300;

    $A_ID=$_SESSION["a_id"];

    $A_GIVEN_NAME = mysqli_real_escape_string($link, $_REQUEST['A_GIVEN_NAME']);

    $A_LAST_NAME = mysqli_real_escape_string($link, $_REQUEST['A_LAST_NAME']);
	
	$A_SEX = mysqli_real_escape_string($link, $_REQUEST['A_SEX']);
    
    $A_DOB = mysqli_real_escape_string($link, $_REQUEST['A_DOB']);

	$A_POB = mysqli_real_escape_string($link, $_REQUEST['A_POB']);
     
	$A_GUARDIAN = mysqli_real_escape_string($link, $_REQUEST['A_GUARDIAN']);
	
	$A_SPOUSE = mysqli_real_escape_string($link, $_REQUEST['A_SPOUSE']);
	
	$A_B_NO = mysqli_real_escape_string($link, $_REQUEST['A_B_NO']);
	
	$A_CITY = mysqli_real_escape_string($link, $_REQUEST['A_CITY']);
	
	$A_STATE = mysqli_real_escape_string($link, $_REQUEST['A_STATE']);
	
	$A_PIN = mysqli_real_escape_string($link, $_REQUEST['A_PIN']);
	$A_PIN=trim($A_PIN," ");
	$A_AADHAR = mysqli_real_escape_string($link, $_REQUEST['A_AADHAR']);
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


	}    if(mysqli_query($link, $sql)){

        echo "Records added successfully.";

    } else{

        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

    }
	$sql = "INSERT INTO app_info (i_aid, a_stage) VALUES ( '$A_ID', 1)";

    if(mysqli_query($link, $sql)){

		{  echo "Records added successfully.";
			
		}

    } else{

        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

    }
	$sql = "INSERT INTO app_stage (s_aid,p1_eid,p1_s_dt) VALUES ('$A_ID','$eid',now())";
	 if(mysqli_query($link, $sql)){
	  echo "Records added successfully.";
			
		

    } else{

        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

    }
	header('Location: imageupload.php');
 
     

    // close connection

    mysqli_close($link);

    ?>
