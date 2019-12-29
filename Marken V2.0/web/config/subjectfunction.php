<?php
function insertsubject($conn,$data)
{
	$stmt = $conn -> prepare("INSERT INTO subject(`subject_name`,`semester_id`,`fullMarks`,`passMarks`,`credit_hrs`) VALUES (:subject_name, :semester_id, :fullMarks, :passMarks, :credit_hrs)");
	$stmt->bindparam(':subject_name',$data['subject_name']);
	$stmt->bindparam(':semester_id',$data['semester_id']);
	$stmt->bindparam(':fullMarks',$data['fullMarks']);
	$stmt->bindparam(':passMarks',$data['passMarks']);
	$stmt->bindparam(':credit_hrs',$data['credit_hrs']);
	
	if($stmt->execute())
		return true;
	return false;
}


function getAllsubject($conn)
{
	$stmt = $conn -> prepare("SELECT * FROM subject INNER JOIN semester ON subject.semester_id=semester.id");
	$stmt->execute();
	if($stmt->rowCount()>0)
		return $stmt->fetchAll();
	return false;
}

function getSubjectById($conn,$subject_id)
{
	$stmt = $conn -> prepare("SELECT * FROM subject WHERE subject_id=:subject_id");
	$stmt->bindparam(':subject_id',$subject_id);
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC); 
	if($stmt->rowCount()>0)
		return $stmt->fetch();
	return false;
}

function updatesubject($conn,$data)
{
	$stmt = $conn -> prepare("UPDATE subject SET subject_name=:subject_name, semester_id=:semester_id, fullMarks=:fullMarks, passMarks=:passMarks, credit_hrs=:credit_hrs WHERE subject_id=:subject_id");
	$stmt->bindparam(':subject_name',$data['subject_name']);
	$stmt->bindparam(':semester_id',$data['semester_id']);
	$stmt->bindparam(':fullMarks',$data['fullMarks']);
	$stmt->bindparam(':passMarks',$data['passMarks']);
	$stmt->bindparam(':credit_hrs',$data['credit_hrs']);
	$stmt->bindparam(':subject_id',$data['subject_id']);
	
	if($stmt->execute())
		return true;
	return false;
}

function deleteSubject($conn,$subject_id)
{
	$stmt = $conn->prepare("DELETE FROM subject WHERE subject_id=:subject_id");
	$stmt->bindparam(':subject_id',$subject_id);
	if($stmt->execute())
		return true;
	return false;
}
function getAllSemsubject($conn)
{
	$stmt = $conn -> prepare("SELECT * FROM  subject WHERE semester_id=:semester_id");
	$stmt->bindparam(':semester_id',$_SESSION['semester_id']);
	$stmt->execute();
	if($stmt->rowCount()>0)
		return $stmt->fetchAll();
	return false;
	
}