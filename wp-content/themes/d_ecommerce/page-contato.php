<?php
get_header();
?>
<!-- start banner Area -->
<div id="inicio">
    <section class="d-flex" id="contato" style="background:url(<?php bloginfo('template_url'); ?>/images/banner-contato.png) no-repeat">
        <div class="container">
            <div class="row d-flex align-items-center h-100">
                <div class="banner-content col-lg-12 col-md-12 text-center" style="padding: 0 20px;">
                    <div data-aos="fade-up" data-aos-anchor-placement="top-center" data-aos-delay="300">
                        <h6 style="color: #fff;font-size: 24px;">
                            Fale com nossos especialistas <br />
                        </h6>
                        <h2 style="font-weight: bold;font-size: 43px;margin-top: 10px;">
                            <b>Entre em contato</b>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- End banner Area -->

<section style="background: #f0f0f0; padding: 30px 0 50px 0;align-items: center;justify-content: center;display: grid;">
    <div class="row row-contato">

        <div data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" data-aos-delay="200" class="col-lg-4 col-md-4">
            
            <table style="margin-top: 25px;">
                <tr>
                    <td>
                        <a href="tel:4341414636">
                            <img style="margin-right: 20px" src="<?php bloginfo('template_url'); ?>/images/endereço.png">
                        </a>
                    </td>
                    
                    <td>  
                        <h6>Endereço</h6>
                        <p style="margin-top: 5px;margin-bottom: 0;color: #001845">Palhano premium, Lodrina-PR</p>
                    </td> 
                </tr>
            </table>
        </div>
        
        <div data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" data-aos-delay="200" class="col-lg-4 col-md-4">

            <table style="margin-top: 25px;">
                <tr>
                    <td>
                        <a href="tel:4341414636">
                            <img style="margin-right: 20px" src="<?php bloginfo('template_url'); ?>/images/whatsapp-contato.png">
                        </a>
                    </td>
                    
                    <td>  
                        <h6>Whatsapp</h6>
                        <p style="margin-top: 5px;margin-bottom: 0;color: #001845"><span style="font-size: 0.8em;">43</span> 9 8808-4902</p>
                    </td> 
                </tr>
            </table>    
        </div>
        
        <div data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" data-aos-delay="200" class="col-lg-4 col-md-4">

            <table style="margin-top: 25px;">
                <tr>
                    <td>
                        <a href="tel:4341414636">
                            <img style="margin-right: 20px" src="<?php bloginfo('template_url'); ?>/images/email-contato.png">
                        </a>
                    </td>
                    
                    <td>  
                        <h6>Email</h6>
                        <p style="margin-top: 5px;margin-bottom: 0;color: #001845">Email@gmail.com</p>
                    </td> 
                </tr>
            </table>
        </div>
    </div>

</section>

<!-- Start Align Area -->
<section id="conheca-equipe" class="section-gap tam-section" style="border-bottom: 1px solid #f0f0f0;">
    <div class="container">
        <div class="section-top-border">
            <div class="row">

                <div class="col-lg-12 col-md-12">
                    <h1 data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-delay="200" class="pb-10 text-center">Preencha o Formulário</h1>

                        <p data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-delay="200" class="text-center contato-texto-quemsomos" style="line-height: 26px;color: #000;font-size: 24px;">
                            Somos especialista na defesa de segurados da Previdência Social (INSS) e também dos Regimes Próprios de Previdência
                        </p>
                    
                    <div class="row justify-content-center" data-aos="zoom-in" data-aos-anchor-placement="top-bottom" data-aos-delay="200">

                        <?php 
                            the_post();
                            the_content();
                        ?>

                    </div>

                </div>
                    
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
