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
							<form action="<?php echo site_url('customer_group/backend/save_update/'.$id);?>" method="post" enctype="multipart/form-data" class="form-horizontal">
							<div class="form-group">
					            <label class="col-md-3 control-label">Icon</label>
					            <div class="col-md-9">
                       				<input type="file" name="customer_group_icon" id="customer_group_icon" class="form-control"> Recommend 200 x 200 px
<?php
if(!empty($row)) {
	if($row->customer_group_icon != '') {
?>
									<br><img src="<?php echo base_url('uploads/customer_group/'.$row->customer_group_icon);?>" width="150">
<?php
	}
}
?>           
					            </div>
					        </div>
					        <div class="form-group">
					            <label class="col-md-3 control-label">Name(Th)</label>
					            <div class="col-md-9">
                       				<input type="text" name="customer_group_name_th" id="customer_group_name_th" class="form-control" value="<?php if(!empty($row)) echo $row->customer_group_name_th;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Name(En)</label>
					            <div class="col-md-9">
                       				<input type="text" name="customer_group_name_en" id="customer_group_name_en" class="form-control" value="<?php if(!empty($row)) echo $row->customer_group_name_en;?>" required>
					            </div>
					        </div>
					        <div class="form-group">
					            <label class="col-md-3 control-label">Description(Th)</label>
					            <div class="col-md-9">
                       				<textarea name="customer_group_description_th" id="customer_group_description_th" class="form-control" rows="4"><?php if(!empty($row)) echo $row->customer_group_description_th;?></textarea>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Description(En)</label>
					            <div class="col-md-9">
                       				<textarea name="customer_group_description_en" id="customer_group_description_en" class="form-control" rows="4"><?php if(!empty($row)) echo $row->customer_group_description_en;?></textarea>
					            </div>
					        </div>
<?php
if(!empty($category1)) {
	foreach($category1 as $r) {
?>
							<legend><?php echo $r->category1_name_th.' / '.$r->category1_name_en;?></legend>
							<div class="form-group">
					            <label class="col-md-3 control-label"> <input type="checkbox" id="checkbox_<?php echo $r->category1_id;?>" onclick="checkAll('<?php echo $r->category1_id;?>');"> Select All</label>
					            <div class="col-md-9">
<?php
		$product = $this->model_customer_group->getProductResult($r->category1_id);
		if(!empty($product)) {
			foreach($product as $p) {
				$check = $this->model_customer_group->getMapCustomerGroupProductId(@$row->customer_group_id, $p->product_id);
?>
									<input type="checkbox" name="product_id[]" class="product_id_<?php echo $r->category1_id;?>" value="<?php echo $p->product_id;?>" <?php if(!empty($check)) echo 'checked';?>> <?php echo $p->product_name_th.' / '.$p->product_name_en;?><br>
<?php
			}
		}
?>
					            </div>
					        </div>
<?php
	}
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
			CKEDITOR.instances.customer_group_ckeditor.setData('');
		}

		function checkAll(category1_id) {
			if($("#checkbox_" + category1_id).is(":checked") == true) {
				$(".product_id_" + category1_id).attr("checked", true);
			} else if($("#checkbox_" + category1_id).is(":checked") == false) {
				$(".product_id_" + category1_id).attr("checked", false);
			}
		}
	</script>
</body>
</html>
