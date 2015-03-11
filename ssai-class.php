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
				'size'    => 'medium',
				'exclude' => '',
				'columns' => 2
				),
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

			if( current_theme_supports( 'html5' ) ) {
				// start with output
				$out .= '<div class="gallery gallery-columns-'.$atts['columns'].' gallery-size-'.$atts['size'].'">';

				// Loop through all attachments and fetch the right image size
		    foreach ( $all_attachments as $attachment ) : setup_postdata( $attachment );

		    $out .= '<figure class="gallery-item">';
		    $out .= '<div class="gallery-icon"';
		    $out .= '<a href="'. site_url() .'/?attachment_id='. $attachment->ID.'">';
				$out .= wp_get_attachment_image(
					         $attachment->ID,
					         $atts['size'], // attribute passed to the shortcode
					         false,
					         array( 'alt'	=> trim( strip_tags( $attachment->post_excerpt ) ) )
					      );
				$out .= '</a></div></figure>';


				endforeach;
				wp_reset_postdata();

			} else {

				$out .= '<div class="gallery gallery-columns-'.$atts['columns'].' gallery-size-'.$atts['size'].'">';

				// Loop through all attachments and fetch the right image size
		    foreach ( $all_attachments as $attachment ) : setup_postdata( $attachment );

		    $out .= '<dl class="gallery-item">';
		    $out .= '<dt class="gallery-icon">';
		    $out .= '<a href="'. site_url() .'/?attachment_id='. $attachment->ID.'">';
				$out .= wp_get_attachment_image(
					         $attachment->ID,
					         $atts['size'], // attribute passed to the shortcode
					         false,
					         array( 'alt'	=> trim( strip_tags( $attachment->post_excerpt ) ) )
					      );
				$out .= '</a></dt></dl>';

				endforeach;
				wp_reset_postdata();

			}

			$out .= '</div>';

		} // if( $all_attachments )

		return $out;
	}

}