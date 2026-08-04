<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php require('inc_header.php'); ?>
    <!-- SELECT2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
</head>
<body>
    <?php require('inc_topmenu.php'); ?>

    <!---------- SHIPPING & PAYMENT ---------->
    <div class="content-padding foot-pad">
        <div class="container-fluid">
            <div class="wrap-pad">
                <div class="row">
                    <div class="col">
                        <h2>การจัดส่งสินค้า & การชำระเงิน</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 col-12">
                        <!---------- SHIPPING ADDRESS ---------->
                        <div class="row">
                            <div class="col">
                                <div class="headerBK">
                                    <div class="headerBK-topic">ที่อยู่สำหรับจัดส่ง</div>
                                </div>
                            </div>
                        </div>
                        <div align="right"><a href="<?php echo site_url('member_address');?>"><button type="button" class="button-add"><i class="fas fa-plus-circle"></i>เพิ่มที่อยู่ใหม่</button></a></div>
                        <div class="row">
                            <div class="col">
                                <div class="shipping-option">
                                    <div class="accordion">
                                        <!-- ADDRESS (Default) -->
<?php
if(!empty($shipping_address)) {
?>
                                        <div class="row">
                                            <div class="col">
                                                <div class="md-radio md-radio-inline radiocheck">
                                                    <input id="shipping_default" type="radio" name="address-group" <?php if(!empty($shipping_address)) echo 'checked'; else echo 'disabled';?> onclick="clickNewAddress('<?php echo $shipping_address->member_shipping_id;?>');" value="<?php echo $shipping_address->member_shipping_id;?>" />
                                                    <label for="shipping_default">
                                                        <p>
                                                        <?php 
                                                            if(!empty($shipping_address)) { 
                                                        ?>
                                                            <strong><?php echo $shipping_address->member_shipping_name.' '.$shipping_address->member_shipping_surname;?><span>(ที่อยู่ตั้งต้น)</span></strong>
                                                        <?php 
                                                            } else {
                                                        ?>
                                                            <span>(ที่อยู่ตั้งต้น)</span>    
                                                        <?php
                                                            } 
                                                        ?>
                                                        </p>
                                                    </label>
                                                    <div class="accBDbottom">
                                                        <div class="form-input all_address" id="address_<?php echo $shipping_address->member_shipping_id;?>">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="txt-content">
                                                                        <p>
<?php
    if($this->session->userdata('lang') == 'th') {
        echo $shipping_address->member_shipping_email.'<br>'.$shipping_address->member_shipping_address.' '.$this->model_frontend->get_tumbol_record($shipping_address->member_shipping_tumbol)->name_in_thai.' '.$this->model_frontend->get_amphur_record($shipping_address->member_shipping_amphur)->name_in_thai.' '.$this->model_frontend->get_province_record($shipping_address->member_shipping_province)->name_in_thai.' '.$shipping_address->member_shipping_postcode;
    } elseif($this->session->userdata('lang') == 'en') {
        echo $shipping_address->member_shipping_email.'<br>'.$shipping_address->member_shipping_address.' '.$this->model_frontend->get_tumbol_record($shipping_address->member_shipping_tumbol)->name_in_english.' '.$this->model_frontend->get_amphur_record($shipping_address->member_shipping_amphur)->name_in_english.' '.$this->model_frontend->get_province_record($shipping_address->member_shipping_province)->name_in_english.' '.$shipping_address->member_shipping_postcode;
    }
?>
                                                                        </p>
                                                                        <p>เบอร์โทรศัพท์ : <?php if(!empty($shipping_address)) { echo $shipping_address->member_shipping_tel; } ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
<?php
}

if(!empty($shipping_payment_not_default)) {
    foreach($shipping_payment_not_default as $spnd) {
?>
                                        <!-- ADD NEW ADDRESS -->
                                        <div class="row">
                                            <div class="col">
                                                <div class="md-radio md-radio-inline radiocheck">
                                                    <input id="shipping_new_<?php echo $spnd->member_shipping_id;?>" type="radio" name="address-group" class="shipping_new" value="<?php echo $spnd->member_shipping_id;?>" onclick="clickNewAddress('<?php echo $spnd->member_shipping_id;?>');" />
                                                    <label for="shipping_new_<?php echo $spnd->member_shipping_id;?>">
                                                        <p><strong><?php echo $spnd->member_shipping_name.' '.$spnd->member_shipping_surname;?></strong></p> 
                                                    </label>
                                                    <div>
                                                        <div class="accBDbottom">
                                                            <div class="form-input all_address" id="address_<?php echo $spnd->member_shipping_id;?>" style="display:none;">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="txt-content">
                                                                            <p>
<?php
        if($this->session->userdata('lang') == 'th') {
            echo $spnd->member_shipping_email.'<br>'.$spnd->member_shipping_address.' '.$this->model_frontend->get_tumbol_record($spnd->member_shipping_tumbol)->name_in_thai.' '.$this->model_frontend->get_amphur_record($spnd->member_shipping_amphur)->name_in_thai.' '.$this->model_frontend->get_province_record($spnd->member_shipping_province)->name_in_thai.' '.$spnd->member_shipping_postcode;
        } elseif($this->session->userdata('lang') == 'en') {
            echo $spnd->member_shipping_email.'<br>'.$spnd->member_shipping_address.' '.$this->model_frontend->get_tumbol_record($spnd->member_shipping_tumbol)->name_in_english.' '.$this->model_frontend->get_amphur_record($spnd->member_shipping_amphur)->name_in_english.' '.$this->model_frontend->get_province_record($spnd->member_shipping_province)->name_in_english.' '.$spnd->member_shipping_postcode;
        }
?>
                                                                            </p>
                                                                            <p>เบอร์โทรศัพท์ : <?php if(!empty($shipping_address)) { echo $spnd->member_shipping_tel; } ?></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php /*<section>
                                                        <div class="accBDbottom none-bottomBD">
                                                            <div class="input-form">
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-md-6 col-12">
                                                                        <p>ชื่อ</p>
                                                                        <input type="text" id="order_name_<?php echo $spnd->member_shipping_id;?>" class="form-control" value="<?php echo $spnd->member_shipping_name;?>">
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-12">
                                                                        <p>นามสกุล</p>
                                                                        <input type="text" id="order_surname_<?php echo $spnd->member_shipping_id;?>" class="form-control" value="<?php echo $spnd->member_shipping_surname;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-md-6 col-12">
                                                                        <p>เบอร์โทรศัพท์</p>
                                                                        <input type="tel" id="order_tel_<?php echo $spnd->member_shipping_id;?>" class="form-control" value="<?php echo $spnd->member_shipping_tel;?>">
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-12">
                                                                        <p>อีเมล์</p>
                                                                        <input type="email" id="order_email_<?php echo $spnd->member_shipping_id;?>" class="form-control" value="<?php echo $spnd->member_shipping_email;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p>ที่อยู่</p>
                                                                        <input type="text" id="order_address_<?php echo $spnd->member_shipping_id;?>" class="form-control" value="<?php echo $spnd->member_shipping_address;?>">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-md-6 col-12">
                                                                        <p>จังหวัด</p> <!-- PROVINCE -->
                                                                        <div class="select2-part">
                                                                            <select class="js-example-basic-single form-control" name="order_province" id="order_province_<?php echo $spnd->member_shipping_id;?>" onchange="changeProvince(this.value, '<?php echo $spnd->member_shipping_id;?>');">
                                                                                <option value="">Please Select</option>
<?php
if(!empty($province)) {
    foreach($province as $r) {
?>
                                                                                <option value="<?php echo $r->id;?>" <?php if($r->id == $spnd->member_shipping_province) echo 'selected';?>><?php echo get2Lang($this->session->userdata('lang'), $r->name_in_thai, $r->name_in_english);?></option>
<?php
    }
}
?>
                                                                                <?php /*<option>option 1</option>
                                                                                <option>option 2</option>
                                                                                <option>option 3</option>
                                                                                <option>option 4</option>
                                                                                <option>option 5</option>*/ ?>
                                                                            <?php /*</select>
                                                                        </div>  
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-12">
                                                                        <p>เขต / อำเภอ</p> <!-- DISTRICT -->
                                                                        <div class="select2-part">
                                                                            <select class="js-example-basic-single form-control" id="order_amphur_<?php echo $spnd->member_shipping_id;?>" name="order_amphur" onchange="changeAmphur(this.value, '<?php echo $spnd->member_shipping_id;?>');">
                                                                                <option value="">Please Select</option>
<?php
//if($this->session->userdata('shipping_type') == 'new') {
    $this->db->where('province_id', $spnd->member_shipping_province);
    $this->db->order_by('id', 'asc');
    $query = $this->db->get('districts');

    $rows = $query->result();

    if(!empty($rows)) {
        foreach($rows as $r) {
?>
                                                                                <option value="<?php echo $r->id;?>" <?php if($r->id == $spnd->member_shipping_amphur) echo 'selected';?>><?php echo get2Lang($this->session->userdata('lang'), $r->name_in_thai, $r->name_in_english);?></option>
<?php
        }
    }
//}
?>
                                                                                <?php /*<option>option 1</option>
                                                                                <option>option 2</option>
                                                                                <option>option 3</option>
                                                                                <option>option 4</option>
                                                                                <option>option 5</option>*/ ?>
                                                                            <?php /*</select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-md-6 col-12">
                                                                        <p>แขวง / ตำบล</p> <!-- SUB-DISTRICT -->
                                                                        <div class="select2-part">
                                                                            <select class="js-example-basic-single form-control" id="order_tumbol_<?php echo $spnd->member_shipping_id;?>" name="order_tumbol">
                                                                                <option value="">Please Select</option>
<?php
//if($this->session->userdata('shipping_type') == 'new') {
    $this->db->where('district_id', $spnd->member_shipping_amphur);
    $this->db->order_by('id', 'asc');
    $query = $this->db->get('subdistricts');

    $rows = $query->result();

    if(!empty($rows)) {
        foreach($rows as $r) {
?>
                                                                                <option value="<?php echo $r->id;?>" <?php if($r->id == $spnd->member_shipping_tumbol) echo 'selected';?>><?php echo get2Lang($this->session->userdata('lang'), $r->name_in_thai, $r->name_in_english);?></option>
<?php
        }
    }
//}
?>                                                                                
                                                                                <?php /*<option>option 1</option>
                                                                                <option>option 2</option>
                                                                                <option>option 3</option>
                                                                                <option>option 4</option>
                                                                                <option>option 5</option>*/ ?>
                                                                            <?php /*</select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-12">
                                                                        <p>รหัสไปรษณีย์</p> <!-- POSTAL CODE -->
                                                                        <div class="select2-part">
                                                                            <select class="js-example-basic-single form-control" id="order_postcode_<?php echo $spnd->member_shipping_id;?>" name="order_postcode">
                                                                                <option value="">Please Select</option>
<?php
//if($this->session->userdata('shipping_type') == 'new') {
    $this->db->where('district_id', $spnd->member_shipping_amphur);
    $this->db->order_by('id', 'asc');
    $this->db->group_by('zip_code');
    $query = $this->db->get('subdistricts');

    $rows = $query->result();

    if(!empty($rows)) {
        foreach($rows as $r) {
?>
                                                                                <option value="<?php echo $r->zip_code;?>" <?php if($spnd->member_shipping_postcode == $r->zip_code) echo 'selected';?>><?php echo $r->zip_code;?></option>
<?php
        }
    }
//}
?> 
                                                                                <?php /*<option>option 1</option>
                                                                                <option>option 2</option>
                                                                                <option>option 3</option>
                                                                                <option>option 4</option>
                                                                                <option>option 5</option>*/ ?>
                                                                            <?php /*</select>
                                                                        </div> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section> */?>
                                                </div>
                                            </div>
                                        </div>
<?php
    }
}
?>
                                    </div>

                                    <!-- BILLING ADDRESS -->
                                    <div class="row">
                                        <div class="col">
                                            <div class="billing-section">
                                                <div class="row">
                                                    <div class="col-10">ที่อยู่ขอใบเสร็จ/ใบกำกับภาษี</div>
                                                    <!-- SWITCH BUTTON -->
                                                    <div class="col-2">
                                                        <div class="checkboxsw">
                                                            <input type="checkbox" id="switch" name="switch" value="Yes" <?php if($this->session->userdata('switch') == 'Yes') echo 'checked';?> /><label for="switch"></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="box01" <?php if($this->session->userdata('switch') == 'Yes') echo 'style="display: block;"';?>>
                                                    <div class="accBDbottom noneBD none-bottomBD">
                                                        <div class="input-form">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>ชื่อ</p>
                                                                    <input type="text" name="order_billing_name" id="order_billing_name" class="form-control" value="<?php echo $this->session->userdata('order_billing_name');?>">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>นามสกุล</p>
                                                                    <input type="text" name="order_billing_surname" id="order_billing_surname" class="form-control" value="<?php echo $this->session->userdata('order_billing_surname');?>">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p>เลขที่ผู้เสียภาษี</p>
                                                                    <input type="text" name="order_billing_card_id" id="order_billing_card_id" class="form-control" value="<?php echo $this->session->userdata('order_billing_card_id');?>">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>เบอร์โทรศัพท์</p>
                                                                    <input type="tel" name="order_billing_tel" id="order_billing_tel" class="form-control" value="<?php echo $this->session->userdata('order_billing_tel');?>">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>อีเมล์</p>
                                                                    <input type="email" name="order_billing_email" id="order_billing_email" class="form-control" value="<?php echo $this->session->userdata('order_billing_email');?>">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p>ที่อยู่</p>
                                                                    <input type="text" name="order_billing_address" id="order_billing_address" class="form-control" value="<?php echo $this->session->userdata('order_billing_address');?>">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>จังหวัด</p> <!-- PROVINCE -->
                                                                    <div class="select2-part">
                                                                        <select class="js-example-basic-single form-control"  name="order_billing_province" id="order_billing_province" onchange="changeProvinceBilling(this.value);">
                                                                            <option value="">Please Select</option>
<?php
if(!empty($province)) {
    foreach($province as $r) {
?>
                                                                                <option value="<?php echo $r->id;?>" <?php if($this->session->userdata('shipping_type') == 'new' and $r->id == $this->session->userdata('order_billing_province')) echo 'selected';?>><?php echo get2Lang($this->session->userdata('lang'), $r->name_in_thai, $r->name_in_english);?></option>
<?php
    }
}
?>
                                                                        </select>
                                                                    </div>  
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>เขต / อำเภอ</p> <!-- POSTAL CODE -->
                                                                    <div class="select2-part">
                                                                        <select class="js-example-basic-single form-control"  name="order_billing_amphur" id="order_billing_amphur" onchange="changeAmphurBilling(this.value);">
                                                                            <option value="">Please Select</option>
<?php
if($this->session->userdata('switch') == 'Yes') {
    $this->db->where('province_id', $this->session->userdata('order_billing_province'));
    $this->db->order_by('id', 'asc');
    $query = $this->db->get('districts');

    $rows = $query->result();

    if(!empty($rows)) {
        foreach($rows as $r) {
?>
                                                                            <option value="<?php echo $r->id;?>" <?php if($this->session->userdata('order_billing_amphur') == $r->id) echo 'selected';?>><?php echo get2Lang($this->session->userdata('lang'), $r->name_in_thai, $r->name_in_english);?></option>
<?php
        }
    }
}
?>
                                                                        </select>
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>แขวง / ตำบล</p> <!-- DISTRICT -->
                                                                    <div class="select2-part">
                                                                        <select class="js-example-basic-single form-control"  name="order_billing_tumbol" id="order_billing_tumbol">
                                                                            <option value="">Please Select</option>
<?php
if($this->session->userdata('switch') == 'Yes') {
    $this->db->where('district_id', $this->session->userdata('order_billing_amphur'));
    $this->db->order_by('id', 'asc');
    $query = $this->db->get('subdistricts');

    $rows = $query->result();

    if(!empty($rows)) {
        foreach($rows as $r) {
?>
                                                                                <option value="<?php echo $r->id;?>" <?php if($this->session->userdata('order_billing_tumbol') == $r->id) echo 'selected';?>><?php echo get2Lang($this->session->userdata('lang'), $r->name_in_thai, $r->name_in_english);?></option>
<?php
        }
    }
}
?>                                                                                
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-12">
                                                                    <p>รหัสไปรษณีย์</p> <!-- SUB-DISTRICT -->
                                                                    <div class="select2-part">
                                                                        <select class="js-example-basic-single form-control" name="order_billing_postcode" id="order_billing_postcode">
                                                                            <option value="">Please Select</option>
                                                                            <?php
if($this->session->userdata('switch') == 'Yes') {
    $this->db->where('district_id', $this->session->userdata('order_billing_amphur'));
    $this->db->order_by('id', 'asc');
    $this->db->group_by('zip_code');
    $query = $this->db->get('subdistricts');

    $rows = $query->result();

    if(!empty($rows)) {
        foreach($rows as $r) {
?>
                                                                                <option value="<?php echo $r->zip_code;?>" <?php if($this->session->userdata('order_billing_postcode') == $r->zip_code) echo 'selected';?>><?php echo $r->zip_code;?></option>
<?php
        }
    }
}
?>                                                     
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="input-form">
                                                <p>หมายเหตุ (ถ้ามี)</p>
                                                <textarea class="form-control mb-0" name="order_note" id="order_note"><?php echo $this->session->userdata('order_note');?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!---------- SHIPPING METHOD ---------->
                        <div class="row">
                            <div class="col">
                                <div class="headerBK">
                                    <div class="headerBK-topic">วิธีการจัดส่ง</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="shipping-option shipped-section">
                                    <div class="accordion">
                                        <!-- SHIPPING 1 -->
                                        <div class="row">
                                            <div class="col">
                                                <div class="md-radio md-radio-inline radiocheck mb-0">
                                                    <input id="shipping_express" type="radio" name="shipping-group" <?php if($this->session->userdata('shipping_type') == 'new' and $this->session->userdata('order_shipping_method') == 'Express') echo 'checked';?> checked />
                                                    <label for="shipping_express">
                                                        <div class="row">
                                                            <div class="col-lg-9 col-md-10 col-8">
                                                                <p><strong>Standard Delivery - ส่งแบบธรรมดา</strong></p>
                                                                <div class="txt-content f-14">
                                                                    <p>จัดส่งสินค้าภายใน 3-7 วันทำการ หลังจากสั่งซื้อสินค้า</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-md-2 col-4">THB <?php echo number_format($this->session->userdata('order_shipping'), 0, '.', ',');?></div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>  
                                        <!-- SHIPPING 2 -->
                                        <?php /*<div class="row">
                                            <div class="col">
                                                <div class="md-radio md-radio-inline radiocheck">
                                                    <input id="shipping_normal" type="radio" name="shipping-group" <?php if($this->session->userdata('shipping_type') == 'new' and $this->session->userdata('order_shipping_method') == 'Normal') echo 'checked';?> />
                                                    <label for="shipping_normal">
                                                        <div class="row">
                                                            <div class="col-lg-9 col-md-10 col-8">
                                                                <p><strong>จัดส่งแบบธรรมดา</strong></p>
                                                                <div class="txt-content f-14">
                                                                    <p>จัดส่งสินค้าภายใน 7-10 วันทำการ หลังจากสั่งซื้อสินค้า</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-md-2 col-4">THB 70</div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>*/ ?> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!---------- PAYMENT METHOD ---------->
                        <div class="row">
                            <div class="col">
                                <div class="headerBK">
                                    <div class="headerBK-topic">วิธีการชำระเงิน</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="shipping-option mb-2">
                                    <div class="accordion">
                                        <!-- PAYMENT 1 -->
                                        <div class="row">
                                            <div class="col">
                                                <div class="md-radio md-radio-inline radiocheck">
                                                    <input id="credit_card" type="radio" name="payment-group" <?php if($this->session->userdata('shipping_type') == 'new' and $this->session->userdata('order_payment_method') == 'Credit Card') echo 'checked';?> />
                                                    <label for="credit_card">
                                                        <p><strong>ชำระเงินผ่านบัตรเครดิต</strong></p>
                                                    </label>
                                                    <?php /*<section>
                                                        <div class="accBDbottom">
                                                            <div class="input-form">
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-md-6 col-12">
                                                                        <p>ประเภทบัตรเครดิต</p>
                                                                        <select class="form-select">
                                                                            <option selected>เลือก</option>
                                                                            <option value="1">option 1</option>
                                                                            <option value="2">option 2</option>
                                                                            <option value="3">option 3</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-12">
                                                                        <p>ชื่อผู้ถือบัตร</p>
                                                                        <input type="text" class="form-control shadow-none">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-md-12 col-12">
                                                                        <p>หมายเลขบัตรเครดิต</p>
                                                                        <input type="text" class="form-control shadow-none">
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-6 col-12">
                                                                        <p>วันหมดอายุ</p>
                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <input type="text" class="form-control shadow-none" placeholder="MM">
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <input type="text" class="form-control shadow-none" placeholder="YY">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-3 col-md-6 col-12">
                                                                        <p>CCV</p>
                                                                        <input type="text" class="form-control shadow-none">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </section>*/ ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- PAYMENT 2 -->
                                        <div class="row">
                                            <div class="col">
                                                <div class="md-radio md-radio-inline radiocheck mb-0">
                                                    <input id="bank_transfer" type="radio" name="payment-group" <?php if($this->session->userdata('shipping_type') == 'new' and $this->session->userdata('order_payment_method') == 'Bank Transfer') echo 'checked';?> />
                                                    <label for="bank_transfer">
                                                        <p><strong>โอนเงินผ่านธนาคาร</strong></p>
                                                    </label>
                                                    <section>
                                                        <div class="accBDbottom none-bottomBD">
                                                            <div class="bank-info">
                                                                <?php /*<div class="row">
                                                                    <div class="col-lg-2 col-md-2 col-3">
                                                                        <div class="img-width"><img src="<?php echo base_url('asset/frontend/images/payment/B-kbank.jpg');?>"></div> 
                                                                    </div>
                                                                    <div class="col-lg-10 col-md-10 col-9">
                                                                        <div class="row">
                                                                            <div class="col-xl-4 col-lg-12 col-md-4 col-12">
                                                                                <p>ธนาคารกสิกรไทย</p>
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-12 col-md-4 col-12">
                                                                                <p>บมจ. ศรีไทยซุปเปอร์แวร์</p>
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-12 col-md-4 col-12">
                                                                                <p>000-0-00000-0</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-2 col-md-2 col-3">
                                                                        <div class="img-width"><img src="<?php echo base_url('asset/frontend/images/payment/B-scb.jpg');?>"></div> 
                                                                    </div>
                                                                    <div class="col-lg-10 col-md-10 col-9">
                                                                        <div class="row">
                                                                            <div class="col-xl-4 col-lg-12 col-md-4 col-12">
                                                                                <p>ธนาคารไทยพาณิชย์</p>
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-12 col-md-4 col-12">
                                                                                <p>บมจ. ศรีไทยซุปเปอร์แวร์</p>
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-12 col-md-4 col-12">
                                                                                <p>000-0-00000-0</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>*/ ?>
<?php
if(!empty($bank)) {
    foreach($bank as $b) {
?>
                                                                <div class="row">
                                                                    <div class="col-lg-2 col-md-2 col-3">
                                                                        <div class="img-width"><img src="<?php echo base_url('uploads/bank/'.$b->bank_image);?>"></div> 
                                                                    </div>
                                                                    <div class="col-lg-10 col-md-10 col-9">
                                                                        <div class="row">
                                                                            <div class="col-xl-4 col-lg-12.double-borderBox{ col-md-4 col-12">
                                                                                <p><?php echo get2Lang($this->session->userdata('lang'), $b->bank_name_th, $b->bank_name_en);?></p>
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-12 col-md-4 col-12">
                                                                                <p><?php echo get2Lang($this->session->userdata('lang'), $b->bank_company_th, $b->bank_company_en);?> <?php echo get2Lang($this->session->userdata('lang'), $b->bank_branch_th, $b->bank_branch_en);?></p>
                                                                            </div>
                                                                            <div class="col-xl-4 col-lg-12 col-md-4 col-12">
                                                                                <p><?php echo $b->bank_account_no;?></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
<?php
    }
}
?>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!---------- ORDER SUMMARY ---------->
                    <div class="col-lg-4 col-12">
                        <div class="summaryBox">
                        <div class="row">
                                <div class="col">
                                    <h4>สรุปรายการสินค้า</h4>
                                </div>
                            </div>

                            <!-- ORDER SUMMARY :: PRODUCT -->
<?php
$sub_total = 0;
foreach($this->cart->contents() as $items) {
    $price = $items['price'] * $items['qty'];
    $sub_total += $price;

    if($items['options']['promotion_get_set'] == true) {
        $path = 'get_set';
    } else {
        $path = 'product';
    }
?>
                            <div class="summary-product-section ">
                                <div class="summary-product">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-3 col-4">
                                            <div class="img-width"><img src="<?php echo base_url('uploads/'.$path.'/'.$items['options']['image']);?>"></div>
                                            <!-- AMOUNT :: PC & IPAD PRO -->
                                            <div class="product-amount d-none d-lg-block"><?php echo $items['qty'];?></div>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-8">
                                            <div class="row">
                                                <div class="col">
                                                    <ul class="cart-product-info">
                                                        <li><?php echo $items['name'];?></li>
                                                        <li><?php echo $items['options']['color'];?></li>
                                                        <li><?php echo $items['options']['size'];?></li>
                                                    </ul>
                                                    <!-- PRICE :: PC & IPAD PRO -->
                                                    <div class="d-none d-md-none d-lg-block">
                                                        <div class="price">฿ <?php echo number_format($items['price'], 0, '.', ',');?></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- PRICE & AMOUNT :: MOBILE -->
                                            <div class="d-block d-sm-none">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="price">฿ <?php echo number_format($items['price'], 0, '.', ',');?></div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="product-amount"><?php echo $items['qty'];?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- PRICE & AMOUNT :: IPAD -->
                                        <div class="col-md-2 d-none d-md-block d-lg-none">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="price">฿ <?php echo number_format($items['price'], 0, '.', ',');?></div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="product-amount"><?php echo $items['qty'];?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<?php
}
?>
                            </div>
                                
                                <?php /*<div class="summary-product">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="img-width"><img src="<?php echo base_url('asset/frontend/images/product/product-p03.jpg');?>"></div>
                                            <div class="product-amount">1</div>
                                        </div>
                                        <div class="col-lg-8">
                                            <ul class="cart-product-info">
                                                <li>กล่องใส่อาหาร ทรงเหลี่ยม 3 ช่อง</li>
                                                <li>25 ชุด</li>
                                            </ul>
                                            <div class="price">฿ 212</div>
                                        </div>
                                    </div>
                                </div>*/ ?>

                            <!---------- COUPON - SECTION :: FOR PC & IPAD PRO ---------->
                            <div class="coupon-section">
                                <div class="row">
                                    <div class="col">
                                        <p>คูปอง</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group">
                                            <input type="text" id="coupon_code" class="form-control" placeholder="กรอกรหัสคูปอง" aria-describedby="coupon-code" value="<?php echo $this->session->userdata('coupon_code');?>">
                                            <button class="buttonBK" type="button" id="coupon-code" onclick="checkCoupon();">ยืนยัน</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!---------- ORDER :: POINT ---------->
                            <div class="redeem-point">
                                <div class="row">
                                    <div class="col">
                                        <p>คุณมี<strong><?php if(!empty($point)) echo number_format($point, 0, '.', ','); else echo 0;?></strong>คะแนน สามารถใช้แลกเป็นส่วนลดได้</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <select class="form-select" id="product-status" onchange="changePoint(this.value);">
                                            <option value="" <?php if($this->session->userdata('data_point') == '') echo 'selected';?>>เลือก</option>
<?php
if(!empty($point)) {
    if(!empty($discount_point)) {
        foreach($discount_point as $r) {
            if($r->point_use_point <= $point) {
?>
                                            <option value="<?php echo $r->point_id;?>" <?php if($this->session->userdata('point_id') == $r->point_id) echo 'selected';?>><?php echo get2Lang($this->session->userdata('lang'), $r->point_name_th, $r->point_name_en);?></option>
<?php
            }
        }
    }
}
?>
                                        </select>
                                    </div>
                                </div>
                            </div>
<?php
$shipping = $this->session->userdata('order_shipping');
$discount = $this->session->userdata('coupon_price') + $this->session->userdata('multiple_price_level_discount') + $this->session->userdata('special_promotion_rule_discount') + $this->session->userdata('discount_category_discount') + $this->session->userdata('data_point_discount') + $this->session->userdata('vip_discount_price');
$total = $sub_total + $shipping - $discount;
?>
                            <!-- ORDER SUMMARY :: TOTAL -->
                            <div class="cart-form">
                                <div class="row">
                                    <div class="col-lg-7 col-md-7 col-8">ยอดรวม</div>
                                    <div class="col-lg-5 col-md-5 col-4">฿ <span class="sub_total_price"><?php echo number_format($sub_total, 2, '.', ',');?></span></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7 col-md-7 col-8">ค่าจัดส่ง</div>
                                    <div class="col-lg-5 col-md-5 col-4">฿ <span class="shipping_price"><?php echo number_format($shipping, 2, '.', ',');?></span></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7 col-md-7 col-8">ส่วนลด</div>
                                    <div class="col-lg-5 col-md-5 col-4">฿ <span class="discount_price"><?php echo number_format($discount, 2, '.', ',');?></span></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7 col-md-7 col-8">ราคาสุทธิ</div>
                                    <div class="col-lg-5 col-md-5 col-4">฿ <span class="total_price"><?php echo number_format($total, 2, '.', ',');?></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <div class="doubleBD mt-4"></div>
                    </div>
                </div>
                <div class="button-pair">
                    <div class="row">
                        <div class="col">
                            <div class="content-center">
                                <a class="buttonG" href="<?php if(!empty($category_product_first)) echo site_url('product_category/'.$category_product_first->category1_id);?>">เลือกซื้อสินค้าต่อ</a>
                                <?php /*<a class="buttonR" href="<?php echo site_url('order-summary');?>">ดำเนินการชำระเงิน</a>*/ ?>
                                <a class="buttonR cart-checkout" href="javascript:checkout();">ดำเนินการชำระเงิน</a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Form Credit Card -->
    <form name="payFormCard" id="payFormCard" method="post" action="https://ipay.bangkokbank.com/b2c/eng/payment/payForm.jsp">
        <input type="hidden" name="merchantId" id="merchantId" value="6496" /> 
        <input type="hidden" name="amount" id="amount" class="order_total_price" value="<?php echo $total;?>" />
        <input type="hidden" name="orderRef" id="orderRef" />
        <input type="hidden" name="currCode" id="currCode" value="764" />
        <input type="hidden" name="successUrl" id="successUrl" />
        <input type="hidden" name="failUrl" id="failUrl" />
        <input type="hidden" name="cancelUrl" id="cancelUrl" />
        <input type="hidden" name="payType" id="payType" value="N" />
        <input type="hidden" name="lang" id="lang" value="E" />
        <input type="hidden" name="remark" id="remark" value="-" />
    </form>
    <!-- End Form Credit Card -->
    
    <?php require('inc_footer.php'); ?>

    <!-- SELECT2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

    <script>
        $('#switch').on("change", function() {
            if ($('#switch').is(':checked')) {
                $('.box01').slideDown();
            } else {
                $('.box01').slideUp();
            }
        });
        
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

        function changeProvince(province_id, member_shipping_id) {
            $.post('<?php echo site_url("frontend/path/ajaxChangeProvince");?>', { province_id: province_id, member_shipping_id: member_shipping_id }, function(data) {
                $("#order_amphur_" + member_shipping_id).html(data);
            });
        }

        function changeAmphur(amphur_id, member_shipping_id) {
            $.post('<?php echo site_url("frontend/path/ajaxChangeAmphur");?>', { amphur_id: amphur_id, member_shipping_id: member_shipping_id }, function(data) {
                var data_split = data.split('!@#$%^&*()');

                $("#order_tumbol_" + member_shipping_id).html(data_split[0]);
                $("#order_postcode_" + member_shipping_id).html(data_split[1]);
            });
        }

        function changeProvinceBilling(province_id) {
            $.post('<?php echo site_url("frontend/path/ajaxChangeProvince");?>', { province_id: province_id }, function(data) {
                $("#order_billing_amphur").html(data);
            });
        }

        function changeAmphurBilling(amphur_id) {
            $.post('<?php echo site_url("frontend/path/ajaxChangeAmphur");?>', { amphur_id: amphur_id }, function(data) {
                var data_split = data.split('!@#$%^&*()');

                $("#order_billing_tumbol").html(data_split[0]);
                $("#order_billing_postcode").html(data_split[1]);
            });
        }

<?php
if(!empty($shipping_address->member_shipping_id)) {
?>
        var member_shipping_id_ = '<?php echo $shipping_address->member_shipping_id;?>';
<?php
} else {
?>
        var member_shipping_id_ = 0;
<?php    
}
?>
        function clickNewAddress(member_shipping_id) {
            //$(".show-address").show();

            $(".all_address").hide();
            $("#address_" + member_shipping_id).show();

            if($("#shipping_new_" + member_shipping_id).is(":checked") == true) {
                //$(".show-address-" + member_shipping_id).hide();

                member_shipping_id_ = member_shipping_id;
            }

            //alert(member_shipping_id_);
        }

        function checkout() {
            $(".cart-checkout").show();

            var member_shipping_id = member_shipping_id_;

            //alert(member_shipping_id);

            //return;
            
            if($("#shipping_default").is(":checked") == false && $(".shipping_new").is(":checked") == false) {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณาเลือกที่อยู่', 'Please Select Address');?>');

                $("#shipping_default").focus();
            }/* else if($("#shipping_new_" + member_shipping_id).is(":checked") == true && $("#order_name_" + member_shipping_id).val() == '') {
                alert('Please enter Name');

                $("#order_name").focus();
            } else if($("#shipping_new_" + member_shipping_id).is(":checked") == true && $("#order_surname_" + member_shipping_id).val() == '') {
                alert('Please enter Surname');

                $("#order_surname").focus();
            } else if($("#shipping_new_" + member_shipping_id).is(":checked") == true && $("#order_tel_" + member_shipping_id).val() == '') {
                alert('Please enter Tel');

                $("#order_tel").focus();
            } else if($("#shipping_new_" + member_shipping_id).is(":checked") == true && $("#order_email_" + member_shipping_id).val() == '') {
                alert('Please enter Email');

                $("#order_email").focus();
            } else if($("#shipping_new_" + member_shipping_id).is(":checked") == true && !isEmail($("#order_email_" + member_shipping_id).val())) {
                alert('Incorrect Email');

                $("#order_email").focus();
            } else if($("#shipping_new_" + member_shipping_id).is(":checked") == true && $("#order_address_" + member_shipping_id).val() == '') {
                alert('Please enter Address');

                $("#order_address").focus();
            } else if($("#shipping_new_" + member_shipping_id).is(":checked") == true && $("#order_province_" + member_shipping_id).val() == '') {
                alert('Please select Province');

                $("#order_province").focus();
            } else if($("#shipping_new_" + member_shipping_id).is(":checked") == true && $("#order_amphur_" + member_shipping_id).val() == '') {
                alert('Please select Amphur');

                $("#order_amphur").focus();
            } else if($("#shipping_new_" + member_shipping_id).is(":checked") == true && $("#order_tumbol_" + member_shipping_id).val() == '') {
                alert('Please select Tumbol');

                $("#order_tumbol").focus();
            } else if($("#shipping_new_" + member_shipping_id).is(":checked") == true && $("#order_postcode_" + member_shipping_id).val() == '') {
                alert('Please select Postcode');

                $("#order_postcode").focus();
            }*/ else if($("#shipping_express").is(":checked") == false && $("#shipping_normal").is(":checked") == false) {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณาเลือกวิธีการจัดส่ง', 'Please select Shipping Method');?>');

                $("#shipping_express").focus();
            } else if($("#credit_card").is(":checked") == false && $("#bank_transfer").is(":checked") == false) {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณาเลือกวิธีการชำระเงิน', 'Please select Payment Method');?>');

                $("#credit_card").focus();
            } else if($("#switch").is(":checked") == true && $("#order_billing_name").val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณากรอกชื่อ(ที่อยู่ขอใบเสร็จ/ใบกำกับภาษี)', 'Please enter Billing Name');?>');

                $("#order_billing_name").focus();
            }/* else if($("#switch").is(":checked") == true && $("#order_billing_surname").val() == '') {
                alert('Please enter Billing Surname');

                $("#order_billing_surname").focus();
            }*/ else if($("#switch").is(":checked") == true && $("#order_billing_card_id").val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณากรอกเลขที่ผู้เสียภาษี', 'Please enter Billing Card ID');?>');

                $("#order_billing_card_id").focus();
            } else if($("#switch").is(":checked") == true && $("#order_billing_tel").val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณากรอกเบอร์โทรศัพท์(ที่อยู่ขอใบเสร็จ/ใบกำกับภาษี)', 'Please enter Billing Telephone');?>');

                $("#order_billing_tel").focus();
            } else if($("#switch").is(":checked") == true && $("#order_billing_email").val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณากรอกอีเมล์(ที่อยู่ขอใบเสร็จ/ใบกำกับภาษี)', 'Please enter Billing Email');?>');

                $("#order_billing_email").focus();
            } else if($("#switch").is(":checked") == true && $("#order_billing_address").val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณากรอกที่อยู่(ที่อยู่ขอใบเสร็จ/ใบกำกับภาษี)', 'Please enter Billing Address');?>');

                $("#order_billing_address").focus();
            } else if($("#switch").is(":checked") == true && $("#order_billing_amphur").val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณาเลือกเขต/อำเภอ(ที่อยู่ขอใบเสร็จ/ใบกำกับภาษี)', 'Please enter Billing Amphur');?>');

                $("#order_billing_amphur").focus();
            } else if($("#switch").is(":checked") == true && $("#order_billing_tumbol").val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณาเลือกแขวง/ตำบล(ที่อยู่ขอใบเสร็จ/ใบกำกับภาษี)', 'Please enter Billing Tumbol');?>');

                $("#order_billing_tumbol").focus();
            } else if($("#switch").is(":checked") == true && $("#order_billing_postcode").val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณาเลือกรหัสไปรษณีย์(ที่อยู่ขอใบเสร็จ/ใบกำกับภาษี)', 'Please enter Billing Postcode');?>');

                $("#order_billing_postcode").focus();
            } else {
                $(".cart-checkout").hide();

                if($("#shipping_default").is(":checked") == true) {
                    shipping = 'new';
                } else if($(".shipping_new").is(":checked") == true) {
                    shipping = 'new';
                }

                if($("#shipping_express").is(":checked") == true) {
                    shipping_method = 'Express';
                } else if($("#shipping_normal").is(":checked") == true) {
                    shipping_method = 'Normal';
                }

                if($("#credit_card").is(":checked") == true) {
                    payment_method = 'Credit Card';

                    /*if(shipping == 'default') {
                        $.post('<?php echo site_url("frontend/path/ajaxCheckout");?>', { shipping: 'default', order_note: $("#order_note").val(), shipping_method: shipping_method, payment_method: payment_method }, function(data) {
                            $("#orderRef").val(data);
                            $("#successUrl").val('<?php echo site_url('frontend/path/success');?>/' + data);
                            $("#failUrl").val('<?php echo site_url('frontend/path/fail');?>/' + data);
                            $("#cancelUrl").val('<?php echo site_url('frontend/path/cancel');?>/' + data);
                            
                            $("#payFormCard").submit();
                        });
                    } else*/ if(shipping == 'new') {
                        /*var order_name = "order_name_" + member_shipping_id;
                        var order_surname = "order_surname_" + member_shipping_id;
                        var order_tel = "order_tel_" + member_shipping_id;
                        var order_email = "order_email_" + member_shipping_id;
                        var order_address = "order_address_" + member_shipping_id;
                        var order_province = "order_province_" + member_shipping_id;
                        var order_amphur = "order_amphur_" + member_shipping_id;
                        var order_tumbol = "order_tumbol_" + member_shipping_id;
                        var order_postcode = "order_postcode_" + member_shipping_id;*/

                        if($("#switch").is(":checked") == true) {
                            /*var order = [];
                            order['shipping'] = 'new';
                            order['member_shipping_id'] = member_shipping_id;
                            order['order_name_' + member_shipping_id] = $("#order_name_" + member_shipping_id).val();
                            order['order_surname_' + member_shipping_id] = $("#order_surname_" + member_shipping_id).val();
                            order['order_tel_' + member_shipping_id] = $("#order_tel_" + member_shipping_id).val();
                            order['order_email_' + member_shipping_id] = $("#order_email_" + member_shipping_id).val();
                            order['order_address_' + member_shipping_id] = $("#order_address_" + member_shipping_id).val();
                            order['order_province_' + member_shipping_id] = $("#order_province_" + member_shipping_id).val();
                            order['order_amphur_' + member_shipping_id] = $("#order_amphur_" + member_shipping_id).val();
                            order['order_tumbol_' + member_shipping_id] = $("#order_tumbol_" + member_shipping_id).val();
                            order['order_postcode_' + member_shipping_id] = $("#order_postcode_" + member_shipping_id).val();
                            order['order_note'] = $("#order_note").val();
                            order['shipping_method'] = shipping_method;
                            order['payment_method'] = payment_method;
                            order['order_billing_name'] = $("#order_billing_name").val();
                            order['order_billing_surname'] = $("#order_billing_surname").val();
                            order['order_billing_email'] = $("#order_billing_email").val();
                            order['order_billing_address'] = $("#order_billing_address").val();
                            order['order_billing_card_id'] = $("#order_billing_card_id").val();
                            order['order_billing_tel'] = $("#order_billing_tel").val();
                            order['order_billing_province'] = $("#order_billing_province").val();
                            order['order_billing_amphur'] = $("#order_billing_amphur").val();
                            order['order_billing_tumbol'] = $("#order_billing_tumbol").val();
                            order['order_billing_postcode'] = $("#order_billing_postcode").val();
                            order['switch'] = 'Yes';
                            
                            const obj = {...order};
                            console.log(obj);
                            
                            $.post('<?php echo site_url("frontend/path/ajaxCheckout");?>', obj, function(data) {
                                $("#orderRef").val(data);
                                $("#successUrl").val('<?php echo site_url('frontend/path/success');?>/' + data);
                                $("#failUrl").val('<?php echo site_url('frontend/path/fail');?>/' + data);
                                $("#cancelUrl").val('<?php echo site_url('frontend/path/cancel');?>/' + data);
                                
                                $("#payFormCard").submit();
                            });*/

                            $.post('<?php echo site_url("frontend/path/ajaxCheckout");?>', { 
                                shipping: 'new',
                                order_note: $("#order_note").val(),
                                shipping_method: shipping_method, 
                                payment_method: payment_method,
                                member_shipping_id: member_shipping_id,
                                order_billing_name: $("#order_billing_name").val(),
                                order_billing_surname: $("#order_billing_surname").val(),
                                order_billing_email: $("#order_billing_email").val(),
                                order_billing_address: $("#order_billing_address").val(),
                                order_billing_card_id: $("#order_billing_card_id").val(),
                                order_billing_tel: $("#order_billing_tel").val(),
                                order_billing_province: $("#order_billing_province").val(),
                                order_billing_amphur: $("#order_billing_amphur").val(),
                                order_billing_tumbol: $("#order_billing_tumbol").val(),
                                order_billing_postcode: $("#order_billing_postcode").val(),
                                switch: 'Yes'
                            }, function(data) {
                                $("#orderRef").val(data);
                                $("#successUrl").val('<?php echo site_url('frontend/path/success');?>/' + data);
                                $("#failUrl").val('<?php echo site_url('frontend/path/fail');?>/' + data);
                                $("#cancelUrl").val('<?php echo site_url('frontend/path/cancel');?>/' + data);
                                
                                $("#payFormCard").submit();
                            });
                        } else {
                            /*var order = [];
                            order['shipping'] = 'new';
                            order['member_shipping_id'] = member_shipping_id;
                            order['order_name_' + member_shipping_id] = $("#order_name_" + member_shipping_id).val();
                            order['order_surname_' + member_shipping_id] = $("#order_surname_" + member_shipping_id).val();
                            order['order_tel_' + member_shipping_id] = $("#order_tel_" + member_shipping_id).val();
                            order['order_email_' + member_shipping_id] = $("#order_email_" + member_shipping_id).val();
                            order['order_address_' + member_shipping_id] = $("#order_address_" + member_shipping_id).val();
                            order['order_province_' + member_shipping_id] = $("#order_province_" + member_shipping_id).val();
                            order['order_amphur_' + member_shipping_id] = $("#order_amphur_" + member_shipping_id).val();
                            order['order_tumbol_' + member_shipping_id] = $("#order_tumbol_" + member_shipping_id).val();
                            order['order_postcode_' + member_shipping_id] = $("#order_postcode_" + member_shipping_id).val();
                            order['order_note'] = $("#order_note").val();
                            order['shipping_method'] = shipping_method;
                            order['payment_method'] = payment_method;

                            const obj = {...order};
                            console.log(obj);

                            $.post('<?php echo site_url("frontend/path/ajaxCheckout");?>', obj, function(data) {
                                $("#orderRef").val(data);
                                $("#successUrl").val('<?php echo site_url('frontend/path/success');?>/' + data);
                                $("#failUrl").val('<?php echo site_url('frontend/path/fail');?>/' + data);
                                $("#cancelUrl").val('<?php echo site_url('frontend/path/cancel');?>/' + data);
                                
                                $("#payFormCard").submit();
                            });*/

                            $.post('<?php echo site_url("frontend/path/ajaxCheckout");?>', { 
                                shipping: 'new',
                                order_note: $("#order_note").val(),
                                shipping_method: shipping_method, 
                                payment_method: payment_method,
                                member_shipping_id: member_shipping_id
                            }, function(data) {
                                $("#orderRef").val(data);
                                $("#successUrl").val('<?php echo site_url('frontend/path/success');?>/' + data);
                                $("#failUrl").val('<?php echo site_url('frontend/path/fail');?>/' + data);
                                $("#cancelUrl").val('<?php echo site_url('frontend/path/cancel');?>/' + data);
                                
                                $("#payFormCard").submit();
                            });
                        }
                    }
                } else if($("#bank_transfer").is(":checked") == true) {
                    payment_method = 'Bank Transfer';

                    /*if(shipping == 'default') {
                        
                        $.post('<?php echo site_url("frontend/path/ajaxCheckout");?>', { shipping: 'default', order_note: $("#order_note").val(), shipping_method: shipping_method, payment_method: payment_method }, function(data) {
                            window.location.href = '<?php echo site_url("order_summary/");?>' + data;
                        });
                    } else*/ if(shipping == 'new') {
                        
                        if($("#switch").is(":checked") == true) {
                            /*var order = [];
                            order['shipping'] = 'new';
                            order['member_shipping_id'] = member_shipping_id;
                            order['order_name_' + member_shipping_id] = $("#order_name_" + member_shipping_id).val();
                            order['order_surname_' + member_shipping_id] = $("#order_surname_" + member_shipping_id).val();
                            order['order_tel_' + member_shipping_id] = $("#order_tel_" + member_shipping_id).val();
                            order['order_email_' + member_shipping_id] = $("#order_email_" + member_shipping_id).val();
                            order['order_address_' + member_shipping_id] = $("#order_address_" + member_shipping_id).val();
                            order['order_province_' + member_shipping_id] = $("#order_province_" + member_shipping_id).val();
                            order['order_amphur_' + member_shipping_id] = $("#order_amphur_" + member_shipping_id).val();
                            order['order_tumbol_' + member_shipping_id] = $("#order_tumbol_" + member_shipping_id).val();
                            order['order_postcode_' + member_shipping_id] = $("#order_postcode_" + member_shipping_id).val();
                            order['order_note'] = $("#order_note").val();
                            order['shipping_method'] = shipping_method;
                            order['payment_method'] = payment_method;
                            order['order_billing_name'] = $("#order_billing_name").val();
                            order['order_billing_surname'] = $("#order_billing_surname").val();
                            order['order_billing_email'] = $("#order_billing_email").val();
                            order['order_billing_address'] = $("#order_billing_address").val();
                            order['order_billing_card_id'] = $("#order_billing_card_id").val();
                            order['order_billing_tel'] = $("#order_billing_tel").val();
                            order['order_billing_province'] = $("#order_billing_province").val();
                            order['order_billing_amphur'] = $("#order_billing_amphur").val();
                            order['order_billing_tumbol'] = $("#order_billing_tumbol").val();
                            order['order_billing_postcode'] = $("#order_billing_postcode").val();
                            order['switch'] = 'Yes';
                            
                            const obj = {...order};
                            console.log(obj);

                            $.post('<?php echo site_url("frontend/path/ajaxCheckout");?>', obj, function(data) {
                                window.location.href = '<?php echo site_url("order_summary/");?>' + data;
                            });*/

                            $.post('<?php echo site_url("frontend/path/ajaxCheckout");?>', { 
                                shipping: 'new',
                                order_note: $("#order_note").val(),
                                shipping_method: shipping_method, 
                                payment_method: payment_method,
                                member_shipping_id: member_shipping_id,
                                order_billing_name: $("#order_billing_name").val(),
                                order_billing_surname: $("#order_billing_surname").val(),
                                order_billing_email: $("#order_billing_email").val(),
                                order_billing_address: $("#order_billing_address").val(),
                                order_billing_card_id: $("#order_billing_card_id").val(),
                                order_billing_tel: $("#order_billing_tel").val(),
                                order_billing_province: $("#order_billing_province").val(),
                                order_billing_amphur: $("#order_billing_amphur").val(),
                                order_billing_tumbol: $("#order_billing_tumbol").val(),
                                order_billing_postcode: $("#order_billing_postcode").val(),
                                switch: 'Yes'
                            }, function(data) {
                                window.location.href = '<?php echo site_url("order_summary/");?>' + data;
                            });
                        } else {
                            /*var order = [];
                            order['shipping'] = 'new';
                            order['member_shipping_id'] = member_shipping_id;
                            order['order_name_' + member_shipping_id] = $("#order_name_" + member_shipping_id).val();
                            order['order_surname_' + member_shipping_id] = $("#order_surname_" + member_shipping_id).val();
                            order['order_tel_' + member_shipping_id] = $("#order_tel_" + member_shipping_id).val();
                            order['order_email_' + member_shipping_id] = $("#order_email_" + member_shipping_id).val();
                            order['order_address_' + member_shipping_id] = $("#order_address_" + member_shipping_id).val();
                            order['order_province_' + member_shipping_id] = $("#order_province_" + member_shipping_id).val();
                            order['order_amphur_' + member_shipping_id] = $("#order_amphur_" + member_shipping_id).val();
                            order['order_tumbol_' + member_shipping_id] = $("#order_tumbol_" + member_shipping_id).val();
                            order['order_postcode_' + member_shipping_id] = $("#order_postcode_" + member_shipping_id).val();
                            order['order_note'] = $("#order_note").val();
                            order['shipping_method'] = shipping_method;
                            order['payment_method'] = payment_method;

                            const obj = {...order};
                            console.log(obj);

                            $.post('<?php echo site_url("frontend/path/ajaxCheckout");?>', obj, function(data) {
                                window.location.href = '<?php echo site_url("order_summary/");?>' + data;
                            });*/

                            $.post('<?php echo site_url("frontend/path/ajaxCheckout");?>', { 
                                shipping: 'new',
                                order_note: $("#order_note").val(),
                                shipping_method: shipping_method, 
                                payment_method: payment_method,
                                member_shipping_id: member_shipping_id
                            }, function(data) {
                                window.location.href = '<?php echo site_url("order_summary/");?>' + data;
                            });
                        }
                    }
                }
            }

            //$(".cart-checkout").show();
        }

        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }

        function checkCoupon() {
            if($("#coupon_code").val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณากรอกรหัสคูปอง', 'Please enter Coupon');?>');

                $("#coupon_code").focus();
            } else {
                $.post('<?php echo site_url("frontend/path/ajaxCoupon");?>', { coupon_code: $("#coupon_code").val() }, function(data) {
                    var data_split = data.split('!@#$%^&*()');

                    if(data_split[6] != '') {
                        $(".inc_qty_basket").html(data_split[0]);
                        $(".sub_total_price").html(data_split[1]);
                        $(".shipping_price").html(data_split[2]);
                        $(".discount_price").html(data_split[3]);
                        $(".total_price").html(data_split[4]);
                        //$(".cart_basket").html(data_split[5]);
                        $(".order_total_price").val(amountReal(data_split[4]));
                    } else {
                        $(".inc_qty_basket").html(data_split[0]);
                        $(".sub_total_price").html(data_split[1]);
                        $(".shipping_price").html(data_split[2]);
                        $(".discount_price").html(data_split[3]);
                        $(".total_price").html(data_split[4]);
                        //$(".cart_basket").html(data_split[5]);
                        $(".order_total_price").val(amountReal(data_split[4]));
                        
                        alert('<?php echo get2Lang($this->session->userdata('lang'), 'รหัสคูปองไม่ถูกต้อง', 'Incorrect Coupon');?>');

                        $("#coupon_code").val('');
                    }
                });
            }
        }

        function changePoint(point_id) {

            $.post('<?php echo site_url('frontend/path/ajaxPoint');?>', { point_id: point_id }, function(data) {
                var data_split = data.split('!@#$%^&*()');

                $(".sub_total_price").html(data_split[1]);
                $(".shipping_price").html(data_split[2]);
                $(".discount_price").html(data_split[3]);
                $(".total_price").html(data_split[4]);
                $(".order_total_price").val(amountReal(data_split[4]));
            });
            
        }

        function amountReal(order_total) {
            var order_total_split = order_total.split('.');

            order_total_split_ = order_total_split[0].replace(',', '');

            return order_total_split_;
        }

        function showAddressNotDefault() {
            $(".show-address").show();
        }
    </script>

</body>
</html>