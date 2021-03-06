<?php
	get_header();
?>    
    
    <!--Page Title-->
    <?php
		get_template_part('/includefile/content', 'breadcrumbs');

		function custom_page_title($page_title){
			
			$title = "Our Blog";
			
			return $title;
		}
	
	?>
    
    
    
    <!--Sidebar Page-->
    <div class="sidebar-page blog-page">
    	<div class="auto-container">
        	<div class="row clearfix">
            <?php
				$paged		= (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
				$blp_args	= array(
					'post_type'		=> 'post',
					'posts_per_page'=> 5,
					'paged'			=> $paged,
				);
				
				$blp_data	= new WP_Query($blp_args);
				
				if($blp_data->have_posts()):
			?>
                <!--Content Side-->	
                <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                    <section class="blog-section">
                        <div class="title">
                            <h2><?php echo $reera_theme[$prefix.'_blptitle']; ?></h2>
                        </div>
                    <?php
						while($blp_data->have_posts()): $blp_data->the_post();
					?>
                        <!--Blog Post-->
                        <div class="blog-post wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <article class="column-inner">
                            <?php
								if(has_post_thumbnail()){
									
								$blipimg_id = get_post_thumbnail_id();
								$blipimg_url= wp_get_attachment_image_src($blipimg_id, 'blog_image', true);
							?>
								<figure class="image-box">
                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo $blipimg_url[0]; ?>" alt="" title="Blog"></a>
                                    <!--<div class="post-options">
                                    	<a href="#" class="plus-icon img-circle"><span class="fa fa-plus"></span></a>
                                        <a href="#" class="heart-icon img-circle"><span class="fa fa-heart-o"></span></a>
                                    </div>-->
                                </figure>
							
							<?php
								}
								
								$total_comment= wp_count_comments($post->ID);
								$show_cmnt = $total_comment->approved;
							?>
                                <div class="lower-part">
                                    <div class="post-date"><span class="day"><?php the_time('d'); ?></span> <span style="text-transform:uppercase;" class="month"><?php the_time('M'); ?></span></div>
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <div class="post-info"><a href="#"><span class="icon flaticon-users81"></span> &ensp;<?php the_author(); ?></a> &ensp; <!--<a href="<?php the_permalink(); ?>"><span class="icon flaticon-speechbubble65"></span> &ensp;<?php //echo $show_cmnt; ?> comments</a>--></div>
                                    <div class="post-text">
									<?php
										echo wp_trim_words(get_the_content(), 90, ' ...');
									?>
									</div>
                                    <div class="text-right link"><a href="<?php the_permalink(); ?>" class="read-more">Read More</a></div>
                                </div>
                            </article>
                        </div>
					<?php
						endwhile;
					?>
                    </section>
                    
                    <br>
					
                    <!-- Theme Pagination -->
                    <div class="theme-pagination text-left">
					<?php
						the_posts_pagination(array(
							'mid_size'          => 2,
							'prev_text' 		=> '<span class="flaticon-left222"></span>&ensp; Prev',
							'next_text'			=> 'Next&ensp;<span class="flaticon-right11"></span>',
							'screen_reader_text'=> ' ',
							'type'				=> 'list',
						));
					?>
                    </div>
                <?php
					endif;
				?>
                    
                </div>
                <!--Content Side-->
                
                <!--Sidebar-->	
                <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                    <aside class="sidebar">
                    
                        <!-- Search Form -->
                        <div class="widget search-form">
                            
                        <?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>
							<form method="get" action="<?php echo esc_url( home_url('/') ); ?>" role="search">
								<div class="form-group">
									<input type="search" name="s" id="<?php echo $unique_id; ?>" value="<?php echo get_search_query(); ?>" placeholder="Search Blog" required>
									<button type="submit" class="theme-btn"><span class="fa fa-search"></span></button>
								</div>
							</form>
                            
                        </div>
                        
					<?php
						$blp_args	= array(
							'post_type'		=> 'post',
							'posts_per_page'=> 5,
						);
						
						$blp_data	= new WP_Query($blp_args);
						
						if($blp_data->have_posts()):
					?>
                        <!-- Recent Posts -->
                        <div class="widget recent-posts wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="sec-title"><h3>Latest Articles</h3></div>
                        <?php
							while($blp_data->have_posts()): $blp_data->the_post();
							
							$blipimg_id = get_post_thumbnail_id();
							$blipimg_url= wp_get_attachment_image_src($blipimg_id);
						?>
                            <div class="post">
                                <div class="post-thumb"><a href="<?php the_permalink(); ?>"><img src="<?php echo $blipimg_url[0]; ?>" alt=""></a></div>
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <div class="post-info"><?php the_time('l d, Y'); ?></div>
                            </div>
                        <?php
							endwhile;
							wp_reset_postdata();
						?>
                        </div>
					<?php
						endif;
					?>
                    
					<?php 
						$popargs	= array(
							'meta_key'	=> '_wpb_post_views_count',
							'orderby'	=> 'meta_value_num',
							'order'		=> 'DESC',
							'posts_per_page'=> 5
						);
						
						query_posts($popargs);
						if(have_posts()):
						
					?>
                        <!-- Popular Categories -->
                        <div class="widget recent-posts wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="sec-title"><h3>Popular Posts</h3></div>
                        <?php
							
							while(have_posts()): the_post();
							
							$popimg_id		= get_post_thumbnail_id();
							$popimg_url		= wp_get_attachment_image_src($popimg_id);
						?>
                            <div class="post">
                                <div class="post-thumb"><a href="<?php the_permalink(); ?>"><img src="<?php echo $popimg_url[0]; ?>" alt=""></a></div>
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <div class="post-info"><?php the_time('l d, Y'); ?></div>
                            </div>
						<?php
							endwhile;
							wp_reset_query();
						?>  
                        </div>
					<?php
						endif;
					?>
                        
					<?php
						$rg_args = array(
							'post_type'		=> 'gallery_post',
							'posts_per_page'=> 8,
						);
						
						$rg_data	= new WP_Query($rg_args);
						if($rg_data->have_posts()):
					?>
                        <!-- Flickr Gallery -->
                        <div class="widget  flickr-posts wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="sec-title"><h3>ReeraSpa Gallery</h3></div>
                            <div class="widget-content">
                                <div class="clearfix">
								<?php
									while($rg_data->have_posts()): $rg_data->the_post();
									
									$rgimg_id = get_post_thumbnail_id();
									$rgimg_url = wp_get_attachment_image_src($rgimg_id);
									$rgimg_full = wp_get_attachment_image_src($rgimg_id, '', true);
								?>
                                    <figure class="image"><a class="lightbox-image" href="<?php echo $rgimg_full[0]; ?>"><img src="<?php echo $rgimg_url[0]; ?>" alt=""></a></figure>
								<?php
									endwhile;
								?>
                                </div>
                            </div>
                        </div>
                    <?php
						endif;
					?>
                    </aside>
                
                    
                </div>
                <!--Sidebar-->
                
                
            </div>
        </div>
    </div>
    
    
    <!--Sponsors-->
    <section class="sponsors">
    	<div class="auto-container">
		
        </div>
    </section>
    
    
<?php

	get_footer();