<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
	</style>
    <script>
			function Update(){
				  var e_id=document.getElementById("e_id").value;
				  var e_nm=document.getElementById("e_nm").value;
                  var e_pwd=document.getElementById("e_pwd").value;
				  var emp_type=document.getElementById("emp_type").value;
				  var formData=new FormData();
				  formData.append("e_id",e_id);
				  formData.append("e_nm",e_nm);
                  formData.append("e_pwd",e_pwd);
				  formData.append("emp_type",emp_type);
				  var xmlhttp=new XMLHttpRequest();
	              xmlhttp.onreadystatechange=function(){
	              if (this.readyState == 4 && this.status == 200){
	                 window.alert(this.responseText);
	                  }
	          };
	          xmlhttp.open("POST","inserting.php",true);
	          xmlhttp.send(formData);
	      }
    </script>
    <?php
		function value_set($val)
		{
			if (!isset($_POST[$val])) 
			return null;
			else
			return $_POST[$val];
		}
	?>
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
		<a href="admin_insert_employee.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4">Add Employee</a>
		<a href="admin_update_employee.php" class="w3-bar-item w3-button w3-padding-large">Update Employee</a>
		
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
    	<a href="admin_insert_employee.php" class="w3-bar-item w3-button">Add Employee</a>
	      	<a href="admin_update_employee.php" class="w3-bar-item w3-button">Update Employee</a>
    	<a href="../Login/index.html" class="w3-bar-item w3-button w3-padding-large w3-right w3-hide-small">Logout<i class="fa fa-sign-out w3-margin-left"></i></a>
  	</div>


<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
    <center>
			<br>
			<h4><i>INSERT EMPLOYEE DETAILS</i></h4> 
			<hr>
			<br>
			<form>
			EMPLOYEE ID: <input type="text" name="e_id" id="e_id" value="<?php echo value_set("e_id");?>"><br><br>
			EMPLOYEE NAME: <input type="text" name="e_nm" id="e_nm" value="<?php echo value_set("e_nm");?>"><br><br>
            EMPLOYEE PASSWORD (DEFAULT): <input type="text" name="e_pwd" id="e_pwd" value="<?php echo value_set("e_pwd");?>"><br><br>
			EMPLOYEE TYPE: <select name="emp_type" id="emp_type">
							<option value="1">Low Level Employee</option>
							<option value="2">Verification Officer</option>
							<option value="3">Information Officer</option>
							<option value="4">Interview Officer</option> 
                            <option value="5">Admin</option> 
						   </select><br><br>
			<button type="button" name="submit" onclick="Update();">SUBMIT</button>
			</form>
		</center>
	

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
