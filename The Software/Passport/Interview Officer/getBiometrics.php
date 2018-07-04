<html>
<head>
<title>IMAGE UPLOAD</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
		.w3-btn {width:150px;}
		.File {
			position: relative;
		    text-align: right;
			width:200px;
		}
		.File1 {
			position: relative;
		    text-align: right;
			width:100px;
		}
		
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
<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:800px;margin-top:80px">
	<div class="w3-container w3-card w3-white w3-round w3-margin">
<table width="100%">
		<tr>
		<td><h3>UPLOAD BIOMETRICS</h3></td>
		<td >
			<?php echo "<pre align='right'>APPLICATION NUMBER: ".$_SESSION['app_num']."</pre></body>";?>
		</td>
		</tr>
	</table>
		<div class="w3-padding">
		
			<form action="getBiometrics.php" enctype="multipart/form-data" method="post">
			<table cellpadding="20px">
						
			<tr>
				<td><b>PHOTOGRAPH: </b><p></p></td>
				<td><input type="file" id="file1" name="file1" class="File" width="100px" ></td>
				<td><?php
					if(isset($_POST['Submit']))
					{ 
						
						$filepath1 = "../uploads/image/" . $_FILES["file1"]["name"];
						echo "<script>document.getElementById('file1').setAttribute('class', 'File1');</script>";
						if(move_uploaded_file($_FILES["file1"]["tmp_name"], $filepath1)) 
						{
							echo "<img src=".$filepath1." height=100 width=200 style='border: #00008B 4px dashed;' />";
						} 
						else 
						{
							echo "Error !!";
						}
					} 
				?>
				</td>
			</tr>	
			<tr>
				<td><b>SIGNATURE: </b><p></p></td>
				<td><input type="file" name="file2" id ="file2" class="File" width="100px"></td>
				<td><?php
					if(isset($_POST['Submit']))
					{ 
						echo "<script>document.getElementById('file2').setAttribute('class', 'File1');</script>";
						$filepath2 = "../uploads/signature/" . $_FILES["file2"]["name"];
						if(move_uploaded_file($_FILES["file2"]["tmp_name"], $filepath2)) 
						{
							echo "<img src=".$filepath2." height=100 width=200 style='border: #00008B 4px dashed;' / />";
						} 
						else 
						{
							echo "Error !!";
						}
						
					} 
				?>
				</td>
			</tr>
			<tr>
				<td><b>FINGERPRINT: </b><p></p></td>
				<td><input type="file" name="file3" id ="file3" class="File" width="100px"></td>
				<td><?php
					if(isset($_POST['Submit']))
					{ 
						echo "<script>document.getElementById('file3').setAttribute('class', 'File1');</script>";
						$filepath3 = "../uploads/fingerprint/" . $_FILES["file3"]["name"];
						if(move_uploaded_file($_FILES["file3"]["tmp_name"], $filepath3)) 
						{
							echo "<img src=".$filepath3." height=100 width=200 style='border: #00008B 4px dashed;' / />";
						} 
						else 
						{
							echo "Error !!";
						}
						
					} 
				?>
				</td>
			</tr>
			<tr>
				<td><b>RETINA SCAN: </b><p></p></td>
				<td><input type="file" name="file4" id ="file4" class="File" width="100px"></td>
				<td><?php
					if(isset($_POST['Submit']))
					{ 
						echo "<script>document.getElementById('file4').setAttribute('class', 'File1');</script>";
						$filepath4 = "../uploads/retina/" . $_FILES["file4"]["name"];
						if(move_uploaded_file($_FILES["file4"]["tmp_name"], $filepath4)) 
						{
							echo "<img src=".$filepath4." height=100 width=200 style='border: #00008B 4px dashed;' / />";
						} 
						else 
						{
							echo "Error !!";
						}
						
					} 
				?>
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td>
				</td>
				<td>
					<button type='submit' name="Submit" class='w3-button w3-grey w3-round-large'>UPLOAD IMAGE</button>
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td>
				</td>
				<td>
					<input type="button" onclick="location.href='getFeedback.php';" class='w3-button w3-grey w3-round-large' value="NEXT"/>
				</td>
			</tr>
			</table>
			</form>
			</div></div></div>

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
