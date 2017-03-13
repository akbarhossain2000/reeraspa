<?php
/**
*	Template Name: Contact Page
**/
	get_header();
?>    
    
    <!--Page Title-->
    <?php
		get_template_part('/includefile/content', 'breadcrumbs');

		function custom_page_title($page_title){
			
			$title = "Contact Us";
			
			return $title;
		}
	
	?>
    
    
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
	
	<!--Info Section-->
    <section class="info-section">
        <div class="outer-box">
            <div class="map-box" id="map-area">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14602.44875840367!2d90.40546412366481!3d23.796820403062142!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7a7ba38543b%3A0x91d5f14ad296d72e!2sGulshan+2%2C+Dhaka!5e0!3m2!1sen!2sbd!4v1486853469683" width="100%" height="420" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>        
        </div>
    </section>
	
	<div class="clearfix"></div>

<?php
	get_footer(); 
