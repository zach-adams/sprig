<?php
/**
 * Page titles
 */
function sprig_title($before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( __( 'Category: %s', '_s' ), single_cat_title( '', false ) );
	} elseif (is_search()) {
		$title = sprintf( __( 'Search: %s', '_s' ), get_search_query( ) );
	} elseif ( is_tag() ) {
		$title = sprintf( __( 'Tag: %s', '_s' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( __( 'Author: %s', '_s' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( __( 'Year: %s', '_s' ), get_the_date( _x( 'Y', 'yearly archives date format', '_s' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( __( 'Month: %s', '_s' ), get_the_date( _x( 'F Y', 'monthly archives date format', '_s' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( __( 'Day: %s', '_s' ), get_the_date( _x( 'F j, Y', 'daily archives date format', '_s' ) ) );
	} elseif ( is_tax( 'post_format', 'post-format-aside' ) ) {
		$title = _x( 'Asides', 'post format archive title', '_s' );
	} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
		$title = _x( 'Galleries', 'post format archive title', '_s' );
	} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
		$title = _x( 'Images', 'post format archive title', '_s' );
	} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
		$title = _x( 'Videos', 'post format archive title', '_s' );
	} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
		$title = _x( 'Quotes', 'post format archive title', '_s' );
	} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
		$title = _x( 'Links', 'post format archive title', '_s' );
	} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
		$title = _x( 'Statuses', 'post format archive title', '_s' );
	} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
		$title = _x( 'Audio', 'post format archive title', '_s' );
	} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
		$title = _x( 'Chats', 'post format archive title', '_s' );
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( __( 'Archives: %s', '_s' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( __( '%1$s: %2$s', '_s' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = __( 'Archives', '_s' );
	}
	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );
	if ( ! empty( $title ) ) {
		echo $before . $title . $after;
	}
}
