		<!-- begin #content -->
		<div id="content" class="content">
			
			<!-- begin page-header -->
			<h1 class="page-header">Managed Form <small><?php if(!empty($title)) echo $title;?></small></h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
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
							<form action="<?php echo site_url('home/backend/save_update/'.$id);?>" method="post" enctype="multipart/form-data" class="form-horizontal">
					        <div class="form-group">
					            <label class="col-md-3 control-label">Promotion(Th)</label>
					            <div class="col-md-9">
                       				<input type="text" name="home_promotion_th" id="home_promotion_th" class="form-control" value="<?php if(!empty($row)) echo $row->home_promotion_th;?>" required>
					            </div>
					        </div>
					        <div class="form-group">
					            <label class="col-md-3 control-label">Promotion(En)</label>
					            <div class="col-md-9">
                       				<input type="text" name="home_promotion_en" id="home_promotion_en" class="form-control" value="<?php if(!empty($row)) echo $row->home_promotion_en;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Recommended(Th)</label>
					            <div class="col-md-9">
                       				<input type="text" name="home_recommend_th" id="home_recommend_th" class="form-control" value="<?php if(!empty($row)) echo $row->home_recommend_th;?>" required>
					            </div>
					        </div>
					        <div class="form-group">
					            <label class="col-md-3 control-label">Recommended(En)</label>
					            <div class="col-md-9">
                       				<input type="text" name="home_recommend_en" id="home_recommend_en" class="form-control" value="<?php if(!empty($row)) echo $row->home_recommend_en;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">New Arrivals(Th)</label>
					            <div class="col-md-9">
                       				<input type="text" name="home_new_arrivals_th" id="home_new_arrivals_th" class="form-control" value="<?php if(!empty($row)) echo $row->home_new_arrivals_th;?>" required>
					            </div>
					        </div>
					        <div class="form-group">
					            <label class="col-md-3 control-label">New Arrivals(En)</label>
					            <div class="col-md-9">
                       				<input type="text" name="home_new_arrivals_en" id="home_new_arrivals_en" class="form-control" value="<?php if(!empty($row)) echo $row->home_new_arrivals_en;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Set(Th)</label>
					            <div class="col-md-9">
                       				<input type="text" name="home_set_th" id="home_set_th" class="form-control" value="<?php if(!empty($row)) echo $row->home_set_th;?>" required>
					            </div>
					        </div>
					        <div class="form-group">
					            <label class="col-md-3 control-label">Set(En)</label>
					            <div class="col-md-9">
                       				<input type="text" name="home_set_en" id="home_set_en" class="form-control" value="<?php if(!empty($row)) echo $row->home_set_en;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Special Rule(Th)</label>
					            <div class="col-md-9">
                       				<input type="text" name="home_special_rule_th" id="home_special_rule_th" class="form-control" value="<?php if(!empty($row)) echo $row->home_special_rule_th;?>" required>
					            </div>
					        </div>
					        <div class="form-group">
					            <label class="col-md-3 control-label">Special Rule(En)</label>
					            <div class="col-md-9">
                       				<input type="text" name="home_special_rule_en" id="home_special_rule_en" class="form-control" value="<?php if(!empty($row)) echo $row->home_special_rule_en;?>" required>
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
			CKEDITOR.instances.home_ckeditor.setData('');
		}
	</script>
</body>
</html>
