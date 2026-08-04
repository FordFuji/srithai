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
							Search: <input type="text" name="begin_date" id="begin_date" value="<?php if($this->input->post('begin_date') != '') echo $this->input->post('begin_date'); else echo date('Y-m-d');?>"> - <input type="text" name="end_date" id="end_date" value="<?php if($this->input->post('end_date') != '') echo $this->input->post('end_date'); else echo date('Y-m-d');?>"> <button class="btn btn-sm btn-primary m-r-5" type="submit" style="margin-bottom: 10px;">Search</button>
<?php
$txt_search_date = '';
if($this->input->post('begin_date') != '' and $this->input->post('end_date') != '') {
	$txt_search_date .= $this->input->post('begin_date').'/'.$this->input->post('end_date');
}
?>
                        	<button class="btn btn-sm btn-primary m-r-5" type="button" onclick="window.location.href='<?php echo site_url('report/backend/export_excel_report_shipment_form/'.$txt_search_date);?>';" style="margin-bottom: 10px;">Export Excel</button>
                            <div class="table-responsive">
								<table class="table table-striped table-bordered">
						            <thead>
						                <tr>
						                	<th class="select-filter">No</th>
						                    <th>รหัสพัสดุจากทางบริษํทที่ฝากส่ง</th>
						                    <th>Invoice No</th>
						                    <th>Barcode No</th>
											<th>Product In Box</th>
											<th>Receiver</th>
											<th>Receiver Address</th>
											<th>Receiver Tumbol</th>
											<th>Receiver Amphur</th>
											<th>Receiver Province</th>
											<th>Receiver ZipCode</th>
											<th>Receiver Tel</th>
											<th>Weight</th>
											<th>Price (ราคาสินค้าที่ผู้รับต้องจ่ายให้ พนง. ปณ.)</th>
						                </tr>
						            </thead>
						            <tbody>
<?php
$i = 1;
$code = '';
$weight = 0;
if(!empty($rows)) {
	foreach($rows as $r) {
		$detail = $this->model_report->get_report_order_detail($r->order_id);
		if(!empty($detail)) {
			$code = '';
			$weight = 0;

			foreach($detail as $d) {
				if($d->order_detail_code != '') {
					$code .= $d->order_detail_code.', ';
				}
				
				$weight += $d->weight;
			}

			if($code != '') {
				$code = substr($code, 0, -2);
			}
		}
?>
										<tr>
						                	<td class="select-filter"><?php echo $i;?></td>
						                    <td><?php echo $r->order_tracking_no;?></td>
						                    <td><?php echo $r->order_no;?></td>
											<td>&nbsp;</td>
											<td><?php echo $code;?></td>
											<td><?php echo $r->order_name.' '.$r->order_surname;?></td>
											<td><?php echo $r->order_address;?></td>
											<td><?php echo $this->model_report->get_tumbol_record($r->order_tumbol)->name_in_thai;?></td>
											<td><?php echo $this->model_report->get_amphur_record($r->order_amphur)->name_in_thai;?></td>
											<td><?php echo $this->model_report->get_province_record($r->order_province)->name_in_thai;?></td>
											<td><?php echo $r->order_postcode;?></td>
											<td><?php echo $r->order_tel;?></td>
											<td><?php echo $weight;?></td>
											<td>&nbsp;</td>											
						                </tr>
<?php
		$i++;
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
					url:'<?php echo site_url('report/backend/report_shipment_server_processing'); ?>'
				},
				'columns':[
					{
						data:'report_shipment_id'
					},
					{
						data:'report_shipment_image',
						render:function(data, type, row) {
							var report_shipment_image = '<img src="<?php echo base_url('uploads/report_shipment/');?>' + row['report_shipment_image'] + '" width="150">';

							return report_shipment_image;
						}
					},
					{
						data:'report_shipment_name'
					},
					{
						data:'report_shipment_ckeditor'
					},
					{
						data:'action',
						render:function(data, type, row){
							var action = '<a href="<?php echo site_url('report/backend/report_shipment_form');?>/' + row['report_shipment_id'] + '">Edit</a> / <a href="<?php echo site_url('report/backend/report_shipment_delete');?>/' + row['report_shipment_id'] + '" onclick="return confirm(\'Confirm Delete\');">Delete</a>';
							
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
