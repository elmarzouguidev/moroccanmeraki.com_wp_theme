<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package turio
 */
?>
<div class="footer-area">
    <?php if ( is_active_sidebar('footer_1') || is_active_sidebar('footer_2') || is_active_sidebar('footer_3') || is_active_sidebar('footer_4') ) : ?>
        <div class="footer-main-wrapper text-md-start text-center">
            
                <?php turio_footer_widget_area_background(); ?>
            
            <div class="container">
                <?php
                turio_footer_widgets();

                turio_footer_contact_area();
                ?>
            </div>
        </div>
    <?php endif ?>
    <?php
        turio_footer_copyright()
    ?>
</div>
<?php wp_footer(); ?>
</body>

</html>