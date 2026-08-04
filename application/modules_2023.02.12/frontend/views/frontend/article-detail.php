<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php require('inc_header.php'); $pageName="article"; ?> 
</head>
<body>
    <?php require('inc_topmenu.php'); ?>

<?php
if(!empty($banner_article)) {
?>
    <!---------- ARTICLE :: BANNER ---------->
    <div class="container-fluid">
        <div class="row">
            <div class="col px-0">
                <div class="top-banner">
                    <img src="<?php echo base_url('uploads/banner_article/'.$banner_article->banner_article_image);?>">
                    <div class="banner-txtBox">
                        <div class="banner-txt">
                            <p><?php echo get2Lang($this->session->userdata('lang'), $banner_article->banner_article_name_th, $banner_article->banner_article_name_en);?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>

    <!---------- ARTICLE :: DETAIL ---------->
    <div class="content-padding foot-pad">
        <div class="container-fluid">
			<div class="wrap-pad">    

                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-11 col-12">
                        <h4><?php if(!empty($row)) echo get2Lang($this->session->userdata('lang'), $row->article_name_th, $row->article_name_en);?></h4>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-11 col-12">
                        <div class="article-date"><?php if(!empty($row)) echo date2TextEn($row->article_date);?></div>
                    </div>
                </div>
                <?php if(!empty($row)) echo get2Lang($this->session->userdata('lang'), $row->article_detail_th, $row->article_detail_en);?>
                <?php /*<div class="row justify-content-center">
                    <div class="col-lg-10 col-md-11 col-12">
                        <div class="img-width more-mb3"><img src="<?php echo base_url('asset/frontend/images/article/article04.jpg');?>"></div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-11 col-12">
                        <div class="txt-content more-mb4">
                            <p>คาร์เปปเปอร์มินต์สเตชั่นศิรินทร์ มะกันเซอร์ไพรส์ สัมนาแบรนด์ก่อนหน้า บอดี้สตรอว์เบอร์รีมินท์ บอดี้ฮาลาล สัมนา ตรวจสอบไนท์ บัตเตอร์ อมาตยาธิปไตยวอลนัทแทงโก้เซอร์ไพรส์นางแบบ ด็อกเตอร์รีสอร์ทแอดมิสชันแอปเปิ้ล ฮัลโหลอุรังคธาตุ วาซาบิแฮปปี้อาว์วิก พุดดิ้ง โลโก้คอร์ปพรีเมียร์โปลิศ เอเซียมวลชนรองรับรัมแคร์ ละอ่อนว้าวดีพาร์ตเมนต์ โชว์รูมอุปการคุณแฟรนไชส์รีวิวอ่วม พุทโธแอ๊บแบ๊วซิมไมเกรน แมชชีนเวิร์กช็อปอุตสาหการ ไฮเปอร์ วาไรตี้อ่วมเมคอัพไอซ์ อวอร์ดสตรอเบอรี ซาบะ เห่ย สตรอเบอร์รีศึกษาศาสตร์คอปเตอร์ ฟินิกซ์ เวสต์ สตาร์ทแซ็กโซโฟนแจ็กพ็อตฉลุยรีไซเคิล เที่ยงวันไฟแนนซ์คำสาปแทงกั๊กเซ่นไหว้ สี่แยกกีวี ถ่ายทำโปรโมเตอร์ จอหงวนดิกชันนารีซูเอี๋ย ไพลินฮ่องเต้โอเวอร์ สงบสุข แอสเตอร์ล็อต</p>
                            <p>อุตสาหการ มลภาวะปาสกาลต่อรองสลัมเกสต์เฮาส์ ขั้นตอนวืด คันธาระคีตราชันอุปทาน ปูอัดดิกชันนารีไอเดียปาร์ตี้ แพ็คคำตอบอิ่มแปร้กระดี๊กระด๊าคาแร็คเตอร์ เซ็นเตอร์ ซีเนียร์โอวัลตินทาวน์อพาร์ทเมนต์โคโยตี มลภาวะมิวสิคราเม็งมายาคติพูล สตาร์ซาตานแบดไชน่าซาบะ ปาร์ตี้สุนทรีย์อุปการคุณโปลิศ คีตปฏิภาณ แซลมอนซูมสหรัฐ เสือโคร่งทัวริสต์ออร์แกนริคเตอร์ฮ็อต แจ๊ส วัจนะแชเชือนว้อดก้าฮัลโหล ออโต้ซินโดรมอยุติธรรมเพาเวอร์ คีตราชันชีสลีก ซูโม่คอมเมนท์ ว้อดก้าคอมเพล็กซ์ดอกเตอร์ ดาวน์ม็อบบอกซ์ ยูโรบลูเบอร์รี่ มาร์เก็ตลิมิตแฟกซ์แพทยสภาแอนด์ โต๊ะจีนสตาร์ แฮมเบอร์เกอร์ชิฟฟอน แมชชีนแมชีนอ่อนด้อยวานิลา ฮีโร่ไฟแนนซ์กระดี๊กระด๊านายพรานเพนกวิน จิตเภทแซมบ้าสเตชั่นไอซ์ ซาฟารีเบอร์เกอร์ แกสโซฮอล์อพาร์ตเมนท์ป๊อปเซฟตี้ คอปเตอร์โพสต์คำตอบเปปเปอร์มินต์ฮันนีมูน พาวเวอร์ยูโรฟรุตสปาย ซิมโฟนี่กลาสซูฮก สไตล์พันธกิจชิฟฟอน โมเดลเฟรมไกด์คาสิโนไลฟ์</p>
                            <p>ดยุกเยอบีรา แซ็กโซโฟนติวสะบึมส์กาญจนาภิเษก พฤหัสพิซซ่าลิมูซีนแหม็บ เฉิ่ม อิสรชน บู๊ราเม็งหน่อมแน้ม สะบึมส์รีไซเคิลสตริงแคทวอล์คมั้ง เมี่ยงคำชินบัญชรคอมเมนต์แอปเปิ้ล สโรชา วาไรตี้ชิฟฟอน ดราม่ามาร์เก็ตสะบึมแฟร์ ฮากการัมซี้ธรรมา พอเพียงตี๋สปาย โบว์ลิ่ง บู๊ แกงค์สตาร์ทคอนเซ็ปต์ซูฮก คอลเล็กชั่นจัมโบ้ใช้งานลีเมอร์เจ๊ จึ๊กยิมบาบูนจิ๊ก รอยัลตี้ สงบสุขแรงใจแคชเชียร์สุริยยาตร์</p>
                        </div>
                    </div>
                </div>*/ ?>

                <div class="row">
                    <div class="col">
                        <div class="content-center">
                            <a class="buttonBD" href="<?php echo site_url('article');?>"><?php echo get2Lang($this->session->userdata('lang'), 'ย้อนกลับ', 'Back');?></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    <?php require('inc_footer.php'); ?>

</body>
</html>