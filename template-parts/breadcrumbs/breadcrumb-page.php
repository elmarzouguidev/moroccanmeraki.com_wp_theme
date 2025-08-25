<?php
 
    $enable_breadcrumb_by_theme = Egns_Helpers::get_theme_option('breadcrumb_enable');
    $breadcrumb_enable_by_page = Egns_Helpers::turio_page_option_value( 'enable_breadcrumb' );
    $page_breadcrumb_image = Egns_Helpers::turio_page_option_value( 'page_breadcrumb_bg' );
    
    if ( Egns_Helpers::turio_is_enabled( $enable_breadcrumb_by_theme , $breadcrumb_enable_by_page ) ) {
         ?>
        <?php if( !empty( $page_breadcrumb_image['url'] ) ) : ?>
            <div class="breadcrumb breadcrumb-style-one" style="background-image: url(<?php echo esc_url( $page_breadcrumb_image['url'] ) ?>)">
        <?php else : ?>
            <div class="breadcrumb breadcrumb-style-one">
        <?php endif ?>    
            <div class="breadcrumb-overlay"></div>
                <div class="container">
                    <div class="col-lg-12 text-center">
                        <h2 class="breadcrumb-title">
                            <?php
                                if( is_404() ){
                                    echo Egns_Helpers::turio_translate_with_escape_('Error'); 
                                }
                                the_title(); 
                            ?>
                        </h2>
                        <?php 
                            turio_breadcrumb('ul', 'breadcrumb', 'd-flex justify-content-center breadcrumb-items flex-wrap', 'breadcrumb-item active');
                        ?>
                    </div>
                </div>
            </div>
        <?php 
    }