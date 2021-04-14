<?php
get_header();
?>

<!-- start banner Area -->
<div id="inicio">
    <section class="d-flex" id="artigos" style="background:url(<?php bloginfo('template_url'); ?>/images/banner-artigos.png) no-repeat center;">
        
        <div class="container">
            <div class="row d-flex align-items-center h-100">
                
                <!-- <div class="banner-content col-lg-6 col-md-6" style="margin-top: 185px"> -->
                <div class="banner-content col-lg-12 col-md-12" style="padding: 0 20px;text-align: center;">
                    
                    <h6 style="color: #fff;font-size: 24px;">
                        Fique por dentro da notícias<br />
                    </h6>
                    <h2 style="font-weight: bold;font-size: 43px;margin-top: 10px;">
                        <b>Nossos artigos</b>
                    </h2>

                </div>

            </div>
        </div>
    </section>
</div>
<!-- End banner Area -->

<!-- Start Align Area -->
<section id="artigos-section" class="section-gap tam-section" style="border-bottom: 2px solid #f0f0f0;">
    <div class="container">
        <div class="section-top-border">
            <div class="row row-artigos-content">

                <div class="col-lg-8 col-md-8" style="
                            display: grid;
                            grid-template-columns: repeat(auto-fill, 265px);
                            grid-gap: 3em;
                            justify-content: center;

                            margin-bottom: 3em;
                        ">

                    <?php $count = 0; ?>
                    <?php query_posts('&posts_per_page=6'); ?>
                    <?php if( have_posts() ): while(have_posts()): the_post(); ?>
                    <?php $count++; ?>

                        <div data-aos="zoom-in" data-aos-delay="200" data-aos-anchor-placement="top-bottom" class="info-descricao <?php if($count>2) echo 'mt-50' ?>">
    
                            <div class="img-artigos" style="
                                width: 100%;
                                height: 170px;
                                background: url(<?php echo_image(); ?>) no-repeat center center scroll;
                                background-size: cover;
                                ">
                            </div>
                            <div class="box-img-artigos" style="overflow: hidden;">
                                <h5 class="mb-2"><?php the_title(); ?></h5>
                                <p style="line-height: 1.45em;"><?php the_field('texto_do_post'); ?> </p>
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

                <!-- lado direito. informaçoes  -->
                <div class="col-lg-4 col-md-4 ter-colun-artigos">
                    <div class="bloco-pesquisar">
                        <!-- formulario de pesquisa -->
                        <?php get_search_form(); ?>
                        <!-- formulario de pesquisa -->

                        <div class="bloco-titulo" data-aos="fade-left" data-aos-delay="250" data-aos-anchor-placement="bottom-bottom">
                            <h5 class="subtitulo">
                                <b>CATEGORIA</b>
                            </h5>
                        </div>
                    
                        <div class="bloco-links" style="list-style: none;">
                        
                            <?php wp_list_categories("title_li="); ?>
                            <!-- <a href="#">Previdência Social</a>
                            <a href="#">INSS</a>
                            <a href="#">Dinheiro</a> -->
                        </div>
                        
                    </div>

                    <div class="bloco-artigos">

                        <div class="bloco-titulo" style="margin-bottom: 20px;" data-aos="fade-left" data-aos-delay="200" data-aos-anchor-placement="top-bottom">
                            <h5 class="subtitulo">
                                <b>Últimos Artigos</b>
                            </h5>
                        </div>

                    <?php query_posts('&posts_per_page=4'); ?>
                        
                        <?php if( have_posts() ): while(have_posts()): the_post(); ?>

                        <table style="width: 250px;border-bottom: 1px solid #d0d0d0;" data-aos="fade-left" data-aos-delay="200" data-aos-anchor-placement="top-bottom">
                            <tr>
                                <td style="max-width: 120px;">
                                    <div style="
                                            height: 80px; 
                                            width: 80px; 
                                            overflow: hidden; 
                                            margin: 17px 15px 17px 20px;
                                            background: url(<?php echo_image(); ?>) no-repeat center center scroll;
                                            background-size: cover;
                                        ">
                                    </div>
                                </td>

                                <td>  
                                    <?php the_title(); ?>
                                </td> 
                            </tr>
                        </table>
                
                            <?php endwhile; ?>
                            <?php else: ?>
                                nada encontrado..
                            <?php endif; ?>

                            <?php wp_reset_query(); ?>

                    </div>

                </div>
                <!-- lado direito. informaçoes  -->
                    
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
