<?php
//require('edit_user.php');
require_once('includes/Aload.php');
include('includes/header_for_news_feed_1.php');
confirm_logged_in();

if(isset($_GET['id'])){
	$news_id=$_GET['id'];
	$old_news=get_news($news_id);
}
else{
	echo redirect('admin_staff.php');
}
?>
<div class="jumbotron" style="
    background: rgba(255, 255, 255, 0.8);
    position: relative;
    width:100%;
    margin-left:0%;
    border-radius: 20px;
">

<div class="show_news" style="position: relative;">
<div class="title"><h2><?php echo $old_news['title'];?></h2>
<div class="button_cancel">  
<a href="show_admin_listings.php"  class="glyphicon glyphicon-share-alt" style="color: chocolate;">Back</a>
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
<!--	<a class="btn btn-primary" href="edit_news.php?id=<?php // echo $news_id;?>">Edit news</a>
	<a class="btn btn-danger"  href="delete_news.php?id=<?php // echo $news_id;?>">Delete news</a>-->

<?php include_once('includes/footer_for_news_feed.php'); ?>