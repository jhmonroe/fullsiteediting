<?php
/**
 * Block patterns
 *
 * @package jace
 * @since 1.0.0
 */

/**
 * Display the search term in the heading on the search page.
 * Todo: Remove when the query title block is updated to work for the search page.
 *
 * @since 1.0.0
 *
 * @return string Search page title
 */
function jace_search_title() {
	/* translators: %s: Search term. */
	return isset( $_GET['s'] ) ? sprintf( esc_html__( 'Search results for "%s"', 'jace' ), esc_html( $_GET['s'] ) ) : __( 'Search results', 'jace' );
}

/**
 * Display a link to the privacy policy page, if one is published.

 * @since 1.0.0
 *
 * @return string Link to the privacy policy page, if one is published.
 */
function jace_privacy() {
	if ( get_the_privacy_policy_link() ) {
		return '<!-- wp:paragraph {"fontSize":"extra-small"} --><p class="has-extra-small-font-size">' . get_the_privacy_policy_link() . '</p><!-- /wp:paragraph -->';
	}
}

/**
 * Registers block patterns and block pattern categories.
 *
 * @since 1.0.0
 *
 * @return void
 */
function jace_register_block_patterns() {

	// Array of block pattern names.
	$block_patterns = array(
		'404',
		'search',
		'footer-links',
		'footer-links-basic',
		'dual-images',
		'header-featured-image',
		'circular-cover',
		'circular-image',
	);

	foreach ( $block_patterns as $block_pattern ) {
		$pattern_file = get_theme_file_path( 'patterns/' . $block_pattern . '.php' );
		register_block_pattern(
			'jace/' . $block_pattern,
			require $pattern_file
		);
	}
}
add_action( 'init', 'jace_register_block_patterns', 9 );