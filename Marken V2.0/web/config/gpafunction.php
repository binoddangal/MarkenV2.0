<?php
function insertgpa($conn,$data)
{
	
	$stmt = $conn -> prepare("INSERT INTO gpa(`title`,`max_gpa`,`min_gpa`,`status`) VALUES (:title, :max_gpa, :min_gpa, :status)");
	$stmt->bindparam(':title',$data['title']);
	$stmt->bindparam(':max_gpa',$data['max_gpa']);
	$stmt->bindparam(':min_gpa',$data['min_gpa']);
	$stmt->bindparam(':status',$data['status']);

	if($stmt->execute())
		return true;
	return false;
}

function getAllGPA($conn)
{
	$stmt = $conn -> prepare("SELECT * FROM gpa");
	$stmt->execute();
	if($stmt->rowCount()>0)
		return $stmt->fetchAll();
	return false;
}

function getAllActiveGPA($conn)
{
	$stmt = $conn -> prepare("SELECT * FROM gpa WHERE status='active'");
	$stmt->execute();
	if($stmt->rowCount()>0)
		return $stmt->fetchAll();
	return false;
}

function getGPAById($conn,$id)
{
	$stmt = $conn -> prepare("SELECT * FROM gpa WHERE id=:id");
	$stmt->bindparam(':id',$id);
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC); 
	if($stmt->rowCount()>0)
		return $stmt->fetch();
	return false;
}

function updateGPA($conn,$data)
{
	$stmt = $conn -> prepare("UPDATE gpa SET title=:title, max_gpa=:max_gpa, min_gpa=:min_gpa, status=:status WHERE id=:id");
	$stmt->bindparam(':title',$data['title']);
	$stmt->bindparam(':max_gpa',$data['max_gpa']);
	$stmt->bindparam(':min_gpa',$data['min_gpa']);
	$stmt->bindparam(':status',$data['status']);
	$stmt->bindparam(':id',$data['id']);
	if($stmt->execute())
		return true;
	return false;
}

function deleteGPA($conn,$id)
{
	$stmt = $conn->prepare("DELETE FROM gpa WHERE id=:id");
	$stmt->bindparam(':id',$id);
	if($stmt->execute())
		return true;
	return false;
}

function getGradeBySubject($conn,$subject_id,$obtained_mark)
{
	$stmt = $conn->prepare("SELECT * FROM subject WHERE subject_id=:id");
	$stmt->bindParam(':id',$subject_id);
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$subject = $stmt->fetch();
	$gpaPercent = ($subject['fullMarks']*25/100);
	$obtainedGPA = ($obtained_mark/$gpaPercent);
	 
	return $obtainedGPA;
}

function getGradeTitle($conn,$obtainedGPA)
{
	$stmt = $conn -> prepare("SELECT * FROM `gpa` WHERE min_gpa <= :obtainedGPA AND max_gpa >= :obtainedGPA");
	$stmt->bindParam(':obtainedGPA',$obtainedGPA);
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$grade = $stmt->fetch();
	 return $grade['title'];
}


function insertmarkswithgpa($conn,$data)
{

	$flag =false;

	foreach ($data['marks'] as $key => $mark) 
	{
	$gradepoint = getGradeBySubject($conn,$data['subject_id'],$mark);
	$thgrade = getGradeTitle($conn,$gradepoint);
	$stmt = $conn -> prepare("INSERT INTO marks(`term_id`,`semester_id`,`subject_id`,`student_id`,`year`, `theory`,`thgrade`,`gradepoint`) VALUES (:term_id, :semester_id, :subject_id, :student_id, :year, :theory, :thgrade, :gradepoint)");

	$stmt->bindparam(':term_id',$_SESSION['term_id']);
	$stmt->bindparam(':semester_id',$_SESSION['semester_id']);
	$stmt->bindparam(':subject_id',$data['subject_id']);
	$stmt->bindparam(':student_id',$key);
	$stmt->bindparam(':year',$_SESSION['year']);
	$stmt->bindparam(':theory',$mark);
	$stmt->bindparam(':thgrade',$thgrade);
	$stmt->bindparam(':gradepoint',$gradepoint);
	
	if($stmt->execute())
		$flag = true;
	}

	if($flag)
	return true;


	return false;
}

function buildMarksData($data)
{
	$raw = array_map('array_filter', $data);
	$rawMarks = array_filter($raw);
	
	$marks =[];
	foreach ($rawMarks as $key => $value) {
		foreach ($value as $k => $mark) 
		{
			$marks[$k] = $mark;
		}
	}

	return $marks;
}

function viewStudentMarks($conn)
{
	$stmt = $conn -> prepare("SELECT * FROM marks");
	$stmt->execute();
	if($stmt->rowCount()>0)
		return $stmt->fetchAll();
	return false;
}

function getMarksById($conn,$id)
{
	$stmt = $conn -> prepare("SELECT * FROM marks WHERE id=:id");
	$stmt->bindparam(':id',$id);
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC); 
	if($stmt->rowCount()>0)
		return $stmt->fetch();
	return false;
}
function getGradeByMark($conn,$obtained_mark)
{
	
	$obtainedGPA = ($obtained_mark/20);
	 
	return $obtainedGPA;
}
function updateMarks($conn,$data)
{

	$gradepoint = getGradeByMark($conn,$data['theory']);
	$thgrade = getGradeTitle($conn,$gradepoint);
	$stmt = $conn -> prepare("UPDATE marks SET theory=:theory, thgrade=:thgrade, gradepoint=:gradepoint WHERE id=:id");

	$stmt->bindparam(':theory',$data['theory']);
	$stmt->bindparam(':thgrade',$thgrade);
	$stmt->bindparam(':gradepoint',$gradepoint);
	$stmt->bindparam(':id',$data['id']);
	if($stmt->execute())
		return true;
	return false;
}
function getMarksOfStudents($conn,$data)
{
	$status;
	$stmt = $conn -> prepare("SELECT * FROM marks WHERE student_id=:student_id AND term_id=:term_id AND year=:year AND semester_id=:semester_id");
	$stmt->bindparam(':student_id',$data['student_id']);
	$stmt->bindparam(':term_id',$data['term_id']);
	$stmt->bindparam(':year',$data['year']);
	$stmt->bindparam(':semester_id',$data['semester_id']);
	

	if($stmt->execute()){
			if($stmt->rowCount()>0){
					$status = $stmt-> fetchAll();
			}
			else{
				$status=false;
			}
	}
	return $status;

}
function getMarksOfStudentsGPA($conn,$data)
{
	$status;
	$stmt = $conn -> prepare("SELECT * FROM marks WHERE semester_id=:semester_id AND term_id=:term_id AND year=:year");
	$stmt->bindparam(':term_id',$data['term_id']);
	$stmt->bindparam(':year',$data['year']);
	$stmt->bindparam(':semester_id',$data['semester_id']);
	
	if($stmt->execute()){
			if($stmt->rowCount()>0){
					$status = $stmt->fetchAll();
			}
			else{
				$status=false;
			}
	}
	return $status;
}


