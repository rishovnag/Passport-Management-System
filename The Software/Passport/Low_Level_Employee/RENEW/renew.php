<!DOCTYPE html>
<html>
<head>
	<title>RENEW APPLICATION</title>
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
		<td><h3>RENEW APPLICATION</h3></td>
		<td >
			<?php echo "<pre align='right'>APPLICATION NUMBER: ".$_SESSION['type']."_".$_SESSION['a_id']."</pre></body>";?>
		</td>
		</tr>
	</table>
			<?php 
	$AA_ID = $_SESSION['p_id'];
	
	$sql = "SELECT * FROM dum_passport WHERE pno='$AA_ID'";
	$result = mysqli_query($link,$sql);
	if($result->num_rows > 0)
	{	
	while($row=mysqli_fetch_array($result)){
		$_SESSION['A_GIVEN_NAME']=$row['p_given_name'];
		$_SESSION['A_LAST_NAME']=$row['p_last_name'];
		$_SESSION['A_SEX']=$row['p_sex'];
		$_SESSION['A_DOB']=$row['p_dob'];
		$_SESSION['A_POB']=$row['p_pob'];
		$_SESSION['A_GUARDIAN']=$row['p_guardian'];
		$_SESSION['A_SPOUSE']=$row['p_spouse'];
		$_SESSION['A_AADHAR']=$row['p_aadhar'];
		
	?>
		
		
		<div class="w3-padding">
	
	
	 <form action="inforenew.php" method="post" name=f1 onload="return func1()" align="center">
			<table align="center" cellpadding="10px">
		<tr>

          <td>  <label for="A_GIVEN_NAME">GIVEN NAME:</label></td>
			

	<td> <input type="text" name="A_GIVEN_NAME" id="A_GIVEN_NAME" value="<?php echo $row['p_given_name']; ?> " disabled="disabled"></td>
            
        </tr>
        <tr>

          <td>  <label for="A_LAST_NAME">LAST NAME:</label></td>

           <td> <input type="text" name="A_LAST_NAME" id="A_LAST_NAME" value="<?php echo $row['p_last_name']; ?> " disabled="disabled"></td>
	      </tr>
		<tr>
		<?php 
		if(strcmp($row['p_sex'],'Male')==0){
		echo'
		<td>  <label for="A_SEX">SEX:</label></td>
            <td><input type="radio" name="A_SEX" id="dummy11" value="male" checked disabled="disabled"> Male<br>
			<input type="radio" name="A_SEX" id="dummy22" value="female" disabled="disabled"> Female<br>
			<input type="radio" name="A_SEX" id="dummy33" value="other" disabled="disabled"> Other </td> ';
		
		 }if(strcmp($row['p_sex'],'Female')==0){
		echo'
		<td>  <label for="A_SEX">SEX:</label></td>
            <td><input type="radio" name="A_SEX" id="dummy11" value="male"  disabled="disabled"> Male<br>
			<input type="radio" name="A_SEX" id="dummy22" value="female" checked disabled="disabled"> Female<br>
			<input type="radio" name="A_SEX" id="dummy33" value="other" disabled="disabled"> Other </td>'; 
		
		 }if(strcmp($row['p_sex'],'Other')==0){ 	
		echo'	
			<td>  <label for="A_SEX">SEX:</label></td>
            <td><input type="radio" name="A_SEX" id="dummy11" value="male"  disabled="disabled"> Male<br>
			<input type="radio" name="A_SEX" id="dummy22" value="female" disabled="disabled"> Female<br>
			<input type="radio" name="A_SEX" id="dummy33" value="other" checked disabled="disabled"> Other </td>'; 
		 }?>
		</tr>
		<tr>

           <td> <label for="A_DOB">DOB:</label></td>

           <td> <input type="date" name="A_DOB" id="A_DOB" value="<?php echo $row['p_dob']; ?>" disabled="disabled"></td>
			
        </tr>
		<tr>

          <td>  <label for="A_POB">PLACE OF BIRTH:</label></td>

            <td><input type="text" name="A_POB" id="A_POB" value="<?php echo $row['p_pob']; ?> " disabled="disabled"></td>
	    </tr>
        <tr>

          <td>  <label for="A_GUARDIAN">GUARDIAN NAME:</label></td>

           <td> <input type="text" name="A_GUARDIAN" id="A_GUARDIAN" value="<?php echo $row['p_guardian']; ?> " disabled="disabled"></td>
		</tr>
		<tr>

            <td><label for="A_SPOUSE">SPOUSE NAME:</label></td>

           <td> <input type="text" name="A_SPOUSE" id="A_SPOUSE" value="<?php echo $row['p_spouse']; ?> " disabled="disabled"></td>
		</tr>
		<tr>

           <td> <label for="A_B_NO">BUILDING NUMBER:</label></td>
			<?php
			$addr=$row['p_address'];
			$address=explode("  ",$addr);
			?>

            <td><input type="text" name="A_B_NO" id="A_B_NO" value="<?php echo $address[0]; ?> " disabled="disabled"></td>
		</tr>
		<tr>

          <td>  <label for="A_CITY">CITY:</label></td>
			
           <td> <input type="text" name="A_CITY" id="A_CITY" value="<?php
		   $_SESSION['A_B_NO']=$address[0];
		$_SESSION['A_CITY']=$address[1]; 
		$_SESSION['A_STATE']=$address[2];
		$_SESSION['A_PIN']=$address[3];
		   
		   
		   echo $address[1]; ?> " disabled="disabled"></td>
		</tr>
		<tr>

          <td>  <label for="A_STATE">STATE:</label></td>

           <td> <input type="text" name="A_STATE" id="A_STATE" value="<?php echo $address[2]; ?> " disabled="disabled"></td>
		</tr>
		<tr>

           <td> <label for="A_PIN">PIN:</label></td>

           <td> <input type="text" name="A_PIN" id="A_PIN" value="<?php echo $address[3]; ?> " disabled="disabled"></td>
		</tr>
        <tr>

            <td><label for="A_AADHAR">AADHAR NUMBER:</label></td>

            <td><input type="text" name="A_AADHAR" id="A_AADHAR" value="<?php echo $row['p_aadhar']; }?> " disabled="disabled"></td>
	    </tr>
	<tr><td></td><td>
	<br><br>
        <button type='submit'  name='submit' class='w3-button w3-grey w3-round-large'>SUBMIT</button></form>
    <br><br><br>
	</tr></td>
	
	</table>
    </form>	
	</div>
	</div>
	</div>
	<footer class="w3-container w3-theme-d2" style="bottom:0;text-align:center;position:fixed;width:100%;">
		<p>Passport Management System, made as a requirement for M.Sc Sem II Assignment.</p>
	</footer>

<?php
	}else {
		?>
		
		<font  color="red" size="6"><?php echo 'Sorry, Wrong Information!!'; ?></font>
	<?php }
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
