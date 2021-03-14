<?php
	get_header();
?>
	<?php 
		$post = get_post();
		// print_r($post);
		setup_postdata($post);
		$title = get_the_title( );
		$author = get_the_author( );
		$feature_image = get_the_post_thumbnail_url(get_the_ID(),"full");
		$category_html = '';
		foreach(get_the_category() as $cat){
			$cat_link = get_category_link($cat->term_id);
			$category_html .= '<span><a href="' . $cat_link . '">' . $cat->cat_name . '</a></span>';   
		}
	?>
	<section id="wrapper">
		<?php
			$background_output = get_template_directory_uri() . "images/bg.jpg";
			if ($feature_image){
				$background_output = "linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),url(" . $feature_image . ");";
			};
		?>
		<header style="background-image: <?php echo $background_output ?>;">
			<div class="inner">
				<h2><?php echo $title ?></h2>
				<p><?php echo $author ?></p>
				<p class="category"><i class="far fa-folder"></i> <?php echo $category_html ?></p>
			</div>
			<div class="layer"></div>
		</header>
		<div class="wrapper">
			<div class="inner">				
				<section class="features">
					<?php
						if (have_posts()){
							
							while (have_posts()){

								the_post();
								//get template-parts/content-archive
								get_template_part("template-parts/content", "archive");
								
							}
							
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