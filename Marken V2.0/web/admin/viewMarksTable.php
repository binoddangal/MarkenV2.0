<?php 
require '../config/call.php';
?>


<div class="table-responsive">	
											<table  class="table table-striped table-bordered table-hover">
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
														<th>Action</th>
													</tr>
												</thead>

												<tbody>
													<?php
													$key=0;
													$mark  = getMarksOfStudents($conn,$_POST);
													if($mark!=false){
														foreach($mark as $marks){?>
													<tbody>
														<tr>
															<td class="center">
																<?php echo ++$key ?>
															</td>
															<td>
																<?php $student_id=$marks['student_id'];
																 $students = getstudentById($conn,$student_id);
																 echo $students['f_name'] ." ". $students['l_name'];
																?>
															</td>
															<td>
																<?php $subject_id=$marks['subject_id'];
																 $subjects = getSubjectById($conn,$subject_id);
																 echo $subjects['subject_name'];
																?>
															</td>
															<td>
																<?php $term_id=$marks['term_id'];
																 $terms = getTermById($conn,$term_id);
																 echo $terms['title'];
																?>
															</td>
															<td>
																<?php $semester_id=$marks['semester_id'];
																 $semesters = getSemesterById($conn,$semester_id);
																 echo $semesters['title'];
																?>
															</td>
															<td>
																<?php echo $marks['year']; ?>
															</td>
															<td>
																<?php echo $marks['theory']; ?>
															</td>
															<td>
																<?php echo $marks['gradepoint']; ?>
															</td>
															<td>
																<?php echo $marks['thgrade']; ?>
															</td>
															<td>
															<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
															

															<a class="green" href="updatemarks.php?ref=<?php echo $marks['id']; ?>">
															<i class="icon-pencil bigger-130"></i>
															</a>

															
															</div>
															</td>
														</tr>







													</tbody>		
												<?php  }	}
													else{
														echo  "<tr><td>No results found!!!</td></tr>";
													}
													 ?>
												</tbody>
											</table>
										</div>


