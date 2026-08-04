<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php require('inc_header.php'); $pageName="product"; ?> 
    <!-- OwlCarousel -->
    <link rel="stylesheet" href="<?php echo base_url('asset/frontend/OwlCarousel/owl.carousel.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('asset/frontend/OwlCarousel/owl.theme.default.min.css');?>">
    <!-- SELECT2 -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" /> -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>
    <?php require('inc_topmenu.php'); ?>

    <!---------- PRODUCT - CATEGORY :: BANNER ---------->
    <div class="container-fluid">
        <div class="row">
            <div class="col px-0">
                <div class="slide-navButton nav-in">
                    <div class="main-banner owl-carousel owl-theme">
<?php
if(!empty($banner)) {
    foreach($banner as $r) {
?>
                        <div class="items"><img src="<?php echo base_url('uploads/category1/'.$r->map_category1_banner);?>"></div>
<?php
    }
}
?>
                        <?php /*<div class="items"><img src="<?php echo base_url('asset/frontend/images/product/banner-category01.jpg');?>"></div>
                        <div class="items"><img src="<?php echo base_url('asset/frontend/images/product/banner-category02.jpg');?>"></div>
                        <div class="items"><img src="<?php echo base_url('asset/frontend/images/product/banner-category03.jpg');?>"></div>*/ ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!---------- PRODUCT - CATEGORY ---------->
    <div class="content-padding foot-pad">
        <div class="container-fluid">
			<div class="wrap-pad">

                <div class="category-header">
                    <div class="row">
                        <div class="col-xl-9 col-lg-8 col-md-7 col-12">
                            <h3><?php if(!empty($category1)) echo get2Lang($this->session->userdata('lang'), $category1->category1_name_th, $category1->category1_name_en);?></h3>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-5 col-12">
                            <!-- SEARCH :: IPAD & MOBILE -->
                            <div class="d-none d-md-none d-lg-block">
                                <div class="input-group search">
                                    <input type="search" class="form-control shadow-none" placeholder="search product" id="search_product1" value="<?php if($this->session->userdata('search_inc') != '') echo $this->session->userdata('search_inc');?>">
                                    <div class="input-group-append">
                                        <button type="button" class="btn" onclick="searchProduct1();"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- SUB CATEGORY & SEARCH :: IPAD & MOBILE -->
                            <div class="sub-category-select d-block d-sm-block d-lg-none">
                                <div class="select2-part mb-0">
                                    <select class="js-example-basic-single form-control wrap" name="sub-category" onchange="window.location.href='<?php echo site_url('product_category/'.$category1_id);?>/' + this.value";>
                                        <option value=""><?php echo get2Lang($this->session->userdata('lang'), 'ค้นหาผลิตภัณฑ์', 'Search Product');?></option>
                                        <option value="<?php echo $category2_id;?>" <?php if($category2_id == '') echo 'selected';?>><?php echo get2Lang($this->session->userdata('lang'), 'ผลิตภัณฑ์ทั้งหมด', 'All Product');?></option>
<?php
if(!empty($category2)) {
    foreach($category2 as $r) {
?>
                                        <option value="<?php echo $r->category2_id;?>" <?php if($category2_id == $r->category2_id) echo 'selected';?>><?php echo get2Lang($this->session->userdata('lang'), $r->category2_name_th, $r->category2_name_en);?></option>
                                        <!-- <option value="<?php echo $r->category2_id.'/'.$r->product_id;?>" <?php if($product_id == $r->product_id) echo 'selected';?>><?php echo get2Lang($this->session->userdata('lang'), $r->product_name_th, $r->product_name_en);?></option> -->
<?php
    }
}
?>
                                        <?php /*<option>กระบอกน้ำ 18 Oz. พร้อมฝา ขนาด 3.5 นิ้ว ลายลิขสิทธิ์ SNOOPY BONJOUR SWEETIE</option>
                                        <option>ชุดเมลามีนเด็ก 5 ชิ้น ลายลิขสิทธิ์ SNOOPY VACATION</option>
                                        <option>ชุดกล่องถนอมอาหาร ทรงสี่เหลี่ยม พร้อมฝา ลายลิขสิทธิ์ SNOOPY BONJOUR SWEETIE</option>
                                        <option>ถ้วยเมลามีนมีหู พร้อมฝา ขนาด 5.25 นิ้ว ลายลิขสิทธิ์ SNOOPY BONJOUR SWEETIE</option>
                                        <option>ถ้วยน้ำมีหู พร้อมฝา ขนาด 4 นิ้ว ลายลิขสิทธิ์ SNOOPY BONJOUR SWEETIE</option>
                                        <option>ปิ่นโตเมลามีน ทรงกลม 3 ชั้น ลายลิขสิทธิ์ SNOOPY VACATION</option>
                                        <option>อื่นๆ</option>*/ ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                
                <div class="category-page">
                    <div class="row">
                        <!---------- CATEGORY :: SUB CATEGORY :: PC & IPAD-PRO ---------->
                        <div class="col-lg-3 d-none d-md-none d-lg-block">
                            <ul class="category-menu">
                                <li class="active"><a href="<?php echo site_url('product_category/'.$category1_id.'/0');?>"><?php echo get2Lang($this->session->userdata('lang'), 'ผลิตภัณฑ์ทั้งหมด', 'All Product');?></a></li>
<?php
if(!empty($category2)) {
    foreach($category2 as $r) {
?>
                                <li><a href="<?php echo site_url('product_category/'.$r->category1_id.'/'.$r->category2_id);?>" <?php if($r->category2_id == $category2_id) echo 'style="font-weight: bold;"';?>><?php echo get2Lang($this->session->userdata('lang'), $r->category2_name_th, $r->category2_name_en);?></a></li>
<?php
    }
}
?>
                                <?php /*<li><a href="<?php echo site_url('product_category');?>">กระบอกน้ำ 18 Oz. พร้อมฝา ขนาด 3.5 นิ้ว ลายลิขสิทธิ์ SNOOPY BONJOUR SWEETIE</a></li>
                                <li><a href="<?php echo site_url('product_category');?>">ชุดเมลามีนเด็ก 5 ชิ้น ลายลิขสิทธิ์ SNOOPY VACATION</a></li>
                                <li><a href="<?php echo site_url('product_category');?>">ชุดกล่องถนอมอาหาร ทรงสี่เหลี่ยม พร้อมฝา ลายลิขสิทธิ์ SNOOPY BONJOUR SWEETIE</a></li>
                                <li><a href="<?php echo site_url('product_category');?>">ถ้วยเมลามีนมีหู พร้อมฝา ขนาด 5.25 นิ้ว ลายลิขสิทธิ์ SNOOPY BONJOUR SWEETIE</a></li>
                                <li><a href="<?php echo site_url('product_category');?>">ถ้วยน้ำมีหู พร้อมฝา ขนาด 4 นิ้ว ลายลิขสิทธิ์ SNOOPY BONJOUR SWEETIE</a></li>
                                <li><a href="<?php echo site_url('product_category');?>">ปิ่นโตเมลามีน ทรงกลม 3 ชั้น ลายลิขสิทธิ์ SNOOPY VACATION</a></li>
                                <li><a href="<?php echo site_url('product_category');?>">อื่นๆ</a></li>*/ ?>
                            </ul>
                        </div>
                        <!---------- CATEGORY :: PRODUCT ---------->
                        <div class="col-lg-9 col-12">
                            <div class="row">
<?php
if(!empty($product)) {
    foreach($product as $r) {
?>
                                <div class="col-lg-4 col-md-4 col-6">
                                    <div class="productBox">
                                        <div class="row">
                                            <div class="col">
                                                <a class="product-img" href="<?php echo site_url('product_detail/'.$r->product_id);?>"><img src="<?php echo base_url('uploads/product/'.$r->product_image);?>"></a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="product-topic">
                                                    <p><?php echo get2Lang($this->session->userdata('lang'), $r->product_name_th, $r->product_name_en);?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="txt-content">
                                                    <p><?php echo get2Lang($this->session->userdata('lang'), $r->product_description_th, $r->product_description_en);?></p>
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
                                <?php /*<div class="col-lg-4 col-md-4 col-6">
                                    <div class="productBox">
                                        <div class="row">
                                            <div class="col">
                                                <a class="product-img" href="<?php echo site_url('product-detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-m01.jpg');?>"></a>
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
                                <div class="col-lg-4 col-md-4 col-6">
                                    <div class="productBox">
                                        <div class="row">
                                            <div class="col">
                                                <a class="product-img" href="<?php echo site_url('product-detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-m04.jpg');?>"></a>
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
                                <div class="col-lg-4 col-md-4 col-6">
                                    <div class="productBox">
                                        <div class="row">
                                            <div class="col">
                                                <a class="product-img" href="<?php echo site_url('product-detail');?>"><img src="<?php echo base_url('asset/frontend/images/product/product-m03.jpg');?>"></a>
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
                                </div>*/ ?>
                            </div>

                            <div class="doubleBD mt-4"></div>

                            <div class="row">
                                <div class="col">
                                    <div class="content-center">
                                        <nav aria-label="Page navigation example">
<?php
if(!empty($all_page)) {
?>
                                            <ul class="pagination">
                                                <li class="page-item">
                                                    <a class="page-link" href="<?php echo site_url('product_category/'.$category1_id.'/'.$category2_id.'?page=1');?>" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>
<?php
    for($i = 1; $i <= $all_page; $i++) {
?>
                                                <li class="page-item 
                                                <?php if(empty($_GET['page'])) { if($i == 1) echo 'active'; } 
                                                else { if($i == $_GET['page']) { echo 'active'; } }?>">
                                                <a class="page-link" href="<?php echo site_url('product_category/'.$category1_id.'/'.$category2_id.'?page='.$i);?>"><?php echo $i;?></a></li>
<?php
    }

    $i--;
?>
                                                <?php /*<li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>*/ ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="<?php echo site_url('product_category/'.$category1_id.'/'.$category2_id.'?page='.$i);?>" aria-label="Next">
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
    <!-- SELECT2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js');?>"></script>

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
            autoplayTimeout: 3500,
            smartSpeed: 3000,
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
                    items: 1,
                    slideBy: 1,
                    dots: false,
                    nav: true
                },
                640: {
                    items: 2,
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
                    items: 1,
                    slideBy: 1,
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

        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
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
        // End Copy Basket

        function searchProduct1() {
            $.post('<?php echo site_url("frontend/path/ajaxSearchProduct");?>', { search_inc: $("#search_product1").val() }, function(data) {
			window.location.href = '<?php echo site_url('search');?>';
		    });
        }
    </script>
</body>
</html>