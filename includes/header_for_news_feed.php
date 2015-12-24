<!DOCTYPE html>
<html lang="en">
  <head>
      
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"  content="IE=edge">
        <link rel="shortcut icon"           href="img/favicon.png"> 
        <meta name="viewport"               content="width=device-width, initial-scale=1">
        
            <!--The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags--> 
        
        <title>Explorer</title>

                      <!--Bootstrap-->
                      
        <link   href="css/bootstrap.min.css" rel="stylesheet">
	<link   rel="shortcut icon"          href="img/favicon.png">
        <link   href="css/style_II.css"      rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">    </script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">   </script>
        <script src="//code.jquery.com/jquery-1.10.2.js">                                   </script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js">                             </script>
        <script type="text/javascript"       src="js/manual.js">                            </script>
                 
                     <!--This is background slider-->   
                     
        <meta name="description"       content="Fullscreen Background Image Slideshow with CSS3 - A Css-only fullscreen background image slideshow" />
        <meta name="keywords"          content="css3, css-only, fullscreen, background, slideshow, images, content" />
        <meta name="author"            content="Codrops" />
        <link rel="shortcut icon"      href="../favicon.ico"> 
        <link rel="stylesheet"         type="text/css" href="css/demo.css" />
        <link rel="stylesheet"         type="text/css" href="css/style1.css" />
        <!--<script type="text/javascript" src="js/modernizr.custom.86080.js"></script>-->
    
    </head>
<body id="page">
        <ul class="cb-slideshow">
            <li><span>Image 01</span><div><h3>  </h3></div></li>
            <li><span>Image 02</span><div><h3>  </h3></div></li>
            <li><span>Image 03</span><div><h3>  </h3></div></li>
            <li><span>Image 04</span><div><h3>  </h3></div></li>
            <li><span>Image 05</span><div><h3>  </h3></div></li>
            <li><span>Image 06</span><div><h3>  </h3></div></li>
        </ul>
    
<nav class="navbar navbar-inverse"style="position: fixed;width: 100%;z-index: 10;margin-bottom: 0px;" >        
  <div class="container-fluid">
      <div class></div>
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
    </button>
      
    <div class="collapse navbar-collapse" id="myNavbar">

<button type="button" class="btn-default1" aria-label="Justify" style="color: #AA3E03;background-color: #333;
    border-color: #AA3E03;margin-top: 10px;width: 40px;height: 27px;border-radius: 12px;float:left;margin-right: 14px;" >        
  <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span>
</button>
        
<?php  echo admin_menu();?>
<span class="glyphicon glyphicon-search" id="search" aria-hidden="true" style="float: right;margin: 16px;"></span>
    <div class="puss">
    <input type="text" class="search_input"
        sdata-toggle="popover" 
        data-trigger="focus" title="Alert"
        data-placement="bottom"
        data-content="This option will be soon available!" 
        placeholder="Search">
    </div>
    </div>
  </div>
</div>
</nav>
    <div class="left_side_bar">
        <div class="user_image">
            <?php 
         
            echo show_user_image();
            ?>
            
            <!--<img src="img/dribbb.gif" alt="Smiley face" width="200" height="150" style=" border-radius: 15px; margin-top: 14px; ">-->
        </div>
<div class="info_user">
    <ul> 
        <li>
            <div class="user_name"> <center>   <?php echo $user['username'];?> </center></div>
               <div class="a2">
            <ul>
               <li><a><span class="edit"  role="button" data-toggle="modal" data-target="#edit_user_Modal" aria-expanded="true" aria-controls="modal">Edit accaunt</span></a></li>
               <li><a><span class="add1"  role="button" data-toggle="modal" data-target="#add_news_modal" aria-expanded="true" aria-controls="modal">Add listings</span></a></li>   
               <li><a href="show_listings.php"><span class="show"  role="button" data-toggle="modal" data-target="#" aria-expanded="true" aria-controls="modal">Show my listings</span></a></li>
               <li><a><span class="delete"  role="button" data-toggle="modal" data-target="#confirm_deletion" aria-expanded="true" aria-controls="modal">Delete accaunt</span></a> </li>
               <li><a><span class="logout"  role="button" data-toggle="modal" data-target="#confirm_logout" aria-expanded="true" aria-controls="modal">Logout</span></a>   </li>
               <li><?php //     echo get_all_category_order_by_id();     ?></li>
            </ul>
               </div>
        </li>
    </ul>
 </div>
    <div class="about_us">
        <ul class="rest">
            <li><a><span class="site_info" role="button" data_toggle="modal" data-target="#" aria-expanded="true" aria-controls="modal">Info</span></a></li>
            <li><a><span class="site_info" role="button" data_toggle="modal" data-target="#" aria-expanded="true" aria-controls="modal">About</span></a></li>
            <li><a><span class="site_info" role="button" data_toggle="modal" data-target="#" aria-expanded="true" aria-controls="modal">Contat us</span></a></li>
            <li><span class="glyphicon glyphicon-search" id="search_2" aria-hidden="true" ></span></li>
        </ul>
    </div>
    </div>
        <div class="container">
<div class="jumbotron" style="background: rgba(255, 255, 255, 0.6);margin-top: 10%;margin-bottom:6%;text-align: center;">
    <h1>Explorer</h1>
    <p>Online shop</p> 
</div>
<div class="row">
<script type="text/javascript">
    /* The uploader form */
    
//    function activaTab(tab){
//        $('.tab-pane a[href="#' + tab + '"]').tab('show');
//    };
//    
//    $(function () {
//        $(":file").change(function () {
//            if (this.files && this.files[0]) {
//                var reader = new FileReader();
//
//                reader.onload = imageIsLoaded;
//                reader.readAsDataURL(this.files[0]);
//                }
//          });
//    });
//    
//    function imageIsLoaded(e) {
//        $('#myImg').attr('src', e.target.result);
//        $('#yourImage').attr('src', e.target.result);
//    };



$(document).ready(function() {
    $("#usr_img").click(function(evt) {
        $(this).zoomTo({targetsize:0.75, duration:600});
        evt.stopPropagation();
    });
});
settings = {
    // zoomed size relative to the container element
    // 0.0-1.0
    targetsize: 0.9,
    // scale content to screen based on their size
    // "width"|"height"|"both"
    scalemode: "both",
    // animation duration
    duration: 450,
    // easing of animation, similar to css transition params
    // "linear"|"ease"|"ease-in"|"ease-out"|"ease-in-out"|[p1,p2,p3,p4]
    // [p1,p2,p3,p4] refer to cubic-bezier curve params
    easing: "ease",
    // use browser native animation in webkit, provides faster and nicer
    // animations but on some older machines, the content that is zoomed 
    // may show up as pixelated.
    nativeanimation: true,
    // root element to zoom relative to 
    // (this element needs to be positioned)
    root: $(document.body),
    // show debug points in element corners. helps
    // at debugging when zoomooz positioning fails
    debug: false,
    // this function is called with the element that is zoomed to in this
    // when animation ends
    animationendcallback: null,
    // this specifies, that clicking an element that is zoomed to zooms
    // back out
    closeclick: false
}
// settings can be set for both the zoomTo and zoomTarget calls:
$("#usr_img").zoomTo(settings);
            </script>

         
<div class="container"> 
         <div class="row">
             
<div id="edit_user_Modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit accaunt</h4>
                <div class="modal_adva">
                    <h4 style="margin: 6px;" data-dismiss="modal" class="btn-default1" data-target="#advanced_edit"  role="button" data-toggle="modal" aria-expanded="true" aria-controls="modal" >Advanced edit</h4>
                </div>
            </div>
        <div class="modal-body">
    <div class="well">
                    
  <form enctype="multipart/form-data"  action="" method="post" role="form">

<div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username"  value="<?php echo $user['username'];?>">
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" name="email" value="<?php echo $user['email'];?>">
</div>
<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password" id="pwd_1"  >
</div>    
<div class="form-group">
    <label for="confirm-password">Confirm password</label>
    <input type="password" class="form-control" name="confirm-password" id="pwd_2"  placeholder="Confirm password" onkeyup="checkPass(); return false;" >
</div>
             <input type="submit" name="submit" value="Submit" class="btn btn-default">
    <!--<input type="submit" class="btn btn-primary" name="submit" value="Edit user">-->
<!--    <a href="staff.php"  class="btn btn-danger" >Cancel</a>-->
        <!--</form>-->     
    </div>
        </div>
    <div class="modal-footer">
<button type="button" class="btn-default1" data-dismiss="modal" style="color: #AA3E03;background-color: #333;
    border-color: #AA3E03;margin-top:10px;width:61px;height:31px; border-radius:8px;">Close</button>
    </div>
</div>

    </div>
</div>  
              <!--End of modal-->
          
              
              <?php            
$user_id=$_SESSION['user_id'];
$user=get_user($user_id);
            
if($user){
                
$query = "SELECT * FROM users WHERE id='$user_id'";
$result = mysqli_query($conn,$query);
confirm_query($result);
       if($result){
            while($user=mysqli_fetch_assoc($result)){
              ?>
              
              
              
<div id="advanced_edit" class="modal fade" role="dialog">
    
    
      <div class="modal-dialog">

     <!--Modal content-->
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
        <!--<h4 class="modal-title">Please Sign Up</h4>-->
</div>
<div class="modal-body">
  
<div class="well">
    <h3>Edit your profile!</h3>
</div>
<div class="well">
            
<div class="form-group">
<div class="name">   
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo $user['name'];?>"class="form-control" id="name">
</div>   
<div class="lastname">
    <label for="lastname">Lastname:</label>
    <input type="text" name="lastname" value="<?php echo $user['lastname'];?>"class="form-control" class="form-control" id="lastname">
</div>
    </div>
    <div class="form-grup">
            <label for="email">User image:</label>
            <input type='file' name="image" value="<?php // echo show_user_imagefor_show(); ?>"  />
    </br><img id="myImg"alt="your image" height="100" 
              border-radius="5px" class="form_control" name="image" value="<?php // echo show_user_image_for_show(); ?>"   >
    </div>  <script type="text/javascript">
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
        $('#myImg').attr('src', e.target.result);
        $('#yourImage').attr('src', e.target.result);
    };
            </script>
            <div class="form-grup">
            <label for="lastname">Country:</label>
            <input type="text" name="country" value="<?php echo $user['country'];?>"class="form-control" class="form-control" id="country"></div>
            <div class="form-grup">
            <label for="lastname">Phone Number:</label>
            <input type="text" name="phonenum" class="form-control" value="<?php echo $user['phone_number'];?>" id="PhoneNum"></div>   
            <div class="form-grup">
            <label for="lastname">Something about myself:</label>
            <textarea rows="4" cols="50" name="something" value="<?php echo $user['email'];?>" class="form-control" id="texatera"></textarea>
            </div>
            <input type="submit" name="submit" value="Submit" class="btn btn-default">
</form>
            </div>
            </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                   <button style="margin: 6px; float:left;" data-dismiss="modal" class="btn btn-default" data-target="#edit_user_Modal"  role="button" data-toggle="modal" aria-expanded="true" aria-controls="modal">Back</button>

                </div>
            </div>
        </div>
</div>  
              
              
              <?php
                    }
                }    
            }
              ?>
              
              <!--Modal for confirm deleting account-->
              
<div id="confirm_deletion" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Confirm deletion!</h4>
        </div>
    <div class="modal-body">
        <div class="well">
            <h4>Are you sure do you want delete your account?</h4>
            <a class="no_button" data-dismiss="modal">No</a>
            <a href="delete_user.php" class="yes_button">Yes</a> 
        </div>
    </div>
        <div class="modal-footer"> </div>
</div>
</div> 
               <!--End of Modal-->
               
               <!--Modal for logout-->
        
<div id="confirm_logout" class="modal fade" role="dialog" >
    <div class="modal-dialog" style="width: 23%;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Confirm Logout!</h4>
        </div>
        <div class="modal-body">
        <div class="well">
            <h4>Are you sure do you want logout?</h4>
            <a class="no_button" data-dismiss="modal">No</a>
            <a href="logout.php" class="yes_button">Yes</a>
        </div>
        </div>
       
    <div class="modal-footer"></div>
    </div>
</div>
               
               
               
<div id="add_news_modal" class="modal fade" role="dialog" >
    <div class="modal-dialog" style="width: 35%;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title_2">Couse category</h4>
        </div>
        <div class="modal-body">
        <div class="well_1">
          <?php echo get_all_category_order_by_id_2();     ?>
           
        </div>
        </div>
       
    <div class="modal-footer"></div>
    </div>
</div>

            
