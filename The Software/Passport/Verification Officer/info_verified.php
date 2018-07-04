<?php

    /* Attempt MySQL server connection. Assuming you are running MySQL

    server with default setting (user 'root' with no password) */
	
    $link = mysqli_connect("localhost", "root", "", "sys_passport");

     

    // Check connection

    if($link === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }
    
	session_start();
	$A_ID=$_SESSION["a_id"] ;
	
	if (isset($_POST['chkPassport1'])) {
		$A_GIVEN_NAME = mysqli_real_escape_string($link, $_REQUEST['A_GIVEN_NAME']);
	} else {
		$A_GIVEN_NAME = $_SESSION['A_GIVEN_NAME'];
	}
	
	if (isset($_POST['chkPassport2'])) {
		$A_LAST_NAME = mysqli_real_escape_string($link, $_REQUEST['A_LAST_NAME']);
	} else {
		$A_LAST_NAME = $_SESSION['A_LAST_NAME'];
	}
    
	if (isset($_POST['chkPassport3'])) {
		$A_POB = mysqli_real_escape_string($link, $_REQUEST['A_POB']);
	} else {
		$A_POB = $_SESSION['A_POB'];
	}
	
	if (isset($_POST['chkPassport4'])) {
		$A_GUARDIAN = mysqli_real_escape_string($link, $_REQUEST['A_GUARDIAN']);
	} else {
		$A_GUARDIAN = $_SESSION['A_GUARDIAN'];
	}
	
	if (isset($_POST['chkPassport5'])) {
		$A_SPOUSE = mysqli_real_escape_string($link, $_REQUEST['A_SPOUSE']);
	} else {
		$A_SPOUSE = $_SESSION['A_SPOUSE'];
	}
	
	if (isset($_POST['chkPassport6'])) {
		$A_B_NO = mysqli_real_escape_string($link, $_REQUEST['A_B_NO']);
	} else {
		$A_B_NO = $_SESSION['A_B_NO'];
	}
	
	if (isset($_POST['chkPassport7'])) {
		$A_CITY = mysqli_real_escape_string($link, $_REQUEST['A_CITY']);
	} else {
		$A_CITY = $_SESSION['A_CITY'];
	}
	
	if (isset($_POST['chkPassport8'])) {
		$A_STATE = mysqli_real_escape_string($link, $_REQUEST['A_STATE']);
	} else {
		$A_STATE = $_SESSION['A_STATE'];
	}
	
	if (isset($_POST['chkPassport9'])) {
		$A_PIN = mysqli_real_escape_string($link, $_REQUEST['A_PIN']);
	} else {
		$A_PIN = $_SESSION['A_PIN'];
	}
	
	if (isset($_POST['chkPassport10'])) {
		$A_AADHAR = mysqli_real_escape_string($link, $_REQUEST['A_AADHAR']);
	} else {
		$A_AADHAR = $_SESSION['A_AADHAR'];
	}
	
	if (isset($_POST['chkPassport11'])) {
		$A_SEX = mysqli_real_escape_string($link, $_REQUEST['A_SEX']);
	} else {
		$A_SEX = $_SESSION['A_SEX'];
	}
	
	if (isset($_POST['chkPassport12'])) {
		$A_DOB = mysqli_real_escape_string($link, $_REQUEST['A_DOB']);
	} else {
		$A_DOB = $_SESSION['A_DOB'];
	}
    
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
	header('Location:imageupload.php');
 
     

    // close connection

    mysqli_close($link);

    ?>
