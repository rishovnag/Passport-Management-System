<!DOCTYPE html>
<html>
<head>
	<title>Interview Home Page</title>
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
		<a href="interview_home.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4">Home</a>
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
    	<a href="change_password.php" class="w3-bar-item w3-button">Change Password</a>
    	<a href="../Login/index.html" class="w3-bar-item w3-button">Logout</a>
  	</div>
</div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">

	<div class="w3-container w3-card w3-white w3-round w3-margin">
		<h3>Today's Appointment</h3>
		<div class="w3-padding">
		<?php

		
		echo "
		<table class='w3-table-all'>
		";
		//Query for Fetching Scheduled Appointments
		$sql1="Update app_info join app_stage on app_info.i_aid=app_stage.s_aid set app_info.a_stage=40 where app_info.app_sc_count>=2 and app_stage.p4_dt<curdate() and app_info.a_stage=4";
		mysqli_query($link,$sql1);
		$sql2="Update app_info join app_stage on app_info.i_aid=app_stage.s_aid set app_info.a_stage=3 where app_info.app_sc_count=1 and app_stage.p4_dt<curdate() and app_info.a_stage=4";
		mysqli_query($link,$sql2);
		$sqls="SELECT app_info.i_aid,application.a_given_name,application.a_last_name,app_info.app_mobile,app_info.app_email,application.a_type FROM app_info INNER JOIN application INNER JOIN app_stage ON app_info.i_aid = application.aid and app_stage.s_aid=app_info.i_aid WHERE app_info.a_stage = 4 and p4_dt=curdate()";
		$resv = mysqli_query($link,$sqls);
		if(mysqli_num_rows($resv) > 0)
		{
			echo "
			<tr>
				<th>Application ID</th>
				<th>Applicant's Name</th>
				<th>Phone</th>
				<th>Email</th>
			
			</tr>";
			while($rowv = mysqli_fetch_array($resv)) {
				
    			echo "<tr>";
				$a_id=$rowv['a_type'].'_'.$rowv['i_aid'];
				echo "<td><font size=4><a href='getapplication.php?q=".$rowv['i_aid']."'>$a_id</a></td>";
     			echo "<td>" . $rowv['a_given_name'] . " " . $rowv['a_last_name'] . "</td>";
    			echo "<td>" . $rowv['app_mobile'] . "</td>";
    			echo "<td>" . $rowv['app_email'] . "</td>";
     			echo "</tr>";
    			
			}
		}
		else{
			echo "<p>No Appointments to Schedule.</p>";}
		echo "</table>";
		?>
		
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
