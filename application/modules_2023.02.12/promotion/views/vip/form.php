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
							<form action="<?php echo site_url('promotion/backend/vip_save_update/'.$id);?>" method="post" enctype="multipart/form-data" class="form-horizontal">
					        <?php /*<div class="form-group">
					            <label class="col-md-3 control-label">Image</label>
					            <div class="col-md-9">
									<input type="file" name="vip_image" id="vip_image" class="form-control" required> Recommend xxx x xxx px
<?php
if(!empty($row) and $row->vip_image != '') {
?>
									<br><img src="<?php echo base_url('uploads/vip/'.$row->vip_image);?>" width="150">
<?php
}
?>
								</div>
							</div>*/ ?>
							<div class="form-group">
					            <label class="col-md-3 control-label">Name(Th)</label>
					            <div class="col-md-9">
									<input type="text" name="vip_name_th" id="vip_name_th" class="form-control" value="<?php if(!empty($row)) echo $row->vip_name_th;?>" required>
								</div>
							</div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Name(En)</label>
					            <div class="col-md-9">
									<input type="text" name="vip_name_en" id="vip_name_en" class="form-control" value="<?php if(!empty($row)) echo $row->vip_name_en;?>" required>
								</div>
							</div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Order Amount</label>
					            <div class="col-md-9">
									<input type="number" name="vip_order_amount" id="vip_order_amount" class="form-control" value="<?php if(!empty($row)) echo $row->vip_order_amount;?>" required>
								</div>
							</div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Discount</label>
					            <div class="col-md-9">
									<input type="number" name="vip_discount" id="vip_discount" class="form-control" value="<?php if(!empty($row)) echo $row->vip_discount;?>" required>
								</div>
							</div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Begin Date</label>
					            <div class="col-md-9">
									<input type="text" name="vip_begin_date" id="vip_begin_date" class="form-control" value="<?php if(!empty($row)) echo $row->vip_begin_date;?>" required>
								</div>
							</div>
							<div class="form-group">
					            <label class="col-md-3 control-label">End Date</label>
					            <div class="col-md-9">
									<input type="text" name="vip_end_date" id="vip_end_date" class="form-control" value="<?php if(!empty($row)) echo $row->vip_end_date;?>" required>
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
			CKEDITOR.instances.vip_ckeditor.setData('');
		}
	</script>

	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
	<script>
		$( function() {
			$( "#vip_begin_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
			$( "#vip_end_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
		} );
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
