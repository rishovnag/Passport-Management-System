<!DOCTYPE html>
<html>
<head>
	<title>Police Home</title>
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
		<a href="police.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4">Home</a>
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
		<h3>Addresses to be checked</h3>
		<div class="w3-padding">
		<?php

		//If Page is redirect due to submission
		if(isset($_POST['v']))
		{
			$sql = "UPDATE app_stage SET p5_e_dt = NOW(),p5_comm=? WHERE s_aid=?";
			$stmt = $link->prepare($sql);
			$stmt->bind_param("ss", $_POST['cmmt'], $_POST['aid']);
			$stmt->execute();

			$sql = "UPDATE app_info SET a_stage = 6 WHERE i_aid=?";
			$stmt = $link->prepare($sql);
			$stmt->bind_param("s",$_POST['aid']);
			$stmt->execute();
    		//Alert Box indicating Scheduling Done
    		echo '<script language="javascript">';
			echo 'alert("Record Verified for Application: '.$_POST['aid'].'")';
			echo '</script>'; 
  			$stmt->close();
		}
		else if(isset($_POST['nv']))
		{
			$sql = "UPDATE app_stage SET p5_e_dt = NOW(),p5_comm=? WHERE s_aid=?";
			$stmt = $link->prepare($sql);
			$stmt->bind_param("ss", $_POST['cmmt'], $_POST['aid']);
			$stmt->execute();

			$sql = "UPDATE app_info SET a_stage = 50 WHERE i_aid=?";
			$stmt = $link->prepare($sql);
			$stmt->bind_param("s",$_POST['aid']);
			$stmt->execute();
    		//Alert Box indicating Address Verification Done
    		echo '<script language="javascript">';
			echo 'alert("Record Not-Verified for Application: '.$_POST['aid'].'")';
			echo '</script>'; 
  			$stmt->close();
		}
		
		echo "
		<table class='w3-table-all'>
		";
		//Query for Fetching Addresses to be verified.
		$sqls="SELECT * FROM app_info INNER JOIN application ON app_info.i_aid = application.aid WHERE app_info.a_stage = 5";
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
				echo '<tr onclick="document.getElementById(\'m'.$rowv['i_aid'].'\').style.display=\'block\'">';
    			echo "<td>" . $rowv['a_type'] . "_" . $rowv['i_aid'] . "</td>";
    			echo "<td>" . $rowv['a_given_name'] . " " . $rowv['a_last_name'] . "</td>";
    			echo "<td>" . $rowv['app_mobile'] . "</td>";
    			echo "<td>" . $rowv['app_email'] . "</td>";
    			echo "</tr>";
    			//Modal for each
    			echo '<div id=\'m'.$rowv['i_aid'].'\' class="w3-modal">';
    				echo "<div class='w3-modal-content w3-card-4 w3-animate-zoom' style='max-width:600px'>";
    				echo '<span onclick="document.getElementById(\'m'. $rowv['i_aid'].'\').style.display=\'none\'" class=\'w3-button w3-xlarge w3-hover-red w3-display-topright\' title=\'Close Modal\'>&times;</span>';
    				echo '<form class="w3-container" action="police.php" method="POST">
        					<div class="w3-section w3-margin">
							<h4>Applicant Details for Application ID: <input type="hidden" name="aid" value=\'' . $rowv['i_aid'] . '\'>' . $rowv['a_type'] . "_" . $rowv['i_aid'].'</h4>
							<div class="w3-pale-green">
							<p><strong>Name: </strong>'. $rowv['a_given_name'] . " " . $rowv['a_last_name'] .'</p>
							<p><strong>Phone: </strong>' . $rowv['app_mobile']. '</p>
         	 				<p><strong>Email: </strong>' . $rowv['app_email'] .'</p>
          					</div>
          					<p><strong>Gender: </strong>' . $rowv['a_sex'] .'</p>
          					<p><strong>Date of Birth: </strong>' . $rowv['a_dob'] .'</p>
          					<p><strong>Address: </strong>' . $rowv['a_address'] .'</p>
          					<p><strong>Guardian: </strong>' . $rowv['a_guardian'] .'</p>
          					<p><strong>Spouse: </strong>' . $rowv['a_spouse'] .'</p>
          					<p><strong>Aadhar No: </strong>' . $rowv['a_aadhar'] .'</p>
							</div>
							<div class="w3-container w3-border-top w3-light-grey">
          					<p><strong>Comment</strong>
          					<input class="w3-input w3-border" type="text" placeholder="Enter Comments" name="cmmt" required></p>
          					<button class="w3-button w3-green w3-section w3-padding w3-right" type="submit" name="v">Verified</button>
          					<button class="w3-button w3-red w3-section w3-padding" type="submit" name="nv">Not-Verified</button>
							</div>
        					</div>
      					   </form>';
    			echo "</div></div>";
			}
		}
		else{
			echo "<p>No Addresses to check.</p>";}
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
