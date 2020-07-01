<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
<?php get_template_part('template-parts/template', 'hero');?>
<section class="virtuclan_thankyou">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="woocommerce-order">

                    <?php if ( $order ) : ?>
                        <?php if ( $order->has_status( 'failed' ) ) : ?>

                            <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

                            <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
                                <a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'woocommerce' ) ?></a>
                                <?php if ( is_user_logged_in() ) : ?>
                                    <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php _e( 'My account', 'woocommerce' ); ?></a>
                                <?php endif; ?>
                            </p>

                        <?php else : ?>
                            <?php
                            $products_id = array();
                            if(isset($_COOKIE['timer_order'])  ) {
                                foreach ($order->get_items() as $item_id => $item_data) {
                                    $product = $item_data->get_product();
                                    $product_id = $product->get_id();
                                    array_push($products_id, $product_id);
                                }

                                $isset_product = array_search('1953', $products_id);
                                if(!$isset_product){
                                    $order->add_product(wc_get_product('1953'));
                                }
                            }

                            ?>
                            <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">Thank you very much for your purchase. You will receive a confirmation email shortly with shipping information. Should you have any questions in the meantime please email us at' <a href="mailto:sales@virtuclean.com">Sales@virtuclean.com </a> or give a call at
                                <a href="tel:855-284-6557">855-284-6557</a></p>

                            <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

                                <li class="woocommerce-order-overview__order order">
                                    <?php _e( 'Order number:', 'woocommerce' ); ?>
                                    <strong><?php echo $order->get_order_number(); ?></strong>
                                </li>

                                <li class="woocommerce-order-overview__date date">
                                    <?php _e( 'Date:', 'woocommerce' ); ?>
                                    <strong><?php echo wc_format_datetime( $order->get_date_created() ); ?></strong>
                                </li>

                                <?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
                                    <li class="woocommerce-order-overview__email email">
                                        <?php _e( 'Email:', 'woocommerce' ); ?>
                                        <strong><?php echo $order->get_billing_email(); ?></strong>
                                    </li>
                                <?php endif; ?>

                                <li class="woocommerce-order-overview__total total">
                                    <?php _e( 'Total:', 'woocommerce' ); ?>
                                    <strong><?php echo $order->get_formatted_order_total(); ?></strong>
                                </li>

                                <?php if ( $order->get_payment_method_title() ) : ?>
                                    <li class="woocommerce-order-overview__payment-method method">
                                        <?php _e( 'Payment method:', 'woocommerce' ); ?>
                                        <strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
                                    </li>
                                <?php endif; ?>

                            </ul>

                        <?php endif; ?>

                        <?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
					 <?php if($order->get_payment_method('cod')) : ?>
                            <a href="https://www.carecredit.com/Pay/749FCR/" style="margin: 25px 0;" class="btn_get_in_touch">Care Credit</a>
                        <?php else: ?>

                        <?php endif; ?>
                        <?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

                        <?php if($order->get_payment_method() == 'cod') : ?>
                            <p>Please click here to proceed with the Care Credit Financing. Then your order will be shipped.</p>
                            <div class="home_btn">
                                <a style="background-size: 650px;" class="btn_get_in_touch" href="https://www.carecredit.com/Pay/749FCR/"><?php _e( 'CLICK HERE FOR FINANCE', 'woocommerce' ); ?></a>
                            </div>
                        <?php else: ?>
                            <div class="home_btn">
                                <a style="background-size: 650px;" class="btn_get_in_touch" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Main Page', 'woocommerce' ); ?></a>
                            </div>

                        <?php endif; ?>


                    <?php else : ?>

                        <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></p>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</section>

