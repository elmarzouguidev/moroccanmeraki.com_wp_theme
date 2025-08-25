<?php

/**
 * The template for displaying search forms
 *
 * @package turio
 */
?>
<form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" role="search" class="search-form" id="blog-sidebar-search">
    <div class="search-input-group">
    <input type="text" id="s" name="s" class="form-control" placeholder="<?php echo esc_attr__('Search...', 'turio'); ?>">
        <button type="submit" id="searchsubmit"><?php echo esc_html__('SEAECH','turio') ?></button>
    </div>
</form>