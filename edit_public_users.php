<?php
require_once('includes/Aload.php');
include_once('admin_functions/create_admin_header.php');
confirm_logged_in();
    if(isset($_GET['id'])){
        $user_id=$_GET['id'];
            $user=get_user($user_id); 

if(!$user){
echo redirect('admin_staff.php');	
}

if(isset($_POST['submit'])){
	$arr_names	=	array('username','email','password','confirm-password');
	$arr_max	=	array('username'=>40,'email'=>255,'password'=>255);
	
	$err1 = empty_fields($arr_names);
	$err2 = max_fields($arr_max);
	$errors=array_merge($err1,$err2);

	if(empty($errors) && $_POST['password']==$_POST['confirm-password']){
		$username  = mysqli_real_escape_string($conn,$_POST['username']);
		$email 	   = mysqli_real_escape_string($conn,$_POST['email']);
		$password  = mysqli_real_escape_string($conn,$_POST['password']);
		$country   = mysqli_real_escape_string($conn,$_POST['country']);
                $phone_num = mysqli_real_escape_string($conn,$_POST['phonenum']);
                $name      = mysqli_real_escape_string($conn,$_POST['name']);
                $lastname  = mysqli_real_escape_string($conn,$_POST['lastname']);
                $myself    = mysqli_real_escape_string($conn,$_POST['something']);

                $old_location    =      $_FILES['image']['tmp_name'];
                $folder_name     =      urlencode($username);
                if(!is_dir('uploads/'.$username)){
                    mkdir('uploads/'.$folder_name);
                } 
                
                $new_location   =   'uploads/'.$folder_name.'/'.$_FILES['image']['name'];
		$hash_pass=password_hash($password,PASSWORD_DEFAULT);
		
		$query="UPDATE users SET 
		username	=	'$username',
		email		=	'$email',
                country         =       '$country',
		password	=	'$hash_pass',
                phone_number    =       '$phone_num',
                name            =       '$name',
                lastname        =       '$lastname',
                about_myself    =       '$myself' WHERE id='$user_id'";

		 
                if(move_uploaded_file($old_location,$new_location)){
                $query.=" , image = '$new_location' "; }
		$result=mysqli_query($conn,$query);
		confirm_query($result);
		
                
		if(mysqli_affected_rows($conn)==1){
//		$message='Your profile is updated. Your username is:'.$username;
//		mail($email,'Magazine Notification',$message);
		echo redirect('admin_staff.php');
            }
        }
    }
}
$query = "SELECT * FROM users WHERE id='$user_id'";
$result = mysqli_query($conn,$query);
confirm_query($result);

while($user=mysqli_fetch_assoc($result)){


    ?>

<div id="lable_1" style="background:#F3E5DD;  border-radius:15px" >
<div class="form window" style="margin-top:100px;" >
    <div class="form class "style="margin:100px;">
        <h1><center>Edit public account</center></h1>
         <form enctype="multipart/form-data"  action="" method="post" role="form">
          <div class="form-group">
            <label for="exampleInputEmail1" style="margin-top: 58px;">Username</label>
        <input type="text" class="form-control" value="<?php echo $user['username']; ?>" name="username"id="exampleInputUsername1">
          </div>
              <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" value="<?php echo $user['name']; ?>" name="name"id="exampleInputName1">
          </div>
              <div class="form-group">
            <label for="exampleInputEmail1">Lastname</label>
            <input type="text" class="form-control" value="<?php echo $user['lastname']; ?>" name="lastname" id="exampleInputLastname1">
          </div>
              <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" value="<?php echo $user['email']; ?>" name="email" id="exampleInputEmail1" >
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" id="pwd_1">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input type="password" class="form-control" name="confirm-password" id="pwd_2" onkeyup="checkPass(); return false;">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">When created account</label>
            <br>
            <?php echo $user['datetime']; ?>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Profil image</label>
            <input type="file" name="image" id="exampleInputFile">
            
            <br><img id="Ad-Img" src="<?php echo $user['image']; ?>" alt="Profil image" height="140px" style="border-radius:15px;" name="image" class="form_control" >
         
        
            <script type="text/javascript">
                /* The uploader form */
    function activaTab(tab){
        $('.tab-pane a[href="#' + tab + '"]').tab('show');
    };
   $(function () {
        $(":file").change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
  

    function imageIsLoaded(e) {
        $('#Ad-Img').attr('src', e.target.result);
//        $('#yourImage').attr('src', e.target.result);
    };

     
            </script>
          </div>
             <div class="form-group">
            <label for="exampleInputPassword1">Country</label>
            <input type="text" class="form-control" name="country" value="<?php echo $user['country']; ?>" id="exampleInputCountry1">
          </div>
             <div class="form-group">
            <label for="exampleInputPassword1">Phone Number</label>
            <input type=text" class="form-control" name="phone_number" value="<?php echo $user['phone_number']; ?>" id="exampleInputPhone1">
          </div>
             <div class="form-group">
                 <label for="exampleInputPassword1">About Myself</label>
                 <textarea rows="4" cols="50" class="form-control" value="<?php echo $user['about_myself']; ?>" name="about_myself" id="exampleInputMyself1"></textarea>
          </div>
          
             <button type="submit" name="submit" class="btn Su-Bn-Ad-Cr-Ac" style="margin-bottom: 66px;">Submit</button>
             <a href="admin_staff.php" class="btn Cs" style="margin-bottom: 66px;">Back</a>
        </form>

         </div>
        </div>
        </div>
<?php
}

include_once('includes/footer.php'); ?>