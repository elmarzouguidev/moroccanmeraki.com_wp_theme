<?php

if (!function_exists('turio_copyright')) {

    /**
     * Show Copywrite area . 
     * @param   string $copyright_text.
     * @param   string $logo_url.
     * @since   1.4.0
     */
    function turio_copyright($copyright_text, $logo_url, $echo = true)
    {  ?>
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-4 col-md-6 order-lg-1 order-3 ">
                        <div class="copyright-link text-lg-start text-center">
                            <?php
                            if (!empty($copyright_text)) {
                                echo '<p>' . wp_kses($copyright_text, wp_kses_allowed_html('post')) . '</p>';
                            } else {
                                echo wp_kses('<p>Copyright 2023 <a href="' . esc_url('https://turio-wp.getcoderzone.com') . '">' . esc_html('Turio') . '</a> | ' . esc_html('Design By') . ' <a rel="nofollow" href="' . esc_url('https://egenslab.com') . '">' . esc_html('Egens Lab') . '</a></p>', wp_kses_allowed_html('post'));
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-4  order-lg-2 order-1">
                        <div class="footer-logo text-center">
                            <?php Egns_Helpers::turio_get_theme_logo($logo_url);  ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 order-lg-3 order-2">
                        <?php
                        Egns_Helpers::turio_get_theme_menu('footer-menu', 'policy-links', '', 'policy-list justify-content-lg-end justify-content-center', 4);
                        ?>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
?>