<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php require('inc_header.php'); $memberName="order"; ?>
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

                        <!---------- MEMBER :: ORDER ---------->
                        <div class="col-lg-9 col-md-12 col-12">
                            <div class="row">
                                <div class="col">
                                    <h4>รายการสั่งซื้อ</h4>
                                </div>
                            </div>

                            <!---------- ORDER :: INFO ---------->
                            <div class="headerTB d-none d-sm-block">
                                <div class="row">
                                    <div class="col-3">เลขที่คำสั่งซื้อ</div>
                                    <div class="col-3">วันที่สั่งซื้อ</div>
                                    <div class="col-3">วิธีการชำระเงิน</div>
                                    <div class="col-3">สถานะ</div>
                                </div>
                            </div>
                            <div class="bodyTB detail">
                                <div class="bodyTB-sub">
                                    <div class="row">
                                        <div class="col-6 d-block d-sm-none">เลขที่คำสั่งซื้อ</div>
                                        <div class="col-lg-3 col-md-3 col-6">
                                            <div class="content-middle">
                                                <p><?php if(!empty($row_)) echo $row_->order_no;?></p>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">วันที่สั่งซื้อ</div>
                                        <div class="col-lg-3 col-md-3 col-6">
                                            <div class="content-middle">
                                                <ul>
                                                    <li><?php if(!empty($date)) echo $date;?></li>
                                                    <li><?php if(!empty($time)) echo $time;?></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">วิธีการชำระเงิน</div>
                                        <div class="col-lg-3 col-md-3 col-6">
                                            <div class="content-middle">
                                                <ul>
                                                    <li><?php if(!empty($row_)) echo $row_->order_payment_method;?></li>
                                                    <?php /*<li>
                                                        <div class="tag">ยืนยันการชำระเงิน</div>
                                                    </li>*/ ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">สถานะ</div>
                                        <div class="col-lg-3 col-md-3 col-6">
                                            <div class="content-middle">
<?php 
        if($row_->order_status == 'Ordering') {
?>
                                                <p>รอชำระเงิน</p>
<?php
        } elseif($row_->order_status == 'Processing') {
?>
                                                <p>ชำระเงินแล้ว</p>
<?php
        } elseif($row_->order_status == 'Delivery') {
?>
                                                <p>กำลังเตรียมจัดส่ง</p>
<?php
        } elseif($row_->order_status == 'Shipped') {
?>
                                                <p>ขนส่งแล้ว</p>
<?php
        } elseif($row_->order_status == 'Complete') {
?>
                                                <p>เสร็จสมบูรณ์</p>
<?php
        } elseif($row_->order_status == 'Cancel') {
?>
                                                <p>ยกเลิก</p>
<?php
        }
?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!---------- ORDER :: ADDRESS & SHIPPING ---------->
                            <div class="infoBox order-detail">
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
                                                    <li><strong><?php if(!empty($row_)) echo $row_->order_name.' '.$row_->order_surname;?></strong></li>
                                                    <li><?php if(!empty($row_) and $this->session->userdata('lang') == 'th') echo $row_->order_address.' '.$this->model_frontend->get_tumbol_record($row_->order_tumbol)->name_in_thai.' '.$this->model_frontend->get_amphur_record($row_->order_amphur)->name_in_thai.' '.$this->model_frontend->get_province_record($row_->order_province)->name_in_thai.' '.$row_->order_postcode; elseif(!empty($row_) and $this->session->userdata('lang') == 'en') echo $row_->order_address.' '.$this->model_frontend->get_tumbol_record($row_->order_tumbol)->name_in_english.' '.$this->model_frontend->get_amphur_record($row_->order_amphur)->name_in_english.' '.$this->model_frontend->get_province_record($row_->order_province)->name_in_english.' '.$row_->order_postcode;?></li>
                                                    <li>เบอร์โทรศัพท์ : 081-234-5678</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="row">
                                            <div class="col">
                                                <h6>วิธีการจัดส่ง</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <ul class="summary-info">
                                                    <li><?php if(!empty($row_)) echo $row_->order_shipping_method;?></li>
                                                    <li>Tracking Number : <?php if(!empty($row_)) echo $row_->order_tracking_no;?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
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
if(!empty($order_detail)) {
    foreach($order_detail as $r) {
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
                                            <p><?php if(!empty($row_) and $row_->order_note != '') echo $row_->order_note; else echo '-';?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!---------- ORDER :: POINT ---------->
                            <div class="point-form">
                                <div class="row">
                                    <div class="col-lg-7 col-md-7 col-8">คะแนนสะสม</div>
                                    <div class="col-lg-5 col-md-5 col-4">86</div>
                                </div>
                            </div>
                            <!---------- ORDER :: TOTAL ---------->
                            <div class="cart-form totalB order-detail">
                                <div class="row">
                                    <div class="col-lg-7 col-md-7 col-8">ยอดรวม</div>
                                    <div class="col-lg-5 col-md-5 col-4">฿ <?php if(!empty($row_)) echo number_format($row_->order_sub_total, 0, '.', ',');?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7 col-md-7 col-8">ค่าจัดส่ง</div>
                                    <div class="col-lg-5 col-md-5 col-4">฿ <?php if(!empty($row_)) echo number_format($row_->order_shipping, 0, '.', ',');?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7 col-md-7 col-8">ส่วนลด</div>
                                    <div class="col-lg-5 col-md-5 col-4">฿ <?php if(!empty($row_)) echo number_format($row_->order_discount, 0, '.', ',');?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7 col-md-7 col-8">ราคาสุทธิ</div>
                                    <div class="col-lg-5 col-md-5 col-4">฿ <?php if(!empty($row_)) echo number_format($row_->order_total, 0, '.', ',');?></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="content-center button-pair">
<?php
//pre($row_);
if(!empty($row_)) {
    if($row_->order_status == 'Ordering') {
?>
                                        <a class="buttonBD" href="<?php echo site_url('confirm_payment/'.$row_->order_id);?>">แจ้งโอนเงิน</a>&nbsp;&nbsp;&nbsp;
<?php
    }
}
?>
                                        <a class="buttonBK" href="<?php echo site_url('member_order');?>">ย้อนกลับ</a>
                                    </div>
                                </div>
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