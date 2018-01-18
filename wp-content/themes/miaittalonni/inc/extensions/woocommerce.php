<?php
/**
 * Extends basic functionality for better Woocommerce compatibility
 *
 * @package Miaittalonni
 */

add_filter( 'miaittalonni_queried_object_id', 'miaittalonni_woo_set_shop_page' );

/**
 * Allow to rewrite shop page layout from page options
 *
 * @param  int $id Current page ID.
 * @return int
 */
function miaittalonni_woo_set_shop_page( $id ) {

	if ( ! function_exists( 'is_shop' ) || ! function_exists( 'wc_get_page_id' ) ) {
		return $id;
	}

	if ( ! is_shop() && ! is_tax( 'product_cat' ) && ! is_tax( 'product_tag' ) ) {
		return $id;
	}

	$page_id = wc_get_page_id( 'shop' );

	return $page_id;
}
