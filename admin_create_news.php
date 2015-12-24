<?php
//require('edit_user.php');
require_once('includes/Aload.php');
include('includes/header_for_news_feed_1.php');

confirm_logged_in();

if(isset($_GET['id'])){
	$category_id=$_GET['id'];
	$old_category=get_category($category_id);
}
else{
	echo redirect('staff.php');
}

if(isset($_POST['submit'])){
	$arr_names	=	array('title','visible');
	$arr_max	=	array('title'=>500);
	
	$err1 = empty_fields($arr_names);
	$err2 = max_fields($arr_max);
	$errors=array_merge($err1,$err2);
	
	if(empty($errors)){
	
		$title	=mysqli_real_escape_string($conn,$_POST['title']);
		$visible=mysqli_real_escape_string($conn,$_POST['visible']);
		
		$query="UPDATE categories SET 
			title	='$title',
			visible	='$visible',
			datetime=now() WHERE id='$category_id'";
	
		$result=mysqli_query($conn,$query);
		confirm_query($result);
		
		if(mysqli_affected_rows($conn)==1){
			echo redirect('staff.php');
		}
		else{
			$msg='Edit category failed.';
		}
	}
}

?>
<div class="jumbotron" style="
    /*background: rgba(255, 255, 255, 0.8);*/
    background: rgba(255, 255, 255, 0.8);
    position: relative;
    width: 100%;
    margin-left: 0%;
    border-radius: 20px;
    /* bachground-color: black; */
">
  
<!--<form action="" method="post">
<h2>Edit category</h2>-->
<?php 
if(!empty($errors)) echo display_errors($errors);
if(isset($msg)) echo display_msg($msg,'danger');
?>

<h2 class="news_title_2"> Add news in <?php echo $old_category['title'];?></h2>


<?php

$all_news=get_news_for_category($category_id,false);
echo '<h3 style="
            margin-left: 4%;
            margin-bottom: 1%;
            font-size: 30px;
            float: left;
            margin-top: 3%;
            " >List all news</h3>';
if($all_news){
$output='<table class="table table-striped text-center">';
	$output.='<tr>';
		$output.='<td>Title</td>';
		$output.='<td>Image</td>';
		$output.='<td>Datetime</td>';
	$output.='</tr>';
		while($news=mysqli_fetch_assoc($all_news)){
	$output.='<tr>';
		$output.='<td><a style="color:black;" href="staff.php?id='.$news['id'].'">'.$news['title'].'</a></td>';
		$output.='<td>'.($news['img_src']=='' ? 'No image': '<img src="'.$news['img_src'].'" width="150">').'</td>';
		$output.='<td><div class="content_div"><p class="text-justify">'.substr($news['content'],0,160).'...</p></div></td>';
	$output.='</tr>';
		}	
           $output.='</table>';

            echo '<br><br>';
            $output.='<a href="admin_add_news.php?id='.$category_id.'" class="btn btn-success" id="add_news_btn_4">Add news</a>';
            echo $output;
            }
            else{
            echo '<div class="containetr_2">';
            echo '<br><h4>There is no news for this category.</h4>';
            echo '<a href="admin_add_news.php?id='.$category_id.'" class="btn btn-success" id="add_news_btn_1">Add news</a>';
            echo '</div>';
            }
            
            ?>



            </div>


<?php 
include_once('includes/footer_for_news_feed.php'); 
?>


