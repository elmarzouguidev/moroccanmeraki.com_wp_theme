<div class="col-lg-4 col-md-6">
    <div class="package-card-alpha retreat-card">
        <div class="package-thumb">
            <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()) { ?>
                    <?php the_post_thumbnail('package-card'); ?>
                <?php }  ?>
            </a>
            <?php if (!empty(Egns_Helpers::turio_package_info('tp_duration'))) { ?>
                <div class="card-badge">
                    <span><?php Egns_Helpers::turio_translate_with_escape_(Egns_Helpers::turio_package_info('tp_duration')); ?></span>
                </div>
            <?php } ?>
        </div>
        <div class="package-card-body">
            <!-- Location Info -->
            <?php if (!empty(Egns_Helpers::turio_package_info('tp_location'))) { ?>
                <div class="retreat-location">
                    <i class="bi bi-geo-alt"></i>
                    <span><?php Egns_Helpers::turio_translate_with_escape_(Egns_Helpers::turio_package_info('tp_location')); ?></span>
                </div>
            <?php } ?>

            <?php if (!empty(get_the_title())) { ?>
                <h3 class="retreat-title">
                    <a href="<?php the_permalink(); ?>">
                        <?php Egns_Helpers::turio_translate_with_escape_(get_the_title()); ?>
                    </a>
                </h3>
            <?php } ?>

            <!-- Host Info -->
            <?php if (!empty(Egns_Helpers::turio_package_info('opt-tour-availability')['tp_tour_availability_start'])) { ?>
                <div class="retreat-host">
                    <span class="host-label">Hosted by</span>
                    <span class="host-name"> Jan-Willem Boer</span>
                </div>
            <?php } ?>

            <!-- Date Info -->
            <?php if (!empty(Egns_Helpers::turio_package_info('opt-tour-availability')['tp_tour_availability_start'])) { ?>
                <div class="retreat-date">
                    <i class="bi bi-calendar3"></i>
                    <span>
                        <?php
                        $date = Egns_Helpers::turio_package_info('opt-tour-availability')['tp_tour_availability_start'];

                        // Try different date formats
                        if (DateTime::createFromFormat('Y-m-d', $date)) {
                            $formatted_date = DateTime::createFromFormat('Y-m-d', $date)->format('F Y');
                        } elseif (DateTime::createFromFormat('d/m/Y', $date)) {
                            $formatted_date = DateTime::createFromFormat('d/m/Y', $date)->format('F Y');
                        } elseif (DateTime::createFromFormat('m/d/Y', $date)) {
                            $formatted_date = DateTime::createFromFormat('m/d/Y', $date)->format('F Y');
                        } elseif (strtotime($date)) {
                            $formatted_date = date('F Y', strtotime($date));
                        } else {
                            // Fallback: show original date if can't parse
                            $formatted_date = $date;
                        }

                        echo $formatted_date;
                        ?>
                    </span>
                </div>
            <?php } ?>

            <!-- Price Section -->
            <?php if (!empty(Egns_Helpers::turio_package_info('tp_price'))) { ?>
                <div class="retreat-pricing">
                    <?php if (!empty(Egns_Helpers::turio_package_info('tp_range_price'))) { ?>
                        <span class="price-label"><?php Egns_Helpers::turio_translate_with_escape_(Egns_Helpers::turio_package_info('tp_range_price')); ?></span>
                    <?php } ?>
                    <?php if (function_exists('turio_get_package_price')) : ?>
                        <div class="price-value">
                            <?php turio_get_package_price(); ?>
                            <span><?php echo (Egns_Helpers::turio_package_info('tp_price_type')); ?></span>
                        </div>
                    <?php endif; ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<style>
    .retreat-card {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        background: white;
    }

    .retreat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
    }

    .package-thumb {
        position: relative;
        overflow: hidden;
    }


    .package-thumb img {
        width: 100%;

        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .retreat-card:hover .package-thumb img {
        transform: scale(1.05);
    }

    .card-badge {
        position: absolute;
        top: 16px;
        right: 16px;
        background: rgba(255, 255, 255, 0.95);
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 500;
        color: #333;
    }

    .package-card-body {
        padding: 24px;
    }

    .retreat-location {
        display: flex;
        align-items: center;
        gap: 6px;
        margin-bottom: 12px;
        font-size: 14px;
        color: #666;
    }

    .retreat-location i {
        color: #e74c3c;
        font-size: 14px;
    }

    .retreat-title {
        font-size: 20px;
        font-weight: 600;
        line-height: 1.3;
        margin-bottom: 16px;
        color: #2c3e50;
    }

    .retreat-title a {
        text-decoration: none;
        color: inherit;
        transition: color 0.3s ease;
    }

    .retreat-title a:hover {
        color: #3498db;
    }

    .retreat-host {
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .host-label {
        font-size: 13px;
        color: #7f8c8d;
    }

    .host-name {
        font-size: 15px;
        font-weight: 500;
        color: #34495e;
    }

    .retreat-date {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 20px;
        font-size: 14px;
        color: #555;
    }

    .retreat-date i {
        color: #3498db;
    }

    .retreat-pricing {
        margin-bottom: 20px;
        padding-top: 16px;
        border-top: 1px solid #ecf0f1;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .price-label {
        font-size: 13px;
        color: #7f8c8d;
    }

    .price-value {
        font-size: 18px;
        font-weight: 600;
        color: #2c3e50;
    }

    .btn-explore {
        display: inline-block;
        width: 100%;
        padding: 12px 24px;
        background: linear-gradient(135deg, #3498db, #2980b9);
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 500;
        text-align: center;
        transition: all 0.3s ease;
    }

    .btn-explore:hover {
        background: linear-gradient(135deg, #2980b9, #1a5490);
        transform: translateY(-1px);
        color: white;
        text-decoration: none;
    }

    @media (max-width: 768px) {
        .package-card-body {
            padding: 20px;
        }

        .retreat-title {
            font-size: 18px;
        }
    }
</style>