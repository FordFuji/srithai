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
							<form action="<?php echo site_url('promotion/backend/special_promotion_rule_save_update/'.$id);?>" method="post" enctype="multipart/form-data" class="form-horizontal">
							<div class="form-group">
					            <label class="col-md-3 control-label">Product Amount</label>
					            <div class="col-md-9">
									<input type="number" name="special_promotion_rule_no" id="special_promotion_rule_no" class="form-control" value="<?php if(!empty($row)) echo $row->special_promotion_rule_no;?>" required>
								</div>
							</div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Discount Product Price Low(%)</label>
					            <div class="col-md-9">
									<input type="number" name="product_price_low_percent" id="product_price_low_percent" class="form-control" value="<?php if(!empty($row)) echo $row->product_price_low_percent;?>" required>
								</div>
							</div>
<?php
for($i = 1; $i <= 10; $i++) {
?>
							<div class="form-group">
					            <label class="col-md-3 control-label">Product <?php echo $i;?></label>
					            <div class="col-md-9">
									<select name="product_id[]" id="product_id_<?php echo $i;?>" class="form-control">
										<option value="">Please Select</option>
<?php
	if(!empty($product)) {
		foreach($product as $p) {
			$special_promotion_rule_checked = $this->model_promotion->getMapSpecialPromotionRule($p->product_id, $i);
?>
										<option value="<?php echo $p->product_id;?>" <?php if(!empty($special_promotion_rule_checked)) echo 'selected';?>><?php echo $p->product_name_th.' / '.$p->product_name_en;?></option>
<?php
		}
	}
?>

									</select>
								</div>
							</div>
<?php
}
?>
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
			CKEDITOR.instances.special_promotion_rule_ckeditor.setData('');
		}
	</script>

	<!-- select2 -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script>
		$(document).ready(function() {
			for(i = 1; i <= 10; i++) {
				$('#product_id_' + i).select2();
			}
		});
	</script>
	<!-- end select2 -->
</body>
</html>
