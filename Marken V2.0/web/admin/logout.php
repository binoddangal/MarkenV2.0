<?php
include '../config/call.php';
if(logout())
	redirect('login.php');
?>