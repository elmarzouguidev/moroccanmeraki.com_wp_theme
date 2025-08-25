<?php
if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}
function turioCustomStyling()
{
    $custom_style    = '';
    $turio_theme_options = get_option('turio_theme_options');

    //Top bar style
    $top_bar_bg_color = Egns_Helpers::get_theme_option('top_bar_background_color');
    $top_bar_phone_number_text_color = Egns_Helpers::get_theme_option('top_bar_phone_number_text_color');
    $top_bar_email_address_color = Egns_Helpers::get_theme_option('top_bar_email_address_color');
    $top_bar_button_color = Egns_Helpers::get_theme_option('top_bar_button_color');
    $top_bar_button_background_color = Egns_Helpers::get_theme_option('top_bar_button_background_color');
    $top_bar_social_media_icon_color = Egns_Helpers::get_theme_option('top_bar_social_media_icon_color');

    //Breadcrumb Style
    $breadcrumb_bg_img = Egns_Helpers::get_theme_option('breadcrumb_bg');
    $breadcrumb_enable = Egns_Helpers::get_theme_option('breadcrumb_enable');
    $breadcrumb_title_typography = Egns_Helpers::get_theme_option('breadcrumb_title_typography');
    $breadcrumb_link_typography = Egns_Helpers::get_theme_option('breadcrumb_navigation_typography');

    //Footer Contact Area
    $footer_contact_typography = Egns_Helpers::get_theme_option('footer_contact_typography');
    $footer_contact_padding = Egns_Helpers::get_theme_option('footer_contact_padding');

    //Footer copyright area
    $footer_copyright_area_spacing = Egns_Helpers::get_theme_option('copyright_area_spacing');

    //Primary Color
    $primary_color = Egns_Helpers::get_theme_option('primary_color');

    //Blog Style
    $blog_single_post_title = Egns_Helpers::get_theme_option('blog_single_title_typography');
    $blog_single_post_description = Egns_Helpers::get_theme_option('blog_single_description_typography');
    $blog_post_title = Egns_Helpers::get_theme_option('blog_title_typography');



    if (!empty($turio_theme_options['blog_title_typography']['color'])) {
        $custom_style .= '.blog-card-xl .blog-details a.blog-title, .blog-card .blog-details a.blog-title{
            color: ' . $turio_theme_options['blog_title_typography']['color'] . ';
            font-size: ' . $turio_theme_options['blog_title_typography']['font-size'] . $turio_theme_options['blog_description_typography']['unit'] . ';
            line-height: ' . $turio_theme_options['blog_title_typography']['line-height'] . 'px;
            font-family: "' . $turio_theme_options['blog_title_typography']['font-family'] . '", sans-serif;
        }';
    }


    //Primary Color
    if (!empty($primary_color)) {
        $custom_style .= ':root{--c-primary:' . $primary_color . '}';
    }

    //Start Tob Bar Style  
    if (!empty($top_bar_bg_color)) {
        $custom_style .= '.topbar-area {background-color:' . $top_bar_bg_color . '}';
    }
    if (!empty($top_bar_phone_number_text_color)) {
        $custom_style .= '.topbar-area .topbar-contact-left .contact-list .phone-number{color:' . $top_bar_phone_number_text_color . '}';
    }
    if (!empty($top_bar_email_address_color)) {
        $custom_style .= '.topbar-area .topbar-contact-left .contact-list .email-address{color:' . $top_bar_email_address_color . '}';
    }
    if (!empty($top_bar_button_color)) {
        $custom_style .= '.topbar-area .topbar-ad a{color:' . $top_bar_button_color . '}';
    }
    if (!empty($top_bar_button_background_color)) {
        $custom_style .= '.topbar-area .topbar-ad a{background-color:' . $top_bar_button_background_color . '}';
    }
    if (!empty($top_bar_social_media_icon_color)) {
        $custom_style .= '.topbar-area .topbar-social-links li a i{color:' . $top_bar_social_media_icon_color . '}';
    }

    if (!empty($header_menu_typography)) {
        $custom_style .= 'header .header-style-one .main-nav-wrapper ul li a,header .header-style-one .main-nav-wrapper ul li ul.sub-menu > li a{
            color: ' . $header_menu_typography['color'] ? $header_menu_typography['color'] : '#162b32' . ';
            font-size: ' . $header_menu_typography['font-size'] . $header_menu_typography['unit'] . ';
            font-weight: ' . $header_menu_typography['font-weight'] . ';
            font-family: "' . $header_menu_typography['font-family'] . '", sans-serif;
        }';

        $custom_style .= 'header .header-style-two .main-nav-wrapper ul li a{
            color: ' . $header_menu_typography['color'] ? $header_menu_typography['color'] : '#162b32' . ';
            font-size: ' . $header_menu_typography['font-size'] . $header_menu_typography['unit'] . ';
            font-weight: ' . $header_menu_typography['font-weight'] . ';
            font-family: "' . $header_menu_typography['font-family'] . '", sans-serif;
        }';
    }
    if (!empty($header_padding)) {
        if ($header_padding['top']) {
            $custom_style .= 'header .header-style-one{padding-top:' . $header_padding['top'] . $header_padding['unit'] . '}';
            $custom_style .= 'header .header-style-two{padding-top:' . $header_padding['top'] . $header_padding['unit'] . '}';
        }
        if ($header_padding['bottom']) {
            $custom_style .= 'header .header-style-one{padding-bottom:' . $header_padding['bottom'] . $header_padding['unit'] . '}';
            $custom_style .= 'header .header-style-two{padding-bottom:' . $header_padding['bottom'] . $header_padding['unit'] . '}';
        }
    }

    //Body font
    if (!empty($body_font) && !empty($body_font['font-weight'])) {
        $custom_style .= 'body{
            font-family: ' . $body_font['font-family'] . ';
            font-weight: ' . $body_font['font-weight'] . ';
            font-size: ' . $body_font['font-size'] . $body_font['unit'] . ';
        
        }';
    }

    //Header font
    if (!empty($heading_font)) {
        $custom_style .= 'h1, h2, h3, h4, h5, h6{
            font-family: ' . $heading_font['font-family'] . ';
            font-weight: ' . $heading_font['font-weight'] . ';
        
        }';
    }

    //Breadcrumb Style 
    if ($breadcrumb_enable == 0) {
        $custom_style .= '.header-menu-area {
            background: ' . $primary_color . ';
        }';
    }

    if ($breadcrumb_enable == 1) {

        // Breadcrumb Title Default Value 
        if (empty($breadcrumb_title_typography['font-weight'])) {
            $breadcrumb_title_typography['font-weight'] = '700';
        }

        if (empty($breadcrumb_title_typography['font-size'])) {
            $breadcrumb_title_typography['font-size'] = '';
        }

        if (empty($breadcrumb_title_typography['unit'])) {
            $breadcrumb_title_typography['unit'] = '';
        }
        if (empty($breadcrumb_title_typography['font-family'])) {
            $breadcrumb_title_typography['font-family'] = 'montserrat';
        }

        // Breadcrumb Link Default Value 
        if (isset($breadcrumb_link_typography['font-weight'])) {
            if (empty($breadcrumb_link_typography['font-weight'])) {
                $breadcrumb_link_typography['font-weight'] = '700';
            }
        }


        $breadcrumb_link_typography_font_size    = $breadcrumb_link_typography['font-size'] ?? '';
        $breadcrumb_link_typography_unit         = $breadcrumb_link_typography['unit'] ?? '';
        $breadcrumb_link_typography_color        = $breadcrumb_link_typography['color'] ?? '';
        $breadcrumb_link_typography_font_family  = $breadcrumb_link_typography['font-family'] ?? '';


        if (isset($breadcrumb_bg_img['background-image']['url'])) {
            if (!empty($breadcrumb_bg_img['background-image']['url'])) {
                $custom_style .= '.breadcrumb-style-one,.woocommerce-products-header {
                    background-image:  url(' . $breadcrumb_bg_img['background-image']['url'] . ');
                    background-attachment: ' . $breadcrumb_bg_img['background-attachment'] . ';
                }';
            }
        }

        $custom_style .= '.breadcrumb  .breadcrumb-title {
            font-size: ' . $breadcrumb_title_typography['font-size'] . $breadcrumb_title_typography['unit'] . ';
            color: ' . $breadcrumb_title_typography['color'] . ';
            font-family: "' . $breadcrumb_title_typography['font-family'] . '", sans-serif;
        }';

        $custom_style .= '.breadcrumb-style-one .breadcrumb-items .breadcrumb-item{
            font-size: ' . $breadcrumb_link_typography_font_size . $breadcrumb_link_typography_unit . ';
            color: ' . $breadcrumb_link_typography_color . ';
            font-family: "' . $breadcrumb_link_typography_font_family . '", sans-serif;
        }';
    }

    //Blog Style 
    if (!empty($blog_single_post_title)) {

        if (empty($blog_single_post_title['font-weight'])) {
            $blog_single_post_title['font-weight'] = '500';
        }
        if (empty($blog_single_post_title['font-size'])) {
            $blog_single_post_title['font-size'] = '';
        }
        if (empty($blog_post_title['font-family'])) {
            $blog_post_title['font-family'] = '"Montserrat", sans-serif';
        }
        if (empty($blog_single_post_title['line-height'])) {
            $blog_single_post_title['line-height'] = '28';
        }


        $custom_style .= '.tour-package-details .header-bottom h2.pd-title{
            font-weight: ' . $blog_single_post_title['font-weight'] . ';
            font-size: ' . $blog_single_post_title['font-size'] . $blog_single_post_title['unit'] . ';
            line-height: ' . $blog_single_post_title['line-height'] . 'px;
            color: ' . $blog_single_post_title['color'] . ';
            font-family: "' . $blog_single_post_title['font-family'] . '", sans-serif;
        }';
    }

    if (!empty($blog_single_post_description)) {

        if (empty($blog_single_post_description['font-weight'])) {
            $blog_single_post_description['font-weight'] = '';
        }
        if (empty($blog_single_post_description['font-weight'])) {
            $blog_single_post_description['font-weight'] = '';
        }
        if (empty($blog_single_post_description['font-weight'])) {
            $blog_single_post_description['font-weight'] = '';
        }
        if (empty($blog_single_post_description['line-height'])) {
            $blog_single_post_description['line-height'] = '28';
        }

        $custom_style .= '.tour-package-details .package-details-tabs p, .blog-details-wrapper .blog-details .post-body p{
            font-weight: ' . $blog_single_post_description['font-weight'] . ';
            font-size: ' . $blog_single_post_description['font-size'] . $blog_single_post_description['unit'] . ';
            line-height: ' . $blog_single_post_description['line-height'] . 'px;
            color: ' . $blog_single_post_description['color'] . ';
            font-family: "' . $blog_single_post_description['font-family'] . '", sans-serif;
        }';
    }

    if (!empty($blog_post_title)) {

        if (empty($blog_post_title['font-weight'])) {
            $blog_post_title['font-weight'] = '';
        }
        if (empty($blog_post_title['font-size'])) {
            $blog_post_title['font-size'] = '';
        }
        if (empty($blog_post_title['font-family'])) {
            $blog_post_title['font-family'] = '';
        }

        if (!empty($blog_post_title['color'])) {
            $custom_style .= '.blog-card-xl .blog-details a.blog-title, .blog-card .blog-details a.blog-title{
                color: ' . $blog_post_title['color'] . ';
                font-size: ' . $blog_post_title['font-size'] . $turio_theme_options['blog_description_typography']['unit'] . ';
                line-height: ' . $blog_post_title['line-height'] . 'px;
                font-family: "' . $blog_post_title['font-family'] . '", sans-serif;
            }';
        }
    }


    //Footer Area
    if (!empty($footer_contact_typography)) {
        $custom_style .= '.footer-area .footer-contact-wrapper h5,.footer-area .footer-contact-wrapper a{
            font-weight: ' . $footer_contact_typography['font-style'] . ';
            font-size: ' . $footer_contact_typography['font-size'] . $footer_contact_typography['unit'] . ';
            line-height: ' . $footer_contact_typography['line-height'] . 'px;
            color: ' . $footer_contact_typography['color'] . ';
            font-family: "' . $footer_contact_typography['font-family'] . '", sans-serif;
        }';
    }
    if (!empty($footer_contact_padding)) {
        $custom_style .= '.footer-area .footer-contact-wrapper{padding-top:' . $footer_contact_padding['top'] . $footer_contact_padding['unit'] . '}';
        $custom_style .= '.footer-area .footer-contact-wrapper{padding-bottom:' . $footer_contact_padding['bottom'] . $footer_contact_padding['unit'] . '}';
    }

    //End Footer Area Style 
    $custom_css = Egns_Helpers::get_theme_option('custom_css');
    $custom_css_ipad = Egns_Helpers::get_theme_option('custom_css_ipad');
    $custom_css_tablet = Egns_Helpers::get_theme_option('custom_css_tablet');
    $custom_css_mobile = Egns_Helpers::get_theme_option('custom_css_mobile');


    //Custom Css
    if (!empty($custom_css)) {
        $custom_css .= $custom_css;
    }


    //CSS IPAD DEVICE
    if (!empty($custom_css_ipad)) {
        $custom_css .= "
                @media (min-width: 1024px) and (max-width: 1400px) {
                    " . $custom_css_ipad . "
                }
            ";
    }


    //CSS TABLET DEVICE
    if (!empty($custom_css_tablet)) {
        $custom_css .= "
                @media (min-width: 768px) and (max-width: 991px) {
                    " . $custom_css_tablet . "
                }
            ";
    }


    //CSS MOBILE DEVICE
    if (!empty($custom_css_mobile)) {
        $custom_css .= "
                @media only screen and (max-width: 767px) {
                    " . $custom_css_mobile . "
                }
            ";
    }


    // ----------------Header One -----------------------//

    $header_one_background_color = $turio_theme_options['header_one_style_section']['header_one_background_color'] ?? '';
    $header_one_menu_text_color = $turio_theme_options['header_one_style_section']['header_one_menu_text_color'] ?? '';
    $header_one_menu_hover_text_color = $turio_theme_options['header_one_style_section']['header_one_menu_hover_text_color'] ?? '';
    $header_one_menu_active_color = $turio_theme_options['header_one_style_section']['header_one_menu_active_color'] ?? '';
    $header_one_search_icon_color = $turio_theme_options['header_one_style_section']['header_one_search_icon_color'] ?? '';
    $header_one_search_icon_hover_color = $turio_theme_options['header_one_style_section']['header_one_search_icon_hover_baccolor'] ?? '';
    $header_one_sidebar_color = $turio_theme_options['header_one_style_section']['header_one_sidebar_icon_color'] ?? '';
    $header_one_sidebar_hov_back_color = $turio_theme_options['header_one_style_section']['header_one_sidebar_icon_back_color'] ?? '';
    $header_one_sub_menu_background_color = $turio_theme_options['header_one_style_section']['header_one_sub_menu_background_color'] ?? '';
    $header_one_sub_menu_text_color = $turio_theme_options['header_one_style_section']['header_one_sub_menu_text_color'] ?? '';
    $header_one_sub_menu_text_hover_color = $turio_theme_options['header_one_style_section']['header_one_sub_menu_hover_text_color'] ?? '';
    $header_one_sub_menu_text_bac_color = $turio_theme_options['header_one_style_section']['header_one_sub_menu_bac_color'] ?? '';


    // Sticky
    $header_one_background_sticky_color = $turio_theme_options['header_one_style_section']['header_one_background_color_s'] ?? '';
    $header_one_menu_text_sticky_color = $turio_theme_options['header_one_style_section']['header_one_menu_text_color_s'] ?? '';
    $header_one_menu_hover_text_sticky_color = $turio_theme_options['header_one_style_section']['header_one_menu_hover_text_color_s'] ?? '';
    $header_one_menu_hover_active_color_s = $turio_theme_options['header_one_style_section']['header_one_menu_active_color_s'] ?? '';
    $header_one_search_sticky_icon_color = $turio_theme_options['header_one_style_section']['header_one_search_icon_color_s'] ?? '';
    $header_one_sticky_sidebar_color = $turio_theme_options['header_one_style_section']['header_one_sidebar_icon_color_s'] ?? '';
    $header_one_sub_menu_background_color_s = $turio_theme_options['header_one_style_section']['header_one_sub_menu_background_color_s'] ?? '';
    $header_one_sub_menu_text_color_s = $turio_theme_options['header_one_style_section']['header_one_sub_menu_text_color_s'] ?? '';
    $header_one_sub_menu_text_hover_color_s = $turio_theme_options['header_one_style_section']['header_one_sub_menu_hover_text_color_s'] ?? '';
    $header_one_sub_menu_text_bac_color_s = $turio_theme_options['header_one_style_section']['header_one_sub_menu_bac_color_s'] ?? '';
    $header_one_search_icon_hover_color_s = $turio_theme_options['header_one_style_section']['header_one_search_icon_hover_baccolor_s'] ?? '';
    $header_one_sidebar_color_s = $turio_theme_options['header_one_style_section']['header_one_sidebar_icon_color_s'] ?? '';
    $header_one_sidebar_hov_back_color_s = $turio_theme_options['header_one_style_section']['header_one_sidebar_icon_back_color_s'] ?? '';




    if (!empty($header_one_background_color)) {
        $custom_style .= "
            .head-one {
                background-color: $header_one_background_color;
            }
        ";
    }

    if (!empty($header_one_background_sticky_color)) {
        $custom_style .= "
            .header-area.header-style-one.sticky {
                background-color:  $header_one_background_sticky_color;
            }
        ";
    }



    if (!empty($header_one_menu_text_color)) {
        $custom_style .= "
            header .header-style-one .main-nav-wrapper ul li a,header .header-style-one .main-nav-wrapper ul li ul.sub-menu > li a,header .header-style-one .main-nav-wrapper ul li.menu-item-has-children > i,header .header-style-one .main-nav-wrapper ul li ul.sub-menu > li i
            {
                color: $header_one_menu_text_color;
            }
        ";
    }
    if (!empty($header_one_menu_text_sticky_color)) {
        $custom_style .= "
            header .header-style-one.sticky .main-nav-wrapper ul li a,header .header-style-one.sticky .main-nav-wrapper ul li ul.sub-menu > li a,header .header-style-one.sticky .main-nav-wrapper ul li.menu-item-has-children > i,header .header-style-one.sticky .main-nav-wrapper ul li ul.sub-menu > li i {
                color: $header_one_menu_text_sticky_color
            }
        ";
    }

    if (!empty($header_one_menu_hover_text_color)) {
        $custom_style .= "
            header .header-style-one .main-nav-wrapper ul li a:hover,header .header-style-one .main-nav-wrapper ul li ul.sub-menu > li a:hover {
                color: $header_one_menu_hover_text_color;
            }
        ";
    }



    if (!empty($header_one_menu_hover_text_sticky_color)) {
        $custom_style .= "
            header .header-style-one.sticky .main-nav-wrapper ul li a:hover,header .header-style-one.sticky .main-nav-wrapper ul li ul.sub-menu > li a:hover {
                color: $header_one_menu_hover_text_sticky_color
            }
        ";
    }

    if (!empty($header_one_menu_active_color)) {
        $custom_style .= "
            header .header-style-one .main-nav-wrapper > ul > li > a.active,header .header-style-one .main-nav-wrapper ul li ul.sub-menu > li a.active {
                color: $header_one_menu_active_color
            }
        ";
    }






    // ------------------Submenu one-----------------------//

    if (!empty($header_one_sub_menu_background_color)) {
        $custom_style .= "
            header .header-style-one .main-nav-wrapper ul li .sub-menu  {
                background: $header_one_sub_menu_background_color;
            }
        ";
    }

    if (!empty($header_one_sub_menu_text_color)) {
        $custom_style .= "
           header .header-style-one .main-nav-wrapper ul li ul.sub-menu > li a {
                color: $header_one_sub_menu_text_color;
            }
        ";
    }
    if (!empty($header_one_sub_menu_text_hover_color)) {
        $custom_style .= "
             header .header-style-one .main-nav-wrapper ul li ul.sub-menu > li a:hover {
                color:  $header_one_sub_menu_text_hover_color
            }
        ";
    }

    if (!empty($header_one_sub_menu_text_bac_color)) {
        $custom_style .= "
           header .header-style-one .main-nav-wrapper ul li ul.sub-menu > li:hover  {
                background: $header_one_sub_menu_text_bac_color;
            }
        ";
    }





    if (!empty($header_one_sub_menu_background_color_s)) {
        $custom_style .= "
            header .header-style-one.sticky .main-nav-wrapper ul li .sub-menu  {
                background: $header_one_sub_menu_background_color_s;
            }
        ";
    }

    if (!empty($header_one_sub_menu_text_color_s)) {
        $custom_style .= "
           header .header-style-one.sticky .main-nav-wrapper ul li ul.sub-menu > li a {
                color: $header_one_sub_menu_text_color_s;
            }
        ";
    }
    if (!empty($header_one_sub_menu_text_hover_color_s)) {
        $custom_style .= "
             header .header-style-one.sticky .main-nav-wrapper ul li ul.sub-menu > li a:hover {
                color:  $header_one_sub_menu_text_hover_color_s
            }
        ";
    }

    if (!empty($header_one_sub_menu_text_bac_color_s)) {
        $custom_style .= "
           header .header-style-one.sticky .main-nav-wrapper ul li ul.sub-menu > li:hover  {
                background: $header_one_sub_menu_text_bac_color_s;
            }
        ";
    }



    // ------------------Submenu End -------------------//




    // Search Area 

    if (!empty($header_one_search_icon_color)) {
        $custom_style .= "
            header .header-style-one .nav-right .nav-actions li i.bx.bx-search-alt{
                color: $header_one_search_icon_color;
            }

        ";
    }






    if (!empty($header_one_search_sticky_icon_color)) {
        $custom_style .= "
            header .header-style-one.sticky .nav-right .nav-actions li i.bx.bx-search-alt{
                color:  $header_one_search_sticky_icon_color
            }

        ";
    }

    if (!empty($header_one_search_icon_hover_color)) {
        $custom_style .= "
           header .header-style-one .nav-right .nav-actions li i.bx.bx-search-alt:hover{
                background: $header_one_search_icon_hover_color
            }

        ";
    }
    if (!empty($header_one_search_icon_hover_color_s)) {
        $custom_style .= "
           header .header-style-one.sticky .nav-right .nav-actions li i.bx.bx-search-alt:hover{
                background: $header_one_search_icon_hover_color_s
            }

        ";
    }

    // Header Sidebar Area

    if (!empty($header_one_sidebar_color)) {
        $custom_style .= "
        header .header-style-one .nav-right .nav-actions li i.bx.bx-category {
            color: $header_one_sidebar_color
        }
    ";
    }
    if (!empty($header_one_sidebar_color_s)) {
        $custom_style .= "
        header .header-style-one.sticky .nav-right .nav-actions li i.bx.bx-category {
            color:$header_one_sidebar_color_s
        }
    ";
    }

    if (!empty($header_one_sidebar_hov_back_color)) {
        $custom_style .= "
        header .header-style-one .nav-right .nav-actions li i.bx.bx-category:hover {
            background: $header_one_sidebar_hov_back_color
        }
    ";
    }
    if (!empty($header_one_sidebar_hov_back_color_s)) {
        $custom_style .= "
        header .header-style-one.sticky .nav-right .nav-actions li i.bx.bx-category:hover {
            background: $header_one_sidebar_hov_back_color_s
        }
    ";
    }





    // Header Style Two 

    $header_two_background_color = $turio_theme_options['header_two_style_section']['header_two_background_color'] ?? '';
    $header_two_menu_text_color = $turio_theme_options['header_two_style_section']['header_two_menu_text_color'] ?? '';
    $header_two_menu_hover_text_color = $turio_theme_options['header_two_style_section']['header_two_menu_hover_text_color'] ?? '';
    $header_two_sub_menu_background_color = $turio_theme_options['header_two_style_section']['header_two_sub_menu_background_color'] ?? '';
    $header_two_sub_menu_text_color = $turio_theme_options['header_two_style_section']['header_two_sub_menu_text_color'] ?? '';
    $header_two_sub_menu_text_hover_color = $turio_theme_options['header_two_style_section']['header_two_sub_menu_hover_text_color'] ?? '';
    $header_two_btn_hover_text_color = $turio_theme_options['header_two_style_section']['header_two_button_text_color_hover'] ?? '';

    $header_two_menu_hover_text_bac =  $turio_theme_options['header_two_style_section']['header_two_sub_menu_hover_text_background_color'] ?? '';

    // Sticky

    $header_two_background_color_s = $turio_theme_options['header_two_style_section']['header_two_background_color_s'] ?? '';
    $header_two_menu_text_color_s = $turio_theme_options['header_two_style_section']['header_two_menu_text_color_s'] ?? '';
    $header_two_menu_hover_text_color_s = $turio_theme_options['header_two_style_section']['header_two_menu_hover_text_color_s'] ?? '';
    $header_two_sub_menu_background_color_s = $turio_theme_options['header_two_style_section']['header_two_sub_menu_background_color_s'] ?? '';
    $header_two_sub_menu_text_color_s = $turio_theme_options['header_two_style_section']['header_two_sub_menu_text_color_s'] ?? '';
    $header_two_sub_menu_text_hover_color_s = $turio_theme_options['header_two_style_section']['header_two_sub_menu_hover_text_color_s'] ?? '';
    $header_two_btn_hover_text_color_s = $turio_theme_options['header_two_style_section']['header_two_button_text_color_hover_s'] ?? '';

    $header_two_menu_hover_text_bac_s =  $turio_theme_options['header_two_style_section']['header_two_sub_menu_hover_text_background_color_s'] ?? '';


    if (!empty($header_two_background_color)) {
        $custom_style .= "
            header .header-style-two {
                background: $header_two_background_color;
            }
        ";
    }
    if (!empty($header_two_background_color_s)) {
        $custom_style .= "
             header .header-style-two.sticky {
                background-color: $header_two_background_color_s;
            }
        ";
    }



    if (!empty($header_two_menu_text_color)) {
        $custom_style .= "
            header .header-style-two .main-nav-wrapper ul li a,header .header-style-two .main-nav-wrapper ul li ul.sub-menu > li a,header .header-style-two .main-nav-wrapper ul li.menu-item-has-children > i,header .header-style-two .main-nav-wrapper ul li ul.sub-menu  > li i
            {
                color: $header_two_menu_text_color;
            }
        ";
    }
    if (!empty($header_two_menu_text_color_s)) {
        $custom_style .= "
            header .header-style-two.sticky .main-nav-wrapper ul li a,header .header-style-two.sticky .main-nav-wrapper ul li ul.sub-menu > li a,header .header-style-two.sticky .main-nav-wrapper ul li.menu-item-has-children > i,header .header-style-two.sticky .main-nav-wrapper ul li ul.sub-menu  > li i
            {
                color: $header_two_menu_text_color;
            }
        ";
    }

    if (!empty($header_two_menu_hover_text_color)) {
        $custom_style .= "
            header .header-style-two .main-nav-wrapper ul > li a:hover,header .header-style-two .main-nav-wrapper ul li ul.sub-menu > li a:hover {
                color: $header_two_menu_hover_text_color;
            }
        ";
    }
    if (!empty($header_two_menu_hover_text_color_s)) {
        $custom_style .= "
            header .header-style-two.sticky .main-nav-wrapper ul > li a:hover,header .header-style-two.sticky .main-nav-wrapper ul li ul.sub-menu > li a:hover {
                color: $header_two_menu_hover_text_color;
            }
        ";
    }



    // ------------------Submenu two-----------------------//

    if (!empty($header_two_sub_menu_background_color)) {
        $custom_style .= "
            header .header-style-two .main-nav-wrapper ul li .sub-menu  {
                background: $header_two_sub_menu_background_color
            }
        ";
    }
    if (!empty($header_two_sub_menu_text_color)) {
        $custom_style .= "
            header .header-style-two .main-nav-wrapper ul li ul.sub-menu > li a {
                color: $header_two_sub_menu_text_color
            }
        ";
    }
    if (!empty($header_two_sub_menu_text_hover_color)) {
        $custom_style .= "
           header .header-style-two .main-nav-wrapper ul li ul.sub-menu > li:hover > a {
                color: $header_two_sub_menu_text_hover_color
            }
        ";
    }
    if (!empty($header_two_menu_hover_text_bac)) {
        $custom_style .= "
           header .header-style-two .main-nav-wrapper ul li ul.sub-menu > li:hover {
                background: $header_two_menu_hover_text_bac
            }
        ";
    }







    if (!empty($header_two_sub_menu_background_color_s)) {
        $custom_style .= "
            header .header-style-two.sticky .main-nav-wrapper ul li .sub-menu  {
                background: $header_two_sub_menu_background_color_s
            }
        ";
    }
    if (!empty($header_two_sub_menu_text_color_s)) {
        $custom_style .= "
            header .header-style-two.sticky .main-nav-wrapper ul li ul.sub-menu > li a {
                color: $header_two_sub_menu_text_color_s
            }
        ";
    }
    if (!empty($header_two_sub_menu_text_hover_color_s)) {
        $custom_style .= "
           header .header-style-two.sticky .main-nav-wrapper ul li ul.sub-menu > li:hover > a {
                color: $header_two_sub_menu_text_hover_color_s
            }
        ";
    }
    if (!empty($header_two_menu_hover_text_bac_s)) {
        $custom_style .= "
           header .header-style-two.sticky .main-nav-wrapper ul li ul.sub-menu > li:hover {
                background: $header_two_menu_hover_text_bac_s
            }
        ";
    }

    // ------------------Submenu End -------------------//





    // Header Sidebar Area

    $header_two_sidebar_icon_color = $turio_theme_options['header_two_style_section']['header_two_sidebar_icon_color'] ?? '';

    if (!empty($header_two_sidebar_icon_color)) {
        $custom_style .= "
        header .header-style-two .nav-right-icons div i {
            color: $header_two_sidebar_icon_color;
        }
    ";
    }
    $header_two_sidebar_icon_color_s = $turio_theme_options['header_two_style_section']['header_two_sidebar_icon_color_s'] ?? '';

    if (!empty($header_two_sidebar_icon_color_s)) {
        $custom_style .= "
        header .header-style-two.sticky .nav-right-icons div i {
            color: $header_two_sidebar_icon_color_s;
        }
    ";
    }

    // Hotline Area

    $header_two_hotline_icon_color = $turio_theme_options['header_two_style_section']['header_two_hotline_icon_color'] ?? '';
    $header_two_hotline_text_color = $turio_theme_options['header_two_style_section']['header_two_hotline_text_color'] ?? '';

    $header_two_hotline_icon_color_s = $turio_theme_options['header_two_style_section']['header_two_hotline_icon_color_s'] ?? '';
    $header_two_hotline_text_color_s = $turio_theme_options['header_two_style_section']['header_two_hotline_text_color_s'] ?? '';

    if (!empty($header_two_hotline_icon_color)) {
        $custom_style .= "
        header .header-style-two .nav-right .nav-right-hotline .hotline-icon i {
            color: $header_two_hotline_icon_color
        }
    ";
    }
    if (!empty($header_two_hotline_text_color)) {
        $custom_style .= "
        header .header-style-two .nav-right .nav-right-hotline .hotline-info span,header .header-style-two .nav-right .nav-right-hotline .hotline-info h6 {
            color: $header_two_hotline_text_color
        }
    ";
    }
    if (!empty($header_two_hotline_icon_color_s)) {
        $custom_style .= "
        header .header-style-two.sticky .nav-right .nav-right-hotline .hotline-icon i {
            color: $header_two_hotline_icon_color_s
        }
    ";
    }
    if (!empty($header_two_hotline_text_color_s)) {
        $custom_style .= "
        header .header-style-two.sticky .nav-right .nav-right-hotline .hotline-info span,header .header-style-two .nav-right .nav-right-hotline .hotline-info h6 {
            color: $header_two_hotline_text_color_s
        }
    ";
    }



    // Header Style Three 

    $header_three_background_color = $turio_theme_options['header_three_style_section']['header_three_background_color'] ?? '';
    $header_three_menu_text_color = $turio_theme_options['header_three_style_section']['header_three_menu_text_color'] ?? '';
    $header_three_menu_hover_text_color = $turio_theme_options['header_three_style_section']['header_three_menu_hover_text_color'] ?? '';
    $header_three_sub_menu_background_color = $turio_theme_options['header_three_style_section']['header_three_sub_menu_background_color'] ?? '';
    $header_three_sub_menu_text_color = $turio_theme_options['header_three_style_section']['header_three_sub_menu_text_color'] ?? '';
    $header_three_sub_menu_text_hover_color = $turio_theme_options['header_three_style_section']['header_three_sub_menu_hover_text_color'] ?? '';
    $header_three_btn_text_hover_color = $turio_theme_options['header_three_style_section']['header_three_button_text_color_hover'] ?? '';

    $header_three_btn_text_hover_background_color = $turio_theme_options['header_three_style_section']['header_three_sub_menu_hover_text_background_color'] ?? '';

    // Sticky

    $header_three_background_color_s = $turio_theme_options['header_three_style_section']['header_three_background_color_s'] ?? '';
    $header_three_menu_text_color_s = $turio_theme_options['header_three_style_section']['header_three_menu_text_color_s'] ?? '';
    $header_three_menu_hover_text_color_s = $turio_theme_options['header_three_style_section']['header_three_menu_hover_text_color_s'] ?? '';
    $header_three_sub_menu_background_color_s = $turio_theme_options['header_three_style_section']['header_three_sub_menu_background_color_s'] ?? '';
    $header_three_sub_menu_text_color_s = $turio_theme_options['header_three_style_section']['header_three_sub_menu_text_color_s'] ?? '';
    $header_three_sub_menu_text_hover_color_s = $turio_theme_options['header_three_style_section']['header_three_sub_menu_hover_text_color_s'] ?? '';
    $header_three_btn_text_hover_color_s = $turio_theme_options['header_three_style_section']['header_three_button_text_color_hover_s'] ?? '';

    $header_three_btn_text_hover_background_color_s = $turio_theme_options['header_three_style_section']['header_three_sub_menu_hover_text_background_color_s'] ?? '';



    if (!empty($header_three_background_color)) {
        $custom_style .= "
            .hh .header-area.header-style-one {
                background: $header_three_background_color;
            }
        ";
    }
    if (!empty($header_three_background_color_s)) {
        $custom_style .= "
            .hh.header .header-area.header-style-one.sticky {
                background-color: $header_three_background_color_s;
            }
        ";
    }



    if (!empty($header_three_menu_text_color)) {
        $custom_style .= "
            .hh.header .header-style-one .main-nav ul li a,.hh.header .header-style-one .main-nav ul li ul.sub-menu > li a,.hh.header .header-style-one .main-nav ul li.menu-item-has-children > i,.hh.header .header-style-one .main-nav ul li ul.sub-menu > li i
            {
                color: $header_three_menu_text_color;
            }
        ";
    }
    if (!empty($header_three_menu_text_color_s)) {
        $custom_style .= "
           hh.header .header-style-one.sticky .main-nav ul li a,.hh.header .header-style-one.sticky .main-nav ul li ul.sub-menu > li a,.hh.header .header-style-one.sticky .main-nav ul li.menu-item-has-children > i,.hh.header .header-style-one.sticky .main-nav ul li ul.sub-menu > li i
            {
                color: $header_three_menu_text_color_s;
            }
        ";
    }

    if (!empty($header_three_menu_hover_text_color)) {
        $custom_style .= "
            .hh.header .header-style-one .main-nav ul > li a:hover,.hh.header .header-style-one .main-nav ul li ul.sub-menu > li a:hover
            {
                color: $header_three_menu_hover_text_color;
            }
        ";
    }
    if (!empty($header_three_menu_hover_text_color_s)) {
        $custom_style .= "
            hh.header .header-style-one.sticky .main-nav ul > li a:hover,.hh.header .header-style-one.sticky .main-nav ul li ul.sub-menu > li a:hover
            {
                color: $header_three_menu_hover_text_color_s;
            }
        ";
    }





    // ------------------Submenu three-----------------------//

    if (!empty($header_three_sub_menu_background_color)) {
        $custom_style .= "
            .hh.header .header-style-one .main-nav ul li .sub-menu  {
                background: $header_three_sub_menu_background_color
            }
        ";
    }
    if (!empty($header_three_sub_menu_text_color)) {
        $custom_style .= "
            .hh.header .header-style-one .main-nav ul li ul.sub-menu > li a {
                color: $header_three_sub_menu_text_color
            }
        ";
    }
    if (!empty($header_three_sub_menu_text_hover_color)) {
        $custom_style .= "
            .hh.header .header-style-one .main-nav ul li ul.sub-menu > li a:hover {
                color: $header_three_sub_menu_text_hover_color
            }
        ";
    }
    if (!empty($header_three_btn_text_hover_background_color)) {
        $custom_style .= "
            .hh.header .header-style-one .main-nav ul li ul.sub-menu > li a:hover {
                background:  $header_three_btn_text_hover_background_color
            }
        ";
    }




    if (!empty($header_three_sub_menu_background_color_s)) {
        $custom_style .= "
            .hh.header .header-style-one.sticky .main-nav ul li .sub-menu  {
                background: $header_three_sub_menu_background_color_s
            }
        ";
    }
    if (!empty($header_three_sub_menu_text_color_s)) {
        $custom_style .= "
            .hh.header .header-style-one.sticky .main-nav ul li ul.sub-menu > li a {
                color: $header_three_sub_menu_text_color_s
            }
        ";
    }
    if (!empty($header_three_sub_menu_text_hover_color_s)) {
        $custom_style .= "
            .hh.header .header-style-one.sticky .main-nav ul li ul.sub-menu > li a:hover {
                color: $header_three_sub_menu_text_hover_color_s
            }
        ";
    }
    if (!empty($header_three_btn_text_hover_background_color_s)) {
        $custom_style .= "
            .hh.header .header-style-one.sticky .main-nav ul li ul.sub-menu > li a:hover {
                background:  $header_three_btn_text_hover_background_color_s
            }
        ";
    }


    // ------------------Submenu End -------------------//



    // Search & Sidebar Area 

    $header_three_icon_color = $turio_theme_options['header_three_style_section']['header_three_icon_color'] ?? '';
    $header_three_icon_bac_color = $turio_theme_options['header_three_style_section']['header_three_icon_background_color'] ?? '';
    $header_three_icon_hover_color = $turio_theme_options['header_three_style_section']['header_three_icon_hover_color'] ?? '';
    $header_three_icon_hov_bac_color = $turio_theme_options['header_three_style_section']['header_three_icon_hover_background_color'] ?? '';
    $header_three_icon_hov_border_color = $turio_theme_options['header_three_style_section']['header_three_icon_hover_border_color'] ?? '';



    $header_three_icon_color_s = $turio_theme_options['header_three_style_section']['header_three_icon_color_s'] ?? '';
    $header_three_icon_bac_color_s = $turio_theme_options['header_three_style_section']['header_three_icon_background_color_s'] ?? '';
    $header_three_icon_hover_color_s = $turio_theme_options['header_three_style_section']['header_three_icon_hover_color_s'] ?? '';
    $header_three_icon_hov_bac_color_s = $turio_theme_options['header_three_style_section']['header_three_icon_hover_background_color_s'] ?? '';
    $header_three_icon_hov_border_color_s = $turio_theme_options['header_three_style_section']['header_three_icon_hover_border_color_s'] ?? '';

    if (!empty($header_three_icon_color)) {
        $custom_style .= "
            .hh.header .header-style-one .nav-right ul li i{
                color:  $header_three_icon_color
            }
        ";
    }
    if (!empty($header_three_icon_bac_color)) {
        $custom_style .= "
            .hh.header .header-style-one .nav-right ul li i{
                background: $header_three_icon_bac_color
            }
        ";
    }
    if (!empty($header_three_icon_hover_color)) {
        $custom_style .= "
            .hh.header .header-style-one .nav-right ul li i:hover{
                color:  $header_three_icon_hover_color
            }
        ";
    }
    if (!empty($header_three_icon_hov_bac_color)) {
        $custom_style .= "
            .hh.header .header-style-one .nav-right ul li i:hover{
                background: $header_three_icon_hov_bac_color
            }
        ";
    }

    if (!empty($header_three_icon_hov_border_color)) {
        $custom_style .= "
            .hh.header .header-style-one .nav-right ul li i:hover{
                border: 1px solid  $header_three_icon_hov_border_color;
            }
        ";
    }








    if (!empty($header_three_icon_color_s)) {
        $custom_style .= "
            .hh.header .header-style-one.sticky .nav-right ul li i{
                color:  $header_three_icon_color_s
            }
        ";
    }
    if (!empty($header_three_icon_bac_color_s)) {
        $custom_style .= "
            .hh.header .header-style-one.sticky .nav-right ul li i{
                background: $header_three_icon_bac_color_s
            }
        ";
    }
    if (!empty($header_three_icon_hover_color_s)) {
        $custom_style .= "
            .hh.header .header-style-one.sticky .nav-right ul li i:hover{
                color:  $header_three_icon_hover_color_s
            }
        ";
    }
    if (!empty($header_three_icon_hov_bac_color_s)) {
        $custom_style .= "
            .hh.header .header-style-one.sticky .nav-right ul li i:hover{
                background: $header_three_icon_hov_bac_color_s
            }
        ";
    }

    if (!empty($header_three_icon_hov_border_color_s)) {
        $custom_style .= "
            .hh.header .header-style-one.sticky .nav-right ul li i:hover{
                border: 1px solid  $header_three_icon_hov_border_color_s;
            }
        ";
    }



    // Hotline Header Area Three


    $header_three_hotline_icon_color = $turio_theme_options['header_three_style_section']['header_three_hotline_icon_color'] ?? '';
    $header_three_hotline_text_color = $turio_theme_options['header_three_style_section']['header_three_hotline_text_color'] ?? '';

    $header_three_hotline_icon_color_s = $turio_theme_options['header_three_style_section']['header_three_hotline_icon_color_s'] ?? '';
    $header_three_hotline_text_color_s = $turio_theme_options['header_three_style_section']['header_three_hotline_text_color_s'] ?? '';



    if (!empty($header_three_hotline_icon_color)) {
        $custom_style .= "
            .hoticon svg path{
                fill:  $header_three_hotline_icon_color
            }
        ";
    }

    if (!empty($header_three_hotline_text_color)) {
        $custom_style .= "
            .hh.header .header-style-one .nav-right .nav-right-hotline .hotline-info span, .hh.header .header-style-one .nav-right .nav-right-hotline .hotline-info h6 a{
                color:  $header_three_hotline_text_color
            }
        ";
    }

    if (!empty($header_three_hotline_icon_color_s)) {
        $custom_style .= "
            .hh.header .header-style-one.sticky .hotline-icon svg path{
                fill:  $header_three_hotline_icon_color_s
            }
        ";
    }

    if (!empty($header_three_hotline_text_color_s)) {
        $custom_style .= "
            .hh.header .header-style-one.sticky .nav-right .nav-right-hotline .hotline-info span, .hh.header .header-style-one.sticky .nav-right .nav-right-hotline .hotline-info h6 a{
                color:  $header_three_hotline_text_color_s
            }
        ";
    }



    wp_register_style('turio-stylesheet', false);
    wp_enqueue_style('turio-stylesheet', false);
    wp_add_inline_style('turio-stylesheet', $custom_style, true);
}
if (class_exists('CSF')) {
    add_action('wp_enqueue_scripts', 'turioCustomStyling');
}
