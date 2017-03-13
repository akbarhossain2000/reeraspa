<?php

function better_comments( $comment, $args, $depth ) {
	global $post;
	$author_id = $post->post_author;
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments. 
		?>
		
	<div class="comments-area" id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comm-title"><span class="pingback-heading"><h3>User <strong>comment</strong></h3></div>
	<?php
		//break;
		//default :
		// Proceed with normal comments. ?>
		<div class="comment-box" id="li-comment-<?php comment_ID(); ?>">
			<article id="comment-<?php comment_ID(); ?>" <?php comment_class('clr'); ?>>
				<div class="comment wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
				<div class="author-thumb">
					<?php echo get_avatar( $comment, 45 ); ?>
				</div><!-- .comment-author -->
				<div class="comment-info">
					<strong><?php comment_author_link(); ?></strong> - <?php printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>', esc_url( get_comment_link( $comment->comment_ID ) ), get_comment_time( 'c' ), sprintf( _x( '%1$s', '1: date', 'reera_text' ), get_comment_date() ) 
					); ?> 
				
				<?php esc_html_e( 'at', 'reera_text' ); ?> <?php comment_time(); ?></div>
						<div class="text">
							<?php if ( '0' == $comment->comment_approved ) : ?>
								<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'twenties' ); ?></p>
							<?php endif; ?>
							
							<?php comment_text(); ?>
						</div>
						<a href="#" class="theme-btn dark-btn reply-btn"><span class="flaticon-chat57"></span>&ensp; Reply</a>
						<?php comment_reply_link( array_merge( $args, array(
							'reply_text' => esc_html__( 'Reply', 'twenties' ),
							'depth'      => $depth,
							'before_link'=> '<span class="flaticon-chat57"></span>&ensp;',
							'max_depth'	 => $args['max_depth'] )
						) ); ?>
				</div><!-- .comment-details -->
			</article><!-- #comment-## -->
		</div>
	</div>
	<?php
		break;
	endswitch; // End comment_type check.
}