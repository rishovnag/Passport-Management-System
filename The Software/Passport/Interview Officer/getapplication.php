<!DOCTYPE html>
<html>
<head>
	<title>APPLICATION DETAILS
	</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script>
	function Update(){
				
				  var xmlhttp=new XMLHttpRequest();
	              xmlhttp.onreadystatechange=function(){
	              if (this.readyState == 4 && this.status == 200){
	                 window.alert(this.responseText);
					 window.location = "getBiometrics.php";
	                  }
	          };
			  xmlhttp.open("POST","start_interview.php",true);
			  xmlhttp.send();
	      }
	</script>
	<style>
		html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
		table {
				border-collapse: collapse;
				width: 50%;
			  }

		th, td {
				padding: 8px;
				text-align: center;
				border: 3px solid #ddd;
			  }

		tr:hover {background-color:grey;}
		.w3-btn {width:150px;}
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
	  	</div>
	</div>


</div>
<div class="w3-container">
	<div class="w3-panel w3-border w3-round-large">
	 
		<p align="center">
			<?php
					
						$a_id=intval($_GET['q']);
						$_SESSION['s_aid']=$a_id;
					
					$sql1="SELECT * from application where aid='$a_id'";
					$result=$link->query($sql1);
					if ($result->num_rows > 0)
					{
						$row = mysqli_fetch_assoc($result);
						$add=explode("  ",$row['a_address']);
						$_SESSION['app_num']=$row['a_type']."_".$row['aid'];
						echo "<br><pre align='right'>APPLICATION NUMBER: ".$_SESSION['app_num']."</pre></body>";
						echo "<table align='center'>
							  <tr><td> <b>FIRST NAME: </b></td><td> ".$row['a_given_name']."</td></tr>";
						echo "<tr><td> <b>LAST NAME: </b></td><td> ".$row['a_last_name']."</td></tr>";
						echo "<tr><td> <b>GENDER: </b></td><td> ".$row['a_sex']."</td></tr>";
						echo "<tr><td> <b>DATE OF BIRTH: </b></td><td> ".$row['a_dob']."</td></tr>";
						echo "<tr><td> <b>PLACE OF BIRTH: </b></td><td> ".$row['a_pob']."</td></tr>";
						echo "<tr><td> <b>GUARDIAN: </b></td><td> ".$row['a_guardian']."</td></tr>";
						echo "<tr><td> <b>SPOUSE: </b></td><td> ".$row['a_spouse']."</td></tr>";
						echo "<tr><td> <b>ADDRESS: </b></td><td> ".$add[0]."<br>".$add[1]."<br>".$add[2]."</td></tr>";
						echo "<tr><td> <b>PIN: </b></td><td> ".$add[3]."</td></tr>";
						echo "<tr><td> <b>AADHAR : </b></td><td> ".$row['a_aadhar']."</td></tr>";
						echo "</table>";
					}
					?>
					
						<form align='center'>
						
							<button type="button" name="submit" onclick="Update();" class='w3-button w3-grey w3-round-large'>
								START
							</button>
						</form>
					
										
		
		</p>
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
