<!DOCTYPE HTML>
<!--
	Solid State by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <?php
            wp_head();
        ?>
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
                    <?php
                        if (is_front_page(  )){
                            $class = 'class="alt"';
                        }    
                    ?>
					<header id="header" <?= $class ?>>
						<h1><a href="<?php echo get_site_url() ?>"><?php echo get_bloginfo('name') ?></a></h1>
						<nav>
							<a href="#menu">Menu</a>
						</nav>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<div class="inner">
							<h2>Menu</h2>
                                <?php
                                    wp_nav_menu(
                                        array(
                                          'theme_location' => 'header-menu',
                                          'container' => 'ul',
                                          'menu_class' => 'links',
										  'depth' => 1,
                                        )
                                    );
									echo get_search_form();
									?>
							<a href="#" class="close">Close</a>
						</div>
					</nav>

				