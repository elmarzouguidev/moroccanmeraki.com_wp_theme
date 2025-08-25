<div class="col-lg-4 col-md-6">
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
                <div class="book-btn">
                    <a href="<?php the_permalink(); ?>">
                        <?php Egns_Helpers::turio_translate_with_escape_('Book Now') ?>
                        <i class='bx bxs-right-arrow-alt'></i>
                    </a>
                </div>
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
</div>