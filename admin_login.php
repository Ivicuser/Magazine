
<?php
include("admin_functions/create_admin_header.php");
require_once('includes/load.php');	
//if(is_admin_logged()) {echo redirect('admin_staff.php');}
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
//        $counter  = mysqli_real_escape_string($conn,$_POST['counter']);
        
        $query="SELECT * FROM admin_users WHERE username='$username'";
	$result=mysqli_query($conn,$query);
	confirm_query($result);
        
        
	if(mysqli_num_rows($result)==1){//nije dozvoljeno imati 2 korisnika sa istim korisnickim imenom
		$row_db=mysqli_fetch_assoc($result);
		if(password_verify($password,$row_db['password'])){
			$_SESSION['username']	= $username;
			$_SESSION['user_id']	= $row_db['id'];
			echo redirect('admin_staff.php');
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

       
<div id="lable_1" style="background:#F3E5DD;  border-radius:15px" >
<div class="form window" style="margin-top:100px;" >
    <div class="form class "style="margin:100px;">
        <h1><center>LogIn</center></h1>
         <form enctype="multipart/form-data"  action="" method="post" role="form">
          <div class="form-group">
            <label for="exampleInputEmail1" style="margin-top: 58px;">Username</label>
            <input type="text" class="form-control" name="username"id="exampleInputUsername1">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" id="pwd_1">
          </div>

             <button type="submit" name="submit" class="btn Su-Bn-Ad-Lg" style="margin-bottom: 66px;">Submit</button>
             <a href="index.php" class="btn Cs" style="margin-bottom: 66px;">Back</a>
        </form>



</div>
</div>
</div>

<?php
include("admin_functions/create_admin_footer.php");
?>