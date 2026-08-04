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
                                                <p>ST000456</p>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">วันที่สั่งซื้อ</div>
                                        <div class="col-lg-3 col-md-3 col-6">
                                            <div class="content-middle">
                                                <ul>
                                                    <li>10/01/2021</li>
                                                    <li>15:30</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">วิธีการชำระเงิน</div>
                                        <div class="col-lg-3 col-md-3 col-6">
                                            <div class="content-middle">
                                                <ul>
                                                    <li>โอนเงินผ่านธนาคาร</li>
                                                    <li>
                                                        <div class="tag">ยืนยันการชำระเงิน</div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-6 d-block d-sm-none">สถานะ</div>
                                        <div class="col-lg-3 col-md-3 col-6">
                                            <div class="content-middle">
                                                <p>จัดส่งสินค้าแล้ว</p>
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
                                                    <li><strong>ช็อปสินค้า ศรีไทย</strong></li>
                                                    <li>37/2 ถนนสุทธิสารวินิจฉัย แขวงสามเสนนอก เขตห้วยขวาง กรุงเทพฯ 10320</li>
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
                                                    <li>การจัดส่งแบบพิเศษ EMS</li>
                                                    <li>Tracking Number :  ET493024944TH</li>
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
                                <div class="order-summary">
                                    <div class="row">
                                        <div class="col-xl-2 col-lg-3 col-md-3 col-4">
                                            <div class="img-width"><img src="images/product/product-m01.jpg"></div>
                                        </div>
                                        <div class="col-xl-7 col-lg-6 col-md-7 col-8">
                                            <div class="row">
                                                <div class="col">
                                                    <ul class="cart-product-info">
                                                        <li>ปิ่นโตเมลามีน ทรงกลม 3 ชั้น ลายลิขสิทธิ์ SNOOPY VACATION</li>
                                                        <li>White</li>
                                                        <li>เส้นผ่าศูนย์กลาง 12 cm.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- PRICE & AMOUNT :: MOBILE -->
                                            <div class="d-block d-sm-none">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="price">฿ 655</div>
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
                                                    <div class="price">฿ 655</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="product-amount">1</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-summary">
                                    <div class="row">
                                        <div class="col-xl-2 col-lg-3 col-md-3 col-4">
                                            <div class="img-width"><img src="images/product/product-p03.jpg"></div>
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
                                </div>
                            </div>
                            <!---------- ORDER :: NOTE ---------->
                            <div class="note-section">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-12">หมายเหตุ</div>
                                    <div class="col-lg-10 col-md-9 col-12">
                                        <div class="txt-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!---------- ORDER :: TOTAL ---------->
                            <div class="cart-form totalB order-detail">
                                <div class="row">
                                    <div class="col-lg-7 col-md-7 col-8">ยอดรวม</div>
                                    <div class="col-lg-5 col-md-5 col-4">฿ 867</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7 col-md-7 col-8">ค่าจัดส่ง</div>
                                    <div class="col-lg-5 col-md-5 col-4">฿ 100</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7 col-md-7 col-8">ส่วนลด</div>
                                    <div class="col-lg-5 col-md-5 col-4">฿ 0</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7 col-md-7 col-8">ราคาสุทธิ</div>
                                    <div class="col-lg-5 col-md-5 col-4">฿ 967</div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="content-center">
                                        <a class="buttonR" href="member-order.php">ย้อนกลับ</a>
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