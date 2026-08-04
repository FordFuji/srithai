<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php require('inc_header.php'); $pageName="method"; ?> 
</head>
<body>
    <?php require('inc_topmenu.php'); ?>

    <!---------- SHPPING & PAYMENT METHOD :: BANNER ---------->
    <div class="container-fluid">
        <div class="row">
            <div class="col px-0">
                <div class="top-banner">
                    <img src="<?php echo base_url('asset/frontend/images/payment/banner-payment.jpg');?>">
                    <div class="banner-txtBox">
                        <div class="banner-txt">
                            <p>SHIPPING & PAYMENT METHOD</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!---------- SHPPING & PAYMENT METHOD ---------->
    <div class="content-padding foot-pad">
        <div class="container-fluid">
			<div class="wrap-pad">
                <div class="shipping-payment-page">
                    <div class="row">
                        <div class="col">
                            <h2 class="decor"><?php echo get2Lang($this->session->userdata('lang'), 'วิธีการจัดส่งสินค้าและการชำระเงิน', 'Shipping & Payment Method');?></h2>
                        </div>
                    </div>

                    <div id="shipping"></div>
                    <div class="row">
                        <div class="col">
                            <h5 class="cube bottomBD"><?php echo get2Lang($this->session->userdata('lang'), 'การจัดส่งสินค้า', 'Shipping');?></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="txt-content more-mb4">
                                <p><?php echo get2Lang($this->session->userdata('lang'), 'ค่าขนส่งและระยะเวลาในการจัดส่งสินค้า ขึ้นอยู่กับระยะทางในการจัดส่งสินค้าตามจริง', 'Shipping cost and delivery time It depends on the actual shipping distance');?></p>
                            </div>
                        </div>
                    </div>

                    <div id="payment"></div>
                    <div class="row">
                        <div class="col">
                            <h5 class="cube bottomBD"><?php echo get2Lang($this->session->userdata('lang'), 'วิธีการชำระเงิน', 'Payment Method');?></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h6><?php echo get2Lang($this->session->userdata('lang'), 'ชำระผ่านบัตรเครดิต', 'Credit Card');?></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-12">
                            <ul class="payment-logo-list">
                                <li><img src="<?php echo base_url('asset/frontend/images/payment/logo-visa.png');?>"></li>
                                <li><img src="<?php echo base_url('asset/frontend/images/payment/logo-mastercard.svg');?>"></li>
                            </ul>
                        </div>
                        <div class="col-lg-9 col-md-9 col-12">
                            <div class="row">
                                <div class="col">
                                    <div class="txt-content">
                                        <p><?php echo get2Lang($this->session->userdata('lang'), 'สามารถชำระเงินด้วยบัตรเครดิต (Credit card) ได้ทุกธนาคารและสถาบันการเงิน ที่มีสัญลักษณ์ VISA, MASTERCARD', 'Can pay by credit card (Credit card) at all banks and financial institutions. with VISA, MASTERCARD symbols');?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <ul class="list-decimal more-mb2">
                                        <li><?php echo get2Lang($this->session->userdata('lang'), 'เลือกช่องทางการชำระเงิน ผ่านบัตรเครดิต', 'method via credit card');?></li>
                                        <li><?php echo get2Lang($this->session->userdata('lang'), 'เลือกประเภทของบัตรเครดิต', 'Choose the type of credit card');?></li>
                                        <li><?php echo get2Lang($this->session->userdata('lang'), 'กรอกข้อมูลบัตรเครดิตที่คุณต้องการใช้ชำระให้ครบ และกด ดำเนินการต่อ', 'Fill in the credit card information you wish to use for payment and click Continue.');?>
                                            <ol>
                                                <li><?php echo get2Lang($this->session->userdata('lang'), 'ชื่อและนามสกุลผู้ถือบัตร', 'Name and surname of the cardholder');?></li>
                                                <li><?php echo get2Lang($this->session->userdata('lang'), 'เลขที่บัตร 16 หลัก', '16 digit card number');?></li>
                                                <li><?php echo get2Lang($this->session->userdata('lang'), 'วันหมดอายุของบัตร', 'card expiration date');?></li>
                                                <li><?php echo get2Lang($this->session->userdata('lang'), 'รหัสความปลอดภัยของบัตร 3 หลักที่ระบุหลังบัตร CVV/CVC', '3-digit card security code indicated on the back of the CVV/CVC card.');?></li>
                                            </ol>
                                        </li>
                                        <li><?php echo get2Lang($this->session->userdata('lang'), 'เมื่อดำเนินการเรียบร้อย ระบบจะส่งอีเมล แจ้งการชำระเงินเรียบร้อยให้แก่คุณ รอการจัดส่งสินค้าและสามารถตรวจสอบสถานะสินค้าได้', 'When done The system will send an email. notify you of successful payment Waiting for delivery and able to check the status of the product.');?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h6><?php echo get2Lang($this->session->userdata('lang'), 'ชำระเงินผ่านการโอนเงินเข้าบัญชีธนาคาร', 'Payment via bank transfer');?></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-12">
                            <ul class="payment-logo-list">
<?php
if(!empty($bank)) {
    foreach($bank as $r) {
?>
                                <li><img src="<?php echo base_url('uploads/bank/'.$r->bank_image);?>"></li>
<?php
    }
}
?>
                            </ul>
                        </div>
                        <div class="col-lg-9 col-md-9 col-12">
                            <div class="row">
                                <div class="col">
                                    <div class="txt-content">
                                        <p><?php echo get2Lang($this->session->userdata('lang'), 'สามารถเลือกชำระเงินด้วยวิธีการโอนเงินโดยตรงผ่านบัญชีธนาคาร / เคาน์เตอร์ธนาคาร / โอนผ่านตู้ ATM หรือ Internet Banking และโอนเงินมายังเลขที่บัญชี บริษัท ศรีไทยซุปเปอร์แวร์ จำกัด (มหาชน)</p>
                                        <p>โดยโอนเงินเข้าบัญชีธนาคารของ บริษัท ศรีไทยซุปเปอร์แวร์ จำกัด (มหาชน) คือ</p>', 'You can choose to pay by direct transfer via bank account / bank counter / ATM transfer or Internet Banking and transfer money to account number Srithai Superware Public Company Limited.</p> <p>By transferring money to the bank account of Srithai Superware Public Company Limited which is</p>');?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bank-info fix-line more-mb2">
<?php
if(!empty($bank)) {
    foreach($bank as $r) {
?>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-2">
                                        <div class="img-width"><img src="<?php echo base_url('uploads/bank/'.$r->bank_image);?>"></div> 
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-10">
                                        <p><?php echo get2Lang($this->session->userdata('lang'), $r->bank_name_th, $r->bank_name_en);?></p>
                                    </div>
                                </div>
<?php
    }
}
?>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="txt-content">
                                        <p><?php echo get2Lang($this->session->userdata('lang'), 'โดยหลังโอนเงินเสร็จ คุณจำเป็นต้องแจ้งชำระเงินด้วยทุกครั้ง มีขั้นตอนดังนี้', 'after the transfer is complete You are required to make a payment every time. There are steps as follows.');?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <ul class="list-decimal more-mb4">
                                        <li><?php echo get2Lang($this->session->userdata('lang'), 'เลือกช่องทางการชำระเงิน โอนเงินบัญชีธนาคาร', 'Choose a payment method bank account transfer');?></li>
                                        <li><?php echo get2Lang($this->session->userdata('lang'), 'เลือกธนาคารที่คุณสะดวก แล้วกด ยืนยันและชำระเงิน', 'Select the bank that is convenient for you, then press Confirm and pay.');?></li>
                                        <li><?php echo get2Lang($this->session->userdata('lang'), 'ให้คุณโอนเงินเท่ากับราคารวมของรายการสั่งซื้อ พร้อมเก็บหลักฐานการโอนเงิน', 'You transfer money equal to the total price of the order. with proof of transfer');?>
                                            <ol>
<?php
if(!empty($bank)) {
    foreach($bank as $r) {
?>                                                
                                                <li>
                                                    <p><strong><?php echo get2Lang($this->session->userdata('lang'), $r->bank_name_th, $r->bank_name_en);?></strong></p>
                                                    <p><?php echo get2Lang($this->session->userdata('lang'), $r->bank_branch_th.' | '.$r->bank_company_th, $r->bank_branch_en.' | '.$r->bank_company_en);?> | <?php echo $r->bank_account_no;?></p>
                                                </li>
<?php
    }
}
?>
                                            </ol>
                                        </li>
                                        <li><?php echo get2Lang($this->session->userdata('lang'), 'แจ้งการชำระเงิน เพื่อเข้ามาแจ้งข้อมูลการชำระเงินผ่านช่องทางดังต่อไปนี้ <br>
                                        หลังสั่งซื้อสินค้าและชำระเงินเรียบร้อย ให้กรอกข้อมูลการโอนเงิน', 'payment notification To inform payment information through the following channels <br>
                                        After placing the order and making the payment Please fill out the money transfer information.');?>
                                            <ol>
                                                <li><?php echo get2Lang($this->session->userdata('lang'), 'เลขที่คำสั่งซื้อ', 'Order No');?></li>
                                                <li><?php echo get2Lang($this->session->userdata('lang'), 'บัญชีที่โอนเงิน', 'Account No');?></li>
                                                <li><?php echo get2Lang($this->session->userdata('lang'), 'จำนวนเงิน', 'Amount');?></li>
                                                <li><?php echo get2Lang($this->session->userdata('lang'), 'วันที่ และ เวลาที่ชำระเงิน', 'date and time of payment');?></li>
                                            </ol>
                                        </li>
                                        <li><?php echo get2Lang($this->session->userdata('lang'), 'เมื่อดำเนินการเรียบร้อย ระบบจะส่งอีเมล แจ้งการชำระเงินเรียบร้อยให้แก่คุณ รอการจัดส่งสินค้าและสามารถตรวจสอบสถานะสินค้าได้', 'When done The system will send an email. notify you of successful payment Waiting for delivery and able to check the status of the product.');?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="refund"></div>
                    <div class="row">
                        <div class="col">
                            <h5 class="cube bottomBD"><?php echo get2Lang($this->session->userdata('lang'), 'การคืนเงินหรือเปลี่ยนสินค้า', 'Refund or exchange');?></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="txt-content more-mb2">
                                <p><?php echo get2Lang($this->session->userdata('lang'), 'สามารถเปลี่ยนหรือคืนสินค้าที่คุณได้รับได้ โดยสามารถตรวจสอบเงื่อนไขการรับคืนสินค้าได้ตามตารางด้านล่างบริษัทฯ ขอสงวนสิทธิ์ไม่รับเปลี่ยนหรือคืนสินค้าหากเหตุผลในการขอเปลี่ยนหรือคืนไม่เป็นไปตามที่กำหนดในตารางด้านล่างนี้อย่างครบถ้วน', 'You can exchange or return the product you received. You can check the conditions for the return of goods according to the table below. We reserve the right not to exchange or return the product if the reason for requesting a replacement or return is not fully as set out in the table below.');?></p>
                                <p><div class="check">✓</div> <?php echo get2Lang($this->session->userdata('lang'), 'หมายถึง สินค้าจะต้องอยู่ในเงื่อนไขการคืนนั้นๆ', 'Means the product must be in the conditions of that return.');?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="refundTB more-mb4">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <th rowspan="2"><?php echo get2Lang($this->session->userdata('lang'), 'เหตุผลในการเปลี่ยน/คืนสินค้า', 'Reason for exchange/return');?></th>
                                            <th rowspan="2"><?php echo get2Lang($this->session->userdata('lang'), 'สภาพสินค้าไม่ผ่านการใช้งาน', 'The condition of the product is unused.');?></th>
                                            <th colspan="2"><?php echo get2Lang($this->session->userdata('lang'), 'สภาพบรรจุภัณฑ์', 'packaging condition');?></th>
                                            <th colspan="2"><?php echo get2Lang($this->session->userdata('lang'), 'สินค้าและอุปกรณ์ในกล่อง/<br>ของแถมที่ต้องส่งคืน', 'Products and accessories in the box/<br>gifts that must be returned');?></th>
                                        </tr>
                                        <tr>
                                            <th><?php echo get2Lang($this->session->userdata('lang'), 'ไม่ชำรุด', 'not broken');?></th>
                                            <th><?php echo get2Lang($this->session->userdata('lang'), 'ไม่มีการเปิด/แกะตัวกล่องสินค้า', 'No opening/unpacking of the product.');?></th>
                                            <th><?php echo get2Lang($this->session->userdata('lang'), 'สินค้าและกล่องสินค้าครบ', 'complete products and boxes');?></th>
                                            <th><?php echo get2Lang($this->session->userdata('lang'), 'ของแถมครบ', 'complete gifts');?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th><?php echo get2Lang($this->session->userdata('lang'), 'กล่องบรรจุภัณฑ์ชำรุดเสียหาย', 'The packaging box is damaged.');?></th>
                                            <td>
                                                <div class="check">✓</div>
                                            </td>
                                            <td></td>
                                            <td>
                                                <div class="check">✓</div>
                                            </td>
                                            <td>
                                                <div class="check">✓</div>
                                            </td>
                                            <td>
                                                <div class="check">✓</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><?php echo get2Lang($this->session->userdata('lang'), 'สินค้าผิด/ไม่ถูกต้องตามหน้าเว็บไซต์', 'Wrong/incorrect product on the website');?></th>
                                            <td>
                                                <div class="check">✓</div>
                                            </td>
                                            <td>
                                                <div class="check">✓</div>
                                            </td>
                                            <td>
                                                <div class="check">✓</div>
                                            </td>
                                            <td>
                                                <div class="check">✓</div>
                                            </td>
                                            <td>
                                                <div class="check">✓</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><?php echo get2Lang($this->session->userdata('lang'), 'ตัวสินค้า/อุปกรณ์เสีย', 'Product/defective equipment');?></th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="check">✓</div>
                                            </td>
                                            <td>
                                                <div class="check">✓</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><?php echo get2Lang($this->session->userdata('lang'), 'ได้รับสินค้าไม่ครบ', 'not received the product');?></th>
                                            <td>
                                                <div class="check">✓</div>
                                            </td>
                                            <td>
                                                <div class="check">✓</div>
                                            </td>
                                            <td>
                                                <div class="check">✓</div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <h5 class="cube bottomBD"><?php echo get2Lang($this->session->userdata('lang'), 'สอบถามรายละเอียด', 'inquiry');?></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h6>Srithai Contact Center</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <ul class="contact-info">
                                <li>
                                    <p><strong><?php echo get2Lang($this->session->userdata('lang'), 'สำนักงานใหญ่', 'head office');?></strong></p>
                                </li>
                                <li>
                                    <div>
                                        <div class="icon-contact"><i class="fas fa-map-marker-alt"></i></div>
                                        <p><?php if(!empty($row)) echo get2Lang($this->session->userdata('lang'), $row->contact_us_address_th, $row->contact_us_address_en);?></p>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <div class="icon-contact"><i class="fas fa-phone-alt"></i></div>
                                        <p><?php if(!empty($row)) echo get2Lang($this->session->userdata('lang'), $row->contact_us_tel_th, $row->contact_us_tel_en);?></p>
                                    </div>
                                </li>
                                <?php /*<li>
                                    <div>
                                        <div class="icon-contact"><i class="fas fa-fax"></i></div>
                                        <p><?php if(!empty($row)) echo get2Lang($this->session->userdata('lang'), $row->contact_us_fax_th, $row->contact_us_fax_en);?></p>
                                    </div>
                                </li>*/ ?>
                                <li>
                                    <div>
                                        <div class="icon-contact"><i class="fas fa-envelope"></i></div>
                                        <p><a href="mailto:<?php if(!empty($row)) echo $row->contact_us_email;?>"><?php if(!empty($row)) echo $row->contact_us_email;?></a></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    <?php require('inc_footer.php'); ?>

    <script type="text/javascript">
        // ANCHOR SC //
        function scrollNav() {
            $('.menu-tab a').click(function(){  
                //Animate
                $('html, body').stop().animate({
                    scrollTop: $( $(this).attr('href') ).offset().top - 62
                }, 800);
                return false;
            });
        }
        scrollNav();
    </script>

</body>
</html>