<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php require('inc_header.php'); ?>
    <!-- OwlCarousel -->
    <link rel="stylesheet" href="<?php echo base_url('asset/frontend/OwlCarousel/owl.carousel.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('asset/frontend/OwlCarousel/owl.theme.default.min.css');?>">
</head>
<body>
    <?php require('inc_topmenu.php'); ?>

    <!---------- CART ---------->
    <div class="content-padding foot-pad">
        <div class="container-fluid">
            <div class="wrap-pad">
                <div class="row">
                    <div class="col">
                        <h2><?php echo get2Lang($this->session->userdata('lang'), 'ตะกร้าสินค้า', 'Cart');?></h2>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-12 col-md-12 col-12">
                        <div class="cart-topic">
                            <div class="row">
                                <div class="col-lg-6 d-none d-md-none d-lg-block"><?php echo get2Lang($this->session->userdata('lang'), 'สินค้า', 'Product');?></div>
                                <div class="col-lg-2 d-none d-md-none d-lg-block"><?php echo get2Lang($this->session->userdata('lang'), 'ราคา', 'Price');?></div>
                                <div class="col-lg-2 d-none d-md-none d-lg-block"><?php echo get2Lang($this->session->userdata('lang'), 'จำนวน', 'Qty');?></div>
                                <div class="col-lg-2 d-none d-md-none d-lg-block"><?php echo get2Lang($this->session->userdata('lang'), 'ราคารวม', 'Sub Total');?></div>
                                <div class="col-md-12 d-block d-md-block d-lg-none"><?php echo get2Lang($this->session->userdata('lang'), 'สินค้า', 'Product');?></div>
                            </div>
                        </div>

                        <div class="product-cart-section cart_basket">
<?php
//pre($this->cart->contents());
$sub_total = 0;

foreach($this->cart->contents() as $items) {
    $price = $items['qty'] * $items['price'];

    $sub_total += $price;

    if($items['options']['promotion_get_set'] == true) {
        $path = 'get_set';
    } else {
        $path = 'product';
    }
?>
                            <div class="product-cart">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-4">
                                        <div class="img-width"><img src="<?php echo base_url('uploads/'.$path.'/'.$items['options']['image']);?>"></div>
                                    </div>
                                    <div class="col-lg-4 col-md-9 col-8">
                                        <div class="row">
                                            <div class="col">
                                                <ul class="cart-product-info">
                                                    <li><?php echo $items['name'];?></li>
                                                    <li><?php echo $items['options']['color'];?></li>
                                                    <li><?php echo $items['options']['size'];?></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <button class="button-remove" onclick="removeCart('<?php echo $items['rowid'];?>');">
                                                    <span>REMOVE</span>
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <div class="d-md-block d-lg-none">
                                            <div class="row">
                                                <div class="col">
<?php
if($items['price'] == $items['options']['price_before_discount']) {
?> 
                                                    <div class="price sale">฿ <?php echo number_format($items['price'], 0, '.', ',');?></div>
<?php
} else {
?>
                                                    <div class="price sale">฿ <?php echo number_format($items['price'], 0, '.', ',');?></div>
                                                    <div class="full-price">฿ <?php echo number_format($items['options']['price_before_discount'], 0, '.', ',');?></div>
<?php
}
?>
                                                    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="content-center">
                                                        <div class="sp-quantity">
<?php 
    $rowid = $items['rowid'];
    if($items['options']['promotion_buy_and_giveaway'] != true and $items['options']['promotion_auto_add_gift'] != true) {
?>
                                                            <div class="sp-minus btnquantity" onclick="decreaseCart('<?php echo $rowid;?>');"><i class="fas fa-minus"></i></div>
<?php
    }
?>
                                                            <div class="sp-input">
                                                                <input type="text" class="quntity-input qty-<?php echo $items['rowid'];?>" value="<?php echo $items['qty'];?>" <?php if($items['options']['promotion_buy_and_giveaway'] == true or $items['options']['promotion_auto_add_gift'] == true) { echo 'readonly'; } ?> onblur="changeQty('<?php echo $rowid;?>', this.value);" />
                                                            </div>
<?php 
    if($items['options']['promotion_buy_and_giveaway'] != true and $items['options']['promotion_auto_add_gift'] != true) {
?>
                                                            <div class="sp-plus btnquantity" onclick="increaseCart('<?php echo $rowid;?>');"><i class="fas fa-plus"></i></div>
<?php
    }
?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 d-none d-md-none d-lg-block">
                                        <div class="middle-center">
<?php
if($items['price'] == $items['options']['price_before_discount']) {
?>
                                            <div class="price sale">฿ <?php echo number_format($items['price'], 0, '.', ',');?></div>
<?php
} else {
?>
                                            <div class="price sale">฿ <?php echo number_format($items['price'], 0, '.', ',');?></div>
                                            <div class="full-price">฿ <?php echo number_format($items['options']['price_before_discount'], 0, '.', ',');?></div>
<?php
}
?>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 d-none d-md-none d-lg-block qty">
                                        <div class="middle-center">
                                            <div class="sp-quantity">
<?php
    if($items['options']['promotion_buy_and_giveaway'] != true and $items['options']['promotion_auto_add_gift'] != true) {
?>
                                                <div class="sp-minus btnquantity" onclick="decreaseCart('<?php echo $rowid;?>');"><i class="fas fa-minus"></i></div>
<?php
    }
?>
                                                <div class="sp-input">
                                                    <input type="text" class="quntity-input qty-<?php echo $items['rowid'];?>" value="<?php echo $items['qty'];?>" <?php if($items['options']['promotion_buy_and_giveaway'] == true or $items['options']['promotion_auto_add_gift'] == true) { echo 'readonly'; } ?> onblur="changeQty('<?php echo $rowid;?>', this.value);" />
                                                </div>
<?php
    if($items['options']['promotion_buy_and_giveaway'] != true and $items['options']['promotion_auto_add_gift'] != true) {
?>
                                                <div class="sp-plus btnquantity" onclick="increaseCart('<?php echo $rowid;?>');"><i class="fas fa-plus"></i></div>
<?php
    }
?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 d-none d-md-none d-lg-block">
                                        <div class="middle-center">
                                            <div class="price">฿ <?php echo number_format($items['price'] * $items['qty'], 0, '.', ',');?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
<?php
}
?>
                            <?php /*<div class="product-cart">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-4">
                                        <div class="img-width"><img src="<?php echo base_url('asset/frontend/images/product/product-p03.jpg');?>"></div>
                                    </div>
                                    <div class="col-lg-4 col-md-9 col-8">
                                        <div class="row">
                                            <div class="col">
                                                <ul class="cart-product-info">
                                                    <li>กล่องใส่อาหาร ทรงเหลี่ยม 3 ช่อง</li>
                                                    <li>25 ชุด</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <button class="button-remove">
                                                    <span>REMOVE</span>
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <div class="d-md-block d-lg-none">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="price">฿ 212</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="content-center">
                                                        <div class="sp-quantity">
                                                            <div class="sp-minus btnquantity"><i class="fas fa-minus"></i></div>
                                                            <div class="sp-input">
                                                                <input type="text" class="quntity-input" value="1" />
                                                            </div>
                                                            <div class="sp-plus btnquantity"><i class="fas fa-plus"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 d-none d-md-none d-lg-block">
                                        <div class="middle-center">
                                            <div class="price">฿ 212</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 d-none d-md-none d-lg-block qty">
                                        <div class="middle-center">
                                            <div class="sp-quantity">
                                                <div class="sp-minus btnquantity"><i class="fas fa-minus"></i></div>
                                                <div class="sp-input">
                                                    <input type="text" class="quntity-input" value="1" />
                                                </div>
                                                <div class="sp-plus btnquantity"><i class="fas fa-plus"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 d-none d-md-none d-lg-block">
                                        <div class="middle-center">
                                            <div class="price">฿ 212</div>
                                        </div>
                                    </div>
                                </div>
                            </div>*/ ?>

                            <div class="coupon-section cart-page">
                                <div class="row">
                                    <div class="col-xl-8 col-lg-8 col-md-7 col-12">
                                        <p><?php echo get2Lang($this->session->userdata('lang'), 'คูปอง', 'Coupon');?></p>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-5 col-12">
                                        <div class="input-group">
                                            <input type="text" id="coupon_code" class="form-control" placeholder="<?php echo get2Lang($this->session->userdata('lang'), 'กรอกรหัสคูปอง', 'Enter Coupon Code');?>" aria-describedby="coupon-code" value="<?php echo $this->session->userdata('coupon_code');?>">
                                            <button class="buttonBK" type="button" id="coupon-code" onclick="checkCoupon();"><?php echo get2Lang($this->session->userdata('lang'), 'ยืนยัน', 'Confirm');?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CART :: SUB TOTAL -->
                        <div class="cart-form pad">
                            <div class="row">
                                <div class="col-lg-7 col-md-7 col-8"><?php echo get2Lang($this->session->userdata('lang'), 'ราคาสินค้า', 'Sub Total');?></div>
                                <div class="col-lg-5 col-md-5 col-4">฿ <span class="sub_total_price"><?php echo number_format($sub_total, 2, '.', ',');?></span></div>
                            </div>
<?php
$shipping = 0;
?>
                            <!-- <div class="row">
                                <div class="col-lg-7 col-md-7 col-8"><?php echo get2Lang($this->session->userdata('lang'), 'ค่าขนส่ง', 'Shipping');?></div>
                                <div class="col-lg-5 col-md-5 col-4">฿ <span class="shipping_price"><?php echo number_format($shipping, 2, '.', ',');?></span></div>
                            </div> -->
<?php
$discount = $this->session->userdata('coupon_price') + $this->session->userdata('multiple_price_level_discount') + $this->session->userdata('special_promotion_rule_discount') + $this->session->userdata('discount_category_discount') + $this->session->userdata('data_point_discount') + $this->session->userdata('vip_discount_price');
?>
                            <div class="row">
                                <div class="col-lg-7 col-md-7 col-8"><?php echo get2Lang($this->session->userdata('lang'), 'ส่วนลด', 'Discount');?> 
                                    <span id="coupon">
<?php
if($this->session->userdata('coupon_price') != '') {
?>
                                        <br>(Coupon: <?php echo number_format($this->session->userdata('coupon_price'), 2, '.', ',');?> <?php echo get2Lang($this->session->userdata('lang'), 'บาท', 'Baht');?>
<?php
}
?>
                                    </span> 
                                    <span id="multiple_price_level">
<?php
if($this->session->userdata('multiple_price_level_discount') != '') {
?>
                                        <br>(Multiple Price Level: <?php echo number_format($this->session->userdata('multiple_price_level_discount'), 2, '.', ',');?> <?php echo get2Lang($this->session->userdata('lang'), 'บาท', 'Baht');?>
<?php
}
?>
                                    </span> 
                                    <span id="special_promotion_rule">
<?php
if($this->session->userdata('special_promotion_rule_discount') != '') {
?>
                                        <br>(Promotion Special Rule: <?php echo number_format($this->session->userdata('special_promotion_rule_discount'), 2, '.', ',');?> <?php echo get2Lang($this->session->userdata('lang'), 'บาท', 'Baht');?>
<?php
}
?>
                                    </span> 
                                    <span id="discount_category">
<?php
if($this->session->userdata('discount_category_discount') != '') {
?>
                                        <br>(Discount Category Rule: <?php echo number_format($this->session->userdata('discount_category_discount'), 2, '.', ',');?> <?php echo get2Lang($this->session->userdata('lang'), 'บาท', 'Baht');?>
<?php
}
?>
                                    </span> 
                                    <span id="data_point">
<?php
if($this->session->userdata('data_point_discount') != '') {
?>
                                        <br>(Data Point : <?php echo number_format($this->session->userdata('data_point_discount'), 2, '.', ',');?> <?php echo get2Lang($this->session->userdata('lang'), 'บาท', 'Baht');?>
<?php
}
?>
                                    </span> 
                                    <span id="vip_discount">
<?php
if($this->session->userdata('vip_discount_price') != '') {
?>
                                        <br>(VIP: <?php echo number_format($this->session->userdata('vip_discount_price'), 2, '.', ',');?> <?php echo get2Lang($this->session->userdata('lang'), 'บาท', 'Baht');?>
<?php
}
?>
                                    </span></div>
                                <div class="col-lg-5 col-md-5 col-4">฿ <span class="discount_price"><?php echo number_format($discount, 2, '.', ',');?></span></div>
                            </div>
<?php 
$total = $sub_total + $shipping - $discount;
?>
                            <div class="row">
                                <div class="col-lg-7 col-md-7 col-8"><?php echo get2Lang($this->session->userdata('lang'), 'รวม', 'Total');?></div>
                                <div class="col-lg-5 col-md-5 col-4">฿ <span class="total_price"><?php echo number_format($total, 2, '.', ',');?></span></div>
                            </div>
                        </div>

                        <!-- CART :: CHECKOUT SECTION -->
                        <div class="checkout-section">
                            <div class="button-pair">
                                <div class="row">
                                    <div class="col">
                                        <a class="buttonG" href="<?php if(!empty($category_product_first)) echo site_url('product_category/'.$category_product_first->category1_id);?>"><?php echo get2Lang($this->session->userdata('lang'), 'เลือกดูสินค้าต่อ', 'Continue to view products');?></a>

                                        <a class="buttonR" href="javascript:checkMemberId();"><?php echo get2Lang($this->session->userdata('lang'), 'สั่งซื้อสินค้า', 'Order Now');?></a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="topBD red"></div>

    <!---------- RECOMMENDED PRODUCTS ---------->
    <div class="content-padding">
        <div class="container-fluid">
			<div class="wrap-pad">
                <div class="row">
					<div class="col">
                        <h2>RECOMMENDED PRODUCTS</h2>
                    </div>
                </div>
                <div class="row">
					<div class="col">
                        <div class="slide-navButton">
                            <div class="product-slide owl-carousel owl-theme nav-out BD-none">
<?php
if(!empty($recommended)) {
    foreach($recommended as $r) {
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
                                                <a class="product-img" href="<?php echo site_url('product-detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-f02.jpg');?>"></a>
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
                                                <button type="button" class="button-cart" data-toggle="modal" data-target="#addCart-option"><span>ADD TO CART</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="productBox">
                                        <div class="row">
                                            <div class="col">
                                                <a class="product-img" href="<?php echo site_url('product-detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-m02.jpg');?>"></a>
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
                                                <button type="button" class="button-cart" data-toggle="modal" data-target="#addCart-option"><span>ADD TO CART</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="productBox">
                                        <div class="row">
                                            <div class="col">
                                                <a class="product-img" href="<?php echo site_url('product-detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-h01.jpg');?>"></a>
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
                                                <button type="button" class="button-cart" data-toggle="modal" data-target="#addCart-option"><span>ADD TO CART</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="items">
                                    <div class="productBox">
                                        <div class="row">
                                            <div class="col">
                                                <a class="product-img" href="<?php echo site_url('product-detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-f04.jpg');?>"></a>
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
                                                <button type="button" class="button-cart" data-toggle="modal" data-target="#addCart-option"><span>ADD TO CART</span></button>
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
        // QTY //
        /*$(document).ready(function() {
            $(".btnquantity").on("click", function () {
                var $button = $(this);
                var oldValue = $button.closest('.sp-quantity').find("input.quntity-input").val();
                if ($button.hasClass("sp-plus")) {
                    var newVal = parseFloat(oldValue) + 1;
                } else {
                    if (oldValue > 1) {
                        var newVal = parseFloat(oldValue) - 1;
                    } else {
                        newVal = 1;
                    }
                }
                $button.closest('.sp-quantity').find("input.quntity-input").val(newVal);
            });
        });*/

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

                $("#coupon").html(data_split[8]);
                $("#multiple_price_level").html(data_split[9]);
                $("#special_promotion_rule").html(data_split[10]);
                $("#discount_category").html(data_split[11]);
                $("#data_point").html(data_split[12]);
                $("#vip_discount").html(data_split[13]);

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

                $("#coupon").html(data_split[8]);
                $("#multiple_price_level").html(data_split[9]);
                $("#special_promotion_rule").html(data_split[10]);
                $("#discount_category").html(data_split[11]);
                $("#data_point").html(data_split[12]);
                $("#vip_discount").html(data_split[13]);

                window.location.href = '<?php echo site_url('cart');?>';
            });
        }
        // End Copy Basket

        function decreaseCart(rowid) {
            var qty = $(".qty-" + rowid).val();

            if(qty > 1) {
                qty--;

                $.post('<?php echo site_url("frontend/path/ajaxUpdateCart");?>', { rowid: rowid, qty: qty }, function(data) {
                    var data_split = data.split('!@#$%^&*()');

                    $(".qty-" + rowid).val(qty);

                    $(".inc_qty_basket").html(data_split[0]);
                    $(".sub_total_price").html(data_split[1]);
                    $(".shipping_price").html(data_split[2]);
                    $(".discount_price").html(data_split[3]);
                    $(".total_price").html(data_split[4]);
                    $(".cart_basket").html(data_split[5]);

                    $("#coupon").html(data_split[8]);
                    $("#multiple_price_level").html(data_split[9]);
                    $("#special_promotion_rule").html(data_split[10]);
                    $("#discount_category").html(data_split[11]);
                    $("#data_point").html(data_split[12]);
                    $("#vip_discount").html(data_split[13]);
                });
            }
        }

        function increaseCart(rowid) {
            var qty = $(".qty-" + rowid).val();

            qty++;

            $.post('<?php echo site_url("frontend/path/ajaxUpdateCart");?>', { rowid: rowid, qty: qty }, function(data) {
                var data_split = data.split('!@#$%^&*()');

                $(".qty-" + rowid).val(qty);

                $(".inc_qty_basket").html(data_split[0]);
                $(".sub_total_price").html(data_split[1]);
                $(".shipping_price").html(data_split[2]);
                $(".discount_price").html(data_split[3]);
                $(".total_price").html(data_split[4]);
                $(".cart_basket").html(data_split[5]);

                $("#coupon").html(data_split[8]);
                $("#multiple_price_level").html(data_split[9]);
                $("#special_promotion_rule").html(data_split[10]);
                $("#discount_category").html(data_split[11]);
                $("#data_point").html(data_split[12]);
                $("#vip_discount").html(data_split[13]);
            });
        }

        function changeQty(rowid, qty) {
            $.post('<?php echo site_url("frontend/path/ajaxUpdateCart");?>', { rowid: rowid, qty: qty }, function(data) {
                var data_split = data.split('!@#$%^&*()');

                $(".qty-" + rowid).val(qty);

                $(".inc_qty_basket").html(data_split[0]);
                $(".sub_total_price").html(data_split[1]);
                $(".shipping_price").html(data_split[2]);
                $(".discount_price").html(data_split[3]);
                $(".total_price").html(data_split[4]);
                $(".cart_basket").html(data_split[5]);

                $("#coupon").html(data_split[8]);
                $("#multiple_price_level").html(data_split[9]);
                $("#special_promotion_rule").html(data_split[10]);
                $("#discount_category").html(data_split[11]);
                $("#data_point").html(data_split[12]);
                $("#vip_discount").html(data_split[13]);
            });
        }

        function removeCart(rowid) {
            if(confirm('Confirm Delete') == true) {
                $.post('<?php echo site_url("frontend/path/ajaxRemoveCart");?>', { rowid: rowid }, function(data) {
                    var data_split = data.split('!@#$%^&*()');

                    $(".inc_qty_basket").html(data_split[0]);
                    $(".sub_total_price").html(data_split[1]);
                    $(".shipping_price").html(data_split[2]);
                    $(".discount_price").html(data_split[3]);
                    $(".total_price").html(data_split[4]);
                    $(".cart_basket").html(data_split[5]);

                    $("#coupon").html(data_split[8]);
                    $("#multiple_price_level").html(data_split[9]);
                    $("#special_promotion_rule").html(data_split[10]);
                    $("#discount_category").html(data_split[11]);
                    $("#data_point").html(data_split[12]);
                    $("#vip_discount").html(data_split[13]);

                    //window.location.href = '<?php echo site_url("cart");?>';
                });
            }
        }

        function checkMemberId() {
            $.post('<?php echo site_url('frontend/path/ajaxCheckMemberId');?>', function(data) {
                if(data == 'true') {
                    window.location.href = '<?php echo site_url("shipping_payment");?>';
                } else {
                    alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณาเข้าสู่ระบบ', 'Please Login');?>');

                    window.location.href = '<?php echo site_url("login");?>';
                }
            });
        }

        function checkCoupon() {
            if($("#coupon_code").val() == '') {
                alert('<?php echo get2Lang($this->session->userdata('lang'), 'กรุณากรอกรหัสคูปอง', 'Please enter Coupon');?>');

                $("#coupon_code").focus();
            } else {
                $.post('<?php echo site_url("frontend/path/ajaxCoupon");?>', { coupon_code: $("#coupon_code").val() }, function(data) {
                    var data_split = data.split('!@#$%^&*()');

                    if(data_split[6] != '') {
                        $(".inc_qty_basket").html(data_split[0]);
                        $(".sub_total_price").html(data_split[1]);
                        $(".shipping_price").html(data_split[2]);
                        $(".discount_price").html(data_split[3]);
                        $(".total_price").html(data_split[4]);
                        $(".cart_basket").html(data_split[5]);
                    } else {
                        $(".inc_qty_basket").html(data_split[0]);
                        $(".sub_total_price").html(data_split[1]);
                        $(".shipping_price").html(data_split[2]);
                        $(".discount_price").html(data_split[3]);
                        $(".total_price").html(data_split[4]);
                        $(".cart_basket").html(data_split[5]);
                        
                        alert('<?php echo get2Lang($this->session->userdata('lang'), 'รหัสส่วนลดคูปองไม่ถูกต้อง', 'Incorrect Coupon Code');?>');

                        $("#coupon_code").val('');
                    }

                    $("#coupon").html(data_split[8]);
                    $("#multiple_price_level").html(data_split[9]);
                    $("#special_promotion_rule").html(data_split[10]);
                    $("#discount_category").html(data_split[11]);
                    $("#data_point").html(data_split[12]);
                    $("#vip_discount").html(data_split[13]);
                });
            }
        }
    </script>

</body>
</html>