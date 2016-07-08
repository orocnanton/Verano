<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php if (is_singular() && pings_open(get_queried_object())) : ?>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
	<link rel="stylesheet" href="http://s.mlcdn.co/animate.css">

	<script>
      (function(){
        var config = {
          viewFactor : 0.15,
          duration   : 800,
          distance   : "50px",
          scale      : 0.8
        };

        window.sr = ScrollReveal( config );

        if (sr.isSupported()) {
          document.documentElement.classList.add('sr');
        }
      })();

	</script>
	<?php
	global $redux_builder_orocnanotn;
	$layout = $redux_builder_orocnanotn['opt-layout'];

	if ( ! empty($redux_builder_orocnanotn['script-header'])) {
	$script_header = $redux_builder_orocnanotn ['script-header'];
		echo $script_header;
	}
	?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
	<div class="site-inner">
		<a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'verano'); ?></a>

		<header id="masthead" class="site-header" role="banner">
			<div class="site-header-main wrap">
				<div class="site-branding">

					<?php
					if (current_theme_supports('custom-logo')) {
						twentysixteen_the_custom_logo();
					}
					?>

					<?php if (is_front_page() && is_home()) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
												  rel="home"><?php bloginfo('name'); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
												 rel="home"><?php bloginfo('name'); ?></a></p>
					<?php endif;

					$description = get_bloginfo('description', 'display');
					if ($description || is_customize_preview()) : ?>
						<p class="site-description"><?php echo $description; ?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->

				<?php if (has_nav_menu('primary')) : ?>
					<button id="menu-toggle" class="menu-toggle"></button>

					<div id="site-header-menu" class="site-header-menu">
						<?php if (has_nav_menu('primary')) : ?>
							<nav id="site-navigation" class="main-navigation" role="navigation"
								 aria-label="<?php esc_attr_e('Primary Menu', 'twentysixteen'); ?>">
								<?php
								wp_nav_menu(array(
									'theme_location' => 'primary',
									'menu_class'     => 'primary-menu',
								));
								?>
							</nav><!-- .main-navigation -->
						<?php endif; ?>
					</div><!-- .site-header-menu -->
				<?php endif; ?>
			</div>
			<!-- .site-header-main -->
		</header>
		<!-- .site-header -->

		<div id="content" class="site-content">
			<div class="wrap">
				<?php $layout = get_post_meta(  get_the_ID(), 'opciones_de_layout_post-layout', true ); ?>

				<div id="primary" class="content-area <?php echo $layout; ?> ">
					<main id="main" class="site-main" role="main">
