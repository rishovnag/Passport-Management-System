<!DOCTYPE html>
<html>
<head>
	<title>LOW LEVEL OFFICER CHANGE PASSWORD</title>
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
		<a href="Index.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4">Home</a>
	  	<div class="w3-dropdown-hover w3-hide-small w3-right">
	    	<button class="w3-button w3-padding-large" title="My Account">Hi <?php echo $emp_name;?> <img src="../Logo/avatar2.png" class="w3-circle" style="height:24px;width:24px" alt="Avatar"></button>     
	    	<div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
	      	<a href="../Login/index.html" class="w3-bar-item w3-button">Logout</a>
	    	</div>
	  	</div>
	</div>

<!-- Navbar on small screens -->
  	<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
    	
    	
    	<a href="../Login/index.html" class="w3-bar-item w3-button">Logout</a>
  	</div>
</div>
<!-- Page Container -->
<?php
			$passErr=$pass2Err=$pass3Err=$pass1Err="";
			if ($_SERVER["REQUEST_METHOD"] == "POST")
			{
				
				if (empty($_POST["pass1"])) 
					$pass1Err = "PASSWORD IS REQUIRED ";
			    else
					$pass=$_POST['pass1'];
				if (empty($_POST["pass2"])) 
					$pass2Err = "PASSWORD IS REQUIRED ";
				else
					$pass2=$_POST['pass2'];
				if(empty($_POST["pass3"])) 
					$pass3Err = "PASSWORD IS REQUIRED ";
				else
					$pass3=$_POST['pass3'];
				if(strcmp($pass2,$pass3)!=0)
				$pass2Err="PASSWORDS SHOULD BE SAME";
				$sql1="SELECT e_pwd as password FROM employee WHERE eid='$eid'";
				$result=$link->query($sql1);
				if ($result->num_rows > 0)
				{
					$row = mysqli_fetch_assoc($result);
					if(strcmp($pass,$row["password"])!=0)
						{	
							$passErr="INVALID PASSWORD";
						}
					
					if((strcmp($pass1Err,"")==0)  && (strcmp($pass2Err,"")==0) && (strcmp($passErr,"")==0))
					{
						if(strcmp($pass,$row["password"])!=0)
						{	
							$passErr="INVALID PASSWORD";
						}
						else
						{
							$pass=$_POST['pass2'];
							$sql2="UPDATE employee SET e_pwd='$pass' where eid='$eid'";
							if ($link->query($sql2) === TRUE)
							{
								echo '<script>alert("RECORD UPDATED SUCCESSFULLY");</script>';
								echo "<script>window.top.location='Index.php'</script>";
							}
							else 
								echo '<script>alert("RECORD CANNOT BE UPDATED");</script>';
						}
					}
				}
					
			}
	?>
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">

	<div class="w3-container w3-card w3-white w3-round w3-margin">
		<h3>CHANGE PASSWORD</h3>
		<div class="w3-padding">
		<form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
			ENTER CURRENT PASSWORD : <input type="password" name="pass1"> <span class="error"><?php echo $passErr." ".$pass1Err; ?></span><br><br>
			ENTER NEW PASSWORD : <input type="password" name="pass2"><span class="error"><?php echo $pass2Err;?></span><br><br>
			REENTER NEW PASSWORD : <input type="password" name="pass3"><span class="error"><?php echo $pass3Err;?></span><br><br>
			<input type="submit" name="Submit" value="SAVE CHANGES">
		</form>
		
		
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

		
		


			
			
	