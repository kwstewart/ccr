<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Composer for publication on ThemeForest
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'composer_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function composer_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// Visual Composer
		array(
			'name' => esc_html__('Visual Composer', 'composer'),
			'slug' => 'js_composer',
			'source' => get_template_directory() . '/framework/plugins/js_composer.zip',
			'required' => true,
			'version' => '5.4.4',
			'force_activation' => false,
			'force_deactivation' => false
		),

		// Composer Core
		array(
			'name' => esc_html__('Composer Core Plugins', 'composer'),
			'slug' => 'amz-composer-plugins',
			'source' => get_template_directory() . '/framework/plugins/amz-composer-plugins.zip',
			'required' => true,
			'version' => '3.1.3',
			'force_activation' => false,
			'force_deactivation' => false
		),

		// Ultimate VC Addons
		array(
			'name' => esc_html__('Ultimate VC Addons', 'composer'),
			'slug' => 'Ultimate_VC_Addons',
			'source' => get_template_directory() . '/framework/plugins/Ultimate_VC_Addons.zip',
			'required' => true,
			'version' => '3.16.19',
			'force_activation' => false,
			'force_deactivation' => false
		),

		// Yellow Pencil: Visual CSS Style Editor
		array(
			'name' => esc_html__('Yellow Pencil: Visual CSS Style Editor', 'composer'),
			'slug' => 'waspthemes-yellow-pencil',
			'source' => get_template_directory() . '/framework/plugins/waspthemes-yellow-pencil.zip',
			'required' => false,
			'version' => '6.1.4',
			'force_activation' => false,
			'force_deactivation' => false
		),

		// Vc Copy Paste Addons
		array(
			'name' => esc_html__('Extreme Vc Copy Paster Basic', 'composer'),
			'slug' => 'amz-vc-copy-paster-basic',
			'source' => get_template_directory() . '/framework/plugins/amz-vc-copy-paster-basic.zip',
			'required' => false,
			'version' => '1.1.1',
			'force_activation' => false,
			'force_deactivation' => false
		),

		// Revolution Slider
		array(
			'name' => esc_html__('Revolution Slider', 'composer'),
			'slug' => 'revslider',
			'source' => get_template_directory() . '/framework/plugins/revslider.zip',
			'required' => true,
			'version' => '5.4.6.3.1',
			'force_activation' => false,
			'force_deactivation' => false
		),

		// Envato Wordpress Toolkit
		array(
			'name' => esc_html__('WP Envato Market', 'composer'),
			'slug' => 'wp-envato-market',
			'source' => get_template_directory() . '/framework/plugins/wp-envato-market.zip',
			'required' => false,
			'version' => '1.0.0-RC2',
			'force_activation' => false,
			'force_deactivation' => false
		),

		// Wordpress Importer v2
		array(
			'name' => esc_html__('WordPress Importer v2', 'composer'),
			'slug' => 'WordPress-Importer-master',
			'source' => get_template_directory() . '/framework/plugins/WordPress-Importer-master.zip',
			'required' => false,
			'version' => '2.0',
			'force_activation' => false,
			'force_deactivation' => false
		),
		
		//Contact Form 7
        array(
            'name'      => esc_html__('Contact Form 7', 'composer'),
            'slug'      => 'contact-form-7',
            'required'  => false,
        ),

        //WooCommerce
        array(
			'name' 		=> esc_html__('WooCommerce', 'composer'),
			'slug' 		=> 'woocommerce',
			'required' 	=> false,
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'composer',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
