<?php 
include '../config/call.php';
$userId = $_GET['ref'];
if(deleteUser($conn,$userId))
{
	showmsg('User Deleted Successfully','success');
	redirection('manageuser.php');
}
?>