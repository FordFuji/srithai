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
							<legend>Data</legend>
							<div class="form-group">
					            <label class="col-md-3 control-label">VIP</label>
					            <div class="col-md-9" style="padding-top: 7px;">
                       				<?php if(!empty($row)) echo $this->model_member->getVipNameRow($row->vip_id);?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Order Amount</label>
					            <div class="col-md-9" style="padding-top: 7px;">
                       				<?php if(!empty($row)) echo number_format($row->member_order_amount, 0, '.', ',');?>
					            </div>
					        </div>
					        <div class="form-group">
					            <label class="col-md-3 control-label">Name</label>
					            <div class="col-md-9" style="padding-top: 7px;">
                       				<?php if(!empty($row)) echo $row->member_name;?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Surame</label>
					            <div class="col-md-9" style="padding-top: 7px;">
                       				<?php if(!empty($row)) echo $row->member_surname;?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Tel</label>
					            <div class="col-md-9" style="padding-top: 7px;">
                       				<?php if(!empty($row)) echo $row->member_tel;?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Email</label>
					            <div class="col-md-9" style="padding-top: 7px;">
                       				<?php if(!empty($row)) echo $row->member_email;?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Username</label>
					            <div class="col-md-9" style="padding-top: 7px;">
                       				<?php if(!empty($row)) echo $row->member_username;?>
					            </div>
					        </div>
<?php
if(!empty($shipping_address)) {
	$i = 0;
	foreach($shipping_address as $r) {
		$i++;
?>
							<legend>Shipping Address <?php echo $i;?></legend>
							<div class="form-group">
					            <label class="col-md-3 control-label">Status</label>
					            <div class="col-md-9" style="padding-top: 7px;">
                       				<?php echo $r->member_shipping_status;?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Name</label>
					            <div class="col-md-9" style="padding-top: 7px;">
                       				<?php echo $r->member_shipping_name;?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Surname</label>
					            <div class="col-md-9" style="padding-top: 7px;">
                       				<?php echo $r->member_shipping_surname;?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Tel</label>
					            <div class="col-md-9" style="padding-top: 7px;">
                       				<?php echo $r->member_shipping_tel;?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Email</label>
					            <div class="col-md-9" style="padding-top: 7px;">
                       				<?php echo $r->member_shipping_email;?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Address</label>
					            <div class="col-md-9" style="padding-top: 7px;">
                       				<?php echo $r->member_shipping_address;?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Province</label>
					            <div class="col-md-9" style="padding-top: 7px;">
                       				<?php echo $this->model_member->get_province_record($r->member_shipping_province)->name_in_thai;?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Amphur</label>
					            <div class="col-md-9" style="padding-top: 7px;">
                       				<?php echo $this->model_member->get_amphur_record($r->member_shipping_amphur)->name_in_thai;?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Tumbol</label>
					            <div class="col-md-9" style="padding-top: 7px;">
                       				<?php echo $this->model_member->get_tumbol_record($r->member_shipping_tumbol)->name_in_thai;?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Postcode</label>
					            <div class="col-md-9" style="padding-top: 7px;">
                       				<?php echo $r->member_shipping_postcode;?>
					            </div>
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
