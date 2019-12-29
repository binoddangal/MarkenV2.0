<?php
include 'layouts/header.php';
if(isset($_POST['convertbtn']))
{
	$marks = buildMarksData($_POST['marks']);
	$_POST['marks'] = $marks;
	if(insertmarkswithgpa($conn,$_POST))
 	{
 		showMsg('Marks Added Successfully.','success');
 	}

}
?>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

<?php
include 'layouts/sidebar.php';
?>


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
								<a href="#">Create Marks</a>
							</li>
							<li class="active">Add Marks</li>
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
							
						</div><!-- /.page-header -->

								<div class="row">
									<div class="col-xs-12">
									<?php displayMsg(); ?>
									<form class="form-horizontal" method="POST" role="form">
									<div class="form-group">
										<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Term </label>
										<?php $terms = getAllActiveTerm($conn);
										foreach ($terms as $key => $term):?>
										<?php if ($_SESSION['term_id']==$term['id']):?>
										<div class="col-sm-9">
											<input type="text" name="term" id="form-field-1" required placeholder=" " class="col-xs-10 col-sm-5" value="<?php echo $term['title']; ?>" readonly />
										</div>
										<?php endif;endforeach; ?>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Semester </label>
										<?php $semesters = getAllActiveSemester($conn);
										foreach ($semesters as $key => $semester):?>
										<?php if ($_SESSION['semester_id']==$semester['id']):?>
										<div class="col-sm-9">
											<input type="text" name="semester" id="form-field-1" required placeholder=" " class="col-xs-10 col-sm-5" value="<?php echo $semester['title']; ?>" readonly />
											
										</div>
										<?php endif;endforeach; ?>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Subject</label>
									<div class="col-sm-9">
										<select class="col-xs-10 col-sm-5" name="subject_id">
											<option value="">Select subject</option>
											<?php $subjects = getAllSemSubject($conn);
											
												foreach ($subjects as $key => $subject):
											 ?>
											<option value="<?php echo $subject['subject_id']; ?>"><?php echo $subject['subject_name']; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									
										<br>
										<div class="table-header">
											Add Students Marks
										</div>

										<div class="table-responsive">
											<table class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">S.No</th>
														<th>Student ID</th>
														<th>Roll Number</th>
														<th>Student Name</th>
														<th>Theory</th>
													</tr>
												</thead>

				<tbody>
				<?php 
				$student = getAllsemstudent($conn);
				if($student):
				foreach ($student as $key => $students):
												
				?>
				<tr>
					<td class="center">
						<?php echo ++$key ?>
				</td>

				<td>
				<?php echo $students['student_id'];?>
				</td>
				<td><?php echo $students['roll']; ?></td>
				<td class="hidden-480">
				<?php echo ucwords($students['f_name']." ".$students['l_name']); ?>
				</td>
				<td class="hidden-480">
				<input type="number" name="marks[][<?php echo $students['student_id']; ?>]" style="width:100%; height:100%"> 
				</td>
				<div class="visible-xs visible-sm hidden-md hidden-lg">
				<div class="inline position-relative">			<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
				<i class="icon-caret-down icon-only bigger-120"></i>
				</button>
				<div class="clearfix form-actions">
						
																	>
					<li>
					<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
					<span class="blue">
					<i class="icon-zoom-in bigger-120"></i>
					</span>
					</a>
					</li>

					<li>
					<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
					<span class="green">
					<i class="icon-edit bigger-120"></i>
					</span>
					</a>
					</li>

					<li>
					<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
					<span class="red">
					<i class="icon-trash bigger-120"></i>
					</span>
				    </a>
				 	</li>
					</ul>
					</div>
					</div>
					</td>
					</tr>

					<?php  endforeach; else: ?>
					<tr>
					<td colspan="5">No Data Found</td>
					</tr>
					<?php endif; ?>
														
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="col-md-offset-3 col-md-9">
								<button class="btn btn-info" name="convertbtn" type="submit" >
									<i class="icon-ok bigger-110"></i>
										Save And Convert
								</button>
						</div>
						</form>

								<div id="modal-table" class="modal fade" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header no-padding">
												<div class="table-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
														<span class="white">&times;</span>
													</button>
													Results for "Latest Registered Domains
												</div>
											</div>

										
											<div class="modal-footer no-margin-top">
												<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
													<i class="icon-remove"></i>
													Close
												</button>

											
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div><!-- PAGE CONTENT ENDS -->
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
