<?php
/**
*	Template Name: Branch Page
**/

	get_header();
?>    
    
    <!--Page Title-->
    <?php
		get_template_part('/includefile/content', 'breadcrumbs');

		function custom_page_title($page_title){
			
			$title = "Our Branches";
			
			return $title;
		}
	
	?>
    
    
    <!--Features Section-->
    <section class="default-section with-padding">
    	<div class="auto-container">
        	<div class="column-outer row clearfix">
            <?php 
				$rbrn_args = array(
					'post_type'		=> 'page',
					'page_id'		=> $reera_theme[$prefix.'_brnplink'],
				);
				
				$rbrn_data	= new WP_Query($rbrn_args);
				if($rbrn_data->have_posts()):
			?>
            	<!--Column-->
                <div class="col-md-12 col-sm-12 col-xs-12 text-column">
                    <div class="title">
						<h2><?php echo $reera_theme[$prefix.'_brnptitle']; ?></h2>
					</div>
                    
				<?php
					while($rbrn_data->have_posts()): $rbrn_data->the_post();
					
					$brpfimg_id = get_post_thumbnail_id();
					$brpfimg_url= wp_get_attachment_image_src($brpfimg_id, 'service_image', true);
					
					$brparsize = sizeof($brpfimg_url);
					if($brparsize == 4){
						$brpfimage = $brpfimg_url[0];
					}else{
						$brpfimage = "";
					}
				?>
					<div class="text svcon">
						<figure class="image"><img class="img-responsive" src="<?php echo $brpfimage; ?>" alt=""></figure>
                    	<p><?php the_content(); ?></p>
                    </div>

				<?php
					endwhile;
					endif;
				?>
                </div>
            </div>
                
        </div> 
    </section>
    
    
    <!--BRANCHE Start-->
    <section id="contact">
      <div class="container">
        <div class="row">          
          <div class="sec-title">
            <p><?php echo $reera_theme[$prefix.'_brnsubtitle']; ?></p>
            <div class="title"><h2><?php echo $reera_theme[$prefix.'_brntitle']; ?></h2></div>
          </div>
        </div>
      </div>
    </section>
    
   
    <!--Service Details Section-->
    <section id="default-section with-padding">
		<div class="auto-container">
			<div class="column-outer row clearfix">
				<div class="col-md-12 col-sm-12 col-xs-12 text-column">
					<div class="accordion-box">
					<?php
						$rb_args	= array(
							'post_type'		=> 'reera_branch',
							'posts_per_page'=> 3,
						);
						
						$rb_data	= new WP_Query($rb_args);
						
						if($rb_data->have_posts()):
						
						$rb_prefix	= "_rbranch_";
						
						while($rb_data->have_posts()): $rb_data->the_post();
					
						$rbid	= get_the_ID();
						$addr	= get_post_meta($rbid, $rb_prefix.'addr', true);
						$phone	= get_post_meta($rbid, $rb_prefix.'phone', true);
						$email	= get_post_meta($rbid, $rb_prefix.'email', true);
						
						$brimg_id	= get_post_thumbnail_id();
						$brimg_url	= wp_get_attachment_image_src($brimg_id, 'service_image', true);
						
						$basize = sizeof($brimg_url);
						
						if($basize == 4){
							$brancimg = $brimg_url[0];
						}else{
							$brancimg = "";
						}
						
					?>
						<div class="acc-block">
							<div class="acc-btn<?php if($rb_data->current_post == 0) { ?> active<?php } ?>"><span class="icon icon-plus flaticon-plus49"></span> <span class="icon icon-minus flaticon-minus42"></span><h2>&ensp; <?php the_title(); ?></h2>
							</div>
							
							
							<div class="acc-content<?php if($rb_data->current_post == 0) { ?> current<?php } ?>">
								<div class="braddress">
									<p id="sstitle"><em><?php echo $addr; ?></em></p>
									<p id="sstitle"><em><?php echo $phone; ?></em></p>
									<p id="sstitle"><em><?php echo $email; ?></em></p>
								</div>
								<div class="text brimcon">
									<figure class="image">
										<img class="img-responsive" src="<?php echo $brancimg; ?>" alt="">
									</figure>
									<p><em><?php the_content(); ?></em></p>
								</div>
							</div>
						</div>
					
					<?php
						endwhile;
						endif;
					?>
					</div>
				</div>
            </div>
        </div> 
    </section>
    
    <div class="clearfix"></div>
    
<?php
	get_footer();
