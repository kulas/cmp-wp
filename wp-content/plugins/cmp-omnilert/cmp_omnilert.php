<?php
/**
 * @package cmp_omnilert
 * @version 1.0
 */
/*
Plugin Name: CMP Omnilert
Plugin URI: /plugins/cmp-omnilert/
Description: Loads emergency messages sent from onnilert to a shortcode which can be placed on your site.
Author: Kimberly Norris
Version: 1.0
Text Domain: cmp-omnilert
*/

function cmp_plugin_css() {
    $plugin_url = plugin_dir_url( __FILE__ );

    wp_enqueue_style( 'style', $plugin_url . 'style.css' );
}
add_action( 'wp_enqueue_scripts', 'cmp_plugin_css' );


//Shortcodes functions and information
function display_cmp_omnilert($atts,$content,$tag){
	
	//collect values, combining passed in values and defaults
	$values = shortcode_atts(array(
		'museum' => null
	),$atts);  
	
	
	//based on input determine what to return
	$output = '';
	if($values['museum'] == 'cmp'){
		$output = '<div class="omnilert-content"><script type="text/javascript" src="http://widgets.omnilert.net/4b145a6b1449ea007e465c73288beccc-10586"></script></div>';
		// $output = '<div class="omnilert-content"><script type="text/javascript" src="https://carnegiemnh.org/wp-content/plugins/cmp-omnilert/omnilert.js"></script></div>';
	}
	else if($values['museum'] == 'cmnh'){
		$output = '<div class="omnilert-content"></script><script type="text/javascript" src="https://widgets.omnilert.net/4b145a6b1449ea007e465c73288beccc-10589"></script></div>';
	}
	else if($values['museum'] == 'awm'){
		$output = '<div class="omnilert-content"><script type="text/javascript" src="https://widgets.omnilert.net/4b145a6b1449ea007e465c73288beccc-10591"></script></div>';
	}
	else if($values['museum'] == 'csc'){
		$output = '<div class="omnilert-content"><script type="text/javascript" src="https://widgets.omnilert.net/4b145a6b1449ea007e465c73288beccc-10590"></script></div>';
	}
	else if($values['museum'] == 'cmoa'){
		$output = '<div class="omnilert-content"><script type="text/javascript" src="https://widgets.omnilert.net/4b145a6b1449ea007e465c73288beccc-10588"></script></div>';
	}
	else if($values['museum'] == 'pnr'){
		$output = '<div class="omnilert-content"><script type="text/javascript" src="http://widgets.omnilert.net/4b145a6b1449ea007e465c73288beccc-12215"></script></div>';
	}
	else if($values['museum'] == 'camps'){
		$output = '<div class="omnilert-content"><script type="text/javascript" src="http://widgets.omnilert.net/4b145a6b1449ea007e465c73288beccc-12216"></script></div>';
	}
	else{
		$output = 'please choose a museum'; 
	}
	
	return $output;
	
}
add_shortcode('cmp-omnilert','display_cmp_omnilert');

?>
