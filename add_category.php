<?php
require_once('includes/load.php');
include_once('includes/header_admin.php');
//confirm_logged_in();

if(isset($_POST['submit'])){
	$arr_names	=	array('title','visible');
	$arr_max	=	array('title'=>500);
	
	$err1 = empty_fields($arr_names);
	$err2 = max_fields($arr_max);
	$errors=array_merge($err1,$err2);
	
	if(empty($errors)){
	
		$title	=mysqli_real_escape_string($conn,$_POST['title']);
		$visible=mysqli_real_escape_string($conn,$_POST['visible']);
		
		$query="INSERT INTO categories SET 
			title	='$title',
			visible	='$visible',
			datetime=now()";
	
		$result=mysqli_query($conn,$query);
		confirm_query($result);
		
		if(mysqli_affected_rows($conn)==1){
			echo redirect('staff.php');
		}
		else{
			$msg='Adding new category failed.';
		}
	}
}

?>

<form action="" method="post">
<h2>Add category</h2>
<?php 
if(!empty($errors)) echo display_errors($errors);
if(isset($msg)) echo display_msg($msg,'danger');
?>
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" name="title" placeholder="Title">
  </div>

    <div class="form-group">
    <label for="visible">Visible</label>&nbsp;&nbsp;
    <input type="radio" name="visible" value="1">Yes &nbsp;&nbsp;
    <input type="radio" name="visible" value="0">No
  </div>
  
    <input type="submit" class="btn btn-primary" name="submit" value="Add category">
	<a href="staff.php"  class="btn btn-danger" >Cancel</a>
</form>

<?php include_once('includes/footer.php'); ?>


<!-- + -  Napisati skriptu koja ce omogucavati public useru da pregleda oglase koje je objavio .
 + -  U bazi kreirati tabelu za admine . 
   -  Napisati skriptu koja omogucava dodavanje oglasa adminu ( u koju kategoriju zeli dodati oglas, napraviti mogucnost da bira kod kog usera zeli da te vjesti budu ) .
   -  Napisati skriptu koja omogucava adminu brisanje oglasa( kog god zeli i iz koje kategorije zeli ) .-->