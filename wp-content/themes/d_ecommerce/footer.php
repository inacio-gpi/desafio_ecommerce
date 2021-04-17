<footer class="site-footer custom-border-top">
    <div class="container">
        <div class="row" style="box-shadow: 0 1px #e9e9e9; padding-bottom: 30px;">
            <div class="col-lg-5 ml-auto mb-5 mb-lg-0">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <h3 class="footer-heading mb-4">INSTITUCIONAL</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">EMPRESA</a></li>
                            <li><a href="#">CADASTRE-SE</a></li>
                            <li><a href="#">MEUS PEDIDOS</a></li>
                            <li><a href="#">CONTATO</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <h3 class="footer-heading mb-4">DÚVIDAS</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">COMO COMPRAR</a></li>
                            <li><a href="#">PAGAMENTO</a></li>
                            <li><a href="#">PRAZOS E ENVIOS</a></li>
                            <li><a href="#">GARANTIA</a></li>
                            <li><a href="#">TROCA</a></li>
                            <li><a href="#">SEGURANÇA</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <h3 class="footer-heading mb-4">ATENDIMENTO</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">(00) 9 0000-0000</a></li>
                            <li><a href="#">(00) 9 0000-0000</a></li>
                            <li><a href="#">inacio.gpi@gmail.com</a></li>
                            <li><a href="#">Clique aki e fale conosco</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                <div class="block-7">
                    <h3 class="footer-heading mb-4">PAGAMENTO</h3>
                    <img src="<?php bloginfo('template_url'); ?>/images/payments.png" alt="#">
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="block-5 mb-5">
                    <h3 class="footer-heading mb-4">Social</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">Instagram</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row mt-5 text-center">
            <div class="col-md-12">
                <p>
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> TODOS OS DIREITOS RESERVADO
                    <a href="https://www.instagram.com/guilherme_psiu/" target="_blank" class="text-primary">@Guilherme_psiu</a>

                </p>
            </div>
        </div>
    </div>
</footer>
<!-- /End Footer Area -->

<!-- Jquery -->
<script src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery-migrate-3.0.0.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery-ui.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/popper.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/owl-carousel.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/magnific-popup.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/nicesellect.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/active.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/slicknav.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/scrollup.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/easing.js"></script>
<script>
    $(".btn-search").on("click", function() {
        $(".input").toggleClass("inclicked");
        $(".btn-search").toggleClass("close");
    })
</script>

<?php wp_footer(); ?>

</body>

</html>