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

	<?php
	global $redux_builder_orocnanotn;
	if ( ! empty($redux_builder_orocnanotn['social-icon'])) : ?>
	<div class="wrap">
		<?php
		echo '<ul class="social-icons">';
		$social_options = $redux_builder_orocnanotn ['social-icon'];
		foreach ($social_options as $key => $value) {
			if ($value) { ?>
				<li class="social-icon"><a href="http://<?php echo $value; ?>" title="<?php echo $key; ?>" target="_blank">
						<i class="fa fa-<?php echo $key; ?> icon-<?php echo $key; ?>"></i>
					</a></li>
			<?php }
		}
		echo '</ul>';
		?>
	</div>
	<?php endif; ?>

	<div class="site-info">
		<div class="wrap">
			<?php do_action('twentysixteen_credits'); // hook wordpress footer ?>
			<?php echo '<ul class="social-icons">'; ?>
			<li class="social-icon"><a href="<?php echo esc_url(home_url('/')); ?>"  rel="home"><?php bloginfo('name'); ?></a> © <?php echo esc_html(date('Y')); ?></li>
			<?php
			global $redux_builder_orocnanotn;
			if ( ! empty($redux_builder_orocnanotn['links-footer'])) {
				$links_footer = $redux_builder_orocnanotn ['links-footer'];
				foreach ($links_footer as $key => $value) {
					echo '<li class="social-icon"><a href="' . get_the_permalink($value) . '"> ' . get_the_title($value) . '</a></li>';
				}
			}
			echo '</ul>';
			?>
		</div>
	</div><!-- .site-info -->
</footer><!-- .site-footer -->
<?php wp_footer(); ?>
<?php
global $redux_builder_orocnanotn;
if ( ! empty($redux_builder_orocnanotn['script-footer'])) {
	$script_footer = $redux_builder_orocnanotn ['script-footer'];
	echo $script_footer;
}
?>
</body>
</html>
