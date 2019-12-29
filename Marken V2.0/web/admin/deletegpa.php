<?php 
include '../config/call.php';
$gpaId = $_GET['ref'];
if(deleteGPA($conn,$gpaId)){
	showmsg('GPA Deleted Successfully','success');
	redirection('managegpa.php');
}
?>