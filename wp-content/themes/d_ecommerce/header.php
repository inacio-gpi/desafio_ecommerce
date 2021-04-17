<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title page  -->
	<title>Guilherme - Ecommerce</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/images/new.png">
	<!--styles -->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/font-awesome.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/owl-carousel.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/reset.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/responsive.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/themify-icons.css">
</head>

<body <?php body_class(); ?>>
	<?php
	wp_body_open();
	?>
	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->

	<!-- Header -->
	<header class="header shop">
		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="cat-nav-head">
					<div class="row">
						<div class="col-lg-2">
							<div class="logo">
								<a href="<?php echo esc_url( home_url( '/' )); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="logo"></a>
							</div>
							<div class="mobile-nav"></div>
						</div>
						<div class="col-lg-10 col-12">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">
										<div class="nav-inner">
											<ul class="nav main-menu menu navbar-nav">
												<li><a href="#">VESTIDOS<i class="ti-angle-down"></i></a>
												</li>
												<li><a href="#">BLUSAS<i class="ti-angle-down"></i></a>
													<ul class="dropdown">
														<div class="row">
															<div class="col-md-4">
																<li><a href="#">SUBCATEGORIA</a></li>
																<li><a href="#">SUBCATEGORIA</a></li>
																<li><a href="#">SUBCATEGORIA</a></li>
																<li><a href="#">SUBCATEGORIA</a></li>
															</div>
															<div class="col-md-4">
																<li><a href="#">SUBCATEGORIA</a></li>
																<li><a href="#">SUBCATEGORIA</a></li>
																<li><a href="#">SUBCATEGORIA</a></li>
																<li><a href="#">SUBCATEGORIA</a></li>
															</div>
															<div class="col-md-4">
																<li><a href="#">SUBCATEGORIA</a></li>
																<li><a href="#">SUBCATEGORIA</a></li>
																<li><a href="#">SUBCATEGORIA</a></li>
																<li><a href="#">SUBCATEGORIA</a></li>
															</div>
														</div>
													</ul>
												</li>
												<li><a href="#">CALÇAS<i class="ti-angle-down"></i></a></li>
												<li><a href="#">CAMISAS<i class="ti-angle-down"></i></a></li>
												<li><a href="#">SHORTS<i class="ti-angle-down"></i></a></li>
												<li><a href="#">SAIAS<i class="ti-angle-down"></i></a></li>
												<li><a href="contact.html">MACAQUINHO<i class="ti-angle-down"></i></a>
												</li>
												<li><a href="contact.html">PRAIA<i class="ti-angle-down"></i></a></li>
												<li><a href="contact.html" style="color:#ff5959">HOT SALE</a></li>
												<!-- pesquisa -->
												<li class="d-flex">
													<form class="search-box" action="#" method="post" style="transform: scale(.5)">
														<input type="text" class="input" placeholder="Pesquisa" name="pesquisa">
														<button type="button" class="btn-search" name="button"></button>
													</form>
												</li>
												<!-- icon cliente -->
												<li>
													<a href="#" class="single-icon">
														<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
															<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
														</svg>
													</a>
													<ul class="dropdown" style="
													width: 150px;
													margin: 0 0 0 -56px;
													text-align: center;
												">
														<li><a href="#">MINHA CONTA</a></li>
														<li><a href="#">MEUS PEDIDOS</a></li>
														<li><a href="#">CADASTRAR</a></li>
													</ul>
												</li>
												</li>
												<!-- balao chat -->
												<li>
													<a href="#" class="single-icon">
														<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
															<path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z" />
														</svg>
													</a>
													<ul class="dropdown" style="
													width: 150px;
													margin: 0 0 0 -56px;
													text-align: center;
												">
														<li><a href="#">MINHA CONTA</a></li>
														<li><a href="#">MEUS PEDIDOS</a></li>
														<li><a href="#">CADASTRAR</a></li>
													</ul>
												</li>
												<li style="background-color: #ff5959;">
													<a href="#" class="single-icon">
														<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-handbag" viewBox="0 0 16 16">
															<path d="M8 1a2 2 0 0 1 2 2v2H6V3a2 2 0 0 1 2-2zm3 4V3a3 3 0 1 0-6 0v2H3.36a1.5 1.5 0 0 0-1.483 1.277L.85 13.13A2.5 2.5 0 0 0 3.322 16h9.355a2.5 2.5 0 0 0 2.473-2.87l-1.028-6.853A1.5 1.5 0 0 0 12.64 5H11zm-1 1v1.5a.5.5 0 0 0 1 0V6h1.639a.5.5 0 0 1 .494.426l1.028 6.851A1.5 1.5 0 0 1 12.678 15H3.322a1.5 1.5 0 0 1-1.483-1.723l1.028-6.851A.5.5 0 0 1 3.36 6H5v1.5a.5.5 0 1 0 1 0V6h4z" />
														</svg>
														<span id="total-count"><?php echo sprintf(_n('%d', '%d', WC()->cart->get_cart_contents_count()), WC()->cart->get_cart_contents_count()); ?></span>
													</a>
													<!-- Shopping Item -->
													<ul class="dropdown">
														<div class="shopping-item">
															<div class="dropdown-cart-header">
																<span><?php echo sprintf(_n('%d item', '%d itens', WC()->cart->get_cart_contents_count()), WC()->cart->get_cart_contents_count()); ?></span>
																<a href="#">View Cart</a>
															</div>
															<ul class="shopping-list">
																<li>
																	<a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
																	<a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
																	<h4><a href="#">Woman Ring</a></h4>
																	<p class="quantity">1x - <span class="amount">$99.00</span></p>
																</li>
																<li>
																	<a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
																	<a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
																	<h4><a href="#">Woman Necklace</a></h4>
																	<p class="quantity">1x - <span class="amount">$35.00</span></p>
																</li>
															</ul>
															<div class="bottom">
																<div class="total">
																	<span>Total</span>
																	<span class="total-amount"><?php echo WC()->cart->get_cart_total(); ?></span>
																</div>
																<a href="#" class="btn animate">Comprar</a>
															</div>
														</div>
													</ul>
												</li>
											</ul>
										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
		<?php wp_head() ?>
	</header>
	<!--/ End Header -->
	<?php
	// Output the menu modal.
	get_template_part('template-parts/modal-menu');
