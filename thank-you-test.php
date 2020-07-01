<?php
/* Template Name: Thanks You Template Test */
?>
<?php get_header(); ?>
<style>
    /* Page Thank You Popup */
    .modal-review {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        justify-content: center;
        align-items: center;
        background: rgba(0, 0, 0, .5);
        z-index: 100;
    }
    .modal-review .wrapper {
        background: white;
        width: 600px;
        display: flex;
        justify-content: center;
        padding: 70px 35px;
        flex-direction: column;
        position: relative;
    }
    .modal-review .wrapper .close {
        width: 30px;
        height: 30px;
        position: absolute;
        top: 25px;
        right: 25px;
    }
    .modal-review .wrapper .close:before,
    .modal-review .wrapper .close:after {
        content: '';
        width: 100%;
        height: 3px;
        background: #F65800;
        display: block;
        position: absolute;
        top: calc( 50% - 1px );
    }
    .modal-review .wrapper .close:after {
        transform: rotate(45deg);
    }
    .modal-review .wrapper .close:before {
        transform: rotate(-45deg);
    }
    .modal-review .wrapper .hidden {
        height: 0px;
        width: 0px;
        overflow: hidden;
    }
    .modal-review .wrapper h2 {
        font-family: Helvetica;
        font-style: normal;
        font-weight: bold;
        font-size: 36px;
        line-height: 41px;
        text-align: center;
        color: #414141;
    }
    .modal-review .wrapper span.subtitle {
        font-family: Helvetica;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 21px;
        text-align: center;
        color: #414141;
        margin: 20px 0 40px;
    }
    .modal-review .wrapper p {
        text-align: center;
        margin-bottom: 10px;
    }
    .modal-review .wrapper input[type='email'],
    .modal-review .wrapper textarea {
        max-width: 500px;
        border: 1px solid #C4C4C4;
        border-radius: 4px;
        padding: 15px 25px;
    }
    .modal-review .wrapper input {
        height: 45px;
    }
    .modal-review .wrapper textarea {
        height: 100px;
    }
    #yourBtn {
        font-family: Helvetica;
        font-style: normal;
        font-weight: 300;
        font-size: 14px;
        line-height: 16px;
        color: #414141;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }
    #yourBtn:before {
        content: '';
        background-image: url("../wp-content/themes/virtuclean/assets/src/img/Vector.png");
        width: 13px;
        height: 14px;
        margin-right: 5px;
    }
    .modal-review .wrapper label {
        display: flex;
        align-items: center;
    }
    .modal-review .wrapper label input[type='checkbox'] {
        margin-right: 5px;
    }
    .modal-review .wrapper input[type='submit'] {
        font-family: Helvetica;
        font-style: normal;
        font-weight: bold;
        font-size: 18px;
        line-height: 21px;
        text-align: center;
        letter-spacing: 0.02em;
        text-transform: uppercase;
        color: #FFFFFF;
        background: linear-gradient(180deg, #EB915B 0%, #E16E35 100%);
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.09);
        border-radius: 1px;
        padding: 12px 80px;
        border: none;
    }
    .modal-review .wrapper .wpcf7-list-item-label {
        font-family: Helvetica;
        font-style: normal;
        font-weight: 300;
        font-size: 14px;
        line-height: 16px;
        color: #414141;
    }
    @media screen and ( max-width: 767px ) {
        .modal-review .wrapper {
            width: 80%;
        }
        .modal-review .wrapper h2 {
            font-size: 24px;
        }
        .modal-review .wrapper span.subtitle {
            font-size: 14px;
            margin: 0px 0 15px;
        }
        .modal-review .wrapper input[type='email'],
        .modal-review .wrapper textarea {
            width: 100%;
        }
        .modal-review .wrapper .wpcf7-list-item-label {
            font-size: 12px;
        }
    }


</style>
<section class="thank-you-promo">
</section>
<section class="thank-you">
    <h1>THANK YOU!</h1>
    <span>for contacting VirtuClean</span>
    <p>We will contact you as soon as possible.</p>
    <a class="back" href="#">BACK TO HOMEPAGE</a>
    <div class="social">
        <ul>
            <li><a class="fb" href="https://www.facebook.com/VirtuCLEANbyVirtuOx"></a></li>
            <li><a class="ig" href="https://www.instagram.com/virtucleanbyvirtuox/"></a></li>
            <li><a class="tw" href="https://twitter.com/VirtuCLEAN"></a></li>
        </ul>
    </div>
</section>
<div style="display: none" class="modal-review">
    <div class="wrapper">
        <div class="close"></div>
        <h2>We Appreciate Your Feedback!</h2>
        <span class="subtitle">Please Give Us A Review And Upload Your Picture</span>
        <?php echo do_shortcode( '[contact-form-7 id="2872" title="Feedback Review"]' ); ?>
    </div>

</div>
    <script>
        window.onload = function() {
            setTimeout(function() {
                $('.modal-review').css('display', 'flex');
            }, 2000);

        };
        $( ".close" ).on( "click", function() {
            $('.modal-review').css('display', 'none');
        });
    </script>
<script>
    function getFile() {
        document.getElementById("upfile").click();
    }

    function sub(obj) {
        var file = obj.value;
        var fileName = file.split("");
        document.getElementById("yourBtn").innerHTML = fileName[fileName.length - 1];
        event.preventDefault();
    }
</script>
<?php get_footer(); ?>
