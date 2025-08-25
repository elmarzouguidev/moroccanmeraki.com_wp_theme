<?php
 
 $enable_breadcrumb_by_theme = Egns_Helpers::get_theme_option('breadcrumb_enable');
 $breadcrumb_enable_by_page = Egns_Helpers::turio_page_option_value( 'enable_breadcrumb' );
    
    if ( Egns_Helpers::turio_is_enabled( $enable_breadcrumb_by_theme , $breadcrumb_enable_by_page ) ) { ?>

            <div class="breadcrumb breadcrumb-style-one">
                <div class="breadcrumb-overlay"></div>
                    <div class="container">
                        <div class="col-lg-12 text-center">
                            <div class="breadcrumb-title">
                                <?php printf( esc_html__( 'Search Results for : %s', 'turio' ), '<span>' . get_search_query() . '</span>' ); ?>
                            </div>
                        <?php 
                            turio_breadcrumb('ul', 'breadcrumb', 'd-flex justify-content-center breadcrumb-items flex-wrap', 'breadcrumb-item active');
                        ?>
                    </div>
                </div>
            </div>
            
        <?php 
        };