<?php
require_once('includes/load.php');
include_once('includes/header.php');
confirm_logged_in();


$public_result = get_all_public_users();

    $output = '<h2><a href="staff.php">List of  admin users</a>  ||  List of public users </h2>';
    $output.='<table class="table table-striped">';
    $output.='<tr>';
    $output.='<th>Username</th>';
    $output.='<th>Email</th>';
    $output.='<th>Edit</th>';
    $output.='<th>Delete</th>';
    $output.='<th>Message</th>';
    $output.='</tr>';
    $i=0;
while ($row_db = mysqli_fetch_assoc($public_result)) {
    $output.='<tr>';
    $output.='<td>' . $row_db['username'] . '</td>';
    $output.='<td>' . $row_db['email'] . '</td>';
    if($_SESSION['user_id']==$row_db['id']){
    $output.='<td><a href="edit_public_users.php"><span class="glyphicon glyphicon-pencil btn btn-primary" aria-hidden="true"></span></a></td>';
    $output.='<td><a onclick="return confirm_delete()" href="delete_public_user.php"><span class="glyphicon glyphicon-remove btn btn-danger" aria-hidden="true"></span></a></td>';
        }
	else{
    $output.='<td></td>';
    $output.='<td></td>';
    $output.='<td><a href = "#register"  role="buttom" data-toggle="modal" data-target="#exampleModal'.$i.'" span class="glyphicon glyphicon-envelope btn btn-success"></span></a></td>';
    $output.='<td></td>';
        }
    $output.='</tr>';
    $output.="<div class='modal fade' id='exampleModal".$i."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'>";
        $output.="<div class='modal-dialog' role='document'>";
        $output.="<div class='modal-content'>";
        $output.="<div class='modal-header'>";?>
        <form actions="staff.php" method="post" name="modal"><?php
        $output.="<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
        $output.="<h4 class='modal-title' id='exampleModalLabel'>New message</h4>";
        $output.="</div>";
        $output.="<div class='modal-body'>";
        $output.="<form>";
        $output.="<div class='form-group'>";
        $output.="<label for='recipient-name' class='control-label'>Recipient:</label>";
        $output.="<input type='text' class='form-control' id='email' name='email' value='". $row_db['email']."'>";
        $output.="</div>";
        $output.="<div class='form-group'>";
        $output.="<label for='message-text' class='control-label'>Message:</label>";
        $output.="<textarea class='form-control' id='message' name='message'></textarea>";
        $output.="</div>";
        $output.="</form>";
        $output.="</div>";
        $output.="<div class='modal-footer'>";
        $output.="<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";
        $output.="<input type='submit' value='Submit' name='submit' id='submit' class='btn btn-primary'>";
        $output.="</div>";
        $output.="</div>";
        $output.="</div>";
         $i++;
        
        
   }   if(isset($_POST['submit'])){
    $from = $_SESSION['username'];
    $email     =   $_POST['email'];
    $message   =   $_POST['message'];

    mail($email,$from,$message);
 if($message == '' || $email == ''){
     echo "Your message has been send.";
 }  

        }
$output.='</table>';







echo $output;


echo '&nbsp;&nbsp;';
echo '<a href="add_public_user.php" class="btn btn-success">Add user</a>';
?>


<?php include_once('includes/footer.php'); ?>
