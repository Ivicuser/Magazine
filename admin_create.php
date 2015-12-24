<?php

require_once('includes/load.php');
include('admin_functions/create_admin_header.php');


if(isset($_POST['submit'])){

    
	$arr_names  =   array('username','email','password','confirm-password');
	$arr_max    =   array('username'=>40,'email'=>255,'password'=>255);
	
        
                $err1   = empty_fields($arr_names);
                $err2   = max_fields($arr_max);
                $errors = array_merge($err1,$err2);
     
                
              
            if(!empty($errors) OR ($_POST['password']!=$_POST['confirm-password']) ){
                       
                echo display_errors($errors);
            }else{
		$username  = mysqli_real_escape_string($conn,$_POST['username']);
                $name      = mysqli_real_escape_string($conn,$_POST['name']);
                $lastname  = mysqli_real_escape_string($conn,$_POST['lastname']);
                $email 	   = mysqli_real_escape_string($conn,$_POST['email']);
		$password  = mysqli_real_escape_string($conn,$_POST['password']);
		$country   = mysqli_real_escape_string($conn,$_POST['country']);
                $phone_num = mysqli_real_escape_string($conn,$_POST['phone_number']);
                $myself    = mysqli_real_escape_string($conn,$_POST['about_myself']);
                $counter   = mysqli_real_escape_string($conn,$_POST['counter']);
                 
                $old_location    =      $_FILES['image']['tmp_name'];
                $folder_name     =      urlencode($username);
                if(!is_dir('uploads/'.$username)){
                    mkdir('uploads/'.$folder_name);
                } 
                
                $new_location   =   'uploads/'.$folder_name.'/'.$_FILES['image']['name'];
		$hash_pass = password_hash($password,PASSWORD_DEFAULT);
		
		$query="INSERT INTO admin_users SET 
		username	=	'$username',
		name            =       '$name',
                lastname        =       '$lastname',
                email		=	'$email',
                country         =       '$country',
		password	=	'$hash_pass',
                phone_number    =       '$phone_num',
                about_myself    =       '$myself',
                counter         =       '$counter',
                datetime        =        now()";
                
                if(move_uploaded_file($old_location,$new_location)){
                $query.=" , image = '$new_location' ";}
                $result =   mysqli_query($conn,$query);
		confirm_query($result);

                
                $query1="SELECT * FROM admin_users WHERE username='$username'";
                $result1=mysqli_query($conn,$query1);
                confirm_query($result1);
                
                $row_db=mysqli_fetch_assoc($result1);
		if(password_verify($password,$row_db['password'])){
			$_SESSION['username']	=$username;
			$_SESSION['user_id']	= $row_db['id'];
                

                    echo redirect("admin_staff.php");
                    
//            $message='You are create account . Your username is:'.$username;
//            mail($email,'Magazine Notification',$message);
//                
                
                }
            }
        }

        
        ?>

<div id="lable_1" style="background:#F3E5DD;  border-radius:15px" >
<div class="form window" style="margin-top:100px;" >
    <div class="form class "style="margin:100px;">
        <h1><center>SignUp</center></h1>
         <form enctype="multipart/form-data"  action="" method="post" role="form">
          <div class="form-group">
            <label for="exampleInputEmail1" style="margin-top: 58px;">Username</label>
            <input type="text" class="form-control" name="username"id="exampleInputUsername1">
          </div>
              <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="name"id="exampleInputName1">
          </div>
              <div class="form-group">
            <label for="exampleInputEmail1">Lastname</label>
            <input type="text" class="form-control" name="lastname" id="exampleInputLastname1">
          </div>
              <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" >
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
            <label for="exampleInputFile">Profil image</label>
            <input type="file" name="image" id="exampleInputFile">
            <br><img id="Ad-Img" alt="Profil image" height="140px" style="border-radius:15px;" name="image" class="form_control" >
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
            <input type="text" class="form-control" name="country" id="exampleInputCountry1">
          </div>
             <div class="form-group">
            <label for="exampleInputPassword1">Phone Number</label>
            <input type=text" class="form-control" name="phone_number" id="exampleInputPhone1">
          </div>
             <div class="form-group">
                 <label for="exampleInputPassword1">About Myself</label>
                 <textarea rows="4" cols="50" class="form-control" name="about_myself" id="exampleInputMyself1"></textarea>
          </div>
          
             <button type="submit" name="submit" class="btn Su-Bn-Ad-Cr-Ac" style="margin-bottom: 66px;">Submit</button>
             <a href="index.php" class="btn Cs" style="margin-bottom: 66px;">Back</a>
        </form>
        
<!--<script type="text/javascript">

var slideimages = new Array()
slideimages[0] = new Image() 
slideimages[0].src = "uploads/10492311_602987573150100_2794005075325687208_n.jpg" 
slideimages[1] = new Image()
slideimages[1].src = "uploads/mouse_1.jpg"
slideimages[2] = new Image()
slideimages[2].src = "uploads/mouse_2.jpg"

</script>


<img src="firstcar.gif" id="slide" width="100" height="56" />
<script type="text/javascript">


            var step=0
        function slideit(){
            if (!document.images)
                return
            document.getElementById('slide').src = slideimages[step].src
            if (step<2)
                step++
            else
                step=0
            setTimeout("slideit()",2500)
        }
            slideit()

</script>-->
</div>
</div>
</div>
<?php    
        include('admin_functions/create_admin_footer.php');
?>


