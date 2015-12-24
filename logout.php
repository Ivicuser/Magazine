<?php
require_once('includes/load.php');

if(isset($_COOKIE[session_name()])){//obrisi kuki od sessije ako postoji
	setcookie(session_name(),'',time()-60*60);
}

$_SESSION=array();

session_destroy();

echo redirect('index.php');
?>