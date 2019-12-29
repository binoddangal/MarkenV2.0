<?php
function insertSemester($conn,$data)
{
	
	$stmt = $conn -> prepare("INSERT INTO semester(`title`,`description`,`status`) VALUES (:title, :description, :status)");
	$stmt->bindparam(':title',$data['title']);
	$stmt->bindparam(':description',$data['description']);
	$stmt->bindparam(':status',$data['status']);

	if($stmt->execute())
		return true;
	return false;
}

function getAllSemester($conn)
{
	$stmt = $conn -> prepare("SELECT * FROM semester");
	$stmt->execute();
	if($stmt->rowCount()>0)
		return $stmt->fetchAll();
	return false;
}

function getAllActiveSemester($conn)
{
	$stmt = $conn -> prepare("SELECT * FROM semester WHERE status='active'");
	$stmt->execute();
	if($stmt->rowCount()>0)
		return $stmt->fetchAll();
	return false;
}

function getSemesterById($conn,$id)
{
	$stmt = $conn -> prepare("SELECT * FROM semester WHERE id=:id");
	$stmt->bindparam(':id',$id);
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC); 
	if($stmt->rowCount()>0)
		return $stmt->fetch();
	return false;
}

function updateSemester($conn,$data)
{
	$stmt = $conn -> prepare("UPDATE semester SET title=:title, description=:description, status=:status WHERE id=:id");
	$stmt->bindparam(':title',$data['title']);
	$stmt->bindparam(':description',$data['description']);
	$stmt->bindparam(':status',$data['status']);
	$stmt->bindparam(':id',$data['id']);
	if($stmt->execute())
		return true;
	return false;
}

function deleteSemester($conn,$id)
{
	$stmt = $conn->prepare("DELETE FROM semester WHERE id=:id");
	$stmt->bindparam(':id',$id);
	if($stmt->execute())
		return true;
	return false;
}
function getAllSubSemester($conn)
{
	$stmt = $conn -> prepare("SELECT `semester_id` FROM subject WHERE subject_id=:subject_id");
	$stmt->bindparam(':subject_id',$subject_id);
	$stmt->execute();
	if($stmt->rowCount()>0)
		return $stmt->fetchAll();
	return false;
}