<html>
	<head>
		<title>
		APPLICATION INFORMATION
		</title>
	</head>
	<?php
		session_start();
		$link = mysqli_connect("localhost","root","","sys_passport");
		if (!$link) {
    	die('Could not connect: ' . mysqli_error($link));
		}
		$a_id=intval($_GET['q']);
		$eid=$_SESSION['eid'];
		$_SESSION['aid']=$a_id;
		$sql1=" SELECT a_type from application where aid='$a_id'";
		$result=mysqli_query($link,$sql1);
		$row=mysqli_fetch_array($result);
		$_SESSION['type']=$row['a_type'];
		$url1="app_info.php?q=".$a_id;
		$url2="documents_view.php?q=".$a_id;
		$sql="UPDATE app_stage set p2_eid='$eid' , p2_s_dt=now() where s_aid='$a_id'";
		mysqli_query($link,$sql);
		
	?>
	<frameset cols="50%,50%">
		<frame src="<?php echo $url1 ?>" noresize="noresize">
		<frame src="<?php echo $url2 ?>" NAME="VIEW_WINDOW" target=_blank>
	</frameset>
</html>
