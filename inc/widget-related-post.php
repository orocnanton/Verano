<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 6/7/16
 * Time: 1:01
 */
/*-----------------------------------------------------------------------------------*/

/* RELATED POSTS WIDGET
/*-----------------------------------------------------------------------------------*/

class verano_widget_related_posts extends WP_Widget {

	function __construct() {
		parent::__construct(
			'verano_widget_related_posts',
			'verano Related Posts',
			array( 'description' => 'Muestra entradas relacionados en la pagina single.' )
		);
	}

	public function form( $instance ) {
		$defaults = array(
			'title'      => 'Te puede interesar',
			'postcount'  => '3',
			'allformats' => false
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title: </label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
				   name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
				   value="<?php echo esc_attr( $instance['title'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'postcount' ); ?>">Number of Posts to show: </label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'postcount' ); ?>"
				   name="<?php echo $this->get_field_name( 'postcount' ); ?>" type="number"
				   value="<?php echo esc_attr( $instance['postcount'] ); ?>" min="1" max="6"/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'allformats' ); ?>">Show All Post Formats: </label>
			<input id="<?php echo $this->get_field_id( 'allformats' ); ?>"
				   name="<?php echo $this->get_field_name( 'allformats' ); ?>"
				   type="checkbox" <?php checked( $instance['allformats'], 'on' ); ?> />
		</p>
		<?php
	}

	public function widget( $args, $instance ) {
		if ( is_single() ) {
			global $post;
			$verano_related_posts = array(
				'numberposts'  => $instance['postcount'],
				'category__in' => wp_get_post_categories( $post->ID ),
				'meta_key'     => '_thumbnail_id',
				'post__not_in' => array( $post->ID ),
			);
			if ( ! isset( $instance['allformats'] ) ) {
				$verano_related_posts['tax_query'] = array(
					array(
						'taxonomy' => 'post_format',
						'field'    => 'slug',
						'terms'    => array(
							'post-format-aside',
							'post-format-audio',
							'post-format-chat',
							'post-format-gallery',
							'post-format-image',
							'post-format-link',
							'post-format-quote',
							'post-format-status',
							'post-format-video'
						),
						'operator' => 'NOT IN'
					)
				);
			}
			$verano_related_posts = get_posts( $verano_related_posts );
			if ( count( $verano_related_posts ) > 0 ) {
				?>
				<section class="widget relatedposts">
					<?php if ( $instance['title'] != '' ) { ?>
						<h3 class="widget-title"><?php echo esc_html( $instance['title'] ); ?></h3>
						<hr>
					<?php }
					foreach ( $verano_related_posts as $post ) : setup_postdata( $post );
						$verano_related_posts = get_post_thumbnail_id();
						$verano_thumb_url     = wp_get_attachment_image_src( get_post_thumbnail_id(), 'verano' );
						?>
						<article class="third-col">
							<a href="<?php esc_url( the_permalink() ); ?>" class="feature">
								<?php
								$post_category = get_the_category();
								if ( $post_category ) {
									echo '<span class="category">' . esc_html( $post_category[0]->name ) . '</span> ';
								}
								?>
								<img src="<?php echo esc_attr( $verano_thumb_url[0] ); ?>"
									 alt="<?php esc_attr( the_title() ); ?>">
							</a>
							<h3 class="container"><a
									href="<?php esc_url( the_permalink() ); ?>"><?php esc_html( the_title() ); ?></a>
							</h3>
							<p class="container"><?php if ( function_exists( 'verano_truncate_by_words' ) ) {
									echo esc_html( verano_truncate_by_words( get_the_excerpt(), 90, '...' ) );
								} else {
									the_excerpt();
								} ?></p>
						</article>
						<?php
					endforeach;
					wp_reset_postdata();
					?>
				</section>
				<?php
			}
		}
	}



	public function update( $new_instance, $old_instance ) {
		$instance = array();
		foreach ( $new_instance as $key => $value ) {
			$instance[ $key ] = ( ! empty( $new_instance[ $key ] ) ) ? strip_tags( $new_instance[ $key ] ) : '';
		}

		return $instance;
	}

}
