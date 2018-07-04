<!DOCTYPE html>
<html>
<head>
	<title>CREATE NEW APPLICATION</title>
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
	<script language="javascript" type="text/javascript">
function func1()
{
	if(document.f1.A_GIVEN_NAME.value=="")
	{
	   alert("Name field should not be empty");
	   document.f1.A_GIVEN_NAME.focus();
	   return false
	}
	if(!isNaN(document.f1.A_GIVEN_NAME.value))
	{
	  alert("Name field should not be numeric");
	document.f1.A_GIVEN_NAME.value=""
	   document.f1.A_GIVEN_NAME.focus();
	   return false
	}
	if(document.f1.A_LAST_NAME.value=="")
	{
	   alert("Name field should not be empty");
	   document.f1.A_LAST_NAME.focus();
	   return false
	}
	if(!isNaN(document.f1.A_LAST_NAME.value))
	{
	  alert("Name field should not be numeric");
	document.f1.A_LAST_NAME.value=""
	   document.f1.A_LAST_NAME.focus();
	   return false
	}
	if(document.f1.A_POB.value=="")
	{
	   alert("Place of Birth should not be empty");
	   document.f1.A_POB.focus();
	   return false
	}
	if(document.f1.A_GUARDIAN.value=="")
	{
	   alert("Guardian Name should not be empty");
	   document.f1.A_GUARDIAN.focus();
	   return false
	}
	
	
		if(document.f1.A_STATE.value=="")
	{
	   alert("State Name should not be empty");
	   document.f1.A_STATE.focus();
	   return false
	}
		if(document.f1.A_CITY.value=="")
	{
	   alert("City Name should not be empty");
	   document.f1.A_CITY.focus();
	   return false
	}
	
	if(document.f1.A_PIN.value=="")
	{
	   alert("PIN should not be empty");
	   document.f1.A_PIN.focus();
	   return false
	}
	if(isNaN(document.f1.A_PIN.value))
	{
	  alert("PIN should be numeric");
	document.f1.A_PIN.value=""
	   document.f1.A_PIN.focus();
	   return false
	}
	if(document.f1.A_PIN.value.length!=6)
	{
	  alert("PIN should be 6 digit");
	   document.f1.A_PIN.focus();
	   return false
	}

		if(document.f1.A_AADHAR.value=="")
	{
	   alert("Aadhar no field should not be empty");
	   document.f1.A_AADHAR.focus();
	   return false
	}
	if(isNaN(document.f1.A_AADHAR.value))
	{
	  alert("Aadhar no field should be numeric");
	document.f1.A_AADHAR.value=""
	   document.f1.A_AADHAR.focus();
	   return false
	}
	if(document.f1.A_AADHAR.value.length!=12)
	{
	  alert("Aadhar no field should be 12 digit");
	   document.f1.A_AADHAR.focus();
	   return false
	}
 
}


</script>
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
		<img src="../../Logo/logo.jpg" class="w3-left w3-padding-small" style="height:50px" alt="Logo">
		<a href="../Index.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4">Home</a>
		
	  	<div class="w3-dropdown-hover w3-hide-small w3-right">
	    	<button class="w3-button w3-padding-large" title="My Account">Hi <?php echo $emp_name;?> <img src="../../Logo/avatar2.png" class="w3-circle" style="height:24px;width:24px" alt="Avatar"></button>     
	    	
	  	</div>
	</div>
</div>
<div class="w3-container w3-content" style="max-width:1200px;margin-top:80px">
	<div class="w3-container w3-card w3-white w3-round w3-margin">
		<table width="100%">
		<tr>
		<td><h3>NEW APPLICATION</h3></td>
		<td >
			<?php echo "<pre align='right'>APPLICATION NUMBER: ".$_SESSION['type']."_".$_SESSION['a_id']."</pre></body>";?>
		</td>
		</tr>
	</table>
		
		<div class="w3-padding">
			<form action="insertinfo.php" method="post" name=f1 onsubmit="return func1()" align="center">
				<table align="center" cellpadding="10px">
		<tr>
           <td> <label for="A_GIVEN_NAME">GIVEN NAME:</label></td>

            <td><input type="text" name="A_GIVEN_NAME" id="A_GIVEN_NAME"></td>
     
		</tr>
        <tr>
		
           <td><label for="A_LAST_NAME">LAST NAME:</label></td>

            <td><input type="text" name="A_LAST_NAME" id="A_LAST_NAME"></td>

        </tr>
		<tr>

            <td><label for="A_SEX">SEX:</label></td>

           <td> <input type="radio" name="A_SEX" value="Male" checked> Male<br>
			<input type="radio" name="A_SEX" value="Female"> Female<br>
			<input type="radio" name="A_SEX" value="Other"> Other </td> 

        </tr>
		<tr>

            <td><label for="A_DOB">DOB:</label></td>

            <td><input type="date" name="A_DOB" id="A_DOB" max= 
            <?php echo date('Y-m-d'); ?>></td>

        </tr>
		<tr>

            <td><label for="A_POB">PLACE OF BIRTH:</label></td>

            <td><input type="text" name="A_POB" id="A_POB"></td>

        </tr>
        <tr>

            <td><label for="A_GUARDIAN">GUARDIAN NAME:</label></td>

            <td><input type="text" name="A_GUARDIAN" id="A_GUARDIAN"></td>

        </tr>
		<tr>

            <td><label for="A_SPOUSE">SPOUSE NAME:</label></td>

            <td><input type="text" name="A_SPOUSE" id="A_SPOUSE"></td>

        </tr>
		<tr>

            <td><label for="A_B_NO">BUILDING NUMBER:</label></td>

            <td><input type="text" name="A_B_NO" id="A_B_NO"></td>

        </tr>
		<tr>

            <td><label for="A_CITY">CITY:</label></td>

            <td><input type="text" name="A_CITY" id="A_CITY"></td>

        </tr>
		<tr>

            <td><label for="A_STATE">STATE:</label></td>

            <td><input type="text" name="A_STATE" id="A_STATE"></td>

        </tr>
		<tr>

            <td><label for="A_PIN">PIN:</label></td>

            <td><input type="text" name="A_PIN" id="A_PIN"></td>

        </tr>
        <tr>

            <td><label for="A_AADHAR">AADHAR NUMBER:</label></td>

            <td><input type="text" name="A_AADHAR" id="A_AADHAR"></td>
        </tr>
	<tr><td></td><td>
	<br><br>
        <button type='submit'  name='submit' class='w3-button w3-grey w3-round-large'>SUBMIT</button></form>
    <br><br><br>
	</tr></td>
	
	</table></form>
	</div>
	</div>
	</div>
	<footer class="w3-container w3-theme-d2" style="bottom:0;text-align:center;position:fixed;width:100%;">
		<p>Passport Management System, made as a requirement for M.Sc Sem II Assignment.</p>
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
