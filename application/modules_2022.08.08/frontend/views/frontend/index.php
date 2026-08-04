<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php require('inc_header.php'); $pageName="home"; ?> 
    <!-- OwlCarousel -->
    <link rel="stylesheet" href="<?php echo base_url('asset/frontend/OwlCarousel/owl.carousel.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('asset/frontend/OwlCarousel/owl.theme.default.min.css');?>">
</head>
<body>
    <?php require('inc_topmenu.php'); ?>

    <!---------- INDEX :: BANNER ---------->
    <div class="container-fluid">
        <div class="row">
            <div class="col px-0">
                <div class="slide-navButton nav-in">
                    <div class="main-banner owl-carousel owl-theme">
<?php
if(!empty($banner)) {
    foreach($banner as $r) {
?>
                        <div class="items"><img src="<?php echo base_url('uploads/banner/'.$r->banner_image);?>"></div>
<?php
    }
}
?>
                        <?php /*<div class="items"><img src="<?php echo base_url('asset/frontend/images/index/banner01.jpg');?>"></div>
                        <div class="items"><img src="<?php echo base_url('asset/frontend/images/index/banner02.jpg');?>"></div>
                        <div class="items"><img src="<?php echo base_url('asset/frontend/images/index/banner03.jpg');?>"></div>*/ ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-padding">
        <div class="container-fluid">
			<div class="wrap-pad">
                <!---------- INDEX :: PROMOTION ---------->
                <div class="row">
					<div class="col-lg-10 col-md-10 col-12">
                        <div class="header-wCaption">
                            <h1><?php echo get2Lang($this->session->userdata('lang'), 'สินค้าราคาพิเศษ', 'PROMOTION');?></h1>
                            <p><?php if(!empty($home)) echo get2Lang($this->session->userdata('lang'), $home->home_promotion_th, $home->home_promotion_en);?></p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <a class="buttonR readmore" href="<?php echo site_url('promotion');?>"><?php echo get2Lang($this->session->userdata('lang'), 'ดูเพิ่มเติม', 'View All');?></a>
                    </div>
                </div>
                <div class="row">
					<div class="col">
                        <div class="slide-navButton">
                            <div class="product-slide owl-carousel owl-theme nav-out">
<?php
if(!empty($promotion)) {
    foreach($promotion as $r) {
?>
                                <div class="items">
                                    <div class="productBox">
                                        <div class="row">
                                            <div class="col">
                                                <a class="product-img" href="<?php echo site_url('product_detail/'.$r->product_id);?>"><img src="<?php echo base_url('uploads/product/'.$r->product_image);?>"></a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="product-topic">
                                                    <p><?php echo get2Lang($this->session->userdata('lang'), $r->category1_name_th, $r->category1_name_en);?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="txt-content">
                                                    <p><?php echo get2Lang($this->session->userdata('lang'), $r->product_name_th, $r->product_name_en);?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
<?php
if($r->product_price == $r->product_price_before_discount) {
?>
                                                <div class="price">THB <?php echo number_format($r->product_price, 0, '.', ',');?></div>
<?php
} else {
?>
                                                <div class="price">THB <?php echo number_format($r->product_price, 0, '.', ',');?></div>
                                                <div class="full-price">THB <?php echo number_format($r->product_price_before_discount, 0, '.', ',');?></div>
<?php
}
?>                        
                                            </div>
                                        </div>
<?php
// Copy Basket
?>
                                        <div class="row">
                                            <div class="col">
<?php
        $color_size = $this->model_frontend->get_product_map_product($r->product_id);

        if($color_size == true) {
            if($r->product_stock <= 0) {
?>
                                                <button type="button" class="button-cart" onclick="alert('<?php echo get2Lang($this->session->userdata('lang'), 'สินค้าหมด', 'Out of Stock');?>');"><span>ADD TO CART</span></button>

<?php
            } else {
?>
                                                <button type="button" class="button-cart" data-toggle="modal" data-target="#addCart-option-<?php echo $r->product_id;?>"><span>ADD TO CART</span></button>
            
<?php
            }
        } elseif($color_size == false) {
            if($r->product_stock <= 0) {
?>
                                                <button type="button" class="button-cart" onclick="alert('<?php echo get2Lang($this->session->userdata('lang'), 'สินค้าหมด', 'Out of Stock');?>');"><span>ADD TO CART</span></button>

<?php
            } else {
?>
                                                <button type="button" class="button-cart" onclick="addToCart('<?php echo $r->product_id;?>');"><span>ADD TO CART</span></button>
<?php
            }
        }
?>
                                                
                                            </div>
                                        </div>
<?php
// End Copy Basket
?>
                                    </div>
                                </div>
<?php
    }
}
?>
                                <?php /*<div class="items">
                                    <div class="productBox">
                                        <div class="row">
                                            <div class="col">
                                                <a class="product-img" href="<?php echo site_url('product_detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-f01.jpg');?>"></a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="product-topic">
                                                    <p>Furniture</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="txt-content">
                                                    <p>เก้าอี้สไตล์โมเดิร์น ตกแต่งบ้าน ร้านอาหาร คาเฟ่ ที่ทำงาน รุ่น OW-166H </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="price">THB 1,950</div>
                                                <div class="full-price">THB 2,550</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <button class="button-cart"><span>ADD TO CART</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="productBox">
                                        <div class="row">
                                            <div class="col">
                                                <a class="product-img" href="<?php echo site_url('product_detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-p01.jpg');?>"></a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="product-topic">
                                                    <p>Food Packaging</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="txt-content">
                                                    <p>กล่องใส่อาหารทรงกลม ขนาด 210 ml.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="price">THB 81</div>
                                                <div class="full-price">THB 119</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <button class="button-cart"><span>ADD TO CART</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="productBox">
                                        <div class="row">
                                            <div class="col">
                                                <a class="product-img" href="<?php echo site_url('product_detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-p02.jpg');?>"></a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="product-topic">
                                                    <p>Food Packaging</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="txt-content">
                                                    <p>กล่องใส่อาหารทรงกลม ขนาด 480 ml.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="price">THB 110</div>
                                                <div class="full-price">THB 139</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <button class="button-cart"><span>ADD TO CART</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="productBox">
                                        <div class="row">
                                            <div class="col">
                                                <a class="product-img" href="<?php echo site_url('product_detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-h03.jpg');?>"></a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="product-topic">
                                                    <p>Houseware</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="txt-content">
                                                    <p>ชั้นวางรองเท้า ที่วางรองเท้าพลาสติก สีเทา, สีเทาดำ แนวตั้งวางได้ 9 คู่ SHOES RACK 9 Tier</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="price">THB 439</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <button class="button-cart"><span>ADD TO CART</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>*/ ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
<?php
if(!empty($get_set)) {
?>
                <div class="row">
					<div class="col-lg-10 col-md-10 col-12">
                        <div class="header-wCaption">
                            <h1><?php echo get2Lang($this->session->userdata('lang'), 'สินค้าจัดชุดราคาพิเศษ', 'Bundles');?></h1>
                            <p><?php if(!empty($home)) echo get2Lang($this->session->userdata('lang'), $home->home_set_th, $home->home_set_en);?></p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <a class="buttonR readmore" href="<?php echo site_url('bundles');?>"><?php echo get2Lang($this->session->userdata('lang'), 'ดูเพิ่มเติม', 'View All');?></a>
                    </div>
                </div>
                <div class="row">
					<div class="col">
                        <div class="slide-navButton">
                            <div class="product-slide owl-carousel owl-theme nav-out">
<?php
    foreach($get_set as $r) {
?>
                                <div class="items">
                                    <div class="productBox">
                                        <div class="row">
                                            <div class="col">
                                                <a href="<?php echo site_url('get_set_detail/'.$r->get_set_id);?>" class="product-img"><img src="<?php echo base_url('uploads/get_set/'.$r->get_set_image);?>"></a>
                                            </div>
                                        </div>
                                        <?php /*<div class="row">
                                            <div class="col">
                                                <div class="product-topic">
                                                    <p><?php echo get2Lang($this->session->userdata('lang'), $r->category1_name_th, $r->category1_name_en);?></p>
                                                </div>
                                            </div>
                                        </div>*/ ?>
                                        <div class="row">
                                            <div class="col">
                                                <div class="txt-content">
                                                    <p><?php echo get2Lang($this->session->userdata('lang'), $r->get_set_name_th, $r->get_set_name_en);?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="price">THB <?php echo number_format($r->get_set_price, 0, '.', ',');?></div>
                                                <div class="full-price">THB <?php echo number_format($this->model_frontend->getSetJoinProduct($r->get_set_id), 0, '.', ',');?></div>
                                            </div>
                                        </div>
<?php
// Copy Basket
?>
                                        <div class="row">
                                            <div class="col">
                                                <button type="button" class="button-cart" onclick="addToCartSet('<?php echo $r->get_set_id;?>');"><span>ADD TO CART</span></button>
                                            </div>
                                        </div>
<?php
// End Copy Basket
?>
                                    </div>
                                </div>
<?php
    }
?>
                            </div>
                        </div>
                        
                    </div>
                </div>
<?php
}
?>

<?php
if(!empty($special_rule)) {
?>
                <div class="row">
					<div class="col-lg-10 col-md-10 col-12">
                        <div class="header-wCaption">
                            <h1><?php echo get2Lang($this->session->userdata('lang'), 'ยิ่งซื้อยิ่งลด', 'Flexi Combo');?></h1>
                            <p><?php if(!empty($home)) echo get2Lang($this->session->userdata('lang'), $home->home_special_rule_th, $home->home_special_rule_en);?></p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <a class="buttonR readmore" href="<?php echo site_url('flexi_combo');?>"><?php echo get2Lang($this->session->userdata('lang'), 'ดูเพิ่มเติม', 'View All');?></a>
                    </div>
                </div>
                <div class="row">
					<div class="col">
                        <div class="slide-navButton">
                            <div class="product-slide owl-carousel owl-theme nav-out">
<?php
    foreach($special_rule as $r) {
?>
                                <div class="items">
                                    <div class="productBox">
                                        <div class="row">
                                            <div class="col">
                                                <a href="<?php echo site_url('product_detail/'.$r->product_id);?>" class="product-img"><img src="<?php echo base_url('uploads/product/'.$r->product_image);?>"></a>
                                            </div>
                                        </div>
                                        <?php /*<div class="row">
                                            <div class="col">
                                                <div class="product-topic">
                                                    <p><?php echo get2Lang($this->session->userdata('lang'), $r->category1_name_th, $r->category1_name_en);?></p>
                                                </div>
                                            </div>
                                        </div>*/ ?>
                                        <div class="row">
                                            <div class="col">
                                                <div class="txt-content">
                                                    <p><?php echo get2Lang($this->session->userdata('lang'), $r->product_name_th, $r->product_name_en);?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="price">THB <?php echo number_format($r->product_price, 0, '.', ',');?></div>
                                                <?php /*<div class="full-price">THB <?php echo number_format($r->product_price_before_discount, 0, '.', ',');?></div>*/ ?>
                                            </div>
                                        </div>
<?php
// Copy Basket
?>
                                        <div class="row">
                                            <div class="col">
                                                <button type="button" class="button-cart" onclick="addToCart('<?php echo $r->product_id;?>');"><span>ADD TO CART</span></button>
                                            </div>
                                        </div>
<?php
// End Copy Basket
?>
                                    </div>
                                </div>
<?php
    }
?>
                            </div>
                        </div>
                        
                    </div>
                </div>
<?php
}
?>

                <!---------- INDEX :: RECOMMENDED ---------->
                <div class="row">
					<div class="col-lg-10 col-md-10 col-12">
                        <div class="header-wCaption">
                            <h1><?php echo get2Lang($this->session->userdata('lang'), 'สินค้าแนะนำ', 'RECOMMENDED');?></h1>
                            <p><?php if(!empty($home)) echo get2Lang($this->session->userdata('lang'), $home->home_recommend_th, $home->home_recommend_en);?></p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <a class="buttonR readmore" href="<?php echo site_url('recommended');?>"><?php echo get2Lang($this->session->userdata('lang'), 'ดูเพิ่มเติม', 'View All');?></a>
                    </div>
                </div>
                <div class="row">
					<div class="col">
                        <div class="slide-navButton">
                            <div class="product-slide owl-carousel owl-theme nav-out">
<?php
if(!empty($recommened)) {
    foreach($recommened as $r) {
?>
                                <div class="items">
                                    <div class="productBox">
                                        <div class="row">
                                            <div class="col">
                                                <a class="product-img" href="<?php echo site_url('product_detail/'.$r->product_id);?>"><img src="<?php echo base_url('uploads/product/'.$r->product_image);?>"></a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="product-topic">
                                                    <p><?php echo get2Lang($this->session->userdata('lang'), $r->category1_name_th, $r->category1_name_en);?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="txt-content">
                                                    <p><?php echo get2Lang($this->session->userdata('lang'), $r->product_name_th, $r->product_name_en);?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
<?php
if($r->product_price == $r->product_price_before_discount) {
?>
                                                <div class="price">THB <?php echo number_format($r->product_price, 0, '.', ',');?></div>
<?php
} else {
?>
                                                <div class="price">THB <?php echo number_format($r->product_price, 0, '.', ',');?></div>
                                                <div class="full-price">THB <?php echo number_format($r->product_price_before_discount, 0, '.', ',');?></div>
<?php
}
?>                                               
                                            </div>
                                        </div>
<?php
// Copy Basket
?>
                                        <div class="row">
                                            <div class="col">
<?php
        $color_size = $this->model_frontend->get_product_map_product($r->product_id);

        if($color_size == true) {
            if($r->product_stock <= 0) {
?>
                                                <button type="button" class="button-cart" onclick="alert('<?php echo get2Lang($this->session->userdata('lang'), 'สินค้าหมด', 'Out of Stock');?>');"><span>ADD TO CART</span></button>

<?php
            } else {
?>
                                                <button type="button" class="button-cart" data-toggle="modal" data-target="#addCart-option-<?php echo $r->product_id;?>"><span>ADD TO CART</span></button>
<?php       }
        } elseif($color_size == false) {
            if($r->product_stock <= 0) {
?>
                                                <button type="button" class="button-cart" onclick="alert('<?php echo get2Lang($this->session->userdata('lang'), 'สินค้าหมด', 'Out of Stock');?>');"><span>ADD TO CART</span></button>

<?php
            } else {
?>
                                                <button type="button" class="button-cart" onclick="addToCart('<?php echo $r->product_id;?>');"><span>ADD TO CART</span></button>
<?php
            }
        }
?>
                                                
                                            </div>
                                        </div>
<?php
// End Copy Basket
?>
                                    </div>
                                </div>
<?php
    }
}
?>
                                <?php /*<div class="items">
                                    <div class="productBox">
                                        <div class="row">
                                            <div class="col">
                                                <a class="product-img" href="<?php echo site_url('product_detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-f02.jpg');?>"></a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="product-topic">
                                                    <p>Furniture</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="txt-content">
                                                    <p>เก้าอี้สไตล์โมเดิร์น แบบพนักพิงโค้ง รุ่น OW-195M</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="price">THB 2,290</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <button class="button-cart"><span>ADD TO CART</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="productBox">
                                        <div class="row">
                                            <div class="col">
                                                <a class="product-img" href="<?php echo site_url('product_detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-m02.jpg');?>"></a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="product-topic">
                                                    <p>Melamine</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="txt-content">
                                                    <p>กระบอกน้ำ 18 Oz. พร้อมฝา ขนาด 3.5 นิ้ว ลายลิขสิทธิ์ SNOOPY BONJOUR SWEETIE</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="price">THB 270</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <button class="button-cart"><span>ADD TO CART</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="productBox">
                                        <div class="row">
                                            <div class="col">
                                                <a class="product-img" href="<?php echo site_url('product_detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-h01.jpg');?>"></a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="product-topic">
                                                    <p>Houseware</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="txt-content">
                                                    <p>ถังขยะ 2 ชั้น ถังขยะรีไซเคิล ทรงสี่เหลี่ยม ขนาด 20-25 ลิตร</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="price">THB 399</div>
                                                <div class="full-price">THB 799</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <button class="button-cart"><span>ADD TO CART</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="productBox">
                                        <div class="row">
                                            <div class="col">
                                                <a class="product-img" href="<?php echo site_url('product_detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-f04.jpg');?>"></a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="product-topic">
                                                    <p>Furniture</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="txt-content">
                                                    <p>เก้าอี้บันได 2 ขั้น พลาสติกหนา มียางกันลื่น 6 จุด STEP STOOL รุ่น E-802</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="price">THB 390</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <button class="button-cart"><span>ADD TO CART</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>*/?>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <!---------- INDEX :: NEW ARRIVALS ---------->
                <div class="row">
					<div class="col-lg-10 col-md-10 col-12">
                        <div class="header-wCaption">
                            <h1><?php echo get2Lang($this->session->userdata('lang'), 'สินค้าใหม่', 'NEW ARRIVALS');?></h1>
                            <p><?php if(!empty($home)) echo get2Lang($this->session->userdata('lang'), $home->home_new_arrivals_th, $home->home_new_arrivals_en);?></p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <a class="buttonR readmore" href="<?php echo site_url('new_arrivals');?>"><?php echo get2Lang($this->session->userdata('lang'), 'ดูเพิ่มเติม', 'View All');?></a>
                    </div>
                </div>
                <div class="row">
					<div class="col">
                        <div class="slide-navButton">
                            <div class="product-slide owl-carousel owl-theme nav-out">
<?php
if(!empty($new_arrivals)) {
    foreach($new_arrivals as $r) {
?>
                                <div class="items">
                                    <div class="productBox">
                                        <div class="row">
                                            <div class="col">
                                                <a class="product-img" href="<?php echo site_url('product_detail/'.$r->product_id);?>"><img src="<?php echo base_url('uploads/product/'.$r->product_image);?>"></a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="product-topic">
                                                    <p><?php echo get2Lang($this->session->userdata('lang'), $r->category1_name_th, $r->category1_name_en);?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="txt-content">
                                                    <p><?php echo get2Lang($this->session->userdata('lang'), $r->product_name_th, $r->product_name_en);?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
<?php
if($r->product_price == $r->product_price_before_discount) {
?>
                                                <div class="price">THB <?php echo number_format($r->product_price, 0, '.', ',');?></div>
<?php
} else {
?>
                                                <div class="price">THB <?php echo number_format($r->product_price, 0, '.', ',');?></div>
                                                <div class="full-price">THB <?php echo number_format($r->product_price_before_discount, 0, '.', ',');?></div>
<?php
}
?>
                                            </div>
                                        </div>
<?php
// Copy Basket
?>
                                        <div class="row">
                                            <div class="col">
<?php
        $color_size = $this->model_frontend->get_product_map_product($r->product_id);

        if($color_size == true) {
            if($r->product_stock <= 0) {
?>
                                                <button type="button" class="button-cart" onclick="alert('<?php echo get2Lang($this->session->userdata('lang'), 'สินค้าหมด', 'Out of Stock');?>');"><span>ADD TO CART</span></button>

<?php
            } else {
?>
                                                <button type="button" class="button-cart" data-toggle="modal" data-target="#addCart-option-<?php echo $r->product_id;?>"><span>ADD TO CART</span></button>
<?php
            }
        } elseif($color_size == false) {
            if($r->product_stock <= 0) {
?>
                                                <button type="button" class="button-cart" onclick="alert('<?php echo get2Lang($this->session->userdata('lang'), 'สินค้าหมด', 'Out of Stock');?>');"><span>ADD TO CART</span></button>

<?php
            } else {
?>
                                                <button type="button" class="button-cart" onclick="addToCart('<?php echo $r->product_id;?>');"><span>ADD TO CART</span></button>
<?php
            }
        }
?>
                                                
                                            </div>
                                        </div>
<?php
// End Copy Basket
?>
                                    </div>
                                </div>
<?php
    }
}
?>
                                <?php /*<div class="items">
                                    <div class="productBox">
                                        <div class="row">
                                            <div class="col">
                                                <a class="product-img" href="<?php echo site_url('product_detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-m03.jpg');?>"></a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="product-topic">
                                                    <p>Melamine</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="txt-content">
                                                    <p>ชุดเมลามีนเด็ก 5 ชิ้น ลายลิขสิทธิ์ SNOOPY VACATION</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="price">THB 560</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <button class="button-cart"><span>ADD TO CART</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="productBox">
                                        <div class="row">
                                            <div class="col">
                                                <a class="product-img" href="<?php echo site_url('product_detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-h02.jpg');?>"></a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="product-topic">
                                                    <p>Houseware</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="txt-content">
                                                    <p>กล่องตะแกรง กล่องใส่ของ กล่องใส่เครื่องเขียนอเนกประสงค์ มีฝาปิดซ้อนได้ รุ่น T10 ยกแพ็ค 3 ใบ คละสี (สีชมพู 2 , ฟ้า 1)</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="price">THB 180</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <button class="button-cart"><span>ADD TO CART</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="productBox">
                                        <div class="row">
                                            <div class="col">
                                                <a class="product-img" href="<?php echo site_url('product_detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-p04.jpg');?>"></a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="product-topic">
                                                    <p>Food Packaging</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="txt-content">
                                                    <p>กล่องใส่อาหาร ทรงเหลี่ยม 25 ชุดพร้อมฝา ขนาด 1000 ml. Take away</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="price">THB 217</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <button class="button-cart"><span>ADD TO CART</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="productBox">
                                        <div class="row">
                                            <div class="col">
                                                <a class="product-img" href="<?php echo site_url('product_detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-f02.jpg');?>"></a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="product-topic">
                                                    <p>Furniture</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="txt-content">
                                                    <p>เก้าอี้สไตล์โมเดิร์น แบบพนักพิงโค้ง รุ่น OW-195M</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="price">THB 2,290</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <button class="button-cart"><span>ADD TO CART</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>*/ ?>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <!---------- INDEX :: CATEGORY - FOOD PACKAGING ---------->
<?php
if(!empty($category1)) {
    foreach($category1 as $r) {
?>
                <div class="category-container">
                    <div class="row">
                        <div class="col-lg-5 col-md-6 col-12">
                            <div class="categoryBox">
                                <img src="<?php echo base_url('uploads/category1/'.$r->category1_image);?>">
                                <div class="category-txt">
                                    <h2><?php echo get2Lang($this->session->userdata('lang'), $r->category1_name_th, $r->category1_name_en);?></h2>
                                    <div class="content-center">
                                        <a class="buttonR round" href="<?php echo site_url('product_category/'.$r->category1_id);?>"><?php echo get2Lang($this->session->userdata('lang'), 'ดูเพิ่มเติม', 'View All');?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6 col-12">
                            <div class="slide-navButton">
                                <div class="category-slide owl-carousel owl-theme">
<?php
        $product = $this->model_frontend->get_product_by_category1_result($r->category1_id);
        if(!empty($product)) {
            foreach($product as $p) {
?>
                                    <div class="items">
                                        <div class="productBox">
                                            <div class="row">
                                                <div class="col">
                                                    <a class="product-img" href="<?php echo site_url('product_detail/'.$p->product_id);?>"><img src="<?php echo base_url('uploads/product/'.$p->product_image);?>"></a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="product-topic">
                                                        <p><?php echo get2Lang($this->session->userdata('lang'), $p->product_name_th, $p->product_name_en);?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="txt-content">
                                                        <p><?php echo get2Lang($this->session->userdata('lang'), $p->product_name_th, $p->product_name_en);?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
<?php
if($p->product_price == $p->product_price_before_discount) {
?>
                                                    <div class="price">THB <?php echo number_format($p->product_price, 0, '.', ',');?></div>
<?php
} else {
?>
                                                    <div class="price">THB <?php echo number_format($p->product_price, 0, '.', ',');?></div>
                                                    <div class="full-price">THB <?php echo number_format($p->product_price_before_discount, 0, '.', ',');?></div>
<?php
}
?>
                                                </div>
                                            </div>
<?php
// Copy Basket
?>
                                        <div class="row">
                                            <div class="col">
<?php
                $color_size = $this->model_frontend->get_product_map_product($p->product_id);

                if($color_size == true) {
                    if($p->product_stock <= 0) {
?>
                                                <button type="button" class="button-cart" onclick="alert('<?php echo get2Lang($this->session->userdata('lang'), 'สินค้าหมด', 'Out of Stock');?>');"><span>ADD TO CART</span></button>

<?php
                    } else {
?>
                                                <button type="button" class="button-cart" data-toggle="modal" data-target="#addCart-option-<?php echo $p->product_id;?>"><span>ADD TO CART</span></button>
<?php
                    }
                } elseif($color_size == false) {
                    if($p->product_stock <= 0) {
?>
                                                <button type="button" class="button-cart" onclick="alert('<?php echo get2Lang($this->session->userdata('lang'), 'สินค้าหมด', 'Out of Stock');?>');"><span>ADD TO CART</span></button>

<?php
                    } else {
?>
                                                <button type="button" class="button-cart" onclick="addToCart('<?php echo $p->product_id;?>');"><span>ADD TO CART</span></button>
<?php
                    }
                }
?>
                                                
                                            </div>
                                        </div>
<?php
// End Copy Basket
?>
                                        </div>
                                    </div>
<?php
            }
        }
?>
                                    <?php /*<div class="items">
                                        <div class="productBox">
                                            <div class="row">
                                                <div class="col">
                                                    <a class="product-img" href="<?php echo site_url('product_detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-p03.jpg');?>"></a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="product-topic">
                                                        <p>Food Packaging</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="txt-content">
                                                        <p>กล่องใส่อาหาร 3 ช่อง</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="price">THB 212</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <button class="button-cart"><span>ADD TO CART</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="items">
                                        <div class="productBox">
                                            <div class="row">
                                                <div class="col">
                                                    <a class="product-img" href="<?php echo site_url('product_detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-p02.jpg');?>"></a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="product-topic">
                                                        <p>Food Packaging</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="txt-content">
                                                        <p>กล่องใส่อาหารทรงกลม ขนาด 480 ml.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="price">THB 110</div>
                                                    <div class="full-price">THB 139</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <button class="button-cart"><span>ADD TO CART</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="items">
                                        <div class="productBox">
                                            <div class="row">
                                                <div class="col">
                                                    <a class="product-img" href="<?php echo site_url('product_detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-p01.jpg');?>"></a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="product-topic">
                                                        <p>Food Packaging</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="txt-content">
                                                        <p>กล่องใส่อาหารทรงกลม ขนาด 210 ml.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="price">THB 81</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <button class="button-cart"><span>ADD TO CART</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>*/ ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php
    }
}
?>

                <!---------- INDEX :: CATEGORY - FURNITURE  ---------->
                <?php /*<div class="category-container">
                    <div class="row">
                        <div class="col-lg-5 col-md-6 col-12">
                            <div class="categoryBox">
                                <img src="<?php echo base_url('asset/frontend/images/product/c-furniture.jpg');?>">
                                <div class="category-txt">
                                    <h2>FURNITURE</h2>
                                    <div class="content-center">
                                        <a class="buttonR round" href="<?php echo site_url('product-category');?>">ดูเพิ่มเติม</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6 col-12">
                            <div class="slide-navButton">
                                <div class="category-slide owl-carousel owl-theme">
                                    <div class="items">
                                        <div class="productBox">
                                            <div class="row">
                                                <div class="col">
                                                    <a class="product-img" href="<?php echo site_url('product_detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-f02.jpg');?>"></a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="product-topic">
                                                        <p>Furniture</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="txt-content">
                                                        <p>เก้าอี้สไตล์โมเดิร์น แบบพนักพิงโค้ง รุ่น OW-195M</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="price">THB 2,290</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <button class="button-cart"><span>ADD TO CART</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="items">
                                        <div class="productBox">
                                            <div class="row">
                                                <div class="col">
                                                    <a class="product-img" href="<?php echo site_url('product_detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-f03.jpg');?>"></a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="product-topic">
                                                        <p>Furniture</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="txt-content">
                                                        <p>เก้าอี้พับสไตล์โมเดิร์น Reddot Award 2008 ตกแต่งบ้าน ร้านอาหาร คาเฟ่ ที่ทำงาน รุ่น Novite</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="price">THB 2,290</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <button class="button-cart"><span>ADD TO CART</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="items">
                                        <div class="productBox">
                                            <div class="row">
                                                <div class="col">
                                                    <a class="product-img" href="<?php echo site_url('product_detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-f04.jpg');?>"></a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="product-topic">
                                                        <p>Furniture</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="txt-content">
                                                        <p>เก้าอี้บันได 2 ขั้น พลาสติกหนา มียางกันลื่น 6 จุด STEP STOOL รุ่น E-802</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="price">THB 390</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <button class="button-cart"><span>ADD TO CART</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="items">
                                        <div class="productBox">
                                            <div class="row">
                                                <div class="col">
                                                    <a class="product-img" href="<?php echo site_url('product_detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-f01.jpg');?>"></a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="product-topic">
                                                        <p>Furniture</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="txt-content">
                                                        <p>เก้าอี้สไตล์โมเดิร์น ตกแต่งบ้าน ร้านอาหาร คาเฟ่ ที่ทำงาน รุ่น OW-166H </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="price">THB 1,950</div>
                                                    <div class="full-price">THB 2,550</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <button class="button-cart"><span>ADD TO CART</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                <!---------- INDEX :: CATEGORY - MELAMINE ---------->
                <div class="category-container">
                    <div class="row">
                        <div class="col-lg-5 col-md-6 col-12">
                            <div class="categoryBox">
                                <img src="<?php echo base_url('asset/frontend/images/product/c-melamine.jpg');?>">
                                <div class="category-txt">
                                    <h2>MELAMINE</h2>
                                    <div class="content-center">
                                        <a class="buttonR round" href="<?php echo site_url('product-category');?>">ดูเพิ่มเติม</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6 col-12">
                            <div class="slide-navButton">
                                <div class="category-slide owl-carousel owl-theme">
                                    <div class="items">
                                        <div class="productBox">
                                            <div class="row">
                                                <div class="col">
                                                    <a class="product-img" href="<?php echo site_url('product_detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-m04.jpg');?>"></a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="product-topic">
                                                        <p>Melamine</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="txt-content">
                                                        <p>ถ้วยน้ำมีหู พร้อมฝา ขนาด 4 นิ้ว ลายลิขสิทธิ์ SNOOPY BONJOUR SWEETIE</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="price">THB 280</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <button class="button-cart"><span>ADD TO CART</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="items">
                                        <div class="productBox">
                                            <div class="row">
                                                <div class="col">
                                                    <a class="product-img" href="<?php echo site_url('product_detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-m01.jpg');?>"></a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="product-topic">
                                                        <p>Melamine</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="txt-content">
                                                        <p>ปิ่นโตเมลามีน ทรงกลม 3 ชั้น ลายลิขสิทธิ์ SNOOPY VACATION</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="price">THB 655</div>
                                                    <div class="full-price">THB 699</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <button class="button-cart"><span>ADD TO CART</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="items">
                                        <div class="productBox">
                                            <div class="row">
                                                <div class="col">
                                                    <a class="product-img" href="<?php echo site_url('product_detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-m03.jpg');?>"></a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="product-topic">
                                                        <p>Melamine</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="txt-content">
                                                        <p>ชุดเมลามีนเด็ก 5 ชิ้น ลายลิขสิทธิ์ SNOOPY VACATION</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="price">THB 560</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <button class="button-cart"><span>ADD TO CART</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="items">
                                        <div class="productBox">
                                            <div class="row">
                                                <div class="col">
                                                    <a class="product-img" href="<?php echo site_url('product_detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-m02.jpg');?>"></a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="product-topic">
                                                        <p>Melamine</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="txt-content">
                                                        <p>กระบอกน้ำ 18 Oz. พร้อมฝา ขนาด 3.5 นิ้ว ลายลิขสิทธิ์ SNOOPY BONJOUR SWEETIE</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="price">THB 270</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <button class="button-cart"><span>ADD TO CART</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!---------- INDEX :: CATEGORY - HOUSEWARE ---------->
                <div class="category-container BDnone">
                    <div class="row">
                        <div class="col-lg-5 col-md-6 col-12">
                            <div class="categoryBox">
                                <img src="<?php echo base_url('asset/frontend/images/product/c-houseware.jpg');?>">
                                <div class="category-txt">
                                    <h2>HOUSEWARE</h2>
                                    <div class="content-center">
                                        <a class="buttonR round" href="<?php echo site_url('product-category');?>">ดูเพิ่มเติม</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6 col-12">
                            <div class="slide-navButton">
                                <div class="category-slide owl-carousel owl-theme">
                                    <div class="items">
                                        <div class="productBox">
                                            <div class="row">
                                                <div class="col">
                                                    <a class="product-img" href="<?php echo site_url('product_detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-h02.jpg');?>"></a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="product-topic">
                                                        <p>Houseware</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="txt-content">
                                                        <p>กล่องตะแกรง กล่องใส่ของ กล่องใส่เครื่องเขียนอเนกประสงค์ มีฝาปิดซ้อนได้ รุ่น T10 ยกแพ็ค 3 ใบ คละสี (สีชมพู 2 , ฟ้า 1)</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="price">THB 180</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <button class="button-cart"><span>ADD TO CART</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="items">
                                        <div class="productBox">
                                            <div class="row">
                                                <div class="col">
                                                    <a class="product-img" href="<?php echo site_url('product_detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-h03.jpg');?>"></a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="product-topic">
                                                        <p>Houseware</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="txt-content">
                                                        <p>ชั้นวางรองเท้า ที่วางรองเท้าพลาสติก สีเทา, สีเทาดำ แนวตั้งวางได้ 9 คู่ SHOES RACK 9 Tier</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="price">THB 439</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <button class="button-cart"><span>ADD TO CART</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="items">
                                        <div class="productBox">
                                            <div class="row">
                                                <div class="col">
                                                    <a class="product-img" href="<?php echo site_url('product_detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-h04.jpg');?>"></a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="product-topic">
                                                        <p>Houseware</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="txt-content">
                                                        <p>ชั้นวางของเอนกประสงค์ ตะกร้าเก็บของพลาสติก 3 ชั้น มีล้อเลื่อน</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="price">THB 450</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <button class="button-cart"><span>ADD TO CART</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="items">
                                        <div class="productBox">
                                            <div class="row">
                                                <div class="col">
                                                    <a class="product-img" href="<?php echo site_url('product_detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-h01.jpg');?>"></a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="product-topic">
                                                        <p>Houseware</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="txt-content">
                                                        <p>ถังขยะ 2 ชั้น ถังขยะรีไซเคิล ทรงสี่เหลี่ยม ขนาด 20-25 ลิตร</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="price">THB 399</div>
                                                    <div class="full-price">THB 799</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <button class="button-cart"><span>ADD TO CART</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>*/ ?>

            </div>
        </div>
    </div>

    <!---------- CUSTOMER - GROUP ---------->
    <div class="grayBG">
        <div class="container-fluid">
			<div class="wrap-pad">
				<div class="row">
					<div class="col">
                        <div class="header-wCaption center more-mb3">
                            <h1>Customer Group</h1>
                            <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> -->
                        </div>
                    </div>
                </div>
                <div class="row">
					<div class="col">
                        <div class="slide-navButton">
                            <div class="customer-group-slide owl-carousel owl-theme nav-out red-nav">
<?php
if(!empty($customer_group)) {
    foreach($customer_group as $r) {
?>
                                <div class="items">
                                    <div class="customerBox">
                                        <div class="img-width"><img src="<?php echo base_url('uploads/customer_group/'.$r->customer_group_icon);?>"></div>
                                        <div class="row">
                                            <div class="col">
                                                <h4><?php echo get2Lang($this->session->userdata('lang'), $r->customer_group_name_th, $r->customer_group_name_en);?></h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="txt-content f-15">
                                                    <p><?php echo get2Lang($this->session->userdata('lang'), $r->customer_group_description_th, $r->customer_group_description_en);?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="content-center">
                                                    <a class="button-txt" href="<?php echo site_url('customer_group/'.$r->customer_group_id);?>"><?php echo get2Lang($this->session->userdata('lang'), 'ดูสินค้า', 'View Product');?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<?php
    }
}
?>
                                <?php /*<div class="items">
                                    <div class="customerBox">
                                        <div class="img-width"><img src="<?php echo base_url('asset/frontend/images/index/icon-building.png');?>"></div>
                                        <div class="row">
                                            <div class="col">
                                                <h4>Ho.Re.Ca</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="txt-content f-15">
                                                    <p>Lorem Ipsum is simply dummy text of theprinting and typesetting industry.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="content-center">
                                                    <a class="button-txt" href="<?php echo site_url('product-category');?>">ดูสินค้า</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="customerBox">
                                        <div class="img-width"><img src="<?php echo base_url('asset/frontend/images/index/icon-factory.png');?>"></div>
                                        <div class="row">
                                            <div class="col">
                                                <h4>FACTORY</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="txt-content f-15">
                                                    <p>Lorem Ipsum is simply dummy text of theprinting and typesetting industry.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="content-center">
                                                    <a class="button-txt" href="<?php echo site_url('product-category');?>">ดูสินค้า</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="customerBox">
                                        <div class="img-width"><img src="<?php echo base_url('asset/frontend/images/index/icon-logistics.png');?>"></div>
                                        <div class="row">
                                            <div class="col">
                                                <h4>LOGISTICS</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="txt-content f-15">
                                                    <p>Lorem Ipsum is simply dummy text of theprinting and typesetting industry.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="content-center">
                                                    <a class="button-txt" href="<?php echo site_url('product-category');?>">ดูสินค้า</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="customerBox">
                                        <div class="img-width"><img src="<?php echo base_url('asset/frontend/images/index/icon-religionplace.png');?>"></div>
                                        <div class="row">
                                            <div class="col">
                                                <h4>RELIGION PLACE</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="txt-content f-15">
                                                    <p>Lorem Ipsum is simply dummy text of theprinting and typesetting industry.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="content-center">
                                                    <a class="button-txt" href="<?php echo site_url('product-category');?>">ดูสินค้า</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="customerBox">
                                        <div class="img-width"><img src="<?php echo base_url('asset/frontend/images/index/icon-household.png');?>"></div>
                                        <div class="row">
                                            <div class="col">
                                                <h4>HOUSEHOLD</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="txt-content f-15">
                                                    <p>Lorem Ipsum is simply dummy text of theprinting and typesetting industry.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="content-center">
                                                    <a class="button-txt" href="<?php echo site_url('product-category');?>">ดูสินค้า</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="customerBox">
                                        <div class="img-width"><img src="<?php echo base_url('asset/frontend/images/index/icon-kitchen.png');?>"></div>
                                        <div class="row">
                                            <div class="col">
                                                <h4>KITCHEN</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="txt-content f-15">
                                                    <p>Lorem Ipsum is simply dummy text of theprinting and typesetting industry.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="content-center">
                                                    <a class="button-txt" href="<?php echo site_url('product-category');?>">ดูสินค้า</a>
                                                </div>
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

    <!---------- INDEX :: ARTICLE ---------->
    <div class="content-padding">
        <div class="container-fluid">
			<div class="wrap-pad">
				<div class="row">
					<div class="col">
                        <div class="header-wCaption center">
                            <h1><?php echo get2Lang($this->session->userdata('lang'), 'บทความ', 'ARTICLES');?></h1>
                            <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> -->
                        </div>
                    </div>
                </div>
                <div class="threeCol">
                    <div class="row">
<?php
if(!empty($article)) {
    foreach($article as $r) {
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
                                            <a class="buttonBD" href="<?php echo site_url('article_detail/'.$r->article_id);?>"><?php echo get2Lang($this->session->userdata('lang'), 'อ่านต่อ', 'Read More');?></a>
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
                    <div class="col">
                        <div class="content-center mb-4">
                            <a class="buttonR medium" href="<?php echo site_url('article');?>"><?php echo get2Lang($this->session->userdata('lang'), 'ดูบทความทั้งหมด', 'View All');?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
// Copy Basket
if(!empty($product_all)) {
    foreach($product_all as $r) {
?>
        <!-- MODAL :: ADD CART :: SIZE & COLOR -->
        <div class="modal fade form-modal" id="addCart-option-<?php echo $r->product_id;?>" data-backdrop="static" data-keyboard="false" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="row">
                            <div class="col">
                                <div class="product-topic">
                                    <p><?php echo get2Lang($this->session->userdata('lang'), $r->product_name_th, $r->product_name_en);?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="tag"><?php echo get2Lang($this->session->userdata('lang'), $r->category1_name_th, $r->category1_name_en);?></div>
                            </div>
                        </div>
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="product-info pb-0">
                            <div class="row">
                                <div class="col">
                                    <h6>COLOR</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="product-option">
<?php
        $color = $this->model_frontend->getColorModal($r->product_id);

        if(!empty($color)) {
            foreach($color as $c) {
?>
                                        <div class="option-list">
                                            <div class="optionBox-name">
                                                <input type="radio" id="color_<?php echo $c->color_id;?>" name="product-size" value="<?php echo $c->color_id;?>" onclick="clickColor(this.value, '<?php echo $r->product_id;?>');">
                                                <label for="color_<?php echo $c->color_id;?>"><?php echo get2Lang($this->session->userdata('lang'), $c->color_name_th, $c->color_name_en);?></label>
                                            </div>
                                        </div>
<?php
            }
        }
?>
                                        <?php /*<div class="option-list">
                                            <div class="optionBox-name">
                                                <input type="radio" id="size01" name="product-size">
                                                <label for="size01">option 1</label>
                                            </div>
                                        </div>
                                        <div class="option-list">
                                            <div class="optionBox-name">
                                                <input type="radio" id="size02" name="product-size">
                                                <label for="size02">option 2</label>
                                            </div>
                                        </div>*/ ?>
                                    </div>
                                </div>
                            </div>

                            <!-- COLOR -->
                            <div class="row">
                                <div class="col">
                                    <h6>SIZE</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="product-option data-size">
                                        
                                        <?php /*<div class="option-list">
                                            <div class="optionBox-name">
                                                <input type="radio" id="color01" name="product-color">
                                                <label for="color01">option 1</label>
                                            </div>
                                        </div>
                                        <div class="option-list">
                                            <div class="optionBox-name">
                                                <input type="radio" id="color02" name="product-color">
                                                <label for="color02">option 2</label>
                                            </div>
                                        </div>*/ ?>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="cart-button-part">
                                <div class="row">
                                    <div class="col">
                                        <div class="sp-quantity big">
                                            <div class="sp-minus btnquantity decrease_<?php echo $r->product_id;?>" onclick="decrease('<?php echo $r->product_id;?>');"><i class="fas fa-minus"></i></div>
                                            <div class="sp-input">
                                                <input type="text" class="quntity-input" id="qty_<?php echo $r->product_id;?>" value="1" />
                                            </div>
                                            <div class="sp-plus btnquantity increase_<?php echo $r->product_id;?>" onclick="increase('<?php echo $r->product_id;?>');"><i class="fas fa-plus"></i></div>
                                        </div>
                                        
                                        <button class="buttonR big" onclick="addToCartColorSize();"><i class="fas fa-shopping-cart"></i>ADD TO CART</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
// End Copy Basket
?>
    
    <?php require('inc_footer.php'); ?>

    <!-- OwlCarousel -->
    <script src="<?php echo base_url('asset/frontend/OwlCarousel/owl.carousel.min.js');?>"></script>

    <script type="text/javascript">
        $(document).ready(function() {
        $('.main-banner').owlCarousel({
            loop: true,
            margin: 5,
            autoplay: true,
            animateOut: 'fadeOut',
            autoplayTimeout: 5500,
            smartSpeed: 4000,
            autoplayHoverPause: false,
            mouseDrag: false,
            dots: true,
            nav: false,
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>'
            ],
            responsive: {
                0: {
                    items: 1,
                    slideBy: 1,
                },
                640: {
                    items: 1,
                    slideBy: 1
                },
                1024: {
                    items: 1,
                    slideBy: 1
                }
            }
        })
        });

        $(document).ready(function() {
        $('.product-slide').owlCarousel({
            loop: true,
            margin: 0,
            autoplay: false,
            autoplayTimeout: 2000,
            smartSpeed: 1500,
            autoplayHoverPause: true,
            mouseDrag: false,
            dots: false,
            nav: true,
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>'
            ],
            responsive: {
                0: {
                    items: 2,
                    slideBy: 2
                },
                640: {
                    items: 3,
                    slideBy: 1
                },
                1024: {
                    items: 4,
                    slideBy: 1
                },
                1400: {
                    items: 4,
                    slideBy: 1
                }
            }
        })
        });

        $(document).ready(function() {
        $('.category-slide').owlCarousel({
            loop: true,
            margin: 0,
            autoplay: false,
            autoplayTimeout: 2000,
            smartSpeed: 1500,
            autoplayHoverPause: true,
            mouseDrag: false,
            dots: false,
            nav: true,
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>'
            ],
            responsive: {
                0: {
                    items: 2,
                    slideBy: 2,
                    dots: false,
                    nav: true
                },
                640: {
                    items: 2,
                    slideBy: 1
                },
                1024: {
                    items: 3,
                    slideBy: 1
                },
                1400: {
                    items: 3,
                    slideBy: 1
                }
            }
        })
        });

        $(document).ready(function() {
        $('.customer-group-slide').owlCarousel({
            loop: true,
            margin: 40,
            autoplay: false,
            autoplayTimeout: 1500,
            smartSpeed: 1000,
            autoplayHoverPause: true,
            mouseDrag: false,
            dots: false,
            nav: true,
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>'
            ],
            responsive: {
                0: {
                    items: 2,
                    slideBy: 2,
                    margin: 18,
                    dots: false,
                    nav: true
                },
                640: {
                    items: 3,
                    slideBy: 1,
                    margin: 30
                },
                1024: {
                    items: 4,
                    slideBy: 1,
                    margin: 30
                },
                1400: {
                    items: 4,
                    slideBy: 1,
                    margin: 40
                }
            }
        })
        });

        // Copy Basket
        function increase(product_id) {
            qty = $("#qty_" + product_id).val();

            qty++;

            $("#qty_" + product_id).val(qty);
        }

        function decrease(product_id) {
            qty = $("#qty_" + product_id).val();

            if(qty > 1) {
                qty--;

                $("#qty_" + product_id).val(qty);
            }
        }

        var color_id_ = '';
        var size_id_ = '';
        var product_id_ = '';
        function clickColor(color_id, product_id) {
            $.post('<?php echo site_url("frontend/path/ajaxSize");?>', { color_id: color_id, product_id: product_id }, function(data) {
                $(".data-size").html(data);
            });

            color_id_ = color_id;
            product_id_ = product_id;
        }

        function clickSize(size_id) {
            size_id_ = size_id;
        }

        function addToCart(product_id) {
            $.post('<?php echo site_url("frontend/path/ajaxInsertCart");?>', { product_id: product_id, qty: 1 }, function(data) {
                var data_split = data.split('!@#$%^&*()');

                $(".inc_qty_basket").html(data_split[0]);
                $(".sub_total_price").html(data_split[1]);
                $(".shipping_price").html(data_split[2]);
                $(".discount_price").html(data_split[3]);
                $(".total_price").html(data_split[4]);
                $(".cart_basket").html(data_split[5]);

                window.location.href = '<?php echo site_url('cart');?>';
            });
        }

        function addToCartColorSize() {
            //alert(color_id_ + ' ' + size_id_);
            $.post('<?php echo site_url("frontend/path/ajaxInsertCart");?>', { product_id: product_id_, qty: $("#qty_" + product_id_).val(), color_id: color_id_, size_id: size_id_ }, function(data) {
                var data_split = data.split('!@#$%^&*()');

                $(".inc_qty_basket").html(data_split[0]);
                $(".sub_total_price").html(data_split[1]);
                $(".shipping_price").html(data_split[2]);
                $(".discount_price").html(data_split[3]);
                $(".total_price").html(data_split[4]);
                $(".cart_basket").html(data_split[5]);

                window.location.href = '<?php echo site_url('cart');?>';
            });
        }

        function addToCartSet(get_set_id) {
            $.post('<?php echo site_url("frontend/path/ajaxInsertCartSet");?>', { get_set_id: get_set_id, qty: 1 }, function(data) {
                var data_split = data.split('!@#$%^&*()');

                $(".inc_qty_basket").html(data_split[0]);
                $(".sub_total_price").html(data_split[1]);
                $(".shipping_price").html(data_split[2]);
                $(".discount_price").html(data_split[3]);
                $(".total_price").html(data_split[4]);
                $(".cart_basket").html(data_split[5]);

                window.location.href = '<?php echo site_url('cart');?>';
            });
        }
        // End Copy Basket
    </script>

</body>
</html>