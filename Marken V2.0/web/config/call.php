<?php
	session_start();
	include 'setting.php';
	include 'connect.php';
	include 'loginfunction.php';
	include 'helpers.php';
	include 'userfunction.php';
	include 'semesterfunctions.php';
	include 'subjectfunction.php';
	include 'studentfunction.php';
	include 'termfunction.php';
	include 'gpafunction.php';
	$conn = new connection(DBSERVER,DBUSER,DBPASS,DBNAME);
	$conn = $conn->connectDB();
	
