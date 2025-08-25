<?php

/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package turio
 */
?>

<div class="container">
    <div class="error-area-wrapper text-center">
        <a><img src="<?php echo esc_url( get_template_directory_uri().'/assets/images/not-found.png' ) ;?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="img-fluid"></a>
        <div class="mt-30 mb-30">
            <h3> <?php echo esc_html__('Sorry!, Nothing Found!', 'turio'); ?> </h3>
            <p><?php echo esc_html__('Nothing Match your search terms. Please try again with some different keywords.', 'turio'); ?></p>
        </div>
        <?php
            get_template_part( 'searchform' );
        ?>
    </div>
</div>