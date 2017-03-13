<?php
/**
*	Template Name: Front Page
**/
	get_header();
	

?>    
    
    <!-- Main Slider -->
    <section class="main-slider style-two default-banner">
    <?php
		$rs_args	= array(
			'post_type'		=> 'reera_slider',
			'posts_per_page'=> 5,
		);
		
		$rs_data	= new WP_Query($rs_args);
		
		if($rs_data->have_posts()):
	?>	
        <div class="tp-banner-container">
            <div class="tp-banner" >
                <ul>
                <?php
				  while($rs_data->have_posts()): $rs_data->the_post();
				  
				  $rs_img_id	= get_post_thumbnail_id();
				  $rs_img_url	= wp_get_attachment_image_src($rs_img_id, 'rs_main_slider', true);
				?>
                  <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-thumb="<?php echo $rs_img_url[0]; ?>"  data-saveperformance="off"  data-title=""> 
                    <img src="<?php echo $rs_img_url[0]; ?>"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
                    
                    
                    <div class="tp-caption lfb tp-resizeme"
                    data-x="center" data-hoffset="0"
                    data-y="center" data-voffset="-80"
                    data-speed="1500"
                    data-start="800"
                    data-easing="easeOutExpo"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.3"
                    data-endspeed="1200"
                    data-endeasing="Power4.easeIn">
                        <div class="bg-white">
						<?php
							if($reera_theme[$prefix.'_sp_title'] == true) {
								echo '<h2>';
									the_title();
								echo '</h2>';
								
							}else{
								echo '<h2>'.$reera_theme[$prefix.'_sc_title'].'</h2>';
							}
						?>
						</div>
                    </div>
                    
                    <div class="tp-caption lfb tp-resizeme"
                    data-x="center" data-hoffset="0"
                    data-y="center" data-voffset="10"
                    data-speed="1500"
                    data-start="1000"
                    data-easing="easeOutExpo"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.3"
                    data-endspeed="1200"
                    data-endeasing="Power4.easeIn">
                        <div class="title-p">
                            <p><?php echo $reera_theme[$prefix.'_cho_title']; ?></p>
                        </div>
                    </div>
                    
                    <div class="tp-caption lfb tp-resizeme"
                    data-x="center" data-hoffset="-105"
                    data-y="center" data-voffset="100"
                    data-speed="1500"
                    data-start="1200"
                    data-easing="easeOutExpo"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.3"
                    data-endspeed="1200"
                    data-endeasing="Power4.easeIn">
                        <div class="link-btn">
                            <a href="<?php echo get_the_permalink($reera_theme[$prefix.'_lmlink']); ?>" class="theme-btn btn-skew style-one"><?php echo $reera_theme[$prefix.'_learnmore']; ?></a>
                        </div>
                    </div>
                    
                    <div class="tp-caption lfb tp-resizeme"
                    data-x="center" data-hoffset="95"
                    data-y="center" data-voffset="100"
                    data-speed="1500"
                    data-start="1200"
                    data-easing="easeOutExpo"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.3"
                    data-endspeed="1200"
                    data-endeasing="Power4.easeIn">
                        <div class="link-btn">
                            <a href="<?php echo get_the_permalink($reera_theme[$prefix.'_bnlink']); ?>" class="theme-btn btn-skew style-two"><?php echo $reera_theme[$prefix.'_booknow']; ?></a>
                        </div>
                    </div>
                    
                  </li>
				<?php
				  endwhile;
				  wp_reset_postdata();
				?>
                </ul>
                
            </div>
        </div>
	<?php
		endif;
	?>
    </section>
    
    
    <!--Default Section-->
    <section class="default-section bg-grey">
    	<div class="auto-container">
        <?php
			$s_prefix = "_svc_";
			$s_args	= array(
				'post_type'		=> 'reera_service',
				'posts_per_page'=> 6,
			);
			
			$s_data		= new WP_Query($s_args);
			
			if($s_data->have_posts()):
		?>
            <!--Key Features-->
            <div class="key-features">
            	<div class="feature-outer">
                <?php
					$spage_id = $reera_theme[$prefix.'_hsvc'];
					while($s_data->have_posts()): $s_data->the_post();
					
					$sp_id = get_the_ID();
					$icon  = get_post_meta($sp_id, $s_prefix.'icon', true);
					$subtitle = get_post_meta($sp_id, $s_prefix.'subtitle', true);
				?>
                	<div class="feature-box wow fadeIn" data-wow-delay="0ms" data-wow-duration="1500ms"><a href="<?php echo get_the_permalink($spage_id); ?>"><span class="<?php echo $icon; ?>"></span><span class="small-text"><?php echo $subtitle; ?></span><h3><?php the_title(); ?></h3></a></div>
                <?php
					endwhile;
				?>
                </div>
            </div>
		<?php
			endif;
		?>
            
        </div>
    </section>    
    
    <!--Featured Section-->
    <section class="featured-section with-border-top bg-grey ov-h">
        <div class="auto-container">
            <div class="row clearfix">
            <?php
				$ab_args = array(
					'post_type'	=> 'page',
					'page_id'	=> $reera_theme[$prefix.'_abcontent'],
				);
				
				$ab_data = new WP_Query($ab_args);
				
				if($ab_data->have_posts()):
				
				while($ab_data->have_posts()): $ab_data->the_post();
			?>
                <div class="col-md-5 col-sm-12 col-xs-12 column pt-60">
                    <h3><?php echo $reera_theme[$prefix.'_abtitle']; ?></h3>
                    <div class="text">
                        <p>
							<?php echo wp_trim_words(get_the_content(), 90, ' ...'); ?>
						</p>
                        <a class="theme-btn btn-skew style-two btn-sm btn-flat mt-15" href="<?php the_permalink(); ?>"><?php echo $reera_theme[$prefix.'_abbtn']; ?></a>
                        <a class="theme-btn btn-skew style-one btn-sm btn-flat ml-15" href="<?php echo get_the_permalink($reera_theme[$prefix.'_cnbtnlink']); ?>"><?php echo $reera_theme[$prefix.'_cnbtn']; ?></a>
                    </div>
                </div>
                
                <div class="col-md-7 col-sm-12 col-xs-12 column">
				<?php
					if(has_post_thumbnail()){
					$abcimg_id = get_post_thumbnail_id();
					$abcimg = wp_get_attachment_image_src($abcimg_id, 'about_image', true);
				?>
                    <figure class="image"><img src="<?php echo $abcimg[0]; ?>" alt=""></figure>
				<?php
					}
				?>
                </div>
            <?php
				endwhile;
				endif;
			?>
            </div>
        </div>
    </section>
    
    <!--Offers Section-->
    <section class="offers-section">
        <div class="auto-container">
		<?php
			$offers_args = array(
				'post_type'		=> 'reera_offer',
				'posts_per_page'=> 3,
			);
			
			$offers_data = new WP_Query($offers_args);
			
			if($offers_data->have_posts()):
			
			$of_prefix = "_roff_";
		?>
            <div class="sec-title">
                <p><?php echo $reera_theme[$prefix.'_ofsubtitle']; ?></p>
                <div class="title"><h2><?php echo $reera_theme[$prefix.'_oftitle']; ?></h2></div>
            </div>
            
            <div class="row clearfix">
            <?php 
				while($offers_data->have_posts()): 
					$offers_data->the_post();
				$ofid	= get_the_ID();	
				$price = get_post_meta($ofid, $of_prefix.'price', true);
				$vdate = get_post_meta($ofid, $of_prefix.'date', true);
				$vtime = get_post_meta($ofid, $of_prefix.'time', true);
			?>
                <!--Offer-->
                <div class="col-md-4 col-sm-6 col-xs-12 offer wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <article class="inner-box">
                        <figure class="image">
						<?php
							if(has_post_thumbnail()) {
								
							$ofimg_id = get_post_thumbnail_id();
							$ofimg_url= wp_get_attachment_image_src($ofimg_id, 'offer_image', true);
						?>
                            <a href="#"><img src="<?php echo $ofimg_url[0]; ?>" alt=""></a>
						<?php
							}
						?>
                            <div class="overlay-box">
                                <div class="date"><span class="fa fa-calendar"></span> Valid Till &ensp; <?php echo $vdate; ?></div>
                                <div class="time"><span class="fa fa-clock-o"></span> <?php echo $vtime; ?></div>
                            </div>
                        </figure>
                        <div class="text">
                            <h3 class="clearfix"><a class="pull-left" href="#"><?php the_title(); ?></a> <span class="pull-right price"><?php echo 'tk '.$price; ?></span></h3>
                            <div class="desc"><p style="text-align: center;"><?php the_content(); ?></p></div>
                            <div class="link text-right"><a href="<?php echo get_the_permalink($reera_theme[$prefix.'_ofbtnlink']); ?>" class="theme-btn btn-skew style-two btn-sm"><?php echo $reera_theme[$prefix.'_ofbnbtn']; ?></a></div>
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
    
    <!--Our Team Section-->
    <section class="team-section pt-60 pb-20">
    	<div class="auto-container">
		<?php
			$rtm_args = array(
				'post_type'		=> 'reera_team',
				'posts_per_page'=> 4,
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
    
    <!--Image Gallery Section-->
    <section class="image-gallery four-column">
	<?php
		$g_args		= array(
			'post_type'		=> 'gallery_post',
			'posts_per_page'=> 12,
		);
		
		$g_data		= new WP_Query($g_args);
		
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
            
            </div>
        </div>
    <?php
		endif;
		wp_reset_postdata();
	?>   
    </section>
    
    <!--Pricing Section-->
    <section class="pricing-section style-one pt-60 pb-50">
        <div class="auto-container">
		<?php
			$prp_args = array(
				'post_type'		=> 'plan_pricing',
				'posts_per_page'=> 3,
			);
			
			$prp_data	= new WP_Query($prp_args);
			
			if($prp_data->have_posts()):
			
			$pp_prefix = "_prp_";
		?>
            <div class="sec-title">
                <p><?php echo $reera_theme[$prefix.'_prpsubtitle']; ?></p>
                <div class="title"><h2><?php echo $reera_theme[$prefix.'_prptitle']; ?></h2></div>
            </div>
            
            <div class="row clearfix">
            <?php
				$i = 1;
				while($prp_data->have_posts()): $prp_data->the_post();
				
				$prpid	= get_the_ID();
				
				$prpicon	= get_post_meta($prpid, $pp_prefix.'cssicon', true);
				$prpvat	= get_post_meta($prpid, $pp_prefix.'vat', true);
				if($prpvat != "") {
					$vatper = intval($prpvat);
				}else {
					$vatper = 0;
				}
				
				$prpitems	= get_post_meta($prpid, $pp_prefix.'gfield', true);
				
				if($i%3 == 0){
					$cl = "recommended";
				}
			?>
                <!--Price Column-->
                <article class="col-md-4 col-sm-6 col-xs-12 price-column <?php echo $cl; ?>">
                    <div class="column-inner">
                        <div class="table-header"><span class="<?php echo $prpicon; ?>"></span> <?php the_title(); ?>
						<p id="pvat" >+VAT: <?php echo $vatper."%" ?><span class="prptvat_<?php echo $i; ?>"></span></p>
						</div>
                        <div class="table-body">
                            <ul>
							<?php
								$equal_price= 0;
								foreach($prpitems as $prpeitem) {
									
								$price = intval($prpeitem[$pp_prefix.'itemprice']);
								
								$equal_price += $price;
							?>
                                <li class="clearfix"><span class="pull-left"><?php echo $prpeitem[$pp_prefix.'itemtitle']; ?></span> <span class="pull-right"><?php echo "tk ".$prpeitem[$pp_prefix.'itemprice']; ?></span></li>
								
								
							<?php
								}	
								$total_price = $equal_price;
								$total_vat = ($total_price*$vatper)/100;
							?>
                            </ul>
							<input type="hidden" class="eprpval_<?php echo $i; ?>" value="<?php echo $total_vat; ?>" readonly />
                            <div class="link"><a href="<?php the_permalink(); ?>" class="theme-btn"><?php echo $reera_theme[$prefix.'_prpbnbtn']; ?></a></div>
                        </div>
                    </div>
                </article>  
			<?php
				$i++;
				endwhile;
				$posti = $i;
				
			?>
                
            </div>
        <?php
			endif;
			wp_reset_postdata();
		?>
        </div>
    </section>
    
	<script type="text/javascript">
		(function($){
			
			$(document).ready(function(){
				var prpival = <?php echo json_encode($posti); ?>;
				var i;
				for(i=1; i<prpival; i++) {
					var pval = $(".eprpval_"+i).val();
					//alert(pval);
					$(".prptvat_"+i).html("tk "+pval);
				}
			});
			
		})(window.jQuery);
	</script>
    
    <!--Default Section-->
    <section class="default-section bg-grey pt-60 pb-60">
        <div class="auto-container">
           
            <div class="carousel-outer">
            <?php
				$rslider_args	= array(
					'post_type'			=> 'middle_slider',
					'posts_per_page'	=> 5,
				);
				
				$rslider_data	= new WP_Query($rslider_args);
				
				if($rslider_data->have_posts()):
			?>
                <!--Image Carousel-->
                <div class="image-carousel altered">
                    <div class="slider">
					<?php
						while($rslider_data->have_posts()): $rslider_data->the_post();
						
						$rsimg_id = get_post_thumbnail_id();
						$rsimg_url= wp_get_attachment_image_src($rsimg_id, 'rs_slider', true);
					?>
                        <article class="slide-item">
                            <figure class="image">
                                <a class="lightbox-image" href="<?php echo $rsimg_url[0]; ?>"><img src="<?php echo $rsimg_url[0]; ?>" alt=""></a>
                                <div class="image-caption">
									<?php the_title(); ?>
								</div>
                            </figure>
                        </article>
					<?php
						endwhile;
					?>
                    </div>
                </div>
			<?php
				endif;
			?>
               
                <!--Appointment Form-->
                <div class="appointment-form attached">
                    <div class="form-outer">
                        <h3>MAKE AN APPOINTMENT</h3>
                        <?php
							echo do_shortcode('[contact-form-7 id="185" title="Appoinment Form"]');
						?>
                    </div>
                </div>
                
            </div>
            
        </div>
    </section>
    
    <!--Latest Blog-->
    <section class="latest-blog blog-style-two pt-60 pb-30">
        <div class="auto-container">
		<?php
			$bl_args	= array(
				'post_type'		=> 'post',
				'posts_per_page'=> 4,
			);
			
			$bl_data	= new WP_Query($bl_args);
			
			if($bl_data->have_posts()):
		?>
            <div class="sec-title">
                <p><?php echo $reera_theme[$prefix.'_blsubtitle']; ?></p>
                <div class="title"><h2><?php echo $reera_theme[$prefix.'_bltitle']; ?></h2></div>
            </div>
            
            <div class="row clearfix">
            <?php
				while($bl_data->have_posts()): $bl_data->the_post();
			?>
                <!--Blog Post-->
                <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="blog-post">
                        <div class="row clearfix">
                            <div class="col-md-6 col-sm-12 col-xs-12 pr-0">
                                <figure class="image">
								<?php 
									if(has_post_thumbnail()){
										
									$blimg_id = get_post_thumbnail_id();
									$blimg_url= wp_get_attachment_image_src($blimg_id, 'hblog_image', true);
								?>
                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo $blimg_url[0]; ?>" alt=""></a>
								<?php
									}
								?>
                                    <!--<div class="overlay-box">
                                        
                                        <div class="share-it">
                                            <strong>Share This Post</strong><br><br>
                                            <a href="#" class="icon fa fa-facebook-f"></a>
                                            <a href="#" class="icon fa fa-twitter"></a>
                                            <a href="#" class="icon fa fa-pinterest"></a>
                                            <a href="#" class="icon fa fa-dribbble"></a>
                                            <a href="#" class="icon fa fa-youtube-play"></a>
                                            <a href="#" class="icon fa fa-envelope"></a>
                                        </div>
                                    </div>-->
                                </figure>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="text">
                                    <h3><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 4, ''); ?></a></h3>
                                    <div class="desc">
										<p><?php echo wp_trim_words(get_the_content(), 20, ' ...'); ?></p>
									</div>
									
                                    <div class="link pull-right"><a href="<?php the_permalink(); ?>">Read More</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
				endwhile;
			?>
            </div>
        <?php
			endif;
			wp_reset_postdata();
		?>
        </div>
    </section>
    
    <!--Contact Start-->
    <section id="contact">
      <div class="container">
        <div class="row">          
          <div class="sec-title">
            <p><?php echo $reera_theme[$prefix.'_consubtitle']; ?></p>
            <div class="title"><h2><?php echo $reera_theme[$prefix.'_contitle']; ?></h2></div>
          </div>
          <div class="col-md-12">
				<?php
					echo do_shortcode('[contact-form-7 id="184" title="Reera Contact Form" html_class="form-horizontal contact-form"]');
				?>
          </div>
        </div>
      </div>
	
	<?php
		$rb_args	= array(
			'post_type'		=> 'reera_branch',
			'posts_per_page'=> 3,
		);
		
		$rb_data	= new WP_Query($rb_args);
		
		if($rb_data->have_posts()):
		
		$rb_prefix	= "_rbranch_";
	?>
      <div class="locations">
        <div class="container">
          <div class="row">
		<?php
			while($rb_data->have_posts()): $rb_data->the_post();
			
			$rbid	= get_the_ID();
			$addr	= get_post_meta($rbid, $rb_prefix.'addr', true);
			$phone	= get_post_meta($rbid, $rb_prefix.'phone', true);
			$email	= get_post_meta($rbid, $rb_prefix.'email', true);
		?>
            <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
              <h4><?php the_title(); ?></h4>
              <ul class="list-unstyled">
                <li><?php echo $addr; ?></li>
                <li><?php echo $phone; ?></li>
                <li><a href="#"><?php echo $email; ?></a></li>
              </ul>
            </div>
		<?php
			endwhile;
		?>
          </div>
        </div>
      </div>
	<?php
		endif;
		wp_reset_postdata();
	?>
    </section>
    
    <div class="clearfix"></div>

<?php 
	get_footer();
?>