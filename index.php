<?php
require_once('includes/load.php');
include('includes/header.php');



if(isset($_GET['id'])){
	$news_id=$_GET['id'];
	$old_news=get_news($news_id);
?>	

<div class="show_news_container">
    <div class="default_item" style="
    margin: 6%;
" >


<div class="title" style="  
    background:rgba(255,255,255,0.6);                     
    /*margin-left: 29%;*/
    font-size: 9mm;
    border-radius: 8px;
    "><div id="12345"  style="text-align: center;">
        <?php echo $old_news['title'];?></div>
<hr>
		<div style="max-width:400px;margin:0 auto;">
		<?php
			if($old_news['img_src']!=''){
			echo '<img src="'.$old_news['img_src'].'" width="350" class="img-responsive">';
			}
		?>
		</div>
<div class="content_from_news" style=" margin-top: 6%;text-align: center;" >
    <p class="text-justify" style="margin-top: 3%; text-align: center;">
		<?php
			echo $old_news['content'];
		?>
        
	</p>	
</div></div>
<?php	
}
else{
$query="SELECT * FROM news ORDER BY DATETIME DESC LIMIT 6";
	$result=mysqli_query($conn,$query);//izvrsi upit
	confirm_query($result);//potvrdi upit
	if($result){
	echo '<div class="row text-center">';
		while($news=mysqli_fetch_assoc($result)){
			echo '<div class="col-md-2">';
			echo '<h4 class="news-title-2"><a href="index.php?id='.$news['id'].'">'.$news['title'].'</a></h4>';
			echo '<img src="'.$news['img_src'].'" class="img-responsive img-circle">';
			echo '<p class="text-justify">'.substr($news['content'],0,60).'...</p>';
			echo '</div>';
		}
	echo '</div>';	
	}

}



?>
</div></div>
</div>
    <?php   
//            include('admin_functions/admin_create.php');
            include('login.php');
            include('create_new_public_user.php'); 
            include('includes/footer.php');	
            
    ?>