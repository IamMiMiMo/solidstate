<?php
	get_header();
?>
		<section id="wrapper">
			<header>
				<div class="inner">
					<h2>Search Results of <?php echo get_search_query() ?></h2>
					<p><?php global $wp_query;$total_results = $wp_query->found_posts; echo $total_results?> result(s)</p>
				</div>
			</header>
			<div class="wrapper">
				<div class="inner">			
				<?php get_search_form() ?>	
					<section class="features">
	    
						<?php
							if (have_posts()){
								
								while (have_posts()){
									
									the_post();
									//get template-parts/content-archive
									get_template_part("template-parts/content", "archive");

								}
							?>
							<?php
							}else{
								echo "
								<h1>There is nothing match your search criteria.</h1><h1>Try again.</h1>
								";
							}
							?>
					</section>
					<?php 
						if (have_posts()){
					 		solidstate_numeric_posts_nav(); 
						}
					?>
				</div>
			</div>

		</section>
	    
<?php
	get_footer();
?>