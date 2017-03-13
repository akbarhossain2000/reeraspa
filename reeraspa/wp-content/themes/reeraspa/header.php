<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="description" content="<?php bloginfo( 'description' ); ?>">
<meta name="author" content="">


<!-- FAVICON -->
<link rel="shortcut icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/images/icons/favicon.png">


<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">


<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php

	global $reera_theme;
	global $prefix;
	$prefix = "_reera";
?>

<div class="page-wrapper">
    
    <!-- Preloader -->
    <!--<div class="preloader"></div>-->
    
    <!-- Main Header -->
    <header class="main-header fixed">
    	<!--Header Top-->
        <div class="header-top">
        	<div class="container">
            	<div class="row clearfix">
                	<!--Top Left-->
                	<div class="col-md-6 col-sm-6 col-xs-12 top-left">
                    	<div class="social-links">
							<a href="<?php echo $reera_theme[$prefix.'_social']['1']; ?>" target="_blank" class="fa fa-facebook-f"></a> 
							<a href="<?php echo $reera_theme[$prefix.'_social']['2']; ?>" target="_blank" class="fa fa-twitter"></a> 
							<a href="<?php echo $reera_theme[$prefix.'_social']['3']; ?>" target="_blank" class="fa fa-google-plus"></a> 
							<a href="<?php echo $reera_theme[$prefix.'_social']['4']; ?>" target="_blank" class="fa fa-youtube-play"></a>
							<!--<a href="#" class="fa fa-linkedin"></a> 
							<a href="#" class="fa fa-instagram"></a>--> 
							
						</div>
                    </div>
                    <!--Top Right-->
                    <div class="col-md-6 col-sm-6 col-xs-12 top-right">
                        <div class="more-options pull-right clearfix">
                        	
                            <!--<div class="search-nav pull-right">
                            	<div class="toggle-btn"><a href="#"><span class="fa fa fa-user"></span></a></div>
                            </div>-->
                            
                            <div class="search-nav pull-right">
                            	<div class="toggle-btn toggle-search fa fa-search"></div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
		
        <div class="header-search">
        	<div class="auto-container clearfix">
            	<div class="search-form pull-right">
				<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>
                	<form method="get" action="<?php echo esc_url( home_url('/') ); ?>" role="search">
                    	<div class="form-group">
                        	<input type="search" name="s" id="<?php echo $unique_id; ?>" value="<?php echo get_search_query(); ?>" placeholder="Search Blog" required>
                            <button type="submit" class="theme-btn"><span class="fa fa-search"></span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--Header Lower-->
        <div class="header-lower">
        	<div class="auto-container">
            	<div class="outer">
                	
                    <!--Logo-->
                	<div class="logo"><a href="<?php bloginfo( 'home' ); ?>"><img class="normal-image" src="<?php echo $reera_theme[$prefix.'logo']['url']; ?>" alt=""><img class="small-image" src="<?php echo $reera_theme[$prefix.'small_logo']['url']; ?>" alt=""></a></div>
                    
                    <!--Main Menu-->
                	<nav class="main-menu">
                        <div class="navbar-header">
                            <!-- Toggle Button -->    	
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                        </div>
                        
                        <!-- Main Navigation -->
                        <div class="navbar-collapse collapse clearfix">
						<?php
							if(function_exists( 'wp_nav_menu' )) {
								wp_nav_menu(array(
									'theme_location'	=> '_theme_main_menu',
									'container_id'		=> '',
									'container_class'	=> 'nav-container nav-left',
									'items_wrap' 		=> '<ul>%3$s</ul>',
									'walker'			=> new example_nav_walker(),
								));
							}
								
								
						?>
                            <div class="clearfix"></div>
                        </div>
                    </nav>
                    
                </div>
            </div>
        </div>
        <!--Header Lower End-->
        
        <!--Curve-->
        <div class="curve"></div>
        
    </header>
    <!--End Main Header -->
