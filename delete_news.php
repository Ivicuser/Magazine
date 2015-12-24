<?php
require_once('includes/load.php');

if(isset($_GET['id'])){
	$news_id	=	$_GET['id'];//preuzmi id vijesti
	$old_news	=	get_news($news_id);//vrati podatke o vijesti
	
	if($old_news){//ako postoji vijest mozemo je obrisati
		
		$query	=	"DELETE FROM news WHERE id='$news_id'";//naredba za brisanje
		$result	=	mysqli_query($conn,$query);//posalji naredbu na izvrsavanje
		confirm_query($result);//ako nije uspjelo izvrsavanje naredbe prekini rad aplikacije
		
		if(mysqli_affected_rows($conn)==1){
		
			
		}
	
	}
		
}
echo redirect('show_listings.php?id='.$old_news['category_id']);
?>