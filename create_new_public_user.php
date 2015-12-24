<?php
require_once('includes/load.php');



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
		$email 	   = mysqli_real_escape_string($conn,$_POST['email']);
		$password  = mysqli_real_escape_string($conn,$_POST['password']);
		$country   = mysqli_real_escape_string($conn,$_POST['country']);
                $phone_num = mysqli_real_escape_string($conn,$_POST['phonenum']);
                $name      = mysqli_real_escape_string($conn,$_POST['name']);
                $lastname  = mysqli_real_escape_string($conn,$_POST['lastname']);
                $myself    = mysqli_real_escape_string($conn,$_POST['something']);
                $counter   = mysqli_real_escape_string($conn,$_POST['counter']);
                 
                $old_location    =      $_FILES['image']['tmp_name'];
                $folder_name     =      urlencode($username);
                if(!is_dir('uploads/'.$username)){
                    mkdir('uploads/'.$folder_name);
                } 
                
                $new_location   =   'uploads/'.$folder_name.'/'.$_FILES['image']['name'];
		$hash_pass = password_hash($password,PASSWORD_DEFAULT);
		
		$query="INSERT INTO users SET 
		username	=	'$username',
		email		=	'$email',
                country         =       '$country',
		password	=	'$hash_pass',
                phone_number    =       '$phone_num',
                name            =       '$name',
                lastname        =       '$lastname',
                about_myself    =       '$myself',
                counter         =       '$counter',
                datetime        =        now()";
                
                if(move_uploaded_file($old_location,$new_location)){
                $query.=" , image = '$new_location' ";}
                $result =   mysqli_query($conn,$query);
		confirm_query($result);

                
                $query1="SELECT * FROM users WHERE username='$username'";
                $result1=mysqli_query($conn,$query1);
                confirm_query($result1);
                
                $row_db=mysqli_fetch_assoc($result1);
		if(password_verify($password,$row_db['password'])){
			$_SESSION['username']	=$username;
			$_SESSION['user_id']	= $row_db['id'];
                

                    echo redirect("staff.php");
                    
//            $message='You are create account . Your username is:'.$username;
//            mail($email,'Magazine Notification',$message);
//                
                
                }
            }
        }

?>


