		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin page-header -->
			<h1 class="page-header">Managed Tables <small><?php if(!empty($title)) echo $title;?></small></h1>
			<!-- end page-header -->
			
			<!-- begin row -->
			<div class="row">
			    <!-- begin col-12 -->
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <h4 class="panel-title"><?php if(!empty($title)) echo $title;?></h4>
                        </div>
						<form action="" method="post">
                        <div class="panel-body">
                        	<!-- Search: <input type="text" name="begin_date" id="begin_date" value="<?php if($this->input->post('begin_date') != '') echo $this->input->post('begin_date'); else echo date('Y-m-d');?>"> - <input type="text" name="end_date" id="end_date" value="<?php if($this->input->post('end_date') != '') echo $this->input->post('end_date'); else echo date('Y-m-d');?>"> สถานะ: 
							<select name="order_status">
								<option value="">เลือกสถานะ</option>
								<option value="Ordering" <?php if($this->input->post('order_status') == 'Ordering') echo ' selected';?>>รอชำระเงิน</option>
								<option value="Processing" <?php if($this->input->post('order_status') == 'Processing') echo ' selected';?>>ชำระเงินแล้ว</option>
								<option value="Delivery" <?php if($this->input->post('order_status') == 'Delivery') echo ' selected';?>>กำลังเตรียมจัดส่ง</option>
								<option value="Shipped" <?php if($this->input->post('order_status') == 'Shipped') echo ' selected';?>>ขนส่งแล้ว</option>
								<option value="Complete" <?php if($this->input->post('order_status') == 'Complete') echo ' selected';?>>เสร็จสมบูรณ์</option>
								<option value="Cancel" <?php if($this->input->post('order_status') == 'Cancel') echo ' selected';?>>ยกเลิก</option>
							</select> <button class="btn btn-sm btn-primary m-r-5" type="submit" style="margin-bottom: 10px;">Search</button> -->
							<button class="btn btn-sm btn-primary m-r-5" type="button" onclick="window.location.href='<?php echo site_url('report/backend/export_excel_report_remain_stock/');?>';" style="margin-bottom: 10px;">Export Excel</button>
                            <div class="table-responsive">
								<table class="table table-striped table-bordered">
						            <thead>
						                <tr>
						                	<th class="select-filter">Category</th>
						                    <th>Sub Category</th>
						                    <th>Item Code รหัสสินค้า</th>
						                    <th>Descriptions ข้อมูลสินค้า</th>
											<th>Price ราคาปกติ</th>
											<th>Pro Price ราคาโปรโมชั้น</th>
											<th>Quantity จำนวน</th>
											<th>UOM หน่วยนับ</th>
						                </tr>
						            </thead>
						            <tbody>
<?php
if(!empty($rows)) {
	foreach($rows as $r) {
?>
										<tr>
						                	<td class="select-filter"><?php echo $r->category1_name_th.' / '.$r->category1_name_en;?></td>
						                    <td><?php echo $r->category2_name_th.' / '.$r->category2_name_en;?></td>
						                    <td><?php echo $r->product_code;?></td>
						                    <td><?php echo $r->product_name_th.' / '.$r->product_name_en;?></td>
											<td><?php echo $r->product_price;?></td>
											<td><?php echo $r->product_price_before_discount;?></td>
											<td><?php echo $r->product_stock;?></td>
											<td>&nbsp;</td>
						                </tr>
<?php
	}
}
?>
						            </tbody>
						        </table>                             
                            </div>
                        </div>
						</form>
                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-12 -->
            </div>
            <!-- end row -->
		</div>
		<!-- end #content -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?php echo base_url('asset/backend/jquery-1.12.3.js');?>"></script>
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
	<script src="<?php echo base_url('asset/backend/jquery.dataTables.min.js');?>"></script>
	<script src="<?php echo base_url('asset/backend/js/table-manage-default.demo.min.js');?>"></script>
	<script src="<?php echo base_url('asset/backend/js/apps.min.js');?>"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script type="text/javascript">
		$(document).ready(function () {
			App.init();

			/*var table = $('#data-table').DataTable({
				pageLength: 10,
				serverSide: true,
				processing: true,
				ajax: {
					url:'<?php echo site_url('report/backend/report_sale_online_server_processing'); ?>'
				},
				'columns':[
					{
						data:'report_sale_online_id'
					},
					{
						data:'report_sale_online_image',
						render:function(data, type, row) {
							var report_sale_online_image = '<img src="<?php echo base_url('uploads/report_sale_online/');?>' + row['report_sale_online_image'] + '" width="150">';

							return report_sale_online_image;
						}
					},
					{
						data:'report_sale_online_name'
					},
					{
						data:'report_sale_online_ckeditor'
					},
					{
						data:'action',
						render:function(data, type, row){
							var action = '<a href="<?php echo site_url('report/backend/report_sale_online_form');?>/' + row['report_sale_online_id'] + '">Edit</a> / <a href="<?php echo site_url('report/backend/report_sale_online_delete');?>/' + row['report_sale_online_id'] + '" onclick="return confirm(\'Confirm Delete\');">Delete</a>';
							
							return action;
						},
						orderable: false
					}
				]
			});*/
		})
  	</script>

	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
	<script>
		$(function() {
			$("#begin_date").datepicker({ dateFormat: 'yy-mm-dd' });
			$("#end_date").datepicker({ dateFormat: 'yy-mm-dd' });
		});
	</script>
</body>
</html>
