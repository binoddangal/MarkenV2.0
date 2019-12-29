<?php
function insertTerm($conn,$data)
{
	
	$stmt = $conn -> prepare("INSERT INTO term(`title`,`description`,`status`) VALUES (:title, :description, :status)");
	$stmt->bindparam(':title',$data['title']);
	$stmt->bindparam(':description',$data['description']);
	$stmt->bindparam(':status',$data['status']);

	if($stmt->execute())
		return true;
	return false;
}

function getAllTerm($conn)
{
	$stmt = $conn -> prepare("SELECT * FROM term");
	$stmt->execute();
	if($stmt->rowCount()>0)
		return $stmt->fetchAll();
	return false;
}

function getAllActiveTerm($conn)
{
	$stmt = $conn -> prepare("SELECT * FROM term WHERE status='active'");
	$stmt->execute();
	if($stmt->rowCount()>0)
		return $stmt->fetchAll();
	return false;
}

function getTermById($conn,$id)
{
	$stmt = $conn -> prepare("SELECT * FROM term WHERE id=:id");
	$stmt->bindparam(':id',$id);
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC); 
	if($stmt->rowCount()>0)
		return $stmt->fetch();
	return false;
}

function updateTerm($conn,$data)
{

		$stmt = $conn -> prepare("UPDATE term SET title=:title, description=:description, status=:status WHERE id=:id");
		$stmt->bindparam(':title',$data['title']);
		$stmt->bindparam(':description',$data['description']);
		$stmt->bindparam(':status',$data['status']);
		$stmt->bindparam(':id',$data['id']);
	


	if($stmt->execute())
		return true;
	return false;
}

function deleteTerm($conn,$id)
{
	$stmt = $conn->prepare("DELETE FROM term WHERE id=:id");
	$stmt->bindparam(':id',$id);
	if($stmt->execute())
		return true;
	return false;
}