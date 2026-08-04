<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php require('inc_header.php'); $memberName="address"; ?>
    <!-- SELECT2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
</head>
<body>
    <?php require('inc_topmenu.php'); ?>

    <!---------- MEMBER ---------->
    <div class="content-padding foot-pad minH">
        <div class="container-fluid">
			<div class="wrap-pad">

                <div class="member-section">
                    <div class="row">
                        <?php require('inc_membermenu.php'); ?>

                        <!---------- MEMBER :: ADDRESS ---------->
                        <div class="col-lg-9 col-md-12 col-12">
                            <div class="row">
                                <div class="col-lg-7 col-md-6 col-8">
                                    <h4>ที่อยู่การจัดส่ง</h4>
                                </div>
                                <div class="col-lg-5 col-md-6 col-4">
                                    <!---------- ADD NEW ADDRESS ---------->
                                    <button type="button" class="button-add" data-toggle="modal" data-target="#addNew"><i class="fas fa-plus-circle"></i>เพิ่มที่อยู่ใหม่</button>

                                    <!-- Modal -->
                                    <div class="modal fade form-modal" id="addNew" data-backdrop="static" data-keyboard="false" aria-labelledby="add-newAdd" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6>เพิ่มที่อยู่ใหม่</h6>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="input-form">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <p>ชื่อ</p>
                                                                <input type="text" id="member_shipping_name" class="form-control shadow-none">
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <p>นามสกุล</p>
                                                                <input type="text" id="member_shipping_surname" class="form-control shadow-none">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <p>เบอร์โทรศัพท์</p>
                                                                <input type="tel" id="member_shipping_tel" class="form-control shadow-none" value="<?php if(!empty($member_menu_inc)) echo $member_menu_inc->member_tel;?>">
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <p>อีเมล์</p>
                                                                <input type="email" id="member_shipping_email" class="form-control shadow-none" value="<?php if(!empty($member_menu_inc)) echo $member_menu_inc->member_email;?>">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <p>ที่อยู่</p>
                                                                <input type="text" id="member_shipping_address" class="form-control shadow-none">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <p>จังหวัด</p> <!-- PROVINCE -->
                                                                <div class="select2-part">
                                                                    <select class="js-example-basic-single form-control" name="member_shipping_province" id="member_shipping_province" onchange="changeProvince(this.value);">
                                                                        <option value="">Please Select</option>
<?php
if(!empty($province)) {
    foreach($province as $r) {
?>
                                                                        <option value="<?php echo $r->id;?>"><?php echo get2Lang($this->session->userdata('lang'), $r->name_in_thai, $r->name_in_english);?></option>
<?php
    }
}
?>
                                                                        <?php /*<option>option 1</option>
                                                                        <option>option 2</option>
                                                                        <option>option 3</option>
                                                                        <option>option 4</option>
                                                                        <option>option 5</option>*/ ?>
                                                                    </select>
                                                                </div>  
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <p>เขต/อำเภอ</p> <!-- DISTRICT -->
                                                                <div class="select2-part">
                                                                    <select class="js-example-basic-single form-control" name="member_shipping_amphur" id="member_shipping_amphur" onchange="changeAmphur(this.value);">
                                                                        <option value="">Please Select</option>
                                                                        
                                                                        <?php /*<option>option 1</option>
                                                                        <option>option 2</option>
                                                                        <option>option 3</option>
                                                                        <option>option 4</option>
                                                                        <option>option 5</option>*/ ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <p>แขวง/ตำบล</p> <!-- SUB-DISTRICT -->
                                                                <div class="select2-part">
                                                                    <select class="js-example-basic-single form-control" name="member_shipping_tumbol" id="member_shipping_tumbol">
                                                                        <option>Please Select</option>
                                                                        
                                                                        <?php /*<option>option 1</option>
                                                                        <option>option 2</option>
                                                                        <option>option 3</option>
                                                                        <option>option 4</option>
                                                                        <option>option 5</option>*/ ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-12">
                                                                <p>รหัสไปรษณีย์</p> <!-- POSTAL CODE -->
                                                                <div class="select2-part">
                                                                    <select class="js-example-basic-single form-control" name="member_shipping_postcode" id="member_shipping_postcode">
                                                                        <option>Please Select</option>
                                                                        
                                                                        <?php /*<option>option 1</option>
                                                                        <option>option 2</option>
                                                                        <option>option 3</option>
                                                                        <option>option 4</option>
                                                                        <option>option 5</option>*/ ?>
                                                                    </select>
                                                                </div> 
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="buttonBK" onclick="saveMemberShipping();">ยืนยัน</button>
                                                    <button type="button" class="buttonBD" data-dismiss="modal">ยกเลิก</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
<?php
if(!empty($rows)) {
    $i = 1;
    foreach($rows as $r) {
        $site_url_status = site_url('frontend/path/changeStatusShipping/'.$r->member_shipping_id);
?>
                            <div class="infoBox">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <h6>ที่อยู่ <?php echo $i;?></h6>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <div class="default-tag"><?php if($r->member_shipping_status == 'ตั้งเป็นที่อยู่หลัก') echo '<a href="'.$site_url_status.'">'.$r->member_shipping_status.'</a>'; else echo $r->member_shipping_status;?></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <ul class="summary-info">
                                            <li><strong><?php echo $r->member_shipping_name;?> <?php echo $r->member_shipping_surname;?></strong></li>
<?php
        if($this->session->userdata('lang') == 'th') {
?>
                                            <li><?php echo $r->member_shipping_address.' '.$this->model_frontend->get_tumbol_record($r->member_shipping_tumbol)->name_in_thai.' '.$this->model_frontend->get_amphur_record($r->member_shipping_amphur)->name_in_thai.' '.$this->model_frontend->get_province_record($r->member_shipping_province)->name_in_thai.' '.$r->member_shipping_postcode;?></li>
<?php
        } elseif($this->session->userdata('lang') == 'en') {
?>
                                            <li><?php echo $r->member_shipping_address.' '.$this->model_frontend->get_tumbol_record($r->member_shipping_tumbol)->name_in_english.' '.$this->model_frontend->get_amphur_record($r->member_shipping_amphur)->name_in_english.' '.$this->model_frontend->get_province_record($r->member_shipping_province)->name_in_english.' '.$r->member_shipping_postcode;?></li>
<?php
        }
?>
                                            <li>เบอร์โทรศัพท์ : <?php echo $r->member_shipping_tel;?></li>
                                            <li>อีเมล์ : <?php echo $r->member_shipping_email;?></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <ul class="edit-option">
                                            <li>
                                                <!-- Button trigger modal :: CHANGE SHIPPING ADDRESS 1 -->
                                                <button type="button" data-toggle="modal" data-target="#changeAdd<?php echo $r->member_shipping_id;?>"><i class="fas fa-pen"></i>แก้ไข</button>
                                            </li>
                                            <li>
                                                <button class="remove" onclick="deleteMemberShipping('<?php echo $r->member_shipping_id;?>');"><i class="fas fa-trash-alt"></i>ลบ</button>
                                            </li>
                                        </ul>
                                        <!-- Modal -->
                                        <div class="modal fade form-modal" id="changeAdd<?php echo $r->member_shipping_id;?>" data-backdrop="static" data-keyboard="false" aria-labelledby="changeName" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6>แก้ไขที่อยู่ <?php echo $i;?></h6>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="input-form">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>ชื่อ</p>
                                                                    <input type="text" id="member_shipping_name_<?php echo $r->member_shipping_id;?>" value="<?php echo $r->member_shipping_name;?>" class="form-control shadow-none">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>นามสกุล</p>
                                                                    <input type="text" id="member_shipping_surname_<?php echo $r->member_shipping_id;?>" value="<?php echo $r->member_shipping_surname;?>" class="form-control shadow-none">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p>เบอร์โทรศัพท์</p>
                                                                    <input type="tel" id="member_shipping_tel_<?php echo $r->member_shipping_id;?>" value="<?php echo $r->member_shipping_tel;?>" class="form-control shadow-none">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p>อีเมล์</p>
                                                                    <input type="email" id="member_shipping_email_<?php echo $r->member_shipping_id;?>" value="<?php echo $r->member_shipping_email;?>" class="form-control shadow-none">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p>ที่อยู่</p>
                                                                    <input type="text" id="member_shipping_address_<?php echo $r->member_shipping_id;?>" value="<?php echo $r->member_shipping_address;?>" class="form-control shadow-none">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>จังหวัด</p> <!-- PROVINCE -->
                                                                    <div class="select2-part">
                                                                        <select class="js-example-basic-single form-control" id="member_shipping_province_<?php echo $r->member_shipping_id;?>" name="member_shipping_province_<?php echo $r->member_shipping_id;?>" onchange="changeProvinceId(this.value, '<?php echo $r->member_shipping_id;?>');">
                                                                            <option value="">Please Select</option>
<?php
if(!empty($province)) {
    foreach($province as $p) {
?>
                                                                            <option value="<?php echo $p->id;?>" <?php if($r->member_shipping_province == $p->id) echo 'selected';?>><?php echo get2Lang($this->session->userdata('lang'), $p->name_in_thai, $p->name_in_english);?></option>
<?php
    }
}
?>
                                                                            <?php /*<option value="">option 1</option>
                                                                            <option>option 2</option>
                                                                            <option>option 3</option>
                                                                            <option>option 4</option>
                                                                            <option>option 5</option>*/ ?>
                                                                        </select>
                                                                    </div>  
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>เขต/อำเภอ</p> <!-- DISTRICT -->
                                                                    <div class="select2-part">
                                                                        <select class="js-example-basic-single form-control" id="member_shipping_amphur_<?php echo $r->member_shipping_id;?>" name="member_shipping_amphur_<?php echo $r->member_shipping_id;?>" onchange="changeAmphurId(this.value, '<?php echo $r->member_shipping_id;?>');">
                                                                            <option>Please Select</option>
<?php
$amphur = $this->model_frontend->get_amphur_result($r->member_shipping_province);
if(!empty($amphur)) {
    foreach($amphur as $a) {
?>
                                                                            <option value="<?php echo $a->id;?>" <?php if($r->member_shipping_amphur == $a->id) echo 'selected';?>><?php echo get2Lang($this->session->userdata('lang'), $a->name_in_thai, $a->name_in_english);?></option>
<?php
    }
}
?>
                                                                            <?php /*<option>option 1</option>
                                                                            <option>option 2</option>
                                                                            <option>option 3</option>
                                                                            <option>option 4</option>
                                                                            <option>option 5</option>*/ ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>แขวง/ตำบล</p> <!-- SUB-DISTRICT -->
                                                                    <div class="select2-part">
                                                                        <select class="js-example-basic-single form-control" id="member_shipping_tumbol_<?php echo $r->member_shipping_id;?>" name="member_shipping_tumbol_<?php echo $r->member_shipping_id;?>">
                                                                            <option>Please Select</option>
<?php
$tumbol = $this->model_frontend->get_tumbol_result($r->member_shipping_amphur);
if(!empty($tumbol)) {
    foreach($tumbol as $t) {
?>
                                                                            <option value="<?php echo $t->id;?>" <?php if($r->member_shipping_tumbol == $t->id) echo 'selected';?>><?php echo get2Lang($this->session->userdata('lang'), $t->name_in_thai, $t->name_in_english);?></option>
<?php
    }
}
?>     
                                                                            <?php /*<option>option 1</option>
                                                                            <option>option 2</option>
                                                                            <option>option 3</option>
                                                                            <option>option 4</option>
                                                                            <option>option 5</option>*/ ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>รหัสไปรษณีย์</p> <!-- POSTAL CODE -->
                                                                    <div class="select2-part">
                                                                        <select class="js-example-basic-single form-control" id="member_shipping_postcode_<?php echo $r->member_shipping_id;?>" name="member_shipping_postcode_<?php echo $r->member_shipping_id;?>">
                                                                            <option>Please Select</option>
<?php
$zipcode = $this->model_frontend->get_postcode_result($r->member_shipping_amphur);
if(!empty($zipcode)) {
    foreach($zipcode as $z) {
?>
                                                                            <option value="<?php echo $z->zip_code;?>" <?php if($r->member_shipping_postcode == $z->zip_code) echo 'selected';?>><?php echo $z->zip_code;?></option>
<?php
    }
}
?>                                                         
                                                                            <?php /*<option>option 1</option>
                                                                            <option>option 2</option>
                                                                            <option>option 3</option>
                                                                            <option>option 4</option>
                                                                            <option>option 5</option>*/ ?>
                                                                        </select>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="buttonBK" onclick="saveMemberShipingID('<?php echo $r->member_shipping_id;?>')">ยืนยัน</button>
                                                        <button type="button" class="buttonBD" data-dismiss="modal">ยกเลิก</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
<?php
        $i++;
    }
}
?>
                            <?php /*<div class="infoBox">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <h6>ที่อยู่ 2</h6>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <button class="default-tag">ตั้งเป็นที่อยู่หลัก</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <ul class="summary-info">
                                            <li><strong>ช็อปสินค้า ศรีไทย</strong></li>
                                            <li>37/2 ถนนสุทธิสารวินิจฉัย แขวงสามเสนนอก เขตห้วยขวาง กรุงเทพฯ 10320</li>
                                            <li>เบอร์โทรศัพท์ : 081-234-5678</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <ul class="edit-option">
                                            <li>
                                                <!-- Button trigger modal :: CHANGE SHIPPING ADDRESS 1 -->
                                                <button type="button" data-toggle="modal" data-target="#changeAdd2"><i class="fas fa-pen"></i>แก้ไข</button>
                                            </li>
                                            <li>
                                                <button class="remove"><i class="fas fa-trash-alt"></i>ลบ</button>
                                            </li>
                                        </ul>
                                        <!-- Modal -->
                                        <div class="modal fade form-modal" id="changeAdd2" data-backdrop="static" data-keyboard="false" aria-labelledby="changeName" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6>แก้ไขที่อยู่ 2</h6>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="input-form">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>ชื่อ</p>
                                                                    <input type="text" class="form-control shadow-none">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>นามสกุล</p>
                                                                    <input type="text" class="form-control shadow-none">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p>เบอร์โทรศัพท์</p>
                                                                    <input type="tel" class="form-control shadow-none">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p>ที่อยู่</p>
                                                                    <input type="text" class="form-control shadow-none">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>จังหวัด</p> <!-- PROVINCE -->
                                                                    <div class="select2-part">
                                                                        <select class="js-example-basic-single form-control" name="deliveryTo">
                                                                            <option>เลือก</option>
                                                                            <option>option 1</option>
                                                                            <option>option 2</option>
                                                                            <option>option 3</option>
                                                                            <option>option 4</option>
                                                                            <option>option 5</option>
                                                                        </select>
                                                                    </div>  
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>รหัสไปรษณีย์</p> <!-- POSTAL CODE -->
                                                                    <div class="select2-part">
                                                                        <select class="js-example-basic-single form-control" name="deliveryTo">
                                                                            <option>เลือก</option>
                                                                            <option>option 1</option>
                                                                            <option>option 2</option>
                                                                            <option>option 3</option>
                                                                            <option>option 4</option>
                                                                            <option>option 5</option>
                                                                        </select>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>เขต/อำเภอ</p> <!-- DISTRICT -->
                                                                    <div class="select2-part">
                                                                        <select class="js-example-basic-single form-control" name="deliveryTo">
                                                                            <option>เลือก</option>
                                                                            <option>option 1</option>
                                                                            <option>option 2</option>
                                                                            <option>option 3</option>
                                                                            <option>option 4</option>
                                                                            <option>option 5</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>แขวง/ตำบล</p> <!-- SUB-DISTRICT -->
                                                                    <div class="select2-part">
                                                                        <select class="js-example-basic-single form-control" name="deliveryTo">
                                                                            <option>เลือก</option>
                                                                            <option>option 1</option>
                                                                            <option>option 2</option>
                                                                            <option>option 3</option>
                                                                            <option>option 4</option>
                                                                            <option>option 5</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="buttonBK">ยืนยัน</button>
                                                        <button type="button" class="buttonBD" data-dismiss="modal">ยกเลิก</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>*/ ?>

                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    <?php require('inc_footer.php'); ?>

    <!-- SELECT2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

        function changeProvince(province_id) {
            $.post('<?php echo site_url("frontend/path/ajaxChangeProvince");?>', { province_id: province_id }, function(data) {
                $("#member_shipping_amphur").html(data);
            });
        }

        function changeAmphur(amphur_id) {
            $.post('<?php echo site_url("frontend/path/ajaxChangeAmphur");?>', { amphur_id: amphur_id }, function(data) {
                var data_split = data.split('!@#$%^&*()');
                
                $("#member_shipping_tumbol").html(data_split[0]);
                $("#member_shipping_postcode").html(data_split[1]);
            });
        }

        function saveMemberShipping() {
            if($("#member_shipping_name").val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณากรอกชื่อ', 'Please Enter Name');?>');

                $("#member_shipping_name").focus();
            }/* else if($("#member_shipping_surname").val() == '') {
                alert('Please Select Surname');

                $("#member_shipping_surname").focus();
            }*/ else if($("#member_shipping_tel").val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณากรอกเบอร์โทรศัพท์', 'Please Enter Tel');?>');

                $("#member_shipping_tel").focus();
            } else if($("#member_shipping_email").val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณากรอกอีเมล์', 'Please Enter Email');?>');

                $("#member_shipping_email").focus();
            } else if(!isEmail($("#member_shipping_email").val())) {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'รูปแบบอีเมล์ไม่ถูกต้อง', 'Incorrect Email');?>');

                $("#member_shipping_email").val('');
                $("#member_shipping_email").focus();
            } else if($("#member_shipping_address").val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณากรอกที่อยู่', 'Please Enter Address');?>');

                $("#member_shipping_address").focus();
            } else if($("#member_shipping_province").val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณาเลือกจังหวัด', 'Please Select Province');?>');

                $("#member_shipping_province").focus();
            } else if($("#member_shipping_amphur").val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณาเลือกเขต/อำเภอ', 'Please Select Amphur');?>');

                $("#member_shipping_amphur").focus();
            } else if($("#member_shipping_tumbol").val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณาเลือกแขวง/ตำบล', 'Please Select Tumbol');?>');

                $("#member_shipping_tumbol").focus();
            } else if($("#member_shipping_postcode").val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณาเลือกรหัสไปรษณีย์', 'Please Select Postcode');?>');

                $("#member_shipping_postcode").focus();
            } else {
                $.post('<?php echo site_url("frontend/path/ajaxSaveMemberShipping");?>', { member_shipping_name: $("#member_shipping_name").val(), member_shipping_surname: $("#member_shipping_surname").val(), member_shipping_tel: $("#member_shipping_tel").val(), member_shipping_email: $("#member_shipping_email").val(), member_shipping_address: $("#member_shipping_address").val(), member_shipping_province: $("#member_shipping_province").val(), member_shipping_amphur: $("#member_shipping_amphur").val(), member_shipping_tumbol: $("#member_shipping_tumbol").val(), member_shipping_postcode: $("#member_shipping_postcode").val() }, function(data) {
                    window.location.href = '<?php echo site_url('member_address');?>';
                });
            }
        }

        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }

        function changeProvinceId(province_id, member_shipping_id) {
            $.post('<?php echo site_url('frontend/path/ajaxChangeProvinceId');?>', { province_id: province_id, member_shipping_id: member_shipping_id }, function(data) {
                $("#member_shipping_amphur_" + member_shipping_id).html(data);
            });
        }

        function changeAmphurId(amphur_id, member_shipping_id) {
            $.post('<?php echo site_url('frontend/path/ajaxChangeAmphurId');?>', { amphur_id: amphur_id, member_shipping_id: member_shipping_id }, function(data) {
                var data_split = data.split('!@#$%^&*()');

                $("#member_shipping_tumbol_" + member_shipping_id).html(data_split[0]);
                $("#member_shipping_postcode_" + member_shipping_id).html(data_split[1]);
            });
        }

        function saveMemberShipingID(member_shipping_id) {
            if($("#member_shipping_name_" + member_shipping_id).val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณากรอกชื่อ', 'Please Enter Name');?>');

                $("#member_shipping_name_" + member_shipping_id).focus();
            }/* else if($("#member_shipping_surname_" + member_shipping_id).val() == '') {
                alert('Please Select Surname');

                $("#member_shipping_surname_" + member_shipping_id).focus();
            }*/ else if($("#member_shipping_tel_" + member_shipping_id).val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณากรอกเบอร์โทรศัพท์', 'Please Enter Tel');?>');

                $("#member_shipping_tel_" + member_shipping_id).focus();
            } else if($("#member_shipping_email_" + member_shipping_id).val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณากรอกอีเมล์', 'Please Enter Email');?>');

                $("#member_shipping_email_" + member_shipping_id).focus();
            } else if(!isEmail($("#member_shipping_email_" + member_shipping_id).val())) {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'รูปแบบอีเมล์ไม่ถูกต้อง', 'Incorrect Email');?>');

                $("#member_shipping_email_" + member_shipping_id).val('');
                $("#member_shipping_email_" + member_shipping_id).focus();
            } else if($("#member_shipping_address_" + member_shipping_id).val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณากรอกที่อยู่', 'Please Enter Address');?>');

                $("#member_shipping_address_" + member_shipping_id).focus();
            } else if($("#member_shipping_province_" + member_shipping_id).val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณาเลือกจังหวัด', 'Please Select Province');?>');

                $("#member_shipping_province_" + member_shipping_id).focus();
            } else if($("#member_shipping_amphur_" + member_shipping_id).val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณาเลือกเขต/อำเภอ', 'Please Select Amphur');?>');

                $("#member_shipping_amphur_" + member_shipping_id).focus();
            } else if($("#member_shipping_tumbol_" + member_shipping_id).val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณาเลือกแขวง/ตำบล', 'Please Select Tumbol');?>');

                $("#member_shipping_tumbol_" + member_shipping_id).focus();
            } else if($("#member_shipping_postcode_" + member_shipping_id).val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณาเลือกรหัสไปรษณีย์', 'Please Select Postcode');?>');

                $("#member_shipping_postcode_" + member_shipping_id).focus();
            } else {
                $.post('<?php echo site_url("frontend/path/ajaxSaveMemberShippingId");?>', { member_shipping_id: member_shipping_id, member_shipping_name: $("#member_shipping_name_" + member_shipping_id).val(), member_shipping_surname: $("#member_shipping_surname_" + member_shipping_id).val(), member_shipping_tel: $("#member_shipping_tel_" + member_shipping_id).val(), member_shipping_email: $("#member_shipping_email_" + member_shipping_id).val(), member_shipping_address: $("#member_shipping_address_" + member_shipping_id).val(), member_shipping_province: $("#member_shipping_province_" + member_shipping_id).val(), member_shipping_amphur: $("#member_shipping_amphur_" + member_shipping_id).val(), member_shipping_tumbol: $("#member_shipping_tumbol_" + member_shipping_id).val(), member_shipping_postcode: $("#member_shipping_postcode_" + member_shipping_id).val() }, function(data) {
                    window.location.href = '<?php echo site_url('member_address');?>';
                });
            }
        }

        function deleteMemberShipping(member_shipping_id) {
            if(confirm('Confirm Delete') == true) { 
                window.location.href = '<?php echo site_url("frontend/path/delete_member_shipping");?>/' + member_shipping_id; 
            }
        }
    </script>

</body>
</html>