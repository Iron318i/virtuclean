<?php
    get_header('landing-reseller');
    /* Template Name: Landing Reseller New Template */
    $acf_fields = get_fields();
?>
       
        <section class="main-first" style="background-image: url(<?php echo get_field('main_first-bg')['url'] ?>);">
            <div class="container">
                <h1 class="first-title"><?php echo $acf_fields['first_title'] ?></h1>
                <div class="first-description"><?php echo $acf_fields['first_description'] ?></div>
                <a href="#schedule" class="btn-learn-more">LEARN MORE</a>
            </div>
        </section>
        <section class="main" style="background-image: url(<?php echo get_field('main-background')['url'] ?>);">
            <div class="container">
                <div class="row">
                    <div class="main-wrapper">
                        <!-- <h3><?php the_field('main-title-h3') ?></h3>  -->
                        <h1><?php the_field('main-title-h1') ?></h1>
                        <p><?php the_field('main-title-p') ?></p>
                        <div class="main-button">
                            <!-- <a href="#form" class="btn-contact-buy">CONTACT TO BUY</a> -->
                            <!-- <a href="https://www.virtuclean.com/about-virtuclean/" class="btn-learn-more">LEARN MORE</a> -->
                        </div>
                        <img class="main-img" src="<?php the_field('main-img') ?>" alt="">
                    </div>
                </div>
            </div>
            <!-- <a href="#advantages" class="scroll"></a> -->
        </section>
		
        <section id="advantages" class="advantages" style="background-image: url(<?php echo get_field('advantage-background')['url'] ?>);">
            <div class="container">
                <div class="row">
                    <h2><?php the_field('advantage-title') ?></h2>
                    <p><?php the_field('advantage-description') ?></p>
                    <div class="advantages-items" style="background-image: url(<?php echo get_field('advantage-img')['url'] ?>;">
                    <?php 
                        $item = get_field('advantage-item');
                        if( isset($item) && !empty($item) ){
                            foreach($item as $key => $value){
                            ?>
                            <div class="item">
                                <div class="item-img">
                                    <img src="<?php echo $value['item-img'] ?>" alt="">
                                </div>
                                <p><?php echo $value['item-text'] ?></p>
                            </div>
                        <?php
                                }
                            }
                    ?>
                
                    </div>
                </div>
            </div>
        </section>
        <section id="product" class="product" style="background-image: url(<?php echo get_field('virtuclean-background')['url'] ?>);">
            <h2><?php the_field('virtuclean-title') ?></h2>
            
            <div class="product-item">
                <img src="<?php echo get_template_directory_uri() ?>/assets/dist/img/product1.png" alt="product">
                <div class="text right">VirtuCLEAN by VirtuOx is a revolutionary technology to properly disinfect CPAP equipment. VirtuOx is a 15-year-old brand that has tested over 5 million. This system has been proven effective in killing germs and bacteria and mold in the CPAP system, preventing multiple health complications.</div>   
            </div>
            <div class="product-item">
                <div class="text left">With VirtuCLEAN, you can easily clean your mask, tubing and humidifier chamber without soap and water. Simply put your PAP supplies into the VirtuBAG, attach PAP hose to the VirtuCLEAN, turn VirtuCLEAN on, and walk away. The VirtuCLEAN will automatically clean your system in only 30 minutes.</div>
                <img src="<?php echo get_template_directory_uri() ?>/assets/dist/img/product2.png" alt="product">
            </div>
        </section>
        <section id="accessories" class="accessories">
            <h2><?php the_field('accessories-title') ?></h2>
            <p><?php the_field('accessories-description') ?></p>
            <div class="accessories-wrapper">
                <div class="list-items">
                <?php 
                        $item = get_field('accessories-item');
                        if( isset($item) && !empty($item) ){
                            foreach($item as $key => $value){
                            ?>
                            <div class="item">
                                <div class="card">
                                    <div class="img" style="background-image:url(<?php echo $value['card-img'] ?>);"></div>
                                    <div class="name"><?php echo $value['card-name'] ?></div>
                                    <!-- <div class="more"><a href="#">READ MORE</a></div> -->
                                    <div class="price">$<?php echo $value['card-price'] ?></div>      
                                </div>
                            
                            </div>
                        <?php
                                }
                            }
                    ?>    
            
                </div>
            </div>
        </section>
        <section id="quantity" class="quantity" style="background-image: url(<?php echo get_field('quantity-background')['url'] ?>);">
            <div class="container">
                <div class="row">
                    <h2><?php the_field('quantity-title') ?></h2>
                    <ul class="card-list">
                        <li class="card-item">
                            <div class="diz">#</div>
                            <div class="item-title">Quantity:</div>
                            <div class="item-number">1-10</div>
                            <div class="item-price"><span>$</span> 165ea</div>
                        </li>
                        <li class="card-item">
                            <div class="diz">#</div>
                            <div class="item-title">Quantity:</div>
                            <div class="item-number">11-49</div>
                            <div class="item-price"><span>$</span> 155ea</div>
                        </li>
                        <li class="card-item">
                            <div class="diz">#</div>
                            <div class="item-title">Quantity:</div>
                            <div class="item-number">50-199</div>
                            <div class="item-price"><span>$</span> 155ea</div>
                        </li>
                        <li class="card-item">
                            <div class="diz">#</div>
                            <div class="item-title">Quantity:</div>
                            <div class="item-number">200+</div>
                            <div class="item-price"><span>$</span> 155ea</div>
                        </li>
                    </ul>
                    <a href="#schedule" class="contact-to-buy">LEARN MORE</a>
                </div>
            </div>
        </section>
        <section id="sanitizers" class="sanitizers">
            <div class="container">
                <div class="row">
                    <p><?php the_field('sanitizers-description') ?></p>
                    <div class="sanitizers-promo"><p><?php the_field('sanitizers-promo') ?></p></div>
                    <div class="sanitizers-items">
                        <img src="../img/image.png" alt="">
                            <div class="item">
                                <div class="name"></div>
                                <div class="img"></div>
                                <div class="characteristics">
                                    <div class="price">Price</div>
                                    <div class="portable">Portable</div>
                                    <div class="size">Size</div>
                                </div>
                            </div>
                            <div class="item dynamic">
                                <div class="name">VirtuCLEAN 2.0</div>
                                <div class="img" style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/dist/img/VirtuCLEAN.png);"></div>
                                <div class="characteristics">
                                    <div class="price">$279</div>
                                    <div class="portable">Yes</div>
                                    <div class="size">4.5″x 1.7″</div>
                                </div>
                            </div>
                            <div class="item dynamic">
                                <div class="name">Lumin</div>
                                <div class="img" style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/dist/img/Lumin.png);"></div>
                                <div class="characteristics">
                                    <div class="price">$299</div>
                                    <div class="portable">No</div>
                                    <div class="size">12.25″ x 8.5″x 7.75″</div>
                                </div>
                            </div>
                            <div class="item dynamic">
                                <div class="name">SoClean2</div>
                                <div class="img" style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/dist/img/SoClean2.png);"></div>
                                <div class="characteristics">
                                    <div class="price">$348</div>
                                    <div class="portable">No</div>
                                    <div class="size">11”x11”x13”</div>
                                </div>
                            </div>
                        </div>
                        <a href="#schedule" class="view-more">LEARN MORE</a>
                </div>
            </div>
            
        </section>
        <section id="video" class="video" style="background-image: url(<?php echo get_field('video-background')['url'] ?>);">
            <div class="container">
                <div class="row">
                    <h2><?php the_field('video-title') ?></h2>
                    <p><?php the_field('video-description') ?><a href="#form">www.virtuclean.com</a></p>
                    <div class="l_iframe" id="l_video"><div class="video_bg"></div>
                    <iframe src="<?php echo get_field('video-iframe') ?>" width="1140" height="315" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="" title="How to use VirtuCLEAN 2.0"></iframe>

                    
                </div>
            </div>
            
        </section>
        <section id="reviews" class="reviews">
            <h2><?php the_field('reviews-title') ?></h2>
            <div class="slider ">
            <?php 
                        $item = get_field('reviews-item');
                        if( isset($item) && !empty($item) ){
                            foreach($item as $key => $value){
                            ?>
                            <div class="slick-slide">
                                <div class="item">
                                    <img src="<?php echo $value['slider-img'] ?>" alt="">
                                    <h4><?php echo $value['slider-name'] ?></h4>
                                    <span><?php echo $value['slider-date'] ?></span>
                                    <p><?php echo $value['slider-description'] ?></p>
                                </div>
                            </div>
                        <?php
                                }
                            }
                    ?>  
            
        
        </section>
        <section id="schedule" class="schedule">
            <div class="container">
                <h2>Schedule an online demo</h2>
                <!-- Calendly inline widget begin -->
                <div class="calendly-inline-widget" data-url="https://calendly.com/kelly-bailey-1/15min" style="min-width:320px;height:630px;"></div>
                <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js"></script>
                <!-- Calendly inline widget end -->

            </div>
        </section>
        <section id="form" class="form" style="background-image: url(<?php echo get_field('form-background')['url'] ?>);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h2><?php the_field('form-title-info') ?></h2>
                        <div class="contact">
                            <div class="address"><?php the_field('contact-address') ?></div>
                            <div class="phone"><?php the_field('contact-phone') ?></div>
                        </div>
                        <div class="social">
                            <ul>
                                <!-- <li><a href="#"><img src="img/linkedin-icon.png" alt=""></a></li>
                                <li><a href="#"><img src="img/facebook-icon.png" alt=""></a></li>
                                <li><a href="#"><img src="img/twitter-icon.png" alt=""></a></li> -->
                                <?php 
                                    $item = get_field('social');
                                    if( isset($item) && !empty($item) ){
                                        foreach($item as $key => $value){
                                        ?>
                                        <li><a href="<?php echo $value['social-link'] ?>"><img src="<?php echo $value['social-icon'] ?>" alt=""></a></li>
                                    <?php
                                            }
                                        }
                                ?> 
                            </ul>
                        </div>
                        <div class="menu">
                            <div class="item">
                                <a href="#advantages">Advantages</a>
                                <a href="#product">VIRTUCLEAN  2.0</a>
                                <a href="#accessories">ACCESSORIES </a>
                                <a href="#quantity">PRICES</a>
                                
                            </div>
                            <div class="item">
                                <a href="#sanitizers">COMPARE</a>
                                
                                <a href="#video">VIDEO</a>
                                <a href="#reviews">FEEDBACKS</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h2><?php the_field('form-title-question') ?></h2>
                        
                        <?php echo do_shortcode( '[contact-form-7 id="1554" title="Landing Reseller Form"]' ); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="copyring">© 2006 - 2019 VirtuOx, Inc.</div>
                </div>
            </div>
        </section>
        <div id = "toTop" >UP</div>
    </div>
<?php get_footer('reseller'); ?>
</body>
</html>