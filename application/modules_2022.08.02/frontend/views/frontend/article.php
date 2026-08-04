<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php require('inc_header.php'); $pageName="article"; ?> 
</head>
<body>
    <?php require('inc_topmenu.php'); ?>

    <!---------- ARTICLE :: BANNER ---------->
    <div class="container-fluid">
        <div class="row">
            <div class="col px-0">
                <div class="top-banner">
                    <img src="<?php echo base_url('asset/frontend/images/article/banner-article.jpg');?>">
                    <div class="banner-txtBox">
                        <div class="banner-txt">
                            <p><?php echo get2Lang($this->session->userdata('lang'), 'บทความ', 'ARTICLES');?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!---------- ARTICLE ---------->
    <div class="content-padding foot-pad">
        <div class="container-fluid">
			<div class="wrap-pad">

                <div class="article-bigBox">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
<?php
if(!empty($row) and $row->article_image != '') {
?>
                            <div class="img-width"><img src="<?php echo base_url('uploads/article/'.$row->article_image);?>"></div>
<?php
}
?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="row">
                                <div class="col">
                                    <a class="article-topic" href="<?php echo site_url('article_detail/'.$row->article_id);?>">
                                        <p><?php if(!empty($row)) echo get2Lang($this->session->userdata('lang'), $row->article_name_th, $row->article_name_en);?></p>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="txt-content">
                                        <p><?php if(!empty($row)) echo get2Lang($this->session->userdata('lang'), $row->article_description_th, $row->article_description_en);?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
<?php 
if(!empty($row)) {
?>
                                    <a class="buttonR" href="<?php echo site_url('article_detail/'.$row->article_id);?>">อ่านต่อ</a>
<?php
}
?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php

?>
                <div class="threeCol">
                    <div class="row">
<?php
if(!empty($article6)) {
    foreach($article6 as $r) {
?>
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="articleBox">
                                <div class="row">
                                    <div class="col">
                                        <a class="img-width" href="<?php echo site_url('article_detail/'.$r->article_id);?>"><img src="<?php echo base_url('uploads/article/'.$r->article_image);?>"></a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <a class="article-topic" href="<?php echo site_url('article-detail');?>">
                                            <p><?php echo get2Lang($this->session->userdata('lang'), $r->article_name_th, $r->article_name_en);?></p>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="txt-content">
                                            <p><?php echo get2Lang($this->session->userdata('lang'), $r->article_description_th, $r->article_description_en);?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="content-center">
                                            <a class="buttonBD" href="<?php echo site_url('article_detail/'.$r->article_id);?>">อ่านต่อ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php
    }
}
?>
                        
                        <?php /*<div class="col-lg-4 col-md-4 col-12">
                            <div class="articleBox">
                                <div class="row">
                                    <div class="col">
                                        <a class="img-width" href="<?php echo site_url('article-detail');?>"><img src="<?php echo base_url('asset/frontend/images/article/article02.jpg');?>"></a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <a class="article-topic" href="<?php echo site_url('article-detail');?>">
                                            <p>หัวข้อบทความ หัวข้อบทความ หัวข้อบทความ หัวข้อบทความ หัวข้อบทความ หัวข้อบทความ หัวข้อบทความ หัวข้อบทความ หัวข้อบทความ </p>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="txt-content">
                                            <p>ฮัลโหลเคลม แฟร์ทอล์คเดโมเฟรช บอกซ์คอลัมน์อีสเตอร์โปสเตอร์รุสโซ เปเปอร์วอลนัตทรูหยวนอีสเตอร์ เฟรชสเตชั่นธัมโมตุ๊กปัจเจกชน โปรเจ็กต์โชห่วยสเตเดียม ดีไซน์เนอร์ทีวี โหลยโท่ย ซูเปอร์แบรนด์ไคลแม็กซ์ทัวริสต์ โปรเจ็ค﻿กรรมาชนเฮียมวลชนต่อยอด เวิร์กช็อปโบว์ลิ่ง ยูวีเฟอร์นิเจอร์ออร์เดอร์กุมภาพันธ์ ไฟต์วัจนะฮิปฮอปสคริปต์ ต่อยอดพริตตี้อีสต์ อวอร์ดคำสาปเคลียร์ ดีพาร์ทเมนท์ว้าวคอนเฟิร์ม</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="content-center">
                                            <a class="buttonBD" href="<?php echo site_url('article-detail');?>">อ่านต่อ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="articleBox">
                                <div class="row">
                                    <div class="col">
                                        <a class="img-width" href="<?php echo site_url('article-detail');?>"><img src="<?php echo base_url('asset/frontend/images/article/article03.jpg');?>"></a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <a class="article-topic" href="<?php echo site_url('article-detail');?>">
                                            <p>หัวข้อบทความ หัวข้อบทความ หัวข้อบทความ หัวข้อบทความ หัวข้อบทความ หัวข้อบทความ หัวข้อบทความ หัวข้อบทความ หัวข้อบทความ </p>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="txt-content">
                                            <p>ฮัลโหลเคลม แฟร์ทอล์คเดโมเฟรช บอกซ์คอลัมน์อีสเตอร์โปสเตอร์รุสโซ เปเปอร์วอลนัตทรูหยวนอีสเตอร์ เฟรชสเตชั่นธัมโมตุ๊กปัจเจกชน โปรเจ็กต์โชห่วยสเตเดียม ดีไซน์เนอร์ทีวี โหลยโท่ย ซูเปอร์แบรนด์ไคลแม็กซ์ทัวริสต์ โปรเจ็ค﻿กรรมาชนเฮียมวลชนต่อยอด เวิร์กช็อปโบว์ลิ่ง ยูวีเฟอร์นิเจอร์ออร์เดอร์กุมภาพันธ์ ไฟต์วัจนะฮิปฮอปสคริปต์ ต่อยอดพริตตี้อีสต์ อวอร์ดคำสาปเคลียร์ ดีพาร์ทเมนท์ว้าวคอนเฟิร์ม</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="content-center">
                                            <a class="buttonBD" href="<?php echo site_url('article-detail');?>">อ่านต่อ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>*/ ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col mt-4">
                        <div class="content-center">
                            <nav aria-label="Page navigation example">
<?php
if(!empty($all_page)) {
?>
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="<?php echo site_url('article/?page=1');?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
<?php
    for($i = 1; $i <= $all_page; $i++) {
?>
                                    <li class="page-item <?php if(empty($_GET['page'])) { if($i == 1) { echo 'active'; } } elseif($_GET['page'] == $i) { echo 'active'; }?>"><a class="page-link" href="<?php echo site_url('article/?page='.$i);?>"><?php echo $i;?></a></li>
<?php
    }

    $i--;
?>
                                    <?php /*<li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>*/ ?>
                                    <li class="page-item">
                                        <a class="page-link" href="<?php echo site_url('article/?page='.$i);?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
<?php
}
?>
                            </nav>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    <?php require('inc_footer.php'); ?>

</body>
</html>