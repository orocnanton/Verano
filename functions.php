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

add_action( 'after_setup_theme', 'verano_theme_setup', 11 );
function verano_theme_setup() {

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

	unregister_nav_menu('social');

	add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );
	function remove_admin_bar_links() {
		global $wp_admin_bar;
		if ( ! current_user_can( 'administrator' ) ) {
			$wp_admin_bar->remove_menu( 'bp-register' );
			$wp_admin_bar->remove_menu( 'wp-logo' );          // Remove the WordPress logo
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
			$wp_admin_bar->remove_menu( 'logout' );           // Remove the logout link
		}
	}
}

remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );


/*
* Activamos la capacidad de reproducir shortcodes en los widgets
*/
add_filter( 'widget_text', 'do_shortcode' );


/*
* Quitar estilos no necesarios
*/

add_action( 'wp_print_styles', 'verano_deregister_styles', 100 );
function verano_deregister_styles() {
	//wp_dequeue_style( 'twentysixteen-fonts' ); // desactiva las fuentes de twentysixteen
	wp_dequeue_style( 'genericons' ); // desactiva dashicons
	wp_dequeue_style( 'contact-form-7' ); // desactiva los estilo de contact form 7
	wp_dequeue_style( 'bbp-default' ); // desactiva los estilos de bbpress
	wp_dequeue_style( 'um_minified' ); // desactiva los estilos de ultimate members
	wp_dequeue_style( 'bp-twentysixteen' ); // desactiva los estilos budyypress  para twentysisteen
	//wp_dequeue_style('bp-legacy-css'); // desactiva los estilos budyypress

}


function verano_truncate_by_words( $string, $length, $terminator = "" ) {
	if ( mb_strlen( $string ) <= $length ) {
		$string = $string;
	} else {
		$string = preg_replace( '/\s+?(\S+)?$/', '', mb_substr( $string, 0, $length ) ) . $terminator;
	}

	return $string;
}

/*
* Registramos script y estilos para la web
*/

if ( ! function_exists( 'verano_scripts' ) ) {
	add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

	function theme_enqueue_styles() {
		// Registrar estilos
		wp_register_style( 'roboto', '//fonts.googleapis.com/css?family=Roboto:700,400,400italic', false, false );
		wp_register_style( 'lato', '//fonts.googleapis.com/css?family=Lato: 300, 400,700', false, false );
		wp_register_style('font-awesome', 'http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css', false, false );
		wp_register_style('elusive-icons', get_stylesheet_directory_uri() . '/inc/fonts/css/elusive-icons.css', false, false );
		wp_register_style('verano-css', get_stylesheet_directory_uri() . '/style.min.css', false, false );

		// Cargar estilo
		wp_enqueue_style( 'roboto' );
		wp_enqueue_style( 'lato' );
		wp_enqueue_style('font-awesome');
		wp_enqueue_style('elusive-icons');
		wp_enqueue_style('verano-css');


		// Registrar script
		wp_register_script( 'verano-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', array( 'jquery' ), false, true );
		wp_register_script( 'jquery-slides', '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js', array( 'jquery' ), false, true );
		wp_register_script( 'verano-custom-js', get_stylesheet_directory_uri() . '/js/scripts.js', array( 'jquery' ), false, true );
		wp_register_script( 'scroll-reveal', get_stylesheet_directory_uri() . '/js/scroll-reveal.js', array( 'jquery' ), false, false );
		// Cargar script
		wp_enqueue_script( 'verano-jquery' );
		wp_enqueue_script('jquery-slides');
		wp_enqueue_script( 'verano-custom-js' );
		wp_enqueue_script( 'scroll-reveal' );

	}

}

/* Fin */
/**
 * Implement the custom post type.
 */
require ( get_stylesheet_directory() . '/inc/custom-post-type.php' );

require ( get_stylesheet_directory() . '/inc/shortcodes.php' );

require ( get_stylesheet_directory() . '/inc/widgets.php' );

require ( get_stylesheet_directory() . '/inc/admin/admin-init.php');

require ( get_stylesheet_directory() . '/inc/widget-related-post.php');

/**
 * ----------------------------------------------------------------------------------------
 * 7.0 - Register the widget areas.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'verano_widget_init' ) ) {

	add_action( 'widgets_init', 'verano_widget_init' );
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
}
/*
* Quitar widget
*/
add_action( 'widgets_init', 'remove_widgets', 11 );
function remove_widgets() {

	// Unregister some of the TwentyTen sidebars
	unregister_sidebar( 'sidebar-2' );
	unregister_sidebar( 'sidebar-3' );

}
/*
*  Eliminamos partes de customizer twentysixteen
*/
add_action( 'customize_register', 'mytheme_customize_register' );
function mytheme_customize_register( $wp_customize ) {
	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'background_image' );
	$wp_customize->remove_section( 'header_image' );
}

/*
*  Registro de widgets
*/
add_action( 'widgets_init', 'load_widgets' );
function load_widgets() {

	register_widget( 'aboutUsWidget' );

	register_widget( 'testimoniosWidget' );

	register_widget( 'ultimasentradasWidget' );

	register_widget( 'destacadosWidget' );

	register_widget( 'verano_widget_latest_posts' );

	register_widget( 'verano_widget_related_posts' );
}

/*
 *  Meta box layout
 */

class Rational_Meta_Box {
	private $screens = array(
		'post',
		'page',
	);
	private $fields = array(
		array(
			'id' => 'post-layout',
			'label' => 'Selecciona la plantilla',
			'type' => 'select',
			'options' => array(
				'twelve-col' => 'Sin sidebar',
				'content-area' => 'Con sidebar',
			),
		),
	);

	/**
	 * Class construct method. Adds actions to their respective WordPress hooks.
	 */
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_post' ) );
	}

	/**
	 * Hooks into WordPress' add_meta_boxes function.
	 * Goes through screens (post types) and adds the meta box.
	 */
	public function add_meta_boxes() {
		foreach ( $this->screens as $screen ) {
			add_meta_box(
				'opciones-de-layout',
				__( 'Opciones de layout', 'verano' ),
				array( $this, 'add_meta_box_callback' ),
				$screen,
				'advanced',
				'default'
			);
		}
	}

	/**
	 * Generates the HTML for the meta box
	 *
	 * @param object $post WordPress post object
	 */
	public function add_meta_box_callback( $post ) {
		wp_nonce_field( 'opciones_de_layout_data', 'opciones_de_layout_nonce' );
		echo 'Cambia el formato de la página';
		$this->generate_fields( $post );
	}

	/**
	 * Generates the field's HTML for the meta box.
	 */
	public function generate_fields( $post ) {
		$output = '';
		foreach ( $this->fields as $field ) {
			$label = '<label for="' . $field['id'] . '">' . $field['label'] . '</label>';
			$db_value = get_post_meta( $post->ID, 'opciones_de_layout_' . $field['id'], true );
			switch ( $field['type'] ) {
				case 'select':
					$input = sprintf(
						'<select id="%s" name="%s">',
						$field['id'],
						$field['id']
					);
					foreach ( $field['options'] as $key => $value ) {
						$field_value = !is_numeric( $key ) ? $key : $value;
						$input .= sprintf(
							'<option %s value="%s">%s</option>',
							$db_value === $field_value ? 'selected' : '',
							$field_value,
							$value
						);
					}
					$input .= '</select>';
					break;
				default:
					$input = sprintf(
						'<input %s id="%s" name="%s" type="%s" value="%s">',
						$field['type'] !== 'color' ? 'class="regular-text"' : '',
						$field['id'],
						$field['id'],
						$field['type'],
						$db_value
					);
			}
			$output .= $this->row_format( $label, $input );
		}
		echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
	}

	/**
	 * Generates the HTML for table rows.
	 */
	public function row_format( $label, $input ) {
		return sprintf(
			'<tr><th scope="row">%s</th><td>%s</td></tr>',
			$label,
			$input
		);
	}
	/**
	 * Hooks into WordPress' save_post function
	 */
	public function save_post( $post_id ) {
		if ( ! isset( $_POST['opciones_de_layout_nonce'] ) )
			return $post_id;

		$nonce = $_POST['opciones_de_layout_nonce'];
		if ( !wp_verify_nonce( $nonce, 'opciones_de_layout_data' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;

		foreach ( $this->fields as $field ) {
			if ( isset( $_POST[ $field['id'] ] ) ) {
				switch ( $field['type'] ) {
					case 'email':
						$_POST[ $field['id'] ] = sanitize_email( $_POST[ $field['id'] ] );
						break;
					case 'text':
						$_POST[ $field['id'] ] = sanitize_text_field( $_POST[ $field['id'] ] );
						break;
				}
				update_post_meta( $post_id, 'opciones_de_layout_' . $field['id'], $_POST[ $field['id'] ] );
			} else if ( $field['type'] === 'checkbox' ) {
				update_post_meta( $post_id, 'opciones_de_layout_' . $field['id'], '0' );
			}
		}
	}
}
new Rational_Meta_Box;