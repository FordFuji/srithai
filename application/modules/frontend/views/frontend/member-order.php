<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php require('inc_header.php'); $memberName="order"; ?>
    <!-- FANCYBOX -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css"/>
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
                                    <h4><?php echo get2Lang($this->session->userdata('lang'), 'รายการสั่งซื้อ', 'Order List');?></h4>
                                </div>
                            </div>
                            <div class="status-section">
                                <div class="row">
                                    <!-- SEARCH BOX -->
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="input-group search">
                                            <input type="search" class="form-control shadow-none" placeholder="<?php echo get2Lang($this->session->userdata('lang'), 'ค้นหารายการ', 'Search');?>">
                                            <div class="input-group-append">
                                                <button type="button" class="btn"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- STATUS FILTER -->
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <select class="form-select" id="product-status" onchange="changeStatus(this.value);">
                                            <option selected><?php echo get2Lang($this->session->userdata('lang'), 'สถานะ', 'Status');?></option>
                                            <option value="Ordering"><?php echo get2Lang($this->session->userdata('lang'), 'รอชำระเงิน', 'Ordering');?></option>
                                            <option value="Processing"><?php echo get2Lang($this->session->userdata('lang'), 'ชำระเงินแล้ว', 'Processing');?></option>
                                            <option value="Delivery"><?php echo get2Lang($this->session->userdata('lang'), 'กำลังเตรียมจัดส่ง', 'Delivery');?></option>
                                            <option value="Shipped"><?php echo get2Lang($this->session->userdata('lang'), 'ขนส่งแล้ว', 'Shipped');?></option>
                                            <option value="Complete"><?php echo get2Lang($this->session->userdata('lang'), 'เสร็จสมบูรณ์', 'Complete');?></option>
                                            <option value="Cancel"><?php echo get2Lang($this->session->userdata('lang'), 'ยกเลิก', 'Cancel');?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!---------- ORDER :: INFO ---------->
                            <div class="headerTB d-none d-sm-block">
                                <div class="row">
                                    <div class="col-2"><?php echo get2Lang($this->session->userdata('lang'), 'เลขที่คำสั่งซื้อ', 'Order No');?></div>
                                    <div class="col-2"><?php echo get2Lang($this->session->userdata('lang'), 'วันที่สั่งซื้อ', 'Date');?></div>
                                    <div class="col-2"><?php echo get2Lang($this->session->userdata('lang'), 'จำนวน', 'Qty');?></div>
                                    <div class="col-2"><?php echo get2Lang($this->session->userdata('lang'), 'ยอดรวม', 'Total');?></div>
                                    <div class="col-3"><?php echo get2Lang($this->session->userdata('lang'), 'สถานะ', 'Status');?></div>
                                    <div class="col-1"></div>
                                </div>
                            </div>
                            <div class="bodyTB divChangeStatus">
<?php
if(!empty($order)) {
    foreach($order as $r) {
        $datetime_exp = explode(' ', $r->order_datetime_create);
        $time_exp = explode(':', $datetime_exp[1]);
        $date_exp = explode('-', $datetime_exp[0]);

        $qty = $this->model_frontend->getQtyByOrder($r->order_id);
?>
                                <div class="bodyTB-sub">
                                    <div class="row">
                                        <div class="col-6 d-block d-sm-none"><?php echo get2Lang($this->session->userdata('lang'), 'เลขที่คำสั่งซื้อ', 'Order No');?></div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                                <p><?php echo $r->order_no_;?></p>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none"><?php echo get2Lang($this->session->userdata('lang'), 'วันที่สั่งซื้อ', 'Date');?></div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                                <ul>
                                                    <li><?php echo $date_exp[2].'/'.$date_exp[1].'/'.$date_exp[0];?></li>
                                                    <li><?php echo $time_exp[0].':'.$time_exp[1];?></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none"><?php echo get2Lang($this->session->userdata('lang'), 'จำนวน', 'Qty');?></div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                                <p><?php echo $qty;?></p>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none"><?php echo get2Lang($this->session->userdata('lang'), 'ยอดรวม', 'Total');?></div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                                <p>฿ <?php echo number_format($r->order_total, 2, '.', ',');?></p>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none"><?php echo get2Lang($this->session->userdata('lang'), 'สถานะ', 'Status');?></div>
                                        <div class="col-lg-3 col-md-3 col-6">
                                            <div class="content-middle">
                                                <ul>
                                                    <!-- <li>ชำระเงินแล้ว</li> -->
<?php
        if($r->payment_slip != '') {
?>
                                                    <li>
                                                        <a class="button-txt" data-fancybox href="<?php echo base_url('uploads/payment/'.$r->payment_slip);?>"><i class="fas fa-file-alt"></i>ดูสลิป</a>
                                                    </li>
<?php
        }
?>
                                                </ul>
                                            <!-- </div>
                                            <div class="content-middle"> -->
<?php 
        if($r->order_status == 'Ordering') {
?>
                                                <p><?php echo get2Lang($this->session->userdata('lang'), 'รอชำระเงิน', 'Ordering');?></p>
<?php
        } elseif($r->order_status == 'Processing') {
?>
                                                <p><?php echo get2Lang($this->session->userdata('lang'), 'ชำระเงินแล้ว', 'Processing');?></p>
<?php
        } elseif($r->order_status == 'Delivery') {
?>
                                                <p><?php echo get2Lang($this->session->userdata('lang'), 'กำลังเตรียมจัดส่ง', 'Delivery');?></p>
<?php
        } elseif($r->order_status == 'Shipped') {
?>
                                                <p><?php echo get2Lang($this->session->userdata('lang'), 'ขนส่งแล้ว', 'Shipped');?></p>
<?php
        } elseif($r->order_status == 'Complete') {
?>
                                                <p><?php echo get2Lang($this->session->userdata('lang'), 'เสร็จสมบูรณ์', 'Complete');?></p>
<?php
        } elseif($r->order_status == 'Cancel') {
?>
                                                <p><?php echo get2Lang($this->session->userdata('lang'), 'ยกเลิก', 'Cancel');?></p>
<?php
        }
?>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-12">
<?php
        //if($r->order_status == 'Ordering') {
?>
                                            <div class="content-middle">
                                                <a class="button-view" href="<?php echo site_url('member_order_detail/'.$r->order_id);?>"></a>
                                            </div>
<?php
        //}
?>
                                        </div>
                                    </div>
                                </div>
<?php
    }
} else {

}
?>
                                <?php /*<div class="bodyTB-sub">
                                    <div class="row">
                                        <div class="col-6 d-block d-sm-none">เลขที่คำสั่งซื้อ</div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                                <p>ST000456</p>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">วันที่สั่งซื้อ</div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                                <ul>
                                                    <li>10/01/2021</li>
                                                    <li>15:30</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">จำนวน</div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                                <p>2</p>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">ยอดรวม</div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                                <p>฿ 967</p>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">สถานะ</div>
                                        <div class="col-lg-3 col-md-3 col-6">
                                            <div class="content-middle">
                                                <p>กำลังเตรียมจัดส่ง</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-12">
                                            <div class="content-middle">
                                                <a class="button-view" href="<?php echo site_url('member-order-detail');?>"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bodyTB-sub">
                                    <div class="row">
                                        <div class="col-6 d-block d-sm-none">เลขที่คำสั่งซื้อ</div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                                <p>ST000456</p>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">วันที่สั่งซื้อ</div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                                <ul>
                                                    <li>10/01/2021</li>
                                                    <li>15:30</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">จำนวน</div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                                <p>2</p>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">ยอดรวม</div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                                <p>฿ 967</p>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">สถานะ</div>
                                        <div class="col-lg-3 col-md-3 col-6">
                                            <div class="content-middle">
                                                <p>จัดส่งแล้ว</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-12">
                                            <div class="content-middle">
                                                <a class="button-view" href="<?php echo site_url('member-order-detail');?>"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bodyTB-sub">
                                    <div class="row">
                                        <div class="col-6 d-block d-sm-none">เลขที่คำสั่งซื้อ</div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                                <p>ST000456</p>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">วันที่สั่งซื้อ</div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                                <ul>
                                                    <li>10/01/2021</li>
                                                    <li>15:30</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">จำนวน</div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                                <p>2</p>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">ยอดรวม</div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                                <p>฿ 967</p>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">สถานะ</div>
                                        <div class="col-lg-3 col-md-3 col-6">
                                            <div class="content-middle">
                                                <div class="content-middle">
                                                    <p>รายการสำเร็จ</p>
                                                    <!--<ul class="w-review">
                                                        <li>รายการสำเร็จ</li>
                                                        <li>
                                                            <div class="content-center">
                                                                <a class="button-review" href=""><i class="fas fa-pencil-alt"></i>รีวิวสินค้า</a>
                                                            </div>
                                                        </li>
                                                    </ul>-->
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-12">
                                            <div class="content-middle">
                                                <a class="button-view" href="<?php echo site_url('member-order-detail');?>"></a>
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
    </div>
    
    <?php require('inc_footer.php'); ?>

    <!-- FANCYBOX -->
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

<script>
    function changeStatus(status) {
        $.post('<?php echo site_url('frontend/path/ajaxChangeStatus');?>', { order_status: status }, function(data) {
            $(".divChangeStatus").html(data);
        });
    }
</script>
</body>
</html>