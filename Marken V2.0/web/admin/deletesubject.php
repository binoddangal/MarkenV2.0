<?php 
include '../config/call.php';
$subjectId = $_GET['ref'];
if(deleteSubject($conn,$subjectId)){
	showmsg('Subject Deleted Successfully','success');
	redirection('managesubject.php');
}
?>