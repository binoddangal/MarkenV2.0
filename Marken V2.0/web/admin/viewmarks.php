<?php include 'layouts/header.php';

?>

<script type="text/javascript" src="../assets/js/jquery.js"></script>
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

<?php include 'layouts/sidebar.php'; ?>

				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="#">Home</a>
							</li>

							<li>
								<a href="#">Marks</a>
							</li>
							<li class="active">View Marks</li>
						</ul><!-- .breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="icon-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- #nav-search -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								Tables
								<small>
									<i class="icon-double-angle-right"></i>
									View Marks
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">
									<div class="col-xs-12">
										<div class="table-responsive">
										
										</div><!-- /.table-responsive -->
									</div><!-- /span -->
								</div><!-- /row -->



					<div class="row">
						<div class="col-xs-12">
							<form class="form-horizontal" id="searchSpecificMarkForm"  method="POST" role="form">

								<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Student ID </label>

										<div class="col-sm-9">
											<input type="text" name="student_id" id="form-field-1" required placeholder=" " class="col-xs-10 col-sm-5" />
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Term </label>

										<div class="col-sm-9">
											<select class="col-xs-10 col-sm-5" name="term_id" required>
												<option value="">Select Term</option>
												<?php $terms = getAllActiveTerm($conn);
														foreach ($terms as $key => $term):
													 ?>
												<option value="<?php echo $term['id']; ?>"><?php echo $term['title']; ?></option>
												<?php endforeach; ?>
											 </select>
										</div>
									</div>


									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Year </label>

										<div class="col-sm-9">
											<input type="text" name="year" id="form-field-1" required placeholder=" " class="col-xs-10 col-sm-5" />
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Semester </label>

										<div class="col-sm-9">
											<select class="col-xs-10 col-sm-5" name="semester_id" required>
												<option value="">Select Semester</option>
												<?php $semesters = getAllActiveSemester($conn);
														foreach ($semesters as $key => $semester):
													 ?>
												<option value="<?php echo $semester['id']; ?>"><?php echo $semester['title']; ?></option>
												<?php endforeach; ?>
											 </select>
										</div>
									</div>
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" id="searchBinod"    name="searchbtn" type="submit">
												<i class="icon-search bigger-110"></i>
												Search
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="icon-undo bigger-110"></i>
												Reset
											</button>
										</div>
									</div>
								</form>

									
										<br>
										<div class="table-header">
											Marks Information
										</div>

										<div class="searchResultDiv">	
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
														$mark = viewStudentMarks($conn);
														if($mark):
															foreach ($mark as $key => $marks):
													
														?>
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
														<?php  endforeach; else: ?>
														<tr>
														<td colspan="9">No Data Found</td>
														</tr>
														<?php endif; ?>
													</tbody>
												</table>
											</div>
										</div>	


									</div>
								</div>
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

				<div class="ace-settings-container" id="ace-settings-container">
					<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
						<i class="icon-cog bigger-150"></i>
					</div>

					<div class="ace-settings-box" id="ace-settings-box">
						<div>
							<div class="pull-left">
								<select id="skin-colorpicker" class="hide">
									<option data-skin="default" value="#438EB9">#438EB9</option>
									<option data-skin="skin-1" value="#222A2D">#222A2D</option>
									<option data-skin="skin-2" value="#C6487E">#C6487E</option>
									<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
								</select>
							</div>
							<span>&nbsp; Choose Skin</span>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
							<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
							<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
							<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
							<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
							<label class="lbl" for="ace-settings-add-container">
								Inside
								<b>.container</b>
							</label>
						</div>
					</div>
				</div><!-- /#ace-settings-container -->
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.js"></script>

		<!-- ace scripts -->

		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->

		<script type="text/javascript">
			jQuery(function($) {
				var oTable1 = $('#sample-table-2').dataTable( {
				"aoColumns": [
			      { "bSortable": false },
			      null, null,null, null, null,
				  { "bSortable": false }
				] } );
				
				
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
						
				});
			
			
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			})
		</script>
	</body>

<!-- Mirrored from 198.74.61.72/themes/preview/ace/tables.html by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 28 Feb 2014 17:45:47 GMT -->
</html>



<script>

$("form#searchSpecificMarkForm").submit(function(e){
    e.preventDefault(); //prevents page from reloading
    var formData = new FormData(this);  /// gets the data of all the fields present in the form

$.ajax({
	url: "viewMarksTable.php",
	method: 'POST',
	data: formData,
	success: function (response) { 
        document.getElementById("searchSpecificMarkForm").reset();
        $('.searchResultDiv').html(response);
	},
	cache: false,
	contentType: false,
	processData: false
});

});



</script>

