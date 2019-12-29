<?php 
include '../config/call.php';
$studentId = $_GET['ref'];
if(deletestudent($conn,$studentId))
{
	showmsg('Student Deleted Successfully','success');
	redirection('managestudent.php');
}
?>