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
							<form action="<?php echo site_url('order/backend/save_update/'.$id);?>" method="post" enctype="multipart/form-data" class="form-horizontal">
							<legend>Data</legend>
					        <div class="form-group">
					            <label class="col-md-3 control-label">Order Id</label>
					            <div class="col-md-9" style="padding-top: 6.5px">
                       				<?php if(!empty($row)) echo $row->order_id;?>
					            </div>
					        </div>
					        <div class="form-group">
					            <label class="col-md-3 control-label">Order No</label>
					            <div class="col-md-9" style="padding-top: 6.5px">
                       				<?php if(!empty($row)) echo $row->order_no;?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Name</label>
					            <div class="col-md-9" style="padding-top: 6.5px">
                       				<?php if(!empty($row)) echo $row->order_name.' '.$row->order_surname;?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Tel</label>
					            <div class="col-md-9" style="padding-top: 6.5px">
                       				<?php if(!empty($row)) echo $row->order_tel;?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Email</label>
					            <div class="col-md-9" style="padding-top: 6.5px">
                       				<?php if(!empty($row)) echo $row->order_email;?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Address</label>
					            <div class="col-md-9" style="padding-top: 6.5px">
                       				<?php if(!empty($row)) echo $row->order_address.' '.$this->model_order->get_tumbol_record($row->order_tumbol)->name_in_thai.' '.$this->model_order->get_amphur_record($row->order_amphur)->name_in_thai.' '.$this->model_order->get_province_record($row->order_province)->name_in_thai.' '.$row->order_postcode;?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Shipping Method</label>
					            <div class="col-md-9" style="padding-top: 6.5px">
                       				<?php if(!empty($row)) echo $row->order_shipping_method;?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Payment Method</label>
					            <div class="col-md-9" style="padding-top: 6.5px">
                       				<?php if(!empty($row)) echo $row->order_payment_method;?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Datetime Create</label>
					            <div class="col-md-9" style="padding-top: 6.5px">
                       				<?php if(!empty($row)) echo $row->order_datetime_create;?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Datetime Update</label>
					            <div class="col-md-9" style="padding-top: 6.5px">
                       				<?php if(!empty($row)) echo $row->order_datetime_update;?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Note</label>
					            <div class="col-md-9" style="padding-top: 6.5px">
                       				<?php if(!empty($row)) echo $row->order_note;?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">ต้องการใบกำกับภาษีหรือไม่</label>
					            <div class="col-md-9" style="padding-top: 6.5px">
                       				<?php if(!empty($row) and $row->order_address_for_billing != '') echo 'ต้องการ :: '; else echo 'ไม่ต้องการ';?>
									<?php 
									if(!empty($row) and ($row->order_address_for_billing == 'ที่อยู่ตามใบกำกับภาษี' or $row->order_address_for_billing == 'ที่อยู่ตามการจัดส่งสินค้า')) {
										echo $row->order_billing_name.' '.$row->order_billing_surname;?> <?php echo $row->order_billing_address.' '.$this->model_order->get_tumbol_record($row->order_billing_tumbol)->name_in_thai.' '.$this->model_order->get_amphur_record($row->order_billing_amphur)->name_in_thai.' '.$this->model_order->get_province_record($row->order_billing_province)->name_in_thai.' '.$row->order_billing_postcode;
									}?>
					            </div>
					        </div>
							<legend>Order</legend>
							<div class="form-group">
					            <div class="col-md-12" style="padding-top: 6.5px">
									<table class="table table-striped table-bordered">
										<tr>
											<th>Name</th>
											<th>Image</th>
											<th>Qty</th>
											<th>Price</th>
											<th>Color</th>
											<th>Size</th>
											<th>Code</th>
											<th>Total</th>
										</tr>
<?php
if(!empty($order_detail)) {
	foreach($order_detail as $r) {
?>
										<tr>
											<td><?php echo $r->order_detail_name;?></td>
											<td><?php if($r->order_detail_image != '') echo '<img src="'.base_url('uploads/product/'.$r->order_detail_image).'" width="150">';?></td>
											<td><?php echo $r->order_detail_qty;?></td>
											<td><?php echo number_format($r->order_detail_price, 0, '.', ',');?></td>
											<td><?php echo $r->order_detail_color;?></td>
											<td><?php echo $r->order_detail_size;?></td>
											<td><?php echo $r->order_detail_code;?></td>
											<td><?php echo number_format($r->order_detail_price * $r->order_detail_qty, 0, '.', ',');?></td>
										</tr>
<?php
	}
}
?>
										<tr>
											<th colspan="7">Sub Total</th>
											<th><?php if(!empty($row)) echo number_format($row->order_sub_total, 0, '.', ',');?></th>
										</tr>
										<tr>
											<th colspan="7">Shipping</th>
											<th><?php if(!empty($row)) echo number_format($row->order_shipping, 0, '.', ',');?></th>
										</tr>
										<tr>
											<th colspan="7">Discount</th>
											<th><?php if(!empty($row)) echo number_format($row->order_discount, 0, '.', ',');?></th>
										</tr>
										<tr>
											<th colspan="7">Total</th>
											<th><?php if(!empty($row)) echo number_format($row->order_total, 0, '.', ',');?></th>
										</tr>
									</table>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Status</label>
					            <div class="col-md-9" style="padding-top: 6.5px">
                       				<select name="order_status" class="form-control" required>
										<!-- <option value="">Please Select</option> -->

										<option value="Ordering" <?php if(!empty($row) and $row->order_status == 'Ordering') echo ' selected';?>>รอชำระเงิน</option>
										<option value="Processing" <?php if(!empty($row) and $row->order_status == 'Processing') echo ' selected';?>>ชำระเงินแล้ว</option>
										<option value="Delivery" <?php if(!empty($row) and $row->order_status == 'Delivery') echo ' selected';?>>กำลังเตรียมจัดส่ง</option>
										<option value="Shipped" <?php if(!empty($row) and $row->order_status == 'Shipped') echo ' selected';?>>ขนส่งแล้ว</option>
										<option value="Complete" <?php if(!empty($row) and $row->order_status == 'Complete') echo ' selected';?>>เสร็จสมบูรณ์</option>
										<option value="Cancel" <?php if(!empty($row) and $row->order_status == 'Cancel') echo ' selected';?>>ยกเลิก</option>
									</select>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Tracking No</label>
					            <div class="col-md-9">
                       				<input type="text" name="order_tracking_no" id="order_tracking_no" class="form-control" value="<?php if(!empty($row)) echo $row->order_tracking_no;?>">
					            </div>
					        </div>
					        <div class="form-group">
								<label class="col-md-3 control-label"> </label>
								<div class="col-md-9">
									<button class="btn btn-sm btn-primary m-r-5" type="submit">Save</button>
									<!-- <button class="btn btn-sm btn-default" onclick="resetForm();" type="button">Reset</button> -->
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
			CKEDITOR.instances.order_ckeditor.setData('');
		}
	</script>
</body>
</html>
