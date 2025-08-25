<?php
	/*-----------------------------------
		Top Bar Options
	------------------------------------*/

CSF::createSection( $prefix . '_theme_options', array(
    'parent' => 'header_options',
    'title'  => esc_html__( 'Top Bar Options', 'turio' ),
    'id'     => 'theme_top_bar_options',
    'icon'   => 'fa fa-id-card-o',
    'fields' => array(
        array(
            'type'    => 'subheading',
            'content' => '<h3>' . esc_html__( 'Top Bar Options', 'turio' ) . '</h3>'
        ),
        array(
            'id'      => 'top_bar_enable',
            'title'   => esc_html__( 'Top Bar Enable/Disable', 'turio' ),
            'type'    => 'switcher',
            'desc'    => wp_kses( __( 'you can set <mark>Yes / No</mark> to enable/disable topbar', 'turio' ), $allowed_html ),
            'default' => true,
        ),
        array(
            'id'      => 'top_bar_background_color',
            'title'   => esc_html__( 'Top Bar Background Color', 'turio' ),
            'type'    => 'color',
            'desc'    => wp_kses( __( 'you can set <mark>bacground color</mark> for top bar area', 'turio' ), $allowed_html ),
            'default' => '#2D373C',
            'dependency' => array( 'top_bar_enable', '==', 'true' )
        ),
        array(
            'id'      => 'top_bar_phone_number_text',
            'title'   => esc_html__( 'Phone Number', 'turio' ),
            'type'    => 'text',
            'desc'    => wp_kses( __( 'you can set <mark>phone number</mark> for top bar area', 'turio' ), $allowed_html ),
            'default' => esc_html( '+1 763-227-5032' ),
            'dependency' => array( 'top_bar_enable', '==', 'true' )
        ),
        array(
            'id'      => 'top_bar_phone_number_text_color',
            'title'   => esc_html__( 'Phone Number Color', 'turio' ),
            'type'    => 'color',
            'desc'    => wp_kses( __( 'you can set <mark>phone number color</mark> for top bar area', 'turio' ), $allowed_html ),
            'default' => '#fff',
            'dependency' => array( 'top_bar_enable', '==', 'true' )
        ),
        array(
            'id'      => 'top_bar_email_address',
            'title'   => esc_html__( 'Email Address', 'turio' ),
            'type'    => 'text',
            'desc'    => wp_kses( __( 'you can set <mark>email address</mark> for top bar area', 'turio' ), $allowed_html ),
            'default' => esc_html( 'info@example.com'),
            'dependency' => array( 'top_bar_enable', '==', 'true' )
        ),
        array(
            'id'      => 'top_bar_email_address_color',
            'title'   => esc_html__( 'Email Address Color', 'turio' ),
            'type'    => 'color',
            'desc'    => wp_kses( __( 'you can set <mark>email address color</mark> for top bar area', 'turio' ), $allowed_html ),
            'default' => '#fff',
            'dependency' => array( 'top_bar_enable', '==', 'true' )
        ),
        array(
            'id'      => 'top_bar_offer_text_enable',
            'title'   => esc_html__( 'Enable Promotion Title', 'turio' ),
            'type'    => 'switcher',
            'desc'    => wp_kses( __( 'you can set <mark>Yes / No</mark> to enable/disable preloader', 'turio' ), $allowed_html ),
            'default' => true,
            'dependency' => array( 'top_bar_enable', '==', 'true' )
        ),
        array(
            'id'      	 => 'top_bar_offer_text_link',
            'title'   	 => esc_html__( 'Enable Promotion Link', 'turio' ),
            'type'    	 => 'text',
            'desc'    	 => wp_kses( __( 'you can set <mark>link</mark> for top bar promotion title', 'turio' ), $allowed_html ),
            'default' 	 => esc_html( '#'),
            'dependency' => array('top_bar_enable|top_bar_offer_text_enable', '==|==', 'true|true')
        ),
        array(
            'id'      	 => 'top_bar_offer_text',
            'title'   	 => esc_html__( 'Enable Promotion Text', 'turio' ),
            'type'    	 => 'text',
            'desc'    	 => wp_kses( __( 'you can set <mark>text</mark> for top bar promotion title', 'turio' ), $allowed_html ),
            'default' 	 => esc_html__( 'Black Friday Big Offer', 'turio' ),
            'dependency' => array('top_bar_enable|top_bar_offer_text_enable', '==|==', 'true|true')
        ),
        array(
            'id'      => 'top_bar_button_color',
            'title'   => esc_html__( 'Button Text Color', 'turio' ),
            'type'    => 'color',
            'desc'    => wp_kses( __( 'you can set <mark>button color</mark> for top bar area', 'turio' ), $allowed_html ),
            'default' => '#fff',
            'dependency' => array('top_bar_enable|top_bar_offer_text_enable', '==|==', 'true|true')
        ),
        array(
            'id'      => 'top_bar_button_background_color',
            'title'   => esc_html__( 'Button Background Color', 'turio' ),
            'type'    => 'color',
            'desc'    => wp_kses( __( 'you can set <mark>button background color</mark> for top bar area', 'turio' ), $allowed_html ),
            'dependency' => array('top_bar_enable|top_bar_offer_text_enable', '==|==', 'true|true')
        ),
        array(
            'id'      => 'top_bar_social_media_icon_color',
            'title'   => esc_html__( 'Social Media Icon Color', 'turio' ),
            'type'    => 'color',
            'desc'    => wp_kses( __( 'you can set <mark>social media icon color</mark> for top bar area', 'turio' ), $allowed_html ),
            'dependency' => array( 'top_bar_enable', '==', 'true' )
        ),
        array(
            'id'      => 'top_bar_social_facebook',
            'title'   => esc_html__( 'Facebook', 'turio' ),
            'type'    => 'text',
            'desc'    => wp_kses( __( 'you can set <mark>facebbok icon</mark> for top bar area', 'turio' ), $allowed_html ),
            'default' => esc_html( 'https://www.facebook.com/' ),
            'dependency' => array( 'top_bar_enable', '==', 'true' )
        ),
        array(
            'id'      => 'top_bar_social_instagram',
            'title'   => esc_html__( 'Instagram', 'turio' ),
            'type'    => 'text',
            'desc'    => wp_kses( __( 'you can set <mark>instagram icon</mark> for top bar area', 'turio' ), $allowed_html ),
            'default' => esc_html( '' ),
            'dependency' => array( 'top_bar_enable', '==', 'true' )
        ),
        array(
            'id'      => 'top_bar_social_twitter',
            'title'   => esc_html__( 'Twitter', 'turio' ),
            'type'    => 'text',
            'desc'    => wp_kses( __( 'you can set <mark>twitter icon</mark> for top bar area', 'turio' ), $allowed_html ),
            'default' => esc_html( 'https://twitter.com/' ),
            'dependency' => array( 'top_bar_enable', '==', 'true' )
        ),
        array(
            'id'      => 'top_bar_social_youtube',
            'title'   => esc_html__( 'Youtube', 'turio' ),
            'type'    => 'text',
            'desc'    => wp_kses( __( 'you can set <mark>youtube icon</mark> for top bar area', 'turio' ), $allowed_html ),
            'default' => esc_html( 'https://youtube.com'),
            'dependency' => array( 'top_bar_enable', '==', 'true' )
        ),
        array(
            'id'      => 'top_bar_social_whatsapp',
            'title'   => esc_html__( 'Whatsapp', 'turio' ),
            'type'    => 'text',
            'desc'    => wp_kses( __( 'you can set <mark>whatsapp icon</mark> for top bar area', 'turio' ), $allowed_html ),
            'default' => esc_html( 'https://www.whatsapp.com/' ),
            'dependency' => array( 'top_bar_enable', '==', 'true' )
        ),
        array(
            'id'      => 'top_bar_social_pinterest',
            'title'   => esc_html__( 'Pinterest', 'turio' ),
            'type'    => 'text',
            'desc'    => wp_kses( __( 'you can set <mark>pinterest icon</mark> for top bar area', 'turio' ), $allowed_html ),
            'default' => esc_html( 'https://www.pinterest.com/' ),
            'dependency' => array( 'top_bar_enable', '==', 'true' )
        ),
        array(
            'id'      => 'top_bar_social_flickr',
            'title'   => esc_html__( 'Flickr', 'turio' ),
            'type'    => 'text',
            'desc'    => wp_kses( __( 'you can set <mark>flickr icon</mark> for top bar area', 'turio' ), $allowed_html ),
            'default' => esc_html( '' ),
            'dependency' => array( 'top_bar_enable', '==', 'true' )
        ),
        array(
            'id'      => 'top_bar_social_dribbble',
            'title'   => esc_html__( 'Dribbble', 'turio' ),
            'type'    => 'text',
            'desc'    => wp_kses( __( 'you can set <mark>dribbble icon</mark> for top bar area', 'turio' ), $allowed_html ),
            'default' => esc_html( ''),
            'dependency' => array( 'top_bar_enable', '==', 'true' )
        ),
        array(
            'id'      => 'top_bar_social_vimeo',
            'title'   => esc_html__( 'Vimeo', 'turio' ),
            'type'    => 'text',
            'desc'    => wp_kses( __( 'you can set <mark>vimeo icon</mark> for top bar area', 'turio' ), $allowed_html ),
            'default' => esc_html( '' ),
            'dependency' => array( 'top_bar_enable', '==', 'true' )
        ),
    )
) );