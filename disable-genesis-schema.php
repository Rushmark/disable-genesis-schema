<?php
/**
 * Plugin Name: Disable Genesis Schema
 * Plugin URI: https://www.billerickson.net/yoast-schema-with-genesis/#remove-genesis-schema
 * Description: Remove Genesis Schema markup
 * Version: 1.0.0
 * Author: Bill Erickson
 * Author URI: https://www.billerickson.net
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * Disable Genesis Schema
 *
 * @package      EAGenesisChild
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
 */

add_action( 'init', 'be_disable_genesis_schema' );
/**
 * Disable Genesis Schema
 * @author Bill Erickson
 * @see https://www.billerickson.net/yoast-schema-with-genesis/
 */
function be_disable_genesis_schema() {

	$elements = array(
		'head',
		'body',
		'site-header',
		'site-title',
		'site-description',
		'breadcrumb',
		'breadcrumb-link-wrap',
		'breadcrumb-link-wrap-meta',
		'breadcrumb-link',
		'breadcrumb-link-text-wrap',
		'search-form',
		'search-form-meta',
		'search-form-input',
		'nav-primary',
		'nav-secondary',
		'nav-header',
		'nav-link-wrap',
		'nav-link',
		'entry',
		'entry-image',
		'entry-image-widget',
		'entry-image-grid-loop',
		'entry-author',
		'entry-author-link',
		'entry-author-name',
		'entry-time',
		'entry-modified-time',
		'entry-title',
		'entry-content',
		'comment',
		'comment-author',
		'comment-author-link',
		'comment-time',
		'comment-time-link',
		'comment-content',
		'author-box',
		'sidebar-primary',
		'sidebar-secondary',
		'site-footer',
	);

	foreach( $elements as $element ) {
		add_filter( 'genesis_attr_' . $element, 'be_remove_schema_attributes', 20 );
	}
}

/**
 * Remove schema attributes
 *
 */
function be_remove_schema_attributes( $attr ) {
	$remove = array( 'itemprop', 'itemtype', 'itemscope' );
	foreach( $remove as $item ) {
		if( !empty( $attr[ $item ] ) )
			unset( $attr[ $item ] );
	}
	return $attr;
}