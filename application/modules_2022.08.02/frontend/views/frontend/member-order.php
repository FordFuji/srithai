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
                            <div class="status-section">
                                <div class="row">
                                    <!-- SEARCH BOX -->
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="input-group search">
                                            <input type="search" class="form-control shadow-none" placeholder="ค้นหารายการ">
                                            <div class="input-group-append">
                                                <button type="button" class="btn"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- STATUS FILTER -->
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <select class="form-select" id="product-status" onchange="changeStatus(this.value);">
                                            <option selected>สถานะ</option>
                                            <option value="Ordering">รอชำระเงิน</option>
                                            <option value="Processing">ชำระเงินแล้ว</option>
                                            <option value="Delivery">กำลังเตรียมจัดส่ง</option>
                                            <option value="Shipped">ขนส่งแล้ว</option>
                                            <option value="Complete">เสร็จสมบูรณ์</option>
                                            <option value="Cancel">ยกเลิก</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!---------- ORDER :: INFO ---------->
                            <div class="headerTB d-none d-sm-block">
                                <div class="row">
                                    <div class="col-2">เลขที่คำสั่งซื้อ</div>
                                    <div class="col-2">วันที่สั่งซื้อ</div>
                                    <div class="col-2">จำนวน</div>
                                    <div class="col-2">ยอดรวม</div>
                                    <div class="col-3">สถานะ</div>
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
?>
                                <div class="bodyTB-sub">
                                    <div class="row">
                                        <div class="col-6 d-block d-sm-none">เลขที่คำสั่งซื้อ</div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                                <p><?php echo $r->order_no;?></p>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">วันที่สั่งซื้อ</div>
                                        <div class="col-lg-2 col-md-2 col-6">
                                            <div class="content-middle">
                                                <ul>
                                                    <li><?php echo $date_exp[2].'/'.$date_exp[1].'/'.$date_exp[0];?></li>
                                                    <li><?php echo $time_exp[0].':'.$time_exp[1];?></li>
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
                                                <p>฿ <?php echo number_format($r->order_total, 2, '.', ',');?></p>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">สถานะ</div>
                                        <div class="col-lg-3 col-md-3 col-6">
                                            <div class="content-middle">
<?php 
        if($r->order_status == 'Ordering') {
?>
                                                <p>รอชำระเงิน</p>
<?php
        } elseif($r->order_status == 'Processing') {
?>
                                                <p>ชำระเงินแล้ว</p>
<?php
        } elseif($r->order_status == 'Delivery') {
?>
                                                <p>กำลังเตรียมจัดส่ง</p>
<?php
        } elseif($r->order_status == 'Shipped') {
?>
                                                <p>ขนส่งแล้ว</p>
<?php
        } elseif($r->order_status == 'Complete') {
?>
                                                <p>เสร็จสมบูรณ์</p>
<?php
        } elseif($r->order_status == 'Cancel') {
?>
                                                <p>ยกเลิก</p>
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
<script>
    function changeStatus(status) {
        $.post('<?php echo site_url('frontend/path/ajaxChangeStatus');?>', { order_status: status }, function(data) {
            $(".divChangeStatus").html(data);
        });
    }
</script>
</body>
</html>