<?php

    /* Attempt MySQL server connection. Assuming you are running MySQL

    server with default setting (user 'root' with no password) */
	session_start();
    $link = mysqli_connect("localhost", "root", "", "sys_passport");

     

    // Check connection

    if($link === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }
	
	 $Payment=300;
	$MODE = mysqli_real_escape_string($link, $_REQUEST['MODE']);

    $MOBILE = mysqli_real_escape_string($link, $_REQUEST['MOBILE']);
	
    $MAIL = mysqli_real_escape_string($link, $_REQUEST['MAIL']);
	$A_ID=$_SESSION["a_id"];
	 
	 $sql="update app_stage set p1_e_dt=now() where s_aid='$A_ID'";
	 if(mysqli_query($link, $sql)){

        echo "Application submitted successfully!!";
    } else{
		 echo "ERROR : APPLICATION NOT SUBMITTED";
    }	
	 
	 $sql = "UPDATE app_info SET  a_stage=2,pay_amt='$Payment',	pay_mode='$MODE',	app_mobile='$MOBILE',	app_email='$MAIL' WHERE i_aid='$A_ID'";

    if(mysqli_query($link, $sql)){

        echo "<script>alert('Application submitted successfully!!');
						window.location='../Index.php'</script>";
		

    } else{
		 echo "<script>alert('ERROR : APPLICATION NOT SUBMITTED');
						window.location='../Index.php'</script>";

    }
if ($MODE!='CASH')
	header('Location: payment.php');

?>	