<?php
require('edit_user.php');
require_once('includes/load.php');
include('includes/header_for_news_feed.php');
confirm_logged_in();

    if(isset($_GET['id'])){
                $category_id=$_GET['id'];
                $old_category=get_category($category_id);
                }
        else{
                echo redirect('staff.php');
                }
        if(isset($_POST['id'])){
                $user_id=$_POST['id'];
                $old_user=get_user($user_id);

                }

        if(isset($_POST['Ssubmit'])){
                $arr_names	=	array('title','visible','content');
                $arr_max	=	array('title'=>5000);
	
                $err1 = empty_fields($arr_names);
                $err2 = max_fields($arr_max);
                $errors=array_merge($err1,$err2);
	
	if(empty($errors)){
	
		$title	=mysqli_real_escape_string($conn,$_POST['title']);
		$visible=mysqli_real_escape_string($conn,$_POST['visible']);
		$content=mysqli_real_escape_string($conn,$_POST['content']);
		
		$old_location	=	$_FILES['image']['tmp_name'];
		$folder_name	=	urlencode($old_category['title']);
		if(!is_dir('uploads/'.$old_category['title'])){
		mkdir('uploads/'.$folder_name);
		}
		
                $new_location='uploads/'.$folder_name.'/'.$_FILES['image']['name'];
		
		$query="INSERT INTO news SET 
		category_id	=	'$category_id',
                user_id         =       '$user_id',
		title		=	'$title',
		content		=	'$content',
		visible		=	'$visible',
		datetime	=	now()";
		
		if(move_uploaded_file($old_location,$new_location)){
		$query.=" , img_src='$new_location' ";
		}
                
		$result=mysqli_query($conn,$query);
		confirm_query($result);
		
		if(mysqli_affected_rows($conn)==1){
			echo redirect('create_news.php?id='.$category_id);
		}
		else{
			$msg='Add news failed.';
		}
	}
}

?>
<div class="jumbotron" style="
    background: rgba(255, 255, 255, 0.6); border-radius: 20px;">
    <div class="news_container_1">
<form enctype="multipart/form-data" action="" method="post">
<h2 style="
    font-size: 225%;
    margin-left: 40%;
    margin-bottom: 8%;
" >Add news</h2>
<hr>
<?php 
if(!empty($errors)) echo display_errors($errors);
if(isset($msg)) echo display_msg($msg,'danger');
?>
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" name="title">
  </div>

  <div class="form-group">
  <label for="image">Select image</label>
  <input type="file" class="form_control" name="image">
  </br><img id="news_image"alt="your image" height="100" border-radius="5px" class="form_control" name="image">
  
  <script type="text/javascript">
      
            /* The uploader form */
    function activaTab_1(tab){
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
        $('#news_image').attr('src', e.target.result);
        $('#yourImage').attr('src', e.target.result);
    };
    </script>
  </div>
  
    <div class="form-group">
    <label for="visible">Visible</label>&nbsp;&nbsp;
    <input type="radio" name="visible" value="1">Yes &nbsp;&nbsp;
    <input type="radio" name="visible" value="0">No
  </div>
  
  <div class="form-group">
  <label for="content">Content</label><br>
  <textarea name="content" name="editor1" class="form-control ckeditor"></textarea>
  </div>
   <script>
            CKEDITOR.replace( 'editor1' );
        </script>
    <input type="submit" class="btn btn-primary" name="Ssubmit" value="Add news">
	<a href="create_news.php?id=<?php echo $category_id;?>"  class="btn btn-danger">Cancel</a>
        </form>
    </div>
</div>
<?php include_once('includes/footer_for_news_feed.php');  ?>