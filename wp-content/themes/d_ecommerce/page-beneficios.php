<?php
get_header();
?>

<!-- start banner Area -->
<div id="inicio">
    <section class="d-flex" id="beneficios" style="background:url(<?php bloginfo('template_url'); ?>/images/banner-beneficios.png) no-repeat;">
        <!-- <div class="overlay overlay-bg"></div> -->
        
        <div class="container">
            <div class="row d-flex  align-items-center h-100">
                
                <!-- <div class="banner-content col-lg-6 col-md-6" style="margin-top: 185px"> -->
                <div class="banner-content col-lg-12 col-md-12" style="padding: 0 20px;text-align: center;">
                    
                    <h6 style="color: #fff;font-size: 24px;">
                        Veja como solicitar o seu<br />
                    </h6>
                    <h2 style="font-weight: bold;font-size: 43px;margin-top: 10px;">
                        <b>Benefício do INSS</b>
                    </h2>

                </div>

            </div>
        </div>
    </section>
</div>
<!-- End banner Area -->

<!-- Start Align Area -->
<section id="beneficios-links" class="section-gap tam-section">
    <div class="container">
        <div class="section-top-border">
            
            <div class="row sub-title" data-aos="fade-up" data-aos-delay="50">
                <h1 class="subtitulo pl-3">
                    Atuamos no processo <br />
                    admistrativo e judicial
                </h1>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-7 colun-links-1" data-aos-anchor-placement="center-bottom">
                  
                    <a href="<?php echo home_url('/blog/aposentadoria-por-idade');?>" data-aos="fade-right" data-aos-delay="50" data-aos-anchor-placement="bottom-bottom" class="d-flex align-items-center primary-btn btn-beneficios" >
                        APOSENTADORIA POR IDADE
                        <i style="font-size: 17px;margin-left: auto;" class="fas fa-arrow-right"></i>
                    </a>
                    
                    <a href="<?php echo home_url('/blog/aposentadoria-especial');?>" data-aos="fade-right" data-aos-delay="150" data-aos-anchor-placement="bottom-bottom" class="d-flex align-items-center primary-btn btn-beneficios" >
                        APOSENTADORIA ESPECIAL
                        <i style="font-size: 17px;margin-left: auto;" class="fas fa-arrow-right"></i>
                    </a>
                    
                    <a href="<?php echo home_url('/blog/aposentadoria-por-tempo-de-contribuicao');?>" data-aos="fade-right" data-aos-delay="250" data-aos-anchor-placement="bottom-bottom" class="d-flex align-items-center primary-btn btn-beneficios" >
                        APOSENTADORIA POR TEMPO DE CONTRIBUIÇÃO
                        <i style="font-size: 17px;margin-left: auto;" class="fas fa-arrow-right"></i>
                    </a>
                    
                    <a href="<?php echo home_url('/blog/aposentadoria-por-invalidez');?>" data-aos="fade-right" data-aos-delay="350" data-aos-anchor-placement="bottom-bottom" class="d-flex align-items-center primary-btn btn-beneficios" >
                        APOSENTADORIA POR INVALIDEZ
                        <i style="font-size: 17px;margin-left: auto;" class="fas fa-arrow-right"></i>
                    </a>
                         
                </div>

                <div class="col-lg-5 col-md-5 colun-links-2">
                    
                    <a href="<?php echo home_url('/blog/loas-bpc');?>" data-aos="fade-left" data-aos-delay="650" data-aos-anchor-placement="bottom-bottom" class="d-flex align-items-center primary-btn btn-beneficios" >
                        BPC-LOAS
                        <i style="font-size: 17px;margin-left: auto;" class="fas fa-arrow-right"></i>
                    </a>

                    <a href="<?php echo home_url('/blog/pensao-por-morte');?>" data-aos="fade-right" data-aos-delay="650" data-aos-anchor-placement="bottom-bottom" class="d-flex align-items-center primary-btn btn-beneficios" >
                        PENSÃO POR MORTE
                        <i style="font-size: 17px;margin-left: auto;" class="fas fa-arrow-right"></i>
                    </a>
                    
                </div>

            </div>	
            
            <div class="row justify-content-center pt-5" data-aos="fade-in" data-aos-delay="150" style="margin-right: 0">
                        
                <a href="contato" class="d-flex align-items-center primary-btn mx-auto mt-80 btn-fale-especialista">
                    <b style="color: #fff">FALE COM UM ESPECIALISTA</b>
                    <i style="font-size: 17px;margin-left: 35px;" class="fas fa-arrow-right"></i>
                </a>
                
            </div>			

        </div>
    </div>
</section>

<!-- Start Align Area -->
<section id="sobre-o-beneficio" class="home-about-area section-gap tam-section">
    <div class="container">
        <div class="section-top-border">
            <div class="row">

                <div class="col-lg-12 col-md-12">
                    <div data-aos="fade-up" data-aos-delay="150" data-aos-anchor-placement="top-bottom">
                        <h1 class="text-center">
                            Nossos artigos
                        </h1>
                        <h3 class="text-center">
                            Confira nossas postagens por nossos especialistas
                        </h3>
                    </div>

                    <div class="row" style="justify-content: space-evenly;">
                        
                        <?php query_posts('&posts_per_page=3'); ?>

                        <?php if( have_posts() ): while(have_posts()): the_post(); ?>

                        <div data-aos="zoom-in" data-aos-anchor-placement="top-bottom" data-aos-delay="300" class="info-descricao mt-5">
                            
                            <div class="img-artigos" style="
                                width: 100%;
                                height: 170px;
                                background: url(<?php echo_image(); ?>) no-repeat center center scroll;
                                background-size: cover;
                            ">
                            </div>
                            <div class="box-img-artigos" style="overflow: hidden;">
                                <h5 class="mb-2"><?php the_title(); ?></h5>
                                <p style="line-height: 1.4em;"><?php the_field('texto_do_post');?> </p>
                            </div>
                            <div>
                                <a href="<?php echo esc_url(get_permalink()); ?>" class="d-flex align-items-center primary-btn btn-leia-mais-artigos">
                                    Leia Mais
                                    <i style="font-size: 17px;margin-left: auto;" class="fas fa-long-arrow-alt-right"></i>
                                </a>
                            </div>
                            
                        </div>
                
                        <?php endwhile; ?>
                        <?php else: ?>
                            nada encontrado..
                        <?php endif; ?>

                        <?php wp_reset_query(); ?>

                    </div>

                    <div class="row justify-content-center mt-5" data-aos="fade-left" data-aos-delay="250" data-aos-anchor-placement="bottom-bottom">
                        
                        <a href="artigos" class="primary-btn mx-auto mt-80 btn-ler-mais d-flex align-items-center">
                            VER MAIS
                            <i style="font-size: 23px;margin-left: 50px;" class="fas fa-long-arrow-alt-right"></i>
                        </a>
                        
                    </div>

                </div>
                    
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
