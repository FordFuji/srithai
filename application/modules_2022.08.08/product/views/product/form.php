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
							<form action="<?php echo site_url('product/backend/product_save_update/'.$id);?>" method="post" enctype="multipart/form-data" class="form-horizontal">
							<legend>Data</legend>
							<div class="form-group">
					            <label class="col-md-3 control-label">Category 1(Th) / Category 1(En)</label>
					            <div class="col-md-9">
                       				<select name="category1_id" id="category1_id" class="form-control" onchange="changeCategory1(this.value);" required>
										<option value="">Please Select</option>
<?php
if(!empty($category1)) {
	foreach($category1 as $r) {
?>
										<option value="<?php echo $r->category1_id;?>" <?php if(!empty($row) and $row->category1_id == $r->category1_id) echo 'selected';?>><?php echo $r->category1_name_th.' / '.$r->category1_name_en;?></option>
<?php
	}
}
?>
									</select>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Category 2(Th) / Category 2(En)</label>
					            <div class="col-md-9">
                       				<select name="category2_id" id="category2_id" class="form-control" required>
										<option value="">Please Select</option>
<?php
if(!empty($row) and $row->category1_id != '') {
	$this->db->where('category1_id', $row->category1_id);
	$query = $this->db->get('ci_category2');

	$rows = $query->result();

	if(!empty($rows)) {
		foreach($rows as $r) {
?>
										<option value="<?php echo $r->category2_id;?>" <?php if(!empty($row) and $row->category2_id == $r->category2_id) echo 'selected';?>><?php echo $r->category2_name_th.' / '.$r->category2_name_en;?></option>
<?php
		}
	}
}
?>
									</select>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Image</label>
					            <div class="col-md-9">
                       				<input type="file" name="product_image" id="product_image" class="form-control"> Recommend 800 x 800 px
<?php
if(!empty($row)) {
	if($row->product_image != '') {
?>
									<br><img src="<?php echo base_url('uploads/product/'.$row->product_image);?>" width="150">
<?php
	}
}
?>           
					            </div>
					        </div>
					        <div class="form-group">
					            <label class="col-md-3 control-label">Name(Th)</label>
					            <div class="col-md-9">
                       				<input type="text" name="product_name_th" id="product_name_th" class="form-control" value="<?php if(!empty($row)) echo $row->product_name_th;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Name(En)</label>
					            <div class="col-md-9">
                       				<input type="text" name="product_name_en" id="product_name_en" class="form-control" value="<?php if(!empty($row)) echo $row->product_name_en;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Description(Th)</label>
					            <div class="col-md-9">
                       				<textarea name="product_description_th" id="product_description_th" class="form-control" rows="4" required><?php if(!empty($row)) echo $row->product_description_th;?></textarea>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Description(En)</label>
					            <div class="col-md-9">
                       				<textarea name="product_description_en" id="product_description_en" class="form-control" rows="4" required><?php if(!empty($row)) echo $row->product_description_en;?></textarea>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Price before discount</label>
					            <div class="col-md-9">
                       				<input type="number" name="product_price_before_discount" id="product_price_before_discount" class="form-control" value="<?php if(!empty($row)) echo $row->product_price_before_discount;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Price</label>
					            <div class="col-md-9">
                       				<input type="number" name="product_price" id="product_price" class="form-control" value="<?php if(!empty($row)) echo $row->product_price;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label"></label>
					            <div class="col-md-9">
                       				<input type="checkbox" name="product_promotion" id="product_promotion" value="Yes" <?php if(!empty($row) and $row->product_promotion == 'Yes') echo 'checked';?>> Promotion
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label"></label>
					            <div class="col-md-9">
                       				<input type="checkbox" name="product_recommened" id="product_recommened" value="Yes" <?php if(!empty($row) and $row->product_recommened == 'Yes') echo 'checked';?>> Reccommened
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label"></label>
					            <div class="col-md-9">
                       				<input type="checkbox" name="product_new_arrivals" id="product_new_arrivals" value="Yes" <?php if(!empty($row) and $row->product_new_arrivals == 'Yes') echo 'checked';?>> New Arrivals
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Product Weight</label>
					            <div class="col-md-8">
                       				<input type="number" name="product_weight" id="product_weight" class="form-control" value="<?php if(!empty($row)) echo $row->product_weight;?>" required>
					            </div>
								<label class="col-md-1">
									Gram
								</label>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Code</label>
					            <div class="col-md-9">
                       				<input type="text" name="product_code" id="product_code" class="form-control" value="<?php if(!empty($row)) echo $row->product_code;?>" required>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Sort</label>
					            <div class="col-md-9">
                       				<input type="number" name="product_sort" id="product_sort" class="form-control" value="<?php if(!empty($row)) echo $row->product_sort;?>" required>
					            </div>
					        </div>
							<legend>Product Descriptions</legend>
							<div class="form-group">
					            <label class="col-md-3 control-label">Descriptions(Th)</label>
					            <div class="col-md-9">
                       				<textarea name="product_descriptions_th" id="product_descriptions_th" class="form-control"><?php if(!empty($row)) echo $row->product_descriptions_th;?></textarea>
									<?php echo textarea_ckeditor('product_descriptions_th');?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Descriptions(En)</label>
					            <div class="col-md-9">
                       				<textarea name="product_descriptions_en" id="product_descriptions_en" class="form-control"><?php if(!empty($row)) echo $row->product_descriptions_en;?></textarea>
									   <?php echo textarea_ckeditor('product_descriptions_en');?>
					            </div>
					        </div>
							<legend>Product Specifications</legend>
							<div class="form-group">
					            <label class="col-md-3 control-label">Specifications(Th)</label>
					            <div class="col-md-9">
                       				<textarea name="product_specifications_th" id="product_specifications_th" class="form-control"><?php if(!empty($row)) echo $row->product_specifications_th;?></textarea>
									<?php echo textarea_ckeditor('product_specifications_th');?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Specifications(En)</label>
					            <div class="col-md-9">
                       				<textarea name="product_specifications_en" id="product_specifications_en" class="form-control"><?php if(!empty($row)) echo $row->product_specifications_en;?></textarea>
									<?php echo textarea_ckeditor('product_specifications_en');?>
					            </div>
					        </div>
							<legend>Product Details</legend>
							<div class="form-group">
					            <label class="col-md-3 control-label">Details(Th)</label>
					            <div class="col-md-9">
                       				<textarea name="product_details_th" id="product_details_th" class="form-control"><?php if(!empty($row)) echo $row->product_details_th;?></textarea>
									<?php echo textarea_ckeditor('product_details_th');?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Details(En)</label>
					            <div class="col-md-9">
                       				<textarea name="product_details_en" id="product_details_en" class="form-control"><?php if(!empty($row)) echo $row->product_details_en;?></textarea>
									<?php echo textarea_ckeditor('product_details_en');?>
					            </div>
					        </div>
							<legend>Color & Size</legend>
							<div class="form-group">
					            <label class="col-md-3 control-label">&nbsp;</label>
					            <div class="col-md-9">
                       				<select name="color_size[]" id="color_size" class="form-control" multiple="true" style="height: 300px;">
<?php
if(!empty($color)) {
	foreach($color as $r) {
?>
										<optgroup label="<?php echo $r->color_name_th.' / '.$r->color_name_en;?>">
<?php
		if(!empty($size)) {
			foreach($size as $s) {
?>
											<option value="<?php echo $r->color_id.'&'.$s->size_id;?>"
<?php
				$this->db->where('product_id', @$row->product_id);
				$this->db->where('color_id', $r->color_id);
				$this->db->where('size_id', $s->size_id);
				$query_color_size = $this->db->get('ci_map_product');

				$row_color_size = $query_color_size->row();

				if(!empty($row_color_size)) {
					echo 'selected';
				}
?>
											><?php echo $s->size_name_th.' / '.$s->size_name_en;?></option>
<?php
			}
		}
?>
										</optgroup>			
<?php
	}
}
?>
									</select>		
					            </div>
					        </div>
							<legend>Product Related</legend>
<?php
if(!empty($category1)) {
	foreach($category1 as $c1) {
		$product = $this->model_product->getProductByCategory1($c1->category1_id);
?>
							<legend><?php echo $c1->category1_name_th.' / '.$c1->category1_name_en;?></legend>
							<div class="form-group">
					            <label class="col-md-3 control-label">Select All <input type="checkbox" id="category1_<?php echo $c1->category1_id;?>" onclick="clickCategory1('<?php echo $c1->category1_id;?>');"></label>
					            <div class="col-md-9">
<?php
		if(!empty($product)) {
			foreach($product as $p) {
				$mpr = $this->model_product->getProductRelated($id, $p->product_id);

				if(!empty($mpr)) {
					$result = true;
				} else {
					$result = false;
				}
?>
									<input type="checkbox" name="map_product_related_product_id[]" class="product_id_<?php echo $c1->category1_id;?>" value="<?php echo $p->product_id;?>" <?php if($result == true) echo 'checked';?>> <?php echo $p->product_name_th.' / '.$p->product_name_en;?><br>
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
							<legend>Photo</legend>
							<div class="form-group">
					            <label class="col-md-3 control-label">Photo</label>
					            <div class="col-md-9">
                       				<input type="file" name="product_photo_image[]" id="product_photo_image" class="form-control" multiple="true">Recommend 800 x 800 px
<?php
if(!empty($product_photo)) {
	foreach($product_photo as $r) {
?>
									<br><img src="<?php echo base_url('uploads/product_photo/'.$r->product_photo_image);?>" width="150"> <a href="<?php echo site_url('product/backend/delete_product_photo/'.$r->product_id.'/'.$r->product_photo_id);?>" onclick="return confirm('Confirm Delete');">Delete</a><br>
<?php
	}
}
?>
					            </div>
					        </div>
							<div class="form-group">
					            <label class="col-md-3 control-label">Stock</label>
					            <div class="col-md-9">
                       				<input type="number" name="product_stock" id="product_stock" class="form-control" value="<?php if(!empty($row)) echo $row->product_stock;?>" required>
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
			CKEDITOR.instances.product_ckeditor.setData('');
		}

		function changeCategory1(category1_id) {
			$.post('<?php echo site_url('product/backend/ajaxChangeCategory1');?>', { category1_id: category1_id }, function(data) {
				$("#category2_id").html(data);
			});
		}

		function clickCategory1(category1_id) {
			if($("#category1_" + category1_id).is(":checked") == true) {
				$(".product_id_" + category1_id).attr("checked", true);
			} else if($("#category1_" + category1_id).is(":checked") == false) {
				$(".product_id_" + category1_id).attr("checked", false);
			}
		}
	</script>
</body>
</html>
