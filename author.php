<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 29/6/16
 * Time: 20:05
 */
get_header(); ?>

<?php if (have_posts()) : ?>

	<header class="page-header tag autor">
		<?php
		if ('' !== get_the_author_meta('description')) {
			get_template_part('layouts/autor', 'info');
		} else {
			return;
		}
		?>
	</header><!-- .page-header -->

	<?php
	// Start the Loop.
	while (have_posts()) : the_post();

		get_template_part('template-parts/content', get_post_format());

	endwhile;

	get_template_part('layouts/pagination');

else :
	get_template_part('template-parts/content', 'none');

endif;
?>

</main>
<!-- .site-main -->
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
