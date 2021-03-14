<?php
	get_header();
?>
	<section id="banner">
		<div class="inner">
			<div class="logo"><span class="icon <?php echo( get_theme_mod( 'hero_icon' ) ?  get_theme_mod( 'hero_icon' ) : 'fab fa-wordpress' ) ?>"></span></div>
			<h2><?php echo get_bloginfo('name') ?></h2>
			<p><?php echo get_bloginfo('description') ?></p>
		</div>
	</section>
	<!-- Wrapper -->
	<section id="wrapper">
		<?php 
			$num_loop = 3;
			if (!get_theme_mod('frontpage_session')){
				$num_loop = 3;
			}else if (get_theme_mod('frontpage_session') == 'none'){
				$num_loop = 0;
			} else {
				$num_loop = get_theme_mod('frontpage_session');
			}
			for($i = 1; $i <= $num_loop; $i++){

		?>
				<section id="<?php echo $i ?>" class="wrapper <?php echo (($i % 2 == 1 && $num_loop % 2 == 1) || ($i % 2 == 0 && $num_loop % 2 == 0)) ? '' : 'alt' ?> spotlight style<?php echo $i ?>">
					<div class="inner">
						<a href="<?php echo get_theme_mod('frontpage_session_' . $i . '_url') ? get_theme_mod('frontpage_session_' . $i . '_url') : "#" ?>" class="image">
							<img src="<?php echo get_theme_mod('frontpage_session_' . $i . '_image') ? get_theme_mod('frontpage_session_' . $i . '_image') : get_bloginfo('template_url') . "/images/pic01.jpg" ?>" alt="" />
						</a>
						<div class="content">
							<h2 class="major">
								<?php echo get_theme_mod('frontpage_session_' . $i . '_title') ? get_theme_mod('frontpage_session_' . $i . '_title') : "Tempus adipiscing" ?>
							</h2>
							<p>
								<?php echo get_theme_mod('frontpage_session_' . $i . '_content') ? get_theme_mod('frontpage_session_' . $i . '_content') : "Lorem ipsum dolor sit amet, etiam lorem adipiscing elit. Cras turpis ante, nullam sit amet turpis non, sollicitudin posuere urna. Mauris id tellus arcu. Nunc vehicula id nulla dignissim dapibus. Nullam ultrices, neque et faucibus viverra, ex nulla cursus." ?>
							</p>
							<a href="<?php echo get_theme_mod('frontpage_session_' . $i . '_url') ? get_theme_mod('frontpage_session_' . $i . '_url') : "#" ?>" class="special">
								<?php echo get_theme_mod('frontpage_session_' . $i . '_buttontext') ? get_theme_mod('frontpage_session_' . $i . '_buttontext') : "Read More"?>
							</a>
						</div>
					</div>
				</section>

		<?php 
			}
		?>

	<!-- Four -->
		<section id="four" class="wrapper alt style1">
			<div class="inner">
				<h2 class="major"><?php echo get_theme_mod('frontpage_article_title') ? get_theme_mod('frontpage_article_title') : "Recent Articles" ?></h2>
				<p><?php echo get_theme_mod('frontpage_article_description') ? get_theme_mod('frontpage_article_description') : "Cras mattis ante fermentum, malesuada neque vitae, eleifend erat. Phasellus non pulvinar erat. Fusce tincidunt, nisl eget mattis egestas, purus ipsum consequat orci, sit amet lobortis lorem lacus in tellus. Sed ac elementum arcu. Quisque placerat auctor laoreet."?></p>
				<section class="features">
					<?php

					$recent_posts = wp_get_recent_posts( array(
						'numberposts' => get_theme_mod("frontpage_article_number") ? get_theme_mod("frontpage_article_number") : 2,
						'post_status' => 'publish',
					));

					foreach( $recent_posts as $the_post) : 
						$the_post_url = get_permalink( $the_post['ID'] )
					?>
						<article>
							<a href="<?php echo $the_post_url; ?>" class="image"><?php echo get_the_post_thumbnail($the_post['ID'], array(500,300)) ?></a>
							<a href="<?php echo $the_post_url; ?>"><h2 class="major"><?php echo $the_post['post_title'] ?></h2></a>
							<?php echo ($the_post['post_excerpt'] ? $the_post['post_excerpt'] : "<p>(No excerpt)</p>" )?>
							<p><p>
							<a href="<?php echo $the_post_url; ?>" class="special"><?php echo get_theme_mod('blog_readmore') ? get_theme_mod('blog_readmore') : "Read More" ?></a>
						</article>
					<?php endforeach ?>
					
				</section>
				<ul class="actions">
					<li><a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ) ?>" class="button"><?php echo get_theme_mod('frontpage_article_readall') ? get_theme_mod('frontpage_article_readall') : "Browse All" ?></a></li>
				</ul>
			</div>
		</section>

	</section>

<?php
	get_footer();
?>