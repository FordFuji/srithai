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
							<form action="<?php echo site_url('promotion/backend/get_set_save_update/'.$id);?>" method="post" enctype="multipart/form-data" class="form-horizontal">
					        <div class="form-group">
					            <label class="col-md-3 control-label">Image</label>
					            <div class="col-md-9">
									<input type="file" name="get_set_image" id="get_set_image" class="form-control"> Reccomended 800 x 800 px
<?php
if(!empty($row) and $row->get_set_image != '') {
?>
									<br><img src="<?php echo base_url('uploads/get_set/'.$row->get_set_image);?>" width="150">
<?php
}
?>
								</div>
							</div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Name(Th)</label>
					            <div class="col-md-9">
									<input type="text" name="get_set_name_th" id="get_set_name_th" class="form-control" value="<?php if(!empty($row)) echo $row->get_set_name_th;?>">
								</div>
							</div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Name(En)</label>
					            <div class="col-md-9">
									<input type="text" name="get_set_name_en" id="get_set_name_en" class="form-control" value="<?php if(!empty($row)) echo $row->get_set_name_en;?>">
								</div>
							</div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Before Discount Price</label>
					            <div class="col-md-9">
									<input type="number" name="get_set_before_discount_price" id="get_set_before_discount_price" class="form-control" value="<?php if(!empty($row)) echo $row->get_set_before_discount_price;?>">
								</div>
							</div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Price</label>
					            <div class="col-md-9">
									<input type="number" name="get_set_price" id="get_set_price" class="form-control" value="<?php if(!empty($row)) echo $row->get_set_price;?>">
								</div>
							</div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Set No</label>
					            <div class="col-md-9">
                       				<select name="get_set_no" id="get_set_no" class="form-control" onchange="changeProductBuy(this.value);" required>
									   	<option value="">Please Select</option>
<?php
for($i = 1; $i <= 10; $i++) {
?>
										<option value="<?php echo $i;?>" <?php if(!empty($row) and $row->get_set_no == $i) echo 'selected';?>><?php echo $i;?></option>
<?php
}
?>
									</select>
					            </div>
					        </div>
							<div class="form-group">
								<label class="col-md-3 control-label">&nbsp;</label>
								<div class="col-md-9" align="center">
									<b>Set Product</b><br>
									<span id="spanGetSet">
<?php
if(!empty($get_set)) {
	foreach($get_set as $b) {
?>
										<select name="product_id[]" class="form-control select2" required>
											<option value="">Please Select</option>
<?php
		$product = $this->model_promotion->getProductResult();
		if(!empty($product)) {
			foreach($product as $r) {
?>
											<option value="<?php echo $r->product_id;?>" <?php if($b->product_id == $r->product_id) echo 'selected';?>><?php echo $r->product_name_th.' / '.$r->product_name_en;?></option>
<?php
			}
		}
?>
										</select><br><br>
<?php
	}
} 
?>

									</span>
								</div>
							</div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Detail(Th)</label>
					            <div class="col-md-9">
									<textarea name="get_set_detail_th" id="get_set_detail_th" class="form-control"><?php if(!empty($row)) echo $row->get_set_detail_th;?></textarea>
									<?php echo textarea_ckeditor('get_set_detail_th');?>
								</div>
							</div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Detail(En)</label>
					            <div class="col-md-9">
									<textarea name="get_set_detail_en" id="get_set_detail_en" class="form-control"><?php if(!empty($row)) echo $row->get_set_detail_en;?></textarea>
									<?php echo textarea_ckeditor('get_set_detail_en');?>
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
			CKEDITOR.instances.get_set_ckeditor.setData('');
		}

		function changeProductBuy(no) {
			$.post('<?php echo site_url('promotion/backend/ajaxGetSet');?>', { no: no }, function(data) {
				$("#spanGetSet").html(data);

				$('.select2').select2();
			});
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
