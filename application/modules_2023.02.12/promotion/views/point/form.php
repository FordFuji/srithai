		<!-- begin #content -->
		<div id="content" class="content">
			
			<!-- begin page-header -->
			<h1 class="page-header">Managed Form <small><?php if(!empty($title)) echo $title;?></small></h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
<?php
	$this->form_validation->set_error_delimiters('<div style="color:red; padding-bottom:5px;" class="form-control parsley-error">', '</div><br>'); 
	echo validation_errors(); 
?>
                <!-- begin col-6 -->
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                        <div class="panel-heading">
                            <h4 class="panel-title"><?php if(!empty($title)) echo $title;?></h4>
                        </div>
                        <div class="panel-body">
<?php
if(empty($id)) {
	$id = '';
}
?>
							<form action="<?php echo site_url('promotion/backend/point_save_update/'.$id);?>" method="post" enctype="multipart/form-data" class="form-horizontal">
					        <?php /*<div class="form-group">
					            <label class="col-md-3 control-label">Image</label>
					            <div class="col-md-9">
									<input type="file" name="point_image" id="point_image" class="form-control" required> Recommend xxx x xxx px
<?php
if(!empty($row) and $row->point_image != '') {
?>
									<br><img src="<?php echo base_url('uploads/point/'.$row->point_image);?>" width="150">
<?php
}
?>
								</div>
							</div>*/ ?>
							<div class="form-group">
					            <label class="col-md-3 control-label">Discount</label>
					            <div class="col-md-9">
									<input type="number" name="point_discount" id="point_discount" class="form-control" value="<?php if(!empty($row)) echo $row->point_discount;?>" required>
								</div>
							</div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Name(Th)</label>
					            <div class="col-md-9">
									<input type="text" name="point_name_th" id="point_name_th" class="form-control" value="<?php if(!empty($row)) echo $row->point_name_th;?>" required>
								</div>
							</div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Name(En)</label>
					            <div class="col-md-9">
									<input type="text" name="point_name_en" id="point_name_en" class="form-control" value="<?php if(!empty($row)) echo $row->point_name_en;?>" required>
								</div>
							</div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Point</label>
					            <div class="col-md-9">
									<input type="number" name="point_use_point" id="point_use_point" class="form-control" value="<?php if(!empty($row)) echo $row->point_use_point;?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"> </label>
								<div class="col-md-9">
									<button class="btn btn-sm btn-primary m-r-5" type="submit">Save</button>
									<button class="btn btn-sm btn-default" onclick="resetForm();" type="button">Reset</button>
								</div>
							</div>
							</form>                    
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-6 -->
            </div>
            <!-- end row -->
            
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	<!-- </div> -->
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?php echo base_url('asset/backend/plugins/jquery/jquery-1.9.1.min.js');?>"></script>
	<script src="<?php echo base_url('asset/backend/plugins/jquery/jquery-migrate-1.1.0.min.js');?>"></script>
	<script src="<?php echo base_url('asset/backend/plugins/jquery-ui/ui/minified/jquery-ui.min.js');?>"></script>
	<script src="<?php echo base_url('asset/backend/plugins/bootstrap/js/bootstrap.min.js');?>"></script>
	<!--[if lt IE 9]>
		<script src="<?php echo base_url('asset/backend/crossbrowserjs/html5shiv.js');?>"></script>
		<script src="<?php echo base_url('asset/backend/crossbrowserjs/respond.min.js');?>"></script>
		<script src="<?php echo base_url('asset/backend/crossbrowserjs/excanvas.min.js');?>"></script>
	<![endif]-->
	<script src="<?php echo base_url('asset/backend/plugins/slimscroll/jquery.slimscroll.min.js');?>"></script>
	<script src="<?php echo base_url('asset/backend/plugins/jquery-cookie/jquery.cookie.js');?>"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?php echo base_url('asset/backend/js/apps.min.js');?>"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
		});
		
		function resetForm() {
			$(".form-control").val('');
			CKEDITOR.instances.point_ckeditor.setData('');
		}
	</script>

	<!-- select2 -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script>
		$(document).ready(function() {
			$('.select2').select2();
		});
	</script>
	<!-- end select2 -->
</body>
</html>
