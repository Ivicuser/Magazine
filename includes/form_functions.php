<?php

     
        
        
	function display_msg($msg,$type){
		
		$output='<div class="alert alert-'.$type.' alert-dismissible" role="alert">';
		$output.='<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		$output.=$msg;
		$output.='</div>';
                return $output;
	}
	
	function display_errors($errors){
		
		$output='<div class="alert alert-danger alert-dismissible" role="alert" style=" position:relative;">';
                $output.='The passwords do not match, try again.';
		$output.='<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		$output.='<h3>Please check these fields!</h3>';
		foreach($errors as $key=>$error){
			$output.='-'.$error.'<br>';
		}
		$output.='</div>';
		return $output;
	}
        
        
	
	function empty_fields($arr_names){//vraca niz naziva polja koja su ostala prazna
		
		$errors= array();
		
		foreach($arr_names as $key=>$name){
				if(!isset($_POST[$name])){//ako se ne nalazi u nizu post
					$errors[]=$name;
				}
				elseif(trim($_POST[$name])==''){
					$errors[]=$name;
				}
		}
		
		return $errors;
	}
	
		function max_fields($arr_max){
		//vraca niz naziva polja za koje je prekoracen broj karaktera
		$errors= array();
		
		foreach($arr_max as $name=>$max){
				if(strlen($_POST[$name])>$max){
					$errors[]=$name;
				}
		}
		
		return $errors;
	}
?>
