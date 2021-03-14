                    
                    <section id="footer">
						<div class="inner">
							<?php 
								if (!get_theme_mod('footer_type') || get_theme_mod('footer_type') == 'html'){
									echo get_theme_mod( 'footer_html' ) ? get_theme_mod( 'footer_html' ) : '
									<h2 class="major">Get in touch</h2>
									<p>Cras mattis ante fermentum, malesuada neque vitae, eleifend erat. Phasellus non pulvinar erat. Fusce tincidunt, nisl eget mattis egestas, purus ipsum consequat orci, sit amet lobortis lorem lacus in tellus. Sed ac elementum arcu. Quisque placerat auctor laoreet.</p>
									<form method="post" action="#" class="default-contact-form">
									<div class="fields">
										<div class="field">
											<label for="name">Name</label>
											<input type="text" name="name" id="name" />
										</div>
										<div class="field">
											<label for="email">Email</label>
											<input type="email" name="email" id="email" />
										</div>
										<div class="field">
											<label for="message">Message</label>
											<textarea name="message" id="message" rows="4"></textarea>
										</div>
									</div>
									<ul class="actions">
										<li><input type="submit" value="Send Message" /></li>
									</ul>
									</form>
									<ul class="contact">
									<li class="icon solid fa-home">
										Untitled Inc<br />
										1234 Somewhere Road Suite #2894<br />
										Nashville, TN 00000-0000
									</li>
									<li class="icon solid fa-phone">(000) 000-0000</li>
									<li class="icon solid fa-envelope"><a href="#">information@untitled.tld</a></li>
									<li class="icon brands fa-twitter"><a href="#">twitter.com/untitled-tld</a></li>
									<li class="icon brands fa-facebook-f"><a href="#">facebook.com/untitled-tld</a></li>
									<li class="icon brands fa-instagram"><a href="#">instagram.com/untitled-tld</a></li>
									</ul>
								';
								}else if (get_theme_mod('footer_type') == 'columns'){
							?>
								<div class="box alt">
									<div class="row gtr-uniform">
							<?php
									switch( get_theme_mod('footer_column_number') ){
										case '1':
							?>
										<div class="footer-col col-12"><span class="fit"><?php dynamic_sidebar("footer-1"); ?></span></div>
							<?php
										break;
										case '2':
							?>
										<div class="footer-col col-6 col-12-small"><span class="fit"><?php dynamic_sidebar("footer-1"); ?></span></div>
										<div class="footer-col col-6 col-12-small"><span class="fit"><?php dynamic_sidebar("footer-2"); ?></span></div>
							<?php
										break;
										case '3':
							?>
										<div class="footer-col col-4 col-12-small"><span class="fit"><?php dynamic_sidebar("footer-1"); ?></span></div>
										<div class="footer-col col-4 col-12-small"><span class="fit"><?php dynamic_sidebar("footer-2"); ?></span></div>
										<div class="footer-col col-4 col-12-small"><span class="fit"><?php dynamic_sidebar("footer-3"); ?></span></div>
							<?php
										break;
										case '4':
							?>
										<div class="footer-col col-3 col-6-medium col-12-small"><span class="fit"><?php dynamic_sidebar("footer-1"); ?></span></div>
										<div class="footer-col col-3 col-6-medium col-12-small"><span class="fit"><?php dynamic_sidebar("footer-2"); ?></span></div>
										<div class="footer-col col-3 col-6-medium col-12-small"><span class="fit"><?php dynamic_sidebar("footer-3"); ?></span></div>
										<div class="footer-col col-3 col-6-medium col-12-small"><span class="fit"><?php dynamic_sidebar("footer-4"); ?></span></div>
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
								<li>&copy; <?php echo get_bloginfo('name') ?>. All rights reserved.</li>
								<li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
								<li>Integrate: <a href="https://sze-to.com">SZE-TO</a></li>
								<li>Theme: <a href="https://github.com/IamMiMiMo/solidstate-wordpress">Solid State (Wordpress)</a></li>
							</ul>
						</div>
					</section>

			<?php
                wp_footer()
            ?>

	</body>
</html>