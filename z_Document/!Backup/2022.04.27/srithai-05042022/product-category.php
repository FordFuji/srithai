<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php require('inc_header.php'); $pageName="product"; ?> 
    <!-- OwlCarousel -->
    <link rel="stylesheet" href="OwlCarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="OwlCarousel/owl.theme.default.min.css">
    <!-- SELECT2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
</head>
<body>
    <?php require('inc_topmenu.php'); ?>

    <!---------- PRODUCT - CATEGORY :: BANNER ---------->
    <div class="container-fluid">
        <div class="row">
            <div class="col px-0">
                <div class="slide-navButton nav-in">
                    <div class="main-banner owl-carousel owl-theme">
                        <div class="items"><img src="images/product/banner-category01.jpg"></div>
                        <div class="items"><img src="images/product/banner-category02.jpg"></div>
                        <div class="items"><img src="images/product/banner-category03.jpg"></div>
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
                            <h3>MELAMINE</h3>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-5 col-12">
                            <!-- SEARCH :: IPAD & MOBILE -->
                            <div class="d-none d-md-none d-lg-block">
                                <div class="input-group search">
                                    <input type="search" class="form-control shadow-none" placeholder="search product">
                                    <div class="input-group-append">
                                        <button type="button" class="btn"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- SUB CATEGORY & SEARCH :: IPAD & MOBILE -->
                            <div class="sub-category-select d-block d-sm-block d-lg-none">
                                <div class="select2-part mb-0">
                                    <select class="js-example-basic-single form-control wrap" name="sub-category">
                                        <option>ค้นหาผลิตภัณฑ์</option>
                                        <option>ผลิตภัณฑ์ทั้งหมด</option>
                                        <option>กระบอกน้ำ 18 Oz. พร้อมฝา ขนาด 3.5 นิ้ว ลายลิขสิทธิ์ SNOOPY BONJOUR SWEETIE</option>
                                        <option>ชุดเมลามีนเด็ก 5 ชิ้น ลายลิขสิทธิ์ SNOOPY VACATION</option>
                                        <option>ชุดกล่องถนอมอาหาร ทรงสี่เหลี่ยม พร้อมฝา ลายลิขสิทธิ์ SNOOPY BONJOUR SWEETIE</option>
                                        <option>ถ้วยเมลามีนมีหู พร้อมฝา ขนาด 5.25 นิ้ว ลายลิขสิทธิ์ SNOOPY BONJOUR SWEETIE</option>
                                        <option>ถ้วยน้ำมีหู พร้อมฝา ขนาด 4 นิ้ว ลายลิขสิทธิ์ SNOOPY BONJOUR SWEETIE</option>
                                        <option>ปิ่นโตเมลามีน ทรงกลม 3 ชั้น ลายลิขสิทธิ์ SNOOPY VACATION</option>
                                        <option>อื่นๆ</option>
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
                                <li class="active"><a href="product-category.php">ผลิตภัณฑ์ทั้งหมด</a></li>
                                <li><a href="product-category.php">กระบอกน้ำ 18 Oz. พร้อมฝา ขนาด 3.5 นิ้ว ลายลิขสิทธิ์ SNOOPY BONJOUR SWEETIE</a></li>
                                <li><a href="product-category.php">ชุดเมลามีนเด็ก 5 ชิ้น ลายลิขสิทธิ์ SNOOPY VACATION</a></li>
                                <li><a href="product-category.php">ชุดกล่องถนอมอาหาร ทรงสี่เหลี่ยม พร้อมฝา ลายลิขสิทธิ์ SNOOPY BONJOUR SWEETIE</a></li>
                                <li><a href="product-category.php">ถ้วยเมลามีนมีหู พร้อมฝา ขนาด 5.25 นิ้ว ลายลิขสิทธิ์ SNOOPY BONJOUR SWEETIE</a></li>
                                <li><a href="product-category.php">ถ้วยน้ำมีหู พร้อมฝา ขนาด 4 นิ้ว ลายลิขสิทธิ์ SNOOPY BONJOUR SWEETIE</a></li>
                                <li><a href="product-category.php">ปิ่นโตเมลามีน ทรงกลม 3 ชั้น ลายลิขสิทธิ์ SNOOPY VACATION</a></li>
                                <li><a href="product-category.php">อื่นๆ</a></li>
                            </ul>
                        </div>
                        <!---------- CATEGORY :: PRODUCT ---------->
                        <div class="col-lg-9 col-12">
                            <div class="row">
                                <?php for($i=0;$i<4;$i++){ ?>
                                <div class="col-lg-4 col-md-4 col-6">
                                    <div class="productBox">
                                        <div class="row">
                                            <div class="col">
                                                <a class="product-img" href="product-detail.php"><img src="images/product/product-m01.jpg"></a>
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
                                                <button type="button" class="button-cart" data-toggle="modal" data-target="#addCart-option"><span>ADD TO CART</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-6">
                                    <div class="productBox">
                                        <div class="row">
                                            <div class="col">
                                                <a class="product-img" href="product-detail.php"><img src="images/product/product-m04.jpg"></a>
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
                                                <button type="button" class="button-cart" data-toggle="modal" data-target="#addCart-option"><span>ADD TO CART</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-6">
                                    <div class="productBox">
                                        <div class="row">
                                            <div class="col">
                                                <a class="product-img" href="product-detail.php"><img src="images/product/product-m03.jpg"></a>
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
                                                <button type="button" class="button-cart" data-toggle="modal" data-target="#addCart-option"><span>ADD TO CART</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>

                            <div class="doubleBD mt-4"></div>

                            <div class="row">
                                <div class="col">
                                    <div class="content-center">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination">
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>
                                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Next">
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>
                                            </ul>
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


    <!-- MODAL :: ADD CART :: SIZE & COLOR -->
    <div class="modal fade form-modal" id="addCart-option" data-backdrop="static" data-keyboard="false" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row">
                        <div class="col">
                            <div class="product-topic">
                                <p>ปิ่นโตเมลามีน ทรงกลม 3 ชั้น ลายลิขสิทธิ์ SNOOPY VACATION</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="tag">Melamine</div>
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
                                <h6>SIZE</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="product-option">
                                    <div class="option-list">
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
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- COLOR -->
                        <div class="row">
                            <div class="col">
                                <h6>COLOR</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="product-option">
                                    <div class="option-list">
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
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="cart-button-part">
                            <div class="row">
                                <div class="col">
                                    <div class="sp-quantity big">
                                        <div class="sp-minus btnquantity"><i class="fas fa-minus"></i></div>
                                        <div class="sp-input">
                                            <input type="text" class="quntity-input" value="1" />
                                        </div>
                                        <div class="sp-plus btnquantity"><i class="fas fa-plus"></i></div>
                                    </div>

                                    <button class="buttonR big"><i class="fas fa-shopping-cart"></i>ADD TO CART</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
    
    <?php require('inc_footer.php'); ?>

    <!-- OwlCarousel -->
    <script src="OwlCarousel/owl.carousel.min.js"></script>
    <!-- SELECT2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

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

        // QTY //
        $(document).ready(function() {
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
        });
    </script>

</body>
</html>