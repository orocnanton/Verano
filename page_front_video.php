<?php
/**
 * Template Name: Front Video
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


	<article class="hentry image">
		<div>
			<video autoplay="" loop="" poster="http://1pixel.es/wp-content/themes/FoundationPress-master/assets/img/img/1pixel.jpg" alt="1pixel" id="videobcg" muted="muted" volume="0">
				<source src="http://1pixel.es/wp-content/themes/FoundationPress-master/assets/videos/portada.webm" type="video/webm">
				<source src="http://1pixel.es/wp-content/themes/FoundationPress-master/assets/videos/portada.mp4" type="video/mp4">
			</video>
			<div class="image-content">
				<h1 class="jumbo">Welcome to Summer time</h1>
				<p>Todo lo que necesitas para tu web</p>
				<button class="btn">Clikc para saber más</button>
			</div>
		</div>
	</article>

	<article class="hentry">
		<div class="front-page destacados row">
			<div class="third-col">
				<i class="fa fa-desktop" aria-hidden="true"></i>
				<h3>Responsive</h3>
				<p>Tu sítio web se verá increible en móblies tablets y ordenadores.</p>
<!--				<p><a class="btn" href="">Leer más</a></p>-->
			</div>
			<div class="third-col">
				<i class="fa fa-graduation-cap" aria-hidden="true"></i>
				<h3>Apoyo técnico</h3>
				<p>Cuentas con apóyo tecnico para poner a funcionar tu web, no te rompas la cabeza.</p>
<!--				<p><a class="btn" href="">Leer más</a></p>-->
			</div>
			<div class="third-col">
				<i class="fa fa-eur" aria-hidden="true"></i>
				<h3>Precio</h3>
				<p>Todo el mundo te conocerá por muy poco dinero.</p>
<!--				<p><a class="btn" href="">Leer más</a></p>-->
			</div>
		</div>
	</article>

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
					<?php echo get_the_post_thumbnail( '1016', 'single'); ?>
				<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de
					texto</p>
			</div>
			<div class="third-col">
				<?php echo get_the_post_thumbnail( '1000', 'single'); ?>
				<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de
					texto</p>
				<p class="w3-red">[Shortcode de iconos sociales]</p>
			</div>
		</div>
	</article>

	<article class="hentry callto">
		<div class="">
			<div class="row">
				<h2>Subscríbete a nuestras Newsletter</h2>
				<h3>Mentente informado de nuestras novedades</h3>
				<p><a class="btn" href="#">Suscribirse</a></p>
			</div>

		</div>
	</article>

	<article class="hentry">
		<div class="front-page precios">
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
	<section class="hentry last-post">
	

			<?php

			$category = $redux_builder_orocnanotn['select-category'];
			$args     = array(
				'posts_per_page' => 3,
				'cat'            => $category
			);

			$the_query = new WP_Query($args);

			if ($the_query->have_posts()) :
				// Start the Loop
				while ($the_query->have_posts()) : $the_query->the_post();
					echo '<article>';

					 if ( has_post_thumbnail() ) {
						$post_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single' );
						$post_image = $post_image[0];
						 //echo '<img src="' . $post_image .'">';
						echo '<div class="post-img alignright" style="background-image:url(' . esc_url( $post_image ) . ');" alt="' . esc_attr( get_the_title() ) . '"></div>';
					}
					//echo '</div>';
					echo '<div class="last-content">';
					the_title('<h2>', '</h2>');
					the_excerpt('<p>', '</p>');
					// End the Loop
					echo '<a class="btn" href="' . esc_url(get_permalink()) . '">Leer más</a>';
					echo '</div></article>';
				endwhile;
			else:
				// If no posts match this query, output this text.
				_e('Lo siento no hay entradas con esa categoría.', 'verano');
			endif;
			wp_reset_postdata();
			?>

	</section>

	</main><!-- .site-main -->
	</div><!-- .content-area -->
	<script type="text/javascript">sr.reveal('.hentry');</script>
<?php get_footer(); ?>