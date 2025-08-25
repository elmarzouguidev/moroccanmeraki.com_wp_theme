<?php
$turio_theme_options = get_option('turio_theme_options');
$page_sticky_option = Egns_Helpers::turio_page_option_value('sticky_menu_option');

// $sticky_header = !empty($turio_theme_options['header_sticky_enable']) ? $turio_theme_options['header_sticky_enable'] : false;
$sticky_header = Egns_Helpers::get_theme_option('header_sticky_enable') ?? '';



?>

<header class="header head-one sticky-header">
    <div class="header-area header-style-one">
        <div class="container">
            <div class="row">
                <div class="align-items-center justify-content-between d-xl-flex d-lg-block">
                    <div class="nav-logo d-flex justify-content-between align-items-center">
          

                        <?php
                            if( !empty( Egns_Helpers::turio_page_option_value('header_one_logo','url') ) ) {
                                Egns_Helpers::turio_get_theme_logo( Egns_Helpers::turio_page_option_value('header_one_logo','url') );
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
                                    <?php if ( ( isset($turio_theme_options['header_search_enable_one']) == 1 ) && class_exists('CSF')){?>
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
                            if( !empty( Egns_Helpers::turio_page_option_value('header_one_logo_mobile','url') ) ) {
                                Egns_Helpers::turio_get_theme_logo( Egns_Helpers::turio_page_option_value('header_one_logo_mobile','url') );
                            }else{
                                if ( !empty( Egns_Helpers::get_theme_option('header_logo','url') ) ) {
                                    Egns_Helpers::turio_get_theme_logo( Egns_Helpers::get_theme_option('header_logo','url') );
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
                                <ul class="nav-actions">
                                
                                    <?php if( ( Egns_Helpers::get_theme_option('header_category_enable_one') == 1 ) && class_exists('CSF') ) :  ?>
                                        <li class="category-toggle">
                                            <i class='bx bx-category'></i>
                                        </li>
                                     <?php endif ?>
                             
                                    <?php
                                    $turio_header_search_enable = Egns_Helpers::get_theme_option('header_search_enable');
                                    $search_button = Egns_Helpers::turio_page_option_value('enable_search_button');
                                    ?>
                                    <?php if( ( Egns_Helpers::get_theme_option('header_search_enable_one') == 1 ) && class_exists('CSF') ) :  ?>
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