<?php
	get_header();
?>		

		<!--Page Title-->
		<?php
			get_template_part('/includefile/content', 'breadcrumbs');

			function custom_page_title($page_title){
				
				$title = "Error 404!";
				
				return $title;
			}
		
		?>
		<!-- 404 page -->
		<section id="contact">
		<div class="error-page">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="error">
							<div class="error-icon">
								<i class="fa fa-frown-o"></i>
							</div>
							<h1 class="err">Error 404!</h1>
							<h3 class="esmrr">The page you requested does not exist or has moved. </h3>
						</div>
					</div>
				</div>
			</div>
		</div>
		</section>
		<!-- 404 page -->
		
<?php
	get_footer();