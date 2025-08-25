


<?php

$turio_theme_options = get_option('turio_theme_options');

$page_sticky_option = Egns_Helpers::turio_page_option_value('sticky_menu_option');


?>









<header class="hh header  head-one header-transparent sticky-header">
    <div class="header-area header-style-one newes">
        <div class="container-fluid">
            <div class="row">
                <div class="align-items-center justify-content-between d-xl-flex d-lg-block">
                    <div class="nav-logo d-flex justify-content-between align-items-center">
                        <?php
                            if( !empty( Egns_Helpers::turio_page_option_value('header_three_logo','url') ) ) {
                                Egns_Helpers::turio_get_theme_logo( Egns_Helpers::turio_page_option_value('header_three_logo','url') );
                            }else{
                                if ( !empty( Egns_Helpers::get_theme_option('header_logo','url') ) ) {
                                    Egns_Helpers::turio_get_theme_logo( Egns_Helpers::get_theme_option('header_logo','url') );
                                } else {
                                    Egns_Helpers::turio_get_theme_logo(NULL);
                                }
                            }

                        ?>
                        <div class="d-flex align-items-center gap-4">
                            <div class="nav-right d-xl-none">
                                <ul class="nav-actions">
                                    <?php
                                        $turio_header_category_enable = Egns_Helpers::get_theme_option('header_category_enable');
                                        $category_button = Egns_Helpers::turio_page_option_value('enable_category_button');

                                    if ( Egns_Helpers::turio_is_enabled($turio_header_category_enable, $category_button) && class_exists('CSF') ) {
                                    ?>
                                        <li class="category-toggle">
                                            <i class='bx bx-category'></i>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                    <?php if ( ( isset($turio_theme_options['header_search_enable_three']) == 1 ) && class_exists('CSF')){?>
                                        <li class="search-toggle">
                                            <i class='bx bx-search-alt'></i>
                                        </li>
                                    <?php 
                                    }
                                      ?>
                                </ul>
                            </div>
                            <div class="mobile-menu d-flex ">
                                <a href="javascript:void(0)" class="hamburger d-block d-xl-none">
                                    <span class="h-top"></span>
                                    <span class="h-middle"></span>
                                    <span class="h-bottom"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <nav class="main-nav float-end">
                        <div class="inner-logo d-xl-none">
                            <?php
                            if( !empty( Egns_Helpers::turio_page_option_value('header_three_logo_mobile','url') ) ) {
                                Egns_Helpers::turio_get_theme_logo( Egns_Helpers::turio_page_option_value('header_three_logo_mobile','url') );
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
                            <?php if( !empty($turio_theme_options['top_bar_phone_number_text']) ) : ?>
                                <div class="contact-box-inner"><i class='bi bi-telephone-fill'></i><a href="tel:<?php echo esc_html($turio_theme_options['top_bar_phone_number_text'] ) ?>"><?php echo esc_html($turio_theme_options['top_bar_phone_number_text'] ) ?></a></div>
                                <?php endif ?>
                            <?php if (!empty($turio_theme_options['top_bar_email_address'])) : ?>
                                <div class="contact-box-inner"><i class='bi bi-envelope-fill'></i><a href="mailto:<?php echo esc_html($turio_theme_options['top_bar_email_address']); ?>"><?php echo esc_html($turio_theme_options['top_bar_email_address']); ?></a></div>
                            <?php endif; ?>
                        </div>
                    </nav>
                    <?php 
                        if( class_exists('CSF') ){
                            ?>
                            <div class="nav-right float-end d-xl-flex d-none ">
                                <?php if (Egns_Helpers::turio_theme_options('header_hotline_enable_three') == 1) : ?>
                                <div class="nav-right-hotline d-xxl-flex align-items-center d-none">
                                    <div class="hotline-icon hoticon">
                                       <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20.5483 16.106C20.016 15.5518 19.374 15.2554 18.6936 15.2554C18.0186 15.2554 17.3711 15.5463 16.8168 16.1005L15.0828 17.8291C14.9401 17.7522 14.7974 17.6809 14.6603 17.6096C14.4627 17.5108 14.2761 17.4175 14.117 17.3187C12.4927 16.2871 11.0166 14.9426 9.60081 13.2031C8.91487 12.3361 8.45393 11.6063 8.11919 10.8655C8.56916 10.4539 8.98621 10.0259 9.39228 9.61431C9.54593 9.46066 9.69958 9.30152 9.85323 9.14787C11.0056 7.9955 11.0056 6.50291 9.85323 5.35054L8.35515 3.85246C8.18504 3.68234 8.00944 3.50674 7.84482 3.33115C7.51557 2.99092 7.16986 2.63972 6.81317 2.31047C6.28088 1.78368 5.64434 1.50381 4.97486 1.50381C4.30539 1.50381 3.65787 1.78368 3.10912 2.31047C3.10364 2.31596 3.10364 2.31596 3.09815 2.32145L1.23241 4.20365C0.530009 4.90605 0.129423 5.7621 0.0416231 6.75533C-0.0900763 8.35768 0.381847 9.85027 0.74402 10.827C1.63299 13.2251 2.96096 15.4475 4.94194 17.8291C7.34546 20.699 10.2374 22.9653 13.5408 24.5622C14.8029 25.1603 16.4876 25.8682 18.3698 25.9889C18.485 25.9944 18.6058 25.9999 18.7155 25.9999C19.9831 25.9999 21.0477 25.5445 21.8818 24.639C21.8873 24.6281 21.8982 24.6226 21.9037 24.6116C22.1891 24.2659 22.5183 23.9531 22.864 23.6184C23.1 23.3934 23.3414 23.1574 23.5774 22.9105C24.1207 22.3453 24.406 21.6868 24.406 21.0118C24.406 20.3314 24.1152 19.6783 23.5609 19.1296L20.5483 16.106Z" fill="white"/>
                                        <path d="M14.0512 6.18495C15.4889 6.4264 16.7949 7.10685 17.8375 8.14947C18.8802 9.19209 19.5551 10.4981 19.8021 11.9358C19.8624 12.298 20.1752 12.5504 20.5319 12.5504C20.5758 12.5504 20.6142 12.5449 20.6581 12.5395C21.0642 12.4736 21.3331 12.0895 21.2672 11.6834C20.9709 9.94387 20.1478 8.35799 18.8911 7.10136C17.6345 5.84473 16.0486 5.0216 14.3091 4.72528C13.903 4.65943 13.5244 4.92832 13.4531 5.3289C13.3817 5.72949 13.6451 6.1191 14.0512 6.18495Z" fill="white"/>
                                        <path d="M25.9702 11.4691C25.4818 8.60468 24.1319 5.99813 22.0576 3.92387C19.9833 1.8496 17.3768 0.49968 14.5123 0.011294C14.1117 -0.0600432 13.7331 0.214331 13.6618 0.614917C13.5959 1.02099 13.8648 1.39963 14.2709 1.47096C16.828 1.90447 19.1602 3.11721 21.015 4.96649C22.8698 6.82125 24.077 9.15343 24.5105 11.7106C24.5709 12.0728 24.8837 12.3252 25.2403 12.3252C25.2842 12.3252 25.3227 12.3197 25.3666 12.3142C25.7671 12.2539 26.0415 11.8697 25.9702 11.4691Z" fill="white"/>
                                        </svg>
                                    </div>
                                <div class="hotline-info">
                                    <?php if( !empty( $turio_theme_options['header_hotline_text_three']) ) : ?>
                                        <span><?php echo esc_html($turio_theme_options['header_hotline_text_three'] ) ?></span>
                                    <?php endif ?>
                                    <?php if( !empty($turio_theme_options['header_hotline_number_three']) ) : ?>
                                        <h6><a href="tel:<?php echo esc_html($turio_theme_options['header_hotline_number_three'] ) ?>"><?php echo esc_html($turio_theme_options['header_hotline_number_three'] ) ?></a></h6>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif ?>
                                <ul class="nav-actions">
                                    <?php
                                  
                                    ?>
                                     <?php if( ( Egns_Helpers::get_theme_option('header_category_enable_three') == 1 ) && class_exists('CSF') ) :  ?>
                                        <li class="category-toggle">
                                            <i class='bx bx-category'></i>
                                        </li>
                                    <?php endif;?>
                               
                                    <?php
                                    $turio_header_search_enable = Egns_Helpers::get_theme_option('header_search_enable');
                                    $search_button = Egns_Helpers::turio_page_option_value('enable_search_button');
                                    ?>
                                    <?php if( ( Egns_Helpers::get_theme_option('header_search_enable_three') == 1 ) && class_exists('CSF') ) :  ?>
                                        <li class="search-toggle">
                                            <i class='bx bx-search-alt'></i>
                                        </li>
                                     <?php endif ?>
                                </ul>
                            </div>
                            <?php 
                        }
                    
                    
                    ?>

                </div>
            </div>
        </div>
    </div>
</header>