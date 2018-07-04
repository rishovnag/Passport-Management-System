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
	$appid = intval($_GET['q']);
	$sqld="SELECT app_info.i_aid,app_info.a_stage, application.a_type, application.a_given_name,application.a_last_name,app_info.app_mobile,app_info.app_email FROM app_info INNER JOIN application ON app_info.i_aid = application.aid WHERE app_info.i_aid = '$appid'";
	$resd = mysqli_query($link,$sqld);
	if(mysqli_num_rows($resd) > 0)
	{
		$rowd = mysqli_fetch_array($resd);
		echo "<h4>Application Details</h4>";
		echo "<p><strong>Application ID: </strong>" . $rowd['a_type'] . "_" . $appid . "</p>";
		echo "<p><strong>Applicant's Name: </strong>" . $rowd['a_given_name'] . " " . $rowd['a_last_name'] . "</p>";
		echo "<p><strong>Phone: </strong>" . $rowd["app_mobile"]. "</p>";
		echo "<p><strong>Email: </strong>" . $rowd["app_email"] . "</p>";
		$sql1="SELECT * FROM app_stage WHERE s_aid='$appid'";
		$res1 = mysqli_query($link,$sql1);
		$row1 = mysqli_fetch_array($res1);
		echo "<h4>Stage Details</h4>";
		switch($rowd['a_stage'])
		{
			case 2: echo "<p><strong>Current Stage: </strong>Verification</p>";
					echo "<p><strong>Last Processed: </strong>" . $row1['p1_e_dt'] . "</p>";
					break;
			case 3: echo "<p><strong>Current Stage: </strong>Scheduling</p>";
					echo "<p><strong>Last Processed: </strong>" . $row1['p2_e_dt'] . "</p>";
					break;
			case 4: echo "<p><strong>Current Stage: </strong>Appointment</p>";
					echo "<p><strong>Date for Appointment: </strong>" . $row1['p4_dt'] . "</p>";
					break;
			case 5: echo "<p><strong>Current Stage: </strong>Police Verification</p>";
					echo "<p><strong>Last Processed: </strong>" . date("d/m/Y", strtotime($row1['p4_dt'])) . " at " . $row1['p4_e_time'] . "</p>";
					break;
			case 6: echo "<p><strong>Current Stage: </strong>Final Verification</p>";
					echo "<p><strong>Last Processed: </strong>" . $row1['p5_e_dt'] . "</p>";
					break;
			case 7: echo "<p><strong>Current Stage: </strong>Printing</p>";
					echo "<p><strong>Last Processed: </strong>" . $row1['p6_e_dt'] . "</p>";
					break;
			case 8: echo "<p><strong>Current Stage: </strong>Passport Printed</p>";
					echo "<p><strong>Last Processed: </strong>" . $row1['p7_e_dt'] . "</p>";
					break;
			case 10:echo "<p><strong>Cancelled at: </strong>Application";
					break;
			case 20:echo "<p><strong>Cancelled at: </strong>Verification</p>";
					echo "<p><strong>Comment: </strong>".$row1["p2_comm"]."</p>";
					break;
			case 40:echo "<p><strong>Cancelled at: </strong>Appointment</p>";
					echo "<p><strong>Comment: </strong>".$row1["p4_comm"]."</p>";
					break;
			case 50:echo "<p><strong>Cancelled at: </strong>Police Verification</p>";
					echo "<p><strong>Comment: </strong>".$row1["p5_comm"]."</p>";
					break;
			case 60:echo "<p><strong>Cancelled at: </strong>Final Verification</p>";
					break;
			case 99:echo "<p><strong>Application has been cancelled and money Refunded.</strong></p>";
					break;
			default:echo "Unexpected this error was";
		}
	}
	else
	{
		echo "<p>No Application Found under this ID</p>";
	}
	
	mysqli_close($link);
?>
</body>
</html>
