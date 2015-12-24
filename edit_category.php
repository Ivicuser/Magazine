<?php
require_once('includes/load.php');
include_once('includes/header_II.php');
confirm_logged_in();

if(isset($_GET['id'])){
	$category_id=$_GET['id'];
	$old_category=get_category($category_id);
}
else{
	echo redirect('staff.php');
}

if(isset($_POST['submit'])){
	$arr_names	=	array('title','visible');
	$arr_max	=	array('title'=>500);
	
	$err1 = empty_fields($arr_names);
	$err2 = max_fields($arr_max);
	$errors=array_merge($err1,$err2);
	
	if(empty($errors)){
	
		$title	=mysqli_real_escape_string($conn,$_POST['title']);
		$visible=mysqli_real_escape_string($conn,$_POST['visible']);
		
		$query="UPDATE categories SET 
			title	='$title',
			visible	='$visible',
			datetime=now() WHERE id='$category_id'";
	
		$result=mysqli_query($conn,$query);
		confirm_query($result);
		
		if(mysqli_affected_rows($conn)==1){
			echo redirect('staff.php');
		}
		else{
			$msg='Edit category failed.';
		}
	}
}

?>

<form action="" method="post">
    
     <div class="jumbotron" style="
    background: rgba(255, 255, 255, 0.8);
    position: relative;
    width: 75%;
    margin-left: 12%;
    border-radius: 20px;
">
         <div class="navigation_class">
<h2>Edit category</h2>
<?php 
if(!empty($errors)) echo display_errors($errors);
if(isset($msg)) echo display_msg($msg,'danger');
?>
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" name="title" value="<?php echo $old_category['title'];?>">
  </div>

    <div class="form-group">
    <label for="visible">Visible</label>&nbsp;&nbsp;
    <input type="radio" name="visible" value="1" <?php echo $old_category['visible']==1 ? 'checked': ''?>>Yes &nbsp;&nbsp;
    <input type="radio" name="visible" value="0" <?php echo $old_category['visible']==0 ? 'checked': ''?>>No
  </div>
  
    <input type="submit" class="btn btn-primary" name="submit" value="Edit category">
	<a href="staff.php"  class="btn btn-warning" >Cancel</a>
	<a href="delete_category.php?id=<?php echo $category_id;?>"  class="btn btn-danger" >Delete category</a>
</form>

<?php
$all_news=get_news_for_category($category_id,false);

if($all_news){
$output='<table class="table table-striped text-center">';
	$output.='<tr>';
		$output.='<td>Title</td>';
		$output.='<td>Image</td>';
		$output.='<td>Visible</td>';
		$output.='<td>Datetime</td>';
		$output.='<td>Edit</td>';
		$output.='<td>Delete</td>';
	$output.='</tr>';
		while($news=mysqli_fetch_assoc($all_news)){
	$output.='<tr>';
		$output.='<td><a href="content.php?id='.$news['id'].'">'.$news['title'].'</a></td>';
		$output.='<td>'.($news['img_src']=='' ? 'No image': '<img src="'.$news['img_src'].'" width="150">').'</td>';
		$output.='<td>'.($news['visible']==0 ? 'No':'Yes').'</td>';
		$output.='<td>'.$news['datetime'].'</td>';
		$output.='<td><a href="edit_news.php?id='.$news['id'].'"><span class="glyphicon glyphicon-pencil text-primary"></span></a></td>';
		$output.='<td><a href="delete_news.php?id='.$news['id'].'"><span class="glyphicon glyphicon-remove text-danger"></span></a></td>';
	$output.='</tr>';
		}	
$output.='</table>';

echo '<br><br>';
echo '<h3>List all news</h3>';
echo $output;
}
else{
echo '<br><h4>There is no news for this category.</h4>';
}
echo '<a href="add_news.php?id='.$category_id.'" class="btn btn-success">Add news</a>';
?>
</div>
</div>
<?php include_once('includes/footer.php'); ?>