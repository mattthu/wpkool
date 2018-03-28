				<ul class="social-icons">
					<?php 
						$ifb = get_theme_mod('icon_facebook');
						if ( get_theme_mod('icon_facebook') !="") { ?>
							<li>
								<a target="_blank" href="<?php echo esc_url($ifb); ?>"><i class="fa fa-facebook"></i></a>
							</li>
					<?php } ?>
					<?php 
						$itwitter = get_theme_mod('icon_twitter');
						if ( get_theme_mod('icon_twitter') !="") { ?>
							<li>
								<a target="_blank" href="<?php echo esc_url($itwitter); ?>"><i class="fa fa-twitter"></i></a>
							</li>
					<?php } ?>
					<?php 
						$igp = get_theme_mod('icon_google');
						if ( get_theme_mod('icon_google') !="") { ?>
							<li>
								<a target="_blank" href="<?php echo esc_url($igp); ?>"><i class="fa fa-google-plus"></i></a>
							</li>
					<?php } ?>
					<?php 
						$iyoutube = get_theme_mod('icon_youtube');
						if ( get_theme_mod('icon_youtube') !="") { ?>
							<li>
								<a target="_blank" href="<?php echo esc_url( $iyoutube ); ?>"><i class="fa fa-youtube"></i></a>
							</li>
					<?php } ?>
					<?php 
						$icon_in = get_theme_mod('icon_linkedin');
						if ( get_theme_mod('icon_linkedin') !="") { ?>
							<li>
								<a target="_blank" href="<?php echo esc_url($icon_in); ?>"><i class="fa fa-linkedin"></i></a>
							</li>
					<?php } ?>
					<?php 
						$icon_instagram = get_theme_mod('icon_instagram');
						if ( get_theme_mod('icon_instagram') !="") { ?>
							<li>
								<a target="_blank" href="<?php echo esc_url($icon_instagram); ?>"><i class="fa fa-instagram"></i></a>
							</li>
					<?php } ?>
					<?php 
						$icon_flickr = get_theme_mod('icon_flickr');
						if ( get_theme_mod('icon_flickr') !="") { ?>
							<li>
								<a target="_blank" href="<?php echo esc_url($icon_flickr); ?>"><i class="fa fa-flickr"></i></a>
							</li>
					<?php } ?>
					<?php 
						$icon_pinterest = get_theme_mod('icon_pinterest');
						if ( get_theme_mod('icon_pinterest') !="") { ?>
							<li>
								<a target="_blank" href="<?php echo esc_url($icon_pinterest); ?>"><i class="fa fa-pinterest"></i></a>
							</li>
					<?php } ?>
					<?php 
						$icon_vimeo = get_theme_mod('icon_vimeo');
						if ( get_theme_mod('icon_vimeo') !="") { ?>
							<li>
								<a target="_blank" href="<?php echo esc_url($icon_vimeo); ?>"><i class="fa fa-vimeo-square"></i></a>
							</li>
					<?php } ?>
					<?php 
						$icon_tumblr = get_theme_mod('icon_tumblr');
						if ( get_theme_mod('icon_tumblr') !="") { ?>
							<li>
								<a target="_blank" href="<?php echo esc_url($icon_tumblr); ?>"><i class="fa fa-tumblr"></i></a>
							</li>
					<?php } ?>
					<?php 
						$icon_dribbble = get_theme_mod('icon_dribbble');
						if ( get_theme_mod('icon_dribbble') !="") { ?>
							<li>
								<a target="_blank" href="<?php echo esc_url($icon_dribbble); ?>"><i class="fa fa-dribbble"></i></a>
							</li>
					<?php } ?>
					<?php 
						$icon_rss = get_theme_mod('icon_rss');
						if ( get_theme_mod('icon_rss') !="") { ?>
							<li>
								<a target="_blank" href="<?php echo esc_url($icon_rss); ?>"><i class="fa fa-rss"></i></a>
							</li>
					<?php } ?>
					<?php 
						$hide_search = get_theme_mod('pugini_head_search');
						if ( $hide_search == '' ) { ?>
							<li>
								<a href="#"><i class="fa fa-search"></i></a>
							</li>
					<?php } ?>					
				</ul>