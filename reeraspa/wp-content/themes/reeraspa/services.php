<?php
/**
*	Template Name: Service Page
**/

	get_header();
?>    
    
    <!--Page Title-->
    <?php
		get_template_part('/includefile/content', 'breadcrumbs');

		function custom_page_title($page_title){
			
			$title = "Our Services";
			
			return $title;
		}
	
	?>
    
    
    <!--Features Section-->
    <section class="default-section with-padding">
    	<div class="auto-container">
        	<div class="column-outer row clearfix">
            <?php
				if(have_posts()):
					the_post();
			?>
            	<!--Column-->
                <div class="col-md-12 col-sm-12 col-xs-12 text-column">
                    <div class="title">
						<h2><?php echo $reera_theme[$prefix.'_svptitle']; ?></h2>
                    </div>
                    
                    <div class="text svcon">
						<?php
							if(has_post_thumbnail()) {
								
							$spfimg_id = get_post_thumbnail_id();
							$spfimg_url= wp_get_attachment_image_src($spfimg_id, 'service_image', true);
						?>
							<!--Column-->
							<figure class="image"><img class="img-responsive" src="<?php echo $spfimg_url[0]; ?>" alt=""></figure>
						<?php
							}
						?>
                    	<?php the_content(); ?>
                    </div>
                </div>
            
            <?php
				endif;
			?>
               
            </div>
        </div> 
    </section>
    
    
    <!--Default Section-->
    <section class="default-section beauty-features">
    	<div class="auto-container">
        	<div class="title"><h2>OUR BEAUTY FEATURES</h2></div>
            <?php
			$s_prefix = "_svc_";
			$s_args	= array(
				'post_type'		=> 'reera_service',
				'posts_per_page'=> -1,
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
					
					$simg_id	= get_post_thumbnail_id($sp_id);
					$simg_url	= wp_get_attachment_image_src($simg_id, 'service_image', true);
					
					$asize = sizeof($simg_url);
					if($asize == 4){
						$srvimg = $simg_url[0];
					}else{
						$srvimg = "";
					}
					$content = $sp_id.'___'.get_the_title().'___'.$subtitle.'___'.get_the_content().'___'.$srvimg;
				?>	
					
                	<div class="feature-box"><a href="javascript:void(0)" rel="<?php echo $content; ?>" class="serviceid <?php if($s_data->current_post== 0) { ?> active <?php } ?>"><span class="<?php echo $icon; ?>"></span><span class="small-text"><?php echo $subtitle; ?></span><h3><?php the_title(); ?></h3></a></div>
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
   
    <!--Service Details Section-->
    <section id="spdiv" class="default-section with-padding">
    	<div class="auto-container">
        	<div id="spcontent" class="column-outer row clearfix">
            
            	
                 
                
            </div>
        </div> 
    </section>
    
	<script type="text/javascript">
		jQuery(window).load(function(){
					
			(function($){
				
				var scon = $(".active").attr('rel');
				var separate = scon.split("___");
				var sid = separate[0];
				var stitle = separate[1];
				var sub = separate[2];
				var svcon = separate[3];
				var simg = separate[4];
				var location = <?php echo json_encode(get_template_directory_uri()); ?>;
				var html = "";
				jQuery.ajax({
					type:"POST",
					url:location+"/test.php",
					dataType:"json",
					data:{action:'getSet', spid:sid, sptitle:stitle, subt:sub, svcon:svcon, simgurl:simg},
					success: function(resp){
						//console.log(resp);
						html +='<div class="col-md-12 col-sm-12 col-xs-12 text-column">';
						html+='<div class="title">';
						html+='<p id="sstitle">'+resp.subtitle+'</p>';
						html+='<div class="title stitle">';
						html+='<h2>'+resp.title+'</h2></div></div>';
						html+='<div class="text svcon">';
						html+='<figure class="image"><img class="img-responsive" src="'+resp.spimg+'" alt=""></figure>';
						html+='<p>'+resp.spcontent+'</p>';
						html+='</div></div>';
						
						jQuery("#spcontent").fadeOut( 500 ,function() {
							jQuery(this).html( html);
						}).fadeIn( 2000 );
						
					}
				});
					
			})(window.jQuery);
			
			(function($){
				jQuery(".serviceid").on("click", function(){
				
					jQuery(".serviceid.active").removeClass('active');
					jQuery(this).addClass('active');
					
					var scon = jQuery(this).attr('rel');
					var separate = scon.split("___");
					var sid = separate[0];
					var stitle = separate[1];
					var sub = separate[2];
					var svcon = separate[3];
					var simg = separate[4];
					var location = <?php echo json_encode(get_template_directory_uri()); ?>;
					var html = "";
					jQuery.ajax({
						type:"POST",
						url:location+"/test.php",
						dataType:"json",
						data:{action:'getSet', spid:sid, sptitle:stitle, subt:sub, svcon:svcon, simgurl:simg},
						success: function(resp){
							//console.log(resp);
							html +='<div class="col-md-12 col-sm-12 col-xs-12 text-column">';
							html+='<div class="title">';
							html+='<p id="sstitle">'+resp.subtitle+'</p>';
							html+='<div class="title stitle">';
							html+='<h2>'+resp.title+'</h2></div></div>';
							html+='<div class="text svcon">';
							html+='<figure class="image"><img class="img-responsive" src="'+resp.spimg+'" alt=""></figure>';
							html+='<p>'+resp.spcontent+'</p>';
							html+='</div></div>';
							
							jQuery("#spcontent").fadeOut( 500 ,function() {
								jQuery(this).html( html);
							}).fadeIn( 2000 );
							
						}
					});
				});
			})(window.jQuery);
			
		});
	</script>
    
    <!--Our Skills and Experience Section-->
    <section class="skills-section">
    	<div class="auto-container">
		<?php
			$serv_args	= array(
				'post_type'		=> 'skill_experience',
				'posts_per_page'=> 5,
			);
			
			$serv_data	= new WP_Query($serv_args);
			if($serv_data->have_posts()):
		?>
        	<div class="sec-title">
            	<p><?php echo $reera_theme[$prefix.'_srvesubtitle']; ?></p>
                <div class="title"><h2><?php echo $reera_theme[$prefix.'_srvetitle']; ?></h2></div>
            </div>
            
            <div class="row clearfix">
            	
                <!--Skill Meters-->
            	<div class="col-md-6 col-sm-6 col-xs-12 column">
                	<div class="skills-outer">
                        
                        <div class="skill-box">
                        	
                            <div class="skill-title">SKIN THERAPIES</div>
                            <div class="skill-meter">
                            	<div class="bar" data-percent="80%">
                                	<span class="txt">80%</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="skill-box">
                        	
                            <div class="skill-title">HAMMAM MASSAGES</div>
                            <div class="skill-meter">
                            	<div class="bar" data-percent="60%">
                                	<span class="txt">60%</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="skill-box">
                        	
                            <div class="skill-title">HAIRCUTS</div>
                            <div class="skill-meter">
                            	<div class="bar" data-percent="90%">
                                	<span class="txt">90%</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="skill-box">
                        	
                            <div class="skill-title">FINGERS &amp; NAILS</div>
                            <div class="skill-meter">
                            	<div class="bar" data-percent="51%">
                                	<span class="txt">51%</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="skill-box">
                        	
                            <div class="skill-title">BEAUTY PACKS</div>
                            <div class="skill-meter">
                            	<div class="bar" data-percent="84%">
                                	<span class="txt">84%</span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <!--Accordions Box-->
            	<div class="col-md-6 col-sm-6 col-xs-12 column">
                	<div class="accordion-box">
                    <?php
						while($serv_data->have_posts()): $serv_data->the_post();
					?>
                        <div class="acc-block">
                            <div class="acc-btn<?php if($serv_data->current_post == 0) { ?> active<?php } ?>"><span class="icon icon-plus flaticon-plus49"></span> <span class="icon icon-minus flaticon-minus42"></span>&ensp; <?php the_title(); ?></div>
                            <div class="acc-content<?php if($serv_data->current_post == 0) { ?> current<?php } ?>">
                                <div class="content"><em><?php the_content(); ?></em> </div>
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
		?>
        </div>
    </section>
    
    <!--Appointment Form-->
    <section class="appointment-form">
    	<div class="auto-container">
            <div class="form-outer">
                <h3>MAKE AN APPOINTMENT</h3>
                <?php
					echo do_shortcode('[contact-form-7 id="206" title="AppointmentServicePage"]');
				?>
            </div>
        </div>
    </section>
    
<?php
	get_footer();
