	<?php

		// global $values;
		$prefix = ( isset($_POST['values'] ) ) ? $_POST['values']['prefix'] : composer_get_prefix();

	    /*
	     * Blog Post Format: Standard
	     */

	    $type = composer_get_option_value( $prefix.'styles', 'normal' );
	    $sidebar_position = composer_get_option_value( $prefix.'sidebar', 'right-sidebar' );

		$content_wrap = composer_get_option_value( 'content_wrap', '1200' );

	    /*
	     * For: Grid & Masonry
	     */

	    if( $type == 'grid' || $type == 'masonry' ){
	    	$width = 282;
	    	$height = 200;
		}

		/*
	     * For: Normal Style
	     */
		if($type == 'normal'){

			$width = $content_wrap;
			$height = 350;

			if( 'full-width' != $sidebar_position ){
				$width = round( $content_wrap*0.75 );
				$height = 350;
			}
		}
	    
	    /*
	     * If you want add any blog style top part in standard post format, Check condition here
	     */

		/*
	     * For: Grid, Masonry & Normal
	     */

	    //Top Section
	    echo '<div class="post-standard">';
	        echo composer_featured_thumbnail( $width, $height, 0, 0, 1 );
	    echo '</div>';


	    //Bottom Section

		get_template_part( 'blog/includes/blog', 'entrycontent');

get_template_part( 'blog/loop/blog', 'articleend'); 
