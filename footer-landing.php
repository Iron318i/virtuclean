<?php

/**
 * Footer template
 *
 * @package     WordPress
 * @subpackage  RST v3
 * @since       1.0.0
 * @author      Serhii Sokol
 */
$footer_l = get_field('footer_l');
?>
<footer class="l__footer">
    <div class="l_copyright">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php echo $footer_l; ?>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php
 $l_popap = get_field('lending_popap', 'option');
?>
    <div id="l_popap" class="l_popap">
        <div class="l_popap__img">
            <img src="<?php echo $l_popap['image']['url']; ?>" alt="<?php echo $l_popap['image']['alt']; ?>">
        </div>
        <div class="l_popap__text">
            <?php echo $l_popap['content']; ?>
            <?php
            $welcome = get_field('welcome');
            $id_product = get_field('main_product', 'options');
            if (isset($id_product)) :
                ?><a href="<?php echo home_url('/checkout/?add-to-cart='.$id_product.'&quantity=1');?>" class="btn_buy_on_click"><?php echo $welcome['link_name']; ?></a>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php wp_footer(); ?>

</body>
</html>
