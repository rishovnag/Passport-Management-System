<html>
<head>
<title>IMAGE UPLOAD UPDATE</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
		.w3-btn {width:150px;}
		input.file {
			position: relative;
		    text-align: right;
			width:200px;
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
	$aid=$_SESSION['a_id'];
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
<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1000px;margin-top:80px">
	<div class="w3-container w3-card w3-white w3-round w3-margin">
		<table width="100%">
		<tr>
		<td><h3>UPLOAD DOCUMENTS</h3></td>
		<td >
			<?php echo "<pre align='right'>APPLICATION NUMBER: ".$_SESSION['type']."_".$_SESSION['a_id']."</pre></body>";?>
		</td>
		</tr>
	</table>
		<div class="w3-padding">
			<form action="imageupload.php" enctype="multipart/form-data" method="post">
			<table cellpadding="20px">			
			<tr>
				<td><b>ADDHAR FRONT: </b><p></p></td>
				<td><input type="file" name="file1" class="File" width="100px"></td>
				<td><?php
					if(isset($_POST['Submit']))
					{ 
						$filepath1 = "../../uploads/aadhar/" . $_FILES["file1"]["name"];
						if(move_uploaded_file($_FILES["file1"]["tmp_name"], $filepath1)) 
						{
							echo "<img src=".$filepath1." height=200 width=300 style='border: #00008B 4px dashed;' />";
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
				<td><b>ADDHAR BACK: </b><p><small></p></td>
				<td><input type="file" name="file4" class="File" width="100px"></td>
				<td><?php
					if(isset($_POST['Submit']))
					{ 
						$filepath4 = "../../uploads/aadhar/" . $_FILES["file4"]["name"];
						if(move_uploaded_file($_FILES["file4"]["tmp_name"], $filepath4)) 
						{
							echo "<img src=".$filepath4." height=200 width=300 style='border: #00008B 4px dashed;' />";
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
				<td><b>BIRTH CERTIFICATE : </b></td>
				<td><input type="file" name="file2" class="File" width="100px"></td>
				<td><?php
					if(isset($_POST['Submit']))
					{ 
						
						$filepath2 = "../../uploads/birth_certificate/" . $_FILES["file2"]["name"];
						if(move_uploaded_file($_FILES["file2"]["tmp_name"], $filepath2)) 
						{
							echo "<img src=".$filepath2." height=200 width=300 style='border: #00008B 4px dashed;' / />";
						} 
						else 
						{
							echo "Error !!";
						}
						
					} 
				?>
				</td>
			</tr>
			
			<?php
			
			$sql="SELECT IF(a_spouse is null,0,1) as res from application where aid='$aid'";
			$result = $link->query($sql);
				$data = $result->fetch_assoc();
				if ($data['res']==1)
				{
					
					echo '<tr>
					<td><b>MARRIAGE CERTIFICATE : </b><p><small>Should be named "ApplicationNo.jpg"</small></p></td>
					<td><input type="file" name="file3" class="File" width="100px"></td>
					<td>';
					if(isset($_POST['Submit']))
					{ 
						
						$filepath3 = "../../uploads/marriage_certificate/" . $_FILES["file3"]["name"];
						if(move_uploaded_file($_FILES["file3"]["tmp_name"], $filepath3)) 
						{
							echo "<img src=".$filepath3." height=200 width=300 style='border: #00008B 4px dashed;' / />";
						} 
						else 
						{
							echo "Error !!";
						}
						
					} 
					echo "</td></tr>";
				}
			
			
		?>
			<tr>
				<td>
				</td>
				<td>
				</td>
				<td>
					<button type='submit' value="Upload" name="Submit" class='w3-button w3-grey w3-round-large'>UPLOAD IMAGE</button>
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td>
				</td>
				<td>
					<input type="button" onclick="location.href='prepayment.php';" class='w3-button w3-grey w3-round-large' value="NEXT"/>
				</td>
			</tr>
			</table>
			</form>
			</div></div></div>
<?php
if($_SESSION["type"]=='NEW')
	 $Payment=500;
elseif ($_SESSION["type"]=='UPDATE')
	$Payment=100;
elseif($_SESSION["type"]=='RENEWAL')
	$Payment=400;?>
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
