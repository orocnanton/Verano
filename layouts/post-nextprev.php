<?php 

	/**
	 * NEXT / PREVIOUS POSTS
	 */
	
	$previous_post = get_previous_post();
	$next_post = get_next_post();

?>

	<section class="post-navigation">
		<?php if(!empty($previous_post)){
				$thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id($previous_post->ID), 'verano');
		?>
		<a href="<?php echo esc_url(get_permalink($previous_post->ID)); ?>" class="<?php if(!empty($next_post)){ echo 'two-col'; }else{ echo 'twelve-col'; }; ?> previous">
			<div class="background" style="background-image:url('<?php echo esc_url($thumb_url[0]); ?>');"></div>
			<span class="screen-reader-text"><?php  echo __( 'Previous post:', 'verano' ) ?></span>
			<span class="btn-block"><?php echo __('Anterior', 'verano'); ?></span>
			<div class="info">
				<?php
					$post_category = get_the_category($previous_post->ID);
					if($post_category){
						echo '<span>' . esc_html($post_category[0]->name) . '</span>';
					}
				?>
				<h4 class="title"><?php echo esc_html(get_the_title( $previous_post->ID )); ?></h4>
				<hr>
			</div>
		</a>
		<?php } ?>

		<?php if(!empty($next_post)){
				$thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id($next_post->ID), 'verano');
		?>
		<a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="<?php if(!empty($previous_post)){ echo 'two-col'; }else{ echo 'w3-col l12'; }; ?> next">
			<div class="background" style="background-image:url('<?php echo esc_url($thumb_url[0]); ?>');"></div>
			<span class="screen-reader-text"><?php  echo __( 'Next post:', 'twentysixteen' ) ?></span>
			<span class="btn-block"><?php echo __('Siguiente', 'verano'); ?></span>
			<div class="info">
				<?php 
					$post_category = get_the_category($next_post->ID);
					if($post_category){
						echo '<span>' . esc_html($post_category[0]->name) . '</span>';
					}
				?>
				<h4 class="title"><?php echo esc_html(get_the_title( $next_post->ID )); ?></h4>
				<hr>
			</div>
		</a>
		<?php } ?>

	</section>
