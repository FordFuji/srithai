<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php require('inc_header.php'); $pageName="contact"; ?> 
</head>
<body>
    <?php require('inc_topmenu.php'); ?>

    <!---------- CONTACT :: BANNER ---------->
    <div class="container-fluid">
        <div class="row">
            <div class="col px-0">
                <div class="top-banner">
                    <img src="<?php echo base_url('asset/frontend/images/contact/banner-contact.jpg');?>">
                    <div class="banner-txtBox">
                        <div class="banner-txt">
                            <p><?php echo get2Lang($this->session->userdata('lang'), 'ติดต่อเรา', 'CONTACT US');?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!---------- CONTACT ---------->
    <div class="content-padding">
        <div class="container-fluid">
			<div class="wrap-pad">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-10 col-12">
                        <div class="txt-content more-mb4">
                            <p><?php if(!empty($row)) echo get2Lang($this->session->userdata('lang'), $row->contact_us_description_th, $row->contact_us_description_en);?><?php /*อีกหนึ่งช่องทางการจัดจำหน่ายผลิตภัณฑ์เครื่องใช้ในครัวเรือน ทั้งพลาสติกและเมลามีน ส่งตรงถึงมือผู้บริโภคโดยตรง ผ่านประสบการณ์ช้อปปิ้งออนไลน์กับ SRITHAI ผู้ผลิตและจัดจำหน่าย ผลิตภัณฑ์ภายใต้แบรนด์ SUPERWARE โดยตรง มั่นใจได้ในความปลอดภัย และคุณภาพของผลิตภัณฑ์ที่ดีที่สุด เพื่อสร้างความพึ่งพอใจให้กับลูกค้าของเรา*/ ?></p>
                        </div>
                    </div>
                </div>

                <div class="contact-page">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="row">
                                <div class="col">
                                    <h5 class="bottomBD"><?php echo get2Lang($this->session->userdata('lang'), 'ช่องทางติดต่อ', 'Contact');?></h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h6>Srithai Contact Center</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="txt-content more-mb3">
                                        <p><?php if(!empty($row)) echo get2Lang($this->session->userdata('lang'), $row->contact_us_center_th, $row->contact_us_center_en);?><?php /*เพื่อให้การติดต่อสื่อสารในทุกบริการของเรา เชื่อมโยงถึงกันมากขึ้น และอำนวยความสะดวกด้านการติดต่อสอบถามให้กับผู้ใช้บริการทุกท่าน โดยให้บริการคำแนะนำเกี่ยวกับสินค้าและบริการ วิธีการซื้อและรับสินค้าโดยเป็นอีกหนึ่งในช่องทางรับฟังทุกความคิดเห็น เพื่อตอบสนองทุกความต้องการของลูกค้าทุกท่าน</p>*/ ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h6><?php echo get2Lang($this->session->userdata('lang'), 'สำนักงานใหญ่', 'Head Office');?></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <ul class="contact-info">
                                        <li>
                                            <div>
                                                <div class="icon-contact"><i class="fas fa-map-marker-alt"></i></div>
                                                <p><?php if(!empty($row)) echo get2Lang($this->session->userdata('lang'), $row->contact_us_address_th, $row->contact_us_address_en);?><?php /*15 ถนนสุขสวัสดิ์ ซอย 36 แขวงบางปะกอก เขตราษฎร์บูรณะ กรุงเทพฯ 10140*/ ?></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <div class="icon-contact"><i class="fas fa-phone-alt"></i></div>
                                                <p><?php if(!empty($row)) echo get2Lang($this->session->userdata('lang'), $row->contact_us_tel_th, $row->contact_us_tel_en);?><?php /*+66(0) 2xxx xxxx (จันทร์-ศุกร์ เวลา 09.00–17.00น.)*/ ?></p>
                                            </div>
                                        </li>
                                        <?php /*<li>
                                            <div>
                                                <div class="icon-contact"><i class="fas fa-fax"></i></div>
                                                <p><?php if(!empty($row)) echo get2Lang($this->session->userdata('lang'), $row->contact_us_fax_th, $row->contact_us_fax_en);?><?php /*++66(0) 2xxx xxxx*/ ?><?php /*</p>
                                            </div>
                                        </li>*/ ?>
                                        <li>
                                            <div>
                                                <div class="icon-contact"><i class="fas fa-envelope"></i></div>
                                                <p><?php if(!empty($row)) echo $row->contact_us_email;?><?php /*<a href="mailto:contact@srithaisuperware.com">contact@srithaisuperware.com</a>*/ ?></p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="grayBox">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="bottomBD"><?php echo get2Lang($this->session->userdata('lang'), 'ฟอร์มติดต่อ', 'Contact Form');?></h5>
                                    </div>
                                </div>
                                <form action="" method="post">
                                <div class="input-form">
                                    <div class="row">
                                        <div class="col">
                                            <p><?php echo get2Lang($this->session->userdata('lang'), 'ชื่อ', 'Name');?></p>
                                            <input type="text" name="contact_us_form_name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p><?php echo get2Lang($this->session->userdata('lang'), 'เบอร์โทรศัพท์', 'Telephone Number');?></p>
                                            <input type="text" name="contact_us_form_tel" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p><?php echo get2Lang($this->session->userdata('lang'), 'อีเมล', 'Email');?></p>
                                            <input type="email" name="contact_us_form_email" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p><?php echo get2Lang($this->session->userdata('lang'), 'เรื่อง', 'Subject');?></p>
                                            <input type="text" name="contact_us_form_subject" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p><?php echo get2Lang($this->session->userdata('lang'), 'ข้อความ', 'Message');?></p>
                                            <textarea name="contact_us_form_message" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <button type="submit" class="btn buttonR"><?php echo get2Lang($this->session->userdata('lang'), 'ส่ง', 'Send');?></button>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="googlemap">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3876.7079522614354!2d100.49560641465327!3d13.675514190396857!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2a26fb20bce2d%3A0xe8ff565a48d0fb7c!2sSrithaisuperware!5e0!3m2!1sen!2sth!4v1645868422955!5m2!1sen!2sth" style="border:0;" allowfullscreen=""></iframe>
    </div>
    
    <?php require('inc_footer.php'); ?>

</body>
</html>