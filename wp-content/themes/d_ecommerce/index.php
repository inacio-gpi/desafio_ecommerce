<!-- <a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e('View your shopping cart'); ?>">
    <?php echo sprintf(_n('%d item', '%d items', WC()->cart->get_cart_contents_count()), WC()->cart->get_cart_contents_count()); ?> - <?php echo WC()->cart->get_cart_total(); ?>
</a> -->
<?php
get_header();
?>

<!-- Slider Area -->
<section class="hero-slider">
    <!-- Single Slider -->
    <div class="single-slider">
        <!-- <div class="container">
            <div class="row no-gutters"> -->
        <div class="container h-100">
            <div class="row no-gutters h-100 align-content-center">
                <!-- teste -->
            </div>
        </div>
    </div>
    <!--/ End Single Slider -->
</section>
<!--/ End Slider Area -->

<!-- Start Small Banner  -->
<section id="info-header">
    <div class="container">
        <div class="row justify-content-center">
            <div class="sob-header">
                <div class="row text-center mr-0 ml-0 align-content-center h-100">
                    <div class="col-md-3 my-md-3 my-0 pt-2 pb-2">
                        <img src="<?php bloginfo('template_url'); ?>/images/cartao.png" alt="#">
                        <h6>4X SEM JUROS</h6>
                        <p>Compras no cartão de crédito</p>
                        <p>
                            <i>* parcela minima de R$20</i>
                        </p>
                    </div>
                    <div class="col-md-3 my-md-3 my-0 pt-2 pb-2">
                        <img src="<?php bloginfo('template_url'); ?>/images/carro-frete.png" alt="#">
                        <h6>FRETE GRÁTIS</h6>
                        <p>nas compras acima<br>de R$199,90</p>
                    </div>
                    <div class="col-md-3 my-md-3 my-0 pt-2 pb-2">
                        <img src="<?php bloginfo('template_url'); ?>/images/desconto.png" alt="#">
                        <h6>5% DE DESCONTO</h6>
                        <p>no pagamento<br>á vista</p>
                    </div>
                    <div class="col-md-3 my-md-3 my-0 pt-2 pb-2">
                        <img src="<?php bloginfo('template_url'); ?>/images/reload.png" alt="#">
                        <h6>TROCA GARANTIDA</h6>
                        <p>30 dias para realizar<br>a primeira troca</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Start Shop Blog  -->
<section class="shop-blog section">
    <div class="container">
        <div class="row align-content-center">
            <div class="col-md-4">
                <!-- Start Single Blog  -->
                <div class="shop-single-blog" style="background-image: url(<?php bloginfo('template_url'); ?>/images/header1.png);
						background-position: center;
						background-size: cover;">
                </div>
                <!-- End Single Blog  -->
            </div>
            <div class="col-md-4">
                <!-- Start Single Blog  -->
                <div class="shop-single-blog" style="background-image: url(<?php bloginfo('template_url'); ?>/images/header2.png);
						background-position: center;
						background-size: cover;">
                </div>
                <!-- End Single Blog  -->
            </div>
            <div class="col-md-4">
                <!-- Start Single Blog  -->
                <div class="shop-single-blog" style="background-image: url(<?php bloginfo('template_url'); ?>/images/header3.png);
						background-position: center;
						background-size: cover;">
                </div>
                <!-- End Single Blog  -->
            </div>
        </div>
    </div>
</section>
<!-- End Shop Blog  -->

<!-- <div class="product-area most-popular section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>OS MAIS VENDIDOS</h2>
                </div>
            </div>
        </div>
        <div class="row" style="box-shadow: 0 1px #e9e9e9; padding-bottom: 30px;">
            <div class="col-12">
                <div class="products owl-carousel popular-slider">
                    <ul class="products">
                        <?php echo do_shortcode('[products category="Promoção" limit="10" orderbyid="id" order="DESC"]'); ?>
                        <?php echo do_shortcode('[products category="Inverno" limit="10" orderbyid="id" order="DESC"]'); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="product-area most-popular section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>OS MAIS VENDIDOS</h2>
                </div>
            </div>
        </div>
        <div class="row" style="box-shadow: 0 1px #e9e9e9; padding-bottom: 30px;">
            <div class="col-12">
                <div class="products owl-carousel popular-slider">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-img d-flex justify-content-center align-items-center" style="background-image: url(<?php bloginfo('template_url'); ?>/images/card.png);">
                            <div class="desc">
                                <img src="<?php bloginfo('template_url'); ?>/images/new.svg">
                                <a href="#" class="d-flex align-items-center justify-content-center">
                                    VER DETALHES
                                </a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="#">Jeans pop</a></h3>
                            <div class="product-price">
                                <span class="old">R$60,00</span>
                                <span>R$50,00</span>
                            </div>
                        </div>
                    </div>
                    <div class="single-product">
                        <div class="product-img d-flex justify-content-center align-items-center" style="background-image: url(<?php bloginfo('template_url'); ?>/images/card.png);">
                            <div class="desc">
                                <img src="<?php bloginfo('template_url'); ?>/images/new.svg" style="height:60px;width:60px;margin-left: 78%;margin-bottom: 65%;">
                                <a href="#" class="d-flex align-items-center justify-content-center">
                                    VER DETALHES
                                </a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="#">Jeans pop</a></h3>
                            <div class="product-price">
                                <span class="old">R$60,00</span>
                                <span>R$50,00</span>
                            </div>
                        </div>
                    </div>
                    <div class="single-product">
                        <div class="product-img d-flex justify-content-center align-items-center" style="background-image: url(<?php bloginfo('template_url'); ?>/images/card.png);">
                            <div class="desc">
                                <img src="<?php bloginfo('template_url'); ?>/images/new.svg" style="height:60px;width:60px;margin-left: 78%;margin-bottom: 65%;">
                                <a href="#" class="d-flex align-items-center justify-content-center">
                                    VER DETALHES
                                </a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="#">Jeans pop</a></h3>
                            <div class="product-price">
                                <span class="old">R$60,00</span>
                                <span>R$50,00</span>
                            </div>
                        </div>
                    </div>
                    <div class="single-product">
                        <div class="product-img d-flex justify-content-center align-items-center" style="background-image: url(<?php bloginfo('template_url'); ?>/images/card.png);">
                            <div class="desc">
                                <img src="<?php bloginfo('template_url'); ?>/images/new.svg" style="height:60px;width:60px;margin-left: 78%;margin-bottom: 65%;">
                                <a href="#" class="d-flex align-items-center justify-content-center">
                                    VER DETALHES
                                </a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="#">Jeans pop</a></h3>
                            <div class="product-price">
                                <span class="old">R$60,00</span>
                                <span>R$50,00</span>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="single-product">
                        <div class="product-img">
                            <a href="#">
                                <img class="default-img" src="<?php bloginfo('template_url'); ?>/images/card.png" alt="#">
                                <img class="hover-img" src="<?php bloginfo('template_url'); ?>/images/card.png" alt="#">
                            </a>
                            <div class="button-head">
                                <img src="<?php bloginfo('template_url'); ?>/images/new.png" stcyle="height:auto;width:auto;margin-left: 78%;">
                                <div class="product-action-2 d-flex justify-content-center">
                                    <a class="btn btn-primary" href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="product-details.html">Jeans pop</a></h3>
                            <div class="product-price">
                                <span class="old">R$60,00</span>
                                <span>R$50,00</span>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-area most-popular section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>NOSSA PROMOÇÕES</h2>
                </div>
            </div>
        </div>
        <div class="row" style="box-shadow: 0 1px #e9e9e9; padding-bottom: 30px;">
            <div class="col-12">
                <div class="products owl-carousel popular-slider">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-img d-flex justify-content-center align-items-center" style="background-image: url(<?php bloginfo('template_url'); ?>/images/card.png);">
                            <div class="desc">
                                <img src="<?php bloginfo('template_url'); ?>/images/new.svg">
                                <a href="#" class="d-flex align-items-center justify-content-center">
                                    VER DETALHES
                                </a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="#">Jeans pop</a></h3>
                            <div class="product-price">
                                <span class="old">R$50,00</span>
                                <span>R$49,90</span>
                            </div>
                        </div>
                    </div>
                    <div class="single-product">
                        <div class="product-img d-flex justify-content-center align-items-center" style="background-image: url(<?php bloginfo('template_url'); ?>/images/card2.png);">
                            <div class="desc">
                                <img src="<?php bloginfo('template_url'); ?>/images/new.svg" style="height:60px;width:60px;margin-left: 78%;margin-bottom: 65%;">
                                <a href="#" class="d-flex align-items-center justify-content-center">
                                    VER DETALHES
                                </a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="#">Jeans pop</a></h3>
                            <div class="product-price">
                                <span class="old">R$120,00</span>
                                <span>R$99,90</span>
                            </div>
                        </div>
                    </div>
                    <div class="single-product">
                        <div class="product-img d-flex justify-content-center align-items-center" style="background-image: url(<?php bloginfo('template_url'); ?>/images/card3.png);">
                            <div class="desc">
                                <img src="<?php bloginfo('template_url'); ?>/images/new.svg" style="height:60px;width:60px;margin-left: 78%;margin-bottom: 65%;">
                                <a href="#" class="d-flex align-items-center justify-content-center">
                                    VER DETALHES
                                </a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="#">Jeans pop</a></h3>
                            <div class="product-price">
                                <span class="old">R$100,00</span>
                                <span>R$69,90</span>
                            </div>
                        </div>
                    </div>
                    <div class="single-product">
                        <div class="product-img d-flex justify-content-center align-items-center" style="background-image: url(<?php bloginfo('template_url'); ?>/images/card4.png);">
                            <div class="desc">
                                <img src="<?php bloginfo('template_url'); ?>/images/new.svg" style="height:60px;width:60px;margin-left: 78%;margin-bottom: 65%;">
                                <a href="#" class="d-flex align-items-center justify-content-center">
                                    VER DETALHES
                                </a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="#">Jeans pop</a></h3>
                            <div class="product-price">
                                <span class="old">R$99,90</span>
                                <span>R$79,90</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-area most-popular section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>NOVIDADES</h2>
                </div>
            </div>
        </div>
        <div class="row" style="box-shadow: 0 1px #e9e9e9; padding-bottom: 30px;">
            <div class="col-12">
                <div class="products owl-carousel popular-slider">
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-img d-flex justify-content-center align-items-center" style="background-image: url(<?php bloginfo('template_url'); ?>/images/card3.png);">
                            <div class="desc">
                                <img src="<?php bloginfo('template_url'); ?>/images/new.svg" style="height:60px;width:60px;margin-left: 78%;margin-bottom: 65%;">
                                <a href="#" class="d-flex align-items-center justify-content-center">
                                    VER DETALHES
                                </a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="#">Jeans pop</a></h3>
                            <div class="product-price">
                                <span class="old">R$100,00</span>
                                <span>R$69,90</span>
                            </div>
                        </div>
                    </div>
                    <div class="single-product">
                        <div class="product-img d-flex justify-content-center align-items-center" style="background-image: url(<?php bloginfo('template_url'); ?>/images/card2.png);">
                            <div class="desc">
                                <img src="<?php bloginfo('template_url'); ?>/images/new.svg" style="height:60px;width:60px;margin-left: 78%;margin-bottom: 65%;">
                                <a href="#" class="d-flex align-items-center justify-content-center">
                                    VER DETALHES
                                </a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="#">Jeans pop</a></h3>
                            <div class="product-price">
                                <span class="old">R$120,00</span>
                                <span>R$99,90</span>
                            </div>
                        </div>
                    </div>
                    <div class="single-product">
                        <div class="product-img d-flex justify-content-center align-items-center" style="background-image: url(<?php bloginfo('template_url'); ?>/images/card.png);">
                            <div class="desc">
                                <img src="<?php bloginfo('template_url'); ?>/images/new.svg">
                                <a href="#" class="d-flex align-items-center justify-content-center">
                                    VER DETALHES
                                </a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="#">Jeans pop</a></h3>
                            <div class="product-price">
                                <span class="old">R$50,00</span>
                                <span>R$49,90</span>
                            </div>
                        </div>
                    </div>
                    <div class="single-product">
                        <div class="product-img d-flex justify-content-center align-items-center" style="background-image: url(<?php bloginfo('template_url'); ?>/images/card4.png);">
                            <div class="desc">
                                <img src="<?php bloginfo('template_url'); ?>/images/new.svg" style="height:60px;width:60px;margin-left: 78%;margin-bottom: 65%;">
                                <a href="#" class="d-flex align-items-center justify-content-center">
                                    VER DETALHES
                                </a>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="#">Jeans pop</a></h3>
                            <div class="product-price">
                                <span class="old">R$99,90</span>
                                <span>R$79,90</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
