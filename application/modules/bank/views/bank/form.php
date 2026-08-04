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
							<form action="<?php echo site_url('bank/backend/save_update/'.$id);?>" method="post" enctype="multipart/form-data" class="form-horizontal">
							<div class="form-group">
					            <label class="col-md-3 control-label">Image</label>
					            <div class="col-md-9">
                       				<input type="file" name="bank_image" id="bank_image" class="form-control"> Recommended 150 x 150px<br>
<?php
if(!empty($row) and $row->bank_image != '') {
?>
									<img src="<?php echo base_url('uploads/bank/'.$row->bank_image);?>" width="150">
<?php
}
?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Name(Th)</label>
					            <div class="col-md-9">
                       				<input type="text" name="bank_name_th" id="bank_name_th" class="form-control" value="<?php if(!empty($row)) echo $row->bank_name_th;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Name(En)</label>
					            <div class="col-md-9">
                       				<input type="text" name="bank_name_en" id="bank_name_en" class="form-control" value="<?php if(!empty($row)) echo $row->bank_name_en;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Company(Th)</label>
					            <div class="col-md-9">
                       				<input type="text" name="bank_company_th" id="bank_company_th" class="form-control" value="<?php if(!empty($row)) echo $row->bank_company_th;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Company(En)</label>
					            <div class="col-md-9">
                       				<input type="text" name="bank_company_en" id="bank_company_en" class="form-control" value="<?php if(!empty($row)) echo $row->bank_company_en;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Branch(Th)</label>
					            <div class="col-md-9">
                       				<input type="text" name="bank_branch_th" id="bank_branch_th" class="form-control" value="<?php if(!empty($row)) echo $row->bank_branch_th;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Branch(En)</label>
					            <div class="col-md-9">
                       				<input type="text" name="bank_branch_en" id="bank_branch_en" class="form-control" value="<?php if(!empty($row)) echo $row->bank_branch_en;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Account No</label>
					            <div class="col-md-9">
                       				<input type="text" name="bank_account_no" id="bank_account_no" class="form-control" value="<?php if(!empty($row)) echo $row->bank_account_no;?>" required>
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

	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
	<script>
		$(function() {
			$("#bank_begin_date").datepicker({ dateFormat: 'yy-mm-dd' });
			$("#bank_end_date").datepicker({ dateFormat: 'yy-mm-dd' });
		});
	</script>
	
	<script>
		$(document).ready(function() {
			App.init();
		});
		
		function resetForm() {
			$(".form-control").val('');
			CKEDITOR.instances.bank_ckeditor.setData('');
		}
	</script>
</body>
</html>
