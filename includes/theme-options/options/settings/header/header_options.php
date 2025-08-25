<?php
	/*-----------------------------------
		Header Options
	------------------------------------*/

	CSF::createSection( $prefix . '_theme_options', array(
		'parent' => 'header_options',
		'title'  => esc_html__( 'Header Options', 'turio' ),
		'id'     => 'theme_header_options',
		'icon'   => 'fa fa-id-card-o',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__( 'Header Options', 'turio' ) . '</h3>'
			),
			array(
				'id'         => 'header_layout_options',
				'title'      => esc_html__( 'Header Layout', 'turio' ),
				'type'       => 'image_select',
				'options'    => array(
					'header_one' 	=> TURIO_THEME_SETTINGS_IMAGES . '/header/header-one.png',
					'header_two'  	=> TURIO_THEME_SETTINGS_IMAGES . '/header/header-two.png',
					'header_three'  => TURIO_THEME_SETTINGS_IMAGES . '/header/header-three.png',
					
				),
				'default'    => 'header_one',
				'desc'       => wp_kses( __( 'you can set header layout design for header area', 'turio' ), $allowed_html ),
			),

			// -------------------------------------------My Code ----------------------------------------------//

			array(
				'type'    => 'subheading',
				'content' => '<h4>' . esc_html__( 'Header One', 'turio' ) . '</h4>',
				'dependency'	=> array( 'header_layout_options', '==', 'header_one' ),
				
			),

			array(
				'id'         => 'header_category_enable_one',
				'title'      => esc_html__( 'Header Sidebar Enable/Disable', 'turio' ),
				'type'       => 'switcher',
				'desc'       => wp_kses( __( 'you can set <mark>Yes / No</mark> to enable/disable category', 'turio' ), $allowed_html ),
				'default'    => true,
				'dependency'	=> array( 'header_layout_options', '==', 'header_one' ),
			),

			array(
				'id'         => 'header_one_sticky',
				'title'      => esc_html__( 'Header Sticky Enable/Disable', 'turio' ),
				'type'       => 'switcher',
				'desc'       => wp_kses( __( 'you can set <mark>Yes / No</mark> to enable/disable header sticky', 'turio' ), $allowed_html ),
				'default'    => true,
				'dependency'	=> array( 'header_layout_options', '==', 'header_one' ),
			
				
                
			),


			array(
				'id'      => 'header_search_enable_one',
				'title'   => esc_html__( 'Search Enable/Disable', 'turio' ),
				'type'    => 'switcher',
				'desc'    => wp_kses( __( 'you can set <mark>Yes / No</mark> to enable/disable search', 'turio' ), $allowed_html ),
				'default' => true,
				'dependency'    => array( 'header_layout_options', '==', 'header_one' ),
				
			),



			// ----------------------------------One------sticky------------------------------------//

				array(
					'type'    => 'subheading',
					'content' => '<h4>' . esc_html__( 'Color Option', 'turio' ) . '</h4>',
					'dependency'	=> array( 'header_layout_options', '==', 'header_one' ),
					
				),

				array(
				'id'            => 'header_one_style_section',
				'type'          => 'tabbed',
				'title'         => esc_html(' Header One(Style)'),
				'dependency'	=> array( 'header_layout_options', '==', 'header_one' ),
				'tabs'          => array(
					array(
						'title'     => esc_html( 'Normal Header' ),
						'fields'    => array(
					

					// Menu Color Start
					array(
						'id'    => 'header_one_background_color',
						'type'  => 'color',
						'title'   => esc_html__( 'Background Color', 'turio' ),
						'desc'    => wp_kses( __( 'you can select <mark>Header Background Color </mark> for header section', 'turio' ), $allowed_html ),
					),
					array(
						'id'    => 'header_one_menu_text_color',
						'type'  => 'color',
						'title'   => esc_html__( 'Menu Text Color', 'turio' ),
						'desc'    => wp_kses( __( 'you can select <mark>Header Menu Color </mark> for header section', 'turio' ), $allowed_html ),
					),
					array(
						'id'    => 'header_one_menu_hover_text_color',
						'type'  => 'color',
						'title'   => esc_html__( 'Menu Hover Text Color', 'turio' ),
						'desc'    => wp_kses( __( 'you can select <mark>Header Menu Color </mark> for header section', 'turio' ), $allowed_html ),
					),
					array(
						'id'    => 'header_one_menu_active_color',
						'type'  => 'color',
						'title'   => esc_html__( 'Menu Active Color', 'turio' ),
						'desc'    => wp_kses( __( 'you can select <mark>Header Menu Active Color </mark> for header section', 'turio' ), $allowed_html ),
					),
					//-------------------- extra-------------------------//
					array(
						'id'    	=> 'header_one_sub_menu_background_color',
						'type'  	=> 'color',
						'title'   	=> esc_html__( 'Sub Menu Background Color', 'turio' ),
						'desc'    	=> wp_kses( __( 'you can select <mark>Header Menu Color </mark> for header section', 'turio' ), $allowed_html ),
					),
					array(
						'id'    	=> 'header_one_sub_menu_text_color',
						'type'  	=> 'color',
						'title'   	=> esc_html__( 'Sub Menu Text Color', 'turio' ),
						'desc'    	=> wp_kses( __( 'you can select <mark>Header Menu Color </mark> for header section', 'turio' ), $allowed_html ),
					),
					array(
						'id'    	=> 'header_one_sub_menu_hover_text_color',
						'type'  	=> 'color',
						'title'   	=> esc_html__( 'Sub Menu Hover Text Color', 'turio' ),
						'desc'    	=> wp_kses( __( 'you can select <mark>Header Menu Color </mark> for header section', 'turio' ), $allowed_html ),
					),
					array(
						'id'    	=> 'header_one_sub_menu_bac_color',
						'type'  	=> 'color',
						'title'   	=> esc_html__( 'Sub Menu Text Background Hover Color', 'turio' ),
						'desc'    	=> wp_kses( __( 'you can select <mark>Header Menu Background Color </mark> for header section', 'turio' ), $allowed_html ),
					),
					// --------------------extra end -------------------------//
					array(
						'type'    => 'subheading',
						'content' => '<h4>' . esc_html__( 'Search & Sidebar', 'turio' ) . '</h4>',
					),
					array(
						'id'    => 'header_one_search_icon_color',
						'type'  => 'color',
						'title'   => esc_html__( 'Search Icon Color', 'turio' ),
						'desc'    => wp_kses( __( 'you can set <mark>Search Icon Color </mark> for header section', 'turio' ), $allowed_html ),
						
					),
					array(
						'id'    => 'header_one_search_icon_hover_baccolor',
						'type'  => 'color',
						'title'   => esc_html__( 'Search Icon Hover Background Color', 'turio' ),
						'desc'    => wp_kses( __( 'you can set <mark>Search Icon Hover Background Color </mark> for header section', 'turio' ), $allowed_html ),
						
					),
					array(
						'id'    => 'header_one_sidebar_icon_color',
						'type'  => 'color',
						'title'   => esc_html__( 'Sidebar Icon Color', 'turio' ),
						'desc'    => wp_kses( __( 'you can set <mark>Header One Sidebar Icon Color </mark> for header section', 'turio' ), $allowed_html ),
						
					),
					array(
						'id'    => 'header_one_sidebar_icon_back_color',
						'type'  => 'color',
						'title'   => esc_html__( 'Sidebar Icon Hover Background Color', 'turio' ),
						'desc'    => wp_kses( __( 'you can set <mark>Header One Sidebar Icon Hover Background Color </mark> for header section', 'turio' ), $allowed_html ),
						
					),


					)
				  ),
				  array(
					'title'     => esc_html( 'Sticky Header' ),
					'fields'    => array(
						// ------Header One Menu Color Start Sticky Style Start --------//

						// Menu Color Start
						array(
							'id'    => 'header_one_background_color_s',
							'type'  => 'color',
							'title'   => esc_html__( 'Background Color', 'turio' ),
							'desc'    => wp_kses( __( 'you can select <mark>Header Background Color </mark> for header section', 'turio' ), $allowed_html ),
							
						),
						array(
							'id'    => 'header_one_menu_text_color_s',
							'type'  => 'color',
							'title'   => esc_html__( 'Menu Text Color', 'turio' ),
							'desc'    => wp_kses( __( 'you can select <mark>Header Menu Color </mark> for header section', 'turio' ), $allowed_html ),
							
						),
						array(
							'id'    => 'header_one_menu_hover_text_color_s',
							'type'  => 'color',
							'title'   => esc_html__( 'Menu Hover Text Color', 'turio' ),
							'desc'    => wp_kses( __( 'you can select <mark>Header Menu Color </mark> for header section', 'turio' ), $allowed_html ),
							
						),

						//-------------------- extra sub menu-------------------------//
						array(
							'id'    	=> 'header_one_sub_menu_background_color_s',
							'type'  	=> 'color',
							'title'   	=> esc_html__( 'Sub Menu Background Color', 'turio' ),
							'desc'    	=> wp_kses( __( 'you can select <mark>Header Menu Color </mark> for header section', 'turio' ), $allowed_html ),
						),
						array(
							'id'    	=> 'header_one_sub_menu_text_color_s',
							'type'  	=> 'color',
							'title'   	=> esc_html__( 'Sub Menu Text Color', 'turio' ),
							'desc'    	=> wp_kses( __( 'you can select <mark>Header Menu Color </mark> for header section', 'turio' ), $allowed_html ),
						),
						array(
							'id'    	=> 'header_one_sub_menu_hover_text_color_s',
							'type'  	=> 'color',
							'title'   	=> esc_html__( 'Sub Menu Hover Text Color', 'turio' ),
							'desc'    	=> wp_kses( __( 'you can select <mark>Header Menu Color </mark> for header section', 'turio' ), $allowed_html ),
						),
						array(
							'id'    	=> 'header_one_sub_menu_bac_color_s',
							'type'  	=> 'color',
							'title'   	=> esc_html__( 'Sub Menu Text Hover Background Color', 'turio' ),
							'desc'    	=> wp_kses( __( 'you can select <mark>Header Menu Background Color </mark> for header section', 'turio' ), $allowed_html ),
						),
						// --------------------extra sub menu end -------------------------//
						array(
							'type'    => 'subheading',
							'content' => '<h4>' . esc_html__( 'Sticky Search & Sidebar', 'turio' ) . '</h4>',
							
						),
						array(
							'id'    => 'header_one_search_icon_color_s',
							'type'  => 'color',
							'title'   => esc_html__( 'Search Icon Color', 'turio' ),
							'desc'    => wp_kses( __( 'you can set <mark>Search Icon Color </mark> for header section', 'turio' ), $allowed_html ),
							
							
						),
						array(
							'id'    => 'header_one_search_icon_hover_baccolor_s',
							'type'  => 'color',
							'title'   => esc_html__( 'Search Icon Hover Background Color', 'turio' ),
							'desc'    => wp_kses( __( 'you can set <mark>Search Icon Hover Background Color </mark> for header section', 'turio' ), $allowed_html ),
						
					),
						array(
							'id'    => 'header_one_sidebar_icon_color_s',
							'type'  => 'color',
							'title'   => esc_html__( 'Sidebar Icon Color', 'turio' ),
							'desc'    => wp_kses( __( 'you can set <mark>Header One Sidebar Icon Color </mark> for header section', 'turio' ), $allowed_html ),
						
							
						),
						array(
							'id'    => 'header_one_sidebar_icon_back_color_s',
							'type'  => 'color',
							'title'   => esc_html__( 'Sidebar Icon Hover background Color', 'turio' ),
							'desc'    => wp_kses( __( 'you can set <mark>Header One Sidebar Icon Hover Background Color </mark> for header section', 'turio' ), $allowed_html ),
						
							
						),

					)
				  ),

				)
			  ),

			// ----------------------------------stick-one-end------------------------------------//

			array(
				'type'    => 'subheading',
				'content' => '<h4>' . esc_html__( 'Header Two', 'turio' ) . '</h4>',
				'dependency'	=> array( 'header_menu_style', '==', 'header_two' ),
				
			),

			array(
				'id'         => 'header_category_enable_two',
				'title'      => esc_html__( 'Header Sidebar Enable/Disable', 'turio' ),
				'type'       => 'switcher',
				'desc'       => wp_kses( __( 'you can set <mark>Yes / No</mark> to enable/disable category', 'turio' ), $allowed_html ),
				'default'    => true,
				'dependency'	=> array( 'header_layout_options', '==', 'header_two' ),
				
				
			),

			array(
				'id'         => 'header_two_sticky',
				'title'      => esc_html__( 'Header Sticky Enable/Disable', 'turio' ),
				'type'       => 'switcher',
				'desc'       => wp_kses( __( 'you can set <mark>Yes / No</mark> to enable/disable header sticky', 'turio' ), $allowed_html ),
				'default'    => true,
				'dependency'	=> array( 'header_layout_options', '==', 'header_two' ),
			
				
                
			),

			array(
				'type' 		  	=> 'subheading',
				'content'	  	=> '<h3>'.esc_html__('Hotline Options','turio').'</h3>',
				'dependency'  	=> array( 'header_layout_options', '==', 'header_two' )
			),

			array(
				'id' 			=> 'header_hotline_enable',
				'title' 		=> esc_html__('Hotline Enable/Disable','turio'),
				'type' 			=> 'switcher',
				'default'		=> true,
				'desc' 			=> wp_kses(__('you can set <mark>hotline </mark>enable/disable option','turio'),$allowed_html),
				'dependency'  	=> array( 'header_layout_options', '==', 'header_two' )
			),
			array(
				'id'			=> 'header_hotline_text',
				'type'			=> 'text',
				'title'			=> esc_html__('Hotline Text','turio'),
				'default'		=> 'Hot Line Number',
				'desc'			=> wp_kses(__('you can set <mark>hotline text</mark> for menu hotline','turio'),$allowed_html),
				'dependency'    => array( 'header_hotline_enable|header_layout_options', '==|==', 'true|header_two' )
			),
			array(
				'id'			=> 'header_hotline_number',
				'type'			=> 'text',
				'title'			=> esc_html__('Hotline Number','turio'),
				'default'		=> '+880 176 1111 456',
				'desc'			=> wp_kses(__('you can set <mark>hotline number</mark> for menu hotline','turio'),$allowed_html),
				'dependency'    => array( 'header_hotline_enable|header_layout_options', '==|==', 'true|header_two' )

			),


			// ----------------------------------Two------sticky------------------------------------//

				array(
					'type'    => 'subheading',
					'content' => '<h4>' . esc_html__( 'Color Option', 'turio' ) . '</h4>',
					'dependency'	=> array( 'header_layout_options', '==', 'header_two' ),
					
				),
               
                array(
                'id'            => 'header_two_style_section',
                'type'          => 'tabbed',
                'title'         => esc_html(' Header Two(Style)'),
                'dependency'    => array( 'header_layout_options', '==', 'header_two' ),
                'tabs'          => array(
                    array(
                        'title'     => esc_html( 'Normal Header' ),
                        'fields'    => array(
                        // Add
		           
					// Header Two Style Start 

					// Menu Color Start
					array(
						'id'    => 'header_two_background_color',
						'type'  => 'color',
						'title'   => esc_html__( 'Background Color', 'turio' ),
						'desc'    => wp_kses( __( 'you can select <mark>Header Background Color </mark> for header section', 'turio' ), $allowed_html ),
						
					),
					array(
						'id'    => 'header_two_menu_text_color',
						'type'  => 'color',
						'title'   => esc_html__( 'Menu Text Color', 'turio' ),
						'desc'    => wp_kses( __( 'you can select <mark>Header Menu Color </mark> for header section', 'turio' ), $allowed_html ),
						
					),
					array(
						'id'    => 'header_two_menu_hover_text_color',
						'type'  => 'color',
						'title'   => esc_html__( 'Menu Hover Text Color', 'turio' ),
						'desc'    => wp_kses( __( 'you can select <mark>Header Menu Color </mark> for header section', 'turio' ), $allowed_html ),
						
					),
					//-------------------- extra-------------------------//
					array(
						'id'    	=> 'header_two_sub_menu_background_color',
						'type'  	=> 'color',
						'title'   	=> esc_html__( 'Sub Menu Background Color', 'turio' ),
						'desc'    	=> wp_kses( __( 'you can select <mark>Header Menu Color </mark> for header section', 'turio' ), $allowed_html ),
					),
					array(
						'id'    	=> 'header_two_sub_menu_text_color',
						'type'  	=> 'color',
						'title'   	=> esc_html__( 'Sub Menu Text Color', 'turio' ),
						'desc'    	=> wp_kses( __( 'you can select <mark>Header Menu Color </mark> for header section', 'turio' ), $allowed_html ),
					),
					array(
						'id'    	=> 'header_two_sub_menu_hover_text_color',
						'type'  	=> 'color',
						'title'   	=> esc_html__( 'Sub Menu Hover Text Color', 'turio' ),
						'desc'    	=> wp_kses( __( 'you can select <mark>Header Menu Color </mark> for header section', 'turio' ), $allowed_html ),
					),
					array(
						'id'    	=> 'header_two_sub_menu_hover_text_background_color',
						'type'  	=> 'color',
						'title'   	=> esc_html__( 'Sub Menu Hover Text Background Color', 'turio' ),
						'desc'    	=> wp_kses( __( 'you can select <mark>Header Menu Background Color </mark> for header section', 'turio' ), $allowed_html ),
					),
					// --------------------extra end -------------------------//
					// Menu Color End
					array(
						'type'    => 'subheading',
						'content' => '<h4>' . esc_html__( 'Search & Sidebar', 'turio' ) . '</h4>',
						
					),

					array(
						'id'    => 'header_two_sidebar_icon_color',
						'type'  => 'color',
						'title'   => esc_html__( 'Sidebar Icon Color', 'turio' ),
						'desc'    => wp_kses( __( 'you can set <mark>Header Two Sidebar Icon Color </mark> for header section', 'turio' ), $allowed_html ),
						
					),
					// Hot line Area
					array(
						'type'    => 'subheading',
						'content' => '<h4>' . esc_html__( 'Hotline Area', 'turio' ) . '</h4>',
						
					),

					array(
						'id'    => 'header_two_hotline_icon_color',
						'type'  => 'color',
						'title'   => esc_html__( 'Hotline Icon Color', 'turio' ),
						'desc'    => wp_kses( __( 'you can set <mark>Header Two Sidebar Icon Color </mark> for header section', 'turio' ), $allowed_html ),
						
					),
					array(
						'id'    => 'header_two_hotline_text_color',
						'type'  => 'color',
						'title'   => esc_html__( 'Hotline Text Color', 'turio' ),
						'desc'    => wp_kses( __( 'you can set <mark>Header Two Sidebar Icon Color </mark> for header section', 'turio' ), $allowed_html ),
						
					),
				
				
                    )
                  ),
				// two sticky ------------------------------------------- 
                  array(
                    'title'     => esc_html( 'Sticky Header' ),
                    'fields'    => array(
                       

					// Menu Color Start
					array(
						'id'    => 'header_two_background_color_s',
						'type'  => 'color',
						'title'   => esc_html__( 'Background Color', 'turio' ),
						'desc'    => wp_kses( __( 'you can select <mark>Header Background Color </mark> for header section', 'turio' ), $allowed_html ),
						
					),
					array(
						'id'    => 'header_two_menu_text_color_s',
						'type'  => 'color',
						'title'   => esc_html__( 'Menu Text Color', 'turio' ),
						'desc'    => wp_kses( __( 'you can select <mark>Header Menu Color </mark> for header section', 'turio' ), $allowed_html ),
						
					),
					array(
						'id'    => 'header_two_menu_hover_text_color_s',
						'type'  => 'color',
						'title'   => esc_html__( 'Menu Hover Text Color', 'turio' ),
						'desc'    => wp_kses( __( 'you can select <mark>Header Menu Color </mark> for header section', 'turio' ), $allowed_html ),
						
					),
					//-------------------- extra-------------------------//
					array(
						'id'    	=> 'header_two_sub_menu_background_color_s',
						'type'  	=> 'color',
						'title'   	=> esc_html__( 'Sub Menu Background Color', 'turio' ),
						'desc'    	=> wp_kses( __( 'you can select <mark>Header Menu Color </mark> for header section', 'turio' ), $allowed_html ),
					),
					array(
						'id'    	=> 'header_two_menu_text_color_s',
						'type'  	=> 'color',
						'title'   	=> esc_html__( 'Sub Menu Text Color', 'turio' ),
						'desc'    	=> wp_kses( __( 'you can select <mark>Header Menu Color </mark> for header section', 'turio' ), $allowed_html ),
					),
					array(
						'id'    	=> 'header_two_menu_hover_text_color_s',
						'type'  	=> 'color',
						'title'   	=> esc_html__( 'Sub Menu Hover Text Color', 'turio' ),
						'desc'    	=> wp_kses( __( 'you can select <mark>Header Menu Color </mark> for header section', 'turio' ), $allowed_html ),
					),
					
					array(
						'id'    	=> 'header_two_sub_menu_hover_text_background_color_s',
						'type'  	=> 'color',
						'title'   	=> esc_html__( 'Sub Menu Hover Text Background Color', 'turio' ),
						'desc'    	=> wp_kses( __( 'you can select <mark>Header Menu Background Color </mark> for header section', 'turio' ), $allowed_html ),
					),
					// --------------------extra end -------------------------//
					// Menu Color End
					array(
						'type'    => 'subheading',
						'content' => '<h4>' . esc_html__( 'Sidebar', 'turio' ) . '</h4>',
						
					),

					array(
						'id'    => 'header_two_sidebar_icon_color_s',
						'type'  => 'color',
						'title'   => esc_html__( 'Sidebar Icon Color', 'turio' ),
						'desc'    => wp_kses( __( 'you can set <mark>Header Two Sidebar Icon Color </mark> for header section', 'turio' ), $allowed_html ),
						
					),

					// Hot line Area
					array(
						'type'    => 'subheading',
						'content' => '<h4>' . esc_html__( 'Hotline Area', 'turio' ) . '</h4>',
						
					),

					array(
						'id'    => 'header_two_hotline_icon_color_s',
						'type'  => 'color',
						'title'   => esc_html__( 'Hotline Icon Color', 'turio' ),
						'desc'    => wp_kses( __( 'you can set <mark>Header Two Sidebar Icon Color </mark> for header section', 'turio' ), $allowed_html ),
						
					),
					array(
						'id'    => 'header_two_hotline_text_color_s',
						'type'  => 'color',
						'title'   => esc_html__( 'Hotline Text Color', 'turio' ),
						'desc'    => wp_kses( __( 'you can set <mark>Header Two Sidebar Icon Color </mark> for header section', 'turio' ), $allowed_html ),
						
					),



                    )
                  ),

                )
              ),
            // ----------------------------------Two-ticky--end------------------------------------//


            // ----------------------------------Header-Three--Start------------------------------------//
			array(
				'id'         => 'header_category_enable_three',
				'title'      => esc_html__( 'Header Sidebar Enable/Disable', 'turio' ),
				'type'       => 'switcher',
				'desc'       => wp_kses( __( 'you can set <mark>Yes / No</mark> to enable/disable category', 'turio' ), $allowed_html ),
				'default'    => true,
				'dependency'	=> array( 'header_layout_options', '==', 'header_three' ),
			),

			array(
				'id'      => 'header_search_enable_three',
				'title'   => esc_html__( 'Search Enable/Disable', 'turio' ),
				'type'    => 'switcher',
				'desc'    => wp_kses( __( 'you can set <mark>Yes / No</mark> to enable/disable search', 'turio' ), $allowed_html ),
				'default' => true,
				'dependency'    => array( 'header_layout_options', '==', 'header_three' ),
				
			),

			array(
				'id'         => 'header_three_sticky',
				'title'      => esc_html__( 'Header Sticky Enable/Disable', 'turio' ),
				'type'       => 'switcher',
				'desc'       => wp_kses( __( 'you can set <mark>Yes / No</mark> to enable/disable header sticky', 'turio' ), $allowed_html ),
				'default'    => true,
				'dependency'	=> array( 'header_layout_options', '==', 'header_three' ),
			
				
                
			),

			array(
				'type' 		  	=> 'subheading',
				'content'	  	=> '<h3>'.esc_html__('Hotline Options','turio').'</h3>',
				'dependency'  	=> array( 'header_layout_options', '==', 'header_three' )
			),
			array(
				'id' 			=> 'header_hotline_enable_three',
				'title' 		=> esc_html__('Hotline Enable/Disable','turio'),
				'type' 			=> 'switcher',
				'default'		=> true,
				'desc' 			=> wp_kses(__('you can set <mark>hotline </mark>enable/disable option','turio'),$allowed_html),
				'dependency'  	=> array( 'header_layout_options', '==', 'header_three' )
			),
			array(
				'id'			=> 'header_hotline_text_three',
				'type'			=> 'text',
				'title'			=> esc_html__('Hotline Text','turio'),
				'default'		=> 'Hot Line Number',
				'desc'			=> wp_kses(__('you can set <mark>hotline text</mark> for menu hotline','turio'),$allowed_html),
				'dependency'    => array( 'header_hotline_enable_three|header_layout_options', '==|==', 'true|header_three' )
			),
			array(
				'id'			=> 'header_hotline_number_three',
				'type'			=> 'text',
				'title'			=> esc_html__('Hotline Number','turio'),
				'default'		=> '+880 176 1111 456',
				'desc'			=> wp_kses(__('you can set <mark>hotline number</mark> for menu hotline','turio'),$allowed_html),
				'dependency'    => array( 'header_hotline_enable_three|header_layout_options', '==|==', 'true|header_three' )

			),

			// ----------------------------------three------sticky------------------------------------//

			array(
				'type'    => 'subheading',
				'content' => '<h4>' . esc_html__( 'Color Option', 'turio' ) . '</h4>',
				'dependency'	=> array( 'header_layout_options', '==', 'header_three' ),
				
			),
		   
			array(
			'id'            => 'header_three_style_section',
			'type'          => 'tabbed',
			'title'         => esc_html(' Header three(Style)'),
			'dependency'    => array( 'header_layout_options', '==', 'header_three' ),
			'tabs'          => array(
				array(
					'title'     => esc_html( 'Normal Header' ),
					'fields'    => array(
					// Add
			   
				// Header three Style Start 

				// Menu Color Start
				array(
					'id'    => 'header_three_background_color',
					'type'  => 'color',
					'title'   => esc_html__( 'Background Color', 'turio' ),
					'desc'    => wp_kses( __( 'you can select <mark>Header Background Color </mark> for header section', 'turio' ), $allowed_html ),
					
				),
				array(
					'id'    => 'header_three_menu_text_color',
					'type'  => 'color',
					'title'   => esc_html__( 'Menu Text Color', 'turio' ),
					'desc'    => wp_kses( __( 'you can select <mark>Header Menu Color </mark> for header section', 'turio' ), $allowed_html ),
					
				),
				array(
					'id'    => 'header_three_menu_hover_text_color',
					'type'  => 'color',
					'title'   => esc_html__( 'Menu Hover Text Color', 'turio' ),
					'desc'    => wp_kses( __( 'you can select <mark>Header Menu Color </mark> for header section', 'turio' ), $allowed_html ),
					
				),
				//-------------------- extra-------------------------//
				array(
					'id'    	=> 'header_three_sub_menu_background_color',
					'type'  	=> 'color',
					'title'   	=> esc_html__( 'Sub Menu Background Color', 'turio' ),
					'desc'    	=> wp_kses( __( 'you can select <mark>Header Menu Color </mark> for header section', 'turio' ), $allowed_html ),
				),
				array(
					'id'    	=> 'header_three_sub_menu_text_color',
					'type'  	=> 'color',
					'title'   	=> esc_html__( 'Sub Menu Text Color', 'turio' ),
					'desc'    	=> wp_kses( __( 'you can select <mark>Header Menu Color </mark> for header section', 'turio' ), $allowed_html ),
				),
				array(
					'id'    	=> 'header_three_sub_menu_hover_text_color',
					'type'  	=> 'color',
					'title'   	=> esc_html__( 'Sub Menu Hover Text Color', 'turio' ),
					'desc'    	=> wp_kses( __( 'you can select <mark>Header Menu Color </mark> for header section', 'turio' ), $allowed_html ),
				),
				array(
					'id'    	=> 'header_three_sub_menu_hover_text_background_color',
					'type'  	=> 'color',
					'title'   	=> esc_html__( 'Sub Menu Hover Text background Color', 'turio' ),
					'desc'    	=> wp_kses( __( 'you can select <mark>Header Menu Background Color </mark> for header section', 'turio' ), $allowed_html ),
				),
				// --------------------extra end -------------------------//
				// Hot line Area
				array(
					'type'    => 'subheading',
					'content' => '<h4>' . esc_html__( 'Hotline Area', 'turio' ) . '</h4>',
					
				),

				array(
					'id'    => 'header_three_hotline_icon_color',
					'type'  => 'color',
					'title'   => esc_html__( 'Hotline Icon Color', 'turio' ),
					'desc'    => wp_kses( __( 'you can set <mark>Header Two Sidebar Icon Color </mark> for header section', 'turio' ), $allowed_html ),
					
				),
				array(
					'id'    => 'header_three_hotline_text_color',
					'type'  => 'color',
					'title'   => esc_html__( 'Hotline Text Color', 'turio' ),
					'desc'    => wp_kses( __( 'you can set <mark>Header Two Sidebar Icon Color </mark> for header section', 'turio' ), $allowed_html ),
					
				),
				// Menu Color End
				array(
					'type'    => 'subheading',
					'content' => '<h4>' . esc_html__( 'Search & Sidebar', 'turio' ) . '</h4>',
					
				),
				array(
					'id'    => 'header_three_icon_color',
					'type'  => 'color',
					'title'   => esc_html__( 'Icon Color', 'turio' ),
					'desc'    => wp_kses( __( 'you can set <mark>Search Icon Color </mark> for header section', 'turio' ), $allowed_html ),
					
					
				),
				array(
					'id'    => 'header_three_icon_background_color',
					'type'  => 'color',
					'title'   => esc_html__( 'Icon Background Color', 'turio' ),
					'desc'    => wp_kses( __( 'you can set <mark>Header three Sidebar Icon Color </mark> for header section', 'turio' ), $allowed_html ),
					
				),
				array(
					'id'    => 'header_three_icon_hover_color',
					'type'  => 'color',
					'title'   => esc_html__( 'Icon Hover Color', 'turio' ),
					'desc'    => wp_kses( __( 'you can set <mark>Search Icon Color </mark> for header section', 'turio' ), $allowed_html ),
					
					
				),
				array(
					'id'    => 'header_three_icon_hover_background_color',
					'type'  => 'color',
					'title'   => esc_html__( 'Icon Hover Background Color', 'turio' ),
					'desc'    => wp_kses( __( 'you can set <mark>Header three Sidebar Icon Color </mark> for header section', 'turio' ), $allowed_html ),
					
				),
				array(
					'id'    => 'header_three_icon_hover_border_color',
					'type'  => 'color',
					'title'   => esc_html__( 'Icon Hover Border Color', 'turio' ),
					'desc'    => wp_kses( __( 'you can set <mark>Header three Sidebar Icon Color </mark> for header section', 'turio' ), $allowed_html ),
					
				),
			
			
				)
			  ),
			// three sticky ------------------------------------------- 
			  array(
				'title'     => esc_html( 'Sticky Header' ),
				'fields'    => array(
				   

				// Menu Color Start
				array(
					'id'    => 'header_three_background_color_s',
					'type'  => 'color',
					'title'   => esc_html__( 'Background Color', 'turio' ),
					'desc'    => wp_kses( __( 'you can select <mark>Header Background Color </mark> for header section', 'turio' ), $allowed_html ),
					
				),
				array(
					'id'    => 'header_three_menu_text_color_s',
					'type'  => 'color',
					'title'   => esc_html__( 'Menu Text Color', 'turio' ),
					'desc'    => wp_kses( __( 'you can select <mark>Header Menu Color </mark> for header section', 'turio' ), $allowed_html ),
					
				),
				array(
					'id'    => 'header_three_menu_hover_text_color_s',
					'type'  => 'color',
					'title'   => esc_html__( 'Menu Hover Text Color', 'turio' ),
					'desc'    => wp_kses( __( 'you can select <mark>Header Menu Color </mark> for header section', 'turio' ), $allowed_html ),
					
				),
				//-------------------- extra-------------------------//
				array(
					'id'    	=> 'header_three_sub_menu_background_color_s',
					'type'  	=> 'color',
					'title'   	=> esc_html__( 'Sub Menu Background Color', 'turio' ),
					'desc'    	=> wp_kses( __( 'you can select <mark>Header Menu Color </mark> for header section', 'turio' ), $allowed_html ),
				),
				array(
					'id'    	=> 'header_three_menu_text_color_s',
					'type'  	=> 'color',
					'title'   	=> esc_html__( 'Sub Menu Text Color', 'turio' ),
					'desc'    	=> wp_kses( __( 'you can select <mark>Header Menu Color </mark> for header section', 'turio' ), $allowed_html ),
				),
				array(
					'id'    	=> 'header_three_menu_hover_text_color_s',
					'type'  	=> 'color',
					'title'   	=> esc_html__( 'Sub Menu Hover Text Color', 'turio' ),
					'desc'    	=> wp_kses( __( 'you can select <mark>Header Menu Color </mark> for header section', 'turio' ), $allowed_html ),
				),
				array(
					'id'    	=> 'header_three_sub_menu_hover_text_background_color_s',
					'type'  	=> 'color',
					'title'   	=> esc_html__( 'Sub Menu Hover Text background Color', 'turio' ),
					'desc'    	=> wp_kses( __( 'you can select <mark>Header Menu Background Color </mark> for header section', 'turio' ), $allowed_html ),
				),
				// --------------------extra end -------------------------//
				// Hot line Area
				array(
					'type'    => 'subheading',
					'content' => '<h4>' . esc_html__( 'Hotline Area', 'turio' ) . '</h4>',
					
				),

				array(
					'id'    => 'header_three_hotline_icon_color_s',
					'type'  => 'color',
					'title'   => esc_html__( 'Hotline Icon Color', 'turio' ),
					'desc'    => wp_kses( __( 'you can set <mark>Header Two Sidebar Icon Color </mark> for header section', 'turio' ), $allowed_html ),
					
				),
				array(
					'id'    => 'header_three_hotline_text_color_s',
					'type'  => 'color',
					'title'   => esc_html__( 'Hotline Text Color', 'turio' ),
					'desc'    => wp_kses( __( 'you can set <mark>Header Two Sidebar Icon Color </mark> for header section', 'turio' ), $allowed_html ),
					
				),
				// Menu Color End
				array(
					'type'    => 'subheading',
					'content' => '<h4>' . esc_html__( 'Search & Sidebar', 'turio' ) . '</h4>',
					
				),
				array(
					'id'    => 'header_three_icon_color_s',
					'type'  => 'color',
					'title'   => esc_html__( 'Icon Color', 'turio' ),
					'desc'    => wp_kses( __( 'you can set <mark>Search Icon Color </mark> for header section', 'turio' ), $allowed_html ),
					
					
				),
				array(
					'id'    => 'header_three_icon_background_color_s',
					'type'  => 'color',
					'title'   => esc_html__( 'Icon Background Color', 'turio' ),
					'desc'    => wp_kses( __( 'you can set <mark>Header three Sidebar Icon Color </mark> for header section', 'turio' ), $allowed_html ),
					
				),
				array(
					'id'    => 'header_three_icon_hover_color_s',
					'type'  => 'color',
					'title'   => esc_html__( 'Icon Hover Color', 'turio' ),
					'desc'    => wp_kses( __( 'you can set <mark>Search Icon Color </mark> for header section', 'turio' ), $allowed_html ),
					
					
				),
				array(
					'id'    => 'header_three_icon_hover_background_color_s',
					'type'  => 'color',
					'title'   => esc_html__( 'Icon Hover Background Color', 'turio' ),
					'desc'    => wp_kses( __( 'you can set <mark>Header three Sidebar Icon Color </mark> for header section', 'turio' ), $allowed_html ),
					
				),
				array(
					'id'    => 'header_three_icon_hover_border_color_s',
					'type'  => 'color',
					'title'   => esc_html__( 'Icon Hover Border Color', 'turio' ),
					'desc'    => wp_kses( __( 'you can set <mark>Header three Sidebar Icon Color </mark> for header section', 'turio' ), $allowed_html ),
					
				),


				)
			  ),

			)
		  ),
		// ----------------------------------three-ticky--end------------------------------------//

		),
		
	) );

