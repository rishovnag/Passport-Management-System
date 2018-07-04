<html>
<head>
<title>DOCUMENTS VIEW</title>
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
			width:100px;
		}
		
		
	</style>
</head>
<?php
  
	$link = mysqli_connect("localhost","root","","sys_passport");
	if (!$link) {
    	die('Could not connect: ' . mysqli_error($link));
		$aid=$_SESSION['aid'];
	}
?>
<body class="w3-theme-l5">
<!-- Navbar -->
<?php $aid=intval($_GET['q']); 
       $url="documents_view.php?q=".$aid;?>
<div class="w3-top">
	<div class="w3-bar w3-theme-d2 w3-left-align w3-large">
		<a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2 w3-large w3-padding-large" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
		<img src="../Logo/logo.jpg" class="w3-left w3-padding-small" style="height:50px" alt="Logo">
		<a href="<?php echo $url ?>" class="w3-bar-item w3-button w3-padding-large w3-theme-d4">Home</a>
	</div>
</div>
<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:800px;margin-top:80px">
	<div class="w3-container w3-card w3-white w3-round w3-margin">
		<h3>VIEW DOCUMENTS</h3>
		<div class="w3-padding">
		<BR>
		<ul>
				<li type="square"><p id="aadhar"><b>VIEW AADHAR</b></p></li>
				<br><br>
				<li type="square"><p id="birth"><b>VIEW BIRTH CERTIFICATE</b></p></li>
				<br><br>
		<?php
			//$aid=intval($_GET['q']);
			$sql="SELECT IF(a_spouse is null,0,1) as res from application where aid='$aid'";
			$result = $link->query($sql);
				$data = $result->fetch_assoc();
				if ($data['res']==1)
				{
					
					echo "<li type='square'><p id='marriage'><b>VIEW MARRIAGE CERTIFICATE</b></p></li>
							<br><br>";
				}
			echo "
				<script>
					function myFunction1() 
					{
						window.location='show_aadhar.php?q=".$aid."';
					}
					function myFunction2()
					{
						window.location='show_birth.php?q=".$aid."';
					}
					function myFunction3()
					{
						window.location='show_marriage.php?q=".$aid."';
					}
				</script>";
		?>
		</ul>
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

document.getElementById("aadhar").addEventListener("click", myFunction1);
document.getElementById("birth").addEventListener("click", myFunction2);
document.getElementById("marriage").addEventListener("click", myFunction3);

</script>

</body>

</html>