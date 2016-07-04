<?php

/**
 * For full documentation, please visit: http://docs.reduxframework.com/
 * For a more extensive sample-config file, you may look at:
 * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
 */

if ( ! class_exists( 'Redux' ) ) {
	return;
}

// This is your option name where all the Redux data is stored.
$opt_name = "redux_builder_orocnanotn";

/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
	'opt_name'              => 'redux_builder_orocnanotn',
	'use_cdn'               => true,
	'display_name'          => 'Verano Opciones',
	'display_version'       => '1.0.0',
	'page_title'            => 'Verano Opciones',
	'update_notice'         => true,
	'intro_text'            => 'Opciones para el tema',
	'admin_bar'             => true,
	'menu_type'             => 'menu',
	'menu_title'            => 'Opciones del tema',
	'allow_sub_menu'        => true,
	'page_parent_post_type' => 'your_post_type',
	'customizer'            => true,
	'default_mark'          => '*',
	'hints'                 => array(
		'icon_position' => 'right',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color' => 'light',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'duration' => '500',
				'event'    => 'mouseleave unfocus',
			),
		),
	),
	'output'                => true,
	'output_tag'            => true,
	'settings_api'          => true,
	'cdn_check_time'        => '1440',
	'compiler'              => true,
	'page_permissions'      => 'manage_options',
	'save_defaults'         => true,
	'show_import_export'    => true,
	'database'              => 'options',
	'transient_time'        => '3600',
	'network_sites'         => true,
);

// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
$args['share_icons'][] = array(
	'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
	'title' => 'Visit us on GitHub',
	'icon'  => 'el el-github'
	//'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
);
$args['share_icons'][] = array(
	'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
	'title' => 'Like us on Facebook',
	'icon'  => 'el el-facebook'
);
$args['share_icons'][] = array(
	'url'   => 'http://twitter.com/reduxframework',
	'title' => 'Follow us on Twitter',
	'icon'  => 'el el-twitter'
);
$args['share_icons'][] = array(
	'url'   => 'http://www.linkedin.com/company/redux-framework',
	'title' => 'Find us on LinkedIn',
	'icon'  => 'el el-linkedin'
);

Redux::setArgs( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */

/*
 * ---> START HELP TABS
 */

$tabs = array(
	array(
		'id'      => 'redux-help-tab-1',
		'title'   => __( 'Theme Information 1', 'admin_folder' ),
		'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'admin_folder' )
	),
	array(
		'id'      => 'redux-help-tab-2',
		'title'   => __( 'Theme Information 2', 'admin_folder' ),
		'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'admin_folder' )
	)
);
Redux::setHelpTab( $opt_name, $tabs );

// Set the help sidebar
$content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'admin_folder' );
Redux::setHelpSidebar( $opt_name, $content );


/*
 * <--- END HELP TABS
 */

    
    	$social_options = array(
                    'twitter'       => 'Twitter',
                    'facebook'      => 'Facebook',
                    'vk'            => 'Vk',
                    'google-plus'   => 'Google Plus',
                    'instagram'     => 'instagram',
                    'linkedin'      => 'LinkedIn',
                    'tumblr'        => 'Tumblr',
                    'pinterest'     => 'Pinterest',
                    'github-alt'    => 'Github',
                    'dribbble'      => 'Dribbble',
                    'flickr'        => 'Flickr',
                    'skype'         => 'Skype',
                    'youtube'       => 'Youtube',
                    'vimeo-square'  => 'Vimeo',
                    'reddit'        => 'Reddit',
                    'stumbleupon'   => 'Stumbleupon',
                    'github'        => 'Github',
                    'vine'          => 'Vine',
                    'rss'           => 'RSS',
                );
        
    


/*
 *
 * ---> START SECTIONS
 *
 */

Redux::setSection( $opt_name, array(
	'title'  => __( 'Basic Field', 'redux_builder_orocnanotn' ),
	'id'     => 'basic',
	'desc'   => __( 'Basic field with no subsections.', 'redux_builder_orocnanotn' ),
	'icon'   => 'el el-home',
	'fields' => array(
		array(
			'id'       => 'opt-text',
			'type'     => 'text',
			'title'    => __( 'Example Text', 'redux_builder_orocnanotn' ),
			'desc'     => __( 'Example description.', 'redux_builder_orocnanotn' ),
			'subtitle' => __( 'Example subtitle.', 'redux_builder_orocnanotn' ),
		)
	)
) );

Redux::setSection( $opt_name, array(
	'title' => __( 'Basic Fields', 'redux_builder_orocnanotn' ),
	'id'    => 'basic',
	'desc'  => __( 'Basic fields as subsections.', 'redux_builder_orocnanotn' ),
	'icon'  => 'el el-home'
) );

Redux::setSection( $opt_name, array(
	'title'      => __( 'Text', 'redux_builder_orocnanotn' ),
	'desc'       => __( 'For full documentation on this field, visit: ', 'redux_builder_orocnanotn' ) . '<a href="http://docs.reduxframework.com/core/fields/text/" target="_blank">http://docs.reduxframework.com/core/fields/text/</a>',
	'id'         => 'opt-text-subsection',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'text-example',
			'type'     => 'text',
			'title'    => __( 'Text Field', 'redux_builder_orocnanotn' ),
			'subtitle' => __( 'Subtitle', 'redux_builder_orocnanotn' ),
			'desc'     => __( 'Field Description', 'redux_builder_orocnanotn' ),
			'default'  => 'Default Text',
		),
	)
) );

Redux::setSection( $opt_name, array(
	'title'      => __( 'Text Area', 'redux_builder_orocnanotn' ),
	'desc'       => __( 'For full documentation on this field, visit: ', 'redux_builder_orocnanotn' ) . '<a href="http://docs.reduxframework.com/core/fields/textarea/" target="_blank">http://docs.reduxframework.com/core/fields/textarea/</a>',
	'id'         => 'opt-textarea-subsection',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'       => 'textarea-example',
			'type'     => 'textarea',
			'title'    => __( 'Text Area Field', 'redux_builder_orocnanotn' ),
			'subtitle' => __( 'Subtitle', 'redux_builder_orocnanotn' ),
			'desc'     => __( 'Field Description', 'redux_builder_orocnanotn' ),
			'default'  => 'Default Text',
		),
	)
) );

/*
 * <--- END SECTIONS
 */
// Home page
Redux::setSection( $opt_name, array(
	'title'  => __( 'Página de inicio', 'redux_builder_orocnanotn' ),
	'id'     => 'home',
	'desc'   => __( 'Slides en la página de inicio.', 'redux_builder_orocnanotn' ),
	'icon'   => 'el el-home',
	'fields' => array(
		// Slides
		array(
			'id'          => 'opt-slides',
			'type'        => 'slides',
			'title'       => __( 'Opciones de los slides', 'redux_builder_orocnanotn' ),
			'placeholder' => array(
				'title'       => __( 'Título', 'redux_builder_orocnanotn' ),
				'description' => __( 'Descripción', 'redux_builder_orocnanotn' ),
				'url'         => __( 'Link!', 'redux_builder_orocnanotn' ),
			),
		),

		// Presentacion
		array(
			'id'       => 'opt-presentacion',
			'type'     => 'editor',
			'title'    => __( 'Textarea Option - HTML Validated Custom', 'redux_builder_orocnanotn' ),
			'subtitle' => __( 'Subtitle', 'redux_builder_orocnanotn' ),
			'desc'     => __( 'This is the description field, again good for additional info.', 'redux_builder_orocnanotn' ),
			'args'     => array(
				'teeny'         => true,
				'textarea_rows' => 10
			),
		),

		// Call to action
		array(
			'id'          => 'call-to-action',
			'type'        => 'text',
			'title'       => __( 'Call to Action', 'redux_builder_orocnanotn' ),
			'placeholder' => array(
				'default' => __( 'Texto para el campo call to action', 'redux_builder_orocnanotn' ),
			),
		),

		// Sección destacados
		array(
			'id'       => 'seccion-destacados',
			'type'     => 'destacados',
			'title'    => __( 'Destacados', 'redux_builder_orocnanotn' ),
			'subtitle' => __( 'Contenido de los tres destacados de la home.', 'redux_builder_orocnanotn' ),
			'indent'   => true, // Indent all options below until the next 'section' option is set.
		),
		array(
			'id'    => 'destacado-icono1',
			'type'  => 'select',
			'data'  => 'elusive-icons',
			'title' => __( 'Icono', 'redux_builder_orocnanotn' ),
			'desc'  => __( 'Selecciona el icono para el destacado.', 'redux_builder_orocnanotn' ),
		),
		array(
			'id'    => 'destacado-titulo1',
			'type'  => 'text',
			'title' => __( 'Titulo', 'redux_builder_orocnanotn' ),
		),
		array(
			'id'    => 'destacado-contenido1',
			'type'  => 'text',
			'title' => __( 'Contenido', 'redux_builder_orocnanotn' ),
		),
		array(
			'id'    => 'destacado-link1',
			'type'  => 'text',
			'title' => __( 'Link', 'redux_builder_orocnanotn' ),
		),
		array(
			'id'    => 'destacado-icono2',
			'type'  => 'select',
			'data'  => 'elusive-icons',
			'title' => __( 'Icono', 'redux_builder_orocnanotn' ),
			'desc'  => __( 'Selecciona el icono para el destacado.', 'redux_builder_orocnanotn' ),
		),
		array(
			'id'    => 'destacado-titulo2',
			'type'  => 'text',
			'title' => __( 'Titulo', 'redux_builder_orocnanotn' ),
		),
		array(
			'id'    => 'destacado-contenido2',
			'type'  => 'text',
			'title' => __( 'Contenido', 'redux_builder_orocnanotn' ),
		),
		array(
			'id'    => 'destacado-link2',
			'type'  => 'text',
			'title' => __( 'Link', 'redux_builder_orocnanotn' ),
		),
		array(
			'id'    => 'destacado-icono3',
			'type'  => 'select',
			'data'  => 'elusive-icons',
			'title' => __( 'Icono', 'redux_builder_orocnanotn' ),
			'desc'  => __( 'Selecciona el icono para el destacado.', 'redux_builder_orocnanotn' ),
		),
		array(
			'id'    => 'destacado-titulo3',
			'type'  => 'text',
			'title' => __( 'Titulo', 'redux_builder_orocnanotn' ),
		),
		array(
			'id'    => 'destacado-contenido3',
			'type'  => 'text',
			'title' => __( 'Contenido', 'redux_builder_orocnanotn' ),
		),
		array(
			'id'    => 'destacado-link3',
			'type'  => 'text',
			'title' => __( 'Link', 'redux_builder_orocnanotn' ),
		),
		array(
			'id'     => 'section-end',
			'type'   => 'section',
			'indent' => false, // Indent all options below until the next 'section' option is set.
		),
		array(
			'id'   => 'section-info',
			'type' => 'info',
			'desc' => __( 'Primer destacado de la home.', 'redux_builder_orocnanotn' ),
		),

		// Boxes (Sin añadir a la pantilla)
		array(
			'id'          => 'opt-boxes',
			'type'        => 'slides',
			'title'       => __( 'Boxes Home page', 'redux_builder_orocnanotn' ),
			'placeholder' => array(
				'title'       => __( 'Título', 'redux_builder_orocnanotn' ),
				'description' => __( 'Descripción', 'redux_builder_orocnanotn' ),
				'url'         => __( 'Link!', 'redux_builder_orocnanotn' ),
				'sort'        => __( 'thumb', 'redux_builder_orocnanotn' ),
			),
		),
		array(
			'id'       => 'select-category',
			'type'     => 'select',
			'title'    => __('Selecciona una categoría', 'redux_builder_orocnanotn'),
			'data'     => 'category',
			// Must provide key => value pairs for select options
		),

		array(
		    'id'       => 'social-icon',
		    'type'     => 'sortable',
		    'title'    => __('Iconos sociales', 'redux_builder_orocnanotn'),
		    'subtitle' => __('Ejem. twiter.com.', 'redux_builder_orocnanotn'),
		    'mode'     => 'text',
		    'options'  => $social_options,
		    ),
		    // For checkbox mode





		// Slides
		// array(
		//     'id'          => 'opt-slides',
		//     'type'        => 'slides',
		//     'title'       => __( 'Opciones de los slides', 'redux_builder_orocnanotn' ),
		//     'placeholder' => array(
		//         'title'       => __( 'Título', 'redux_builder_orocnanotn' ),
		//         'description' => __( 'Descripción', 'redux_builder_orocnanotn' ),
		//         'url'         => __( 'Link!', 'redux_builder_orocnanotn' ),
		//     ),
		// ),

	)
) );

// Redux::setSection( $opt_name, array(
//     'title'      => __( 'Presentación', 'redux_builder_orocnanotn' ),
//     'id'         => 'presentacion',
//     'desc'       => __( 'For full documentation on this field, visit: ', 'redux_builder_orocnanotn' ) . '<a href="//docs.reduxframework.com/core/fields/textarea/" target="_blank">docs.reduxframework.com/core/fields/textarea/</a>',
//     'subsection' => true,
//     'fields'     => array(
//         array(
//             'id'       => 'opt-presentacion',
//             'type'     => 'editor',
//             'title'    => __( 'Textarea Option - HTML Validated Custom', 'redux_builder_orocnanotn' ),
//             'subtitle' => __( 'Subtitle', 'redux_builder_orocnanotn' ),
//             'desc'     => __( 'This is the description field, again good for additional info.', 'redux_builder_orocnanotn' ),
//             'args'   => array(
// 	            'teeny'            => true,
// 	            'textarea_rows'    => 10
//             )
//         )
//     )
// ) );