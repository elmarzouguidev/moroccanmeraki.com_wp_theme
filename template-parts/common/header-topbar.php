
<div class="topbar-area topbar-style-one">
    <div class="container">
        <div class="d-flex justify-content-md-between justify-content-center align-items-center">
                <?php
                    if ( Egns_Helpers::turio_page_option_value('enable_contact_info') == 1 || Egns_Helpers::turio_is_blog_pages() || is_singular('turio-package') || is_singular('post') ) {
                ?>
                    <div class="d-xl-flex d-none">
                        <div class="topbar-contact-left">
                            <ul class="contact-list">
                                <?php if ( ! empty( Egns_Helpers::turio_theme_options( 'top_bar_phone_number_text' ) ) ) : ?>
                                    <li class="phone-number"><i class='bi bi-telephone-fill'></i><a href="tel:<?php echo esc_html( Egns_Helpers::turio_theme_options('top_bar_phone_number_text')); ?>"><?php echo esc_html( Egns_Helpers::turio_theme_options('top_bar_phone_number_text') ); ?></a></li>
                                <?php endif; ?>
                                <?php if ( ! empty( Egns_Helpers::turio_theme_options('top_bar_email_address') ) ) : ?>
                                    <li class="email-address"><i class='bi bi-envelope-fill'></i><a href="mailto:<?php echo esc_html( Egns_Helpers::turio_theme_options('top_bar_email_address') ); ?>"><?php echo esc_html( Egns_Helpers::turio_theme_options('top_bar_email_address') ); ?></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                <?php
                    }
                ?>
            <?php
                if ( Egns_Helpers::turio_page_option_value('enable_promotion_title') == 1 || Egns_Helpers::turio_is_blog_pages() || is_singular('turio-package') || is_singular('post') ) {
            ?>
                <div class="text-xl-center text-md-start text-center">
                    <div class="topbar-ad">
                        <?php
                            if ( ! empty( Egns_Helpers::turio_theme_options('top_bar_offer_text_enable')) == 1 && ! empty( Egns_Helpers::turio_theme_options('top_bar_offer_text_link') ) && ! empty( Egns_Helpers::turio_theme_options('top_bar_offer_text') ) ) {
                        ?>
                            <a href="<?php echo esc_url( Egns_Helpers::turio_theme_options('top_bar_offer_text_link'),'turio' ); ?>">
                                <?php Egns_Helpers::turio_translate_with_escape_( Egns_Helpers::turio_theme_options('top_bar_offer_text')); ?>
                            </a>
                        <?php
                            }
                        ?>
                    </div>
                 </div>
            <?php
            }

            if ( Egns_Helpers::turio_page_option_value('enable_social_icon') == 1 || Egns_Helpers::turio_is_blog_pages() || is_singular('turio-package') || is_singular('post') ) {
            ?>
                <div class="d-md-flex  d-none align-items-center justify-content-end">
                    <ul class="topbar-social-links">

                        <?php if ( ! empty( Egns_Helpers::turio_theme_options('top_bar_social_facebook') ) ) : ?>
                            <li>
                                <a href="<?php echo esc_url( Egns_Helpers::turio_theme_options('top_bar_social_facebook') ); ?>"><i class='bx bxl-facebook'></i></a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty( Egns_Helpers::turio_theme_options('top_bar_social_instagram'))) : ?>
                            <li>
                                <a href="<?php echo esc_url( Egns_Helpers::turio_theme_options('top_bar_social_instagram') ); ?>"><i class='bx bxl-instagram-alt'></i></a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty( Egns_Helpers::turio_theme_options('top_bar_social_twitter'))) : ?>
                            <li>
                                <a href="<?php echo esc_url( Egns_Helpers::turio_theme_options('top_bar_social_twitter') ); ?>"><i class='bx bxl-twitter'></i></a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty( Egns_Helpers::turio_theme_options('top_bar_social_youtube'))) : ?>
                            <li>
                                <a href="<?php echo esc_url( Egns_Helpers::turio_theme_options('top_bar_social_youtube') ); ?>"><i class='bx bxl-youtube'></i></a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty( Egns_Helpers::turio_theme_options('top_bar_social_whatsapp'))) : ?>
                            <li>
                                <a href="<?php echo esc_url( Egns_Helpers::turio_theme_options('top_bar_social_whatsapp') ); ?>"><i class='bx bxl-whatsapp-square'></i></a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty( Egns_Helpers::turio_theme_options('top_bar_social_pinterest'))) : ?>
                            <li>
                                <a href="<?php echo esc_url( Egns_Helpers::turio_theme_options('top_bar_social_pinterest')); ?>"><i class='bx bxl-pinterest'></i></a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty( Egns_Helpers::turio_theme_options('top_bar_social_flickr'))) : ?>
                            <li>
                                <a href="<?php echo esc_url( Egns_Helpers::turio_theme_options('top_bar_social_flickr')); ?>"><i class='bx bxl-flickr'></i></a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty( Egns_Helpers::turio_theme_options('top_bar_social_dribbble'))) : ?>
                            <li>
                                <a href="<?php echo esc_url( Egns_Helpers::turio_theme_options('top_bar_social_dribbble')); ?>"><i class='bx bxl-dribbble'></i></a>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty( Egns_Helpers::turio_theme_options('top_bar_social_vimeo'))) : ?>
                            <li>
                                <a href="<?php echo esc_url( Egns_Helpers::turio_theme_options('top_bar_social_vimeo')); ?>"><i class='bx bxl-vimeo'></i></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
