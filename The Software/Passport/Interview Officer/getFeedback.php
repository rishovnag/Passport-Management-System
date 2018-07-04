<!DOCTYPE html>
<html>
<head>
	<title>Feedback</title>
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
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">

	<div class="w3-container w3-card w3-white w3-round w3-margin">
	<table width="100%">
		<tr>
		<td><h3>Feedback</h3></td>
		<td >
			<?php echo "<pre align='right'>APPLICATION NUMBER: ".$_SESSION['app_num']."</pre></body>";?>
		</td>
		</tr>
	</table>
		<div class="w3-padding">
		
			<form>
				<table cellpadding="20px">
					<tr>
						<td>
							<b>COMMENTS :</b>
						</td>
						<td>
							<textarea rows="4" cols="50" id="comment"></textarea>
						</td>
					</tr>
					<tr>
						<td>
						</td>
						<td>
						<button type='submit' onclick="Update();" class='w3-button w3-grey w3-round-large'>FINISH</button>
						<button type='submit' onclick="Cancel();" class='w3-button w3-grey w3-round-large'>CANCEL APPLICATION</button>
						</td>
					</tr>
			</table>
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
			function Update(){
				  var comment=document.getElementById("comment").value;
				  var formData=new FormData();
				  formData.append("comment",comment);
				  var xmlhttp=new XMLHttpRequest();
	              xmlhttp.onreadystatechange=function(){
	              if (this.readyState == 4 && this.status == 200){
	                 window.alert(this.responseText);
					 window.top.location='interview_home.php';
	                  }
	          };
			  xmlhttp.open("POST","end_interview.php",true);
	          xmlhttp.send(formData);
	      }
		  
		  function Cancel(){
				  var comment=document.getElementById("comment").value;
				  var formData=new FormData();
				  formData.append("comment",comment);
				  var xmlhttp=new XMLHttpRequest();
	              xmlhttp.onreadystatechange=function(){
	              if (this.readyState == 4 && this.status == 200){
	                 window.alert(this.responseText);
					 window.top.location='interview_home.php';
	                  }
	          };
			  xmlhttp.open("POST","cancel_application.php",true);
	          xmlhttp.send(formData);
	      }
</script>
</body>
</html>
