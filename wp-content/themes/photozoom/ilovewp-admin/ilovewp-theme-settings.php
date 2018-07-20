<?php
/**
 * Define Constants
 */
define('ILOVEWP_SHORTNAME', 'ilovewp'); 
define('ILOVEWP_PAGE_BASENAME', 'ilovewp-options'); 

/**
 * Specify Hooks/Filters
 */
add_action( 'admin_menu', 'ilovewp_add_menu' );

/**
 * Include the required files
 */
// helper functions
require_once('ilovewp-helper-functions.php');
// page settings sections & fields as well as the contextual help text.

/**
* The admin menu pages
*/
function ilovewp_add_menu(){
	
	add_theme_page( __('Photozoom Theme','photozoom'), __('Photozoom Theme','photozoom'), 'manage_options', ILOVEWP_PAGE_BASENAME . '-doc', 'ilovewp_settings_page_doc' ); 

}

// ************************************************************************************************************

/*
 * Theme Documentation Page HTML
 * 
 * @return echoes output
 */
function ilovewp_settings_page_doc() {
	// get the settings sections array
	$theme_data = wp_get_theme();

	// dislays the page title and tabs (if needed)
	//ilovewp_settings_page_header(); 
	?>
	
	<div class="ilovewp-wrapper">
		<div class="header">
			<div id="ilovewp-logo">
				<a href="https://www.ilovewp.com/" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/ilovewp-admin/images/ilovewp-options-logo-white.png" width="153" height="33" alt="ILoveWP.com Logo" /></a>
			</div><!-- #ilovewp-logo --><!-- ws fix

			--><div id="ilovewp-theme-info">
				<p><span class="theme-name"><?php echo esc_html($theme_data->name); ?></span> <span class="theme-version"><?php echo esc_html($theme_data->version); ?></span></p>
			</div><!-- #ilovewp-theme-info -->
		</div><!-- .header -->
		
		<div class="subheader">
			<ul>
				<li><span class="dashicons dashicons-welcome-learn-more"></span> <a href="https://www.ilovewp.com/documentation/photozoom/"><?php esc_html_e('Theme Documentation','photozoom'); ?></a></li>
				<li><span class="dashicons dashicons-format-status"></span> <a href="https://wordpress.org/support/theme/photozoom/"><?php esc_html_e('Theme Support','photozoom'); ?></a></li>
			</ul>
			<div class="cleaner">&nbsp;</div>
		</div><!-- .subheader -->
		
		<div class="ilovewp-documentation">
			<h2><?php esc_html_e('Theme Documentation','photozoom'); ?></h2>
			
			<?php
			$message = sprintf( __( 'Thank you for using <a href="https://www.ilovewp.com/themes/photozoom/" target="_blank" rel="noopener">Photozoom Theme</a> by ILoveWP.com', 'photozoom' ) );
			printf( '<p style="font-size: 1.25em;"><strong>%s</strong>.</p>', $message );
			?>
			
			<p><?php esc_html_e('The theme\'s options can be accessed from Appearance > Customize page.','photozoom'); ?></p>

			<p><?php esc_html_e('If you are having difficulties setting-up our WordPress theme, or you simply have some questions about using this theme, we recommend checking the following pages:','photozoom'); ?></p>
			
			<ul>
				<li><a href="https://wordpress.org/support/theme/photozoom/"><?php esc_html_e('Photozoom Theme Support on WordPress.org','photozoom'); ?></a></li>
				<li><a href="https://www.ilovewp.com/documentation/photozoom/"><?php esc_html_e('Photozoom Theme Documentation','photozoom'); ?></a></li>
				<li><a href="https://www.ilovewp.com/themes/photozoom/"><?php esc_html_e('Photozoom Theme Release Page','photozoom'); ?></a></li>
			</ul>
			
			<p><?php esc_html_e('If you can\'t find answers to your theme-related questions, please feel free to contact our support team.','photozoom'); ?></p>
			<ul>
				<li><a href="https://www.ilovewp.com/contact/"><?php esc_html_e('Contact us','photozoom'); ?></a></li>
			</ul>
			
		</div><!-- .ilovewp-documentation -->

	</div><!-- .ilovewp-wrapper -->

<?php }