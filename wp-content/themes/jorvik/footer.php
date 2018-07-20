<?php
/**
 * The template for displaying the footer
 *
 * @package Jorvik
 */

?>
	</div><!-- .container -->

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<?php if(is_active_sidebar( 'jorvik-footer1' ) || is_active_sidebar( 'jorvik-footer2' ) || is_active_sidebar( 'jorvik-footer3' ) ): ?>
		<div id="top-footer">
			<div class="container">
				<div class="top-footer clearfix">
					<div class="footer footer1">
						<?php if(is_active_sidebar( 'jorvik-footer1' )): 
							dynamic_sidebar( 'jorvik-footer1' );
						endif;
						?>	
					</div>

					<div class="footer footer2">
						<?php if(is_active_sidebar( 'jorvik-footer2' )): 
							dynamic_sidebar( 'jorvik-footer2' );
						endif;
						?>	
					</div>

					<div class="footer footer3">
						<?php if(is_active_sidebar( 'jorvik-footer3' )): 
							dynamic_sidebar( 'jorvik-footer3' );
						endif;
						?>	
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>

		<?php if(is_active_sidebar( 'jorvik-about-footer' )): ?>
		<div id="middle-footer">
			<div class="container">
				<?php 
					dynamic_sidebar( 'jorvik-about-footer' );
				?>
			</div>
		</div>
		<?php endif; ?>

		<div id="bottom-footer">
			<div class="container clearfix">
				<?php jorvik_powered_by(); ?>

				<?php wp_nav_menu( array( 
                	'theme_location' => 'footer',
                	'container_id' => 'footer-menu',
                	'menu_id' => 'footer-menu', 
                	'menu_class' => 'jorvik-footer-nav',
                	'depth' => 1,
                	'fallback_cb' => '',
				) ); ?>

			</div>
		</div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
