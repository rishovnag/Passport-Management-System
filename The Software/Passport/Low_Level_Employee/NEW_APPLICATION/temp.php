<?php
    session_start();
	$link = mysqli_connect("localhost","root","","sys_passport");
	if (!$link) {
    	die('Could not connect: ' . mysqli_error($link));
	}
	$eid = $_SESSION['eid'];
	$res1 = mysqli_query($link,"SELECT e_name FROM employee WHERE eid='$eid'");
	$emp_name = mysqli_fetch_array($res1)[0];
	if($_SERVER["REQUEST_METHOD"]=="POST"){
  $TYPE = $_POST["A_TYPE"];
  $_SESSION["type"] = $TYPE;
 	//id generate
	$id1=0;
    $sql = "SELECT * FROM application ORDER BY aid DESC LIMIT 1";
	$result = $link->query($sql);
	if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        $id2= $row["aid"];
		$id1 = substr($id2, 0,100);
		$id1=$id1+1;		
	}
	}
	$P_ID = $_POST["txtPassportNumber"];
	$_SESSION['p_id']=$P_ID;		
	$_SESSION['a_id']=$id1;
	$sql = "INSERT INTO app_info (i_aid, a_stage) VALUES ( '$id1', 1)";

    if(mysqli_query($link, $sql)){

        echo "Records added successfully.";

    } else{

        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

    }
	
	}
  ?>