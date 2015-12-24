<?php
include("../includes/load.php");

$show=news_4();

if($show){
     $output='';
    while($news=mysqli_fetch_assoc($show)){
       
    		echo '<div class="news_containder">';
                        
			echo '<div class="title_div"><h4><a href="staff.php?id='.$news['id'].'" style="color:black">'.$news['title'].'</a></h4></div>';
			echo '<div class="img_div"><img src="'.$news['img_src'].'" class="img-responsive img-circle"></div>';
			echo '<div class="content_div"><p class="text-justify">'.substr($news['content'],0,160).'...</p></div>';
                        echo '<hr></div>';
		}
	echo '</div>';	
    }

?>