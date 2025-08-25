<?php
/**
 * The sidebar containing the widget area.
 *
 * @package turio
 */
?>
<?php if( is_active_sidebar('right_sidebar') ) { ?>
    <div class="col-lg-4">
        <div class="blog-sidebar">
            <?php
                dynamic_sidebar( 'right_sidebar' );
            ?>
        </div>
</div>
<?php } ?>
