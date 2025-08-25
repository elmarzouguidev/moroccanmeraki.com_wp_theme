<?php
$enable_breadcrumb_by_theme = Egns_Helpers::get_theme_option('breadcrumb_enable');
$breadcrumb_enable_by_page = Egns_Helpers::turio_page_option_value('enable_breadcrumb');
$tour_breadcrumb_bg = Egns_Helpers::get_theme_option('tour_breadcrumb_bg');

if (Egns_Helpers::turio_is_enabled($enable_breadcrumb_by_theme, $breadcrumb_enable_by_page)) { ?>
    <?php if (!empty($tour_breadcrumb_bg['url'])) : ?>
        <div class="breadcrumb breadcrumb-style-one" style="background-image: url(<?php echo esc_url($tour_breadcrumb_bg['url']) ?>);">
        <?php else : ?>
            <div class="breadcrumb breadcrumb-style-one">
            <?php endif ?>
            <div class="breadcrumb-overlay"></div>
            <div class="container">
                <div class="col-lg-12 text-center">
                    <h2 class="breadcrumb-title"><?php echo esc_html__('Tour Package', 'turio') ?></h2>
                    <?php
                    turio_breadcrumb('ul', 'breadcrumb', 'd-flex justify-content-center breadcrumb-items flex-wrap', 'breadcrumb-item active');
                    ?>
                </div>
            </div>
            </div>

        <?php
    };
        ?>