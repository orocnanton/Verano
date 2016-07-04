<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

</div><!-- .site-content -->
</div>

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="wrap">
		<?php if (is_active_sidebar('footer-sidebar-1') && ! is_active_sidebar('footer-sidebar-2')) : ?>
			<aside id="footer-sidebar-1" role="complementary">
				<div class="w3-container">
					<?php dynamic_sidebar('footer-sidebar-1'); ?>
				</div>
			</aside><!-- .sidebar .widget-area -->

		<?php elseif (is_active_sidebar('footer-sidebar-1') && is_active_sidebar('footer-sidebar-2') && ! is_active_sidebar('footer-sidebar-3')) : ?>
			<aside id="footer-sidebar-1" role="complementary">
				<div class="two-col">
					<?php dynamic_sidebar('footer-sidebar-1'); ?>
				</div>
				<div class="two-col">
					<?php dynamic_sidebar('footer-sidebar-2'); ?>
				</div>
			</aside><!-- .sidebar .widget-area -->

		<?php elseif (is_active_sidebar('footer-sidebar-1') && is_active_sidebar('footer-sidebar-2') && is_active_sidebar('footer-sidebar-3')) : ?>
			<aside id="footer-sidebar-1" role="complementary">
				<div class="third-col">
					<?php dynamic_sidebar('footer-sidebar-1'); ?>
				</div>
				<div class="third-col">
					<?php dynamic_sidebar('footer-sidebar-2'); ?>
				</div>
				<div class="third-col">
					<?php dynamic_sidebar('footer-sidebar-3'); ?>
				</div>
			</aside><!-- .sidebar .widget-area -->
		<?php endif; ?>
	</div>
	<div class="wrap">
		<div class="social-icon">
			<?php
			global $redux_builder_orocnanotn;
			$social_options = $redux_builder_orocnanotn ['social-icon']; ?>
			<?php foreach ($social_options as $key => $value) {
				if ($value) { ?>
					<a href="http://<?php echo $value; ?>" title="<?php echo $key; ?>" target="_blank">
						<i class="fa fa-<?php echo $key; ?>"></i>
					</a>
				<?php }
			} ?>
		</div><!-- .social-icons -->
	</div>

	<div class="site-info">
		<div class="wrap">
			<?php
			do_action('twentysixteen_credits');
			?>
			<span class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"  rel="home"><?php bloginfo('name'); ?></a></span> © <?php echo esc_html(date('Y')); ?>

		</div>
	</div><!-- .site-info -->
</footer><!-- .site-footer -->
<?php wp_footer(); ?>

</body>
</html>
