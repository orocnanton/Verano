<?php

get_header(); ?>

<?php if (have_posts()) : ?>

	<header class="page-header cat">
		<h1><i class="fa fa-folder-open" aria-hidden="true"></i> <?php single_cat_title('', true); ?></h1>
		<?php
		if (category_description() !== "") {
			echo "<hr>" . category_description();
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
