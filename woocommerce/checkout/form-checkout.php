<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */
if (!defined('ABSPATH')) {
    exit;
}
/**
 * Include header.php or header-XXX.php for custom page
 *
 * @link        https://codex.wordpress.org/Function_Reference/get_header
 */
//get_template_part('template-parts/template', 'hero');
?>
<style>
    @media screen and (min-width: 1400px){
	.container {
	    max-width: 1340px !important;
	}
    }
    .woocommerce-input-wrapper{
	width: 100%;
    }
</style>
<section class="virtuclean_checkout">
    <div class="container">
        <div class="row">
	    <?php
//do_action( 'woocommerce_before_checkout_form', $checkout );
// If checkout registration is disabled and not logged in, the user cannot checkout.
//            if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
//                echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
//                return;
//            }
	    ?>

            <form name="checkout" method="post" class=" row checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

                <div class="col-12">
		    <?php if ($checkout->get_checkout_fields()) : ?>
			<?php do_action('woocommerce_checkout_before_customer_details'); ?>
    		</div>
    		<div class="col-lg-7">
    		    <div  id="customer_details">
    			<div>
				<?php do_action('woocommerce_checkout_billing'); ?>
    			</div>
    			<div>
				<?php do_action('woocommerce_checkout_shipping'); ?>
    			</div>
    		    </div>

			<?php do_action('woocommerce_checkout_after_customer_details'); ?>

		    <?php endif; ?>
		    <div class="woocommerce-shipping-fields">
			<?php if (true === WC()->cart->needs_shipping_address()) : ?>

    			<!--     			<h4 id="ship-to-different-address" style="margin-top: 30px">
    						    <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
    							<input id="ship-to-different-address-checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" <?php //checked(apply_filters('woocommerce_ship_to_different_address_checked', 'shipping' === get_option('woocommerce_ship_to_destination') ? 1 : 0 ), 1);  ?> type="checkbox" name="ship_to_different_address" value="1" /> <span><?php //esc_html_e('Ship to a different address?', 'woocommerce');  ?></span>
    						    </label>
    						</h4> -->



			<?php endif; ?>
		    </div>
                </div>
                <div class="col-lg-5 order_info_block">
		    <?php do_action('woocommerce_checkout_before_order_review_heading'); ?>

                    <h3 id="order_review_heading"><?php esc_html_e('Your order', 'woocommerce'); ?></h3>

		    <?php do_action('woocommerce_checkout_before_order_review'); ?>

                    <div id="order_review" class="woocommerce-checkout-review-order">
			<?php do_action('woocommerce_checkout_order_review'); ?>

                    </div>

                </div>

                <div class="col-12 virtuclean_payment">
		    <?php add_action('woocommerce_after_order_notes', 'woocommerce_checkout_payment', 20); ?>
		    <?php
		    if (!is_ajax()) {
			do_action('woocommerce_review_order_before_payment');
		    }
		    ?>
                    <div id="payment" class="woocommerce-checkout-payment">
			<?php if (WC()->cart->needs_payment()) : ?>
    			<ul class="wc_payment_methods payment_methods methods">
				<?php
				if (!empty($available_gateways)) {
				    foreach ($available_gateways as $gateway) {
					wc_get_template('checkout/payment-method.php', array('gateway' => $gateway));
				    }
				} else {
				    echo '<li class="woocommerce-notice woocommerce-notice--info woocommerce-info">' . apply_filters('woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? esc_html__('Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce') : esc_html__('Please fill in your details above to see available payment methods.', 'woocommerce') ) . '</li>'; // @codingStandardsIgnoreLine
				}
				?>
    			</ul>
			<?php endif; ?>
                        <div class="form-row place-order">
                            <noscript>
			    <?php
			    /* translators: $1 and $2 opening and closing emphasis tags respectively */
			    printf(esc_html__('Since your browser does not support JavaScript, or it is disabled, please ensure you click the %1$sUpdate Totals%2$s button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce'), '<em>', '</em>');
			    ?>
			    <br/><button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="<?php esc_attr_e('Update totals', 'woocommerce'); ?>"><?php esc_html_e('Update totals', 'woocommerce'); ?></button>
                            </noscript>

			    <?php wc_get_template('checkout/terms.php'); ?>

			    <?php do_action('woocommerce_review_order_before_submit'); ?>

			    <?php echo apply_filters('woocommerce_order_button_html', '<button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr('Please order') . '" data-value="' . esc_attr('Please order') . '">' . esc_html('Please order') . '</button>'); // @codingStandardsIgnoreLine  ?>

			    <?php do_action('woocommerce_review_order_after_submit'); ?>

			    <?php wp_nonce_field('woocommerce-process_checkout', 'woocommerce-process-checkout-nonce'); ?>
                        </div>
                    </div>
		    <?php
		    if (!is_ajax()) {
			do_action('woocommerce_review_order_after_payment');
		    }
		    ?>
                </div>


            </form>

	    <?php do_action('woocommerce_after_checkout_form', $checkout); ?>
        </div>
    </div>
</section>


<section class="home_reviews" style="padding-top: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2><?php echo get_field('title_reviews_all', 'option'); ?></h2>
            </div>
            <div class="col-12 recent_reviews_slider ">
                <div class="recent_reviews_owl owl-carousel owl-theme">
		    <?php
		    if (have_rows('reviews', 'options')):
			while (have_rows('reviews', 'options')): the_row();
			    // vars
			    $photo = get_sub_field('photo');
			    $autor = get_sub_field('autor');
			    $content = get_sub_field('content');
			    $date = get_sub_field('date');
			    ?>
			    <div class="item row">
				<div class="col-lg-3 col-md-12 recent_reviews_image">
				    <img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>">
				    <span class="reviews_autor"><?php echo $autor; ?></span>
				    <span class="time">
					<?php echo $date; ?>
				    </span>
				</div>
				<div class="col-lg-9 col-md-12 recent_reviews_content">
				    <p><?php echo $content; ?></p>
				</div>
			    </div>
			    <?php
			endwhile;
		    endif;
		    ?>
                </div>
                <div id="counter_slider"></div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
	$('input').val('');
	$('select').val('');
    });

</script>
