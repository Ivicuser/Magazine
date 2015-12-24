<?php
require_once('includes/load.php');
include_once('includes/header.php');	
if(is_logged()) {echo redirect('desktop_index.php');}

if(isset($_POST['submit'])){//da li je kliknuto na dugme za submit

//pripremam nizove koje prosledjujem funkcijama za provjeru podataka iz forme
	$arr_names	=	array('username','password');
	$arr_max	=	array('username'=>40,'password'=>40);

//pozivam funkcije za provjeru podataka iz forme	
	$err1 = empty_fields($arr_names);
	$err2 = max_fields($arr_max);
	
	$errors = array_merge($err1,$err2);//sastavim greske u jedan niz
	
	if(empty($errors)){
	
	$username = mysqli_real_escape_string($conn,$_POST['username']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);
        
	$query="SELECT * FROM public_users WHERE username='$username'";
	$result=mysqli_query($conn,$query);
	confirm_query($result);
       
	if(mysqli_num_rows($result)==1){//nije dozvoljeno imati 2 korisnika sa istim korisnickim imenom
		$row_db=mysqli_fetch_assoc($result);
		if(password_verify($password,$row_db['password'])){
			$_SESSION['username']	=$username;
			$_SESSION['user_id']	= $row_db['id'];
			echo redirect('desktop_index.php');
		}
	}	
	$msg='Login failed. Check Caps Lock.';
}
}

if(isset($_GET['logout']) && $_GET['logout']==1){
	$msg2='You are logged out.';
}
?>
<form action="" method="post">
<h2>Login Area</h2>
<?php 
if(!empty($errors)) echo display_errors($errors);
if(isset($msg)) echo display_msg($msg,'danger');
if(isset($msg2)) echo display_msg($msg2,'info');
?>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username" placeholder="Username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
 
  <input type="submit" class="btn btn-primary" name="submit" value="Login">
  <a href="index.php"  class="btn btn-danger" >Cancel</a>
</form>
<?php include_once('includes/footer.php');?>
