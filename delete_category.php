<?php
require_once('includes/load.php');

if(isset($_GET['id'])){
	$category_id	=	$_GET['id'];//preuzmi id kategorije
	$old_category	=	get_category($category_id);//vrati podatke o kategoriji
	
	if($old_category){//ako postoji kategorija mozemo je obrisati
		
		$query	=	"DELETE FROM categories WHERE id='$category_id'";//naredba za brisanje
		$result	=	mysqli_query($conn,$query);//posalji naredbu na izvrsavanje
		confirm_query($result);//ako nije uspjelo izvrsavanje naredbe prekini rad aplikacije
		
		if(mysqli_affected_rows($conn)==1){//ako je brisanje kategorije proslo obrisi i njene vijesti
		
			$query_news		=	"DELETE FROM news WHERE category_id='$category_id'";
			$result_news	=	mysqli_query($conn,$query_news);//posalji naredbu na izvrsavanje
			confirm_query($result_news);//ako nije uspjelo izvrsavanje naredbe prekini rad aplikacije
		}
	
	}
		
}
echo redirect('staff.php');
?>