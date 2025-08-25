<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package turio
 */
get_header(); ?>
<?php
    $turio_theme_options = get_option('turio_theme_options');
    $package_post_per_page = '';
    if(isset($turio_theme_options['tour_package_per_post'])){
        $package_post_per_page = $turio_theme_options['tour_package_per_post'];
    }

    get_template_part( 'template-parts/breadcrumbs/breadcrumb-archive' );
?>
<?php 
    $termInfo = get_queried_object();
    $destination_info = get_term_meta($termInfo->term_id,  'turio_destination_image_options', true );
?>
<div class="destination-details-wrapper mb-110 mt-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="destination-details">
                    <?php if(!empty($destination_info['destination_image'])) : ?>
                        <div class="dd-thumb">
                            <img src="<?php echo $destination_info['destination_image']['url']; ?>" alt="<?php echo $destination_info['destination_image']['title']; ?>">
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($destination_info['destination_description'])) : ?>
                        <div class="dd-body">
                            <?php echo $destination_info['destination_description']; ?>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($destination_info['destination_overview'])) : ?>
                    <div class="destination-overview-table">
                        <?php if(!empty($destination_info['destination_overview_title'])) : ?>
                        <h3 class="dd-subtitle"><?php echo $destination_info['destination_overview_title']; ?></h3>
                        <?php endif; ?>
                        <table class="table overview-table">
                            <tbody>
                                <?php 
                                    foreach($destination_info['destination_overview'] as $value) :
                                        ?>
                                        <tr>
                                            <th><?php echo $value['overview_label']; ?></th>
                                            <td><?php echo $value['overview_name']; ?></td>
                                        </tr>
                                        <?php 
                                    endforeach;
                                ?>
                               
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>
                    <?php if(!empty($destination_info['destination_map'])) : ?>
                        <div class="destination-map">
                            <h3><?php echo esc_html__( 'Map', 'turio' )?></h3>
                            <?php echo $destination_info['destination_map']; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="right-side-tour-package">
                    <h3><?php echo $termInfo->name; ?> <?php echo esc_html__( 'Tour package', 'turio' )?> </h3>
                    <?php
                        global $wp_query;
                
                        if(!empty($package_post_per_page)){
                            $args = array_merge( $wp_query->query_vars, ['posts_per_page' => $package_post_per_page ] );
                        }else{
                            $args = array_merge( $wp_query->query_vars, ['posts_per_page' => 9 ] );
                        }
                        
                        query_posts( $args );

                        if ( have_posts() ) :
                            /* Start the Loop */
                            while ( have_posts() ) :
                                the_post();
                               ?>
                                <div class="package-card-alpha">
                                    <div class="package-thumb">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php if (has_post_thumbnail()) { ?>
                                                <?php the_post_thumbnail('package-card'); ?>
                                            <?php }  ?>
                                        </a>
                                        <?php if (!empty(Egns_Helpers::turio_package_info('tp_duration'))) { ?>
                                            <p class="card-lavel">
                                                <i class="bi bi-clock"></i>
                                                <span><?php Egns_Helpers::turio_translate_with_escape_(Egns_Helpers::turio_package_info('tp_duration')); ?></span>
                                            </p>
                                        <?php } ?>
                                    </div>
                                    <div class="package-card-body">
                                        <?php if (!empty(get_the_title())) { ?>
                                            <h3 class="p-card-title">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php Egns_Helpers::turio_translate_with_escape_(substr(get_the_title(), '0', '55')); ?>
                                                </a>
                                            </h3>
                                        <?php } ?>
                                        <div class="p-card-bottom">
                                         
                                            <?php if (!empty(Egns_Helpers::turio_package_info('tp_price'))) { ?>
                                                <div class="p-card-info">
                                                    <?php if (!empty(Egns_Helpers::turio_package_info('tp_range_price'))) { ?>
                                                        <span><?php Egns_Helpers::turio_translate_with_escape_(Egns_Helpers::turio_package_info('tp_range_price')); ?></span>
                                                    <?php } ?>
                                                    <?php if (function_exists('turio_get_package_price')) : ?>
                                                        <h6>
                                                            <?php turio_get_package_price(); ?>
                                                        </h6>
                                                    <?php endif; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                               <?php 
                                wp_reset_postdata();
                            endwhile; 
                        else :
                            get_template_part( 'loop-templates/content', 'none' );

                        endif;
                    ?>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <?php get_template_part( 'template-parts/blog/pagination' ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
