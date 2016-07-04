<?php
/**
 * Theme customizations
 *
 * @package		verano
 * @author		Oscar Rodríguez Collazo
 * @link		http://www.1pixel.es
 * @copyright	Copyright (c) 2016, Óscar Rodrígruez Collazo
 * @license		GPL-2.0+
 */

/**
 * Theme setup
 *
 * @since 1.0.0
 */

function verano_theme_setup() {
    /*
     * The setup
     * @since	1.0.0
     */
	load_theme_textdomain( 'verano', get_template_directory() . '/languages' );
	define( 'CHILD_THEME_NAME', 'Verano');
	define('CHILD_THEME_URL', '');
	define('CHILD_THEME_VERSION', '1.0.0');

    // Add theme support for size thumbnail
	add_image_size( 'background', 1680 );
	add_image_size( 'background-small', 1240 );
	add_image_size( 'single', 860 );
	add_image_size( 'opengraph', 680 );
	add_image_size( 'sidebar', 400 );
	add_image_size( 'thumbnail', 200 );
	add_image_size( 'thumbnail_small', 150, 150, true );


	function remove_admin_bar_links() {
		global $wp_admin_bar;
		if ( ! current_user_can( 'administrator' ) ) {
			$wp_admin_bar->remove_menu( 'bp-register' );
			$wp_admin_bar->remove_menu( 'wp-logo' );          // Remove the WordPress logo
			//$wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
			$wp_admin_bar->remove_menu( 'wporg' );            // Remove the WordPress.org link
			$wp_admin_bar->remove_menu( 'documentation' );    // Remove the WordPress documentation link
			$wp_admin_bar->remove_menu( 'support-forums' );   // Remove the support forums link
			$wp_admin_bar->remove_menu( 'feedback' );         // Remove the feedback link
			$wp_admin_bar->remove_menu( 'site-name' );        // Remove the site name menu
			$wp_admin_bar->remove_menu( 'view-site' );        // Remove the view site link
			$wp_admin_bar->remove_menu( 'updates' );          // Remove the updates link
			$wp_admin_bar->remove_menu( 'comments' );         // Remove the comments link
			$wp_admin_bar->remove_menu( 'new-content' );      // Remove the content link
			$wp_admin_bar->remove_menu( 'w3tc' );             // If you use w3 total cache remove the performance link
			//$wp_admin_bar->remove_menu('my-account');       // Remove the user details tab
			$wp_admin_bar->remove_menu( 'logout' );           // Remove the logout link
		}
	}

	add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );

}

add_action( 'after_setup_theme', 'verano_theme_setup' );
/* fin */

/*
*   Quitar peso del header
*/

remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );

/*  fin  */


/* 
* Activamos la capacidad de reproducir shortcodes en los widgets
*/

add_filter( 'widget_text', 'do_shortcode' );

/* Fin */

/*
* Quitar estilos no necesarios
*/

//add_action( 'wp_print_styles', 'verano_deregister_styles', 100 );

function verano_deregister_styles() {
	wp_dequeue_style( 'twentysixteen-fonts' ); // desactiva las fuentes de twentysixteen
	wp_dequeue_style( 'genericons' ); // desactiva dashicons
	wp_dequeue_style( 'contact-form-7' ); // desactiva los estilo de contact form 7
	wp_dequeue_style( 'bbp-default' ); // desactiva los estilos de bbpress
	wp_dequeue_style( 'um_minified' ); // desactiva los estilos de ultimate members
	wp_dequeue_style( 'bp-twentysixteen' ); // desactiva los estilos budyypress  para twentysisteen
	//wp_dequeue_style('bp-legacy-css'); // desactiva los estilos budyypress
}

/* Fin  */

/**
 * Truncate a string based on provided word count and include terminator
 *
 * @param       string $string String to be truncated
 * @param       int $length Number of characters to allow before split
 * @param       string $terminator (Optional) String terminator to be used
 *
 * @return      string              Truncated string with add terminator
 */
function verano_truncate_by_words( $string, $length, $terminator = "" ) {
	if ( mb_strlen( $string ) <= $length ) {
		$string = $string;
	} else {
		$string = preg_replace( '/\s+?(\S+)?$/', '', mb_substr( $string, 0, $length ) ) . $terminator;
	}

	return $string;
}

/*
* fin
*/

/*
* Registramos script y estilos para la web
*/

if ( ! function_exists( 'verano_scripts' ) ) {
	function theme_enqueue_styles() {



		// Registrar estilos
		wp_register_style( 'roboto', '//fonts.googleapis.com/css?family=Roboto:700,400,400italic', false, false );
		wp_register_style( 'lato', '//fonts.googleapis.com/css?family=Lato: 300, 400,700', false, false );
		wp_register_style('font-awesome', 'http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css', false, false );
		wp_register_style('elusive-icons', get_stylesheet_directory_uri() . '/inc/fonts/css/elusive-icons.css', false, false );
		wp_register_style('verano-css', get_stylesheet_directory_uri() . '/_style.min.css', false, false );

		// Cargar estilo
		//wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); // css de twentysixteen
		wp_enqueue_style( 'roboto' );
		wp_enqueue_style( 'lato' );
		wp_enqueue_style('font-awesome');
		wp_enqueue_style('elusive-icons');
		wp_enqueue_style('verano-css');


		// Registrar script
		wp_register_script( 'verano-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', array( 'jquery' ), false, true );
		wp_register_script( 'jquery-slides', get_stylesheet_directory_uri() . '/js/jquery.slides.min.js', array( 'jquery' ), false, true );
		wp_register_script( 'verano-custom-js', get_stylesheet_directory_uri() . '/js/scripts.js', array( 'jquery' ), false, true );
		wp_register_script( 'scroll-reveal', get_stylesheet_directory_uri() . '/js/scroll-reveal.js', array( 'jquery' ), false, false );
		// Cargar script
		wp_enqueue_script( 'verano-jquery' );
		wp_enqueue_script('jquery-slides');
		wp_enqueue_script( 'verano-custom-js' );
		wp_enqueue_script( 'scroll-reveal' );


	}

	add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
}

/* Fin */
/**
 * Implement the custom post type.
 */
require ( get_stylesheet_directory() . '/inc/custom-post-type.php' );

require ( get_stylesheet_directory() . '/inc/shortcodes.php' );

require ( get_stylesheet_directory() . '/inc/widgets.php' );

require ( get_stylesheet_directory() . '/inc/admin/admin-init.php');

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Twenty Sixteen 1.0
 */

/**
 * ----------------------------------------------------------------------------------------
 * 7.0 - Register the widget areas.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'verano_widget_init' ) ) {
	function verano_widget_init() {
		if ( function_exists( 'register_sidebar' ) ) {
			register_sidebar( array(
				'name'          => __( 'Footer 1', 'verano' ),
				'id'            => 'footer-sidebar-1',
				'description'   => __( 'Aparece en el pie de página.', 'verano' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			) );
			register_sidebar( array(
				'name'          => __( 'Footer 2', 'verano' ),
				'id'            => 'footer-sidebar-2',
				'description'   => __( 'Aparece en el pie de página.', 'verano' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			) );
			register_sidebar( array(
				'name'          => __( 'Footer 3', 'verano' ),
				'id'            => 'footer-sidebar-3',
				'description'   => __( 'Aparece en el pie de página.', 'verano' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			) );
			register_sidebar( array(
				'name'          => __( 'Front Page 1', 'verano' ),
				'id'            => 'front-page-1',
				'description'   => __( 'Aparece en home del sitio.', 'verano' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			) );
			register_sidebar( array(
				'name'          => __( 'Front Page 2', 'verano' ),
				'id'            => 'front-page-2',
				'description'   => __( 'Aparece en el pie de página.', 'verano' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			) );
			register_sidebar( array(
				'name'          => __( 'Related post', 'verano' ),
				'id'            => 'related-post',
				'description'   => __( 'Aparece al final de un post.', 'verano' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			) );

		}
	}

	add_action( 'widgets_init', 'verano_widget_init' );
}
/*
* Quitar widget
*/

function remove_widgets() {

	// Unregister some of the TwentyTen sidebars
	unregister_sidebar( 'sidebar-2' );
	unregister_sidebar( 'sidebar-3' );

}

add_action( 'widgets_init', 'remove_widgets', 11 );


/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/
 *
 * @since Twenty Sixteen 1.0
 */

/**
 * ----------------------------------------------------------------------------------------
 * 8.0 - .Alternativas a customizer
 * ----------------------------------------------------------------------------------------
 */

/*
*  Eliminamos partes de customizer twentysixteen
*/

function mytheme_customize_register( $wp_customize ) {
	//All our sections, settings, and controls will be added here

	// title_tagline - Site Title & Tagline
	// colors - Colors
	// header_image - Header Image
	//background_image - Background Image
	// nav - Navigation
	// static_front_page - Static Front Page

	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'background_image' );
	$wp_customize->remove_section( 'header_image' );
}

add_action( 'customize_register', 'mytheme_customize_register' );

/*
*  Registro de widgets
*/
function load_widgets() {

	register_widget( 'aboutUsWidget' );

	register_widget( 'testimoniosWidget' );
	
	register_widget( 'ultimasentradasWidget' );

	register_widget( 'destacadosWidget' );

	register_widget( 'verano_widget_latest_posts' );

	register_widget( 'verano_widget_related_posts' );
}

add_action( 'widgets_init', 'load_widgets' );

/*
* fin
*/
/*-----------------------------------------------------------------------------------*/
/* PAGE LAYOUTS
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'verano_opten_layout' ) ) {
	function verano_opten_layout() {
		global $post;
		if ( is_single() || is_page() || is_archive() ) {
			$verano_pagelayout_style_meta = get_post_meta( $post->ID, 'verano_pagelayout_style', true );
			switch ( $verano_pagelayout_style_meta ) {
				case 'pagelayout-fullwidth':
					echo 'l12';
					break;
				default:
					break;
			}
		} else {
			return;
		}
	}
}


/*-----------------------------------------------------------------------------------*/
/* POST META BOX SETTINGS
 /*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'verano_option_meta_verano_setup' ) ) {
	function verano_option_meta_verano_setup() {
		add_action( 'add_meta_boxes', 'verano_add_option_boxes' );
		add_action( 'save_post', 'verano_save_option_meta', 10, 2 );
	}
}
add_action( 'load-post.php', 'verano_option_meta_verano_setup' );
add_action( 'load-post-new.php', 'verano_option_meta_verano_setup' );

if ( ! function_exists( 'verano_add_option_boxes' ) ) {
	function verano_add_option_boxes() {
		add_meta_box(
			'verano-post-options',
			esc_html__( 'Opciones para posts', 'verano' ),
			'verano_options_meta_box',
			'post',
			'side',
			'core'
		);
		add_meta_box(
			'verano-post-options',
			esc_html__( 'Opciones para páginas', 'verano' ),
			'verano_options_meta_box',
			'page',
			'side',
			'core'
		);
		add_meta_box(
			'verano-testimonios-autor',
			esc_html__( 'Opciones para testimonios', 'verano' ),
			'verano_options_meta_box',
			'testimonios',
			'side',
			'core'
		);
	}
}

if ( ! function_exists( 'verano_options_meta_box' ) ) {
	function verano_options_meta_box( $object, $box ) {
		global $post;
		wp_nonce_field( basename( __FILE__ ), 'verano_subtitle' );
		$verano_subtitle_meta         = get_post_meta( $post->ID, 'verano_subtitle', true );
		$verano_pagelayout_style_meta = get_post_meta( $post->ID, 'verano_pagelayout_style', true );
		$verano_autor_testimonio_meta = get_post_meta( $post->ID, 'verano_autor_testimonio', true );

		?>
		<p>
			<label>
				<strong>Subtítulo</strong>
				<textarea class="widefat" rows="3" name="verano_subtitle"
				          id="verano_subtitle"><?php echo esc_html( $verano_subtitle_meta ); ?></textarea>
			</label>
		<p class="howto">Añade un subtítutlo en tus páginas.</p>
		</p>
		<hr>
		<p>
			<strong>Estilo de página</strong><br><br>
			<input type="radio" id="pagelayout-standard" name="verano_pagelayout_style"
			       value="pagelayout-standard" <?php if ( ! in_array( $verano_pagelayout_style_meta,
				array( 'pagelayout-fullwidth' ) )
			) {
				echo 'checked';
			} ?>>
			<label for="pagelayout-standard">Con Bara lateral</label><br>
			<input type="radio" id="pagelayout-fullwidth" name="verano_pagelayout_style"
			       value="pagelayout-fullwidth" <?php checked( $verano_pagelayout_style_meta,
				'pagelayout-fullwidth' ); ?>>
			<label for="pagelayout-fullwidth">Sin Barra lateral</label><br>
		<p class="howto">Configura es estilo de las páginas y post.</p>
		</p>
		<hr>
		<p>

			<label>
				<strong>Autor</strong>
				<textarea rows="3" name="verano_autor_testimonio"
				          id="verano_autor_testimonio"><?php echo esc_html( $verano_autor_testimonio_meta ); ?></textarea>
			</label>
		</p>
		<hr>

		<?php
	}
}

if ( ! function_exists( 'verano_save_option_meta' ) ) {
	function verano_save_option_meta( $post_id, $post ) {
		$is_autosave = wp_is_post_autosave( $post_id );
		$is_revision = wp_is_post_revision( $post_id );

		$verano_subtitle_meta         = ( isset( $_POST['verano_subtitle'] ) && wp_verify_nonce( $_POST['verano_subtitle'],
				basename( __FILE__ ) ) ) ? 'true' : 'false';
		$verano_pagelayout_style      = ( isset( $_POST['verano_pagelayout_style'] ) && wp_verify_nonce( $_POST['verano_pagelayout_style'],
				basename( __FILE__ ) ) ) ? 'true' : 'false';
		$verano_autor_testimonio_meta = ( isset( $_POST['verano_autor_testimonio'] ) && wp_verify_nonce( $_POST['verano_autor_testimonio'],
				basename( __FILE__ ) ) ) ? 'true' : 'false';

		if ( $is_autosave || $is_revision && ! $verano_subtitle_meta && ! $verano_pagelayout_style && ! $verano_autor_testimonio_meta ) {
			return;
		}
		if ( isset( $_POST['verano_subtitle'] ) ) {
			update_post_meta( $post_id, 'verano_subtitle', sanitize_text_field( $_POST['verano_subtitle'] ) );
		}
		if ( isset( $_POST['verano_pagelayout_style'] ) ) {
			update_post_meta( $post_id, 'verano_pagelayout_style',
				sanitize_text_field( $_POST['verano_pagelayout_style'] ) );
		}
		if ( isset( $_POST['verano_autor_testimonio'] ) ) {
			update_post_meta( $post_id, 'verano_autor_testimonio',
				sanitize_text_field( $_POST['verano_autor_testimonio'] ) );
		}
	}
}
