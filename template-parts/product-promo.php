<?php
$black_block = get_field('black_block', 'option');
$wait_block = get_field('blue_block', 'option');

?>
<section class="page-cart-promo">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 ">
                <div class="page-cart-promo__black">
                    <div class="page-cart-promo__icon ">
                        <img src="<?php echo $black_block['icon']['url']; ?>" alt="<?php echo $black_block['icon']['alt']; ?>">
                    </div>
                    <div class="page-cart-promo__text">
                        <?php echo $black_block['content']; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="page-cart-promo__wait">
                    <div class="page-cart-promo__icon">
                        <img src="<?php echo $wait_block['icon']['url']; ?>" alt="<?php echo $wait_block['icon']['alt']; ?>">
                    </div>
                    <div class="page-cart-promo__text">
                        <?php echo $wait_block['content']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>