<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;
?>
<?php

/**
 * Include header.php or header-XXX.php for custom page
 *
 * @link        https://codex.wordpress.org/Function_Reference/get_header
 */

get_header();

get_template_part('template-parts/template', 'hero');

?>
<section class="virtuclean_cart_empty">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                /*
                * @hooked wc_empty_cart_message - 10
                */
                do_action( 'woocommerce_cart_is_empty' );
                if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
                    <p class="return-to-shop">
                        <?php
                        $id_product = get_field('main_product', 'options');
                        if (isset($id_product)) : ?>
                            <a class="more_info_btn" href="<?php echo get_the_permalink($id_product); ?>">
                                <?php esc_html_e( 'Return to shop', 'woocommerce' ); ?>
                            </a>
                        <?php endif; ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
