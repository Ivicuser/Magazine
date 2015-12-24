<?php
require_once('includes/load.php');
include_once('includes/header_II.php');	
confirm_logged_in();
?>


<section id="left_bar" >
    <h2 style="
    text-align: center;
    color: #FFFF00;
    margin-top: 56px;
">NEWS IMAGES</h2>
<div id="position">
<div id="wowslider-container1">
	<div class="ws_images"><ul>
		<li><img src="data1/images/news2015julykosarka_zmajevi_okupljanje_600x450_216615016.jpg" alt="news-2015-July-kosarka_zmajevi_okupljanje_600x450_216615016" title="news-2015-July-kosarka_zmajevi_okupljanje_600x450_216615016" id="wows1_0"/></li>
		<li><img src="data1/images/dizniigreprestola440x315.jpg" alt="Dizni-Igre-prestola-440x315" title="Dizni-Igre-prestola-440x315" id="wows1_1"/></li>
		<li><img src="data1/images/1.jpg" alt="1" title="1" id="wows1_2"/></li>
		<li><img src="data1/images/1_0.jpg" alt="1" title="1" id="wows1_3"/></li>
		<li><img src="data1/images/1_1.jpg" alt="1" title="1" id="wows1_4"/></li>
		<li><a href="http://wowslider.com/vi"><img src="data1/images/asd1440x315.jpg" alt="image slider jquery" title="asd1-440x315" id="wows1_5"/></a></li>
		<li><img src="data1/images/kratkofil2015440x315.jpg" alt="Kratkofil-2015-440x315" title="Kratkofil-2015-440x315" id="wows1_6"/></li>
	</ul></div>
	<div class="ws_bullets"><div>
		<a href="#" title="news-2015-July-kosarka_zmajevi_okupljanje_600x450_216615016"><span><img src="data1/tooltips/news2015julykosarka_zmajevi_okupljanje_600x450_216615016.jpg" alt="news-2015-July-kosarka_zmajevi_okupljanje_600x450_216615016"/>1</span></a>
		<a href="#" title="Dizni-Igre-prestola-440x315"><span><img src="data1/tooltips/dizniigreprestola440x315.jpg" alt="Dizni-Igre-prestola-440x315"/>2</span></a>
		<a href="#" title="1"><span><img src="data1/tooltips/1.jpg" alt="1"/>3</span></a>
		<a href="#" title="1"><span><img src="data1/tooltips/1_0.jpg" alt="1"/>4</span></a>
		<a href="#" title="1"><span><img src="data1/tooltips/1_1.jpg" alt="1"/>5</span></a>
		<a href="#" title="asd1-440x315"><span><img src="data1/tooltips/asd1440x315.jpg" alt="asd1-440x315"/>6</span></a>
		<a href="#" title="Kratkofil-2015-440x315"><span><img src="data1/tooltips/kratkofil2015440x315.jpg" alt="Kratkofil-2015-440x315"/>7</span></a>
	</div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">jquery carousel</a> by WOWSlider.com v8.2</div>
	<div class="ws_shadow"></div>
	</div>	
</div>
</section>
<div id="body_news">
<?php
if(isset($_GET['id'])){
	$news_id=$_GET['id'];
	$old_news=get_news($news_id);
?>	
<h2><?php echo $old_news['title'];?></h2>
<hr>
		<div style="max-width:400px;margin:0 auto;">
		<?php
		if($old_news['img_src']!=''){
		echo '<img src="'.$old_news['img_src'].'" width="350" class="img-responsive">';
		}
		?>
		</div>
	<p class="text-justify">
		<?php
		echo $old_news['content'];
		?>
	</p>
<?php	
}
else{
$query="SELECT * FROM news ORDER BY datetime DESC LIMIT 3";
	$result=mysqli_query($conn,$query);//izvrsi upit
	confirm_query($result);//potvrdi upit
	if($result){
	echo '<div class="row text-center">';
while($news=mysqli_fetch_assoc($result)){
	echo '<div class="col-md-4">';
	echo '<h4><a href="index.php?id='.$news['id'].'">'.$news['title'].'</a></h4>';
	echo '<img src="'.$news['img_src'].'" class="img-responsive img-circle">';
	echo '<p class="text-justify">'.substr($news['content'],0,160).'...</p>';
	echo '</div>';
		}
	echo '</div>';	
	}
}
?>
	</div>
<?php include_once('includes/footer.php');?>