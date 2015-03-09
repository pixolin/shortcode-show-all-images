<?php
/**
 * Plugin's Main Class
 */

// Don't allow direct access to this file
if ( ! defined( 'ABSPATH' ) ) exit;


class SSAI_class {

	// Our class creates a shortcode …
	function __construct(){
		add_shortcode( 'ssai', array( $this, 'ssai_query' ) );
	}

	// … which runs a query for all attachements
	function ssai_query( $atts ) {
		$out = ''; //we start with empty output

		/*
		* here we handle the shortcode attributes
		* first we sanitize the attributes,
		* then, if none was provided, fall back to 'medium'
		*/
		$atts = array_map( 'wp_kses_post', $atts );
		$atts = shortcode_atts(
			array(
				'size'    => 'medium',
				'exclude' => '' ),
			$atts,
			'ssai' );

		$exclude = explode(",", $atts['exclude']);

		/*
		* here we fetch all attachments
		* Need to exclude certain images?
		* Shortcode attribute "exclude" handles that
		*/
		$args = array(
	    'post_type' => 'attachment',
	    'numberposts' => -1,
	    'exclude' => $exclude,
	    'post_mime_type' => 'image',
	    'post_status' => null,
	    'post_parent' => null );
		$all_attachments = get_posts( $args );

		if( $all_attachments ) {
			// start with output
			$out .= '<div class="saai"><ul style="list-style-type:none">';

			// Loop through all attachments and fetch the right image size
	    foreach ( $all_attachments as $attachment ) : setup_postdata( $attachment );

	    $out .= '<li>';
			$out .= wp_get_attachment_image(
				         $attachment->ID,
				         $atts['size'], // attribute passed to the shortcode
				         false,
				         array( 'alt'	=> trim( strip_tags( $attachment->post_excerpt ) ) )
				      );
			$out .= '</li>';

			endforeach;
			wp_reset_postdata();

			$out .= '</ul></div>';
		} // if( $all_attachments )

		return $out;
	}

}