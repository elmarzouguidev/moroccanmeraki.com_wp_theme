<!doctype html>
<html class="no-js" lang="<?php language_attributes(); ?>">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	 <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php
		wp_head();
	?>
</head>
<?php while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'loop-templates/content', 'blank' ); ?>

<?php endwhile; // end of the loop. ?>
<?php wp_footer(); ?>
</body>
</html>
