<!DOCTYPE html>
<html>
<head>
	<title>Cancellation</title>
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
		<h3>Initiate Refund</h3>
		<?php
		$aid=$_POST["caid"];
		//Query for Fetching Cancelled Applications
		$sqlc="SELECT app_info.i_aid,application.a_given_name,application.a_last_name,app_info.app_mobile,app_info.app_email,(app_info.a_stage DIV 10),app_info.pay_amt,app_info.pay_mode,application.a_type FROM app_info INNER JOIN application ON app_info.i_aid = application.aid WHERE i_aid='$aid'";
		$resc = mysqli_query($link,$sqlc);
		$rowc = mysqli_fetch_array($resc);
		$_SESSION['aid']=$aid;
		?>
		<form>
		<?php echo "<input type='hidden' name='aid' value='" . $aid . "'>";?>
		<p><strong>Application ID: </strong><?php echo $rowc['a_type'] . "_" . $aid;?></p>
		<p><strong>Applicant's Name: </strong><?php echo $rowc['a_given_name'] . " " . $rowc['a_last_name'];?></p>
		<p><strong>Phone: </strong><?php echo $rowc["app_mobile"];?></p>
		<p><strong>Email: </strong><?php echo $rowc["app_email"];?></p>
		<p><strong>Stage of Cancellation: </strong>
		<?php
		$sql1="SELECT p2_comm,p4_comm,p5_comm FROM app_stage WHERE s_aid='$aid'";
		$res1 = mysqli_query($link,$sql1);
		$row1 = mysqli_fetch_array($res1);
		switch($rowc[5])
    	{
			case 1:echo "Application";break;
			case 2:echo "Verification";
					echo "<p><strong>Comment: </strong>".$row1["p2_comm"]."</p>";
					break;
			case 4:echo "Appointment";
					echo "<p><strong>Comment: </strong>".$row1["p4_comm"]."</p>";
					break;
			case 5:echo "Police Verification";
					echo "<p><strong>Comment: </strong>".$row1["p5_comm"]."</p>";
					break;
			case 6:echo "Final Verification";break;
			default:echo "Unknown";
    	}
    	
    	?>
    	</p>
    	<p><strong>Refund Amount: </strong>250</p>
    	<p><strong>Paid By: </strong>Cash</p>
    	<p><button type='button' onclick="Refund();" class='w3-button w3-grey w3-round-large'>REFUND</button></p>
    	</form>
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

function Refund(){
				  
				  var xmlhttp=new XMLHttpRequest();
	              xmlhttp.onreadystatechange=function(){
	              if (this.readyState == 4 && this.status == 200){
	                 window.alert(this.responseText);
					 window.top.location='information_home.php';
	                  }
	          };
			  xmlhttp.open("POST","refund_amount.php",true);
	          xmlhttp.send();
	      }
</script>

</body>
</html>
