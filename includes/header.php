<!DOCTYPE html>
<html lang="en">
  <head>
      
     
      
      
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="img/favicon.png"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!--The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags--> 
    <title>Explorer</title>

     <!--Bootstrap--> 
        <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="img/favicon.png">

    <!--Else-->  
        <meta name="description" content="Fullscreen Background Image Slideshow with CSS3 - A Css-only fullscreen background image slideshow" />
        <meta name="keywords" content="css3, css-only, fullscreen, background, slideshow, images, content" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css"/>
        <script type="text/javascript" src="js/manual.js"></script>
        
        <link rel="stylesheet" href="/resources/demos/style.css">
        <link rel="stylesheet" type="text/css" href="css/style1.css" />
        
        
        
  
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

      <nav class="navbar navbar-inverse" 
           style="
    position: fixed;
    width: 100%;
    z-index: 10;
    margin-bottom: 0px;" >
          
          
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#" style="
    margin-left: 10px;  margin-right: 26px;  ">Explorer</a>
    </div>
      <div class="collapse navbar-collapse"  id="myNavbar">
  
        

<?php echo admin_menu_2();

?>




      <ul class="nav navbar-nav navbar-right">
        <li><a><span class="glyphicon glyphicon-user"  role="button" data-toggle="modal" data-target="#singup_Modal" aria-expanded="true" aria-controls="modal"> SignUp</span></a></li>
        <li><a><span class="glyphicon glyphicon-log-in"  role="button" data-toggle="modal" data-target="#login_Modal" aria-expanded="true" aria-controls="modal"> LogIn</span></a></li>
      <li class="dropdown">
       <a input type="submit" class="dropdown-toggle" data-toggle="dropdown" href="#">Admin<span class="caret"></span></a>
       <ul class="dropdown-menu">
           <li><a href="admin_create.php">SignUp</a></li>
           <li><a href="admin_login.php">LogIn</a></li>
             </ul>
           </li>
      </ul>
         
    </div>
  </div>
</nav>
   <div class="container">
  <div class="jumbotron" style="
    background: rgba(255, 255, 255, 0.6);
    margin-top: 10%;
    margin-bottom: 6%;
    text-align: center;

    ">
    <h1>Explorer</h1>
    <p>Online shop</p> 
  </div>
  <div class="row_2">
 
<!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->

                    <!-- Modal -->


<div id="login_Modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Please Login</h4>
     </div>
      <div class="modal-body">
          <div class="well">
              <form action="" method="post" >
        <div class="form-group">
            <label for="email">Username:</label>
            <input type="text" name="username" class="form-control" class="username" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" name="password" class="form-control" class="pwd" placeholder="Password">
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="counter" value="1"  Style="margin-left:20%;"> Remember me</label>
        </div>
            <input type="submit" name="Lsubmit" class="btn btn-default" value="Login">
        </form>
        
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>




<div id="singup_Modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Please Sign Up</h4>
      </div>
      <div class="modal-body">
          <div class="well">
              <h4>These things are necessary to create an account!</h4>
          </div>
         <div class="well">
<form enctype="multipart/form-data"  action="" method="post" role="form">
              
                         <div class="form-group">
            <label for="email">Username:</label>
            <input type="text" name="username" class="form-control" id="lastname">
        </div>
            <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" name="password" class="form-control" id="pwd_1">
            </div>
            <div class="form-group">
            <label for="pwd">Confirm Password:</label>
            <input type="password" name="confirm-password" class="form-control" id="pwd_2" onkeyup="checkPass(); return false;">
            <span id="confirmMessage" class="confirmMessage"></span>
            </div>
            
            
        <div class="checkbox">
           <label><input type="checkbox" name="counter" style="margin-left:20%;"> Remember me</label>
        </div>
            <button style="margin: 6px;" data-dismiss="modal" class="btn btn-default" data-target="#singup_Modal_1"  role="button" data-toggle="modal" aria-expanded="true" aria-controls="modal" >Next</button>
<!--            <input type="submit" name="submit" value="Submit" class="btn btn-default">-->
        
        
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

                 




<!--//////////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->


<div id="singup_Modal_1" class="modal fade" role="dialog">
  <div class="modal-dialog">

     <!--Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Please Sign Up</h4>
      </div>
      <div class="modal-body">
           <div class="well">
              <h4>These things are not necessary but it would be desirable if we could enter.</h4>
          </div>
         <div class="well">
<!--        <form enctype="multipart/form-data"  action="" method="post" role="form">-->
    
            
    <div class="form-group">
        <div class="name">   
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" id="name"></div>   
    <div class="lastname">
            <label for="lastname">Lastname:</label>
            <input type="text" name="lastname" class="form-control" id="lastname"></div>
    </div>
              <div class="form-grup">
                  <label for="email">User image:</label>
                  <input type='file' name="image" />
    </br><img id="myImg"alt="your image" height="100" border-radius="5px" class="form_control" >
    
    </div>
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
        $('#myImg').attr('src', e.target.result);
    
        $('#yourImage').attr('src', e.target.result);
    };
     function imageIsLoaded(e) {
         
           $('#for_admins').attr('src', e.target.result);  
         
     };
     
            </script>
            <div class="form-grup">
            <label for="lastname">Country:</label>
            <input type="text" name="country" class="form-control" id="country"></div>
            <div class="form-grup">
            <label for="lastname">Phone Number:</label>
            <input type="text" name="phonenum" class="form-control" id="PhoneNum"></div>   
            <div class="form-grup">
            <label for="lastname">Something about myself:</label>
            <textarea rows="4" cols="50" name="something" class="form-control" id="texatera"></textarea>
            </div>
            <input type="submit" name="submit" value="Submit" class="btn btn-default">
            </form>     
            </div>
            </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                   <button style="margin: 6px; float:left;" data-dismiss="modal" class="btn btn-default" data-target="#singup_Modal"  role="button" data-toggle="modal" aria-expanded="true" aria-controls="modal">Back</button>

                </div>
            </div>
        </div>
    </div>



<!--//////////////////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
