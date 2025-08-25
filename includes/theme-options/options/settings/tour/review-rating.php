<?php


/*-------------------------------------------------------
		   ** 404 page options
	--------------------------------------------------------*/
CSF::createSection($prefix . '_theme_options', array(
    'id'     => 'tour_rating',
    'title'  => esc_html__('Tour Rating', 'turio'),
    'icon'   => 'fa fa-newspaper-o',
    'fields' => array(
        array(
            'type'    => 'subheading',
            'content' => '<h3>' . esc_html__('Settings', 'turio') . '</h3>',
        ),
        array(
            'id'            => 'tour_rating_enable',
            'type'          => 'select',
            'title'         => esc_html__('Review & Rating Enable/Disable', 'turio'),
            'placeholder'   => 'Select an option',
            'options'       => array(
              'enable'          => esc_html__('Enable','turio'),
              'disable'         => esc_html__('Disable','turio'),
            ),
            'default'       => 'enable'
          ),          
        array(
            'id'            => 'tour_review_posts_per_page',
            'type'          => 'number',
            'title'         => esc_html( 'Posts Per Page' ),
            'default'       => 3,
            'dependency'    => array( 'tour_rating_enable', '==', 'enable' ),
        ),
        array(
            'id'            => 'tour_review_load_more_text',
            'type'          => 'text',
            'title'         => esc_html( 'Load More Text' ),
            'default'       => esc_html( 'Load More' ),
            'dependency'    => array( 'tour_rating_enable', '==', 'enable' ),
        ),
        array(
            'id'            => 'tour_review_heading',
            'type'          => 'text',
            'title'         => esc_html( 'Main Heading' ),
            'default'       => esc_html__( 'Customer Review', 'turio'  ),
            'dependency'    => array( 'tour_rating_enable', '==', 'enable' ),
        ),
        array(
            'id'            => 'tour_review_modal_banner',
            'type'          => 'media',
            'library'       => 'image',
            'title'         => esc_html( 'Modal Banner' ),
            'default'       => esc_html__( 'Customer Review', 'turio'  ),
            'dependency'    => array( 'tour_rating_enable', '==', 'enable' ),
        ),
        array(
            'type'          => 'subheading',
            'content'       => '<h3>' . esc_html__('Add Review criteria', 'turio') . '</h3>',
            'dependency'    => array( 'tour_rating_enable', '==', 'enable' ),
        ),
        array(
            'id'            => 'tour_review_title',
            'type'          => 'text',
            'title'         => esc_html( 'Review Title' ),
            'default'       => esc_html__( 'Write Your Review', 'turio'  ),
            'dependency'    => array( 'tour_rating_enable', '==', 'enable' ),
        ),
        array(
            'id'     => 'tour_criteria',
            'type'   => 'repeater',
            'max'    => 5,
            'title'  => esc_html__('Tour Criteria', 'turio'),
            'dependency'    => array( 'tour_rating_enable', '==', 'enable' ),
            'fields' => array(

                array(
                    'id'    => 'criteria_item',
                    'type'  => 'text',
                    'title' => esc_html__('Creiteria', 'turio'),
                    'default' => esc_html__('Overall', 'turio'),
                ),

            ),
            'default'   => array(
                array(
                    'criteria_item' => esc_html('Overall'),
                ),
                array(
                    'criteria_item' => esc_html('Accommodation'),
                ),
                array(
                    'criteria_item' => esc_html('Transport'),
                ),
                array(
                    'criteria_item' => esc_html('Food'),
                ),
                array(
                    'criteria_item' => esc_html('Destination'),
                ),
            )
        ),

    )
));
