<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
	</style>
</head>
<body>
<?php
	$link = mysqli_connect("localhost","root","","sys_passport");
	if (!$link) {
    	die('Could not connect: ' . mysqli_error($link));
	}
	$pid = intval($_GET['q']);
	$sqld="SELECT * FROM dum_passport WHERE pno= '$pid'";
	$resd = mysqli_query($link,$sqld);
	if(mysqli_num_rows($resd) > 0)
	{
		$rowd = mysqli_fetch_array($resd);
		echo "<h4>Passport Details</h4>";
		echo "<p><strong>Passport No: </strong>" . $rowd['pno'] . "</p>";
		echo "<p><strong>Holder Name: </strong>" . $rowd['p_given_name'] . " " . $rowd['p_last_name'] . "</p>";
		echo "<p><strong>Gender: </strong>" . $rowd['p_sex']. "</p>";
		echo "<p><strong>Date of Birth: </strong>" . $rowd['p_dob'] . "</p>";
		echo "<p><strong>Place of Birth: </strong>" . $rowd['p_pob'] . "</p>";
		if($rowd['p_guardian']!=NULL){
			echo "<p><strong>Guardian: </strong>" . $rowd['p_guardian'] . "</p>";
		}
		if($rowd['p_spouse']!=NULL){
			echo "<p><strong>Spouse: </strong>" . $rowd['p_spouse'] . "</p>";
		}
		echo "<p><strong>Address: </strong>" . $rowd['p_address'] . "</p>";
		echo "<p><strong>Aadhar Mentioned: </strong>" . $rowd['p_aadhar'] . "</p>";
		echo "<p><strong>Issue Date: </strong>" . $rowd['p_issue_date'] . "</p>";
	}
	else
	{
		echo "<p>No Passport Found under this Number</p>";
	}
	
	mysqli_close($link);
?>
</body>
</html>
