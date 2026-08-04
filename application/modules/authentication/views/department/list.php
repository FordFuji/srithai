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
                        <div class="panel-body">
                        	<button class="btn btn-sm btn-primary m-r-5" type="button" onclick="window.location.href='<?php echo site_url('authentication/backend/department_form');?>';" style="margin-bottom: 10px;">Add</button>
                            <div class="table-responsive">
								<table id="data-table" class="table table-striped table-bordered">
						            <thead>
						                <tr>
						                	<th class="select-filter">ID</th>
						                    <th class="select-filter">Department</th>
						                    <th>Action</th>
						                </tr>
						            </thead>
						            <tbody>
						            </tbody>
						        </table>                             
                            </div>
                        </div>
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

			var table = $('#data-table').DataTable({
				pageLength: 10,
				serverSide: true,
				processing: true,
				ajax: {
					url:'<?php echo site_url('authentication/backend/department_server_processing'); ?>'
				},
				'columns':[
					{
						data:'department_id'
					},
					{
						data:'department_name'
					},
					{
						data:'action',
						render:function(data, type, row){
							var action = '<a href="<?php echo site_url('authentication/backend/department_form');?>/' + row['department_id'] + '">Edit</a> / <a href="<?php echo site_url('authentication/backend/department_delete');?>/' + row['department_id'] + '" onclick="return confirm(\'Confirm Delete\');">Delete</a>';
							return action;
						},
						orderable: false
					}
				]
			});
		})
  	</script>
</body>
</html>
