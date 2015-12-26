<?php
require('edit_user.php');
require_once('includes/load.php');
include('includes/header_for_news_feed_2.php');
//A_access();
confirm_logged_in();
  



if(isset($_GET['id'])){
	$news_id=$_GET['id'];
	$old_news=get_news($news_id);
?>	
 <div class="jumbotron" style="
    background: rgba(255, 255, 255, 0.8);
    position: relative;
    width:100%;
    margin-left:0%;
    border-radius: 20px; ">

<div class="show_news" style="position: relative; ">
<div class="title"><h2><?php echo $old_news['title'];?></h2>
<div class="button_cancel">  
<a href="staff.php"  class="glyphicon glyphicon-share-alt" style="
    color: chocolate;
" >Back</a>
 </div>
</div>
<hr>
		<div style="max-width:400px;margin:0 auto;">
		<?php
			if($old_news['img_src']!=''){
			echo '<img src="'.$old_news['img_src'].'" width="350" class="img-responsive">';
			}
		?>
		</div>
<div class="content_from_news">
	<p class="text-justify">
		<?php
			echo $old_news['content'];
		?>
	</p>	
</div>
</div></div>
<?php	
}

else{
    
    
    ?>
    <div class="news_show">

     <script >
  $(function() {
    $( "#tabs" ).tabs({
      beforeLoad: function( event, ui ) {
        ui.jqXHR.fail(function() {
          ui.panel.html(
            "<img src='img/loading.gif' alt='loading' width='200' height='200' style='border-radius:150px;'>" );
        });
      }
    });
  });
  </script>
<!--
  
  
--><div id="tabs">
  <ul>
    <li><a href="#tabs-1">Home</a></li>
    <li><a href="Categories_news/news_1.php">Computers</a>          </li>
    <li><a href="Categories_news/news_3.php">Monitor</a>            </li>
    <li><a href="Categories_news/news_55.php">Keyboard & Mouse</a>  </li>
    <li><a href="Categories_news/news_9.php">Softver</a>            </li>
    <li><a href="Categories_news/news_56.php">Parts for PC</a>      </li>
    
  </ul>
    
     <div id="tabs-1">
   <?php
         $query="SELECT * FROM news ORDER BY datetime DESC LIMIT 20";
	$result=mysqli_query($conn,$query);//izvrsi upit
	confirm_query($result);//potvrdi upit
	if($result){
$output='<table class="table table-striped text-center">';
	$output.='<tr>';
                $output.='<td></td>';
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
		while($news=mysqli_fetch_assoc($result)){
//	echo '<div class="news_containder">';
                        
               
                $output.='<tr>';
		$output.='<td></td>';
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
                }
                        
                        
                        
                        
//			echo '<div class="title_div"><h4><a href="staff.php?id='.$news['id'].'" style="color:black">'.$news['title'].'</a></h4></div>';
//			echo '<div class="img_div"> <a href="staff.php?id='.$news['id'].'"> <img src="'.$news['img_src'].'" class="img-responsive img-circle"></a></div>';
//			echo '<div class="content_div"><p class="text-justify">'.substr($news['content'],0,160).'...</p></div>';
//                        echo '<hr></div>';
		
//	echo '</div>';	
	

     ?>
     </div>
     </div>
</div>

<?php 
}
include_once('includes/footer_for_news_feed.php'); 

?>
   
   
       
