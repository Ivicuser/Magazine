<?php
require_once ('edit_user.php');
require_once('includes/load.php');
include_once('includes/header.php');

//confirm_logged_in();
  


//if(isset($_GET['id'])){
//	$news_id=$_GET['id'];
//	$old_news=get_news($news_id);
//?>	
<!-- <div class="jumbotron" style="
    background: rgba(255, 255, 255, 0.8);
    position: relative;
    width:45%;
    margin-left:26%;
    border-radius: 20px;
">

<div class="show_news" style="position: relative;">

<div class="title"><h2>//////<?php //echo $old_news['title'];?></h2>
 <div class="button_cancel">  
<a href="staff.php"  class="glyphicon glyphicon-share-alt" style="
    color: chocolate;
" >Back</a>
 </div>
</div>
<hr>
		<div style="max-width:400px;margin:0 auto;">-->
		//<?php
//			if($old_news['img_src']!=''){
//			echo '<img src="'.$old_news['img_src'].'" width="350" class="img-responsive">';
//			}
//		?>
<!--		</div>
<div class="content_from_news">
	<p class="text-justify">-->
		//<?php
//			echo $old_news['content'];
//		?>
<!--	</p>	
</div>
</div></div>-->
//<?php	
//}
//
//else{
    ?>
    <div class="news_show">

     <script >
  $(function() {
    $( "#tabs" ).tabs({
      beforeLoad: function( event, ui ) {
        ui.jqXHR.fail(function() {
          ui.panel.html(
            "<img src='img/loading.gif' alt='loading' width='200' height='200' style='border-radius:15px;'>" );
        });
      }
    });
  });
  </script>
<!--
  
  
--><div id="tabs">
  <ul>
    <li><a href="#tabs-1">Home</a></li>
    <li><a href="Categories_news/news_1.php">Tab 1</a></li>
    <li><a href="Categories_news/news_2.php">Tab 2</a></li>
     <li><a href="Categories_news/news_3.php">Tab 3</a></li>
      <li><a href="Categories_news/news_4.php">Tab 4</a></li>
       <li><a href="Categories_news/news_6.php">Tab 5</a></li>
    
  </ul>
    
     <div id="tabs-1">
   <?php
         $query="SELECT * FROM news ORDER BY datetime DESC LIMIT 20";
	$result=mysqli_query($conn,$query);//izvrsi upit
	confirm_query($result);//potvrdi upit
	if($result){
//	echo '<div class="news_show">';
//        echo '<div class="hell"></div>';
		while($news=mysqli_fetch_assoc($result)){
			echo '<div class="news_containder">';
                        
			echo '<div class="title_div"><h4><a href="staff.php?id='.$news['id'].'" style="color:black">'.$news['title'].'</a></h4></div>';
			echo '<div class="img_div"><img src="'.$news['img_src'].'" class="img-responsive img-circle"></div>';
			echo '<div class="content_div"><p class="text-justify">'.substr($news['content'],0,160).'...</p></div>';
                        echo '<hr></div>';
		}
	echo '</div>';	
	}

     ?>
     
     </div>
</div>

    
    
    
    
    
    
    
    
    
    
    
<!--//$query="SELECT * FROM news ORDER BY datetime DESC LIMIT 20";
//	$result=mysqli_query($conn,$query);//izvrsi upit
//	confirm_query($result);//potvrdi upit
//	if($result){
//	echo '<div class="news_show">';
////        echo '<div class="hell"></div>';
//		while($news=mysqli_fetch_assoc($result)){
//			echo '<div class="news_containder">';
//                        
//			echo '<div class="title_div"><h4><a href="staff.php?id='.$news['id'].'" style="color:black">'.$news['title'].'</a></h4></div>';
//			echo '<div class="img_div"><img src="'.$news['img_src'].'" class="img-responsive img-circle"></div>';
//			echo '<div class="content_div"><p class="text-justify">'.substr($news['content'],0,160).'...</p></div>';
//                        echo '<hr></div>';
//		}
//	echo '</div>';	
//	}

}-->





           






<?php 
//}
include_once('includes/footer.php'); 

?>
   
   
       
