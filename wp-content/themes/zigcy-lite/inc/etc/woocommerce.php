<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Store_Mart_Lite
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function zigcy_lite_woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'zigcy_lite_woocommerce_setup' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function zigcy_lite_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'zigcy_lite_woocommerce_active_body_class' );

/**
 * Products per page.
 *
 * @return integer number of products.
 */
function zigcy_lite_woocommerce_products_per_page() {
	return 12;
}
add_filter( 'loop_shop_per_page', 'zigcy_lite_woocommerce_products_per_page' );

/**
 * Product gallery thumnbail columns.
 *
 * @return integer number of columns.
 */
function zigcy_lite_woocommerce_thumbnail_columns() {
	return 4;
}
add_filter( 'woocommerce_product_thumbnails_columns', 'zigcy_lite_woocommerce_thumbnail_columns' );

/**
 * Default loop columns on product archives.
 *
 * @return integer products per row.
 */
function zigcy_lite_woocommerce_loop_columns() {
	return 3;
}
add_filter( 'loop_shop_columns', 'zigcy_lite_woocommerce_loop_columns' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function zigcy_lite_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'zigcy_lite_woocommerce_related_products_args' );

if ( ! function_exists( 'zigcy_lite_woocommerce_product_columns_wrapper' ) ) {
	/**
	 * Product columns wrapper.
	 *
	 * @return  void
	 */
	function zigcy_lite_woocommerce_product_columns_wrapper() {
		$columns = zigcy_lite_woocommerce_loop_columns();
		echo '<div class="columns-' . absint( $columns ) . '">';
	}
}
add_action( 'woocommerce_before_shop_loop', 'zigcy_lite_woocommerce_product_columns_wrapper', 40 );

if ( ! function_exists( 'zigcy_lite_woocommerce_product_columns_wrapper_close' ) ) {
	/**
	 * Product columns wrapper close.
	 *
	 * @return  void
	 */
	function zigcy_lite_woocommerce_product_columns_wrapper_close() {
		echo '</div>';
	}
}
add_action( 'woocommerce_after_shop_loop', 'zigcy_lite_woocommerce_product_columns_wrapper_close', 40 );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_sidebar',             'woocommerce_get_sidebar',                  10 );


if ( ! function_exists( 'zigcy_lite_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function zigcy_lite_woocommerce_wrapper_before() {
		?>
		<div class="container">
			<div class="sml-shop-wrap sml-page-wrap sml-archive-wrapper">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">
						<?php
					}
				}
				add_action( 'woocommerce_before_main_content', 'zigcy_lite_woocommerce_wrapper_before' );

				if ( ! function_exists( 'zigcy_lite_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function zigcy_lite_woocommerce_wrapper_after() {
		?>
	</main><!-- #main -->
	<?php //echo 'aaa'; ?>
</div><!-- #primary -->
<?php zigcy_lite_product_sidebar(); ?>
</div>
</div>
<?php
}
}
add_action( 'woocommerce_after_main_content', 'zigcy_lite_woocommerce_wrapper_after' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'zigcy_lite_woocommerce_header_cart' ) ) {
			zigcy_lite_woocommerce_header_cart();
		}
	?>
 */

	if ( ! function_exists( 'zigcy_lite_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function zigcy_lite_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		zigcy_lite_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'zigcy_lite_woocommerce_cart_link_fragment' );

/*********************************************************************************************************************************/
if ( ! function_exists( 'zigcy_lite_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function zigcy_lite_woocommerce_cart_link() {
		$zigcy_lite_cart_title = get_theme_mod('zigcy_lite_cart_title','My Cart');
		?>
		<a href="<?php echo esc_url(wc_get_cart_url());?>" class="cart-contents">
			<span class="sm-cart-icon-wrap">
				<span class="icon">
					<?php zigcy_lite_cart_icon(); ?>
				</span>
				<span class="sm-cart-count">
					<?php echo absint (WC()->cart->get_cart_contents_count());?>
				</span>
			</span>
			<span class="sm-cart-wrap">
				<span class="sm-cart-text"><?php echo esc_html($zigcy_lite_cart_title); ?></span>
				<span class="sm-cart-amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span>
			</span>
		</a>
		<?php
	}
}

if ( ! function_exists( 'zigcy_lite_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function zigcy_lite_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php zigcy_lite_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}

/*********************************************************************************************************************************/
/**
 * Advance WooCommerce Product Search With Category
**/
if(!function_exists ('zigcy_lite_product_search')){
	
	function zigcy_lite_product_search(){
		
		$args = array(
			'number'     => '',
			'orderby'    => 'name',
			'order'      => 'ASC',
			'hide_empty' => true
		);
		$product_categories = get_terms( 'product_cat', $args ); 
		$categories_show = '<option value="">'.esc_html__('All Categories','zigcy-lite').'</option>';
		$check = '';
		if(is_search()){
			if(isset($_GET['term']) && $_GET['term']!=''){
				$check = isset($_GET['term']) ? sanitize_text_field( wp_unslash( $_GET['term'] ) ): '';


			}
		}
		$checked = '';
		$allcat = esc_html__('All Categories','zigcy-lite');
		$categories_show .= '<optgroup class="sm-advance-search" label="'.$allcat.'">';
		foreach($product_categories as $category){
			if(isset($category->slug)){
				if(trim($category->slug) == trim($check)){
					$checked = 'selected="selected"';
				}
				$categories_show  .= '<option '.$checked.' value="'.$category->slug.'">'.$category->name.'</option>';
				$checked = '';
			}
		}
		$categories_show .= '</optgroup>';
		$form = '<form role="search" method="get" id="searchform"  action="' . esc_url( home_url( '/'  ) ) . '">
		<div class = "search-wrap">
		<div class="sm_search_wrap">
		<select class="sm_search_product false" name="term">'.$categories_show.'
		</select>
		</div>
		<div class="sm_search_form">
		<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' .esc_attr__('search entire store here','zigcy-lite'). '" autocomplete="off"/>
		<button type="submit" id="searchsubmit">
		<i class="fa fa-search"></i></button>
		<input type="hidden" name="post_type" value="product" />
		<input type="hidden" name="taxonomy" value="product_cat" />
		</div>
		<div class="search-content"></div>
		</div>
		
		</form>';           
		return $form;
		
	}
}

/*********************************************************************************************************************************/
/**
* Cart Icon
*/
if ( !function_exists( 'zigcy_lite_cart_icon' ) ) {

	function zigcy_lite_cart_icon() {
		
        //$cart_icon = isset( $store_mart_options[ 'shopping-cart-icon' ] ) ? $store_mart_options[ 'shopping-cart-icon' ] : 'carticon-line-cart1';
		?>
		<span class="lnr lnr-cart"></span>
		<?php
	}

}



/*********************************************************************************************************************************/
if ( ! function_exists( 'zigcy_lite_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function zigcy_lite_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?> sm-cart">
				<?php echo zigcy_lite_woocommerce_cart_link(); // WPCS: XSS OK.?>
			</li>
			<?php if( ! wp_is_mobile() ){ ?>
			<li class="cart-itm">
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>	
			<?php } ?>
			
		</ul>
		<?php
	}
}

remove_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail',10);
remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash',10);

remove_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open',10);
remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close',5);

add_action('woocommerce_before_shop_loop_item_title','zigcy_lite_prod_img_wrap',10);

function zigcy_lite_prod_img_wrap(){
	?>
	<div class="sml-product-wrapp">
		<?php
		woocommerce_template_loop_product_link_open();
		woocommerce_template_loop_product_thumbnail();
		woocommerce_show_product_loop_sale_flash();
		woocommerce_template_loop_product_link_close();?>
	</div>
	<?php }



//wishlist and compare
	add_action('woocommerce_after_shop_loop_item','zigcy_lite_add_to_wishlist_wrap',30);

	function zigcy_lite_add_to_wishlist_wrap(){
		?>
		<div class = "sml-add-to-wishlist-wrap">
			<?php
			zigcy_lite_wishlist_products();
		echo zigcy_lite_compare_url(); // WPCS: XSS OK.
		echo '<div class="sml-quick-view-wrapp">';
		zigcy_lite_quickview();
	echo '</div>';?>
</div>
<?php 
}

/******************************************************************************************************************/
//remove product title only
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10);
remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5);
remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',10);


add_action('woocommerce_after_shop_loop_item','zigcy_lite_product_title_wrap',25);


//add to cart
remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',10);

add_action('woocommerce_after_shop_loop_item','zigcy_lite_add_to_cart_wrap',10);

function zigcy_lite_add_to_cart_wrap(){
	?>
	<div class = "sml-add-to-cart-wrap">
		<?php
		woocommerce_template_loop_add_to_cart();
	//zigcy_lite_quickview();?>
</div>
<?php 
}


/******************************************************************************************************************/
remove_action('woocommerce_after_shop_loop_item','zigcy_lite_add_to_cart_wrap',10);

//product title 
if( ! function_exists('zigcy_lite_product_title_wrap') ){
	function zigcy_lite_product_title_wrap(){
		echo '<div class="sml-product-title-wrapp">';
		zigcy_lite_product_title();
		echo '<div class="sml-price-wrap">';
		woocommerce_template_loop_price();
		woocommerce_template_loop_rating();
		zigcy_lite_add_to_cart_wrap();
		echo '</div>';
		echo '</div>';
	}
}

/******************************************************************************************************************/
/**
* Product title
*/
if( ! function_exists('zigcy_lite_product_title')){
	function zigcy_lite_product_title(){
		echo '<h2 class="woocommerce-loop-product__title">';
		woocommerce_template_loop_product_link_open();
		the_title();
		woocommerce_template_loop_product_link_close();
		echo '</h2>';
	}
}

remove_action('woocommerce_after_shop_loop_item','zigcy_lite_add_to_wishlist_wrap',30);
//remove_action('woocommerce_after_shop_loop_item','zigcy_lite_add_to_cart_wrap',10);

remove_action('woocommerce_before_shop_loop_item','zigcy_lite_woo_wrap_open',9);
remove_action('woocommerce_after_shop_loop_item','zigcy_lite_woo_wrap_close',6);
remove_action('woocommerce_before_shop_loop_item_title','zigcy_lite_link_close',11);
remove_action('woocommerce_before_shop_loop_item_title','zigcy_lite_prod_img_wrap',10);

add_action('woocommerce_before_shop_loop_item','zigcy_lite_product_main_wrap',8);

if( ! function_exists('zigcy_lite_product_main_wrap') ){
	function zigcy_lite_product_main_wrap(){
		echo '<div class="sml-product-image-wrapp">';
		zigcy_lite_add_to_wishlist_wrap();
		//zigcy_lite_add_to_cart_wrap();
		zigcy_lite_prod_img_wrap();
		echo '</div>';
	}
}


/**
* WooCommerce Page titles and breadcrumbs
* 
*
*/

remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );


add_filter( 'woocommerce_show_page_title' , 'zigcy_lite_shop_title' );
if( !function_exists('zigcy_lite_shop_title') ){
	function zigcy_lite_shop_title(){
		return false;
	}
}

add_action( 'woocommerce_before_shop_loop', 'zigcy_lite_woo_archive_total_count', 20 );
/*---------------------------------------------------------------------------------------------------*/
/**
* Shop Archive Header
*/
if( ! function_exists('zigcy_lite_woo_archive_total_count')){
	function zigcy_lite_woo_archive_total_count(){
		?>
		<div class="archive-header">
			<span>
				<?php
				if( wc_get_loop_prop('total') < 2 ){
					/* translators: 1: total product count. */
					printf( esc_html__( 'There is %1$s product', 'zigcy-lite' ), absint(wc_get_loop_prop('total') ));
				}else{
					/* translators: 1: total product count. */
					printf( esc_html__( 'There are %1$s products', 'zigcy-lite' ), absint(wc_get_loop_prop('total') ));	
				}
				
				?>
			</span>
			<?php woocommerce_catalog_ordering(); ?>
		</div>
		<?php 	
	}
}


/**
* product page sidebars
*
*/
if( ! function_exists('zigcy_lite_product_sidebar') ){
	function zigcy_lite_product_sidebar(){
		
		if( is_shop() || is_product_category() ){
			$woocommerce_layout = get_theme_mod('sml_archive_product_layout_sidebars','right-sidebar');

		}elseif(is_product()){
			$woocommerce_layout = get_theme_mod('sml_single_product_layout_sidebars','right-sidebar');
		}
		if( $woocommerce_layout == 'right-sidebar' ){
			get_sidebar( 'right' );
		}
		if( $woocommerce_layout == 'left-sidebar' ){
			get_sidebar( 'left' );
		}
		if( $woocommerce_layout == 'both-sidebar' ){
			get_sidebar( 'left' );
			get_sidebar( 'right' );
		}

	}
}

/*---------------------------------------------------------------------------------------------------*/
/**
* Single Product page social share
*
* @hooked zigcy_lite_product_share()
*/
add_action( 'wp_head','zigcy_lite_product_share' );

if( ! function_exists('zigcy_lite_product_share') ){

	function zigcy_lite_product_share(){
		
		$show_product_share = get_theme_mod('zigcy_lite_share_enable','off');
		if($show_product_share == 'on'){
			
			add_action( 'woocommerce_share', 'zigcy_lite_entry_social_share' );
			
		}

	}	
}

/*---------------------------------------------------------------------------------------------------*/
/**
* Single Product Content Page
*
* 
*/

remove_action('woocommerce_single_product_summary','woocommerce_template_single_price',10);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_add_to_cart',30);
remove_action('woocommerce_single_variation','woocommerce_single_variation',10);


add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 21);
add_action( 'woocommerce_single_product_summary', 'zigcy_lite_single_product_cart_wrapp',31);


/*---------------------------------------------------------------------------------------------------*/
/*
* Single product page cart and wishlists wrapper
*/

if( ! function_exists('zigcy_lite_single_product_cart_wrapp')){
	function zigcy_lite_single_product_cart_wrapp(){
		global $product;
		echo '<div class="sml-single-cart-wrapp sml-single-product-outer">';
		woocommerce_template_single_add_to_cart();
		if( ! $product->is_type( 'variable' ) ){
			zigcy_lite_display_yith_wishlist_loop();
		}
		echo '</div>';
	}
}

