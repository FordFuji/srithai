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
							<form action="<?php echo site_url('contact_us/backend/contact_us_save_update/');?>" method="post" enctype="multipart/form-data" class="form-horizontal">
					        <div class="form-group">
					            <label class="col-md-3 control-label">Description(Th)</label>
					            <div class="col-md-9">
                       				<textarea name="contact_us_description_th" id="contact_us_description_th" class="form-control" rows="4" required><?php if(!empty($row)) echo $row->contact_us_description_th;?></textarea>
					            </div>
					        </div>
					        <div class="form-group">
					            <label class="col-md-3 control-label">Description(En)</label>
					            <div class="col-md-9">
                       				<textarea name="contact_us_description_en" id="contact_us_description_en" class="form-control" rows="4" required><?php if(!empty($row)) echo $row->contact_us_description_en;?></textarea>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Center(Th)</label>
					            <div class="col-md-9">
                       				<textarea name="contact_us_center_th" id="contact_us_center_th" class="form-control" rows="4" required><?php if(!empty($row)) echo $row->contact_us_center_th;?></textarea>
					            </div>
					        </div>
					        <div class="form-group">
					            <label class="col-md-3 control-label">Center(En)</label>
					            <div class="col-md-9">
                       				<textarea name="contact_us_center_en" id="contact_us_center_en" class="form-control" rows="4" required><?php if(!empty($row)) echo $row->contact_us_center_en;?></textarea>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Address(Th)</label>
					            <div class="col-md-9">
                       				<textarea name="contact_us_address_th" id="contact_us_address_th" class="form-control" rows="4" required><?php if(!empty($row)) echo $row->contact_us_address_th;?></textarea>
					            </div>
					        </div>
					        <div class="form-group">
					            <label class="col-md-3 control-label">Address(En)</label>
					            <div class="col-md-9">
                       				<textarea name="contact_us_address_en" id="contact_us_address_en" class="form-control" rows="4" required><?php if(!empty($row)) echo $row->contact_us_address_en;?></textarea>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Tel(Th)</label>
					            <div class="col-md-9">
                       				<input type="text" name="contact_us_tel_th" id="contact_us_tel_th" class="form-control" value="<?php if(!empty($row)) echo $row->contact_us_tel_th;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Tel(En)</label>
					            <div class="col-md-9">
                       				<input type="text" name="contact_us_tel_en" id="contact_us_tel_en" class="form-control" value="<?php if(!empty($row)) echo $row->contact_us_tel_en;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Fax(Th)</label>
					            <div class="col-md-9">
                       				<input type="text" name="contact_us_fax_th" id="contact_us_fax_th" class="form-control" value="<?php if(!empty($row)) echo $row->contact_us_fax_th;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Fax(En)</label>
					            <div class="col-md-9">
                       				<input type="text" name="contact_us_fax_en" id="contact_us_fax_en" class="form-control" value="<?php if(!empty($row)) echo $row->contact_us_fax_en;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Email</label>
					            <div class="col-md-9">
                       				<input type="text" name="contact_us_email" id="contact_us_email" class="form-control" value="<?php if(!empty($row)) echo $row->contact_us_email;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Google Map Embed</label>
					            <div class="col-md-9">
                       				<textarea name="contact_us_google_map_embed" id="contact_us_google_map_embed" class="form-control" rows="4" required><?php if(!empty($row)) echo $row->contact_us_google_map_embed;?></textarea>
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
			CKEDITOR.instances.ford_ckeditor.setData('');
		}
	</script>
</body>
</html>
