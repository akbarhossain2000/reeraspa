<?php
/**
*	Template Name: About Page
**/
	get_header();
?>    
    
    <!--Page Title-->
    <?php
		get_template_part('/includefile/content', 'breadcrumbs');

		function custom_page_title($page_title){
			
			$title = "About Us";
			
			return $title;
		}
	
	?>
    
    
    
    <!--Features Section-->
    <section class="features-section">
    	<div class="auto-container">
        <?php
			if(have_posts()):
				the_post();
		?>	
            <div class="sec-title">
            	<p><?php echo $reera_theme[$prefix.'_abpsubtitle']; ?></p>
                <div class="title">
					<h2><?php echo $reera_theme[$prefix.'_abtitle']; ?></h2>
				</div>
            </div>
            
            <div class="column-outer row clearfix">
            
            	<!--Column-->
                <div class="col-md-12 col-sm-12 col-xs-12 text-column">
                    <div class="text svcon">
						<?php
							if(has_post_thumbnail()){
							$abcimg_id = get_post_thumbnail_id();
							$abcimg = wp_get_attachment_image_src($abcimg_id, 'service_image', true);
						?>
							<figure class="image"><img src="<?php echo $abcimg[0]; ?>" alt=""></figure>
						<?php
							}
						?>
                    	<?php the_content(); ?>
                    </div>
                </div>
            
            </div>
        
		<?php
			endif;
		?>    
        </div>  
          
    </section>
    
    
    <!--Our Team Section-->
    <section class="team-section pt-60 pb-20">
    	<div class="auto-container">
		<?php
			$rtm_args = array(
				'post_type'		=> 'reera_team',
				'posts_per_page'=> -1,
			);
			
			$rtm_data = new WP_Query($rtm_args);
			
			if($rtm_data->have_posts()):
			
			$rt_prefix = "_rtm_";
		?>
        	<div class="sec-title">
            	<p><?php echo $reera_theme[$prefix.'_tmsubtitle']; ?></p>
                <div class="title"><h2><?php echo $reera_theme[$prefix.'_tmstitle']; ?></h2></div>
            </div>
            
            <div class="row clearfix">
            <?php
				while($rtm_data->have_posts()): $rtm_data->the_post();
				
				$rtm_id		= get_the_ID();
				$ttype		= get_post_meta($rtm_id, $rt_prefix.'ttype', true);
				$rtmsocial 		= get_post_meta($rtm_id, $rt_prefix.'rtmgroup', true);
				$fb 		= $rtmsocial[0][$rt_prefix.'fb'];
				$twt 		= $rtmsocial[0][$rt_prefix.'twt'];
				$lin 		= $rtmsocial[0][$rt_prefix.'lin'];
				$gp 		= $rtmsocial[0][$rt_prefix.'gp'];
				
			?>
                <!--Team Member-->
            	<div class="col-md-3 col-sm-6 col-xs-12 member">
                	<article class="inner-box">
                        <figure class="image">
						<?php
							if(has_post_thumbnail()){
								
							$rtmimg_id	= get_post_thumbnail_id();
							$rtmimg_url	= wp_get_attachment_image_src($rtmimg_id, 'tmember_image', true);
						?>
                        	<a href="#"><img src="<?php echo $rtmimg_url[0]; ?>" alt=""></a>
						<?php
							}
						?>
                            <div class="overlay-box">
                                <h4><?php the_title(); ?></h4>
                                <div class="text">
                                    <p><?php the_content(); ?></p>
                                    <div class="social-links">
                                    	<a href="<?php echo $fb; ?>" class="icon fa fa-facebook-f" target="_blank"></a>
                                        <a href="<?php echo $twt; ?>" class="icon fa fa-twitter" target="_blank"></a>
                                        <a href="<?php echo $lin; ?>" class="icon fa fa-linkedin" target="_blank"></a>
                                        <a href="<?php echo $gp; ?>" class="icon fa fa-google-plus" target="_blank"></a>
                                    </div>
                                </div>
                            </div>
                        </figure>
                        <div class="text">
                            <h3><a href="<?php echo get_the_permalink($reera_theme[$prefix.'_abcontent']); ?>"><?php the_title(); ?></a></h3>
                            <h4><?php echo $ttype; ?></h4>
                            <div class="desc"><p><?php the_content(); ?></p></div>
                        </div>
                    </article>
                </div>
            <?php
				endwhile;
			?>
            </div>
        <?php
			endif;
		?>
        </div>
    </section>
	
	<div class="clearfix"></div>
    
<?php
	get_footer();