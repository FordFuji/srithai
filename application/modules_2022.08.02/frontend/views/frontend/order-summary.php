<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php require('inc_header.php'); ?>
</head>
<body>
    <?php require('inc_topmenu.php'); ?>

    <!---------- ORDER SUMMARY ---------->
    <div class="content-padding foot-pad">
        <div class="container-fluid">
            <div class="wrap-pad">
                <div class="row">
                    <div class="col">
                        <h2 class="decor">สรุปรายละเอียดการสั่งซื้อ</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="order-number">หมายเลขคำสั่งซื้อ : <span><?php if(!empty($row)) echo $row->order_no;?></span></div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-xl-11 col-lg-12 col-md-12 col-12">
                        <div class="order-summaryBD more-mb3">
                            <!---------- ORDER :: INFO ---------->
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="row">
                                        <div class="col">
                                            <h6>ที่อยู่จัดส่ง</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <ul class="summary-info">
                                                <li><strong><?php if(!empty($row)) echo $row->order_name.' '.$row->order_surname;?></strong></li>
                                                <li>
<?php 
if(!empty($row)) { 
    if($this->session->userdata('lang') == 'th') {
        echo $row->order_address.' '.$this->model_frontend->get_tumbol_record($row->order_tumbol)->name_in_thai.' '.$this->model_frontend->get_amphur_record($row->order_amphur)->name_in_thai.' '.$this->model_frontend->get_province_record($row->order_province)->name_in_thai.' '.$row->order_postcode;
    } elseif($this->session->userdata('lang') == 'en') {
        echo $row->order_address.' '.$this->model_frontend->get_tumbol_record($row->order_tumbol)->name_in_english.' '.$this->model_frontend->get_amphur_record($row->order_amphur)->name_in_english.' '.$this->model_frontend->get_province_record($row->order_province)->name_in_english.' '.$row->order_postcode;
    }
}
?>
                                                </li>
                                                <li>เบอร์โทรศัพท์ : <?php if(!empty($row)) echo $row->order_tel;?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="row">
                                        <div class="col">
                                            <h6>วันที่สั่งซื้อสินค้า</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <ul class="summary-info">
                                                <li><?php if(!empty($row)) echo dateTime2TextEn($row->order_datetime_create);?></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <h6>วิธีการจัดส่ง</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <ul class="summary-info">
                                                <?php /*<li>การจัดส่งแบบพิเศษ EMS</li>*/ ?>
                                                <li><?php if(!empty($row)) echo $row->order_shipping_method;?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="doubleBD"></div>
                                </div>
                            </div>

                            <!---------- ORDER :: PRODUCT ---------->
                            <div class="row">
                                <div class="col">
                                    <h4 class="decor">รายการสั่งซื้อ</h4>
                                </div>
                            </div>
                            <div class="order-summary-section">
<?php
if(!empty($rows)) {
    foreach($rows as $r) {
?>
                                <div class="order-summary">
                                    <div class="row">
                                        <div class="col-xl-2 col-lg-3 col-md-3 col-4">
                                            <div class="img-width"><img src="<?php echo base_url('uploads/product/'.$r->order_detail_image);?>"></div>
                                        </div>
                                        <div class="col-xl-7 col-lg-6 col-md-7 col-8">
                                            <div class="row">
                                                <div class="col">
                                                    <ul class="cart-product-info">
                                                        <li><?php echo $r->order_detail_name;?></li>
                                                        <li><?php echo $r->order_detail_color;?></li>
                                                        <li><?php echo $r->order_detail_size;?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- PRICE & AMOUNT :: MOBILE -->
                                            <div class="d-block d-sm-none">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="price">฿ <?php echo number_format($r->order_detail_price, 0, '.', ',');?></div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="product-amount"><?php echo number_format($r->order_detail_qty, 0, '.', ',');?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- PRICE & AMOUNT :: PC & IPAD -->
                                        <div class="col-xl-3 col-lg-3 col-md-2 d-none d-sm-block">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="price">฿ <?php echo number_format($r->order_detail_price, 0, '.', ',');?></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="product-amount"><?php echo number_format($r->order_detail_qty, 0, '.', ',');?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<?php
    }
}
?>
                                <?php /*<div class="order-summary">
                                    <div class="row">
                                        <div class="col-xl-2 col-lg-3 col-md-3 col-4">
                                            <div class="img-width"><img src="<?php echo base_url('asset/frontend/images/product/product-p03.jpg');?>"></div>
                                        </div>
                                        <div class="col-xl-7 col-lg-6 col-md-7 col-8">
                                            <div class="row">
                                                <div class="col">
                                                    <ul class="cart-product-info">
                                                        <li>กล่องใส่อาหาร ทรงเหลี่ยม 3 ช่อง</li>
                                                        <li>25 ชุด</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- PRICE & AMOUNT :: MOBILE -->
                                            <div class="d-block d-sm-none">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="price">฿ 212</div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="product-amount">1</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- PRICE & AMOUNT :: PC & IPAD -->
                                        <div class="col-xl-3 col-lg-3 col-md-2 d-none d-sm-block">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="price">฿ 212</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="product-amount">1</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> */ ?>
                            </div>
                            <!---------- ORDER :: NOTE ---------->
                            <div class="note-section">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-12">หมายเหตุ</div>
                                    <div class="col-lg-10 col-md-9 col-12">
                                        <div class="txt-content">
                                            <p><?php if(!empty($row)) echo $row->order_note;?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!---------- ORDER :: POINT ---------->
                            <div class="point-form">
                                <div class="row">
                                    <div class="col-lg-7 col-md-7 col-8">คะแนนสะสม</div>
                                    <div class="col-lg-5 col-md-5 col-4"><?php if($this->session->userdata('member_id') != 0) echo number_format($this->model_frontend->getCalculatePoint(), 0, '.', ','); elseif(!empty($row)) echo number_format($row->order_point, '.', ',');?></div>
                                </div>
                            </div>
                            <!---------- ORDER :: TOTAL ---------->
                            <div class="cart-form totalB">
                                <div class="row">
                                    <div class="col-lg-7 col-md-7 col-8">ยอดรวม</div>
                                    <div class="col-lg-5 col-md-5 col-4">฿ <?php if(!empty($row)) echo number_format($row->order_sub_total, 0, '.', ',');?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7 col-md-7 col-8">ค่าจัดส่ง</div>
                                    <div class="col-lg-5 col-md-5 col-4">฿ <?php if(!empty($row)) echo number_format($row->order_shipping, 0, '.', ',');?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7 col-md-7 col-8">ส่วนลด</div>
                                    <div class="col-lg-5 col-md-5 col-4">฿ <?php if(!empty($row)) echo number_format($row->order_discount, 0, '.', ',');?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7 col-md-7 col-8">ราคาสุทธิ</div>
                                    <div class="col-lg-5 col-md-5 col-4">฿ <?php if(!empty($row)) echo number_format($row->order_total, 0, '.', ',');?></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="doubleBD"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <h6>วิธีการชำระเงิน</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="txt-content mb-3">
                                        <?php /*<p>ชำระเงินผ่านบัตรเครดิต</p>*/ ?>
                                        <p><?php if(!empty($row)) echo $row->order_payment_method;?></p>
                                    </div>
                                </div>
                            </div>
<?php
if(!empty($banks)) {
    foreach($banks as $b) {
?>
                            <div class="summary-bank-info">
                                <div class="row">
                                    <div class="col">
                                        <div class="img-width"><img src="<?php echo base_url('uploads/bank/'.$b->bank_image);?>"></div>
                                        <p>
<?php
        if($this->session->userdata('lang') == 'th') {
            echo $b->bank_name_th.' '.$b->bank_company_th.' '.$b->bank_branch_th.' '.$b->bank_account_no;
        } elseif($this->session->userdata('lang') == 'en') {
            echo $b->bank_name_en.' '.$b->bank_company_en.' '.$b->bank_branch_en.' '.$b->bank_account_no;
        }
?>      
                                        </p>
                                    </div>
                                </div>
                            </div>
<?php
    }
}
?>
                        </div><!-- END // order-summaryBD -->
                    </div>
                </div>

                <div class="button-pair">
                    <div class="row">
                        <div class="col">
                            <div class="content-center">
                                <a class="buttonG" href="<?php echo site_url('index');?>">กลับหน้าแรก</a>
                                <a class="buttonR" href="<?php echo site_url('confirm_payment/'.$order_id);?>">แจ้งชำระเงิน</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    <?php require('inc_footer.php'); ?>

</body>
</html>