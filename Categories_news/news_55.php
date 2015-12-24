<?php
include("../includes/load.php");
$show=news_55();

if($show){
     $output='';
    
$output='<table class="table table-striped text-center">';
	$output.='<tr>';
                $output.='<td></td>';
		$output.='<td>Title</td>';
                $output.='<td></td>';
		$output.='<td>Image</td>';
                $output.='<td></td>';
                $output.='<td></td>';
                $output.='<td></td>';
		$output.='<td>Content</td>';
                $output.='<td></td>';
	$output.='</tr>';
		while($news=mysqli_fetch_assoc($show)){
//	echo '<div class="news_containder">';
                        
               
                $output.='<tr>';
		$output.='<td></td>';
                $output.='<td><a style="color:black;" href="staff.php?id='.$news['id'].'">'.$news['title'].'</a></td>';
		$output.='<td></td>';
                $output.='<td><a style="color:black;" href="staff.php?id='.$news['id'].'">'.($news['img_src']=='' ? 'No image': '<img src="'.$news['img_src'].'" width="150">').'</td>';
                $output.='<td></td>';
                $output.='<td></td>';
                $output.='<td></td>';
		$output.='<td><div class="content_div"><p class="text-justify">'.substr($news['content'],0,160).'...</p></div></td>';
                $output.='<td></td>';
                $output.='</tr>';
		}	
                $output.='</table>';

//                echo '<br><br>';
//                $output.='<a href="add_news.php?id='.$category_id.'" class="btn btn-success" id="add_news_btn_4">Add news</a>';
                echo $output;
		
	echo '</div>';	
    }


?>