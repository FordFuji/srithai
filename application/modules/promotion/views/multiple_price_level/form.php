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
							<form action="<?php echo site_url('promotion/backend/multiple_price_level_save_update/'.$id);?>" method="post" enctype="multipart/form-data" class="form-horizontal">
							<legend><input type="button" onclick="addMultipleLevel();" value=" + "> <input type="button" onclick="deleteMultipleLevel();" value=" - "></legend><br><br>
							<span id="clone">
<?php 
$i = 0;
if(!empty($rows)) {
	foreach($rows as $r) {
		$i++;
?>
							<span class="no_<?php echo $i;?>">
							<legend>Multiple Price Level <?php echo $i;?></legend>
							<div class="form-group">
					            <label class="col-md-3 control-label">Buy</label>
					            <div class="col-md-9">
									<input type="number" name="multiple_price_level_buy[]" id="multiple_price_level_buy" class="form-control" value="<?php echo $r->multiple_price_level_buy;?>">
								</div>
							</div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Discount</label>
					            <div class="col-md-9">
									<input type="number" name="multiple_price_level_discount[]" id="multiple_price_level_discount" class="form-control" value="<?php echo $r->multiple_price_level_discount;?>">
								</div>
							</div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Type</label>
					            <div class="col-md-9">
									<select name="multiple_price_level_type[]" id="multiple_price_level_type[]" class="form-control">
										<option value="%" <?php if($r->multiple_price_level_type == '%') echo 'selected';?>>%</option>
										<option value="บาท" <?php if($r->multiple_price_level_type == 'บาท') echo 'selected';?>>บาท</option>
									</select>
								</div>
							</div>
							</span>
<?php
	}
} else {
	for($i = 1; $i <= 1; $i++) {
?>
							<span class="no_1">
							<legend>Multiple Price Level <?php echo $i;?> <input type="button" value=" - " onclick="deleteMultipleLevel(1);"></legend>
							<div class="form-group">
								<label class="col-md-3 control-label">Buy</label>
								<div class="col-md-9">
									<input type="number" name="multiple_price_level_buy[]" id="multiple_price_level_buy" class="form-control" value="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Discount</label>
								<div class="col-md-9">
									<input type="number" name="multiple_price_level_discount[]" id="multiple_price_level_discount" class="form-control" value="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Type</label>
								<div class="col-md-9">
									<select name="multiple_price_level_type[]" id="multiple_price_level_type[]" class="form-control">
										<option value="%">%</option>
										<option value="บาท">บาท</option>
									</select>
								</div>
							</div>
							</span>
<?php	
	}
}
?>
							</span>
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
			CKEDITOR.instances.multiple_price_level_ckeditor.setData('');
		}

		var i = '<?php echo $i;?>';

		function addMultipleLevel() {
			i++;
	
			$('<span class="no_' + i + '"><legend>Multiple Price Level ' + i + '</legend><div class="form-group"><label class="col-md-3 control-label">Buy</label><div class="col-md-9"><input type="number" name="multiple_price_level_buy[]" id="multiple_price_level_buy" class="form-control"></div></div><div class="form-group"><label class="col-md-3 control-label">Discount</label><div class="col-md-9"><input type="number" name="multiple_price_level_discount[]" id="multiple_price_level_discount" class="form-control"></div></div><div class="form-group"><label class="col-md-3 control-label">Type</label><div class="col-md-9"><select name="multiple_price_level_type[]" id="multiple_price_level_type[]" class="form-control"><option value="%">%</option><option value="บาท">บาท</option></select></div></div></span>').clone().appendTo("#clone");
		}

		function deleteMultipleLevel() {
			$(".no_" + i).remove();

			i--;
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
