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
								<li><a href="member-order.php">Product Status</a></li>
								<li><a href="contact.php">Contact us</a></li>
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
					<div class="col-xl-2 col-lg-2 col-md-3 col-4">
						<a class="mainlogo" href="index.php"><img src="images/srithai-WHlogo.svg"></a>
					</div>
					<div class="col-xl-7 col-lg-7 d-none d-lg-block">
						<!-- MAIN - MENU :: PC & IPAD PRO -->
						<ul class="mainmenu">
							<li><a href="index.php">HOME</a></li>
							<li><a href="product-category.php">Food Packaging</a></li>
							<li><a href="product-category.php">Furniture</a></li>
							<li><a href="product-category.php">Melamine</a></li>
							<li><a href="product-category.php">Houseware</a></li>
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
										<a class="mainlogo" href="index.php"><img src="images/srithai-WHlogo.svg"></a>
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
																				<!--<div class="menu-item"><a href="login.php"><i class="fas fa-lock"></i>LOGIN</a></div>-->

																				<!-- WHEN LOGIN :: MY ACCOUNT -->
																				<a href="#" class="menu-anchor" data-menu="3">
																					<i class="fas fa-user-circle"></i>บัญชีของฉัน
																					<img class="detail" src="images/icon/icon-chevronR-WH.svg">
																				</a>
																			</div>
																		</li>
																		<li data-page="home">
																			<div class="menu-item"><a href="index.php">หน้าแรก</a></div>
																		</li>
																		<li data-page="product">
																			<div class="menu-item">
																				<a href="#" class="menu-anchor" data-menu="1">
																					ผลิตภัณฑ์ของเรา
																					<img class="detail" src="images/icon/icon-chevronR.svg">
																				</a>
																			</div>
																		</li>
																		<li data-page="article">
																			<div class="menu-item"><a href="article.php">บทความ</a></div>
																		</li>
																		<li data-page="contact">
																			<div class="menu-item"><a href="contact.php">ช่องทางติดต่อ</a></div>
																		</li>
																		<li data-page="method">
																			<div class="menu-item"><a href="shipping-payment-method.php">วิธีการจัดส่งสินค้าและการชำระเงิน</a></div>
																		</li>
																		<li data-page="status">
																			<div class="menu-item"><a href="member-order.php">ตรวจสอบสถานะสินค้า</a></div>
																		</li>
																		<li data-page="confirm">
																			<div class="menu-item"><a href="confirm-payment.php">แจ้งโอนเงิน</a></div>
																		</li>

																		<li>
																			<div class="menu-item topBD">
																				<a href="#" class="menu-anchor" data-menu="2">
																					<img class="flag" src="images/icon/flag-th.svg">TH
																					<img class="detail" src="images/icon/icon-chevronR.svg">
																				</a>
																			</div>
																		</li>
																	</ul>
																</div>
																
																<!-- PRODUCT :: CATEGORY -->
																<div class="submenu menu" data-menu="1">
																	<div class="submenu-back">
																		<div class="menu-item">
																			<a href="#" class="menu-back">ย้อนกลับ
																				<img class="detail back" src="images/icon/icon-chevronL.svg">
																			</a>
																		</div>
																	</div>
																	<ul>
																		<li>
																			<div class="menu-item"><a href="product-category.php">FOOD PACKAGING</a></div>
																		</li>
																		<li>
																			<div class="menu-item"><a href="product-category.php">FURNITURE</a></div>
																		</li>
																		<li>
																			<div class="menu-item"><a href="product-category.php">MELAMINE</a></div>
																		</li>
																		<li>
																			<div class="menu-item"><a href="product-category.php">HOUSEWARE</a></div>
																		</li>
																	</ul>
																</div>

																<!-- LANG -->
																<div class="submenu menu" data-menu="2">
																	<div class="submenu-back">
																		<div class="menu-item">
																			<a href="#" class="menu-back">ย้อนกลับ
																				<img class="detail back" src="images/icon/icon-chevronL.svg">
																			</a>
																		</div>
																	</div>
																	<ul>
																		<li>
																			<div class="menu-item">
																				<a href=""><img class="flag" src="images/icon/flag-th.svg">TH</a>
																			</div>
																		</li>
																		<li>
																			<div class="menu-item">
																				<a href=""><img class="flag" src="images/icon/flag-en.svg">EN</a>
																			</div>
																		</li>
																	</ul>
																</div>

																<!-- WHEN LOGIN :: MY ACCOUNT -->
																<div class="submenu menu" data-menu="3">
																	<div class="submenu-back">
																		<div class="menu-item">
																			<a href="#" class="menu-back">ย้อนกลับ
																				<img class="detail back" src="images/icon/icon-chevronL.svg">
																			</a>
																		</div>
																	</div>
																	<ul>
																		<li>
																			<div class="menu-item"><a href="member-profile.php">บัญชีของฉัน</a></div>
																		</li>
																		<li>
																			<div class="menu-item"><a href="member-address.php">ที่อยู่จัดส่ง</a></div>
																		</li>
																		<li>
																			<div class="menu-item"><a href="member-payment.php">การชำระเงิน</a></div>
																		</li>
																		<li>
																			<div class="menu-item"><a href="member-order.php">รายการสั่งซื้อ</a></div>
																		</li>
																		<li>
																			<div class="menu-item topBD">
																				<button class="logout-button"><i class="fas fa-sign-out-alt"></i>ออกจากระบบ</button>
																			</div>
																		</li>
																	</ul>
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

						<ul class="cart-section">
							<li class="d-none d-sm-block">
								<div class="search-container">
									<button class="button-search"  type="button"><i class="fas fa-search"></i></button>
									<div class="search-input">
										<input type="search" class="search-bar" placeholder="search">
									</div>
								</div>
							</li>
							<li class="d-none d-sm-block"><a href="login.php"><i class="fas fa-user"></i></a></li>
							<li>
								<a href="cart.php" class="cart-button">
									<i class="fas fa-shopping-cart"></i>
									<div class="cart-amount">2</div>
								</a>
							</li>
							<li class="d-none d-lg-block">
								<ul class="lang">
									<li class="active">
										<button>TH</button>
									</li>
									<li>
										<button>EN</button>
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
		var getPage = '<?php echo($pageName); ?>';
		$(".mainmenu li, .menu-m li").each(function () {
			var getMenu = $(this).attr("data-page");
			if (getPage == getMenu) {
				$(this).addClass('active');
			}
		});
	});
</script>