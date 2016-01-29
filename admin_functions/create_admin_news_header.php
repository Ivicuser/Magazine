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
        <!--<link rel="stylesheet"         type="text/css" href="css/demo.css" />-->
        <!--<link rel="stylesheet"         href="/resources/demos/style.css">-->
        <link rel="stylesheet"         type="text/css" href="css/style1.css" />
        <!--<script type="text/javascript" src="js/modernizr.custom.86080.js"></script>-->
    
        
               

        
    </head>
    <body>
        <div class="container">
            
   <div id="add_news_modal_4" class="modal fade" role="dialog" >
    <div class="modal-dialog" style="width: 35%;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title_2">Couse category</h4>
        </div>
        <div class="modal-body">
        <div class="well_1 A1A1A">
          <?php  
         echo get_all_category_order_by_id_3();
          ?>
           
        </div>
        </div>
       
    <div class="modal-footer"></div>
    </div>
</div>