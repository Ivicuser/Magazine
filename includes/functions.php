<?php
	function redirect($location){
		$output='<script>';
		$output=$output."window.location.href='$location'";
		$output=$output.'</script>';
		
	return $output;
	}
	
        
	function confirm_query($result){
		if(!$result){//! represents NOT statement
			die('Query to database failed.');
		}
	}
	
        
	function get_all_users(){
		global $conn;
		
		$query="SELECT * FROM users";
		$result=mysqli_query($conn,$query);
		confirm_query($result);
	
		if(mysqli_num_rows($result)>0){//ako ima barem 1 red
			return $result;
		}
		else{
			return false;
		}
		}
        
                
        function get_all_public_users(){
		global $conn;
		
                $query="SELECT * FROM users";
		$result=mysqli_query($conn,$query);
		confirm_query($result);
	
		if(mysqli_num_rows($result)>0){//ako ima barem 1 red
			return $result;
		}
		else{
			return false;
		}
	
	}
	
        
	function get_user($user_id){
		global $conn;
		
		$query="SELECT * FROM users WHERE id='$user_id'";
		$result=mysqli_query($conn,$query);//izvrsi upit
		confirm_query($result);//potvrdi upit
		if(mysqli_num_rows($result)==1){//ako je pronadjen tacno jedan red
			return mysqli_fetch_assoc($result);//pretvori red iz tabele u niz
		}
		else{
			return false;
		}
		
	}
	
        
	function generate_pdf(){
	
	$result=get_all_users();

		$output='<h2>List of users</h2>';
		$output.='<table border="1" cellpadding="5">';
		$output.='<tr>';
		$output.='<th>Username</th>';
		$output.='<th>Email</th>';
		$output.='</tr>';
	while($row_db=mysqli_fetch_assoc($result)){
		$output.='<tr>';
		$output.='<td>'.$row_db['username'].'</td>';
		$output.='<td>'.$row_db['email'].'</td>';
                $output.='</tr>'; }
                $output.='</table>';
	 return $output;
        }
	
        
        function get_all_categories(){
	
	 global $conn;
		$query="SELECT * FROM categories";
		$result=mysqli_query($conn,$query);
		confirm_query($result);
	
		if(mysqli_num_rows($result)>0){//ako ima barem 1 red
			return $result;
		}
		else{
			return false;
		}
	}
	
        
	function get_category($category_id){
		global $conn;
		
		$query="SELECT * FROM categories WHERE id='$category_id'";
		$result=mysqli_query($conn,$query);//izvrsi upit
		confirm_query($result);//potvrdi upit
		
		if(mysqli_num_rows($result)==1){//ako je pronadjen tacno jedan red
			return mysqli_fetch_assoc($result);//pretvori red iz tabele u niz
		}
		else{
			return false;
		}
		
	}
        
        
        function get_users_id($user_id){
		global $conn;
		
		$query="SELECT * FROM users WHERE id='$user_id'";
		$result=mysqli_query($conn,$query);//izvrsi upit
		confirm_query($result);//potvrdi upit
		
		if(mysqli_num_rows($result)==1){//ako je pronadjen tacno jedan red
			return mysqli_fetch_assoc($result);//pretvori red iz tabele u niz
		}
		else{
			return false;
		}
		
	}
        
	
        function news_for_staff(){
            
            $output='';
            $output.='<div class="top_news">';
            $all_categories = get_all_categories();
            while($category = mysqli_fetch_assoc($all_categories)){
                $all_news = get_news_for_category($category['id'],false);
                if($all_news){
                    $output.='<div class="contanier" >';  
                    $output.='<ul class="nav navbar-nav" >';
                    $output.='<li><a data-toggle="tab" style="z-index:+10;" href="#'.$category['id'].'">'.$category['title'].'</a></li>';
                    $output.='</ul>';
                    $output.='</div>';
                    $output.='<div class="tab-content" >';;
                    $output.='<div id="'.$category['id'].'" class="tab-pane fade" style="position:fixed;" > ';
                    while($news=mysqli_fetch_assoc($all_news)){
                    $output.='<div class="news_show_1" style="margin-top: 25px; margin-left:25px;"><br>'.$news['title'].   '</div><br>';
                     }
                    $output.='</div>';
                    $output.='</div>';
            
                     
                   }
            } 
       
               return $output;
        }
        
        
	function admin_menu(){
	
		$menu='';
		$menu.='<a href="staff.php" style="color: #AA3E03;"><div class="home-btn">Home</div></a>';
		$menu.='<div id = "navbar_C">';
		$all_categories=get_all_categories();
		 
                    while($category=mysqli_fetch_assoc($all_categories)){	
			$all_news=get_news_for_category($category['id'],false);//vrati sve vijesti za trenutnu kategoriju
                            if($all_news){//ako ima vijesti u kategoriji krecemo podmeni za njih
                                $menu.='<div class="manual_navbar">';
                                
				$menu.='<ul class="nav navbar-nav"><li class="dropdown">';
				$menu.='<a input type="submit" class="dropdown-toggle" data-toggle="dropdown" href="edit_category.php?id='.$category['id'].'">'.$category['title'].'<span class="caret"></span></a>';
				$menu.='<ul class="dropdown-menu">';
                            while($news=mysqli_fetch_assoc($all_news)){
                                $menu.='<li><a href="staff.php?id='.$news['id'].'">'.$news['title'].'</a></li>'; }	
                                $menu.='</ul>';
                                $menu.='</li>';
                                $menu.='</ul>';
                                $menu.='</div>';         
                            }else{
                                $menu.='<div class="manual_navbar">';
                                $menu.='<ul><li><div class="dropdown-menu_manual">';
                                $menu.='<a>'.$category['title'].'</a>';
                                $menu.='</div></ul></li>'; }}
                                $menu.='</ul>';
                                $menu.='</div>'; 

                    return $menu;
	}
                	function admin_menu_1(){
	
		$menu='';
		$menu.='<a href="staff.php" style="color: #AA3E03;"><div class="home-btn">Home</div></a>';
		$menu.='<div id = "navbar_C">';
		$all_categories=get_all_categories();
		 
                    while($category=mysqli_fetch_assoc($all_categories)){	
			$all_news=get_news_for_category($category['id'],false);//vrati sve vijesti za trenutnu kategoriju
                            if($all_news){//ako ima vijesti u kategoriji krecemo podmeni za njih
                                $menu.='<div class="manual_navbar">';
                                
				$menu.='<ul class="nav navbar-nav"><li class="dropdown">';
				$menu.='<a input type="submit" class="dropdown-toggle" data-toggle="dropdown" href="edit_category.php?id='.$category['id'].'">'.$category['title'].'<span class="caret"></span></a>';
				$menu.='<ul class="dropdown-menu">';
                            while($news=mysqli_fetch_assoc($all_news)){
                                $menu.='<li><a href="staff.php?id='.$news['id'].'">'.$news['title'].'</a></li>'; }	
                                $menu.='</ul>';
                                $menu.='</li>';
                                $menu.='</ul>';
                                $menu.='</div>';         
                            }else{
                                $menu.='<div class="manual_navbar">';
                                $menu.='<ul><li><div class="dropdown-menu_manual">';
                                $menu.='<a>'.$category['title'].'</a>';
                                $menu.='</div></ul></li>'; }}
                                $menu.='</ul>';
                                $menu.='</div>'; 

                    return $menu;
	}
        
        
        function admin_menu_2(){
	
		$menu='';
//		$menu.='<a href="staff.php" style="color: #AA3E03;"><div class="home-btn">Home</div></a>';
		$menu.='<div id = "navbar_C">';
		$all_categories=get_all_categories();
		 
                    while($category=mysqli_fetch_assoc($all_categories)){	
			$all_news=get_news_for_category($category['id'],false);//vrati sve vijesti za trenutnu kategoriju
                            if($all_news){//ako ima vijesti u kategoriji krecemo podmeni za njih
                                $menu.='<div class="manual_navbar">';
				$menu.='<ul class="nav navbar-nav"><li>';
				$menu.='<a input type="submit" class="dropdown-toggle" data-toggle="dropdown" href="edit_category.php?id='.$category['id'].'">'.$category['title'].'<span class="caret"></span></a>';
                                $menu.='</li>';
                                $menu.='</ul>';
                                $menu.='</div>';         
                            }else{
                                $menu.='<div class="manual_navbar">';
                                $menu.='<ul><li><div class="dropdown-menu_manual">';
                                $menu.='<a>'.$category['title'].'</a>';
                                $menu.='</div></ul></li>'; }}
                                $menu.='</ul>';
                                $menu.='</div>'; 

                    return $menu;
	}
        
        
        function get_all_category_order_by_id(){
            
       	$menu='';
		
		$all_categories=get_all_categories();
                    $menu.='<h2 class="title_news">Categories</h2>';
                    while($category=mysqli_fetch_assoc($all_categories)){	
			$all_news=get_news_for_category($category['id'],false);//vrati sve vijesti za trenutnu kategoriju
                            if($all_news){//ako ima vijesti u kategoriji krecemo podmeni za njih

				$menu.='<a input type="submit" class="category_view" href="create_news.php?id='.$category['id'].'">'.$category['title'].'<br></a>';
				
                            }
                        }
                    return $menu;
                }
        
                
        function get_all_category_order_by_id_2(){
            
       	$menu='';

		$all_categories=get_all_categories();
                    while($category=mysqli_fetch_assoc($all_categories)){	
			$all_news=get_news_for_category($category['id'],false);//vrati sve vijesti za trenutnu kategoriju
                            if($all_news){//ako ima vijesti u kategoriji krecemo podmeni za njih

				$menu.='<a input type="submit" class="category_view btn" href="create_news.php?id='.$category['id'].'">'.$category['title'].'<br></a>';
				
                            }
        }
           
                return $menu;
        }
        
        
        function all_categories(){
            
            $all_categories=get_all_categories();
            while($category=mysqli_fetch_assoc($all_categories)){
             $menu='';
               $menu.='<a input type="submit" class="category_view btn" href="create_news.php?id='.$category['id'].'">'.$category['title'].'<br></a>';
				 
                
            }  echo $menu;          
        }
        
        
        function get_all_category_order_by_id_1(){
            
       	$menu='';
		
		$menu.='<div id = "navbar_C">';
		$all_categories=get_all_categories();
                    $menu.='<h2 class="title_news">Categories</h2>';
                    $menu.='';		
                            $menu.='<div class="dropdown">';
                            $menu.='<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">';
                            $menu.='Dropdown';
                            $menu.='<span class="caret"></span>';
                            $menu.='</button>';
                            $menu.='<ul class="dropdown-menu" aria-labelledby="dLabel">';
                    while($category=mysqli_fetch_assoc($all_categories)){	
			$all_news=get_news_for_category($category['id'],false);//vrati sve vijesti za trenutnu kategoriju
                            if($all_news){//ako ima vijesti u kategoriji krecemo podmeni za njih
                            
                            $menu.='<a input type="submit" class="category_view" href="create_news.php?id='.$category['id'].'">'.$category['title'].'<br></a>';
                            $menu.='</ul>';
                            $menu.='</div>';
                                                           
        
                          }
        }
        return $menu;
        }
        
        
        function public_menu(){
		$menu='';
		$menu.='<ul>';
		$all_categories=get_all_categories();
		while($category=mysqli_fetch_assoc($all_categories)){	
                    $all_news=get_news_for_category($category['id']);//vrati sve vijesti za trenutnu kategoriju
			if($all_news && $category['visible']==1){//ako ima vijesti u kategoriji krecemo podmeni za njih
                                $menu.='<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">';
                                $menu.='<li><a href="add_news.php?id='.$category['id'].'">'.$category['title'].'</a></li>';
                                $menu.='<ul>';
                        
                                                    }}
                        return  $menu;
	}

	
	function get_news_for_category($category_id,$public=true){
		global $conn;
		
		$query="SELECT * FROM news WHERE category_id='$category_id' ORDER BY datetime DESC ";
		if($public){
			$query.=" AND visible=1";
		}
		$result=mysqli_query($conn,$query);//izvrsi upit
		confirm_query($result);//potvrdi upit
		
		if(mysqli_num_rows($result)>0){
			return $result;
		}
		else{
			return false;
		}
		
	}
	
        
        function get_news($news_id){
		global $conn;
		
		$query="SELECT * FROM news WHERE id='$news_id'";
		$result=mysqli_query($conn,$query);//izvrsi upit
		confirm_query($result);//potvrdi upit
		
		if(mysqli_num_rows($result)==1){//ako je pronadjen tacno jedan red
			return mysqli_fetch_assoc($result);//pretvori red iz tabele u niz
		}
		else{
			return false;
		}
		
	}
        
        
        function news_1(){
	global $conn;
                
	$query="SELECT * FROM news WHERE category_id='1' ORDER BY datetime DESC";
	$result=mysqli_query($conn,$query);
	confirm_query($result);
       
	if(mysqli_num_rows($result)>0){
		return $result;
	}else{
		return false;
	}
	
	
}

        
        function news_2(){
	global $conn;
	
	$query="SELECT * FROM news WHERE category_id='2' ORDER BY datetime DESC";
	$result=mysqli_query($conn,$query);
	confirm_query($result);
	
	if(mysqli_num_rows($result)>0){
		return $result;
	}else{
		return false;
	}
	
	
}

        
        function news_3(){
	global $conn;
	
	$query="SELECT * FROM news WHERE category_id='3' ORDER BY datetime DESC";
	$result=mysqli_query($conn,$query);
	confirm_query($result);
	
	if(mysqli_num_rows($result)>0){
		return $result;
	}else{
		return false;
	}
	
	
}

        
        function news_4(){
	global $conn;
	
	$query="SELECT * FROM news WHERE category_id='4' ORDER BY datetime DESC";
	$result=mysqli_query($conn,$query);
	confirm_query($result);
	
	if(mysqli_num_rows($result)>0){
		return $result;
	}else{
		return false;
	}
	
	
}

        
        function news_56(){
	global $conn;
	
	$query="SELECT * FROM news WHERE category_id='56' ORDER BY datetime DESC";
	$result=mysqli_query($conn,$query);
	confirm_query($result);
	
	if(mysqli_num_rows($result)>0){
		return $result;
	}else{
		return false;
	}
	
	
}
        
        
        function news_9(){
	global $conn;
	
	$query="SELECT * FROM news WHERE category_id='9' ORDER BY datetime DESC";
	$result=mysqli_query($conn,$query);
	confirm_query($result);
	
	if(mysqli_num_rows($result)>0){
		return $result;
	}else{
		return false;
	}
	
	
}
       

        function news_55(){
	global $conn;
	
	$query="SELECT * FROM news WHERE category_id='55' ORDER BY datetime DESC";
	$result=mysqli_query($conn,$query);
	confirm_query($result);
	
	if(mysqli_num_rows($result)>0){
		return $result;
	}else{
		return false;
	}
	
	
}
    

        function show_user_image(){
            global $conn;
            $user_id=$_SESSION['user_id'];
            $user=get_user($user_id);
            
            if($user){
                
                $query = "SELECT image FROM users WHERE id='$user_id'";
                $result = mysqli_query($conn,$query);
                confirm_query($result);
       if($result){
                
            while($user_image=mysqli_fetch_assoc($result)){
            if((!$user_image) OR empty($user_image['image'])){
        
                
                        
                    echo '<div class="usr_img"><img src="default_avatar.png" class="img-responsive img-circle"></div>';
                }else{
                     
            
                    echo '<div id="usr_img"><img src="'.$user_image['image'].'" data-scalemode="width" data-nativeanimation="true" class="img-responsive img-circle"></div>';   
                }
        }
    }
}
        }   
        
        
        function A_access(){
    global $conn;
    
    $query = "SELECT * FROM admin_users";
    $result = mysqli_query($conn,$query);
    confirm_query($result);
    
    if($result OR (!empty($result)) ){
        echo redirect ('admin_staff.php');
        
        
    }
}
        
        
        function show_user_image_22(){
            global $conn;
            $user_id=$_SESSION['user_id'];
            $user=get_admin_user($user_id);
            
            if($user){
                
                $query = "SELECT image FROM admin_users WHERE id='$user_id'";
                $result = mysqli_query($conn,$query);
                confirm_query($result);
       if($result){
                
            while($user_image=mysqli_fetch_assoc($result)){
            if((!$user_image) OR empty($user_image['image'])){
        
                
                        
                    echo '<div class="usr_img"><img src="default_avatar.png" class="img-responsive img-circle"></div>';
                }else{
                     
            
                    echo '<div id="usr_img"><img src="'.$user_image['image'].'" data-scalemode="width" data-nativeanimation="true" class="img-responsive img-circle"></div>';   
                }
        }
    }
}
        }
        
 
        function show_user_image_for_show(){
            global $conn;
            $user_id=$_SESSION['user_id'];
            $user=get_user($user_id);
            
            if($user){
                
                $query = "SELECT image FROM users WHERE id='$user_id'";
                $result = mysqli_query($conn,$query);
                confirm_query($result);
       if($result){
                
            while($user_image=mysqli_fetch_assoc($result)){
            
//           
                echo '<div class="usr_img_2"><img src="'.$user_image['image'].'" class="img-responsive img-circle"></div>';
            }
        }
   
            }
        }   
        
        
        function show_my_listings(){
            global $conn;
            
            $user_id=$_SESSION['user_id'];
            $user=get_user($user_id);
            
            if($user){
                
            $query = "SELECT * FROM news WHERE user_id='$user_id'";
            $result = mysqli_query($conn,$query);
            confirm_query($result);
             
             if($result){
                $output='';
            echo '<div class="jumbotron" style=" background: rgba(255, 255, 255, 0.8);  border-radius: 20px; "> ';
            echo '<h3 style=" margin: 20px; text-align: center; font-size: 37px; ">List all news</h3>';    
                $output.='<table class="table table-striped text-center">';
                $output.='<tr>';
		$output.='<td>Title</td>';
		$output.='<td>Image</td>';
		$output.='<td>Visible</td>';
		$output.='<td>Datetime</td>';
		$output.='<td>Edit</td>';
		$output.='<td>Delete</td>';
                $output.='</tr>';
          while($news=mysqli_fetch_assoc($result)){
                $output.='<tr>';
		$output.='<td><a href="content.php?id='.$news['id'].'">'.$news['title'].'</a></td>';
		$output.='<td><a href="content.php?id='.$news['id'].'">'.($news['img_src']=='' ? 'No image': '<img src="'.$news['img_src'].'" width="150">').'</a></td>';
		$output.='<td>'.($news['visible']==0 ? 'No':'Yes').'</td>';
		$output.='<td>'.$news['datetime'].'</td>';
		$output.='<td><a href="edit_news.php?id='.$news['id'].'"><span class="glyphicon glyphicon-pencil text-primary"></span></a></td>';
		$output.='<td><a href="delete_news.php?id='.$news['id'].'"><span class="glyphicon glyphicon-remove text-danger"></span></a></td>';
                $output.='</tr>';    }	
                $output.='</table>';
           echo '<br><br>';
                $output.= '<a><span class="add5 btn"  role="button" data-toggle="modal" data-target="#add_news_modal_4" aria-expanded="true" aria-controls="modal">Add listings</span></a>';
                $output.='</div>';
           echo $output;
                }
                else{
                
                $output.= '<div class="jumbotron" style=" background: rgba(255, 255, 255, 0.8); position: relative; width: 54%; margin-left: 23%; border-radius: 20px; "> ';
                $output.= '<a><span class="add5 btn"  role="button" data-toggle="modal" data-target="#add_news_modal_4" aria-expanded="true" aria-controls="modal" style="position:fixed;">Add listings</span></a>';
                $output.= '</div>';
           echo $output;
                }        
            }
        }        
?>
