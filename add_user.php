<?php
require_once('includes/load.php');
include_once('includes/header_admin.php');
//confirm_logged_in();

if(isset($_POST['submit'])){
	$arr_names	=	array('username','email','password','confirm-password');
	$arr_max	=	array('username'=>40,'email'=>255,'password'=>255);
	
	$err1 = empty_fields($arr_names);
	$err2 = max_fields($arr_max);
	$errors=array_merge($err1,$err2);
	
	if(empty($errors) && $_POST['password']==$_POST['confirm-password']){
		
		$username = mysqli_real_escape_string($conn,$_POST['username']);
		$email 	  = mysqli_real_escape_string($conn,$_POST['email']);
		$password = mysqli_real_escape_string($conn,$_POST['password']);
		
		$hash_pass=password_hash($password,PASSWORD_DEFAULT);
		
		$query="INSERT INTO users SET 
		username	=	'$username',
		email		=	'$email',
		password	=	'$hash_pass'";
		
		$result=mysqli_query($conn,$query);
		confirm_query($result);
		
		if(mysqli_affected_rows($conn)==1){
		$message='You are register to Magazine. Your username is:'.$username;
		mail($email,'Magazine Notification',$message);
		echo redirect('staff.php');
		}
        }
}
?>

<?php include_once('includes/footer.php'); ?>
