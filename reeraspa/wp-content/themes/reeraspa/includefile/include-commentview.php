<?php

function my_comments_callback( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
 
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
 
			<div class="comment-content"><?php comment_text(); ?></div>
 
			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'twentyeleven' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div>
		</article>
	</li>
	<?php
}


/* if( file_exists( $inc_path.'include-commentview.php' ) ) {
	require_once($inc_path.'include-commentview.php');
} */
?>

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
	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="pingback-entry"><span class="pingback-heading"><?php esc_html_e( 'Pingback:', 'twenties' ); ?></span> <?php comment_author_link(); ?></div>
	<?php
		break;
		default :
		// Proceed with normal comments. ?>
	<li id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" <?php comment_class('clr'); ?>>
			<div class="comment-author vcard">
				<?php echo get_avatar( $comment, 45 ); ?>
			</div><!-- .comment-author -->
			<div class="comment-details clr">
				<header class="comment-meta">
					<cite class="fn"><?php comment_author_link(); ?></cite>
					<span class="comment-date">
					<?php printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						sprintf( _x( '%1$s', '1: date', 'twenties' ), get_comment_date() )
					); ?> <?php esc_html_e( 'at', 'twenties' ); ?> <?php comment_time(); ?>
					</span><!-- .comment-date -->
				</header><!-- .comment-meta -->
				<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'twenties' ); ?></p>
				<?php endif; ?>
				<div class="comment-content entry clr">
					<?php comment_text(); ?>
				</div><!-- .comment-content -->
				<div class="reply comment-reply-link">
					<?php comment_reply_link( array_merge( $args, array(
						'reply_text' => esc_html__( 'Reply to this message', 'twenties' ),
						'depth'      => $depth,
						'max_depth'	 => $args['max_depth'] )
					) ); ?>
				</div><!-- .reply -->
			</div><!-- .comment-details -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // End comment_type check.
}



/* function crunchify_move_comment_form_below( $fields ) { 
    $comment_field = $fields['comment']; 
    unset( $fields['comment'] ); 
    $fields['comment'] = $comment_field; 
    return $fields; 
} 
add_filter( 'comment_form_fields', 'crunchify_move_comment_form_below' ); */ ?>

<!--Comments Area-->
                           <!-- <div class="comments-area">
                                <div class="comm-title"><h3>User <strong>comment</strong></h3></div>
                                <div class="comment-box">
                                    <div class="comment wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                        <div class="author-thumb"><img src="<?php //echo esc_url(get_template_directory_uri()); ?>/images/resource/author-thumb-2.jpg" alt=""></div>
                                        <div class="comment-info"><strong>Johnathan Doe</strong> - posted 2 minutes ago</div>
                                        <div class="text">Whether you need to create a brand from scratch, including marketing materials and a beautiful and functional website or whether you are looking for a design.</div>
                                        <a href="#" class="theme-btn dark-btn reply-btn"><span class="flaticon-chat57"></span>&ensp; Reply</a>
                                    </div>
                                    
                                    <div class="comment reply-comment wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                        <div class="author-thumb"><img src="<?php //echo esc_url(get_template_directory_uri()); ?>/images/resource/author-thumb-3.jpg" alt=""></div>
                                        <div class="comment-info"><strong>Johnathan Doe</strong> - posted 2 minutes ago</div>
                                        <div class="text">Whether you need to create a brand from scratch, including marketing materials and a beautiful and functional website or whether you are looking for a design.</div>
                                        <a href="#" class="theme-btn dark-btn reply-btn"><span class="flaticon-chat57"></span>&ensp; Reply</a>
                                    </div>
                                    
                                    <div class="comment wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                        <div class="author-thumb"><img src="<?php //echo esc_url(get_template_directory_uri()); ?>/images/resource/author-thumb-2.jpg" alt=""></div>
                                        <div class="comment-info"><strong>Johnathan Doe</strong> - posted 2 minutes ago</div>
                                        <div class="text">Whether you need to create a brand from scratch, including marketing materials and a beautiful and functional website or whether you are looking for a design.</div>
                                        <a href="#" class="theme-btn dark-btn reply-btn"><span class="flaticon-chat57"></span>&ensp; Reply</a>
                                    </div>
                                    
                                </div>
                            </div>-->
                <?php
				/* if(have_comments()){
					wp_list_comments( array( 'callback' => 'better_comments' ) );
				} */
				?>
                            <!-- Comment Form -->
                            <!--<div class="comment-form wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
							<div class="row clearfix">
								<div class="col-md-12 col-sm-12 col-xs-12">
<?php
	/* $comment_args = array( 
	'title_reply'=> '<div class="comm-title">' .
					'<h3>Post a <strong>comment</strong></h3>'.
					'</div>',

	'fields' => apply_filters( 'comment_form_default_fields', array(

	'author' => '<div class="form-group">' .
	'<div class="form-group-inner">' .
	'<div class="icon-box">' .
	'<label for="your-name">' .
	'<span class="icon flaticon-profile7"></span>' .
	'</label></div>' .
	'<div class="field-outer">' .
	'<input id="author" name="author" type="text" placeholder="Your Name"' . $aria_req . ' /></div></div></div>',   

    'email'  => '<div class="form-group">' .
	'<div class="form-group-inner"><div class="icon-box">' .
	'<label for="your-name">' .
	'<span class="icon flaticon-new100"></span>' .
	'</label></div>' .
	'<div class="field-outer">' .
    '<input id="email" name="email" type="text" placeholder="Your Email"' . $aria_req . ' /></div></div></div>',

    'url'    => '' ) ),

    'comment_field' => '<div class="form-group">' .
				'<div class="form-group-inner">' .
                '<textarea id="comment" name="comment" cols="45" rows="8" placeholder="Your Mesage" aria-required="true"></textarea>' .
                '</div>'.
				'</div>',

    'comment_notes_before' => '',
	'label_submit'	=> 'Add Comment',

);
comment_form($comment_args); */
?>
                                
                                </div>    
                            </div>
                        </div>-->

<?php						
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
      <div class="comment-author vcard">
         <?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?>

         <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.') ?></em>
         <br />
      <?php endif; ?>

      <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>

      <?php comment_text() ?>

      <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
     </div>
<?php
        }