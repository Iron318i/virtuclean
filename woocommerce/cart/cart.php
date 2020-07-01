<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart_.php.
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
/**
 * Include header.php or header-XXX.php for custom page
 *
 * @link        https://codex.wordpress.org/Function_Reference/get_header
 */
get_header();
?>
<style>
    /*Product cart*/
    .woocommerce-cart header,
    .woocommerce-cart footer,
    .woocommerce-cart .grecaptcha-badge{
        display: none !important;
    }
    .woocommerce-cart .wrapper {
        width: 100%;
        height: 100%;
        min-height: 100vh;
        background-image: url('../wp-content/themes/virtuclean/assets/dist/img/card-bg.png');
        background-repeat: no-repeat;
        background-size: cover;
        padding: 125px 0;
    }
    .woocommerce-cart .wrapper .step {
        margin: 0 auto;
        max-width: 1440px;
        background: #fff;
    }
    .woocommerce-cart .wrapper .step .step-header {
        display: flex;
    }
    .woocommerce-cart .wrapper .step .step-header .back {
        width: 60px;
        height: 60px;
        background: #7EDAEE;
        position: relative;
    }
    .woocommerce-cart .wrapper .step .step-header .logo {
        height: 60px;
        width: calc( 100% - 60px );
        background: black;
        position: relative;
    }
    .woocommerce-cart .wrapper .step .step-header .logo:after {
        content: '';
        background-image: url('../wp-content/themes/virtuclean/assets/dist/img/logos.png');
        width: 86px;
        height: 41px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .woocommerce-cart .wrapper .step .step-header .back:after {
        content: '';
        background-image: url('../wp-content/themes/virtuclean/assets/dist/img/back-arrow.png');
        width: 8px;
        height: 12px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .woocommerce-cart .wrapper .step .first {
        padding: 35px 120px;
        display: flex;
        align-items: center;
    }
    .woocommerce-cart .wrapper .step .first .image {
        width: 50%;
    }
    .woocommerce-cart .wrapper .step .first .text {
        width: 50%;
    }
    .woocommerce-cart .wrapper .step .first .text span {
        display: flex;
        width: 100%;
        justify-content: space-between;
        align-items: center;
        padding: 40px 0;
    }
    /*.woocommerce-cart .wrapper .step .first .text a.buy-on{*/
    /*	font-family: Lato;*/
    /*	font-style: normal;*/
    /*	font-weight: 900;*/
    /*	font-size: 14px;*/
    /*	line-height: 144%;*/
    /*	text-align: center;*/
    /*	letter-spacing: 0.05em;*/
    /*	text-transform: uppercase;*/
    /*	color: #D55602;*/
    /*	padding: 25px 50px;*/
    /*	background: #FFFFFF;*/
    /*	border: 2px solid #D55602;*/
    /*}*/
    .woocommerce-cart .wrapper .step .first .text a.buy-on{
        color: #D55602;
        width:170px;
        background:0 0;
        padding:15px 0;
        border:2px solid #D55602;
        -webkit-box-sizing:border-box;
        box-sizing:border-box;
        font-family:Lato;
        font-style:normal;
        font-weight:900;
        font-size:14px;
        line-height: 144%;
        text-align:center;
        letter-spacing:.05em;
        text-transform:uppercase;
        display:inline-block;
        text-align:center;
        cursor:pointer;
        position:relative;
        background-image:-webkit-linear-gradient(340deg,#D55602 50%,transparent 50%);
        background-image:-o-linear-gradient(340deg,#D55602 50%,transparent 50%);
        background-image:linear-gradient(110deg,#D55602 50%,transparent 50%);
        -webkit-background-size:500px 500px;
        background-size:500px;
        background-repeat:repeat;
        background-position:98%;
        -webkit-transition:all,1s ease;
        -o-transition:all,1s ease;
        transition:all,1s ease
    }
    .woocommerce-cart .wrapper .step .first .text a.buy-on:hover{
        border:2px solid #D55602;
        background-position:0;
        color:#fff
    }
    .woocommerce-cart .wrapper .step .first .text .price-block{
        display: flex;
        align-items: center;
    }
    .woocommerce-cart .wrapper .step .first .text .price-block .name {
        font-family: Noto Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 145%;
        letter-spacing: 0.05em;
        color: #888888;
        margin-right: 30px;
    }
    .woocommerce-cart .wrapper .step .first .text .price-block .price {
        position: relative;
        font-family: Noto Sans;
        font-style: normal;
        font-weight: bold;
        font-size: 24px;
        line-height: 145%;
        letter-spacing: 0.05em;
        color: #555555;
    }
    .woocommerce-cart .wrapper .step .first .text .price-block .price .old {
        position: absolute;
        font-size: 18px;
        text-decoration-line: line-through;
        color: #D0D0D0;
        top: -100%;
        left: 10%;
    }
    .woocommerce-cart .wrapper .step .first .text p {
        font-family: Noto Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 145%;
        letter-spacing: 0.05em;
        color: #555555;
        width: 583px;
        max-width: 583px;
    }
    .woocommerce-cart .wrapper .step .second {
        display: flex;
        align-items: center;
        padding: 100px 120px;
    }
    .woocommerce-cart .wrapper .step .second .text,
    .woocommerce-cart .wrapper .step .second .image {
        width: 50%;
    }
    .woocommerce-cart .wrapper .step .second .text h3{
        font-family: Noto Sans;
        font-style: normal;
        font-weight: bold;
        font-size: 25px;
        line-height: 145%;
        letter-spacing: 0.05em;
        color: #3796AB;
        margin-bottom: 20px;
    }
    .woocommerce-cart .wrapper .step .second .text ul {
        list-style-image: url('../wp-content/themes/virtuclean/assets/dist/img/list-style.png');
    }
    .woocommerce-cart .wrapper .step .second .text ul li {
        font-family: Noto Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 145%;
        letter-spacing: 0.05em;
        color: #555555;
        padding: 10px 15px;
        max-width: 490px;
    }
    .woocommerce-cart .wrapper .step .third {
        display: flex;
        align-items: center;
    }
    .woocommerce-cart .wrapper .step .third .image {
        height: 500px;
    }
    .woocommerce-cart .wrapper .step .third .image,
    .woocommerce-cart .wrapper .step .third .text {
        width: 50%;
    }
    .woocommerce-cart .wrapper .step .third .text ul {
        list-style-image: url('../wp-content/themes/virtuclean/assets/dist/img/list-style.png');
        padding-left: 130px;
    }
    .woocommerce-cart .wrapper .step .third .text ul li {
        font-family: Noto Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 145%;
        letter-spacing: 0.05em;
        color: #555555;
        padding: 10px 15px;
        max-width: 490px;
    }
    .woocommerce-cart .wrapper .step .fourth {
        display: flex;
        align-items: center;
    }
    .woocommerce-cart .wrapper .step .fourth .image,
    .woocommerce-cart .wrapper .step .fourth .text {
        width: 50%;
    }
    .woocommerce-cart .wrapper .step .fourth .text {
        padding-left: 130px;
    }
    .woocommerce-cart .wrapper .step .fourth .text p {
        max-width: 518px;
	font-family: Noto Sans;
	font-style: normal;
	font-weight: normal;
	font-size: 18px;
	line-height: 145%;
	letter-spacing: 0.05em;
	color: #555555;
    }
    .woocommerce-cart .wrapper .step .fourth .text h3{
        font-family: Noto Sans;
        font-style: normal;
        font-weight: bold;
        font-size: 25px;
        line-height: 145%;
        letter-spacing: 0.05em;
        color: #3796AB;
        margin-bottom: 20px;
    }
    .woocommerce-cart .wrapper .step .fourth .image {
        height: 500px;
    }
    .woocommerce-cart .wrapper .step .fifth {
        padding: 40px 0 100px;
        background: #FFF;
        box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.35);
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .woocommerce-cart .wrapper .step .fifth .step {
        font-family: Lato;
        font-style: normal;
        font-weight: normal;
        font-size: 20px;
        line-height: 144%;
        text-align: center;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        color: #555555;
    }
    .woocommerce-cart .wrapper .step .fifth h2 {
        font-family: Lato;
        font-style: normal;
        font-weight: 900;
        font-size: 110px;
        line-height: 158px;
        letter-spacing: 0.05em;
        color: #fff;
        -webkit-text-stroke-width: 1px;
        -webkit-text-stroke-color: #888888;
        margin-left: 15%;
    }
    .woocommerce-cart .wrapper .step .fifth h4 {
        font-family: Lato;
        font-style: normal;
        font-weight: bold;
        font-size: 48px;
        line-height: 69px;
        text-align: center;
        letter-spacing: 0.05em;
        color: #333333;
    }
    .woocommerce-cart .wrapper .step .fifth p {
        font-family: Noto Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 145%;
        letter-spacing: 0.05em;
        color: #555555;
        margin-top: 50px;
    }
    .woocommerce-cart .wrapper .step .fifth span {
        display: flex;
        margin-top: 35px;
    }
    .woocommerce-cart .wrapper .step .fifth span a,
    .woocommerce-cart .wrapper .step .fifth .next-step a {
        font-family: Lato;
        font-style: normal;
        font-weight: 900;
        font-size: 14px;
        line-height: 144%;
        text-align: center;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        padding: 25px 35px;
        display: flex;
        margin: 0 15px;
    }
    .woocommerce-cart .wrapper .step .fifth .next-step {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .woocommerce-cart .wrapper .step .fifth span a:first-child,
    .woocommerce-cart .wrapper .step .fifth .next-step a {
        border: 2px solid #D55602;
        box-sizing: border-box;
        color: #D55602;
        background-image:linear-gradient(110deg,#D55602 50%,transparent 50%);
        background-size:500px;
        background-repeat:repeat;
        background-position:98%;
        transition:all,1s ease
    }

    .woocommerce-cart .wrapper .step .fifth span a:first-child:hover,
    .woocommerce-cart .wrapper .step .fifth .next-step a:hover{
        background-position:0;
        color:#fff
    }
    .woocommerce-cart .wrapper .step .fifth span a:last-child {
        color: #FFFFFF;
        background: linear-gradient(180deg, #EB854B 0%, #D55602 100%);
        box-shadow: 0px 5px 25px rgba(235, 133, 75, 0.4);
    }
    .woocommerce-cart .wrapper .step .fifth span a:last-child:hover {
        opacity: 0.7;
    }
    .woocommerce-cart .wrapper .step .step-footer {
        display: flex;
        justify-content: center;
        padding: 55px 0;
    }
    .woocommerce-cart .wrapper .step .step-footer a.buy-on {
        background: linear-gradient(180deg, #EB854B 0%, #D55602 100%);
        box-shadow: 0px 5px 25px rgba(235, 133, 75, 0.4);
        font-family: Lato;
        font-style: normal;
        font-weight: 900;
        font-size: 14px;
        line-height: 144%;
        text-align: center;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        padding: 25px 50px;
        color: #FFFFFF;
    }
    .woocommerce-cart .wrapper .step .step-footer a.buy-on:hover {
        opacity: 0.7;
    }
    .woocommerce-cart .wrapper .step .six {
        padding: 40px 0 100px;
        background: #FFF;
        box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.35);
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .woocommerce-cart .wrapper .step .six .step-name {
        font-family: Lato;
        font-style: normal;
        font-weight: normal;
        font-size: 20px;
        line-height: 144%;
        text-align: center;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        color: #555555;
    }
    .woocommerce-cart .wrapper .step .six h2 {
        font-family: Lato;
        font-style: normal;
        font-weight: 900;
        font-size: 110px;
        line-height: 158px;
        letter-spacing: 0.05em;
        color: #fff;
        -webkit-text-stroke-width: 1px;
        -webkit-text-stroke-color: #888888;
        margin-left: 30%;
    }
    .woocommerce-cart .wrapper .step .six h4 {
        font-family: Lato;
        font-style: normal;
        font-weight: bold;
        font-size: 48px;
        line-height: 69px;
        text-align: center;
        letter-spacing: 0.05em;
        color: #333333;
    }

    .woocommerce-cart .wrapper .step .six .tpl-acces {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        min-height: 315px;
        padding: 0 120px;
    }
    .woocommerce-cart .wrapper .step .six .tpl-acces .item {
        width: 50%;
        padding: 15px;
    }
    .woocommerce-cart .wrapper .step .six .tpl-acces .item .wrap {
        display: flex;
        height: 315px;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);
        overflow: hidden;
    }
    .woocommerce-cart .wrapper .step .six .tpl-acces .item .wrap .slider{
        width: 50%;
    }
    .woocommerce-cart .wrapper .step .six .tpl-acces .item .wrap .text {
        width: 50%;
        padding: 20px;
        position: relative;
    }
    .woocommerce-cart .wrapper .step .six .tpl-acces .item .wrap .slider .slick-slide div {
        display: flex;
        justify-items: center;
        align-items: center;
    }
    .woocommerce-cart .wrapper .step .six .tpl-acces .item .wrap .slider .img {
        height: 315px;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
    }
    .woocommerce-cart .wrapper .step .six .tpl-acces .item .wrap .slider .slick-prev,
    .woocommerce-cart .wrapper .step .six .tpl-acces .item .wrap .slider .slick-next {
        width: 60px;
        height: 60px;
        top: auto;
        bottom: 40px;
        background: #3F3F3F;
        z-index: 10;
    }
    .woocommerce-cart .wrapper .step .six .tpl-acces .item .wrap .slider .slick-prev:hover,
    .woocommerce-cart .wrapper .step .six .tpl-acces .item .wrap .slider .slick-next:hover {
        background: #fe8a4b;
    }
    .woocommerce-cart .wrapper .step .six .tpl-acces .item .wrap .slider .slick-prev {
        left: 0;
    }
    .woocommerce-cart .wrapper .step .six .tpl-acces .item .wrap .slider .slick-next {
        left: 60px;
    }
    .woocommerce-cart .wrapper .step .six .tpl-acces .item .wrap .slider .slick-prev:before,
    .woocommerce-cart .wrapper .step .six .tpl-acces .item .wrap .slider .slick-next:before {
        content: '';
        background-image: url("../wp-content/themes/virtuclean/assets/dist/img/back-arrow.png");
        width: 8px;
        height: 12px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        opacity: 1;
    }
    .woocommerce-cart .wrapper .step .six .tpl-acces .item .wrap .slider .slick-next:before {
        transform: translate(-50%, -50%) rotate(-180deg);
    }
    .woocommerce-cart .wrapper .step .six .tpl-acces .item .wrap .text h3 {
        font-family: Noto Sans;
        font-style: normal;
        font-weight: bold;
        font-size: 24px;
        line-height: 39px;
        color: #333333;
    }
    .woocommerce-cart .wrapper .step .six .tpl-acces .item .wrap .text .smoll_content{
        font-family: Noto Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 29px;
        letter-spacing: 0.05em;
        color: #555555;
    }
    .woocommerce-cart .wrapper .step .six .tpl-acces .item .wrap .text .smoll_content .btn_m_acss {
        color: #fe8a4b !important;
    }
    .woocommerce-cart .wrapper .step .six .tpl-acces .item .wrap .text .accessories-item__bt {
        position: absolute;
        right: 0;
        bottom: 0;
        margin: 0;
        border: none;
    }
    .woocommerce-cart .wrapper .step .six .tpl-acces .item .wrap .text .accessories-item__bt a:hover {
        opacity: 0.7;
    }
    .woocommerce-cart .wrapper .step .six .step-footer {
        padding-bottom: 0;
    }
    .woocommerce-cart .wrapper .step .six .step-footer a{
        border: 2px solid #D55602;
        box-sizing: border-box;
        color: #D55602;
        padding: 25px 35px;
        font-family: Lato;
        font-style: normal;
        font-weight: 900;
        font-size: 14px;
        line-height: 144%;
        text-align: center;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        color: #D55602;
        background-image:linear-gradient(110deg,#D55602 50%,transparent 50%);
        background-size:500px;
        background-repeat:repeat;
        background-position:98%;
        transition:all,1s ease
    }
    .woocommerce-cart .wrapper .step .six .step-footer a:hover {
        background-position: 0;
        color: #fff;
    }
    .woocommerce-cart .wrapper .step .seven {
        padding: 40px 0 100px;
    }
    .woocommerce-cart .wrapper .step .deven .step-name {
        font-family: Lato;
        font-style: normal;
        font-weight: normal;
        font-size: 20px;
        line-height: 144%;
        text-align: center;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        color: #555555;
    }
    .woocommerce-cart .wrapper .step .seven .product-table {
        margin-top: 100px;
    }
    .woocommerce-cart .wrapper .step .seven .product-table ul {
        display: flex;
        flex-direction: column;
        padding: 0;
    }
    .woocommerce-cart .wrapper .step .seven .product-table ul li {
        display: flex;
        padding: 10px 120px;
        align-items: center;
    }
    .woocommerce-cart .wrapper .step .seven .product-table ul li:first-child {
        border-bottom: 1px solid #DADADA;
        font-family: Noto Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 37px;
        letter-spacing: 0.05em;
        color: #888888;
    }
    .woocommerce-cart .wrapper .step .seven .product-table ul li:first-child .name {
        padding-left: 20%;
    }
    .woocommerce-cart .wrapper .step .seven .product-table ul li .name {
        width: 60%;
        display: flex;
        align-items: center;
    }
    .woocommerce-cart .wrapper .step .seven .product-table ul li .name .title {
        margin-left: 30px;
    }
    .woocommerce-cart .wrapper .step .seven .product-table ul li .price,
    .woocommerce-cart .wrapper .step .seven .product-table ul li .quantity,
    .woocommerce-cart .wrapper .step .seven .product-table ul li .total,
    .woocommerce-cart .wrapper .step .seven .product-table ul li .remove {
        width: 10%;
        display: flex;
        justify-content: center;
    }
    .woocommerce-cart .wrapper .step .seven .product-table ul li .remove .remove-product {
        width: 16px;
        height: 20px;
        background-image: url('../wp-content/themes/virtuclean/assets/dist/img/remove-cart.png');
        display: inline-flex;
    }
    .woocommerce-cart .wrapper .step .seven .product-table ul li .quantity .counter {
        background: #FFFFFF;
        border: 1px solid #CECECE;
        box-sizing: border-box;
        border-radius: 5px;
        width: 78px;
        height: 68px;
    }
    .woocommerce-cart .wrapper .step .seven .product-table ul li .quantity .inner {
        background: #FFFFFF;
        border: 1px solid #CECECE;
        box-sizing: border-box;
        border-radius: 5px;
        width: 78px;
        height: 68px;
        display: flex;
    }
    .woocommerce-cart .wrapper .step .seven .product-table ul li .quantity .inner .box {
        width: 60%;
        border-right: 1px solid #CECECE;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .woocommerce-cart .wrapper .step .seven .product-table ul li .quantity .inner .button {
        display: flex;
        flex-direction: column;
        width: 40%;
    }
    .woocommerce-cart .wrapper .step .seven .product-table ul li .quantity .inner .button .plus,
    .woocommerce-cart .wrapper .step .seven .product-table ul li .quantity .inner .button .minus {
        height: 50%;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }
    .woocommerce-cart .wrapper .step .seven .product-table ul li .quantity .inner .button .plus:hover,
    .woocommerce-cart .wrapper .step .seven .product-table ul li .quantity .inner .button .minus:hover {
        background: #EB854B;
        color: white;
    }
    .woocommerce-cart .wrapper .step .seven .cart-total_cup_block {
        padding: 50px 0 0 120px;
        border-top: 1px solid #DADADA;
    }
    .woocommerce-cart .wrapper .step .woocommerce-error,
    .woocommerce-cart .wrapper .step .woocommerce-info,
    .woocommerce-cart .wrapper .step .woocommerce-message {
        border: 2px solid #EB854B !important;
    }
    .woocommerce-cart .wrapper .fourth .step-name {
        font-family: Lato;
        font-style: normal;
        font-weight: normal;
        font-size: 20px;
        line-height: 144%;
        text-align: center;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        color: #555555;
        margin-top: 40px;
    }
    .woocommerce-cart .virtuclean_cart .cart-total_cup_block .coupon .btn_cupon {
        background: linear-gradient(180deg,#ff8d4f 0,#ec5c0e 100%) !important;
    }
    .woocommerce-cart .virtuclean_cart .cart-total_cup_block .coupon .btn_cupon:hover {
        opacity: 0.7;
    }
    .woocommerce-cart .virtuclean_cart .shop_table_cart .product-quantity .product_qty_symbol span.product_qty_plus:hover,
    .woocommerce-cart .virtuclean_cart .shop_table_cart .product-quantity .product_qty_symbol span.product_qty_minus:hover{
        background: linear-gradient(180deg,#ff8d4f 0,#ec5c0e 100%) !important;
    }
    .woocommerce-cart .virtuclean_cart .shop_table_cart .product-remove a:before {
        content: '';
        background-image: url("../wp-content/themes/virtuclean/assets/dist/img/remove-cart.png");
        width: 16px;
        height: 20px;
    }
    .woocommerce-cart .virtuclean_cart .shop_table_cart .product-remove a:hover:before{
        background-image: url("../wp-content/themes/virtuclean/assets/dist/img/remove-cart-hover.png");
    }
    .woocommerce-cart .virtuclean_cart .cart_totals_block .cart-subtotal {
        color: #333333;
    }
    .woocommerce-error,
    .woocommerce-info,
    .woocommerce-message {
        border: 2px solid #D55602 !important;
    }
    a.more_info_btn {
        color: #D55602 !important;
    }

    @media screen and ( max-width: 1439px ) {
        .woocommerce-cart .wrapper .step .six .tpl-acces .item .wrap {
            height: 370px;
        }
        .woocommerce-cart .wrapper .step {
            max-width: 1200px;
        }
    }
    @media screen and ( max-width: 1350px ) {
        .woocommerce-cart .wrapper .step .fourth .text {
            padding-left: 75px;
        }
        .woocommerce-cart .wrapper .step .six .tpl-acces .item .wrap .text h3 {
            font-size: 18px;
        }
    }
    @media screen and ( max-width: 1199px ) {
        .woocommerce-cart .wrapper .step .six .tpl-acces {
            flex-direction: column;
        }
        .woocommerce-cart .wrapper .step .six .tpl-acces .item {
            width: 100%;
        }
    }
    @media screen and ( max-width: 991px ) {
        .woocommerce-cart .wrapper .step .first,
        .woocommerce-cart .wrapper .step .second,
        .woocommerce-cart .wrapper .step .third,
        .woocommerce-cart .wrapper .step .fourth {
            flex-direction: column;
        }
        .woocommerce-cart .wrapper .step .fourth .image,
        .woocommerce-cart .wrapper .step .fourth .text,
        .woocommerce-cart .wrapper .step .third .image,
        .woocommerce-cart .wrapper .step .third .text,
        .woocommerce-cart .wrapper .step .second .text,
        .woocommerce-cart .wrapper .step .second .image,
        .woocommerce-cart .wrapper .step .first .image,
        .woocommerce-cart .wrapper .step .first .text {
            width: 100%;
        }
        .woocommerce-cart .wrapper .step .first {
            padding: 35px 50px;
        }
        .woocommerce-cart .wrapper .step .second {
            padding: 25px 50px;
        }
    }
    @media screen and ( max-width: 767px ) {
        .woocommerce-cart .wrapper .step .first .text p {
            width: 100%;
        }
        .woocommerce-cart .wrapper .step .fourth .text p {
            max-width: 100%;
        }
        .woocommerce-cart .wrapper .step .fourth .text {
            padding: 25px 50px;
        }
        .woocommerce-cart .wrapper .step .third .text ul {
            padding: 25px 50px;
        }
        .woocommerce-cart .wrapper .step .six .tpl-acces {
            padding: 0 25px;
        }
    }
    @media screen and ( max-width: 575px ) {
        .woocommerce-cart .wrapper .step .first .text span {
            flex-direction: column;
        }
        .woocommerce-cart .wrapper .step .fifth {
            padding: 40px 50px;
        }
        .woocommerce-cart .wrapper .step .fifth span {
            flex-direction: column;
        }
        .woocommerce-cart .wrapper .step .fifth span a {
            margin: 15px;
        }
        .woocommerce-cart .wrapper .step .fifth h2 {
            font-size: 76px;
            margin: 0;
        }
        .woocommerce-cart .wrapper .step .six .tpl-acces .item .wrap {
            height: auto;
            flex-direction: column;
        }
        .woocommerce-cart .wrapper .step .six .tpl-acces .item .wrap .slider,
        .woocommerce-cart .wrapper .step .six .tpl-acces .item .wrap .text {
            width: 100%;
        }
        .woocommerce-cart .wrapper .step .six .tpl-acces .item .wrap .text .accessories-item__bt {
            position: relative;
        }
    }
</style>
<?php
$items = WC()->cart->get_cart();
$ids = array();
foreach ($items as $item => $values) {
    $_product = $values['data']->post;
    $ids[] = $_product->ID;
}
$product_id = end($ids);
$terms = get_the_terms($product_id, 'product_cat');

$term_id = $terms[0]->term_id;
?>
<section class="wrapper">
    <?php
    if (($_COOKIE['user'] == 'one') || 24 == $term_id) :
	?>
        <div style="display: block;" class="step fourth">
    	<div class="step-header">
    	    <a class="back" href="#"></a>
    	    <div class="logo"></div>
    	</div>
    	<div class="step-name">Step 3</div>
    	<div class="virtuclean_cart">
    	    <div class="container">
    		<div class="row">
    		    <div class="col-12">
			    <?php do_action('woocommerce_before_cart'); ?>

    			<form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
				<?php do_action('woocommerce_before_cart_table'); ?>
				<?php do_action('woocommerce_before_cart_contents'); ?>
				<?php
				foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) :
				    $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
				    $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

				    if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) :
					$product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
					?>
	    			    <div class="shop_table_cart shop_table shop_table_responsive cart woocommerce-cart-form__contents">
	    				<div class="product-thumbnail">
	    				    <h3>&nbsp;</h3>

						<?php if ($product_id == '125'): ?>
						    <div class="product_image product" >
							<div class="cart_product_grid">
							    <div class="product_cover">

								<a href="/wp-content/uploads/2019/09/big_v-1.jpg" class="image" title="">
								    <img src="/wp-content/uploads/2019/09/Cart_virtuclran-1.png" alt="">
								</a>
							    </div>

							    <a href="/wp-content/uploads/2019/11/bigVirtuClean-003-Edit.jpg" class="image" title="">
								<img src="/wp-content/uploads/2019/11/smVirtuClean-003-Edit.png" alt="">
							    </a>
							    <a href="/wp-content/uploads/2019/11/bigVirtuClean-004-Edit.jpg" class="image" title="">
								<img src="/wp-content/uploads/2019/11/smVirtuClean-004-Edit.png" alt="">
							    </a>
							    <a href="/wp-content/uploads/2019/11/bigVirtuClean-005-Edit.jpg" class="image" title="">
								<img src="/wp-content/uploads/2019/11/smVirtuClean-005-Edit.png" alt="">
							    </a>
							    <a href="/wp-content/uploads/2019/11/bigVirtuClean-007-Edit.jpg" class="image" title="">
								<img src="/wp-content/uploads/2019/11/smVirtuClean-007-Edit.png" alt="">
							    </a>
							    <a href="/wp-content/uploads/2019/11/bigVirtuClean-008-Edit.jpg" class="image" title="">
								<img src="/wp-content/uploads/2019/11/smVirtuClean-008-Edit.png" alt="">
							    </a>
							    <a href="/wp-content/uploads/2019/11/bigVirtuClean-011-Edit.jpg" class="image" title="">
								<img src="/wp-content/uploads/2019/11/smVirtuClean-011-Edit.png" alt="">
							    </a>
							    <a href="/wp-content/uploads/2019/11/bigVirtuClean-012-Edit.jpg" class="image" title="">
								<img src="/wp-content/uploads/2019/11/smVirtuClean-012-Edit.png" alt="">
							    </a>
							    <a href="/wp-content/uploads/2019/11/bigVirtuClean-014-Edit.jpg" class="image" title="">
								<img src="/wp-content/uploads/2019/11/smVirtuClean-014-Edit.png" alt="">
							    </a>
							    <a href="/wp-content/uploads/2019/11/bigVirtuClean-015-Edit.jpg" class="image" title="">
								<img src="/wp-content/uploads/2019/11/smVirtuClean-015-Edit.png" alt="">
							    </a>
							    <a href="/wp-content/uploads/2019/11/bigVirtuClean-016-Edit.jpg" class="image" title="">
								<img src="/wp-content/uploads/2019/11/smVirtuClean-016-Edit.png" alt="">
							    </a>
							    <a href="/wp-content/uploads/2019/11/bigVirtuClean-017-Edit.jpg" class="image" title="">
								<img src="/wp-content/uploads/2019/11/smVirtuClean-017-Edit.png" alt="">
							    </a>




							    <a href="https://vimeo.com/343411871" class="video" title="This is a video">
								<svg width="70" height="90" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M20.5 41C31.8218 41 41 31.8218 41 20.5C41 9.17816 31.8218 0 20.5 0C9.17816 0 0 9.17816 0 20.5C0 31.8218 9.17816 41 20.5 41Z" fill="#EF4343"></path>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M15 12L29.5 20.5L15 29V12Z" fill="white"></path>
								</svg>
							    </a>
							</div>
						    </div>
						<?php else: ?>
						    <div class="product_image" >
							<?php
							$thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);

							if (!$product_permalink) {
							    echo $thumbnail; // PHPCS: XSS ok.
							} else {
							    printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail); // PHPCS: XSS ok.
							}
							?>
						    </div>
						<?php endif; ?>

	    				</div>
	    				<div class="product_name" data-title="<?php esc_attr_e('Product', 'woocommerce'); ?>">
	    				    <h3><?php esc_html_e('Product Name', 'woocommerce'); ?></h3>
	    				    <h2>
						    <?php
						    if (!$product_permalink) {
							echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;');
						    } else {
							echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
						    }

						    do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

						    // Meta data.
						    echo wc_get_formatted_cart_item_data($cart_item); // PHPCS: XSS ok.
						    // Backorder notification.
						    if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
							echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>', $product_id));
						    }
						    ?>
	    				    </h2>

	    				</div>
	    				<div class="product-price" data-title="<?php esc_attr_e('Price', 'woocommerce'); ?>">
	    				    <h3><?php esc_html_e('Price', 'woocommerce'); ?></h3>
	    				    <p><?php echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); ?></p>
	    				</div>
	    				<div class="product-quantity" data-title="<?php esc_attr_e('Quantity', 'woocommerce'); ?>">
	    				    <h3><?php esc_html_e('Quantity', 'woocommerce'); ?></h3>
						<?php
						if ($_product->is_sold_individually()) {
						    $product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
						} else {
						    ?>
						    <div class="product_qty_custom">
							<div class="product_qty_symbol">
							    <span class="product_qty_plus">+</span>
							    <span class="product_qty_minus">-</span>
							</div>

							<?php
							woocommerce_quantity_input(array(
							    'min_value' => 0,
							    'max_value' => apply_filters('woocommerce_quantity_input_max', $_product->get_max_purchase_quantity(), $_product),
							    'input_value' => $cart_item['quantity'],
							    'input_name' => "cart[{$cart_item_key}][qty]",
								), $_product, true);
							?>
						    </div>
						<?php } ?>

	    				</div>
	    				<div class="product-subtotal" data-title="<?php esc_attr_e('Total', 'woocommerce'); ?>">
	    				    <h3><?php esc_html_e('Total', 'woocommerce'); ?></h3>
	    				    <p><?php echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); ?></p>
	    				</div>
	    				<div class="product-remove">
	    				    <h3>Remove</h3>
						<?php
						// @codingStandardsIgnoreLine
						echo apply_filters('woocommerce_cart_item_remove_link', sprintf(
								'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"></a>', esc_url(wc_get_cart_remove_url($cart_item_key)), __('Remove this item', 'woocommerce'), esc_attr($product_id), esc_attr($_product->get_sku())
							), $cart_item_key);
						?>
	    				</div>
	    			    </div>
					<?php
				    endif;
				endforeach;
				?>

				<?php do_action('woocommerce_cart_contents'); ?>
    			    <div class="product-update-cart">
    				<div  class="actions">
    				    <button type="submit" class="button" name="update_cart" value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>"><?php esc_html_e('Update cart', 'woocommerce'); ?></button>

					<?php do_action('woocommerce_cart_actions'); ?>

					<?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
    				</div>
    			    </div>

    			    <div class="cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">
    				<div class="cart-total_cup_block">
					<?php if (wc_coupons_enabled()) { ?>
					    <div class="coupon">
						<label for="coupon_code">
						    <?php esc_html_e('Discount:', 'woocommerce'); ?>
						</label>
						<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e('Enter code', 'woocommerce'); ?>" />
						<button type="submit" class="button btn_cupon" name="apply_coupon" value="<?php esc_attr_e('Apply discount', 'woocommerce'); ?>"><?php esc_attr_e('GO', 'woocommerce'); ?></button>
						<?php do_action('woocommerce_cart_coupon'); ?>
					    </div>
					<?php } ?>
					<?php do_action('woocommerce_cart_actions'); ?>
					<?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
					<?php do_action('woocommerce_before_cart_totals'); ?>
					<?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
					    <p class="cart-discount coupon-<?php echo esc_attr(sanitize_title($code)); ?>">
						<span><?php wc_cart_totals_coupon_label($coupon); ?></span>
						<span data-title="<?php echo esc_attr(wc_cart_totals_coupon_label($coupon, false)); ?>"><?php wc_cart_totals_coupon_html($coupon); ?></span>
					    </p>

					<?php endforeach; ?>
    				    <div class="cupp-shipping">
					    <?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>

						<?php do_action('woocommerce_cart_totals_before_shipping'); ?>

						<?php wc_cart_totals_shipping_html(); ?>

						<?php do_action('woocommerce_cart_totals_after_shipping'); ?>

					    <?php elseif (WC()->cart->needs_shipping() && 'yes' === get_option('woocommerce_enable_shipping_calc')) : ?>

						<p class="shipping">
						    <span data-title="<?php esc_attr_e('Shipping', 'woocommerce'); ?>"><?php woocommerce_shipping_calculator(); ?></span>
						</p>

					    <?php endif; ?>
    				    </div>
					<?php if ($product_id == '125'): ?>
					    <div class="cart-offer">
						<?php
						$id_product = get_field('main_product', 'options');
						if (isset($id_product)) :
						    ?>
						    <?php
						    $args = array(
							'post_type' => 'product',
							'p' => $id_product
						    );
						    $loop = new WP_Query($args);

						    while ($loop->have_posts()) : $loop->the_post();
							global $product;
							$post_thumbnail_id = $product->get_image_id();
							?>
							Only

							<span class="price-regular">
							    <span class="price-currencySymbol"><?php echo get_woocommerce_currency_symbol(); ?></span>
							    <?php echo $product->get_regular_price(); ?>
							</span>


							<span class="price">
							    <span class="price-currencySymbol"><?php echo get_woocommerce_currency_symbol(); ?></span>
							    <?php echo $product->get_price(); ?>
							</span>

							+ Free 2 day US shipping for orders $100 or more
							<?php
						    endwhile;
						    wp_reset_query();
						    ?>
						<?php endif; ?>
					    </div>
					<?php endif; ?>
    				    <!--                                <div>-->
    				    <!--                                    <p class="order-total">-->
    				    <!--                                        <span>--><?php //_e( 'Total', 'woocommerce' );               ?><!--</span>-->
    				    <!--                                        <span data-title="--><?php //esc_attr_e( 'Total', 'woocommerce' );               ?><!--">--><?php //wc_cart_totals_subtotal_html();               ?><!--</span>-->
    				    <!--                                    </p>-->
    				    <!--                                </div>-->
					<?php get_template_part('template-parts/accessories_catr', 'block'); ?>
    				</div>
    				<div class="banner-block">

    				    <a href="/cart/?add-to-cart=3304">
    					<img style="height: auto !important;" src="<?php echo get_template_directory_uri() ?>/assets/src/img/Banner-product.png" alt="Banner">
    				    </a>

    				</div>
    				<div class="cart_totals_block">
    				    <p class="label"><?php _e('Total amount:', 'woocommerce'); ?></p>
    				    <p class="cart-subtotal" data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>"><?php wc_cart_totals_order_total_html(); ?></p>
    				    <p class="wc-proceed-to-checkout"><?php do_action('woocommerce_proceed_to_checkout'); ?></p>
    				</div>
				    <?php do_action('woocommerce_after_cart_totals'); ?>
    			    </div>
				<?php do_action('woocommerce_after_cart_contents'); ?>
				<?php do_action('woocommerce_after_cart_table'); ?>

    			</form>
    		    </div>
    		</div>
    	    </div>
    	</div>
        </div>
	<?php
    elseif ($_COOKIE['user'] == 'two'):
	?>
        <div style="display: block;" class="step two">
    	<div class="step-header">
    	    <a class="back" href="#"></a>
    	    <div class="logo"></div>
    	</div>
    	<div class="fifth">
    	    <div class="step-name">Step 1</div>
    	    <h2>Finance</h2>
    	    <h4>Do you want to finance?</h4>
    	    <p>We offer carecredit. Pay over 6 months with 0% interest</p>
    	    <span>
    		<a class="next" href="#">I’ll pay in full</a>
    		<a class="open-block" href="#">Yes, let’s finance</a>
    	    </span>
    	    <div style="display: none" class="next-step">
    		<p>Apply for Finance after placing your order, just click the "Finance" button at the end</p>
    		<a class="next" href="#">Next step</a>
    	    </div>
    	</div>
        </div>
	<?php
    elseif ($_COOKIE['user'] == 'three'):
	?>
        <div style="display: block;" class="step three">
    	<div class="step-header">
    	    <a class="back" href="#"></a>
    	    <div class="logo"></div>
    	</div>
    	<div class="six">
    	    <div class="step-name">Step 2</div>
    	    <h2>Accessories</h2>
    	    <h4>Want to add some accessories?</h4>
		<?php get_template_part('template-parts/accessories-cart', 'block'); ?>
    	    <div class="step-footer">
    		<a class="skip-step" onclick="createCookie('one'); return false" href="#">Skip this step</a>
    	    </div>
    	</div>
        </div>
	<?php
    else:
	?>
        <div style="display: block;" class="step one">
    	<div class="step-header">
    	    <a class="back" href="<?php echo home_url(); ?>" ></a>
    	    <div class="logo"></div>
    	</div>
    	<div class="first">
    	    <div class="image">
    		<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/dist/img/photo-virtuclean.png"
    		     alt="Virtuclean">
    	    </div>
    	    <div class="text">
    		<h2>VirtuCLEAN 2.0</h2>
    		<span>
    		    <div class="price-block">
    			<div class="name">Price</div>
    			<div class="price"><div class="old">$ 329</div> $ 279</div>
    		    </div>
    		    <a class="buy-on" href="#">BUY NOW</a>
    		</span>
    		<p>VirtuCLEAN kills germs and bacteria in your sleep equipment in only 30 minutes. It uses Ozone (also
    		    known as activated oxygen) to disinfect your sleep equipment. Requires no soap, water, cleaning
    		    solutions or on-going maintenance. Small and portable, weighing only one-half pound.</p>
    		<p>To use this device, simply put your sleep equipment into the VirtuBAG, attach sleep equipment to the
    		    VirtuCLEAN, turn VirtuCLEAN on, and walk away. The VirtuCLEAN will automatically clean your system
    		    in only 30 minutes.</p>
    	    </div>
    	</div>
    	<div class="second">
    	    <div class="text">
    		<h3>Advantages of VirtuCLEAN</h3>
    		<ul>
    		    <li>Kills germs and bacteria in your sleep equipment
    			in only 30 minutes.
    		    </li>
    		    <li>Requires no soap, water, cleaning solutions
    			or on-going maintenance
    		    </li>
    		    <li>Uses activated oxygen to disinfect sleep equipment</li>
    		    <li>Small & portable, weighs only one-half pound</li>
    		    <li>Perfect for home use & travel</li>
    		    <li>Rechargeable lithium ion battery</li>
    		    <li>Ultra-quiet while it disinfects</li>
    	    </div>
    	    <div class="image">
    		<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/dist/img/photo-virtuclean2.png"
    		     alt="Virtuclean">
    	    </div>
    	</div>
    	<div class="third">
    	    <div class="image"
    		 style="background-image: url('<?php echo get_stylesheet_directory_uri() ?>/assets/dist/img/photo-virtuclean3.png')"></div>
    	    <div class="text">
    		<ul>
    		    <li>Automatic cleaning</li>
    		    <li>Kills 99.99% of germs and bacteria in only 30 minutes!</li>
    		    <li>Requires no soap, water, or cleaning solutions</li>
    		    <li>Small and portable, weighs only 1/2 pound</li>
    		    <li>Ultra quiet</li>
    		    <li>Uses Ozone to disinfect</li>
    		    <li>Battery life, 10 years</li>
    		    <li>Charging time, 2 hours</li>
    		    <li>Requires no maintenance like other devices</li>
    		</ul>
    	    </div>
    	</div>
    	<div class="fourth">
    	    <div class="text">
    		<h3>VirtuCLEAN & Your Good Health</h3>
    		<p>This device efficiently destroys harmful bacteria and mold, which prevents health-related
    		    complications. Also, studies show that people who use VirtuCLEAN are more inclined to clean their
    		    sleep equipment on a daily basis — which doctors recommend.</p>
    		<p>You will enjoy maximum benefits of your sleep equipment and get the restorative sleep your body
    		    requires. This revolutionary technology is effective in killing germs and bacteria in your sleep
    		    equipment. Invest in VirtuCLEAN to protect your health.</p>
    	    </div>
    	    <div class="image"
    		 style="background-image: url('<?php echo get_stylesheet_directory_uri() ?>/assets/dist/img/photo-virtuclean4.png')"></div>

    	</div>
    	<div class="step-footer">
    	    <a class="buy-on" href="#">BUY NOW</a>
    	</div>

        </div>
    <?php
    endif;
    ?>

</section>

<script>
    //    One step
    $('.one .buy-on').click(function () {
	document.cookie = "user=two";
	location.reload();
    });
    //Two step
    $('.two .open-block').on('click', function (e) {
	e.preventDefault();
	$(".next-step").css("display", "flex");
    });
    $('.two .next').click(function () {
	document.cookie = "user=three";
	location.reload();
    });
    $('.two .back').click(function () {
	document.cookie = "user=none";
	location.reload();
    });
    //Three step
    $('.three .back').click(function () {
	document.cookie = "user=two";
	location.reload();
    });
    $('.three .skip-step').click(function () {
	document.cookie = "user=one";
	location.reload();
    });
    $('.accessories-item__bt a').on('click', function (e) {
	document.cookie = "user=one";
    });
    $('.fourth .checkout-button').on('click', function (e) {
	document.cookie = "user=no";
    });
    $('.fourth .back').on('click', function (e) {
	document.cookie = "user=three";
	location.reload();
    });






</script>
<?php get_footer(); ?>
