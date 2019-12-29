<?php 
include '../config/call.php';
$termId = $_GET['ref'];
if(deleteTerm($conn,$termId)){
	showmsg('Term Deleted Successfully','success');
	redirection('manageterm.php');
}
?>