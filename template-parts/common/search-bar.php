<div class="main-searchbar-wrapper">
    <div class="container">
        <div class="multi-main-searchber">
            <form method="get" action="<?php echo get_post_type_archive_link('turio-package'); ?>">
                <div class="row g-4">
                    <?php
                    $destination = get_terms(
                        array(
                            'taxonomy' => 'turio-package-destination',
                            'hide_empty' => false
                        )
                    );
                    $args  = [
                        'posts_per_page' => -1,
                        'post_type'      => 'turio-package',
                        'orderby'        => 'date',
                        'order'          => 'DSE',
                    ];
                    $query   = new \WP_Query($args);

                    ?>

                    <div class="col-lg-10">
                        <div class="row gx-0 gy-4">
                            <div class="col-lg-3 col-md-6">
                                <div class="search-box-single destination-box">
                                    <div class="searchbox-icon">
                                        <i class="bi bi-geo-alt"></i>
                                    </div>
                                    <div class="searchbox-input">
                                        <label for="deatination_drop"><?php echo esc_html__('Destination', 'turio') ?></label>
                                        <select data-placeholder="<?php echo esc_attr__('Where Are You Going?', 'turio') ?>)" id="deatination_drop" name="destination">
                                            <option value="1"><?php echo esc_html__('Where Are You Going?', 'turio') ?></option>
                                            <?php
                                            if (!empty($destination)) {
                                                foreach ($destination as  $value) {
                                                    if ($value->parent == 0) {
                                                        echo '<optgroup label="' . esc_attr($value->name) . '">';
                                                        $id = $value->term_id;
                                                        foreach ($destination as  $value) {

                                                            if ($id == $value->parent) {
                                                                echo '<option value="' . esc_attr($value->term_id) . '">' . esc_html($value->name) . '</option>';
                                                            } elseif ($id == $value->term_id) {
                                                                echo '<option value="' . esc_attr($value->term_id) . '">' . esc_html($value->name) . '</option>';
                                                            }
                                                        }
                                                        echo '</optgroup>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="search-box-single type-box">
                                    <div class="searchbox-icon">
                                        <i class="bi bi-text-paragraph"></i>
                                    </div>
                                    <div class="searchbox-input">
                                        <label><?php echo esc_html__('Travel Type', 'turio'); ?></label>
                                        <select name="travel_type" class="defult-select-drowpown" data-placeholder="<?php echo esc_attr__('All Activity', 'turio') ?>">
                                            <option value="1"><?php echo esc_html__('All Activity', 'turio') ?></option>
                                            <?php
                                            $category = get_terms('turio-package-type');
                                            foreach ($category as $cat) { ?>
                                                <option value="<?php echo sprintf(__('%s', 'turio'), $cat->name) ?>"><?php echo sprintf(__('%s', 'turio'), $cat->name) ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="search-box-single type-box">
                                    <div class="searchbox-icon">
                                        <i class="bx bx-time"></i>
                                    </div>
                                    <div class="searchbox-input">
                                        <label><?php echo esc_html__('Duration', 'turio') ?></label>
                                        <input type="text" id="#person-dropdown" name="duration" placeholder="<?php echo esc_attr__('Please type duration ', 'turio') ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="search-box-single date-box">
                                    <div class="searchbox-icon">
                                        <i class="bi bi-capslock"></i>
                                    </div>
                                    <div class="searchbox-input date-picker-input">
                                        <label><?php echo esc_html__('Journey Date', 'turio') ?></label>
                                        <input name="tour_availability" placeholder="<?php echo esc_attr__('Select your date', 'turio') ?>" type="text" id="datepicker2" class="calendar" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="main-form-submit">
                            <button type="submit" class="btn-second" id="searchsubmit"><?php echo esc_html__('Find Now', 'turio') ?></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>