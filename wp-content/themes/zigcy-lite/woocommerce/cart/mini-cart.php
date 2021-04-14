<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 9.9.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_mini_cart' ); ?>

<?php if ( ! WC()->cart->is_empty() ) : ?>

	<ul class="woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr( $args['list_class'] ); ?>">
		<?php
			do_action( 'woocommerce_before_mini_cart_contents' );

			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
					$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
					$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );

					

					?>
					<li class="woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
						
						<?php if ( empty( $product_permalink ) ) : ?>
							<div class='minicart-item-thumb'>
								<?php echo wp_kses_post($thumbnail); ?>
							</div>
							<div class="minicart-item-content">
								<h4 class="item-title"><?php echo esc_html($product_name) ; ?></h4>
								<?php echo wc_get_formatted_cart_item_data( $cart_item ); // WPCS: XSS OK.?>

							<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); // WPCS: XSS OK.?>

							</div><!-- .minicart-item-content -->
						<?php else : ?>
							
							<div class='minicart-item-thumb'>
								<a href="<?php echo esc_url( $product_permalink ); ?>">
									<?php echo wp_kses_post($thumbnail); ?>
								</a>
							</div>
							<div class="minicart-item-content">
								<h4 class="item-title">
									<a href="<?php echo esc_url( $product_permalink ); ?>">
									<?php echo esc_html($product_name) ; ?>
									</a>
								</h4>
								<?php echo wc_get_formatted_cart_item_data( $cart_item ); // WPCS: XSS OK.?>

							<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); // WPCS: XSS OK. ?>

							</div><!-- .minicart-item-content -->
							
						<?php endif; ?>
						
						<?php

						$woo_val = (apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
							'<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s"><i class="lnr lnr-cross"></i></a>',
							esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
							esc_html__( 'Remove this item', 'zigcy-lite' ),
							esc_attr( $product_id ),
							esc_attr( $cart_item_key ),
							esc_attr( $_product->get_sku() )
						), $cart_item_key )); 
						echo $woo_val; // WPCS: XSS OK.
						?>
						
					</li>
					<?php
				}
			}

			do_action( 'woocommerce_mini_cart_contents' );
		?>
	</ul>
    
	<p class="woocommerce-mini-cart__total total"><strong><?php esc_html_e( 'Subtotal', 'zigcy-lite' ); ?>:</strong> <?php echo wp_kses_post(WC()->cart->get_cart_subtotal()); ?></p>
    <span class="sm-cart-btn-wrap">
	   <?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>
	<p class="woocommerce-mini-cart__buttons buttons"><?php do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?></p>
    </span>    
<?php else : ?>

	<p class="woocommerce-mini-cart__empty-message"><?php esc_html_e( 'No products in the cart.','zigcy-lite' ); ?></p>

<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>
