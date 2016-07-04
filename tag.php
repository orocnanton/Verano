<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 4/6/16
 * Time: 0:04
 */
get_header(); ?>

<?php if (have_posts()) : ?>

	<header class="page-header tag">
		<div class="title">
			<h1><i class="fa fa-tags" aria-hidden="true"></i> <?php esc_html(single_tag_title()); ?></h1>
		</div>
		<a href="<?php echo esc_url(home_url('/')); ?>"><i class="fa fa-tags" aria-hidden="true"></i></a>
	</header><!-- .page-header -->
	<?php
	// Start the Loop.
	while (have_posts()) : the_post();

		/*
		 * Include the Post-Format-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
		 */
		get_template_part('template-parts/content', get_post_format());

		// End the loop.
	endwhile;

	get_template_part('layouts/pagination');

// If no content, include the "No posts found" template.
else :
	get_template_part('template-parts/content', 'none');

endif;
?>

</main>
<!-- .site-main -->
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
