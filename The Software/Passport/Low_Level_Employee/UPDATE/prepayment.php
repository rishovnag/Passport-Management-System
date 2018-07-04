<html>
<head>
<title>ADD RECORD FORM</title>
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
function func1()
{
	if(document.f1.MOBILE.value=="")
	{
	   alert("MOBILE no field should not be empty");
	   document.f1.MOBILE.focus();
	   return false
	}
	if(isNaN(document.f1.MOBILE.value))
	{
	  alert("MOBILE no field should be numeric");
	document.f1.MOBILE.value=""
	   document.f1.MOBILE.focus();
	   return false
	}
	if(document.f1.MOBILE.value.length!=10)
	{
	  alert("MOBILE no field should be 10 digit");
	   document.f1.MOBILE.focus();
	   return false
    }
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
?>

<body class="w3-theme-l5">
    
    
   <!-- Navbar -->
<div class="w3-top">
	<div class="w3-bar w3-theme-d2 w3-left-align w3-large">
		<a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2 w3-large w3-padding-large" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
		<img src="../../Logo/logo.jpg" class="w3-left w3-padding-small" style="height:50px" alt="Logo">
		<a href="prepayment.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4">Home</a>
	  	<div class="w3-dropdown-hover w3-hide-small w3-right">
	    	<button class="w3-button w3-padding-large" title="My Account">Hi <?php echo $emp_name;?> <img src="../../Logo/avatar2.png" class="w3-circle" style="height:24px;width:24px" alt="Avatar"></button>     
	  	</div>
	</div>

</div>

<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
    
    <div class="w3-container w3-card w3-white w3-round w3-margin">
        
        <div class="w3-padding">
		<table width="100%">
		<tr>
		<td><h3>UPDATE APPLICATION : PAYMENT</h3></td>
		<td >
			<?php echo "<pre align='right'>APPLICATION NUMBER: ".$_SESSION['type']."_".$_SESSION['a_id']."</pre></body>";?>
		</td>
		</tr>
	</table>
    
<form action="insertprepayment.php" method="post" name=f1 onsubmit="return func1()">
	
		
<?php
$Payment=300;	
?>
        <table cellpadding="10px">
			<tr>
				<td><b>AMOUNT TO BE PAID:</b></td>
				<td>300</td>
			</tr>
			<tr>
				<td><b>
					<label for="MODE">MODE OF PAYMENT:</label></b>
				</td>
				<td>
					<input type="radio" name="MODE" value="CASH" checked> CASH<br>
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td>
				<input type="radio" name="MODE" value="ONLINE MODE"> ONLINE MODE
				</td>
			</tr>
			<tr>
				<td><b>
					<label for="MOBILE">MOBILE:</label></b>
				</td>
				<td>
					<input type="text" name="MOBILE" id="MOBILE">
				</td>
			</tr>
			<tr>
				<td><b>
					<label for="MAIL">E-MAIL:</label></b>
				</td>
				<td>
					<input type="mail" name="MAIL" id="MAIL">
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td>
					<input type="submit" value="Submit">
				</td>
	</form>
            </div>
        </div>
    </div>
</body>
</html>