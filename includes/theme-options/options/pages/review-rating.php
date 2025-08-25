<?php

// Control core classes for avoid errors
if (class_exists('CSF')) {

    //Set a unique slug-like ID
    $prefix = 'tour_booking_review_rating';

    //Create a metabox
    CSF::createMetabox($prefix, array(
        'title'     => esc_html__('Review & Rating Meta','turio'),
        'post_type' => 'review-rating',
    ));

    //Create a section
    CSF::createSection($prefix, array(
        'title'  => esc_html__('Review & Rating Data','turio'),
        'fields' => array(
            array(
                'id'         => 'review_status',
                'type'       => 'select',
                'title'      => esc_html( 'Review Status' ),
                'options'    => array(
                  'approve'  => esc_html__('Approve','turio'),
                  'pending'  => esc_html__('Unapprove','turio'),
                ),
                'default'    => 'pending'
            ),
            array(
                'id'            => 'customer_id',
                'type'          => 'text',
                'title'         =>  esc_html__('User ID','turio'),
                'attributes'    => array( 'readonly' =>true )
            ),
            array(
                'id'            => 'review_title',
                'type'          => 'text',
                'title'         =>  esc_html__('Review Title','turio'),
                'attributes'    => array( 'readonly' =>true )
            ),
            array(
                'id'            => 'tour_url',
                'type'          => 'text',
                'title'         =>  esc_html__('Tour URL','turio'),
                'attributes'    =>  array( 'readonly' =>true )
            ),
            array(
                'id'            => 'tour_title',
                'type'          => 'text',
                'title'         =>  esc_html__('Tour Title','turio'),
                'attributes'    => array( 'readonly' =>true )
            ),
            array(
                'id'            => 'customer_name',
                'type'          => 'text',
                'title'         =>  esc_html__('User Name','turio'),
                'attributes'    => array( 'readonly' =>true )
            ),
            array(
                'id'            => 'customer_email',
                'type'          => 'text',
                'title'         =>  esc_html__('User Phone','turio'),
                'attributes'    => array( 'readonly' =>true )
            ),
            array(
                'id'            => 'review_message',
                'type'          => 'textarea',
                'title'         =>  esc_html__('Review Message','turio'),
                'attributes'    => array( 'readonly' =>true )
               
            ),
            array(
                'id'     => 'review_rating',
                'type'   => 'repeater',
                'title'  => esc_html__('Review Rating','turio'),
                'attributes' => array( 'readonly' =>true ),
                'fields' => array(
                  array(
                    'id'    => 'reivew_criteria',
                    'type'  => 'text',
                    'title' => esc_html__( 'Criteria','turio' ),
                    'attributes' => array( 'readonly' =>true )
                  ),
                  array(
                    'id'    => 'reivew_criteria_rating',
                    'type'  => 'number',
                    'title' => esc_html__( 'Rating','turio' ),
                    'attributes' => array( 'readonly' =>true )
                  ),
                ),
            ),
        )
    ));

}
