<?php
require_once('includes/Aload.php');
confirm_logged_in();

if(isset($_GET['id'])){
	$user_id=$_GET['id'];
	$user=get_user($user_id);

//	$user_id=$_SESSION['user_id'];
//	$user=get_user($user_id);
	
	if($user){//ako nije false/ odnosno ako postoji u bazi user
		
		$query="DELETE FROM users WHERE id='$user_id'";
		$result=mysqli_query($conn,$query);//izvrsi upit
		confirm_query($result);//potvrdi upit
		
		if(mysqli_affected_rows($conn)==1){//broj redova na koje je uticao poslednji query
			echo redirect('admin_staff.php');
		}
	}
}
//echo redirect('desktop_index.php');
?>
 
