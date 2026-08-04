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
							<form action="<?php echo site_url('member/backend/member_save_update/'.$id);?>" method="post" enctype="multipart/form-data" class="form-horizontal">
<?php
if(!empty($rows)) {
	foreach($rows as $r) {
?>
							<legend>Order No <?php echo $r->order_no;?></legend>
							<div class="form-group">
					            <label class="col-md-3 control-label">Name Surname</label>
					            <div class="col-md-9" style="padding-top: 7px;">
                       				<?php echo $r->order_name.' '.$r->order_surname;?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Telephone</label>
					            <div class="col-md-9" style="padding-top: 7px;">
                       				<?php echo $r->order_tel;?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Email</label>
					            <div class="col-md-9" style="padding-top: 7px;">
                       				<?php echo $r->order_email;?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Address</label>
					            <div class="col-md-9" style="padding-top: 7px;">
                       				<?php echo $r->order_address.' '.$this->model_member->get_tumbol_record($r->order_tumbol)->name_in_english.' '.$this->model_member->get_amphur_record($r->order_amphur)->name_in_english.' '.$this->model_member->get_province_record($r->order_province)->name_in_english.' '.$r->order_postcode;?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Note</label>
					            <div class="col-md-9" style="padding-top: 7px;">
                       				<?php if($r->order_note != '') echo $r->order_note; else echo '-';?>
					            </div>
					        </div>
							<div class="table-responsive">
								<table id="data-table" class="table table-striped table-bordered">
									<tr>
										<th>No</th>
										<th>Image</th>
										<th>Name</th>
										<th>Qty</th>
										<th>Color</th>
										<th>Size</th>
										<th>Code</th>
										<th>Point</th>
										<th>Sub Total</th>
									</tr>
<?php
		$order_detail = $this->model_member->getOrderDetailHistory($r->order_id);
		if(!empty($order_detail)) {
			$i = 0;
			foreach($order_detail as $od) {
				$i++;

				$price = $od->order_detail_price * $od->order_detail_qty;
?>
									<tr>
										<td><?php echo $i;?></td>
										<td><img src="<?php echo base_url('uploads/product/'.$od->order_detail_image);?>" width="150"></td>
										<td><?php echo $od->order_detail_name;?></td>
										<td><?php echo $od->order_detail_qty;?></td>
										<td><?php echo $od->order_detail_color;?></td>
										<td><?php echo $od->order_detail_size;?></td>
										<td><?php echo $od->order_detail_code;?></td>
										<td><?php echo $od->promotion_point;?></td>
										<td><?php echo number_format($price, 0, '.', ',');?></td>
									</tr>
<?php
			}
		}
?>
									<tr>
										<td colspan="8">Sub Total</td>
										<td><?php echo $r->order_sub_total;?></td>
									</tr>
									<tr>
										<td colspan="8">Shipping</td>
										<td><?php echo $r->order_shipping;?></td>
									</tr>
									<tr>
										<td colspan="8">Discount</td>
										<td><?php echo $r->order_discount;?></td>
									</tr>
									<tr>
										<td colspan="8">Total</td>
										<td><?php echo $r->order_total;?></td>
									</tr>
								</table>
							</div>
<?php
	}
}
?>
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
			CKEDITOR.instances.member_ckeditor.setData('');
		}
	</script>
</body>
</html>
