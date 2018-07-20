<?php
/**
 * Jorvik Theme Customizer
 *
 * @package Jorvik
 */

/**
 * @param WP_Customize_Manager $wp_customize Theme Customizer object
 */
function jorvik_customize_register( $wp_customize ) {
	$wp_customize->get_setting('blogname')->transport         = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

	$wp_customize->add_setting(
		'hi_color',
		array(
			'default'			=> '#36acde',
			'transport'			=> 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Color_Control(
			$wp_customize,
			'hi_color',
			array( 
				'label'      => esc_html__( 'Highlight/Link Color', 'jorvik' ),
				'settings'   => 'hi_color',
				'section'    => 'colors',
			)
		)
	);

	$wp_customize->add_section(
		'theme_options',
		array(
			'title'		=> esc_html__( 'Theme Options', 'jorvik' ),
			'priority'	=> 6,
		)
	);

	$wp_customize->add_setting(
		'header_layout',
		array(
			'default' => '1',
			'sanitize_callback' => 'jorvik_sanitize_radio_select'
		)
	);
	$wp_customize->add_control(
		new Jorvik_Image_Radio_Control(
		$wp_customize,
		'header_layout',
		array(
			'type' => 'radio',
			'label' => esc_html__( 'Header Layout', 'jorvik' ),
			'section' => 'theme_options',
			'settings' => 'header_layout',
			'choices' => array(
				'1' => get_template_directory_uri() . '/images/header-layout-1.png',
				'2' => get_template_directory_uri() . '/images/header-layout-2.png',
				)
			)
		)
	);

	$wp_customize->add_setting(
		'grid_layout',
		array(
			'default' => 'masonry',
			'sanitize_callback' => 'jorvik_sanitize_radio_select'
		)
	);
	$wp_customize->add_control(
		new Jorvik_Image_Radio_Control(
		$wp_customize,
		'grid_layout',
		array(
			'type' => 'radio',
			'label' => esc_html__( 'Grid Layout', 'jorvik' ),
			'section' => 'theme_options',
			'settings' => 'grid_layout',
			'choices' => array(
				'masonry' => get_template_directory_uri() . '/images/masonry-layout.png',
				'1' => get_template_directory_uri() . '/images/mag-layout-1.png',
				'2' => get_template_directory_uri() . '/images/mag-layout-2.png',
				'21' => get_template_directory_uri() . '/images/mag-layout-2-1.png',
				'211' => get_template_directory_uri() . '/images/mag-layout-2-1-1.png',
				'3' => get_template_directory_uri() . '/images/mag-layout-3.png',
				'31' => get_template_directory_uri() . '/images/mag-layout-3-1.png',
				'311' => get_template_directory_uri() . '/images/mag-layout-3-1-1.png',
				'4' => get_template_directory_uri() . '/images/mag-layout-4.png',
				'41' => get_template_directory_uri() . '/images/mag-layout-4-1.png',
				'411' => get_template_directory_uri() . '/images/mag-layout-4-1-1.png',
				'412' => get_template_directory_uri() . '/images/mag-layout-4-1-2.png',
				)
			)
		)
	);

	$wp_customize->add_setting(
		'sidebar_position',
		array(
			'default'			=> 'right',
			'sanitize_callback'	=> 'jorvik_sanitize_choices',
		)
	);
	$wp_customize->add_control(
		'sidebar_position',
		array(
			'label'		=> esc_html__( 'Sidebar Position', 'jorvik' ),
			'type'		=> 'select',
			'section'	=> 'theme_options',
			'choices'	=> array(
				'left'	=> esc_html__( 'Left', 'jorvik' ),
				'right'	=> esc_html__( 'Right', 'jorvik' ),
			),
		)
	);

}
add_action('customize_register', 'jorvik_customize_register');


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function jorvik_customize_preview_js() {
	wp_enqueue_script('jorvik_customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '1.0', true );
}
add_action('customize_preview_init', 'jorvik_customize_preview_js');


if( class_exists('WP_Customize_Control') ):

class Jorvik_Image_Radio_Control extends WP_Customize_Control {

	public function render_content() {

		if ( empty( $this->choices ) )
			return;

		$name = '_customize-radio-' . $this->id;

		?>
		<style>
			#jorvik-img-container-<?php echo $this->id; ?> .jorvik-radio-img-img {
			border: 2px solid transparent;
			cursor: pointer;
			margin: 0 4px 4px 0;
			}
			#jorvik-img-container-<?php echo $this->id; ?> .jorvik-radio-img-selected {
			border: 2px solid #0085BA;
			margin: 0 4px 4px 0;
			}
			input[type=checkbox]:before {
			content: '';
			margin: -3px 0 0 -4px;
			}
		</style>
		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php if ( $this->description ) {
			echo '<span class="customize-control-description">' . esc_html( $this->description ) . '</span>';
		}
		?>
		<ul class="controls" id='jorvik-img-container-<?php echo $this->id; ?>'>
		<?php
		foreach ( $this->choices as $value => $label ) :
			$class = ($this->value() == $value)?'jorvik-radio-img-selected jorvik-radio-img-img':'jorvik-radio-img-img';
			?>
			<li style="display: inline;">
				<label>
					<input <?php $this->link(); ?>style='display:none' type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
					<img src = '<?php echo esc_html( $label ); ?>' class = '<?php echo esc_html( $class ); ?>' />
				</label>
			</li>
			<?php
			endforeach;
		?>
		</ul>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$('.controls#jorvik-img-container-<?php echo $this->id; ?> li img').click(function(){
					$('.controls#jorvik-img-container-<?php echo $this->id; ?> li').each(function(){
						$(this).find('img').removeClass ('jorvik-radio-img-selected') ;
				});
				$(this).addClass ('jorvik-radio-img-selected') ;
				});
			});
		</script>
	<?php
	}
}

endif;


/**
 * Sanitization functions
 */

function jorvik_sanitize_choices( $input, $setting ) {
    global $wp_customize;
 
    $control = $wp_customize->get_control( $setting->id );
 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function jorvik_sanitize_radio_select( $input, $setting ) {
	// Ensuring that the input is a slug.
	$input = sanitize_key( $input );
	// Get the list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	// If the input is a valid key, return it, else, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}