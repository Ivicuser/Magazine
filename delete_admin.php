<?php
require_once('includes/Aload.php');
confirm_logged_in();

	$user_id=$_SESSION['user_id'];
	$user=get_admin($user_id);
	
	if($user){//ako nije false/ odnosno ako postoji u bazi user
		
		$query="DELETE FROM admin_users WHERE id='$user_id'";
		$result=mysqli_query($conn,$query);//izvrsi upit
		confirm_query($result);//potvrdi upit
		
		if(mysqli_affected_rows($conn)==1){//broj redova na koje je uticao poslednji query
			echo redirect('logout.php');
		}
	}
	
//echo redirect('staff.php');
?>