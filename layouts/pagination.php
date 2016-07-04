<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 30/6/16
 * Time: 18:15
 */
// Previous/next page navigation.

the_posts_pagination( array(
	'prev_text'          => __( 'Previous page', 'twentysixteen' ),
	'next_text'          => __( 'Next page', 'twentysixteen' ),
	'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page',
			'twentysixteen' ) . ' </span>',
) );
