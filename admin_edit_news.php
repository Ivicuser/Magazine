<?php
//require('edit_user.php');
require_once('includes/Aload.php');
include_once('includes/header_for_news_feed_1.php');
confirm_logged_in();

if(isset($_GET['id'])){
	$news_id=$_GET['id'];
	$old_news=get_news($news_id);
	$old_category=get_category($old_news['category_id']);
}
else{
	echo redirect('staff.php');
}
 if(isset($_POST['id'])){
                $user_id=$_POST['id'];
                $old_user=get_admin($user_id);

                }

if(isset($_POST['Esubmit'])){
	$arr_names	=	array('title','visible','content');
	$arr_max	=	array('title'=>500);
	
	$err1 = empty_fields($arr_names);
	$err2 = max_fields($arr_max);
	$errors=array_merge($err1,$err2);
	
	if(empty($errors)){
	
		$title	=mysqli_real_escape_string($conn,$_POST['title']);
		$visible=mysqli_real_escape_string($conn,$_POST['visible']);
		$content=mysqli_real_escape_string($conn,$_POST['content']);
		
		$old_location=$_FILES['image']['tmp_name'];
		
		if(!is_dir('uploads/'.$old_category['title'])){
			//ako ne postoji folder sa nazivom kategorije u uploads folderu tada cemo ga napraviti
			mkdir('uploads/'.$old_category['title']);
		}
		
$new_location='uploads/'.$old_category['title'].'/'.$_FILES['image']['name'];
		
		$query="UPDATE news SET 
		title		=	'$title',
		content		=	'$content',
		visible		=	'$visible',
		datetime	=	now()";
		
		if(move_uploaded_file($old_location,$new_location)){
			$query.=" , img_src='$new_location' ";
		}
		
		$query.=" WHERE id='$news_id'";
		
	
		$result=mysqli_query($conn,$query);
		confirm_query($result);
		
		if(mysqli_affected_rows($conn)==1){
			echo redirect('show_admin_listings.php?id='.$old_news['category_id']);
		}
		else{
			$msg='Edit news failed.';
		}
	}
}

?>



<form enctype="multipart/form-data" action="" method="post">

         <div class="jumbotron" style="
    background: rgba(255, 255, 255, 0.8);
    border-radius: 20px;
">
         <div class="navigation_class">
    <h2>Edit news</h2>
<?php 
if(!empty($errors)) echo display_errors($errors);
if(isset($msg)) echo display_msg($msg,'danger');
?>

    
    
    
<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" name="title" value="<?php echo $old_news['title'];?>">
  </div>

  <div class="form-group">
  <label for="image">Old image</label>
  		<?php
			if($old_news['img_src']!=''){
			echo '<img src="'.$old_news['img_src'].'" width="350" class="img-responsive">';
			}
			else{
				echo '<p>There is no uploaded image.</p>';
			}
		?>
  </div>
    <script type="text/javascript">
      
            /* The uploader form */
    function activaTab(tab){
        $('.tab-pane a[href="#' + tab + '"]').tab('show');
        };
    $(function () {
        $(":file").change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
            }else{
                
            }
        });
    });

    function imageIsLoaded(e) {
        $('#news_image_edit').attr('src', e.target.result);
        $('#yourImage').attr('src', e.target.result);
    };
    </script>
    <div class="new_image_title_edit">
        <lable for="image1">New image</lable></div>
    <div class="new_image_edit">
        <img id="news_image_edit"alt="your image" height="100" border-radius="5px" class="form_control" name="image"></div>
    <div class="form-group">
  <label for="image">Select image</label>
  <input type="file" class="form_control" name="image">
  
  </div>
  
    <div class="form-group">
    <label for="visible">Visible</label>&nbsp;&nbsp;
    <input type="radio" name="visible" value="1" <?php echo $old_news['visible']==1 ? 'checked':'';?>>Yes &nbsp;&nbsp;
    <input type="radio" name="visible" value="0" <?php echo $old_news['visible']==0 ? 'checked':'';?>>No
  </div>
  
  <div class="form-group">
  <label for="content">Content</label><br>
  <textarea name="content" class="form-control ckeditor"><?php echo $old_news['content'];?></textarea>
  </div>
       <script>
            CKEDITOR.replace( 'editor1' );
        </script>

    <input type="submit" class="btn btn-primary" name="Esubmit" value="Edit news">
	<a href="show_listings.php?id=<?php echo $old_news['category_id'];?>"  class="btn btn-danger">Cancel</a>
</div>
         </div>
         </div>
</form>

<?php include_once('includes/footer_for_news_feed.php'); ?>