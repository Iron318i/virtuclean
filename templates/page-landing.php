<?php
get_header('landing');
/* Template Name: Landing Template */
?>
<?php
$welcome = get_field('welcome');
$about_landing = get_field('about_landing');
$features = get_field('features_l');
$video_l = get_field('video_l');
$reviews_l = get_field('reviews_l');
$contact_l = get_field('contact_l');
$product_id = $welcome['product_link'];
$product_gallery_l = get_field('product_gallery_l');
$gallery = $product_gallery_l['images'];
?>
<div class="landing__page">
    <section class="lending__welcome" id="lending__welcome">
        <div class="video__bg">
            <img class="video_mobile_image" src="<?php echo $welcome['mobile_image']['url']; ?>" alt="<?php echo $welcome['mobile_image']['alt']; ?>">
	    <!--            <video id="video" playsinline="" autoplay="" muted="" loop="loop" poster="--><?php //echo $welcome['mobile_image']['url'];  ?><!--">-->
	    <!--                <source src="--><?php //echo $welcome['video'];  ?><!--" type="video/mp4">-->
	    <!--            </video>-->
        </div>
	<!--        <div class="l_w_subtract_top">-->
	<!--            <img src="/wp-content/themes/virtuclean/assets/src/svg/l_w_subtract_top.svg" alt="">-->
	<!--            --><?php //svg('l_w_subtract_top'); ?>
	<!--        </div>-->
        <div class="l_w_subtract_bottom">
	    <!--            --><?php //svg('l_w_subtract_bottom'); ?>
            <img src="/wp-content/themes/virtuclean/assets/src/img/12.png" alt="">
        </div>
        <div class="l_w_img_product">
            <img src="<?php echo $welcome['product_image']['url']; ?>" alt="<?php echo $welcome['product_image']['alt']; ?>">
        </div>
        <div class="l_text_virtuclean">
	    <?php svg('VirtuCLEAN_l'); ?>
        </div>
        <div class="l_animation">
            <div class="l_time">5</div>
            <div class="pulse1"></div>
            <div class="pulse2"></div>
            <div class="pulse3"></div>
        </div>
        <div class="w__content">
            <div class="container">
		<div class="row">
		    <div class="col-lg-6 col-md-7">
			<h1><?php echo $welcome['title']; ?></h1>
			<div class="w__subtitle">
			    <?php echo $welcome['subtitle']; ?>
			</div>
			<div class="w__order_now">
			    <a class="lending_order" href="/cart/?add-to-cart=<?php echo $product_id; ?>"><?php echo $welcome['link_name']; ?></a>
			</div>
		    </div>
		</div>
            </div>
        </div>
    </section>

    <section class="l__about_product"  data-anchor="#l_about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="l_about_content" id="l_about">
                        <h2><?php echo $about_landing['title']; ?></h2>
			<?php echo $about_landing['subtitle']; ?>
			<?php
			global $product;

			$args = array(
			    'post_type' => 'product',
			    'p' => $product_id
			);
			$loop = new WP_Query($args);

			while ($loop->have_posts()) : $loop->the_post();
			    ?>
    			<p class="price">
    			    Only <span class="price-currencySymbol"><?php echo get_woocommerce_currency_symbol(); ?></span>
    			    <span class="price_numb"><?php echo $product->get_price(); ?></span>
    			</p>
			    <?php
			endwhile;
			wp_reset_query();
			?>
                        <a class="lending_order green" href="/cart/?add-to-cart=<?php echo $product_id; ?>"><?php echo $about_landing['link_name']; ?></a>
                    </div>
                </div>
            </div>
        </div>
        <img class="l_about_img" src="<?php echo $about_landing['image_men']['url']; ?>">
        <div class="l_about_photo">
            <div class="ab_circle"></div>
        </div>
        <div class="ab_circle_smoll"></div>
        <div class="l_ab_promo">
            <div class="promo-product-img">
                <img src="/wp-content/uploads/2019/07/High-resolution-pic_0401-1.png" alt="">
            </div>
            <div class="content">
                <span class="img-promo"><img src="/wp-content/uploads/2019/07/discount.png" alt=""></span>
                <h3>Try it risk free for 30 days!</h3>
                <p>30 DAY RISK FREE TRIAL; MONEY-BACK GUARANTEE: The VirtuCLEAN units carry a 30 Day Risk Free Trial. If you are not completely satisfied with your purchase, contact us within 30 days of the date of purchase.</p>
                <a class="lending_order green" href="/cart/?add-to-cart=<?php echo $product_id; ?>"><?php echo $about_landing['link_name']; ?></a>

            </div>
        </div>
    </section>
    <sectoin class="l_features" id="l_features" data-anchor="#l_features">
        <div class="l_ellipse_big"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2><?php echo $features['title']; ?></h2>
		    <?php echo $features['content']; ?>
                </div>
            </div>
        </div>
    </sectoin>
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
		?><a href="<?php echo home_url('/checkout/?add-to-cart=' . $id_product . '&quantity=1'); ?>" class="btn_buy_on_click"><?php echo $welcome['link_name']; ?></a>
	    <?php endif; ?>
        </div>
    </div>
    <?php if ($gallery): ?>
        <sectoin class="l_product_slider" data-anchor="#l_features">
            <div class="wrap">
                <div class="l_product_s owl-carousel owl-theme">
		    <?php
		    foreach ($gallery as $image):
			// var_dump($image);
			?>

			<div class="item">
			    <div class="l_product_slider-box">
				<img src="<?php echo $image['sizes']['large']; ?>" alt='<?php echo $image['alt']; ?>'/>
			    </div>
			</div>
		    <?php endforeach; ?>
                </div>
            </div>
        </sectoin>
    <?php endif; ?>

    <section class="l_video"  data-anchor="#l_video">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2><?php echo $video_l['title']; ?></h2>
                </div>
                <div class="col-xl-8">
                    <div class="l_iframe" id="l_video">
                        <div class="video_bg"></div>
			<?php echo $video_l['link_to_video']; ?>
<!--                        <iframe id="l_video_frame"  width="560" height="335" src="https://www.youtube.com/embed/HdH3F4kICLw?rel=0&showinfo=0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
                        <div class="l_btn_video">
			    <?php svg('l_power'); ?>
                            <span><?php echo $video_l['label_video']; ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <p><?php echo $video_l['subtitle']; ?></p>
                    <div class="l_video_btn">
                        <a class="l_manual" href="<?php echo $video_l['user_manual']['url']; ?>" download><?php svg('landing_pdf'); ?> <?php echo $video_l['download_link_name']; ?></a>
                        <a class="lending_order green" href="/cart/?add-to-cart=<?php echo $product_id; ?>"><?php echo $video_l['link_name_order']; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="l_reviews" id="l_reviews" data-anchor="#l_reviews">
        <div class="top_svg">
            <img src="/wp-content/uploads/2019/05/Subtract-2.png" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2><?php echo $reviews_l['title']; ?></h2>
                </div>
                <div class="col-12 l_slider ">
                    <svg width="135" height="93" viewBox="0 0 135 93" fill="none" xmlns="http://www.w3.org/2000/svg">
		    <path d="M29.6341 33.7171C45.9279 33.7171 59.1366 46.926 59.1366 63.2195C59.1366 79.513 45.9279 92.7219 29.6341 92.7219C13.3404 92.7219 0.131707 79.513 0.131707 63.2195L0 59.0049C0 26.4173 26.4173 0 59.0049 0V16.8585C47.7473 16.8585 37.1633 21.2425 29.2029 29.2029C27.6707 30.7355 26.2722 32.366 25.0107 34.0787C26.5172 33.8417 28.061 33.7171 29.6341 33.7171ZM105.498 33.7171C121.791 33.7171 135 46.926 135 63.2195C135 79.513 121.791 92.7219 105.498 92.7219C89.204 92.7219 75.9951 79.513 75.9951 63.2195L75.8634 59.0049C75.8634 26.4173 102.28 0 134.868 0V16.8585C123.611 16.8585 113.026 21.2425 105.066 29.2029C103.534 30.7355 102.135 32.366 100.874 34.0787C102.38 33.8417 103.924 33.7171 105.498 33.7171Z" fill="#DEF0FB"/>
                    </svg>
                    <div class="l_reviews_owl owl-carousel owl-theme">
			<?php
			if (have_rows('reviews_l')):
			    while (have_rows('reviews_l')): the_row();
				if (have_rows('items')):
				    while (have_rows('items')): the_row();
					// vars
					$content = get_sub_field('content');
					$image = get_sub_field('photo');
					$autor = get_sub_field('autor');
					?>
					<div class="item row">
					    <div class="col-lg-4 col-md-12 recent_reviews_image">
						<div class="l_box">
						    <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>"/>
						</div>

					    </div>
					    <div class="col-lg-8 col-md-12 recent_reviews_content">
						<p><?php echo $content ?></p>
						<span><?php echo $autor ?></span>
					    </div>
					</div>
				    <?php
				    endwhile;
				endif;
			    endwhile;
			endif;
			?>
		    </div>
		</div>
	    </div>
    </section>

    <section class="l_compare" style="padding: 30px 0;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Are All Sleep Sanitizers Created Equally?</h2>
                    <div class="v_compare__container">
                        <table class="v_compare__table">
			    <tbody>
				<tr class="trsmall">
				    <th class="tabl-def">
					<div class="box_image">

					    <img src="/wp-content/uploads/2019/08/1-1.png" alt="" />
					    <div class="text_under">Size comparison</div>
					</div></th>
				    <th class="tabl-1">
					<div class="box_image"><img src="/wp-content/uploads/2019/08/4-1.png" alt="" /></div></th>
				    <th>
					<div class="box_image"><img src="/wp-content/uploads/2019/08/2-1.png" alt="" /></div></th>
				    <th class="tabl-3" style="text-align: center;">
					<div class="box_image"><img src="/wp-content/uploads/2019/08/3-1.png" alt="" /></div></th>
				</tr>
				<tr class="c_name">
				    <td></td>
				    <td style="color: #f0681e;">VirtuCLEAN 2.0</td>
				    <td>Lumin</td>
				    <td>SoClean2</td>
				</tr>
				<tr class="c_prices">
				    <td class="tiile">Price</td>
				    <td style="color: #f0681e;">$279</td>
				    <td>$299</td>
				    <td>$348</td>
				</tr>
				<tr>
				    <td class="tiile">Portable</td>
				    <td style="color: #f0681e;">Yes</td>
				    <td>No</td>
				    <td>No</td>
				</tr>
				<tr>
				    <td class="tiile">Size</td>
				    <td style="color: #f0681e;">4.5"x 1.7"</td>
				    <td>12.25" x 8.5"x 7.75"</td>
				    <td>11”x11”x13”</td>
				</tr>
				<tr>
				    <td class="tiile">Weight</td>
				    <td style="color: #f0681e;">.45 lbs</td>
				    <td>5.5 lbs</td>
				    <td>5.6lbs</td>
				</tr>
				<tr>
				    <td class="tiile">Power</td>
				    <td style="color: #f0681e;">Rechargeable battery</td>
				    <td>Plugs into wall</td>
				    <td>Plugs into wall</td>
				</tr>
				<tr>
				    <td class="tiile">Noise</td>
				    <td style="color: #f0681e;">Quiet</td>
				    <td>Quiet</td>
				    <td>Loud</td>
				</tr>
				<tr>
				    <td class="tiile">Compliance Reminder</td>
				    <td style="color: #f0681e;">Yes</td>
				    <td>No</td>
				    <td>No</td>
				</tr>
				<tr>
				    <td class="tiile">Countdown timer</td>
				    <td style="color: #f0681e;">Yes</td>
				    <td>No</td>
				    <td>No</td>
				</tr>
				<tr>
				    <td class="tiile">Time for cleaning cycle</td>
				    <td style="color: #f0681e;">30 minutes</td>
				    <td>5 minutes</td>
				    <td>2 hours</td>
				</tr>
				<tr>
				    <td class="tiile">Filter replacement?</td>
				    <td style="color: #f0681e;">Yes, $9.99 every 6 months</td>
				    <td>No</td>
				    <td>Yes, $30 every 6 months</td>
				</tr>
				<tr>
				    <td class="tiile">Adapters needed?</td>
				    <td style="color: #f0681e;">Yes, included</td>
				    <td>No</td>
				    <td>Yes, not included</td>
				</tr>
				<tr>
				    <td class="tiile">Steps to clean</td>
				    <td style="color: #f0681e;">1</td>
				    <td>2</td>
				    <td>1</td>
				</tr>
				<tr>
				    <td class="tiile">Prewash of equipment</td>
				    <td style="color: #f0681e;">No</td>
				    <td>No</td>
				    <td>Yes, $18 every 6 months</td>
				</tr>
				<tr>
				    <td class="tiile">Cleaning technology</td>
				    <td style="color: #f0681e;">Ozone</td>
				    <td>UV Light</td>
				    <td>Ozone</td>
				</tr>
				<tr>
				    <td class="tiile">Kills germs and bacteria</td>
				    <td style="color: #f0681e;">Yes</td>
				    <td>Yes</td>
				    <td>Yes</td>
				</tr>
				<tr>
				    <td class="tiile">Warranty offered</td>
				    <td style="color: #f0681e;">24 months</td>
				    <td>24 months</td>
				    <td>24 months</td>
				</tr>
				<tr>
				    <td></td>
				    <td><a class="btn_buy_on_click" href="/checkout/?add-to-cart=125&amp;quantity=1">BUY NOW</a></td>
				    <td></td>
				    <td></td>
				</tr>
			    </tbody>
			</table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="l_contact" id="l_contact" data-anchor="#l_contact" style="display: none;">
        <div class="container">
            <div class="wrap" style="background-image: url(<?php //echo $contact_l['backround_image']['url'];  ?>);">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <h3><?php //echo $contact_l['title'];  ?></h3>
                        <div class="l_contact_phone">
                            <a href="tel:<?php //echo get_field('number_phone','option'); ?>"><?php //echo get_field('number_phone','option'); ?></a>
                        </div>
                        <div class="l_contact_adress">
                            <p><?php //echo $contact_l['adress_l'];  ?></p>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 l_form">
			<?php
			// $cf = $contact_l['contact_form_l'];
			// if( isset($cf) ) :
			?>
<?php //echo do_shortcode('[contact-form-7 id="'.$cf.'" title="Contact form"]'); ?>
<?php //endif;  ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="landing_faq" id="landing_faq" data-anchor="#landing_faq" >
        <div class="container">
            <div class="row">
                <div class="column col-md-12">
                    <div class="content">
                        <h2 class="faq-title"><?php the_field('title_block_faq', 'options') ?></h2>
                        <div id="accordion">
<?php if (have_rows('frequently_asked_questions', 'options')):
    while (have_rows('frequently_asked_questions', 'options')) : the_row();
	?>

				    <div class="accordion__item">
					<label> <?php the_sub_field('question'); ?> </label>
					<div>
					    <span>
	<?php the_sub_field('answer'); ?>
					    </span>
					</div>
				    </div>

    <?php endwhile;
else :
    ?>

    			    <h5 class="no-questions">No questions</h5>

<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>



<?php get_footer('landing'); ?>