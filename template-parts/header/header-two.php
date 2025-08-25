<?php

$turio_theme_options = get_option('turio_theme_options');

$page_sticky_option = Egns_Helpers::turio_page_option_value('sticky_menu_option');

$sticky_header = Egns_Helpers::turio_theme_options('header_sticky_enable');

if ($sticky_header == 1) {
    $sticky_class = 'sticky-header';
} else {
    $sticky_class = '';
}

if ($page_sticky_option == 1) {
    $sticky_class = 'sticky-header';
} else {
    $sticky_class = '';
}
?>



<header class="header sticky-header">
    <div class="header-area header-style-two">
        <div class="container-fluid">
            <div class="row">
                <div class="align-items-center justify-content-between d-xl-flex d-lg-block">
                    <nav class="main-nav">
                        <div class="inner-logo d-xl-none ">
                        <?php
                            if( !empty( Egns_Helpers::turio_page_option_value('header_two_logo_mobile','url') ) ) {
                                Egns_Helpers::turio_get_theme_logo( Egns_Helpers::turio_page_option_value('header_two_logo_mobile','url') );
                            }else{
                                if ( !empty( Egns_Helpers::get_theme_option('header_logo_mobile','url') ) ) {
                                    Egns_Helpers::turio_get_theme_logo( Egns_Helpers::get_theme_option('header_logo_mobile','url') );
                                } else {
                                    Egns_Helpers::turio_get_theme_logo(NULL);
                                }
                            }

                        ?>
                        </div>
                        <?php
                        Egns_Helpers::turio_get_theme_menu('primary-menu', 'main-nav-wrapper', '<i class="fl menu-plus">+</i>', 'ul', 4);
                        ?>
                        <div class="inner-contact-options d-xl-none">
                            <?php if (!empty(Egns_Helpers::turio_theme_options('top_bar_phone_number_text'))) : ?>
                                <div class="contact-box-inner"><i class="bi bi-telephone-fill"></i> <a href="tel:<?php echo esc_html(Egns_Helpers::turio_theme_options('top_bar_phone_number_text'), 'turio'); ?>"><?php echo esc_html(Egns_Helpers::turio_theme_options('top_bar_phone_number_text'), 'turio'); ?></a></div>
                            <?php endif; ?>
                            <?php if (!empty(Egns_Helpers::turio_theme_options('top_bar_email_address'))) : ?>
                                <div class="contact-box-inner"><i class="bi bi-envelope-fill"></i> <a href="mailto:<?php echo esc_html(Egns_Helpers::turio_theme_options('top_bar_email_address'), 'turio'); ?>"><?php echo esc_html(Egns_Helpers::turio_theme_options('top_bar_email_address'), 'turio'); ?></a>
                                <?php endif; ?>
                                </div>
                        </div>
                    </nav>
                    <div class="nav-logo d-flex justify-content-between align-items-center">
                         <?php
                            if( !empty( Egns_Helpers::turio_page_option_value('header_two_logo','url') ) ) {
                                Egns_Helpers::turio_get_theme_logo( Egns_Helpers::turio_page_option_value('header_two_logo','url') );
                            }else{
                                if ( !empty( Egns_Helpers::get_theme_option('header_logo','url') ) ) {
                                    Egns_Helpers::turio_get_theme_logo( Egns_Helpers::get_theme_option('header_logo','url') );
                                } else {
                                    Egns_Helpers::turio_get_theme_logo(NULL);
                                }
                            }

                        ?>
                        <div class="mobile-menu d-flex ">
                            <div class="d-flex align-items-center">
                                <?php
                                $turio_header_category_enable = Egns_Helpers::get_theme_option('header_category_enable');
                                $category_button = Egns_Helpers::turio_page_option_value('enable_category_button');

                                if (Egns_Helpers::turio_is_enabled($turio_header_category_enable, $category_button) && class_exists('CSF')) {
                                ?>
                                    <div class="nav-right-icons d-xl-none d-flex align-items-center ">
                                        <div class="category-toggle"><i class="bx bx-category"></i></div>
                                    </div>
                                <?php
                                }
                                ?>
                                <a href="javascript:void(0)" class="hamburger d-block d-xl-none">
                                    <span class="h-top"></span>
                                    <span class="h-middle"></span>
                                    <span class="h-bottom"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="nav-right d-xl-flex d-none">
                        <?php
                        $turio_header_category_enable = Egns_Helpers::get_theme_option('header_category_enable');
                        $category_button = Egns_Helpers::turio_page_option_value('enable_category_button');

                       
                        ?>
                         <?php if( ( Egns_Helpers::get_theme_option('header_category_enable_two') == 1 ) && class_exists('CSF') ) :  ?>
                            <div class="nav-right-icons">
                                <div class="category-toggle"><i class="bx bx-category"></i></div>
                            </div>
                        <?php endif;?>
                 
                        <?php if (Egns_Helpers::turio_theme_options('header_hotline_enable') == 1) : ?>
                            <div class="nav-right-hotline">
                                <div class="hotline-icon">
                                    <i class="bi bi-phone-vibrate"></i>
                                </div>
                                <div class="hotline-info">
                                    <?php if (!empty(Egns_Helpers::turio_theme_options('header_hotline_text'))) : ?>
                                        <span>
                                            <?php
                                            echo esc_html(Egns_Helpers::turio_theme_options('header_hotline_text'), 'turio');
                                            ?>
                                        </span>
                                    <?php endif ?>
                                    <?php if (!empty(Egns_Helpers::turio_theme_options('header_hotline_number'))) : ?>
                                        <h6>
                                            <a href="tel:<?php echo esc_html(Egns_Helpers::turio_theme_options('header_hotline_number'), 'turio'); ?>">
                                                <?php
                                                echo esc_html(Egns_Helpers::turio_theme_options('header_hotline_number'), 'turio');
                                                ?>
                                            </a>
                                        </h6>
                                    <?php
                                    endif
                                    ?>
                                </div>

                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>