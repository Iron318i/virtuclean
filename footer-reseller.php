<?php

/**
 * Footer template
 *
 * @package     WordPress
 * @subpackage  RST v3
 * @since       1.0.0
 * @author      Serhii Sokol
 */
?>

<?php wp_footer(); ?>

<script>
document.addEventListener('wpcf7mailsent', function( event ) {
    if(event.detail.contactFormId=="1554"){ 
    setTimeout(function(){window.location.href='https://www.virtuclean.com/thank-you/';},1);
}
}, false );
</script>
</body>
</html>
