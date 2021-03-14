                    
                    <section id="footer">
						<div class="inner">
							<?php 
								if (get_theme_mod('footer_type') == false || get_theme_mod('footer_type') == 'html'){
									echo get_theme_mod( 'footer_html' );
								}else if (get_theme_mod('footer_type') == 'columns'){
							?>
								<div class="box alt">
									<div class="row gtr-uniform">
							<?php
									switch( get_theme_mod('footer_column_number') ){
										case '1':
							?>
										<div class="col-12"><span class="fit"><?php dynamic_sidebar("footer-1"); ?></span></div>
							<?php
										break;
										case '2':
							?>
										<div class="col-6 col-12-small"><span class="fit"><?php dynamic_sidebar("footer-1"); ?></span></div>
										<div class="col-6 col-12-small"><span class="fit"><?php dynamic_sidebar("footer-2"); ?></span></div>
							<?php
										break;
										case '3':
							?>
										<div class="col-4 col-12-small"><span class="fit"><?php dynamic_sidebar("footer-1"); ?></span></div>
										<div class="col-4 col-12-small"><span class="fit"><?php dynamic_sidebar("footer-2"); ?></span></div>
										<div class="col-4 col-12-small"><span class="fit"><?php dynamic_sidebar("footer-3"); ?></span></div>
							<?php
										break;
										case '4':
							?>
										<div class="col-3 col-6-medium col-12-small"><span class="fit"><?php dynamic_sidebar("footer-1"); ?></span></div>
										<div class="col-3 col-6-medium col-12-small"><span class="fit"><?php dynamic_sidebar("footer-2"); ?></span></div>
										<div class="col-3 col-6-medium col-12-small"><span class="fit"><?php dynamic_sidebar("footer-3"); ?></span></div>
										<div class="col-3 col-6-medium col-12-small"><span class="fit"><?php dynamic_sidebar("footer-4"); ?></span></div>
							<?php
										break;
									}
							?>
									</div>
								</div>
							<?php

								}
							?>
							<ul class="copyright">
								<li>&copy; <?php echo get_bloginfo('name') ?>. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li><li>Integrate: <a href="https://sze-to.com">SZE-TO</a></li>
							</ul>
						</div>
					</section>

			<?php
                wp_footer()
            ?>

	</body>
</html>