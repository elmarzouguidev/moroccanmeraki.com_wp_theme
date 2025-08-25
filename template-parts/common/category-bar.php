<?php 
    $destinations = get_terms(
        array(
            'taxonomy'   => 'turio-package-destination',
            'hide_empty' => true,
        )
    );
?>
<div class="category-sidebar-wrapper">
        <div class="category-sidebar">
            <div class="category-header d-flex justify-content-between align-items-center">
                <h4><?php echo esc_html('Destination','turio') ?></h4>
                <div class="category-toggle">
                    <i class="bi bi-x-lg"></i>
                </div>
            </div>
            <div class="row row-cols-lg-2 row-cols-2 gy-5 mt-3">
                <?php
                if ( ! empty( $destinations ) && is_array( $destinations ) ) {
                    // add links for each category
                    foreach ( $destinations as $destination ) { ?>

                        <?php 
                            $destination_info = get_term_meta( $destination->term_id, 'turio_destination_image_options', true );
                            $destination_image = !empty($destination_info['destination_image']['url']) ? $destination_info['destination_image']['url'] : '';
                            $destination_image_title = !empty($destination_info['destination_image']['title']) ? $destination_info['destination_image']['title'] : '';
                        ?>
                        <div class="col"> 
                            <a class="category-box" href="<?php echo esc_url( get_term_link( $destination ) ) ?>">
                                <div class="cate-icon mx-auto">
                                    <img src="<?php echo esc_attr( $destination_image ) ?? ''?>" alt="<?php echo esc_attr( $destination_image_title ) ?? '' ?>">
                                </div>
                                <?php if(!empty($destination->name)) : ?>
                                    <h5><?php echo sprintf( esc_html__("%s",'turio'), $destination->name ) ?></h5>
                                <?php endif ?>
                            </a>
                        </div>
                        
                    <?php
                    }
                } ?>
            </div>
        </div>
    </div>