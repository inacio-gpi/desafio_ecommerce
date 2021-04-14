<!DOCTYPE html>
	<html>
		<head>
			<meta charset="UFT-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0" >
			<link rel="stylesheet" href="">

			<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
			<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

			<!-- ===========================================
								CSS
			============================================= -->

			<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">
			<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css">
			<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/magnific-popup.css">
			<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/owl.carousel.css">
			<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/aos.css">

			<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">

			<!-- link fonte inter -->
			<link rel="preconnect" href="https://fonts.gstatic.com">
			<link href="https://fonts.googleapis.com/css2?family=Red+Hat+Text&display=swap" rel="stylesheet">


			<title><?php bloginfo('name'); echo ' | advocacia'?></title>
		</head>

		<body <?php body_class(); ?>>

			<?php
			wp_body_open();
			?>

			<header id="header" id="home">
			<svg style="display: none;" class="lnr lnr-menu"><use xlink:href="#lnr-menu"></use></svg>
				<div class="main-menu" style="background: rgba(0, 24, 69, 0.1);">
					<div class="container">
						<div class="row align-items-center justify-content-between d-flex" style="height: 80px;">
							<a class="header-normal" href="<?php echo esc_url( home_url( '/' )); ?>"><img height="80" width="auto" src="<?php bloginfo('template_url'); ?>/images/Arruda-e-Franco-logo.png"></a>		
							<a class="header-cel" style="display: none;" href="<?php echo esc_url( home_url( '/' )); ?>"><img height="80" width="auto" src="<?php bloginfo('template_url'); ?>/images/Arruda-e-Franco-logo-negativo.png"></a>		

							<nav class="h-100" id="nav-menu-container">
							<!-- <nav style="margin-top: -60px" id="nav-menu-container"> -->
								<!-- <ul class="nav-menu"> -->
								<ul class="nav-menu h-100">
									<li class="links-1 h-100"><a class="h-100 d-flex align-items-center" href="<?php echo esc_url( home_url( '/' ) ); ?>equipe">Quem somos</a></li>
									<li class="links-1 h-100"><a class="h-100 d-flex align-items-center" href="<?php echo esc_url( home_url( '/' ) ); ?>servicos">Serviços</a></li>
									<li class="links-1 h-100"><a class="h-100 d-flex align-items-center" href="<?php echo esc_url( home_url( '/' ) ); ?>beneficios">Benefício do inss</a></li>
									<li class="links-1 h-100"><a class="h-100 d-flex align-items-center" href="<?php echo esc_url( home_url( '/' ) ); ?>artigos">Blog</a></li>
									<li class="links-1 h-100"><a class="h-100 d-flex align-items-center" href="<?php echo esc_url( home_url( '/' ) ); ?>contato">Contato</a></li>

								</ul>
							</nav><!-- #nav-menu-container -->		
						</div>
					</div>
				</div>
				<!-- Global site tag (gtag.js) - Google Analytics -->
				<script async src="https://www.googletagmanager.com/gtag/js?id=G-4Q23B13JSC"></script>
				<script>
				window.dataLayer = window.dataLayer || [];
				function gtag(){dataLayer.push(arguments);}
				gtag('js', new Date());

				gtag('config', 'G-4Q23B13JSC');
				</script>

				<?php wp_head() ?>
			</header><!-- #header -->

			<?php
			// Output the menu modal.
			get_template_part( 'template-parts/modal-menu' );
