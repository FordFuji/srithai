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
                                        <select class="form-select" id="product-status">
                                            <option selected>สถานะ</option>
                                            <option value="1">option 1</option>
                                            <option value="2">option 2</option>
                                            <option value="3">option 3</option>
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
                            <div class="bodyTB">
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
                                                <p>รอชำระเงิน</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-12">
                                            <div class="content-middle">
                                                <a class="button-view" href="member-order-detail.php"></a>
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
                                                <p>กำลังเตรียมจัดส่ง</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-md-1 col-12">
                                            <div class="content-middle">
                                                <a class="button-view" href="member-order-detail.php"></a>
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
                                                <a class="button-view" href="member-order-detail.php"></a>
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
                                                <a class="button-view" href="member-order-detail.php"></a>
                                            </div>
                                        </div>
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