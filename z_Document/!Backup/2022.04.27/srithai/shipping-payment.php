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
                        <div class="row">
                            <div class="col">
                                <div class="shipping-option">
                                    <div class="accordion">
                                        <!-- ADDRESS (Default) -->
                                        <div class="row">
                                            <div class="col">
                                                <div class="md-radio md-radio-inline radiocheck">
                                                    <input id="add01" type="radio" name="address-group" />
                                                    <label for="add01">
                                                        <p><strong>ช็อปสินค้า ศรีไทย<span>(ที่อยู่ตั้งต้น)</span></strong></p>
                                                    </label>
                                                    <section>
                                                        <div class="accBDbottom">
                                                            <div class="form-input">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="txt-content">
                                                                            <p>37/2 ถนนสุทธิสารวินิจฉัย แขวงสามเสนนอก เขตห้วยขวาง กรุงเทพฯ 10320</p>
                                                                            <p>เบอร์โทรศัพท์ : 081-234-5678</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- ADD NEW ADDRESS -->
                                        <div class="row">
                                            <div class="col">
                                                <div class="md-radio md-radio-inline radiocheck">
                                                    <input id="add02" type="radio" name="address-group" />
                                                    <label for="add02">
                                                        <p><strong>เพิ่มที่อยู่ใหม่</strong></p> 
                                                    </label>
                                                    <section>
                                                        <div class="accBDbottom none-bottomBD">
                                                            <div class="input-form">
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-md-6 col-12">
                                                                        <p>ชื่อ</p>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                    <div class="col-lg-6 col-md-6 col-12">
                                                                        <p>นามสกุล</p>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p>เบอร์โทรศัพท์</p>
                                                                        <input type="tel" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p>ที่อยู่</p>
                                                                        <input type="text" class="form-control">
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
                                                                        <p>เขต / อำเภอ</p> <!-- DISTRICT -->
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
                                                                        <p>แขวง / ตำบล</p> <!-- SUB-DISTRICT -->
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
                                                    </section>
                                                </div>
                                            </div>
                                        </div>    
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="accBDbottom topBD none-bottomBD">
                                                <div class="input-form">
                                                    <p>หมายเหตุ (ถ้ามี)</p>
                                                    <textarea class="form-control mb-0"></textarea>
                                                </div>
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
                                                <div class="md-radio md-radio-inline radiocheck">
                                                    <input id="ship01" type="radio" name="shipping-group" />
                                                    <label for="ship01">
                                                        <div class="row">
                                                            <div class="col-lg-9 col-md-10 col-8">
                                                                <p><strong>จัดส่งแบบพิเศษ</strong></p>
                                                                <div class="txt-content f-14">
                                                                    <p>จัดส่งสินค้าภายใน 3-7 วันทำการ หลังจากสั่งซื้อสินค้า</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-md-2 col-4">THB 100</div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>  
                                        <!-- SHIPPING 2 -->
                                        <div class="row">
                                            <div class="col">
                                                <div class="md-radio md-radio-inline radiocheck">
                                                    <input id="ship02" type="radio" name="shipping-group" />
                                                    <label for="ship02">
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
                                        </div> 
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
                                                    <input id="payment01" type="radio" name="payment-group" />
                                                    <label for="payment01">
                                                        <p><strong>ชำระเงินผ่านบัตรเครดิต</strong></p>
                                                    </label>
                                                    <section>
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
                                                    </section>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- PAYMENT 2 -->
                                        <div class="row">
                                            <div class="col">
                                                <div class="md-radio md-radio-inline radiocheck">
                                                    <input id="payment02" type="radio" name="payment-group" />
                                                    <label for="payment02">
                                                        <p><strong>โอนเงินผ่านธนาคาร</strong></p>
                                                    </label>
                                                    <section>
                                                        <div class="accBDbottom none-bottomBD">
                                                            <div class="bank-info">
                                                                <div class="row">
                                                                    <div class="col-lg-2 col-md-2 col-3">
                                                                        <div class="img-width"><img src="images/payment/B-kbank.jpg"></div> 
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
                                                                        <div class="img-width"><img src="images/payment/B-scb.jpg"></div> 
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
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-2 col-md-2 col-3">
                                                                        <div class="img-width"><img src="images/payment/B-bbl.jpg"></div> 
                                                                    </div>
                                                                    <div class="col-lg-10 col-md-10 col-9">
                                                                        <div class="row">
                                                                            <div class="col-xl-4 col-lg-12.double-borderBox{ col-md-4 col-12">
                                                                                <p>ธนาคารกรุงเทพ</p>
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
                    <div class="col-lg-4 col-12 d-none d-md-none d-lg-block">
                        <div class="summaryBox">
                            <div class="row">
                                <div class="col">
                                    <h4>สรุปรายการสินค้า</h4>
                                </div>
                            </div>

                            <!-- ORDER SUMMARY :: PRODUCT -->
                            <div class="summary-product-section">
                                <div class="summary-product">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="img-width"><img src="images/product/product-m01.jpg"></div>
                                            <div class="product-amount">1</div>
                                        </div>
                                        <div class="col-lg-8">
                                            <ul class="cart-product-info">
                                                <li>ปิ่นโตเมลามีน ทรงกลม 3 ชั้น ลายลิขสิทธิ์ SNOOPY VACATION</li>
                                                <li>White</li>
                                                <li>เส้นผ่าศูนย์กลาง 12 cm.</li>
                                            </ul>
                                            <div class="price">฿ 655</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="summary-product">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="img-width"><img src="images/product/product-p03.jpg"></div>
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
                                </div>
                                
                            </div>
                            
                            <!-- ORDER SUMMARY :: TOTAL -->
                            <div class="cart-form">
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
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <div class="doubleBD mt-5"></div>
                    </div>
                </div>
                <div class="button-pair">
                    <div class="row">
                        <div class="col">
                            <div class="content-center">
                                <a class="buttonG" href="product-category.php">เลือกซื้อสินค้าต่อ</a>
                                <a class="buttonR" href="order-summary.php">ดำเนินการชำระเงิน</a>
                            </div>
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
    </script>

</body>
</html>