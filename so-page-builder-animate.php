<?php
/**
 * Plugin Name: SO Page Builder Animate
 * Plugin URI: http://dunhakdis.com/so-page-builder-animate
 * Description: The SO Page Builder Animate is built for the SiteOrigin Page Builder. This plugin adds 'Animate' tab to 'Widgets Styles' inside the page builder panels. By using this plugin, you will be able to easily select from over 70+ different animation types.
 * Version: 0.1
 * Author: Dunhakdis
 * Author URI: http://dunhakdis.com
 * License: GPL2
 */

defined( 'ABSPATH' ) or die( __( 'Make love not war.', 'so-page-builder-animate' ) );

add_action( 'wp_enqueue_scripts', 'spba_libraries' );

add_action( 'wp_footer', 'spba_init_wow' );

add_filter( 'siteorigin_panels_widget_style_groups', 'spba_style_groups', 2, 3 );
add_filter( 'siteorigin_panels_widget_style_fields', 'spba_style_fields', 1, 3 );
add_filter( 'siteorigin_panels_widget_style_attributes', 'spba_style_attributes', 1, 2 );

/**
 * Adds 'Animation' tab to SO Page Builder Widgets Style
 * @param  array $groups  '$groups' represents a filterable variable where you an insert new array that contains tab settings.
 * @return array The tab details.
 */
function spba_style_groups( $groups ) 
{
    
    $groups['animation'] = array(
    	'name' => __('Animation', 'so-page-builder-animate'),
   	 	'priority' => 30
    );

    return $groups;
}
/**
 * Add new fields under 'Animate' tab.
 * @param  array $fields  '$fields' represents a filterable variable where you an insert new array that contains fields settings.
 * @return array The fields collection.
 */
function spba_style_fields( $fields ) 
{
    /**/
    $animations = array(
    '' => 'No Animations',
    'bounce' => 'Bounce',
    'flash' => 'Flash',
    'pulse' => 'Pulse',
    'rubberBand' => 'Rubber Band',
    'shake' => 'Shake',
    'swing' => 'Swing',
    'tada' => 'Tada',
    'wobble' => 'Wobble',
    'jello' => 'Jello',

    'bounceIn' => 'Bounce',
    'bounceInDown' => 'Bounce In Down',
    'bounceInLeft' => 'Bounce In Left',
    'bounceInRight' => 'Bounce In Right',
    'bounceInUp' => 'Bounce In Up',
    'bounceOut' => 'Bounce Out',
    'bounceOutDown' => 'Bounce Out Down',
    'bounceOutLeft' => 'Bounce Out Left',
    'bounceOutRight' => 'Bounce Out Right',
    'bounceOutUp' => 'Bounce Out Up',

    'fadeIn' => 'Fade In',
    'fadeInDown' => 'Fade In Down',
    'fadeInDownBig' => 'Fade In Down Big',
    'fadeInLeft' => 'Fade In Left',
    'fadeInLeftBig' => 'Fade In Left Big',
    'fadeInRight' => 'Fade In Right',
    'fadeInRightBig' => 'Fade In Right Big',
    'fadeInUp' => 'Fade In Up',
    'fadeInUpBig' => 'Fade In Up Big',
    'fadeOut' => 'Fade Out',
    'fadeOutDown' => 'Fade Out Down',
    'fadeOutDownBig' => 'Fade Out Big',
    'fadeOutLeft' => 'Fade Out Left',
    'fadeOutLeftBig' => 'Fade Out Right',
    'fadeOutRight' => 'Fade Out Right',
    'fadeOutRightBig' => 'Fade Out Right Big',
    'fadeOutUp' => 'Fade Out Up',
    'fadeOutUpBig' => 'Fade Out Up Big',

    'flipInX' => 'Flip Horizontal',
    'flipInY' => 'Flip Vertical',
    'flipOutX' => 'Flip Out Horizontal',
    'flipOutY' => 'Flip Out Vertical',

    'lightSpeedIn' => 'Light Speed In',
    'lightSpeedOut' => 'Light Speed Out',

    'rotateIn' => 'Rotate In',
    'rotateInDownLeft' => 'Rotate In Down Left',
    'rotateInDownRight' => 'Rotate In Down Right',
    'rotateInUpLeft' => 'Rotate In Up Left',
    'rotateInUpRight' => 'Rotate In Up Right',
    'rotateOut' => 'Rotate Out',
    'rotateOutDownLeft' => 'Rotate Out Down Left',
    'rotateOutDownRight' => 'Rotate Out Down Right',
    'rotateOutUpLeft' => 'Rotate Out Up Left',
    'rotateOutUpRight' => 'Rotate Out Up Right',

    'hinge' => 'Hinge',

    'rollIn' => 'Roll In',
    'rollOut' => 'Roll Out',

    'zoomIn' => 'Zoom In',
    'zoomInDown' => 'Zoom In Down',
    'zoomInLeft' => 'Zoom In Left',
    'zoomInRight' => 'Zoom In Right',
    'zoomInUp' => 'Zoom In Up',
    'zoomOut' => 'Zoom Out',
    'zoomOutDown' => 'Zoom Out Down',
    'zoomOutLeft' => 'Zoom Out Left',
    'zoomOutRight' => 'Zoom Out Right',
    'zoomOutUp' => 'Zoom Out Up',

    'slideInLeft' => 'Slide In Left',
    'slideInDown' => 'Slide In Down',
    'slideInRight' => 'Slide In Right',
    'slideInUp' => 'Slide In Up',
    'slideOutDown' => 'Slide Out Down',
    'slideOutLeft' => 'Slide Out Left',
    'slideOutRight' => 'Slide Out Right',
    'slideOutUp' => 'Slide Out Up',
    );
    
    
    $fields['animation_type'] = array(
    'name' => 'Type',
    'type' => 'select',
    'options' => (array)$animations,
    'group' => 'animation',
    'description' => 'Pick an animation style. Use this <a href="http://daneden.github.io/animate.css/">site</a> to preview the animation.',
    'priority' => 5
    );

    $fields['animation_duration'] = array(
    'name' => 'Duration',
    'type' => 'select',
    'options' => array(
        '' => 'Default Duration',
        '1s' => '1 Seconds',
        '2s' => '2 Seconds',
        '3s' => '3 Seconds',
        '4s' => '4 Seconds',
        '5s' => '5 Seconds'
    ),
    'group' => 'animation',
    'description' => 'Change the animation duration. Measured in seconds.',
    'priority' => 10
    );

    $fields['animation_delay'] = array(
    'name' => 'Delay',
    'type' => 'select',
    'options' => array(
        '' => 'Default Delay',
        '1s' => '1 Seconds',
        '2s' => '2 Seconds',
        '3s' => '3 Seconds',
        '4s' => '4 Seconds',
        '5s' => '5 Seconds'
    ),
    'group' => 'animation',
    'description' => 'Delay before the animation starts. Measured in seconds',
    'priority' => 15
    );

    $fields['animation_offset'] = array(
	    'name' => 'Offset',
	    'type' => 'text',
	    'default' => '10',
	    'group' => 'animation',
	    'description' => 'Distance to start the animation (related to the browser bottom)',
	    'priority' => 20
    );

    $fields['animation_iteration'] = array(
	    'name' => 'Iteration',
	    'type' => 'select',
	    'options' => array(
	        '1' => 'Don\'t Repeat',
	        '2' => 'Repeat 2x',
	        '3' => 'Repeat 3x',
	        '4' => 'Repeat 4x',
	    ),
	    'group' => 'animation',
	    'description' => 'Number of times the animation is repeated',
	    'priority' => 25
    );

    return $fields;
}

/**
 * Adds new 'data-*' attribute to page builder panels
 * @param  array $atts  The current attributes.
 * @param  array $value The current panel attribute 'key-value' pairs.
 * @return array The attribute collection.
 */
function spba_style_attributes( $atts, $value ) 
{

    if ( empty( $value['animation_type'] ) ) {
        return $atts;
    }

    // Add the animate class to the class attribute.
    if ( ! empty( $value['animation_type'] ) ) {
        $atts['class'] = array( 'wow', $value['animation_type'] );

    }

    if ( ! empty( $value['animation_duration'] ) ) {
        $atts['data-wow-duration'] = $value['animation_duration'];
 	}
    
    if ( ! empty( $value['animation_delay'] ) ) {
        $atts['data-wow-delay'] = $value['animation_delay'];
    }
    
    if ( ! empty( $value['animation_offset'] ) ) {
        $atts['data-wow-offset'] = $value['animation_offset'];
    }
    
    if ( ! empty($value['animation_iteration'] ) ) {
        $atts['data-wow-iteration'] = $value['animation_iteration'];
    }

    return $atts;
}

/**
 * Load necessary scripts and css library
 * @return void
 */
function spba_libraries() 
{
	wp_enqueue_style( 'spba-animate', plugins_url( '/css/animate.min.css', __FILE__ ), 1.0, true );

	wp_enqueue_script( 'spba-wow', plugins_url( '/js/wow.min.js', __FILE__ ), array('jquery'), 1.0, true );

	return;
}

function spba_init_wow() {
	?>
	<script>
	jQuery(document).ready(function($){
		'use strict';
		if ( 'function' === typeof WOW ) {
			new WOW().init();
		}
	});
	</script>
	<?php
	return;
}