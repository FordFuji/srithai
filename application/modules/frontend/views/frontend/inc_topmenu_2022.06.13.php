<?php
$menu_inc = $this->model_frontend->get_category1_result();
$contact_us_inc = $this->model_frontend->get_contact_us();
?>
<div class="thetop"></div>
<!--------------- HEADER --------------->
<div class="header">
	<div class="d-none d-lg-block">
		<div class="WH-header">
			<div class="container-fluid">
				<div class="wrap-pad">
					<div class="row">
						<div class="col">
							<ul class="top-menu">
								<li><a href="<?php echo site_url('member_order');?>">Product Status</a></li>
								<li><a href="<?php echo site_url('contact');?>">Contact us</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="red-header">
		<div class="container-fluid">
			<div class="wrap-pad">
				<div class="row">
					<div class="col-xl-3 col-lg-2 col-md-3 col-4">
						<a class="mainlogo" href="<?php echo site_url('index');?>"><img src="<?php echo base_url('asset/frontend/images/srithai-WHlogo.svg');?>"></a>
					</div>

					<div class="col-xl-5 col-lg-5 d-none d-lg-block">
						<!-- MAIN - MENU :: PC & IPAD PRO -->
						<ul class="mainmenu">
							<li><a href="<?php echo site_url('index');?>">HOME</a></li>
							<li class="main-sub">
								<a href="">OUR PRODUCTS</a>
								<div class="dropdown-container">
									<div class="img-container">
										<div class="img-containerBG"></div>
									</div>
									<div class="menu-container">
										<div class="row">
											<div class="col-4">
												<ul class="product-submenu big-txt">
													<li>
														<a href="product-category.php">
															<p>ALL PRODUCTS</p>
															<div class="img-hover"><img src="<?php echo base_url('asset/frontend/images/product/c-allproduct.jpg');?>"></div>
														</a>
													</li>
													<li>
														<a href="product-category.php">
															<p>PROMOTION</p>
															<div class="img-hover"><img src="<?php echo base_url('asset/frontend/images/product/c-promotion.jpg');?>"></div>
														</a>
													</li>
													<li>
														<a href="product-category.php">
															<p>RECOMMENDED</p>
															<div class="img-hover"><img src="<?php echo base_url('asset/frontend/images/product/c-reommended.jpg');?>"></div>
														</a>
													</li>
													<li>
														<a href="product-category.php">
															<p>NEW ARRIVALS</p>
															<div class="img-hover"><img src="<?php echo base_url('asset/frontend/images/product/c-newarrivals.jpg');?>"></div>
														</a>
													</li>
												</ul>
											</div>
											<div class="col-8">
												<div class="row">
													<div class="col">
														<h6>BY CATEGORY</h6>
													</div>
												</div>
												<div class="row">
													<div class="col">
														<ul class="product-submenu two-col">
<?php
if(!empty($menu_inc)) {
	foreach($menu_inc as $r_inc) {
?>
															<li>
																<a href="product-category.php">
																	<p><?php echo get2Lang($this->session->userdata('lang'), $r_inc->category1_name_th, $r_inc->category1_name_en);?></p>
																	<div class="img-hover"><img src="<?php echo base_url('asset/frontend/images/product/c-packaging2.jpg');?>"></div>
																</a>
															</li>
<?php
	}
}
?>
															<!-- <li>
																<a href="product-category.php">
																	<p>FURNITURE</p>
																	<div class="img-hover"><img src="images/product/c-furniture2.jpg"></div>
																</a>
															</li>
															<li>
																<a href="product-category.php">
																	<p>MELAMINE</p>
																	<div class="img-hover"><img src="images/product/c-melamine2.jpg"></div>
																</a>
															</li>
															<li>
																<a href="product-category.php">
																	<p>HOUSEWARE</p>
																	<div class="img-hover"><img src="images/product/c-houseware2.jpg"></div>
																</a>
															</li> -->
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li><a href="<?php echo site_url('article');?>">ARTICLES</a></li>
						</ul>
					</div>

					<div class="col-xl-4 col-lg-5 col-md-9 col-8">
						<!-- MAIN - MENU :: PC & IPAD PRO -->
						<ul class="mainmenu">
							<li><a href="<?php echo site_url('index');?>">HOME</a></li>
<?php
if(!empty($menu_inc)) {
	foreach($menu_inc as $r_inc) {
?>
							<li><a href="<?php echo site_url('product_category/'.$r_inc->category1_id);?>"><?php echo get2Lang($this->session->userdata('lang'), $r_inc->category1_name_th, $r_inc->category1_name_en);?></a></li>
<?php
	}
}
?>
							<?php /*<li><a href="<?php echo site_url('product_category');?>">Food Packaging</a></li>
							<li><a href="<?php echo site_url('product_category');?>">Furniture</a></li>
							<li><a href="<?php echo site_url('product_category');?>">Melamine</a></li>
							<li><a href="<?php echo site_url('product_category');?>">Houseware</a></li>*/ ?>
						</ul>
					</div>
					<div class="col-xl-3 col-lg-3 col-md-9 col-8">
						<!-- MAIN - MENU :: IPAD & MOBILE -->
						<div class="d-block d-md-block d-lg-none">
							<!-- HAMBURGER - MENU -->
							<button type="button" class="btn nav-menu" data-toggle="modal" data-target="#menu-mobile">
								<i class="fas fa-bars"></i>
							</button>

							<!-- Modal -->
							<div class="modal left fade" id="menu-mobile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-header">
										<a class="mainlogo" href="<?php echo site_url('index');?>"><img src="<?php echo base_url('asset/frontend/images/srithai-WHlogo.svg');?>"></a>
										<button type="button" class="close btn " data-dismiss="modal" aria-label="Close">
											<i class="fas fa-times"></i>
										</button>
									</div>

									<div class="modal-content pt-0">
										<!-- MAINMENU -->
										<div class="modal-body">
											<div id="menu">
												<div class="menu-box">
													<div class="menu-wrapper-inner">
														<div class="menu-wrapper">
															<div class="menu-slider">
																<div class="menu">
																	<ul class="menu-m">
																		<li class="gray-BG">
																			<div class="menu-item">
																				<!-- NOT LOGIN -->
<?php
if($this->session->userdata('member_id') == '') {
?>
																				<div class="menu-item"><a href="<?php echo site_url('login');?>"><i class="fas fa-lock"></i>LOGIN</a></div>

																				<!-- WHEN LOGIN :: MY ACCOUNT -->
<?php
} elseif($this->session->userdata('member_id') != '') {
?>
																				<a href="#" class="menu-anchor" data-menu="3">
																					<i class="fas fa-user-circle"></i>บัญชีของฉัน
																					<img class="detail" src="<?php echo base_url('asset/frontend/images/icon/icon-chevronR-WH.svg');?>">
																				</a>
<?php
}
?>
																			</div>
																		</li>
																		<li data-page="home">
																			<div class="menu-item"><a href="<?php echo site_url('index');?>">หน้าแรก</a></div>
																		</li>
																		<li data-page="product">
																			<div class="menu-item">
																				<a href="#" class="menu-anchor" data-menu="1">
																					ผลิตภัณฑ์ของเรา
																					<img class="detail" src="<?php echo base_url('asset/frontend/images/icon/icon-chevronR.svg');?>">
																				</a>
																			</div>
																		</li>
																		<li data-page="article">
																			<div class="menu-item"><a href="<?php echo site_url('article');?>">บทความ</a></div>
																		</li>
<?php
if($this->session->userdata('member_id') != '') {
?>										
																		<li data-page="contact">
																			<div class="menu-item"><a href="<?php echo site_url('contact');?>">ช่องทางติดต่อ</a></div>
																		</li>
																		<li data-page="method">
																			<div class="menu-item"><a href="<?php echo site_url('shipping_payment_method');?>">วิธีการจัดส่งสินค้าและการชำระเงิน</a></div>
																		</li>
																		<li data-page="status">
																			<div class="menu-item"><a href="<?php echo site_url('member_order');?>">ตรวจสอบสถานะสินค้า</a></div>
																		</li>
																		<li data-page="confirm">
																			<div class="menu-item"><a href="<?php echo site_url('confirm_payment');?>">แจ้งโอนเงิน</a></div>
																		</li>
<?php
}
?>
																		<li>
<?php
if($this->session->userdata('lang') == 'th') {
?>
																			<div class="menu-item topBD">
																				<a href="" class="menu-anchor" data-menu="2">
																					<img class="flag" src="<?php echo base_url('asset/frontend/images/icon/flag-th.svg');?>">TH
																					<img class="detail" src="<?php echo base_url('asset/frontend/images/icon/icon-chevronR.svg');?>">
																				</a>
																			</div>
<?php
} elseif($this->session->userdata('lang') == 'en') {
?>
																			<div class="menu-item topBD">
																				<a href="" class="menu-anchor" data-menu="2">
																					<img class="flag" src="<?php echo base_url('asset/frontend/images/icon/flag-en.svg');?>">EN
																					<img class="detail" src="<?php echo base_url('asset/frontend/images/icon/icon-chevronR.svg');?>">
																				</a>
																			</div>
<?php
}
?>
																		</li>
																	</ul>
																</div>
																
																<!-- PRODUCT :: CATEGORY -->
																<div class="submenu menu" data-menu="1">
																	<div class="submenu-back">
																		<div class="menu-item">
																			<a href="<?php echo site_url(uri_string().'?lang=en');?>" class="menu-back">ย้อนกลับ
																				<img class="detail back" src="<?php echo base_url('asset/frontend/images/icon/icon-chevronL.svg');?>">
																			</a>
																		</div>
																	</div>
																	<ul>
<?php
if(!empty($menu_inc)) {
	foreach($menu_inc as $r_inc) {	
?>
																		<li>
																			<div class="menu-item"><a href="<?php echo site_url('product_category/'.$r_inc->category1_id);?>"><?php echo get2Lang($this->session->userdata('lang'), $r_inc->category1_name_th, $r_inc->category1_name_en);?></a></div>
																		</li>
<?php
	}
}
?>
																		<?php /*<li>
																			<div class="menu-item"><a href="<?php echo site_url('product_category');?>">FOOD PACKAGING</a></div>
																		</li>
																		<li>
																			<div class="menu-item"><a href="<?php echo site_url('product_category');?>">FURNITURE</a></div>
																		</li>
																		<li>
																			<div class="menu-item"><a href="<?php echo site_url('product_category');?>">MELAMINE</a></div>
																		</li>
																		<li>
																			<div class="menu-item"><a href="<?php echo site_url('product_category');?>">HOUSEWARE</a></div>
																		</li> */?>
																	</ul>
																</div>

																<!-- LANG -->
																<div class="submenu menu" data-menu="2">
																	<div class="submenu-back">
																		<div class="menu-item">
																			<a href="#" class="menu-back">ย้อนกลับ
																				<img class="detail back" src="<?php echo base_url('asset/frontend/images/icon/icon-chevronL.svg');?>">
																			</a>
																		</div>
																	</div>
																	<ul>
<?php
if($this->session->userdata('lang') == 'th') {
?>											
																		<li>
																			<div class="menu-item">
																				<a href="<?php echo site_url(uri_string().'?lang=en');?>"><img class="flag" src="<?php echo base_url('asset/frontend/images/icon/flag-en.svg');?>">EN</a>
																			</div>
																		</li>
																		<li>
																			<div class="menu-item">
																				<a href="<?php echo site_url(uri_string().'?lang=th');?>"><img class="flag" src="<?php echo base_url('asset/frontend/images/icon/flag-th.svg');?>">TH</a>
																			</div>
																		</li>
<?php
} elseif($this->session->userdata('lang') == 'en') {
?>											
																		<li>
																			<div class="menu-item">
																				<a href="<?php echo site_url(uri_string().'?lang=th');?>"><img class="flag" src="<?php echo base_url('asset/frontend/images/icon/flag-th.svg');?>">TH</a>
																			</div>
																		</li>
																		<li>
																			<div class="menu-item">
																				<a href="<?php echo site_url(uri_string().'?lang=en');?>"><img class="flag" src="<?php echo base_url('asset/frontend/images/icon/flag-en.svg');?>">EN</a>
																			</div>
																		</li>
<?php
}
?>
																	</ul>
																</div>

																<!-- WHEN LOGIN :: MY ACCOUNT -->
<?php
if($this->session->userdata('member_id') != '') {
?>													
																<div class="submenu menu" data-menu="3">
																	<div class="submenu-back">
																		<div class="menu-item">
																			<a href="#" class="menu-back">ย้อนกลับ
																				<img class="detail back" src="<?php echo base_url('asset/frontend/images/icon/icon-chevronL.svg');?>">
																			</a>
																		</div>
																	</div>
																	<ul>
																		<li>
																			<div class="menu-item"><a href="<?php echo site_url('member_profile');?>">บัญชีของฉัน</a></div>
																		</li>
																		<li>
																			<div class="menu-item"><a href="<?php echo site_url('member_address');?>">ที่อยู่จัดส่ง</a></div>
																		</li>
																		<li>
																			<div class="menu-item"><a href="<?php echo site_url('member_point');?>">คะแนนสะสม</a></div>
																		</li>
																		<?php /*<li>
																			<div class="menu-item"><a href="<?php echo site_url('member_payment');?>">การชำระเงิน</a></div>
																		</li>*/ ?>
																		<li>
																			<div class="menu-item"><a href="<?php echo site_url('member_order');?>">รายการสั่งซื้อ</a></div>
																		</li>
																		<li>
																			<div class="menu-item topBD">
																				<button class="logout-button" onclick="javascript:window.location.href='<?php echo site_url('frontend/path/logout');?>';"><i class="fas fa-sign-out-alt"></i>ออกจากระบบ</button>
																			</div>
																		</li>
																	</ul>										
																</div>
<?php
}
?>
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

						<ul class="cart-section">
							<li class="d-none d-sm-block">
								<div class="input-group search">
									<input type="search" class="form-control shadow-none" placeholder="search product" id="search_inc" value="<?php if($this->session->userdata('search_inc') != '') echo $this->session->userdata('search_inc');?>">
									<div class="input-group-append">
										<button type="button" class="btn" onclick="searchProduct();"><i class="fas fa-search"></i></button>
									</div>
								</div>

								<!-- <div class="search-container">
									<button class="button-search" type="button" onclick="searchProduct();"><i class="fas fa-search"></i></button>
									<div class="search-input">
										<input type="search" class="search-bar" placeholder="search" id="search_inc" value="<?php if($this->session->userdata('search_inc') != '') echo $this->session->userdata('search_inc');?>">
									</div>
								</div> -->
							</li>
							<li class="d-none d-sm-block"><a href="<?php echo site_url('login');?>"><i class="fas fa-user"></i></a></li>
<?php
if($this->session->userdata('member_id') != '') {
	$qty = 0;
	foreach($this->cart->contents() as $items) {
		$qty += $items['qty'];
	}
?>
							<li>
								<a href="<?php echo site_url('cart');?>" class="cart-button">
									<i class="fas fa-shopping-cart"></i>
									<div class="cart-amount inc_qty_basket"><?php echo $qty;?></div>
								</a>
							</li>
<?php
}
?>
							<li class="d-none d-lg-block">
								<ul class="lang">
									<li <?php if($this->session->userdata('lang') == 'th') echo 'class="active"';?>>
										<button onclick="window.location.href='<?php echo site_url(uri_string().'?lang=th');?>';">TH</button>
									</li>
									<li <?php if($this->session->userdata('lang') == 'en') echo 'class="active"';?>>
										<button onclick="window.location.href='<?php echo site_url(uri_string().'?lang=en');?>';">EN</button>
									</li>
								</ul>
							</li>
						</ul>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	// HEADER //
    $(function(){
        var shrinkHeader = 300;
        $(window).scroll(function() {
            var scroll = getCurrentScroll();
            if ( scroll >= shrinkHeader ) {
                $('.header').addClass('shrink');
            }
            else {
                $('.header').removeClass('shrink');
            }
        });
        function getCurrentScroll() {
            return window.pageYOffset || document.documentElement.scrollTop;
        }
    });

    var menu_width;
    jQuery(document).ready(
        function() {
            initMenu();
        });
    function initMenu() {
        menu_width = $("#menu .menu").width();
        $(".menu-back").click(function() {
            var _pos = $(".menu-slider").position().left + menu_width;
            var _obj = $(this).closest(".submenu");
            $(".menu-slider").stop().animate({
                left: _pos
            }, 300, function() {
                _obj.hide();
            });
            return false;
        });
        
        $(".menu-anchor").click(function() {
            var _d = $(this).data('menu');
            $(".submenu").each(function() {
                var _d_check = $(this).data('menu');
                if (_d_check == _d) {
                    $(this).show();
                    var _pos = $(".menu-slider").position().left - menu_width;
                    
                    $(".menu-slider").stop(true, true).animate({
                        left: _pos
                    }, 300);
                    return false;
                }
            });
            return false;
        });
    }
</script>

<script type="text/javascript">
    // ACTIVE MENU //
    $(function () {
		var getPage = '<?php echo(@$pageName); ?>';
		$(".mainmenu li, .menu-m li").each(function () {
			var getMenu = $(this).attr("data-page");
			if (getPage == getMenu) {
				$(this).addClass('active');
			}
		});
	});

	function searchProduct() {
		$.post('<?php echo site_url("frontend/path/ajaxSearchProduct");?>', { search_inc: $("#search_inc").val() }, function(data) {
			window.location.href = '<?php echo site_url('search');?>';
		});
	}
</script>