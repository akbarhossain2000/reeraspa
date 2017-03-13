<?php
/**
*	Template Name: Pricing Page
**/
	get_header();

?>    
    
    <!--Page Title-->
    <?php
		get_template_part('/includefile/content', 'breadcrumbs');

		function custom_page_title($page_title){
			
			$title = "Our Plans & Pricing";
			
			return $title;
		}
	
	?>
    
    
    <!--Pricing Section-->
    <section class="pricing-section style-one pt-60 pb-50">
        <div class="auto-container">
		<?php
			$paged		= (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
			$prp_args = array(
				'post_type'		=> 'plan_pricing',
				'posts_per_page'=> 6,
				'paged'			=> $paged,
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
			
			<br>
			<!-- Theme Pagination -->
			<div class="theme-pagination text-left">
			
			<?php
				$inc_path = dirname(__File__).'/includefile/';
				if( file_exists( $inc_path.'paginate.php' ) ) {
					require_once($inc_path.'paginate.php');
				}
				
				if (function_exists(custom_pagination)) {
					custom_pagination($prp_data->max_num_pages,"",$paged);
				}
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
	
	<div class="clearfix"></div>

<?php
	get_footer();