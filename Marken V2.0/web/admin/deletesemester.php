<?php 
include '../config/call.php';
$semesterId = $_GET['ref'];
if(deleteSemester($conn,$semesterId)){
	showmsg('Semester Deleted Successfully','success');
	redirection('managesemester.php');
}
?>