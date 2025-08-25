<?php

/**
 * turio blog meta for blog listing.
 *
 * @since 1.4.0
 */
if (!function_exists('turio_blog_meta')) {

    function turio_blog_meta()
    {
?>
        <div class="blog-body-top">
            <?php $author_url = get_author_posts_url(get_the_author_meta("ID")); ?>
            <a href="<?php echo esc_url($author_url) ?>" class="blog-writer"><i class="bi bi-person-circle"></i> <?php echo esc_html__('By', 'turio') . ' ' . esc_html(get_the_author()) ?> </a>
            <?php
            if (Egns_Helpers::turio_post_layout() == 'default') {
            ?>
                <a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')); ?>" class="blog-comments"><i class="bi bi-calendar3"></i> <?php echo esc_html(get_the_date()); ?></a>
            <?php
            }
            ?>
            <a class="blog-comments" href="<?php echo esc_url(get_comments_link()); ?>">
                <i class="bi bi-chat-left-quote"></i><?php echo wp_kses_post('(' . get_comments_number() . ')' . ' ' . __('Comment', 'turio')); ?>
            </a>
        </div>

    <?php
    }
}

/**
 * Blog archive title.
 *
 * @since 1.4.0
 */
if (!function_exists('turio_blog_archive_title')) {
    function turio_blog_archive_title()
    {
        if (!is_single()) {

            $title = '<h3 class="blog-title"><a href="' . esc_url(get_permalink()) . '">' . wp_kses(get_the_title(), wp_kses_allowed_html('post')) . '</a></h3>';
            $content = '';
            $read_more = '';
            if (Egns_Helpers::turio_post_layout() == 'default') {
                $content = '<p class="blog-short-description">' . esc_html(wp_trim_words(get_the_excerpt(), 30)) . '</p>';
                $read_more = '<div class="read-more"><a href="' . esc_url(get_permalink()) . '">' . esc_html('Read More') . ' <i class="bx bx-right-arrow-alt"></i></a></div>';
            }
            echo  Egns_Helpers::turio_translate($title) . Egns_Helpers::turio_translate($content) . Egns_Helpers::turio_translate($read_more);
        }
    }
}

/**
 * Blog archive title.
 *
 * @since 1.4.0
 */
if (!function_exists('turio_blog_post_header')) {
    function turio_blog_post_header()
    {

    ?>
        <div class="post-header">
            <div class="post-meta">
                <?php $author_url = get_author_posts_url(get_the_author_meta("ID")); ?>
                <a class="blog-writer" href="<?php echo esc_url($author_url) ?>"><i class="bi bi-person-circle"></i><?php echo esc_html__('by', 'turio') . ' ' . esc_html(get_the_author()); ?></a>
                <a class="blog-time" href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j')); ?>"><i class="bi bi-calendar3"></i> <?php echo esc_html(get_the_date()); ?></a>
                <a class="blog-comments" href="<?php echo esc_url(get_comments_link()); ?>">
                    <i class="bi bi-chat-left-quote"></i><?php echo wp_kses_post('(' . get_comments_number() . ')' . ' ' . esc_html__('Comment', 'turio')); ?>
                </a>
            </div>
        </div>

    <?php
    }
}

/**
 * Blog post thumbnail
 *
 * @since 1.4.0
 */
if (!function_exists('turio_blog_post_thumbnail')) {
    function turio_blog_post_thumbnail()
    {

    ?>
        <?php if (has_post_thumbnail()) { ?>
            <div class="post-thumb">
                <?php the_post_thumbnail('large', array('class' => 'img-fluid')); ?>
            </div>
        <?php } ?>

    <?php
    }
}

/**
 * Blog post footer
 *
 * @since 1.4.0
 */
if (!function_exists('turio_blog_post_footer')) {
    function turio_blog_post_footer()
    {

    ?>
        <div class="post-footer flex-wrap flex-md-nowrap">
            <div class="next-prev-link"><?php previous_post_link('%link', '<i class="bi bi-chevron-left"></i> ' . esc_html('Previous') . '', TRUE); ?></div>
            <a href="<?php esc_url(the_permalink()); ?>" class="next-post-link"><?php esc_html(the_title()); ?></a>
            <div class="next-prev-link"><?php next_post_link('%link', '' . esc_html('Next') . ' <i class="bi bi-chevron-right"></i>', TRUE); ?></div>
        </div>

    <?php
    }
}

/**
 * turio Footer Widgets
 *
 * @since 1.4.0
 */
if (!function_exists('turio_footer_widgets')) {
    function turio_footer_widgets()
    {
    ?>
        <div class="row g-4">
            <?php
            if (is_active_sidebar('footer_1')) {
            ?>
                <div class="col-lg-4">
                    <?php dynamic_sidebar('footer_1'); ?>
                </div>
            <?php
            };

            if (is_active_sidebar('footer_2')) {
            ?>
                <div class="col-lg-2 col-md-4">
                    <?php dynamic_sidebar('footer_2'); ?>
                </div>
            <?php
            };

            if (is_active_sidebar('footer_3')) {
            ?>
                <div class="col-lg-2 col-md-4">
                    <?php dynamic_sidebar('footer_3'); ?>
                </div>
            <?php
            };

            if (is_active_sidebar('footer_4')) {
            ?>
                <div class="col-lg-4 col-md-8">
                    <?php dynamic_sidebar('footer_4'); ?>
                </div>
            <?php
            };
            ?>
        </div>
        <?php
    }
}

/**	
 * Copyright text for footer.
 *
 * @since   1.4.0
 */
if (!function_exists('turio_footer_contact_area')) {
    function turio_footer_contact_area()
    {
        $turio_theme_options = get_option('turio_theme_options');
        $footer_contact_enable = Egns_Helpers::get_theme_option('footer_contact_enable');
        $enable_contact_area = Egns_Helpers::turio_page_option_value('enable_contact_area');

        if (Egns_Helpers::turio_is_enabled($footer_contact_enable, $enable_contact_area)) {
        ?>
            <div class="footer-contact-wrapper">
                <?php
                if (!empty($turio_theme_options['footer_contact_title'])) {
                    echo '<h5>' . esc_html($turio_theme_options['footer_contact_title']) . '</h5>';
                }
                ?>
                <ul class="footer-contact-list">
                    <?php
                    if (!empty($turio_theme_options['footer_contact_phone'])) {
                    ?>
                        <li><i class="bi bi-telephone-x"></i> <a href="tel:<?php echo esc_html($turio_theme_options['footer_contact_phone'], 'turio'); ?>"><?php echo esc_html($turio_theme_options['footer_contact_phone']); ?></a></li>
                    <?php
                    }
                    ?>
                    <?php
                    if (!empty($turio_theme_options['footer_contact_email'])) {
                    ?>
                        <li><i class="bi bi-envelope-open"></i> <a href="mailto:<?php echo esc_html($turio_theme_options['footer_contact_email'], 'turio'); ?>"><?php echo esc_html($turio_theme_options['footer_contact_email']); ?></a></li>
                    <?php
                    }
                    ?>
                    <?php
                    if (!empty($turio_theme_options['footer_contact_address'])) {
                    ?>
                        <li><i class="bi bi-geo-alt"></i> <?php echo esc_html($turio_theme_options['footer_contact_address'], 'turio'); ?></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        <?php
        }
    }
}

/**	
 * Copyright text for footer.
 *
 * @since   1.4.0
 */
if (!function_exists('turio_footer_copyright')) {
    function turio_footer_copyright()
    {
        $turio_theme_options = get_option('turio_theme_options');
        $enable_copyright_area = Egns_Helpers::turio_page_option_value('enable_copyright_area');
        $copyright_enable = Egns_Helpers::get_theme_option('copyright_area_enable');

        if (Egns_Helpers::turio_is_enabled($copyright_enable, $enable_copyright_area)) {
        ?>
            <div class="footer-bottom">
                <div class="container">
                    <div class="footer-copyright-area d-flex <?php if (has_nav_menu('footer-menu') && empty($turio_theme_options['copyright-area-logo']['url'])) echo 'justify-content-md-between justify-content-sm-center' ?> justify-content-center align-items-center flex-wrap">
                        <div class="copyright-link text-lg-start text-center">
                            <?php
                            if (!empty($turio_theme_options['copyright_text'])) {
                                echo  '<p>' . wp_kses($turio_theme_options['copyright_text'], wp_kses_allowed_html('post')) . '</p>';
                            } else {
                                echo _('<p>' . esc_html('Copyright') . ' ' . esc_html(date('Y')) . ' <a rel="nofollow" href="' . esc_url('https://www.turio-wp.egenslab.com/') . '">' . esc_html('Turio') . '</a> | ' . esc_html('Design By') . ' <a rel="nofollow" href="https://www.egenslab.com/">' . esc_html('Egens Lab') . '</a></p>');
                            }
                            ?>
                        </div>

                        <?php
                        if (!empty($turio_theme_options['copyright_area_logo']['url'])) {
                        ?>
                            <div class="footer-logo text-center">
                                <?php
                                Egns_Helpers::turio_get_copyright_theme_logo($turio_theme_options['copyright_area_logo']['url']);
                                ?>
                            </div>
                        <?php
                        }
                        Egns_Helpers::turio_get_footer_theme_menu('footer-menu', 'policy-links', '', 'policy-list justify-content-lg-end justify-content-center', 4);
                        ?>
                    </div>
                </div>
            </div>
        <?php
        }
    }
}

/**	
 * Widget area background
 *
 * @since   1.4.0
 */
if (!function_exists('turio_footer_widget_area_background')) {
    function turio_footer_widget_area_background()
    {
        $img_url = Egns_Helpers::get_theme_option('turio_footer_widget_area_background');
        ?>
        <div class="footer-vactor">
            <?php
            if (!empty($img_url['url'])) {
                echo '<img src="' . esc_url($img_url['url']) . '" alt="' . esc_attr('footer-vactor') . '">';
            } else {
                echo '<img src="' . esc_url('' . get_template_directory_uri() . '/assets/images/footer-bg.png') . '" alt="' . esc_attr('footer-vactor') . '">';
            }
            ?>
        </div>
<?php
    }
}

/**	
 * Comment for Blog Standard
 *
 * @since   1.4.0
 */
if (!function_exists('turio_comment_count')) {
    function turio_comment_count()
    {
        if (!post_password_required() && (comments_open() || get_comments_number()) && get_comments_number() > 0) {
            $comment_count = get_comments_number_text('1', '0', '%');
            echo '<div class="post__comment__count">
			        <i class="fa fa-comments-o"></i>
			        <a class="comment__count" href="' . esc_url(get_the_permalink()) . '">' . esc_html($comment_count) . '</a>
		        </div>';
        }
    }
}

/**
 * Get pricing section 
 */

if (!function_exists('turio_get_package_price')) {
    function turio_get_package_price()
    {
        $product_id = Egns_Helpers::turio_package_info('tour_product');
        $get_booking_form_type = Egns_Helpers::turio_package_info('tour_booking_options');
        $price_html = '';
        if (isset($get_booking_form_type) && $get_booking_form_type != 'enquiry_form') {
            if (class_exists('Woocommerce') && !empty($product_id)) {
                $product_id_single = wc_get_product($product_id);
                if (Egns_Helpers::egns_check_sale_price_schedule($product_id_single->get_id())) {
                    $price_html = get_woocommerce_currency_symbol() . Egns_Helpers::egns_calculate_product_price($product_id_single->get_id()) . ' <del>' . get_woocommerce_currency_symbol() . $product_id_single->get_regular_price() .  '</del>';
                } else {
                    $price_html =  get_woocommerce_currency_symbol() . Egns_Helpers::egns_calculate_product_price($product_id_single->get_id());
                }
            }
        } else {
            if (!empty(Egns_Helpers::turio_package_info('tp_promotion_price'))) {
                $price_html = Egns_Helpers::egns_calculate_product_price() . ' <del>' . Egns_Helpers::turio_package_info('tp_promotion_price') .  '</del>';
            } else {
                $price_html =  Egns_Helpers::egns_calculate_product_price();
            }
        }
        echo sprintf('%s', $price_html);
    }
}


?>