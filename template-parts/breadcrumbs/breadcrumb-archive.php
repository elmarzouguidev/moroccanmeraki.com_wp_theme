<?php
 
 $enable_breadcrumb_by_theme = Egns_Helpers::get_theme_option('breadcrumb_enable');
 $breadcrumb_enable_by_page = Egns_Helpers::turio_page_option_value( 'enable_breadcrumb' );

    if ( Egns_Helpers::turio_is_enabled( $enable_breadcrumb_by_theme , $breadcrumb_enable_by_page ) ) { ?>
        <div class="breadcrumb breadcrumb-style-one">
            <div class="breadcrumb-overlay"></div>
            <div class="container">
                <div class="col-lg-12 text-center">
                    <?php 
                        if( !class_exists('CSF') && is_home() ){ ?>
                            <div>
                                <h2 class="breadcrumb-title"><?php echo get_bloginfo('name') ?></h2>
                            </div>
                            <ul class="d-flex justify-content-center breadcrumb-items">
                                <li class="breadcrumb-item"><?php echo get_bloginfo('description') ?></li>
                            </ul>
                       <?php 
                       }else{ 
                           ?>
                            <h2 class="breadcrumb-title">
                                <?php
                                    if ( get_query_var( 'turio-package-destination' ) ) {
                                        echo esc_html__('Destination','turio');
                                    }elseif(get_query_var( 'turio-package-type' )){
                                        echo esc_html__('Tour Type','turio');
                                    }elseif(get_query_var( 'turio-package-tags' )){
                                        echo esc_html__('Tags','turio');
                                    }else{
                                        echo esc_html__('Blog','turio');
                                    }
                                ?>
                            </h2>
                            <?php turio_breadcrumb('ul', 'breadcrumb', 'd-flex justify-content-center breadcrumb-items flex-wrap', 'breadcrumb-item active'); ?>
                        <?php }
                        ?>
                </div>
            </div>
        </div>
        <?php
    }

?>