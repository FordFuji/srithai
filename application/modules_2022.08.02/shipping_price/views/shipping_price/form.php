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
							<form action="<?php echo site_url('shipping_price/backend/save_update/'.$id);?>" method="post" enctype="multipart/form-data" class="form-horizontal">
					        <div class="form-group">
					            <label class="col-md-3 control-label">ไม่เกิน 1,000 กรัม</label>
					            <div class="col-md-9">
                       				<input type="number" name="shipping_price_1000" id="shipping_price_1000" class="form-control" value="<?php if(!empty($row)) echo $row->shipping_price_1000;?>" required>
					            </div>
					        </div>
					        <div class="form-group">
					            <label class="col-md-3 control-label">เกิน 1,000 แต่ไม่เกิน 2,000 กรัม</label>
					            <div class="col-md-9">
                       				<input type="number" name="shipping_price_1000_1999" id="shipping_price_1000_1999" class="form-control" value="<?php if(!empty($row)) echo $row->shipping_price_1000_1999;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">เกิน 2,000 แต่ไม่เกิน 3,000 กรัม</label>
					            <div class="col-md-9">
                       				<input type="number" name="shipping_price_2000_2999" id="shipping_price_2000_2999" class="form-control" value="<?php if(!empty($row)) echo $row->shipping_price_2000_2999;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">เกิน 3,000 แต่ไม่เกิน 4,000 กรัม</label>
					            <div class="col-md-9">
                       				<input type="number" name="shipping_price_3000_3999" id="shipping_price_3000_3999" class="form-control" value="<?php if(!empty($row)) echo $row->shipping_price_3000_3999;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">เกิน 4,000 แต่ไม่เกิน 5,000 กรัม</label>
					            <div class="col-md-9">
                       				<input type="number" name="shipping_price_4000_4999" id="shipping_price_4000_4999" class="form-control" value="<?php if(!empty($row)) echo $row->shipping_price_4000_4999;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">เกิน 5,000 แต่ไม่เกิน 6,000 กรัม</label>
					            <div class="col-md-9">
                       				<input type="number" name="shipping_price_5000_5999" id="shipping_price_5000_5999" class="form-control" value="<?php if(!empty($row)) echo $row->shipping_price_5000_5999;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">เกิน 6,000 แต่ไม่เกิน 7,000 กรัม</label>
					            <div class="col-md-9">
                       				<input type="number" name="shipping_price_6000_6999" id="shipping_price_6000_6999" class="form-control" value="<?php if(!empty($row)) echo $row->shipping_price_6000_6999;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">เกิน 7,000 แต่ไม่เกิน 8,000 กรัม</label>
					            <div class="col-md-9">
                       				<input type="number" name="shipping_price_7000_7999" id="shipping_price_7000_7999" class="form-control" value="<?php if(!empty($row)) echo $row->shipping_price_7000_7999;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">เกิน 8,000 แต่ไม่เกิน 9,000 กรัม</label>
					            <div class="col-md-9">
                       				<input type="number" name="shipping_price_8000_8999" id="shipping_price_8000_8999" class="form-control" value="<?php if(!empty($row)) echo $row->shipping_price_8000_8999;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">เกิน 9,000 แต่ไม่เกิน 10,000 กรัม</label>
					            <div class="col-md-9">
                       				<input type="number" name="shipping_price_9000_9999" id="shipping_price_9000_9999" class="form-control" value="<?php if(!empty($row)) echo $row->shipping_price_9000_9999;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">เกิน 10,000 แต่ไม่เกิน 11,000 กรัม</label>
					            <div class="col-md-9">
                       				<input type="number" name="shipping_price_10000_10999" id="shipping_price_10000_10999" class="form-control" value="<?php if(!empty($row)) echo $row->shipping_price_10000_10999;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">เกิน 11,000 แต่ไม่เกิน 12,000 กรัม</label>
					            <div class="col-md-9">
                       				<input type="number" name="shipping_price_11000_11999" id="shipping_price_11000_11999" class="form-control" value="<?php if(!empty($row)) echo $row->shipping_price_11000_11999;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">เกิน 12,000 แต่ไม่เกิน 13,000 กรัม</label>
					            <div class="col-md-9">
                       				<input type="number" name="shipping_price_12000_12999" id="shipping_price_12000_12999" class="form-control" value="<?php if(!empty($row)) echo $row->shipping_price_12000_12999;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">เกิน 13,000 แต่ไม่เกิน 14,000 กรัม</label>
					            <div class="col-md-9">
                       				<input type="number" name="shipping_price_13000_13999" id="shipping_price_13000_13999" class="form-control" value="<?php if(!empty($row)) echo $row->shipping_price_13000_13999;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">เกิน 14,000 แต่ไม่เกิน 15,000 กรัม</label>
					            <div class="col-md-9">
                       				<input type="number" name="shipping_price_14000_14999" id="shipping_price_14000_14999" class="form-control" value="<?php if(!empty($row)) echo $row->shipping_price_14000_14999;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">เกิน 15,000 แต่ไม่เกิน 16,000 กรัม</label>
					            <div class="col-md-9">
                       				<input type="number" name="shipping_price_15000_15999" id="shipping_price_15000_15999" class="form-control" value="<?php if(!empty($row)) echo $row->shipping_price_15000_15999;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">เกิน 16,000 แต่ไม่เกิน 17,000 กรัม</label>
					            <div class="col-md-9">
                       				<input type="number" name="shipping_price_16000_16999" id="shipping_price_16000_16999" class="form-control" value="<?php if(!empty($row)) echo $row->shipping_price_16000_16999;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">เกิน 17,000 แต่ไม่เกิน 18,000 กรัม</label>
					            <div class="col-md-9">
                       				<input type="number" name="shipping_price_17000_17999" id="shipping_price_17000_17999" class="form-control" value="<?php if(!empty($row)) echo $row->shipping_price_17000_17999;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">เกิน 18,000 แต่ไม่เกิน 19,000 กรัม</label>
					            <div class="col-md-9">
                       				<input type="number" name="shipping_price_18000_18999" id="shipping_price_18000_18999" class="form-control" value="<?php if(!empty($row)) echo $row->shipping_price_18000_18999;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">เกิน 19,000 แต่ไม่เกิน 20,000 กรัม</label>
					            <div class="col-md-9">
                       				<input type="number" name="shipping_price_19000_19999" id="shipping_price_19000_19999" class="form-control" value="<?php if(!empty($row)) echo $row->shipping_price_19000_19999;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">เกิน 20,000 กรัม</label>
					            <div class="col-md-9">
                       				<input type="number" name="shipping_price_20000_100000000" id="shipping_price_20000_100000000" class="form-control" value="<?php if(!empty($row)) echo $row->shipping_price_20000_100000000;?>" required>
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
			CKEDITOR.instances.shipping_price_ckeditor.setData('');
		}
	</script>
</body>
</html>
