<?php
require_once('includes/load.php');	
//if(is_logged()) {echo redirect('staff.php');}
if(isset($_POST['Lsubmit'])){//da li je kliknuto na dugme za submit

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
        $counter  = mysqli_real_escape_string($conn,$_POST['counter']);
        
	
       
      $query11="INSERT INTO users WHERE username='$username',
      counter     =	'$counter'";
      $result11=mysqli_query($conn,$query11);
      confirm_query($result);
        
        $query="SELECT * FROM users WHERE username='$username'";
	$result=mysqli_query($conn,$query);
	confirm_query($result);
        
        
	if(mysqli_num_rows($result)==1){//nije dozvoljeno imati 2 korisnika sa istim korisnickim imenom
		$row_db=mysqli_fetch_assoc($result);
		if(password_verify($password,$row_db['password'])){
			$_SESSION['username']	=$username;
			$_SESSION['user_id']	= $row_db['id'];
			echo redirect('staff.php');
		}
	}	
	$msg='<div class="msg" style=" position:relative;">Login failed. Check Caps Lock.</div>';
}
}

    if(isset($_GET['logout']) && $_GET['logout']==1){
        $msg2='You are logged out.';
        echo '<h2><a href="index.php">Back</a></h2>';
    }
    ?>


        <?php 
        if(!empty($errors)) echo display_errors($errors);
        if(isset($msg)) echo display_msg($msg,'danger');
        if(isset($msg2)) echo display_msg($msg2,'info');
        ?>

       