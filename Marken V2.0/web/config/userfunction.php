<?php
function insertUser($conn,$data)
{
	$data['password'] = isset($data['password'])? md5($data['password']):'';
	$stmt = $conn -> prepare("INSERT INTO login(`f_name`,`l_name`,`email`,`password`,`address`,`contact`,`image`,`role`,`status`) VALUES (:f_name, :l_name, :email, :password, :address, :contact, :image, :role, :status)");
	$stmt->bindparam(':f_name',$data['f_name']);
	$stmt->bindparam(':l_name',$data['l_name']);
	$stmt->bindparam(':email',$data['email']);
	$stmt->bindparam(':password',$data['password']);
	$stmt->bindparam(':address',$data['address']);
	$stmt->bindparam(':contact',$data['contact']);
	$stmt->bindparam(':image',$data['image']);
	$stmt->bindparam(':role',$data['role']);
	$stmt->bindparam(':status',$data['status']);

	if($stmt->execute())
		return true;
	return false;
}

function getAllUser($conn)
{
	$stmt = $conn -> prepare("SELECT * FROM login");
	$stmt->execute();
	if($stmt->rowCount()>0)
		return $stmt->fetchAll();
	return false;
}

function getUserById($conn,$id)
{
	$stmt = $conn -> prepare("SELECT * FROM login WHERE id=:id");
	$stmt->bindparam(':id',$id);
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC); 
	if($stmt->rowCount()>0)
		return $stmt->fetch();
	return false;
}

function updateUser($conn,$data)
{
	if(isset($data['image']))
	{
		$stmt = $conn -> prepare("UPDATE login SET f_name=:f_name, l_name=:l_name, email=:email, address=:address, contact=:contact, image=:image, role=:role, status=:status WHERE id=:id");
		$stmt->bindparam(':f_name',$data['f_name']);
		$stmt->bindparam(':l_name',$data['l_name']);
		$stmt->bindparam(':email',$data['email']);
		$stmt->bindparam(':address',$data['address']);
		$stmt->bindparam(':contact',$data['contact']);
		$stmt->bindparam(':image',$data['image']);
		$stmt->bindparam(':role',$data['role']);
		$stmt->bindparam(':status',$data['status']);
		$stmt->bindparam(':id',$data['id']);
	}
	else
	{
		$stmt = $conn -> prepare("UPDATE login SET f_name=:f_name, l_name=:l_name, email=:email, address=:address, contact=:contact, role=:role, status=:status WHERE id=:id");
		$stmt->bindparam(':f_name',$data['f_name']);
		$stmt->bindparam(':l_name',$data['l_name']);
		$stmt->bindparam(':email',$data['email']);
		$stmt->bindparam(':address',$data['address']);
		$stmt->bindparam(':contact',$data['contact']);
		$stmt->bindparam(':role',$data['role']);
		$stmt->bindparam(':status',$data['status']);
		$stmt->bindparam(':id',$data['id']);

	}

	if($stmt->execute())
		return true;
	return false;
}

function deleteUser($conn,$id)
{
	$stmt = $conn->prepare("DELETE FROM login WHERE id=:id");
	$stmt->bindparam(':id',$id);
	if($stmt->execute())
		return true;
	return false;
}
function insertMarks($conn,$data)
{
	$stmt = $conn -> prepare("INSERT INTO marks(`roll`, `student_id`, `years`, `term`, `theory`, `semester_id`, `subject_id`, `thGrade`, `gradePoint`) VALUES (:roll, :student_id, :years, :term, :theory, :semester_id, :sudject_id, :thGrade, :gradePoint)");
	$stmt->bindparam(':roll',$data['roll']);
	$stmt->bindparam(':student_id',$data['student_id']);
	$stmt->bindparam(':years',$data['years']);
	$stmt->bindparam(':term',$data['term']);
	$stmt->bindparam(':theory',$data['theory']);
	$stmt->bindparam(':semester_id',$data['semester_id']);
	$stmt->bindparam(':subject_id',$data['subject_id']);
	$stmt->bindparam(':thGrade',$data['thGrade']);
	$stmt->bindparam(':gradePoint',$data['gradePoint']);

	if($stmt->execute())
		return true;
	return false;
}

