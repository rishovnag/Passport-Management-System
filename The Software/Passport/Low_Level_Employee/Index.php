<!DOCTYPE html>
<html>
<head>
	<title>Low-Level Home</title>
	<meta charset="UTF-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
		.w3-btn {width:150px;}
	</style>
</head>
<script language="javascript" type="text/javascript">
function ShowHideDiv() {
        var RENEWAL = document.getElementById("RENEWAL");
        var dvPassport = document.getElementById("dvPassport");
        dvPassport.style.display = RENEWAL.checked ? "block" : "none";
    }	

function ShowHideDiv1() {
        var UPDATE = document.getElementById("UPDATE");
        var dvPassport = document.getElementById("dvPassport");
        dvPassport.style.display = UPDATE.checked ? "block" : "none";
    }	
</script>
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
	
	 if($TYPE=='N')
	header('Location: NEW_APPLICATION/new_application.php');
  elseif ($TYPE=='U')
	header('Location: UPDATE/infoupdate.php');
  elseif ($TYPE=='R')
    header('Location: RENEW/renew.php');

	}
  ?>
<body class="w3-theme-l5" >

<!-- Navbar -->
<div class="w3-top">
	<div class="w3-bar w3-theme-d2 w3-left-align w3-large">
		<a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2 w3-large w3-padding-large" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
		<img src="../Logo/logo.jpg" class="w3-left w3-padding-small" style="height:50px" alt="Logo">
		<a href="Index.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4">Home</a>
		
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
		<h3>TYPE OF APPLICATION</h3>
		<div class="w3-padding">
		<table border="3" width="100%" cellpadding="10px">
			<tr ><td ><form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<label for="NEW">
				<input type="radio" id="NEW" name="A_TYPE" value="N" onclick="ShowHideDiv()"/>
				NEW
			</label>
			
			<label for="RENEWAL">
				<input type="radio" id="RENEWAL" name="A_TYPE" value="R" onclick="ShowHideDiv()"/>
				RENEWAL
			</label>
			
			<label for="UPDATE">
				<input type="radio" id="UPDATE" name="A_TYPE" value="U" onclick="ShowHideDiv1()"/>
				UPDATE
			</label>
			<hr />
			<div id="dvPassport" style="display: none">
				Please Enter Passport Number:
			<input type="text" id="txtPassportNumber" name="txtPassportNumber"/>
			</div>
			
			<button type="submit" class='w3-button w3-grey w3-round-large' value="Submit">SUBMIT</td></tr>
				
			</form>
		</table>
		</div>
	</div>
</div>
</body>
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
