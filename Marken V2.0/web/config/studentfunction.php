<?php
function insertstudent($conn,$data)
{
	$stmt = $conn -> prepare("INSERT INTO student_record(`f_name`,`l_name`,`semester_id`,`roll`,`student_id`) VALUES (:f_name, :l_name, :semester_id, :roll, :student_id)");
	$stmt->bindparam(':f_name',$data['f_name']);
	$stmt->bindparam(':l_name',$data['l_name']);
	$stmt->bindparam(':semester_id',$data['semester_id']);
	$stmt->bindparam(':roll',$data['roll']);
	$stmt->bindparam(':student_id',$data['student_id']);

	if($stmt->execute())
		return true;
	return false;
}


function getAllstudent($conn)
{
	$stmt = $conn -> prepare("SELECT * FROM student_record INNER JOIN semester ON student_record.semester_id=semester.id");
	$stmt->execute();
	if($stmt->rowCount()>0)
		return $stmt->fetchAll();
	return false;
}

function getstudentById($conn,$student_id)
{
	$stmt = $conn -> prepare("SELECT * FROM student_record WHERE student_id=:student_id");
	$stmt->bindparam(':student_id',$student_id);
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC); 
	if($stmt->rowCount()>0)
		return $stmt->fetch();
	return false;
}

function updatestudent($conn,$data)
{
	$stmt = $conn -> prepare("UPDATE student_record SET f_name=:f_name, l_name=:l_name, semester_id=:semester_id, roll=:roll WHERE student_id=:student_id");
	$stmt->bindparam(':f_name',$data['f_name']);
	$stmt->bindparam(':l_name',$data['l_name']);
	$stmt->bindparam(':semester_id',$data['semester_id']);
	$stmt->bindparam(':roll',$data['roll']);
	$stmt->bindparam(':student_id',$data['student_id']);


	if($stmt->execute())
		return true;
	return false;
}

function deletestudent($conn,$student_id)
{
	$stmt = $conn->prepare("DELETE FROM student_record WHERE student_id=:student_id");
	$stmt->bindparam(':student_id',$student_id);
	if($stmt->execute())
		return true;
	return false;
}

function getAllsemstudent($conn)
{
	$stmt = $conn -> prepare("SELECT * FROM student_record WHERE semester_id=:semester_id ");
	$stmt->bindparam(':semester_id',$_SESSION['semester_id']);
	$stmt->execute();
	if($stmt->rowCount()>0)
		return $stmt->fetchAll();
	return false;
}

