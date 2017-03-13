<?php
	get_header();
?>    
    
    <!--Page Title-->
    <?php
		get_template_part('/includefile/content', 'breadcrumbs');

		function custom_page_title($page_title){
			
			$title = "Pricing Details";
			
			return $title;
		}
	
	?>
    
    
    
    <!--Sidebar Page-->
    <div class="sidebar-page blog-page">
    	<div class="auto-container">
        	<div class="row clearfix">
			<!--Content Side-->	
            <?php
				if(have_posts()):
				$pp_prefix = "_prp_";
				while(have_posts()): the_post();
				
				$prpid	= get_the_ID();
				
				$prpicon	= get_post_meta($prpid, $pp_prefix.'cssicon', true);
				$prpvat	= get_post_meta($prpid, $pp_prefix.'vat', true);
				$prpitems	= get_post_meta($prpid, $pp_prefix.'gfield', true);
				
				//topViewPost(get_the_ID());
			?>
                <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                    <section class="blog-section">
                        <div class="title">
                            <h3><span class="<?php echo $prpicon; ?>"></span> <?php the_title(); ?></h3>
                        </div>
                        
                        <!--Blog Post-->
                        <div class="blog-post">
                            <article class="column-inner">
                                <div class="lower-part">
                                    <div class="post-date"><span class="day"><?php the_time('d'); ?></span> <span style="text-transform:uppercase;" class="month"><?php the_time('M'); ?></span></div>
                                    <div class="post-text">
									<?php
										the_content();
									?>
									<div class="accordion-box">
									<?php
										$equal_price= 0;
										foreach($prpitems as $prpeitem) {
											
										$price = intval($prpeitem[$pp_prefix.'itemprice']);
										
										$equal_price += $price;
									?>
										
										<div class="acc-block">
											<div class="acc-btn active"><?php echo $prpeitem[$pp_prefix.'itemtitle']; ?><span class="pull-right"><?php echo "tk ".$prpeitem[$pp_prefix.'itemprice']; ?></span></div>
											<div class="acc-content current">
												<div class="content"><em><?php echo $prpeitem[$pp_prefix.'shdesc']; ?></em> </div>
											</div>
										</div>
										
									<?php
										}	
										$total_price = $equal_price;
										$total_vat = ($total_price*$vatper)/100;
									?>
									
									</div>
									</div>
                                </div>
                            </article>
                            
                        </div>
                    
                    </section>
                 
                </div>
			<?php
				endwhile;
				endif;
			?>
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