<?php 
require '../config/call.php';

			$marks  = getMarksOfStudentsGPA($conn,$_POST);
?>


<div class="table-responsive">	
<table id="datatable-buttons" class="table table-striped table-bordered">
<thead>
		<tr>
			<th class="center">S.No</th>
			<th>Student Name</th>
			<th>Subject</th>
			<th>Term</th>
			<th>Semester</th>
			<th>Year</th>
			<th>Theory</th>
			<th>Grade Point</th>
			<th>Grade Title</th>
		</tr>
	</thead>

		<tbody>
			<?php
			if($marks):
			foreach ($marks as $key => $mark):?>
				<tr>
					<td class="center">
						<?php echo ++$key ?>
					</td>
					<td>
						<?php $student_id=$mark['student_id'];
						 $students = getstudentById($conn,$student_id);
						 echo $students['f_name'] ." ". $students['l_name'];
						?>
					</td>
					<td>
						<?php $subject_id=$mark['subject_id'];
						 $subjects = getSubjectById($conn,$subject_id);
						 echo $subjects['subject_name'];
						?>
					</td>
					<td>
						<?php $term_id=$mark['term_id'];
						 $terms = getTermById($conn,$term_id);
						 echo $terms['title'];
						?>
					</td>
					<td>
						<?php $semester_id=$mark['semester_id'];
						 $semesters = getSemesterById($conn,$semester_id);
						 echo $semesters['title'];
						?>
					</td>
					<td>
						<?php echo $mark['year']; ?>
					</td>
					<td>
						<?php echo $mark['theory']; ?>
					</td>
					<td>
						<?php echo $mark['gradepoint']; ?>
					</td>
					<td>
						<?php echo $mark['thgrade']; ?>
					</td>
					
				</tr>

					
			<?php endforeach; else:?>
				<tr>
					<td>No results found!!!</td>
				</tr>
			<?php endif;?>
		</tbody>
	</table>
	</div>
	<script type="text/javascript">
            TableManageButtons.init();
    </script>