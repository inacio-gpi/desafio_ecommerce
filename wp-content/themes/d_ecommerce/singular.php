<?php
get_header();
?>


<?php
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			?> 
<style>
	#site-content .row p {
		color: #212529;
		line-height: 1.5;
		margin: 30px 0;
		font-size: 20px;
	}
	#background-opacity {
		position: relative;
		background: #fff;
		overflow: hidden;
		height: 600px;
		width: 100%;
	}
	#site-content h1 {
		position: relative;
		z-index: 2;	
		font-size: 55px;
		font-weight: 800;
		font-family: 'Open Sans','Helvetica Neue',Helvetica,Arial,sans-serif !important;
		margin-bottom: .5rem;
		color: rgba( 0, 0, 0, 0.8);
	}
	#background-opacity:before {
		content: ' ';
		position: absolute;
		z-index: 1;
		background: url(<?php echo_image(); ?>) no-repeat center center scroll;
		/* opacity: 0.7; */
		width: 100%;
		min-height: 100%;
		background-size: cover;
	}
</style>
<!-- start banner Area -->
<div id="inicio">
    <section class="d-flex" id="artigos" style="background:url(<?php bloginfo('template_url'); ?>/images/banner-artigos.png) no-repeat center center scroll;">
        <div class="container">
            <div class="row d-flex align-items-center h-100">
                <div class="banner-content col-lg-12 col-md-12" style="padding: 0 20px;text-align: center;">
                    <h2 style="font-weight: bold;font-size: 43px;margin-top: 10px;">
                        <b>Nossos artigos</b>
                    </h2>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- End banner Area -->
<div class="container mt-5">
	<div class="container col-lg-8 col-md-10 mx-auto">
		<div class="row">
			<div id="background-opacity">
			</div>
			<span class="mt-3" style="color: #023e8a;">
				<i class="far fa-calendar-alt mr-1 "></i> <?php the_date(); ?>
			</span>
		</div>
	</div>
</div>
<article id="site-content" role="main" style="padding-top: 50px">
	<div class="container">
		<div class="row mb-5">
			<div class="col-lg-8 col-md-10 mx-auto">
				<h1 class="mb-5"  style="align-items: center"> <?php the_title(); ?> </h1>
				<?php the_field('texto_do_post');
						}
					}
					?>
			</div>
		</div>
	</div>
</article>

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>
