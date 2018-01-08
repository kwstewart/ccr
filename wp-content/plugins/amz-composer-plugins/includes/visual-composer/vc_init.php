<?php

	/* Visual Composer: Initialize
	================================================== */
	
	// Include external shortcodes
	function amz_external_shortcodes() {
		require_once( AMAZEE_INC_DIR . 'visual-composer/shortcodes/external_shortcodes.php' );
	}
	add_action( 'init', 'amz_external_shortcodes' );

	if ( in_array( 'js_composer/js_composer.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		
		
		// Include external elements
		function amz_external_vc_elements() {

			global $pagenow;
			require_once( AMAZEE_INC_DIR . 'visual-composer/vc_templates/extend_vc/extend_vc.php' );

			if( 'admin.php' != $pagenow ) {
				vc_set_as_theme();
			}

		}
		add_action( 'vc_before_init', 'amz_external_vc_elements' );

	}
