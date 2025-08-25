<?php

/**
 * The template for displaying 404 page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package turio
 */

get_header();
?>
<?php
if (!is_front_page()) {
    get_template_part('template-parts/breadcrumbs/breadcrumb-page');
}


?>
<div class="error-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="error-content text-center mt-110 mb-110">
                    <div class="error-vactor text-center">
                        <?php
                        if (!empty(Egns_Helpers::get_theme_option('404_image')['url'])) {
                        ?>
                            <img src="<?php echo esc_url(Egns_Helpers::get_theme_option('404_image')['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" class="img-fluid">
                        <?php
                        } else {
                        ?>
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/404.png'); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" class="img-fluid">
                        <?php
                        }
                        ?>
                    </div>

                    <div class="error-text">

                        <h2>
                            <?php !empty(Egns_Helpers::get_theme_option('404_title')) ? Egns_Helpers::turio_translate_with_escape_(Egns_Helpers::get_theme_option('404_title')) : Egns_Helpers::turio_translate_with_escape_('That Page Are Not Found'); ?>

                        </h2>
                        <p>
                            <?php !empty(Egns_Helpers::get_theme_option('404_description')) ? Egns_Helpers::turio_translate_with_escape_(Egns_Helpers::get_theme_option('404_description')) : Egns_Helpers::turio_translate_with_escape_("It looks like you've reached a URL that doesn’t exist. Please use the navigation above or search below to find your way back to our amazing website."); ?>
                        </p>
                        <?php if (!empty(Egns_Helpers::get_theme_option('404_button_text'))) { ?>
                            <div class="error-btn">
                                <a href="<?php echo esc_url(home_url('/')); ?>"><i class="bi bi-house-door"></i><?php echo esc_html(Egns_Helpers::get_theme_option('404_button_text')) ?></a>
                            </div>
                        <?php } else { ?>
                            <div class="error-btn">
                                <a href="<?php echo esc_url(home_url('/')); ?>"><i class="bi bi-house-door"></i><?php echo  Egns_Helpers::turio_translate_with_escape_('GO TO HOME') ?></a>
                            </div>
                        <?php }


                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
