<?php
	global $reera_theme;
	$prefix = '_reera';
?>   
    <!--Main Footer-->
    <footer class="main-footer">
    	
        <!--Footer Upper-->        
        <div class="footer-upper">
            <div class="auto-container">
                <div class="clearfix">
                	
                    <!--Two 4th column-->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                    	<div class="row clearfix">
                        	
                            <!--Footer Column-->
                        	<div class="col-md-6 col-sm-6 col-xs-12 column">
                            	<div class="footer-widget about-widget">
								<?php
									$fab_args	= array(
										'post_type'		=> 'page',
										'page_id'		=> $reera_theme[$prefix.'_fabout'],
									);
									
									$fab_data	= new WP_Query($fab_args);
									
									if($fab_data->have_posts()):
									while($fab_data->have_posts()):
										$fab_data->the_post();
								?>
                                	<h2>About <strong>Us</strong></h2>
                                	<p><?php echo wp_trim_words(get_the_content(), 10, ' ...'); ?></p>
                                    <a href="<?php the_permalink(); ?>">Read more</a>
                                    <div class="social-links">
                                        <a href="<?php echo $reera_theme[$prefix.'_social']['1']; ?>" class="icon fa fa-facebook-f" target="_blank"></a>
                                        <a href="<?php echo $reera_theme[$prefix.'_social']['2']; ?>" class="icon fa fa-twitter" target="_blank"></a>
                                        <a href="<?php echo $reera_theme[$prefix.'_social']['3']; ?>" class="icon fa fa-google-plus" target="_blank"></a>
                                        <a href="<?php echo $reera_theme[$prefix.'_social']['4']; ?>" class="icon fa fa-youtube-play" target="_blank"></a>
                                    </div>
								<?php
									endwhile;
									endif;
									wp_reset_postdata();
								?>
                                </div>
                            </div>
                            
                    		<!--Footer Column-->
                        	<div class="col-md-6 col-sm-6 col-xs-12 column">
                            	<div class="footer-widget recent-posts">
                                	<h2>Latest <strong>Blog</strong></h2>	
                                <?php
									$flp_args = array(
										'post_type'	=> 'post',
										'posts_per_page' => 2,
									);	
									
									$flp_data = new WP_Query($flp_args);
									
									if($flp_data->have_posts()):
									
									while($flp_data->have_posts()):
									
									$flp_data->the_post();
								?>
									<div class="post">
                                    	<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    	<div class="post-info"><?php the_time('l j, Y'); ?> / <a href="#">31 comments</a></div>
                                    </div>

								<?php
									endwhile;
									endif;
									wp_reset_postdata();
								?>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    <!--Two 4th column-->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                    	<div class="row clearfix">
                    		<!--Footer Column-->
                        	<div class="col-md-6 col-sm-6 col-xs-12 column">
                            	<div class="footer-widget twitter-feeds">
                                	<h2>Important <strong>Link</strong></h2>
									<?php
										if(function_exists( 'wp_nav_menu' )) {
											wp_nav_menu(array(
												'theme_location' => '_theme_footer_menu',
												'container'	=> 'div',
											));
										}
									?>
                                    
                                </div>
                            </div>
                            
                            <!--Footer Column-->
                        	<div class="col-md-6 col-sm-6 col-xs-12 column">
                            	<div class="footer-widget contact-info">
                                	<h2>Contact <strong>Us</strong></h2>
                                    <ul>
                                        <li><?php echo $reera_theme[$prefix.'_cname']; ?></li>
                                        <li><?php echo $reera_theme[$prefix.'_phone']; ?></li>
                                        <li><?php echo $reera_theme[$prefix.'_faddr']; ?></li>
                                        <li><a href="#"><?php echo $reera_theme[$prefix.'_email']; ?></a></li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
        
        <!--Footer Bottom-->
    	<div class="footer-bottom">
            <div class="auto-container">
                <!--Copyright-->
                <div class="copyright">Copyright &copy; 2017 by <b><a href="http://www.deelko.com" target="_blank">Deelko</a> - Reera Spa</b> | All rights reserved</div>
            </div>
        </div>
        
    </footer>
    
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top"><span class="fa fa-arrow-up"></span></div>


<?php wp_footer(); ?>
</body>

<!-- Mirrored from wp1.themexlab.com/balanced/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 26 Jan 2017 08:49:41 GMT -->
</html>