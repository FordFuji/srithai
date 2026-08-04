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
							<form action="<?php echo site_url('article/backend/article_save_update/'.$id);?>" method="post" enctype="multipart/form-data" class="form-horizontal">
							<div class="form-group">
					            <label class="col-md-3 control-label">Image</label>
					            <div class="col-md-9">
                       				<input type="file" name="article_image" id="article_image" class="form-control"> Recommend 1280 x 853 px
<?php
if(!empty($row)) {
	if($row->article_image != '') {
?>
									<br><img src="<?php echo base_url('uploads/article/'.$row->article_image);?>" width="150">
<?php
	}
}
?>           
					            </div>
					        </div>
					        <div class="form-group">
					            <label class="col-md-3 control-label">Date</label>
					            <div class="col-md-9">
                       				<input type="text" name="article_date" id="article_date" class="form-control" value="<?php if(!empty($row)) echo $row->article_date;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Name(Th)</label>
					            <div class="col-md-9">
                       				<input type="text" name="article_name_th" id="article_name_th" class="form-control" value="<?php if(!empty($row)) echo $row->article_name_th;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Name(En)</label>
					            <div class="col-md-9">
                       				<input type="text" name="article_name_en" id="article_name_en" class="form-control" value="<?php if(!empty($row)) echo $row->article_name_en;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Description(Th)</label>
					            <div class="col-md-9">
                       				<textarea name="article_description_th" id="article_description_th" class="form-control" rows="4" required><?php if(!empty($row)) echo $row->article_description_th;?></textarea>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Description(En)</label>
					            <div class="col-md-9">
								<textarea name="article_description_en" id="article_description_en" class="form-control" rows="4" required><?php if(!empty($row)) echo $row->article_description_en;?></textarea>
					            </div>
					        </div>
					        <div class="form-group">
					            <label class="col-md-3 control-label">Detail(Th)</label>
					            <div class="col-md-9">
                       				<textarea name="article_detail_th" id="article_detail_th" class="form-control"><?php if(!empty($row)) echo $row->article_detail_th;?></textarea>
                       				<?php echo textarea_ckeditor('article_detail_th');?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Detail(En)</label>
					            <div class="col-md-9">
                       				<textarea name="article_detail_en" id="article_detail_en" class="form-control"><?php if(!empty($row)) echo $row->article_detail_en;?></textarea>
                       				<?php echo textarea_ckeditor('article_detail_en');?>
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
			$("#article_date").datepicker({ dateFormat: 'yy-mm-dd' });
		});
	</script>
	<script>
		$(document).ready(function() {
			App.init();
		});
		
		function resetForm() {
			$(".form-control").val('');
			CKEDITOR.instances.article_detail_th.setData('');
			CKEDITOR.instances.article_detail_en.setData('');
		}
	</script>
</body>
</html>
