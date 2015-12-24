<?php
require_once("includes/load.php");
include("includes/header_for_news_feed.php");
?>
  <script>
  $(function() {
    $( "#tabs" ).tabs({
      beforeLoad: function( event, ui ) {
        ui.jqXHR.fail(function() {
          ui.panel.html(
            "Couldn't load this tab. We'll try to fix this as soon as possible. " +
            "If this wouldn't be a demo." );
        });
      }
    });
  });
  </script>

<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Preloaded</a></li>
    <li><a href="Categories_news/news_1.php">Tab 1</a></li>
    <li><a href="Categories_news/news_2.php">Tab 2</a></li>

  </ul>
   <div id="tabs-1">
   <?php
         $query="SELECT * FROM news ORDER BY datetime DESC LIMIT 20";
	$result=mysqli_query($conn,$query);//izvrsi upit
	confirm_query($result);//potvrdi upit
	if($result){
	echo '<div class="news_show">';
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











<?php
include("includes/footer_for_news_feed.php");
?>