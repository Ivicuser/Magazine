<?php
	session_start();
	
	function is_logged(){//da li je korisnik ulogovan
		
		if(isset($_SESSION['user_id'])){//da li postoji id korisnika u sesiji
			return true;
		}
		else{
			return false;
		}
	}
	
	function confirm_logged_in(){//potvrdi da je ulogovan
		if(!is_logged()){//ako nije ulogovan
			echo redirect('index.php');
		}
	}
        
        
        
?>