<?php
/**
 * Plugin Name: WooCommerce Filter Search
 * Plugin URI: https://github.com/PinchOfCode/woocommerce-filter-search
 * Description: Search for WooCommerce products only in the products title.
 * Version: 1.0.0
 * Author: Pinch Of Code
 * Author URI: http://pinchofcode.com
 * Requires at least: 3.8
 * Tested up to: 3.9.2
 *
 * GitHub Plugin URI: https://github.com/PinchOfCode/woocommerce-filter-search
 * License: GPL-2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly

/**
 * Search only in posts title.
 */
function wc_filter_search_by_title_only( $search, &$wp_query ) {
    global $wpdb;

    //var_dump( $wp_query->query_vars );

    $not_allowed_post_types = apply_filters( 'wc_filter_search_not_allowed_array', array(
    	'product', //Default WooCommerce products post type
    	'shop_webhook', //MyStyle Custom post type
    ) );

    if ( empty( $search ) || in_array( $wp_query->query_vars['post_type'], $not_allowed_post_types ) )
        return $search; // skip processing - no search term in query

    var_dump( $wp_query->query_vars['post_type'] );

    $q = $wp_query->query_vars;    
    $n = ! empty( $q['exact'] ) ? '' : '%';

    $search =
    $searchand = '';

    foreach ( (array) $q['search_terms'] as $term ) {
        $term = esc_sql( like_escape( $term ) );
        $search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
        $searchand = ' AND ';
    }

    if ( ! empty( $search ) ) {
        $search = " AND ({$search}) ";
        if ( ! is_user_logged_in() )
            $search .= " AND ($wpdb->posts.post_password = '') ";
    }

    return $search;
}
add_filter( 'posts_search', 'wc_filter_search_by_title_only', 500, 2 );

/**
 * Remove WC feature that searches in the products excerpt.
 */
function wc_filter_search_remove_wc_excerpt_search( $where = '' ) {
    global $wp_the_query;

	// If this is not a WC Query, do not modify the query
	if ( empty( $wp_the_query->query_vars['wc_query'] ) || empty( $wp_the_query->query_vars['s'] ) )
	    return $where;

	$where = preg_replace(
		"/\s+OR\s+\(post_excerpt\s+LIKE\s*(\'\%[^\%]+\%\')\)/",
	    "", $where );

	return $where;
} 
add_filter( 'posts_where', 'wc_filter_search_remove_wc_excerpt_search', 15 );