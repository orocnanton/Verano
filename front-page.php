<?php
/**
 * The front page file
 *
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage verano
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<?php if (is_home() && ! is_front_page()) : ?>
	<header>
		<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
	</header>

<?php endif; ?>


<?php global $redux_builder_orocnanotn;

if (isset($redux_builder_orocnanotn['opt-slides']) && ! empty($redux_builder_orocnanotn['opt-slides'])) { ?>
	<div class="slider-wrapper theme-default">
	<div id="slider" class="nivoSlider">
	<?php foreach ($redux_builder_orocnanotn['opt-slides'] as $slider) {
		echo '<img src="' . $slider['image'] . '" data-thumb="' . $slider['image'] . '" alt="" title="<h1>' . $slider['title'] . '</h1> <p>' . $slider['description'] . '</p><a class=\'btn\' href=' . $slider['url'] . '>Leer mas</a>" />';
	}
	echo '</div>';
	echo '</div>';
} ?>
<?php if ( ! empty($redux_builder_orocnanotn['opt-presentacion'])) { ?>
	<article class="hentry">
		<div class="front-page presentacion row">
			<?php
			echo $redux_builder_orocnanotn['opt-presentacion'];
			?>
		</div>
	</article>
<?php } ?>
<?php if ( ! empty($redux_builder_orocnanotn['destacado-icono1'])) { ?>
	<article class="hentry">
		<div class="front-page destacados row">
			<div class="third-col">
				<?php
				echo '<i class="fa ' . $redux_builder_orocnanotn['destacado-icono1'] . '"></i>';
				echo '<h3>' . $redux_builder_orocnanotn['destacado-titulo1'] . '</h3>';
				echo '<p>' . $redux_builder_orocnanotn['destacado-contenido1'] . '</p>';
				echo '<p><a class="btn" href="' . $redux_builder_orocnanotn['destacado-link1'] . '">Leer más</a></p>';
				?>
			</div>
			<div class="third-col">
				<?php
				echo '<i class="fa ' . $redux_builder_orocnanotn['destacado-icono2'] . '"></i>';
				echo '<h3>' . $redux_builder_orocnanotn['destacado-titulo2'] . '</h3>';
				echo '<p>' . $redux_builder_orocnanotn['destacado-contenido2'] . '</p>';
				echo '<p><a class="btn" href="' . $redux_builder_orocnanotn['destacado-link2'] . '">Leer más</a></p>';
				?>
			</div>
			<div class="third-col">
				<?php
				echo '<i class="fa ' . $redux_builder_orocnanotn['destacado-icono3'] . '"></i>';
				echo '<h3>' . $redux_builder_orocnanotn['destacado-titulo3'] . '</h3>';
				echo '<p>' . $redux_builder_orocnanotn['destacado-contenido3'] . '</p>';
				echo '<p><a class="btn" href="' . $redux_builder_orocnanotn['destacado-link3'] . '">Leer más</a></p>';
				?>
			</div>
		</div>
	</article>
<?php } ?>

	<article class="hentry">
		<div class="front-page row">
			<div class="third-col">
				<h3>Panel de opciones</h3>
				<hr>
				<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de
					texto</p>
				<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de
					texto</p>
			</div>
			<div class="third-col">
				<img
					src="http://192.168.0.15:8888/wp-verano/wp-content/uploads/2012/12/triforce-wallpaper.jpg"
					alt="triforce">
				<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de
					texto</p>
			</div>
			<div class="third-col">
				<img
					src="http://192.168.0.15:8888/wp-verano/wp-content/uploads/2012/12/triforce-wallpaper.jpg"
					alt="triforce">
				<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de
					texto</p>
				<p class="w3-red">[Shortcode de iconos sociales]</p>
			</div>
		</div>
	</article>

<?php if (isset($redux_builder_orocnanotn['call-to-action']) && ! empty($redux_builder_orocnanotn['call-to-action'])) { ?>
	<article class="hentry callto">
		<div class="">
			<div class="row">
				<?php
				global $redux_builder_orocnanotn;
				echo '<h3>' . $redux_builder_orocnanotn['call-to-action'] . '</h3>';
				echo '<p><a class="btn" href="#">Leer más</a></p>';
				?>
			</div>

		</div>
	</article>
<?php } ?>

	<article class="hentry">
		<div class="front-page precios row">
			<div class="two-col">
				<div><i class="fa fa-trophy" aria-hidden="true"></i></div>
				<h2> Premiun </h2>
				<h3> 20€ por mes</h3>
				<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de
					texto</p>
				<a class="btn-block" href="#">Apúntate</a>
			</div>
			<div class="two-col">
				<div><i class="fa fa-rocket" aria-hidden="true"></i></div>
				<h2> Basic </h2>
				<h3> 10€ por mes</h3>
				<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de
					texto</p>
				<a class="btn-block" href="#">Apúntate</a>
			</div>

		</div>
	</article>
<?php if ( ! empty($redux_builder_orocnanotn['select-category'])) { ?>
	<article class="hentry">
		<div class="w3-content row">
			<?php
			$category = $redux_builder_orocnanotn['select-category'];
			$posts    = get_posts(array('posts_per_page' => 5, 'cat' => $category));
			foreach ($posts as $_post) {
				if (has_post_thumbnail($_post->ID)) {
					echo '<div class="third-col">';
					echo '<a href="' . get_permalink($_post->ID) . '" title="' . esc_attr($_post->post_title) . '">';
					echo get_the_post_thumbnail($_post->ID, 'single');
					echo '</a>';
					echo '<h2><a href="' . get_permalink($_post->ID) . '"> ' . esc_attr($_post->post_title) . '</a></h2>';
					if (function_exists('verano_truncate_by_words')) {
						echo '<p>' . esc_html(verano_truncate_by_words($_post->post_content, 150, '...')) . '</p>';
					} else {
						the_content();
					}
					echo '<a class="btn-block" href="' . esc_url(get_permalink($_post->ID)) . '">Leer más</a>';

					echo '</div>';
				}
			}
			?>
		</div>
	</article>

<?php } ?>
	</main><!-- .site-main -->
	</div><!-- .content-area -->
	<script type="text/javascript">sr.reveal('.hentry');</script>
<?php get_footer(); ?>