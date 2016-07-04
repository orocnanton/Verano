<?php
/**
 * Created by PhpStorm.
 * User: oscar
 * Date: 29/6/16
 * Time: 20:04
 */

// Initialize needed variables
$author             = get_user_by( 'id', get_query_var( 'author' ) );
$author_id          = $author->ID;
$author_name        = get_the_author_meta( 'display_name', $author_id );
$author_avatar      = get_avatar( get_the_author_meta( 'email', $author_id ), '82' );
$author_description = get_the_author_meta( 'description', $author_id );
$author_custom      = get_the_author_meta( 'author_custom', $author_id );

// If no description was added by user, add some default text and stats
if ( empty( $author_description ) ) {
	$author_description  = esc_html__( 'Este autor no tiene ninguna infomación en su perfil.', 'verano' );
	$author_description .= '<br />' . sprintf( esc_html__( 'So far %1s has created %2s blog entries.', 'verano' ), $author_name, count_user_posts( $author_id ) );
}
?>
<div class="author row">
	<div class="two_col">
		<?php echo $author_avatar; ?>
	</div>
	<div class="ten-col">
		<header class="entry-header">
			<h3 class="entry-title author-title">
			<?php printf(
				esc_html__( 'About %s', 'verano' )
				 ? '<span class="fn">' . $author_name . '</span>' : $author_name
			); ?>
			<?php // If user can edit his profile, offer a link for it ?>
			<?php if ( current_user_can( 'edit_users' ) || get_current_user_id() == $author_id ) : ?>
				<span class="fusion-edit-profile">(<a href="<?php echo admin_url( 'profile.php?user_id=' . $author_id ); ?>"><?php _e( 'Editar perfil', 'verano' ); ?></a>)</span>
			<?php endif; ?>
			</h3>
		</header>
		<?php echo $author_description; ?>
	</div>

<!--	<div class="author-social clearfix">-->
<!--		<div class="author-tagline">-->
<!--			--><?php //if ( $author_custom ) : ?>
<!--				--><?php //echo $author_custom; ?>
<!--			--><?php //endif; ?>
<!--		</div>-->
<!---->
<!--	</div>-->
</div>