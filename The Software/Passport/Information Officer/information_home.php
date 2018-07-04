<!DOCTYPE html>
<html>
<head>
	<title>Information Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
	</style>
</head>
<?php
    session_start();
	$link = mysqli_connect("localhost","root","","sys_passport");
	if (!$link) {
    	die('Could not connect: ' . mysqli_error($link));
	}
	$eid = $_SESSION['eid'];
	$res1 = mysqli_query($link,"SELECT e_name FROM employee WHERE eid='$eid'");
	$emp_name = mysqli_fetch_array($res1)[0];
?>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
	<div class="w3-bar w3-theme-d2 w3-left-align w3-large">
		<a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2 w3-large w3-padding-large" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
		<img src="../Logo/logo.jpg" class="w3-left w3-padding-small" style="height:50px" alt="Logo">
		<a href="information_home.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4">Home</a>
		<div class="w3-dropdown-hover w3-hide-small">
	    	<button class="w3-button w3-padding-large" title="View Details">View Details</button>     
	    	<div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
	      	<a href="view_status.php" class="w3-bar-item w3-button">View Status</a>
	      	<a href="view_info.php" class="w3-bar-item w3-button">View Information</a>
	    	</div>
	  	</div>
	  	<div class="w3-dropdown-hover w3-hide-small w3-right">
	    	<button class="w3-button w3-padding-large" title="My Account">Hi <?php echo $emp_name;?> <img src="../Logo/avatar2.png" class="w3-circle" style="height:24px;width:24px" alt="Avatar"></button>     
	    	<div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
	      	<a href="change_password.php" class="w3-bar-item w3-button">Change Password</a>
	      	<a href="../Login/index.html" class="w3-bar-item w3-button">Logout</a>
	    	</div>
	  	</div>
	</div>

<!-- Navbar on small screens -->
  	<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
    	<a href="view_status.php" class="w3-bar-item w3-button">View Status</a>
    	<a href="view_info.php" class="w3-bar-item w3-button">View Information</a>
    	<a href="change_password.php" class="w3-bar-item w3-button">Change Password</a>
    	<a href="../Login/index.html" class="w3-bar-item w3-button">Logout</a>
  	</div>
</div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">

	<div class="w3-container w3-card w3-white w3-round w3-margin">
		<h3>Schedule Appointment</h3>
		<div class="w3-padding">
		<?php

		//If Page is redirect due to submission
		if(isset($_POST['save']))
		{
			if($_POST['sdate'])
			{
				$sql = "UPDATE app_stage SET p3_eid = ?,p4_dt=? WHERE s_aid=?";
				$stmt = $link->prepare($sql);
				$stmt->bind_param("sss", $eid, $_POST['sdate'], $_POST['aid']);
				$stmt->execute();

				$sql = "UPDATE app_info SET a_stage = 4, app_sc_count=app_sc_count+1 WHERE i_aid=?";
				$stmt = $link->prepare($sql);
				$stmt->bind_param("s",$_POST['aid']);
				$stmt->execute();
				//Alert Box indicating Scheduling Done
				echo '<script language="javascript">';
				echo 'alert("Appointment fixed for Application: '.$_POST['aid'].'")';
				echo '</script>'; 
	  			$stmt->close();
	  		}
	  		else
	  		{
				echo '<script language="javascript">';
				echo 'alert("No date selected")';
				echo '</script>'; 
	  		}
		}
		echo "
		<table class='w3-table-all'>
		";
		//Query for Fetching Scheduled Appointments
		$sqls="SELECT app_info.i_aid,application.a_type,application.a_given_name,application.a_last_name,app_info.app_mobile,app_info.app_email, app_info.app_sc_count FROM app_info INNER JOIN application ON app_info.i_aid = application.aid WHERE app_info.a_stage = 3";
		$resv = mysqli_query($link,$sqls);
		if(mysqli_num_rows($resv) > 0)
		{
			echo "
			<tr>
				<th>Application ID</th>
				<th>Applicant's Name</th>
				<th>Phone</th>
				<th>Email</th>
				<th>Schedule Date</th>
				<th></th>
			</tr>";
			while($rowv = mysqli_fetch_array($resv)) {
				echo "<form action='information_home.php' method='POST'>";
    			echo "<tr>";
    			echo "<td><input type='hidden' name='aid' value='" . $rowv['i_aid'] . "'>" . $rowv['a_type'] . "_" . $rowv['i_aid'] . "</td>";
    			echo "<td>" . $rowv['a_given_name'] . " " . $rowv['a_last_name'] . "</td>";
    			echo "<td>" . $rowv['app_mobile'] . "</td>";
    			echo "<td>" . $rowv['app_email'] . "</td>";
    			echo "<td> <input type='date' name='sdate' min=" . date('Y-m-d') . ">  </td>";
    			if($rowv['app_sc_count']==0)
    			{
    				echo "<td> <button type='submit' name='save'>Schedule</button></td>";
				}
				else
				{
					echo "<td> <button type='submit' name='save'>Reschedule</button></td>";
				}
    			echo "</tr>";
    			echo "</form>";
			}
		}
		else{
			echo "<p>No Appointments to Schedule.</p>";}
		echo "</table>";
		?>
		
		</div>
	</div>
	<div class="w3-container w3-card w3-white w3-round w3-margin">
		<h3>Cancelled Applications</h3>
		<div class="w3-padding">
		<?php
		echo "
		<table class='w3-table-all'>
		";
		//Query for Fetching Cancelled Applications
		$sqlc="SELECT app_info.i_aid,application.a_given_name,application.a_last_name,app_info.app_mobile,app_info.app_email,(app_info.a_stage DIV 10),application.a_type FROM app_info INNER JOIN application ON app_info.i_aid = application.aid WHERE (app_info.a_stage%10) = 0";
		$resc = mysqli_query($link,$sqlc);
		if(mysqli_num_rows($resc) > 0)
		{
			echo "
			<tr>
				<th>Application ID</th>
				<th>Applicant's Name</th>
				<th>Phone</th>
				<th>Email</th>
				<th>Stage of Cancellation</th>
				<th></th>
			</tr>";
			while($rowc = mysqli_fetch_array($resc)) {
				echo "<form action='cancellation.php' method='post'>";
				echo "<tr>";
				echo "<td><input type='hidden' name='caid' value='" . $rowc['i_aid'] . "'>" . $rowc['a_type'] . "_" . $rowc['i_aid'] . "</td>";
    			echo "<td>" . $rowc['a_given_name'] . " " . $rowc['a_last_name'] . "</td>";
    			echo "<td>" . $rowc['app_mobile'] . "</td>";
    			echo "<td>" . $rowc['app_email'] . "</td>";
    			echo "<td>";
    			switch($rowc[5])
    			{
					case 1:echo "Application";break;
					case 2:echo "Verification";break;
					case 4:echo "Appointment";break;
					case 5:echo "Police Verification";break;
					case 6:echo "Final Verification";break;
					default:echo "Unknown";
    			}
    			echo "</td>";
    			echo "<td><button type='submit' name='cancel'>Refund</button></td>";
				echo "</tr>";
				echo "</form>";
			}
		}
			
		echo "</table>";
		?>
		</div>
	</div>

</div>
<!-- Footer -->
<footer class="w3-container w3-theme-d2" style="bottom:0;text-align:center;position:fixed;width:100%;">
  <p>Passport Management System, made as a requirement for M.Sc Sem II Assignment.	</p>
</footer>

<?php
mysqli_close($link);
?>
<script>
// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

</body>

</html>
