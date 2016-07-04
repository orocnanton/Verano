<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<?php if (have_posts()) : ?>
	<header class="page-header arc">
		<div class="title">
			<h1><i class="fa fa-calendar" aria-hidden="true"> </i>
				<?php if (is_day()) { ?>
					<?php esc_html(the_time('F jS, Y')); ?>
				<?php } elseif (is_month()) { ?>
					<?php esc_html(the_time('F, Y')); ?>
				<?php } elseif (is_year()) { ?>
					<?php esc_html(the_time('Y')); ?>
				<?php } ?>
			</h1>
		</div>
		<a href="<?php echo esc_url(home_url('/')); ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
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
