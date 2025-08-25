<?php

// Control core classes for avoid errors
if (class_exists('CSF')) {

    //Set a unique slug-like ID
    $prefix = 'tour_turio_enquiries';

    //Create a metabox
    CSF::createMetabox($prefix, array(
        'title'     => esc_html__('Enquiries Meta','turio'),
        'post_type' => 'enquiries',
    ));

    //Create a section
    CSF::createSection($prefix, array(
        'title'  => esc_html__('Enquiries Data','turio'),
        'fields' => array(
            array(
                'id'            => 'enquiries_package_id',
                'type'          => 'text',
                'title'         =>  esc_html__('Tour Package ID','turio'),
                'attributes'    => array( 'readonly' =>true )
            ),
            array(
                'id'            => 'enquiries_fullname',
                'type'          => 'text',
                'title'         =>  esc_html__('Full Name','turio'),
                'attributes'    => array( 'readonly' =>true )
            ),
            array(
                'id'            => 'enquiries_email_address',
                'type'          => 'text',
                'title'         =>  esc_html__('Email Address','turio'),
                'attributes'    => array( 'readonly' =>true )
            ),
            array(
                'id'            => 'enquiries_phone',
                'type'          => 'text',
                'title'         =>  esc_html__('Phone','turio'),
                'attributes'    => array( 'readonly' =>true )
            ),
            array(
                'id'            => 'enquiries_people',
                'type'          => 'text',
                'title'         =>  esc_html__('People','turio'),
                'attributes'    => array( 'readonly' =>true )
            ),
            array(
                'id'            => 'enquiries_number_of_tickets',
                'type'          => 'text',
                'title'         =>  esc_html__('Number of Tickets','turio'),
                'attributes'    => array( 'readonly' =>true )
            ),
            array(
                'id'            => 'enquiries_message',
                'type'          => 'textarea',
                'title'         =>  esc_html__('Enquiry','turio'),
                'attributes'    => array( 'readonly' =>true )
            ),
        )
    ));

}
