<?php
/**
 * Theme help
 *
 * Adds a simple Theme help page to the Appearance section of the WordPress Dashboard.
 *
 * @package Jorvik
 */

// Add Theme help page to admin menu.
add_action( 'admin_menu', 'jorvik_add_theme_help_page' );

function jorvik_add_theme_help_page() {

	// Get Theme Details from style.css
	$theme = wp_get_theme();

	add_theme_page(
		sprintf( esc_html__( 'Welcome to %1$s %2$s', 'jorvik' ), $theme->get( 'Name' ), $theme->get( 'Version' ) ), esc_html__( 'Theme Help', 'jorvik' ), 'edit_theme_options', 'jorvik', 'jorvik_display_theme_help_page'
	);
}

// Display Theme help page.
function jorvik_display_theme_help_page() {

	// Get Theme Details from style.css.
	$theme = wp_get_theme();
	?>

	<div class="wrap theme-help-wrap">

		<h1><?php printf( esc_html__( 'Welcome to %1$s %2$s', 'jorvik' ), esc_html( $theme->get( 'Name' ) ), esc_html( $theme->get( 'Version' ) ) ); ?></h1>

		<div class="theme-description"><?php echo esc_html( $theme->get( 'Description' ) ); ?></div>

		<hr>
		<div class="important-links clearfix">
			<p><strong><?php esc_html_e( 'Theme Links', 'jorvik' ); ?>:</strong>
				<a href="<?php echo esc_url( 'https://uxlthemes.com/theme/jorvik/' ); ?>" target="_blank"><?php esc_html_e( 'Theme Page', 'jorvik' ); ?></a>
				<a href="<?php echo esc_url( 'https://uxlthemes.com/demo/?demo=jorvik' ); ?>" target="_blank"><?php esc_html_e( 'Theme Demo', 'jorvik' ); ?></a>
				<a href="<?php echo esc_url( 'https://uxlthemes.com/docs/jorvik-theme/' ); ?>" target="_blank"><?php esc_html_e( 'Theme Documentation', 'jorvik' ); ?></a>
				<a href="<?php echo esc_url( 'https://uxlthemes.com/forums/forum/jorvik/' ); ?>" target="_blank"><?php esc_html_e( 'Theme Support', 'jorvik' ); ?></a>
				<a href="<?php echo esc_url( 'https://wordpress.org/support/theme/jorvik/reviews/?filter=5' ); ?>" target="_blank"><?php esc_html_e( 'Rate this theme', 'jorvik' ); ?></a>
			</p>
		</div>
		<hr>

		<div id="getting-started">

			<h3><?php printf( esc_html__( 'Getting Started with %s', 'jorvik' ), esc_html( $theme->get( 'Name' ) ) ); ?></h3>

			<div class="columns-wrapper clearfix">

				<div class="column column-half clearfix">

					<div class="section">
						<h4><?php esc_html_e( 'Theme Documentation', 'jorvik' ); ?></h4>

						<p class="about">
							<?php esc_html_e( 'Do you need help to setup, configure and customize this theme? Check out the extensive theme documentation on our website.', 'jorvik' ); ?>
						</p>
						<p>
							<a href="<?php echo esc_url( 'https://uxlthemes.com/docs/jorvik-theme/' ); ?>" target="_blank" class="button button-secondary">
								<?php printf( esc_html__( 'View %s Documentation', 'jorvik' ), 'Jorvik' ); ?>
							</a>
						</p>
					</div>

					<div class="section">
						<h4><?php esc_html_e( 'Theme Options', 'jorvik' ); ?></h4>

						<p class="about">
							<?php printf( esc_html__( '%s makes use of the Customizer for the theme settings.', 'jorvik' ), esc_html( $theme->get( 'Name' ) ) ); ?>
						</p>
						<p>
							<a href="<?php echo esc_url( wp_customize_url() ); ?>" class="button button-primary">
								<?php esc_html_e( 'Customize Theme', 'jorvik' ); ?>
							</a>
						</p>
					</div>

				</div>

				<div class="column column-half clearfix">

					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png" />

				</div>

			</div>

		</div>

		<hr>

		<div id="theme-author">

			<p>
				<?php printf( esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme, %3$s :)', 'jorvik' ), esc_html( $theme->get( 'Name' ) ), '<a target="_blank" href="https://uxlthemes.com/" title="uXL Themes">uXL Themes</a>', '<a target="_blank" href="https://wordpress.org/support/theme/jorvik/reviews/?filter=5" title="' . esc_html__( 'Jorvik Review', 'jorvik' ) . '">' . esc_html__( 'rate it', 'jorvik' ) . '</a>' ); ?>
			</p>

		</div>

	</div>

	<?php
}

// Add CSS for Theme help Panel.
add_action( 'admin_enqueue_scripts', 'jorvik_theme_help_page_css' );

function jorvik_theme_help_page_css( $hook ) {

	// Load styles and scripts only on theme help page.
	if ( 'appearance_page_jorvik' != $hook ) {
		return;
	}

	// Embed theme help css style.
	wp_enqueue_style( 'jorvik-theme-help-css', get_template_directory_uri() . '/css/theme-help.css' );
}
