<?php
/**
 * @package pugini
 */

?>		
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #mw_full -->

		<footer id="colophon" role="contentinfo">

			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4">	
						<?php dynamic_sidebar('footer1'); ?>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4">	
						<?php dynamic_sidebar('footer2'); ?>
					</div>	
					<div class="col-lg-4 col-md-4 col-sm-4">	
						<?php dynamic_sidebar('footer3'); ?>		
					</div>
				</div>
			</div>
			<div class="footer_info">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<?php _e( 'Copyright', 'pugini' ); ?> &copy; <?php echo date_i18n( __('Y', 'pugini') ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>. <?php $txtfoo = get_theme_mod( 'pugini_text_footer' ); ?><?php if( $txtfoo != '') { echo esc_html( $txtfoo ); } else { _e( 'All Rights Reserved.', 'pugini' ); } ?>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 text-right">
							<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'pugini' ) ); ?>" rel="generator" target="_blank"><?php printf( __( 'Proudly powered by %s', 'pugini' ), 'WordPress' ); ?></a> 
							<?php printf( __( 'Pugini Theme by %1$s', 'pugini' ), '<a target="_blank" href="'. esc_url( 'http://www.mwthemes.net' ) . '" rel="designer">' . __( 'MW Themes', 'pugini' ) .'</a>' ); ?>
						</div>
					</div>
				</div>
			</div><!-- .footer_info -->

		</footer><!-- #colophon -->
		
</div><!-- #page -->
<div class="mw-go-top"><i class="fa fa-angle-up fa-2x"></i></div>
<?php wp_footer();?>

</body>
</html>