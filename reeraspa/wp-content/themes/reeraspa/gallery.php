<?php
/**
*	Template Name: Gallery Page 
**/
	get_header();
?>   
    
    <!--Page Title-->
    <?php
		get_template_part('/includefile/content', 'breadcrumbs');

		function custom_page_title($page_title){
			
			$title = "Our Gallery";
			
			return $title;
		}
	
	?>
    
    
    
    <!--Image Gallery Section-->
    <section class="image-gallery four-column">
	<?php
		$paged		= (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
		$g_args		= array(
			'post_type'		=> 'gallery_post',
			'posts_per_page'=> 12,
			'paged'			=> $paged,
		);
		
		$g_data		= new WP_Query($g_args);
		//$g_data		= query_posts($g_args);
		
		if($g_data->have_posts()):
	?>
    	<div class="auto-container">
            <div class="sec-title">
                <p><?php echo $reera_theme[$prefix.'_rgsubtitle']; ?></p>
                <div class="title"><h2><?php echo $reera_theme[$prefix.'_rgtitle']; ?></h2></div>
            </div>
            
            <div class="filters">
            	<ul class="filter-tabs clearfix anim-3-all">
                    <li class="filter" data-role="button" data-filter="all">All</li>
				<?php
					$taxonomy = 'gallery_category';
					$terms = get_terms($taxonomy);
					
					foreach($terms as $gterm) {
				?>
					<li class="filter" data-role="button" data-filter=".<?php echo $gterm->slug; ?>"><?php echo $gterm->name; ?></li>
                    
				<?php
					}
				?>
                </ul>
            </div>
        </div>  
          
        <div class="images-container">
        	<div class="auto-container">
                <div class="filter-list row clearfix">
                <?php
					while($g_data->have_posts()): $g_data->the_post();
					//while(have_posts()): the_post();
					
					$gimg_id	= get_post_thumbnail_id();
					$gimg_url	= wp_get_attachment_image_src($gimg_id, 'gallery_image', true);
					$gimg_ligtbox_url	= wp_get_attachment_image_src($gimg_id, '', true);
					
					$gpid	= get_the_ID();
					$g_term = get_the_terms($gpid, 'gallery_category');
					
				?>
                    <!--Image Box-->
                    <div class="col-md-3 col-sm-4 col-xs-6 image-box mix mix_all<?php foreach($g_term as $gcterm){ echo ' '.$gcterm->slug; } ?>">
                        <div class="inner-box">
                            <figure class="image"><a href="<?php echo $gimg_url[0]; ?>" class="lightbox-image"><img src="<?php echo $gimg_url[0]; ?>" alt=""></a></figure>
                            <a href="<?php echo $gimg_ligtbox_url[0]; ?>" class="zoom-btn lightbox-image"></a>
                        </div>
                    </div>
                <?php
					endwhile;
				?>
                </div>
			
				<br>
				<!-- Theme Pagination -->
				<div class="theme-pagination text-left">
				
				<?php
					$inc_path = dirname(__File__).'/includefile/';
					if( file_exists( $inc_path.'paginate.php' ) ) {
						require_once($inc_path.'paginate.php');
					}
					
					if (function_exists(custom_pagination)) {
						custom_pagination($g_data->max_num_pages,"",$paged);
					}
				?>
				</div>
			</div>
        </div>
    <?php
		endif;
		wp_reset_postdata();
	?> 
    </section>
    
    
    <!--Sponsors-->
    <section class="sponsors">
    	<div class="auto-container">
			
        </div>
    </section>
    
<?php
	get_footer();
