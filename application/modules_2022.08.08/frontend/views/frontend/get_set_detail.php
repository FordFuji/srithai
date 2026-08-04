<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php require('inc_header.php'); $pageName="product"; ?> 
    <!-- OwlCarousel -->
    <link rel="stylesheet" href="<?php echo base_url('asset/frontend/OwlCarousel/owl.carousel.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('asset/frontend/OwlCarousel/owl.theme.default.min.css');?>">
    <!-- FANCYBOX -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css"/>
</head>
<body>
    <?php require('inc_topmenu.php'); ?>

    <!---------- PRODUCT - DETAIL ---------->
    <div class="content-padding">
        <div class="container-fluid">
            <div class="wrap-pad">
                <div class="product-info-section">
                    <div class="row justify-content-center">
                        <!---------- PRODUCT :: GALLERY ---------->
                        <div class="col-xl-5 col-lg-6 col-md-8 col-12">
                            <div class="productGal-slide detail_slide">
                                <div class="owl-carousel owl-theme big-img slider">
                                    <img src="<?php echo base_url('uploads/get_set/'.$row->get_set_image);?>">
                                </div>
                            </div>
                        </div>
                        <!---------- PRODUCT :: INFO ---------->
                        <div class="col-xl-7 col-lg-6 col-md-11 col-12">
                            <div class="product-info">
                                <div class="row">
                                    <div class="col">
                                        <h3><?php if(!empty($row)) echo get2Lang($this->session->userdata('lang'), $row->get_set_name_th, $row->get_set_name_en);?></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="price">THB <?php if(!empty($row)) echo number_format($row->get_set_price, 0, '.', ',');?></div>
                                        <?php /*<div class="full-price">THB <?php if(!empty($row)) echo number_format($row->product_price_before_discount, 0, '.', ',');?></div>
                                        <div class="discount">(Save THB <?php if(!empty($row)) echo number_format($row->product_price_before_discount - $row->product_price, 0, '.', ',');?>)</div>*/ ?>
                                    </div>
                                </div>
                                
                                <!--<div class="row">
                                    <div class="col">
                                        <ul class="product-rating">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star-half-alt"></i></li>
                                        </ul>
                                    </div>
                                </div>-->
                            </div>

                            <div class="product-info">
                                <!-- COLOR -->
                                <div class="cart-button-part">
                                    <div class="row">
                                        <div class="col">
                                            <div class="sp-quantity big">
                                                <div class="sp-minus btnquantity decrease_<?php echo $row->get_set_id;?>" onclick="decrease('<?php echo $row->get_set_id;?>');"><i class="fas fa-minus"></i></div>
                                                <div class="sp-input">
                                                    <input type="text" class="quntity-input" id="qty_<?php echo $row->get_set_id;?>" value="1" />
                                                </div>
                                                <div class="sp-plus btnquantity" increase_<?php echo $row->get_set_id;?>" onclick="increase('<?php echo $row->get_set_id;?>');"><i class="fas fa-plus"></i></div>
                                            </div>
                                            <button class="buttonR big" onclick="addToCartSet('<?php echo $row->get_set_id;?>');"><i class="fas fa-shopping-cart"></i>ADD TO CART</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!---------- PRODUCT :: DESCRIPTION ---------->
                            <div class="row">
                                <div class="col">
                                    <div class="product-info-acc">
                                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                            <div class="panel panel-default">
                                                <!-- DETAIL -->
                                                <div class="panel-heading active" role="tab">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#p-detail" aria-expanded="true">Detail</a>
                                                </div>
                                                <div id="p-detail" class="panel-collapse collapse show" role="tabpanel" data-parent="#accordion">
                                                    <div class="panel-body">
                                                        <?php if(!empty($row)) echo get2Lang($this->session->userdata('lang'), $row->get_set_detail_th, $row->get_set_detail_en);?>
                                                        <?php /*<div class="txt-content">
                                                            <p>Srithai Superware ปิ่นโตเมลามีน ทรงกลม 3 ชั้น ลายลิขสิทธิ์ SNOOPY VACATION</p>
                                                        </div>
                                                        <ul class="list-content">
                                                            <li>ชุดปิ่นโตเมลามีนกลม 3 ชั้น สินค้าลิขสิทธิ์ SNOOPY VACATION</li>
                                                            <li>ขนาด Ø 12 cm สูง 22.5 cm ปริมาณบรรจุ 480 ml. ต่อชั้น</li>
                                                            <li>วัตถุดิบ เมลามีนแท้ 100%</li>
                                                            <li>ผลิตโดยโรงงานบจ. ศรีไทยซุปเปอร์แวร์ โคราชที่ได้รับ มอก. เลขที่ 2921-2562</li>
                                                            <li>เมลามีนของเราปลอดภัยสำหรับใส่อาหาร (Food Contact Grade)</li>
                                                            <li>ไม่ทำปฏิกิริยาต่อสารเคมี ทนกรด ทนด่าง และปราศจากสาร BPA Fee</li>
                                                            <li>ได้รับมาตรฐาน NFS ทนความร้อนได้สูงถึง 100 องศาเซลเซียส</li>
                                                            <li>ผ่านการทดลองจากสถานบันทดสอบนานาชาติสามารถใส่น้ำร้อนและอาหารร้อนได้</li>
                                                            <li>มีความทนทานต่อแรงกระแทกได้ดี และไม่แตกหักง่าย</li>
                                                            <li>เหมาะสำหรับ เด็ก ผู้สูงอายุ และร้านอาหาร ที่เน้นความทนทานของสินค้า</li>
                                                            <li>สามารถใช้ได้กับเครื่องล้างจานทุกประเภท</li>
                                                            <li>ไม่แนะนำให้เข้าไมโครเวฟ และอยู่ใกล้เปลวไฟ</li>
                                                        </ul>*/ ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="topBD"></div>

    <!---------- PRODUCTS :: OTHERS INFO  ---------->
    <?php /*<div class="content-padding">
        <div class="container-fluid">
			<div class="wrap-pad">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-11 col-12">
                        <div class="row">
                            <div class="col">
                                <h5 class="cube">Product Specifications</h5>
                            </div>
                        </div>
                        <div class="row">
                            <?php if(!empty($row)) echo get2Lang($this->session->userdata('lang'), $row->product_specifications_th, $row->product_specifications_en);?>
                            <?php /*<div class="col">
                                <div class="txt-content mb-3">
                                    <p>Suitable for inside the house, hotel, restaurant, outside various places</p>
                                </div>

                                <ul class="list-content w-half more-mb4">
                                    <li>Suitable for food, shallow dishes, easy to clean.</li>
                                    <li>Clear, special shine like ceramic</li>
                                    <li>Melamine products from Melamineware are 100% melamine, heat resistant to 100 degrees.</li>
                                    <li>Melamine is lightweight, crack resistant, does not react with chemicals. and can be washed in the dishwasher</li>
                                    <li>Melamine products Cannot be used in the microwave</li>
                                    <li>Economical price</li>
                                </ul>

                            </div>*/ ?>
                        <?php /*</div>

                        <div class="row">
                            <div class="col">
                                <h5 class="cube">Product details</h5>
                            </div>
                        </div>
                        <?php if(!empty($row)) echo get2Lang($this->session->userdata('lang'), $row->product_details_th, $row->product_details_en);?>
                        <?php /*<div class="row">
                            <div class="col">
                                <div class="txt-content more-mb3">
                                    <p>สเตเดียม ดีลเลอร์ พันธุวิศวกรรม อันเดอร์อุปสงค์ซาดิสม์อิสรชนกับดัก สจ๊วต โปรดิวเซอร์ซูโม่ โอเปร่าเฟิร์มอีสต์ ทาวน์เฮาส์แฟรี่เก๊ะ เอสเพรสโซ ราเมนแฟนตาซีโต๊ะจีนแอพพริคอท เทอร์โบคอนโทรลวอล์กนรีแพทย์ฟลุท โอเลี้ยง โคโยตี้ โปรออร์แกนิก ดีพาร์ตเมนต์ ห่วย อีสต์มอคค่าสัมนาสเตเดียม อุตสาหการโทรภควัทคีตา แชมเปี้ยนสแตนเลสสุริยยาตร์ โทรเฮอร์ริเคนโดมิโน สกรัมเทคโนแครตโปรโมเตอร์ โซนเนิร์สเซอรีละตินแอ็คชั่นหลวงตา โบกี้ท็อปบูตแอดมิสชันบอมบ์ฮอตดอก เกรดซันตาคลอสสวีทเสกสรรค์แฟรี จีดีพีศิลปากรเดบิต สะกอม ซาดิสม์ฮอตดอกวิปโยโย่แฟรนไชส์ เทคโนแครตไลท์วิลล์ทริปคลับ เยลลี่เดบิต ดยุค ดีพาร์ตเมนท์ซากุระพาสเจอร์ไรส์ ไอซ์ ศิรินทร์พุทธศตวรรษซัมเมอร์ ฮิโบรชัวร์ทัวร์ อาว์คอมเมนท์</p>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-10 col-md-12 col-12">
                                <div class="img-width more-mb3"><img src="<?php echo base_url('asset/frontend/images/product/product-detail01.jpg');?>"></div>
                            </div>
                        </div>*/ ?>

                        <?php  /*<div class="row">
                            <div class="col">
                                <div class="content-center">
                                    <a class="buttonBD" href="<?php echo site_url('product-category');?>">ย้อนกลับ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="topBD red"></div>

    <!---------- SIMILAR PRODUCTS ---------->
    <div class="content-padding">
        <div class="container-fluid">
			<div class="wrap-pad">
                <div class="row">
					<div class="col">
                        <h2>Similar products</h2>
                    </div>
                </div>
                <div class="row">
					<div class="col">
                        <div class="slide-navButton">
                            <div class="product-slide owl-carousel owl-theme nav-out BD-none">
<?php
if(!empty($similar)) {
    foreach($similar as $r) {
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
                                                <div class="price">THB <?php echo number_format($r->product_price, 0, '.', ',');?></div>
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
                                                <button type="button" class="button-cart" onclick="alert('Out of Stock');"><span>ADD TO CART</span></button>

<?php
            } else {
?>
                                                <button type="button" class="button-cart" data-toggle="modal" data-target="#addCart-option-<?php echo $r->product_id;?>"><span>ADD TO CART</span></button>
<?php
            }
        } elseif($color_size == false) {
            if($r->product_stock <= 0) {
?>
                                                <button type="button" class="button-cart" onclick="alert('Out of Stock');"><span>ADD TO CART</span></button>

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
                                                <a class="product-img" href="product-detail.php"><img src="images/product/product-f02.jpg"></a>
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
                                                <a class="product-img" href="product-detail.php"><img src="images/product/product-m02.jpg"></a>
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
                                                <a class="product-img" href="product-detail.php"><img src="images/product/product-h01.jpg"></a>
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
                                                <a class="product-img" href="product-detail.php"><img src="images/product/product-f04.jpg"></a>
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
                            <?php /*</div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>*/ ?>

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
    <!-- FANCYBOX -->
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

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

        // collapse //
        $(document).ready(function() {
            $('.collapse.in').prev('.panel-heading').addClass('active');
            $('#accordion, #accordion2')
                .on('show.bs.collapse', function(a) {
                $(a.target).prev('.panel-heading').addClass('active');
            })
                .on('hide.bs.collapse', function(a) {
                $(a.target).prev('.panel-heading').removeClass('active');
            });
        });

        // PRODUCT - GALLERY //
        $('.detail_slide').each(function(){
            (function(_e){
        var sync1 = $(_e).find(".slider");
        var sync2 = $(_e).find(".navigation-thumbs");

        var thumbnailItemClass = '.owl-item';

        var slides = sync1.owlCarousel({
            video: true,
            startPosition: 0,
            items: 1,
            animateOut: 'fadeOut',
            loop: false,
            rewind: true,
            margin: 0,
            autoplay: false,
            autoplayHoverPause: true,
            autoplayTimeout: 7000,
            smartSpeed: 500,
            autoplayHoverPause: true,
            navText: [
                '<span><i class="fas fa-chevron-left"></i></span>',
                '<span><i class="fas fa-chevron-right"></i></span>'
            ],
            nav: true,
            dots: false
        }).on('changed.owl.carousel', syncPosition);

        function syncPosition(el) {
            $owl_slider = $(this).data('owl.carousel');
            var loop = $owl_slider.options.loop;

            if(loop){
            var count = el.item.count-1;
            var current = Math.round(el.item.index - (el.item.count/2) - .5);
            if(current < 0) {
                current = count;
            }
            if(current > count) {
                current = 0;
            }
            }else{
            var current = el.item.index;
            
            }
            console.log(current);

            var owl_thumbnail = sync2.data('owl.carousel');
            var itemClass = "." + owl_thumbnail.options.itemClass;


            var thumbnailCurrentItem = sync2
            .find(itemClass)
            .removeClass("synced")
            .eq(current);

            thumbnailCurrentItem.addClass('synced');

            //if (!thumbnailCurrentItem.hasClass('active')) {
            var duration = 300;
            sync2.trigger('to.owl.carousel',[current-2, duration, true]);
            //}   
        }
        var thumbs = sync2.owlCarousel({
            startPosition: 0,
            items: 3,
            loop: false,
            margin: 15,
            autoplay: false,
            autoplayHoverPause: true,
            nav: true,
            navText: false,
            dots: false,
            responsive:{
                0:{
                    margin: 8
                },
                500:{
                    margin: 8
                },
                768:{
                    margin: 10
                },
                991:{
                    margin: 12
                },
                1201:{
                    margin: 15
                }
            },
            onInitialized: function (e) {
            var thumbnailCurrentItem =  $(e.target).find(thumbnailItemClass).eq(this._current);
            thumbnailCurrentItem.addClass('synced');
            },
        })
        
        .on('click', thumbnailItemClass, function(e) {
            e.preventDefault();
            var duration = 300;
            var itemIndex =  $(e.target).parents(thumbnailItemClass).index();
            sync1.trigger('to.owl.carousel',[itemIndex, duration, true]);
        }).on("changed.owl.carousel", function (el) {
            //var number = el.item.index;
            //$owl_slider = sync1.data('owl.carousel');
            //$owl_slider.to(number, 100, true);
        });
        })(this);
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
            $.post('<?php echo site_url("frontend/path/ajaxInsertCartSet");?>', { get_set_id: get_set_id, qty: $("#qty_" + get_set_id).val() }, function(data) {
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