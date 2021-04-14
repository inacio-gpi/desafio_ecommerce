<form role="search" method="get" id="searchform" class="searchform" action="<?php bloginfo('url'); ?>">
    <input type="text" name="s" id="s" class="pesquisa-artigos" placeholder="Pesquisar..."
           value="<?php the_search_query(); ?>" style="
                color:#213E8A;
                background-image:url(<?php bloginfo('template_url'); ?>/images/lupa.png);"
    >
</form>