<?php

if( !function_exists( 'reeraspa_theme_setup' ) ) {
	
	function reeraspa_theme_setup() {
		
		load_theme_textdomain('reera_text', get_template_directory_uri().'/languages');
		
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'custom-background' );
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio',
		) );
		
		add_image_size('rs_main_slider', 1500, 800, true);
		add_image_size('rs_slider', 1170, 480, true);
		add_image_size('about_image', 832, 490, true);
		add_image_size('offer_image', 370, 251, true);
		add_image_size('tmember_image', 270, 310, true);
		add_image_size('gallery_image', 308, 270, true);
		add_image_size('blog_image', 871, 326, true);
		add_image_size('hblog_image', 320, 231, true);
		
		add_image_size('service_image', 571, 402, true);
		
		
		
		if(function_exists('register_nav_menus')) {
			register_nav_menus(array(
				'_theme_main_menu'	=> __('Main Menu', 'reera_text'),
				'_theme_footer_menu'=> __('Footer Menu', 'reera_text'),
			));
		}
		
	}
	
}
add_action( 'after_setup_theme', 'reeraspa_theme_setup' );


if(file_exists(dirname(__File__).'/includefile/nav_walker_divider.php')){
	require_once( dirname(__File__).'/includefile/nav_walker_divider.php' );
}


if( !function_exists( 'enqueue_style_and_script' ) ) {
	function enqueue_style_and_script() {
		wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css');
		wp_register_style('revolution', get_template_directory_uri().'/css/revolution-slider.css');
		wp_register_style('mstyle', get_template_directory_uri().'/css/style.css');
		wp_register_style('smain', get_template_directory_uri().'/style.css');
		wp_register_style('responsive', get_template_directory_uri().'/css/responsive.css');
		
		
		wp_register_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'),'', true);
		wp_register_script('rev', get_template_directory_uri().'/js/rev-plugins.js', array('jquery'),'', true);
		wp_register_script('revolution', get_template_directory_uri().'/js/revolution.min.js', array('jquery'),'', true);
		wp_register_script('bxslider', get_template_directory_uri().'/js/bxslider.js', array('jquery'),'', true);
		wp_register_script('fancybox', get_template_directory_uri().'/js/jquery.fancybox.pack.js', array('jquery'),'', true);
		wp_register_script('datetimepicker', get_template_directory_uri().'/js/jquery.datetimepicker.js', array('jquery'),'', true);
		wp_register_script('mixitup', get_template_directory_uri().'/js/mixitup.js', array('jquery'),'', true);
		wp_register_script('wow', get_template_directory_uri().'/js/wow.js', array('jquery'),'', true);
		wp_register_script('script', get_template_directory_uri().'/js/script.js', array('jquery'),'', true);
		
		wp_enqueue_style(array('bootstrap', 'revolution', 'mstyle', 'smain', 'responsive'));
		wp_enqueue_script(array('jquery', 'bootstrap', 'rev', 'revolution', 'bxslider', 'fancybox', 'datetimepicker', 'mixitup', 'wow', 'script'));
	}
}
add_action( 'wp_enqueue_scripts', 'enqueue_style_and_script' );


$redux_inc_path	= dirname(__File__).'/inc_lib/';
if(file_exists($redux_inc_path.'ReduxCore/framework.php')) {
	require_once($redux_inc_path.'ReduxCore/framework.php');
}
if(file_exists($redux_inc_path.'sample/theme_config.php')) {
	require_once($redux_inc_path.'sample/theme_config.php');
}


/*===== Custom Post Type =====*/
$inc_path = dirname(__File__).'/includefile/';
if( file_exists( $inc_path.'include-custom_post_register.php' ) ) {
	require_once($inc_path.'include-custom_post_register.php');
}
if( file_exists( $inc_path.'include_functions.php' ) ) {
	require_once($inc_path.'include_functions.php');
}
if( file_exists( $inc_path.'paginate.php' ) ) {
	require_once($inc_path.'paginate.php');
}


/*====== Metaboxes ======*/
$mtb_path	= dirname(__File__).'/metaboxes/';
if(	file_exists( $mtb_path.'init.php' ) ){
	require_once( $mtb_path.'init.php' );
}
if(	file_exists( $mtb_path.'functions.php' ) ){
	require_once( $mtb_path.'functions.php' );
}

/*===== Contact Form Service =====*/
if( file_exists( $inc_path.'contact-form_service.php' ) ) {
	require_once($inc_path.'contact-form_service.php');
}


add_filter( 'pre_get_posts', 'reera_cpt_search' );
function reera_cpt_search( $query ) {
	
    if ( $query->is_search ) {
	$query->set( 'post_type', array( 'post', 'plan_pricing' ) );
	//$query->set('cat', '-1');
	//$query->query_vars['posts_per_page'] = 5;
    }
    
    return $query;
    
}


/* function my_comments_callback( $comment, $args, $depth ) {
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
} */



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
