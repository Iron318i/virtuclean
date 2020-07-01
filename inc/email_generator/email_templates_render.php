<?php


// Weekly template
function render_weekly( $email_fields ){
    ob_start();
    ?>
    
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <title>Weekly Email</title>
        <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    </head>
    <body>
        <table class="t_wrap" style="width:900px;">

        <!-- Header -->
        <table bgcolor="#ffffff" border="0" cellpadding="20" cellspacing="0" style="font-size:100%;" width="1000">    
            <tbody>
                <tr>
                    <td align="center" style="padding-top: 40px;" width="100%">
                        <a href="<?php echo site_url() ?>"> 
                            <img src="<?php echo $email_fields['email_logo']['url'] ?>" alt="logo" width="237" height="112">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td align="center" width="100%">
                        <h1 style="font-family: 'Lato', sans-serif; color:#000000; font-size: 36px;     letter-spacing: 3px;" >
                            <?php echo $email_fields['email_title'] ?>
                        </h1>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- END Header -->     


        <!-- Content -->
        <?php
        if ( isset($email_fields['email_repeater']) && !empty($email_fields['email_repeater']) ) {
            # code...
            foreach ($email_fields['email_repeater'] as $key => $value) {
                ?>
                <table width="1000">
                    <tbody>             
                        <tr>                 
                            <td align="left" width="100%"> 
                                <img src="<?php echo $value['background_image']['url'] ?>" style="width: 100%; height: 364px; object-fit: cover; object-position: center;">
                            </td>
                        </tr>         
                    </tbody>     
                </table> 
                <table bgcolor="#ffffff" border="0" style="font-size:100%;padding: 30px 40px;" width="1000">         
                    <tbody>
                        <tr>
                            <td align="left" width="100%">            
                                <h1 style="font-family: 'Lato', sans-serif;color:#000; font-size: 24px; font-family: 'Lato', sans-serif; font-weight: bold;">
                                    <?php echo $value['subtile'] ?>
                                </h1>
                                <p style="line-height: 27px; color: #000; font-size:18px; font-family: 'Lato', sans-serif;"> 
                                    <?php echo $value['content'] ?>
                                </p>
                                <a href="<?php echo $value['button_url'] ?>" style="letter-spacing: .05em;font-family: 'Lato', sans-serif; margin-top: 25px; text-transform: uppercase; text-decoration: none;text-align: center; color:#fff; background: linear-gradient(180deg,#ff8d4f 0,#ec5c0e 100%); width: 150px; height: 50px; line-height: 50px; display: inline-block;">
                                    <?php echo $value['button_text'] ?>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php
            }
        }
        ?>
        <!-- END Content -->


        <!-- ADV block -->
        <table width="1000">
            <tbody>             
                <tr>                 
                    <td align="left" width="100%"> 
                        <img src="<?php echo $email_fields['email_adv_background_image']['url'] ?>" style="width: 100%; height: 364px; object-fit: cover; object-position: center;">
                    </td>          
                </tr>        
            </tbody>     
        </table> 
        <table bgcolor="#ffffff" border="0" class="adv_block" style="font-size:100%;padding: 30px 40px;);" width="1000">
            <tbody>
                <tr>
                    <td align="left" width="100%">
                        <h1 style="font-family: 'Lato', sans-serif; color:#000000; font-size:36px;"> 
                            <?php echo $email_fields['email_adv_title'] ?>
                        </h1>
                        <p style="font-family: 'Lato', sans-serif; line-height: 27px; color: #000000;font-size:18px;"> 
                            <?php echo $email_fields['email_adv_content'] ?>
                        </p>
                        <a href="<?php echo $email_fields['email_adv_button_url']["url"] ?>" style="letter-spacing: .05em;font-family: 'Lato', sans-serif; margin-top: 25px; text-transform: uppercase; text-decoration: none;text-align: center; color:#fff; background: linear-gradient(180deg,#ff8d4f 0,#ec5c0e 100%); width: 200px; height: 60px; line-height: 60px; display: inline-block;">
                            <?php echo $email_fields['email_adv_button_text'] ?>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- ENF ADV block -->


        <!-- Footer -->
        <table bgcolor="#282828" border="0" style="font-size:100%; margin-top: 50px;" width="1000">
            <tbody class="body_table">
                <tr class="tr1" style="padding-bottom: 20px;">
                    <td class="f_left" style="display: inline-block; padding-top: 40px; padding-left: 10px; padding-right: 100px; box-sizing: border-box; vertical-align: top;" width="50%">
                        <h1 style="font-family: 'Lato', sans-serif; color: #ffffff; margin: 0;"> 
                            <?php echo $email_fields['email_footer_title'] ?>
                        </h1>
                        <p>
                            <span style="font-family: 'Lato', sans-serif; color: #C4C4C4; line-height: 29px; margin: 0;">                             
                                <?php echo $email_fields['email_footer_addres'] ?>
                            </span> 
                        </p> 
                        <p class="f_line" style="font-family: 'Lato', sans-serif;display:block;width:100%; color: #ffffff; vertical-align: top; margin: 0; margin-bottom: 15px;">                         
                            <span> 
                                <img alt="phone" height="19" src="<?php echo $email_fields['footer_phone_ico']['url'] ?>" width="19"> 
                            </span> 
                            <span> 
                                <a href="<?php echo $email_fields['email_footer_phone'] ?>" style="font-family: 'Lato', sans-serif; font-size: 18px; line-height: 26px;  display: inline-block; margin-left: 15px; color: #ffffff;text-decoration: none;">                                 
                                    <?php echo $email_fields['email_footer_phone'] ?>
                                </a> 
                            </span> 
                        </p>                     
                        <p class="f_line" style="font-family: 'Lato', sans-serif;display:block;width:100%; color: #ffffff; vertical-align: top; margin: 0; margin-bottom: 15px;">                         
                            <span> 
                                <img alt="phone" height="19" src="<?php echo $email_fields['footer_email_ico']['url'] ?>" width="19"> 
                            </span> 
                            <span> 
                                <a href="mailto:<?php echo $email_fields['email_footer_email'] ?>" style="font-family: 'Lato', sans-serif;font-size: 18px;line-height: 26px;display: inline-block; margin-left: 15px; color: #ffffff; text-decoration: none;">                                 
                                    <?php echo $email_fields['email_footer_email'] ?>
                                </a> 
                            </span> 
                        </p>
                    </td>
                    <td class="f_right" style="display: inline-block; padding-top: 80px; padding-right: 120px; box-sizing: border-box; vertical-align: middle; width: 50%;" width="50%">
                        <a href="<?php echo $email_fields['footer_buy_now']['url'] ?>" style="letter-spacing: .05em;font-family: 'Lato', sans-serif;float:right; margin-top: 5px;margin-right: 15px; text-transform: uppercase; text-decoration: none;text-align: center; color:#fff; background: linear-gradient(180deg,#ff8d4f 0,#ec5c0e 100%); width: 150px; height: 50px; line-height: 50px; display: inline-block;">                         
                            <?php echo $email_fields['footer_buy_now']['title'] ?>
                        </a>
                    </td>
                </tr>

                <tr class="tr2" style="padding-bottom: 20px;">                 
                    <td class="f_copyright" style="display: table-cell; padding: 10px; text-align: center; border-top: 1px solid rgba(204, 204, 204, 0.1);" width="100%">                     
                        <p style="font-family: 'Lato', sans-serif; color: #C4C4C4; line-height: 29px; margin: 0;"> 
                            <?php echo $email_fields['footer_copyright'] ?>
                        </p>                 
                    </td>             
                </tr>
            </tbody>
        </table>
        <!-- END Footer -->


        <style>
            body {margin: 0;
                padding: 0;         
                }          
            .p {             
                line-height: 27px;             
                color: #000000;             
                font-size: 18px;             
                font-family: 'Lato', sans-serif;         
            }          
            .adv p {             
                font-family: 'Lato', sans-serif;             
                line-height: 37px;             
                color: #ffffff;             
                font-size: 18px;         
            }          
            h1 {             
                font-family: 'Lato', sans-serif;         
            }          
            
            @media screen and (-webkit-min-device-pixel-ratio: 0) {             
                h1 {                
                    font-family: 'Lato', sans-serif;             
                }         
            }          
            @media screen and (max-width: 1220px) {             
                table[class="body_table"] {                 
                    width: 100% !important;             
                }              
                table {                
                    width: 100% !important;             
                }         
            }          
            @media screen and (max-width: 991px) {             
                .empty_space {                 
                    display: none;             
                }              
                .f_left {                
                    display: inline-block !important;                 
                    width: 50% !important;                
                    padding: 0 !important;                 
                    padding-top: 40px !important;                 
                    padding-bottom: 40px !important;                 
                    text-align: center;             
                }              
                .f_center {                 
                    display: inline-block !important;                
                    width: 50% !important;                 
                    padding: 0 !important;                 
                    padding-top: 40px !important;                
                    padding-bottom: 40px !important;                
                    text-align: center;             
                }              
                .f_right {                 
                    width: 100% !important;                 
                    display: block !important;                 
                    padding: 0 !important;                 
                    padding-bottom: 40px !important;                
                    text-align: center;             
                }              
                .f_line {                 
                    width: 100%;             
                }         
            }          
            @media screen and (max-width: 768px) {             
                table {                 
                    background-position: center !important;                 
                    padding: 40px !important;                 
                    border-spacing: 0;                 
                    border-collapse: separate;             
                }              
                .f_left {                 
                    width: 100% !important;                 
                    padding-top: 20px !important;                 
                    padding-bottom: 0px !important;             
                }              
                .f_center {                 
                    width: 100% !important;                 
                    padding-top: 20px !important;                
                    padding-bottom: 0px !important             
                }              
                .f_right {                
                    width: 100% !important;                 
                    padding-top: 20px !important;                 
                    padding-bottom: 0px !important;             
                }         
            }     
        </style> 

        </table>
    </body>
    </html>
    <?php
    return ob_get_clean();
}



// Blog template
function render_blog( $email_fields ){
    ob_start();
    ?>

    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html4/strict.dtd">
    <html lang="en">
    <head>
        <title>Blog Email</title>
        <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    </head>
    <body style="margin: 0; padding: 0">


    <!-- Header -->
    <table width="600" bgcolor="#ffffff" cellpadding="20" cellspacing="0" border="0" >
        <tbody>
        <tr>
            <td  align="center" width="100%" style="padding-top: 80px;">
                <a href="http://virtuclean.com">
                    <img src="<?php echo $email_fields['logo_em_blog'] ?>" alt="logo" width="237" height="112">
                </a>
            </td>
        </tr>
        <tr>
            <td align="center" width="100%">
                <h1 style="font-family: 'Lato', sans-serif; color:#000000; font-size: 30px;     letter-spacing: 3px;" >
                    <?php echo $email_fields['email_title_b'] ?>
                </h1>
            </td>
        </tr>
        </tbody>
    </table>
    <!-- END Header -->

    <?php
    if ( isset($email_fields['email_articles_b']) && !empty($email_fields['email_articles_b']) ) :
        ?>
    <!-- BLOG part -->
    <table width="600" bgcolor="#ffffff" border="0" style="padding-left: 15px; padding-right: 15px;">
        <tbody>
        <tr class="blog_row" style="margin-bottom: 25px; display: inline-block;">
            <?php foreach( $email_fields['email_articles_b'] as $key => $items): ?>
            <?php
                $post_art = $items->ID;
                $image_post = wp_get_attachment_image_src( get_post_thumbnail_id($items->ID), $size="small",'single-post-thumbnail' );
            ?>
                     <td valign="top" class="blog_item" style="display: inline-block; padding: 15px 30px; width: 49%; box-sizing: border-box;">
                        <img src="<?php echo $image_post[0]; ?>" alt="blog_image" width="100%" height="158" style="object-fit: cover;">
                        <h2 style="font-family: 'Lato', sans-serif; color:#000000; font-size: 18px; line-height: 26px; letter-spacing: 0.05em;">
                            <?php echo $items->post_title; ?>
                        </h2>
                        <a class="read_more_btn" href="<?php echo get_permalink($post_art) ?>" style="position: relative; font-family: 'Lato', sans-serif; color: #7EDAEE; font-size: 18px; line-height: 26px; text-transform: uppercase; text-decoration: none">
                            <?php echo $email_fields['title_link'] ?><p style="vertical-align: middle;margin: 0;display:inline-block;position: absolute;width: 50px;height: 2px;top: calc(50% - 1px);left: calc(100% + 15px);background-color: #888888;"></p>
                        </a>
                    </td>
            <?php endforeach; ?>
        </tr>
        </tbody>
    </table>
    <!-- END BLOG part -->
    <?php endif; ?>

    <!-- ADV bloc Left side -->
    <table width="600" bgcolor="#ffffff" border="0" background="<?php echo $email_fields['image_background_m_b'] ?>" style="padding: 40px; background-position: left; background-size: cover; ">
        <tbody>
        <tr>
            <td align="left" width="100%">
                <h1 style="font-family: 'Lato', sans-serif; color:#A4EFFF; font-size:36px;" >
                    <?php echo $email_fields['top_title_em_sponsored'] ?>
                </h1>
                <h1 style="font-family: 'Lato', sans-serif; color:#A4EFFF; font-size:36px;" >
                    <?php echo $email_fields['bottom_title_em_sponsored'] ?>
                </h1>
                <p style="font-family: 'Lato', sans-serif; line-height: 37px; color: #ffffff;font-size:18px;">
                    <?php echo $email_fields['content_em_sponsored'] ?>
                </p>
                <a href="<?php echo $email_fields['url_sponsored_email'] ?>" style="position: relative; font-family: 'Lato', sans-serif; margin-top: 25px; text-transform: uppercase; text-decoration: none;text-align: center;color:#ffffff; background-color: #7edaee; width: 150px; height: 50px; line-height: 50px; display: inline-block;">
                    <?php echo $email_fields['link_title_em_sponsored'] ?>
                </a>
            </td>
            <td class="empty_space" align="left" width="40%" >
                <!-- empty -->
            </td>
        </tr>
        </tbody>
    </table>
    <!-- ENF Left side -->

    <!-- Products -->
    <?php
        if ( isset($email_fields['select_accessories_email']) && !empty($email_fields['select_accessories_email']) ) :
    ?>
    <table width="600" bgcolor="#ffffff" border="0" style="padding-top: 40px; padding-left: 40px; padding-right: 40px;">
        <tbody>
        <!-- row 1 -->
        <tr>
            <td valign="top" style="display: table-cell; width: 100%;">
                <h1 style="font-family: 'Lato', sans-serif; color:#000000; text-align:center;font-size: 36px; line-height: 39px; letter-spacing: 0.05em;">
                    <?php echo $email_fields['title_eml_accessories'] ?>
                </h1>
            </td>
        </tr>

        <tr class="product_row">
            <?php foreach( $email_fields['select_accessories_email'] as $key => $item): ?>
            <?php
                $product = wc_get_product($item->ID);
                $thePrice = $product->get_price();
                $image = wp_get_attachment_image_src( get_post_thumbnail_id($item->ID), 'single-post-thumbnail' );
                ?>

            <!-- item -->
                <td valign="top" class="product_item" style="padding: 0 10px; width: 50%; display: inline-block; padding: 0 10px;box-sizing: border-box;">
                        <span class="item_wrap" style="display: inline-block; width: 100%; box-sizing: border-box;">
                            <img src="<?php  echo $image[0]; ?>" alt="product_image" width="100%" height="158">
                            <h2 class="product_title" style="font-family: 'Lato', sans-serif; color:#000000; font-size: 18px; letter-spacing: 0.05em; min-height: 69px;">
                              <?php echo $item->post_title; ?>
                            </h2>
                            <p>
                                <span style="font-family: 'Lato', sans-serif; font-size: 14px; line-height: 29px; letter-spacing: 0.05em; color: #555555;">
                                    <?php echo $item->post_excerpt; ?>
                                </span>
                            </p>
                            <p class="product_price_line" style="margin: 0;height: 65px;display: inline-block;vertical-align: middle;width: 100%;text-align: right;border-top: 1px solid #EDEDED;">
                                <span class="product_price_text" style="font-family: 'Lato', sans-serif; display: inline-block;font-size: 18px;line-height: 37px;letter-spacing: 0.05em;color: #888888;">
                                    <?php echo get_field('title_price_label','option');?>
                                </span>
                                <span class="product_price_price" style="font-family: 'Lato', sans-serif; display: inline-block;margin-left: 15px;font-weight: bold;font-size: 18px;line-height: 204.3%;letter-spacing: 0.05em;color: #555555;">
                                   <?php echo get_woocommerce_currency_symbol(get_woocommerce_currency()) . $thePrice; ?>
                                </span>
                                <a href="<?php echo site_url()?>/cart/?add-to-cart=<?php echo $item->ID; ?>" class="product_price_btn" style="font-family: 'Lato', sans-serif; display: inline-block;background-color: #333333;height: 65px;width: 65px;vertical-align: middle;position: relative;margin-left: 10px;text-align: center;">
                                   <img src="<?php echo get_template_directory_uri(); ?>/../../uploads/2019/05/shopping-bag.png" alt="addtocart" width="21" height="25" style="padding-top: 15px; width: 21px!important;">
                                </a>
                            </p>
                        </span>
                </td>
            <?php endforeach; ?>
            <!-- END item -->
        </tr>
        <tr class="product_all" style="padding-bottom: 25px;width: 100%;display: inline-block;box-sizing: border-box;">
            <td align="center" style="text-align: center; width: 100%; display: inline-block;">
                <a href="<?php echo $email_fields['url_link_eml_accessories'] ?>" style="font-size: 16px; font-family: 'Lato', sans-serif; margin-top: 25px; text-transform: uppercase; text-decoration: none;text-align: center;color:#ffffff; background-color: #7edaee; width: 150px; height: 50px; line-height: 50px; display: inline-block;">
                    <?php echo $email_fields['title_link_eml_accessories'] ?>
                </a>
            </td>
        </tr>

        <!-- END row 1 -->
        </tbody>
    </table>
    <?php endif;?>
    <!-- END Products -->

    <!-- Footer -->
    <table width="600" bgcolor="#282828" border="0" >
        <tbody class="body_table">
        <tr class="tr1" style="padding-bottom: 20px;">
            <td class="f_left" width="33%" style="display: inline-block;
                                                    padding-top: 40px;
                                                    padding-left: 40px;
                                                    padding-right: 10px;
                                                    box-sizing: border-box;
                                                    vertical-align: top;">
                <h1 style="font-family: 'Lato', sans-serif; color: #ffffff; margin: 0; " >
                    <?php echo $email_fields['footer_title_blog'] ?>
                </h1>
            </td>
            <td class="f_center" width="33%" style="display: inline-block;
                                                    padding-top: 40px;
                                                    padding-left: 10px;
                                                    padding-right: 10px;
                                                    box-sizing: border-box;
                                                    vertical-align: top;">
                <span style=" font-family: 'Lato', sans-serif; color: #C4C4C4; line-height: 29px; margin: 0;">
                    <?php echo $email_fields['footer_addres_blog'] ?>
                </span>
            </td>
            <td class="f_right" width="33%" style="display: inline-block;
                                                    padding-top: 40px;
                                                    padding-left: 10px;
                                                    padding-right: 10px;
                                                    box-sizing: border-box;
                                                    vertical-align: top;">

                <p class="f_line" style="  font-family: 'Lato', sans-serif;
                            color: #ffffff;
                            display: inline-block;
                            vertical-align: top;
                            margin: 0;
                            margin-bottom: 15px;">
                    <span>
                         <img src="<?php echo $email_fields['icon_phone_email_blog']['url'] ?>" alt="phone" width="19" height="19">
                    </span>
                    <span>
                        <a href="tel:(855) 284-65 " style="font-family: 'Lato', sans-serif;
                                                            font-size: 18px;
                                                            line-height: 26px;
                                                            display: inline-block;
                                                            margin-left: 15px;
                                                            color: #ffffff;
                                                            text-decoration: none;">
                            <?php echo $email_fields['footer_phone_blog'] ?>
                        </a>
                    </span>
                </p>

                <p class="f_line" style="  font-family: 'Lato', sans-serif;
                            color: #ffffff;
                            display: inline-block;
                            vertical-align: top;
                            margin: 0;
                            margin-bottom: 15px;">
                    <span>
                        <img src="<?php echo $email_fields['footer_url_ico_blog']['url'] ?>" alt="phone" width="19" height="19">
                    </span>
                    <span>
                        <a href="mailto:virtuclean.com" style="font-family: 'Lato', sans-serif;
                                                                font-size: 18px;
                                                                line-height: 26px;
                                                                display: inline-block;
                                                                margin-left: 15px;
                                                                color: #ffffff;
                                                                text-decoration: none;">
                            <?php echo $email_fields['footer_url_blog'] ?>
                        </a>
                    </span>
                </p>

            </td>


        </tr>
        <tr class="tr2" style="padding-bottom: 20px;">
            <td class="f_copyright" width="100%" style="display: table-cell;
                                                        padding: 10px;
                                                        text-align: center;
                                                        border-top: 1px solid rgba(204, 204, 204, 0.1);">
                <p style=" font-family: 'Lato', sans-serif; color: #C4C4C4; line-height: 29px; margin: 0;">
                    <?php echo $email_fields['footer_copyright_blog'] ?>
                </p>
            </td>
        </tr>
        </tbody>
    </table>
    <!-- END Footer -->



    <style>
        h1 {
            font-family: 'Lato', sans-serif;
        }
        @media screen and (-webkit-min-device-pixel-ratio:0) {
            h1 {
                font-family: 'Lato', sans-serif;
            }
        }

        @media screen and (max-width:1220px) {
            table[class="body_table"] {
                width: 100%!important;
            }
            table {
                width: 100%!important;
            }
            .item_wrap img {
                height: 170px;
            }
        }
        @media screen and (max-width:991px) {
            span.product_price_price {
                margin-left: 5px;
            }
            .empty_space {
                display: none;
            }
            .f_left{
                display: inline-block !important;
                width: 50% !important;
                padding: 0 !important;
                padding-top: 40px !important;
                padding-bottom: 40px !important;
                text-align: center;
            }
            .f_center{
                display: inline-block !important;
                width: 50% !important;
                padding: 0 !important;
                padding-top: 40px !important;
                padding-bottom: 40px !important;
                text-align: center;
            }
            .f_right{
                width: 100% !important;
                display: block !important;
                padding: 0 !important;
                padding-bottom: 40px !important;
                text-align: center;
            }
            .f_line{
                width: 100%;
            }

        }
        @media screen and (max-width:768px) {
            table{
                background-position: center !important;
                padding: 40px !important;
                border-spacing: 0;
                border-collapse: separate;
            }
            .f_left{
                width: 100% !important;
                padding-top: 20px !important;
                padding-bottom: 0px !important;
            }
            .f_center{
                width: 100% !important;
                padding-top: 20px !important;
                padding-bottom: 0px !important
            }
            .f_right{
                width: 100% !important;
                padding-top: 20px !important;
                padding-bottom: 0px !important;
            }
            .blog_item{
                width: 80% !important;
            }
            .blog_row {
                margin-bottom: 25px;
                display: inline-block;
                text-align: center;
            }
            .product_item{
                width: 50% !important;
                margin-bottom: 25px;
            }
        }
        @media screen and (max-width:500px) {
            .product_item{
                width: 100% !important;
            }
        }

    </style>

    </body>
    </html>



    <?php
    return ob_get_clean();
}



?>