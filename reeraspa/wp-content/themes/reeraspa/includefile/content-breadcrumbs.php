<?php

?>

<section class="page-title" style="background-image:url(<?php echo esc_url(get_template_directory_uri()); ?>/images/background/page-title-bg.jpg);">
	<div class="auto-container">
		<div class="clearfix">
			<div class="page-name"><h1><span><?php echo custom_page_title($page_tite); ?></span></h1></div>
			
			<!--Bread Crumb-->
			<div class="bread-crumb">
			<?php
				if(! is_single() && !is_search()){
			?>
				<a href="<?php bloginfo('home'); ?>">Home</a> <span class="fa fa-angle-right"></span> <a href="javascript:void(0);"><?php WP_title('', true); ?></a> 
			<?php
				}else if( is_search() ){
			?>
				<a href="<?php bloginfo('home'); ?>">Home</a> <span class="fa fa-angle-right"></span> <a href="<?php echo esc_url(get_permalink(get_page_by_title(get_the_title(get_option('page_for_posts', true))))); ?>"><?php echo get_the_title( get_option('page_for_posts', true) ); ?></a> <span class="fa fa-angle-right"></span> <a href="javascript:void(0);"><?php WP_title('', true); ?></a>
			<?php
				}else{
			?>
				<a href="<?php bloginfo('home'); ?>">Home</a> <span class="fa fa-angle-right"></span> <a href="<?php echo esc_url(get_permalink(get_page_by_title(get_the_title(get_option('page_for_posts', true))))); ?>"><?php echo get_the_title( get_option('page_for_posts', true) ); ?></a> <span class="fa fa-angle-right"></span> <a href="javascript:void(0);"><?php the_title(); ?></a>
			<?php
				}
			?>
			</div>
		</div>
	</div>
</section>

