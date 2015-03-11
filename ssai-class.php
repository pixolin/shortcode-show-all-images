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

		/*
		* here we handle the shortcode attributes
		* first we sanitize the attributes,
		* then, if none was provided, fall back to 'medium'
		*/

		// validate $atts['columns']
		$validcolumns = array( 1,2,3,4,5 );
		if( isset($atts['columns']) && !in_array($atts['columns'], $validcolumns) ) {
			$atts['columns'] = 2;
		}
		// sanitize attributes
		$atts = array_map( 'wp_kses_post', $atts );

		// set default values
		$atts = shortcode_atts(
			array(
				'size'    => '',
				'exclude' => '',
				'columns' => 2
				),
			$atts,
			'ssai' );

		$exclude = explode(",", $atts['exclude']);

		$all_attachments = $this->ssai_get_all_attachment_ids( $exclude );

		// if we don't hava any attachment, we are done
		if(!$all_attachments) return;

		// loop attachments, assign their ID's to array
		foreach( $all_attachments as $attachment )
			$attachmentIDs[] = $attachment->ID;


		// explode the array and append to our $atts
		$atts['ids']     = implode( ',', $attachmentIDs );

		// use the native wordpress gallery shortcode with our altered $atts
		return gallery_shortcode( $atts );

	}

	/*
	* here we fetch all attachments
	* Need to exclude certain images?
	* Shortcode attribute "exclude" handles that
	*/
	private function ssai_get_all_attachment_ids( $exclude ) {

		$args = array(
	    'post_type' => 'attachment',
	    'numberposts' => -1,
	    'exclude' => $exclude,
	    'post_mime_type' => 'image',
	    'post_status' => null,
	    'post_parent' => null );

		$all_attachments = get_posts( $args );

		return $all_attachments;

	}
}