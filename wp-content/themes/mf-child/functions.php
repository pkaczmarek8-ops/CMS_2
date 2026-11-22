<?php
/**
 * Funkcje motywu potomnego MF Child (Bud-Spec).
 *
 * @package mf-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'wp_enqueue_scripts', 'mf_child_enqueue_styles' );
function mf_child_enqueue_styles() {
	wp_enqueue_style(
		'mf-child-style',
		get_stylesheet_uri(),
		array( 'twenty-twenty-one-style' ),
		wp_get_theme()->get( 'Version' )
	);
}

add_action( 'after_setup_theme', 'mf_child_setup' );
function mf_child_setup() {
	load_child_theme_textdomain( 'mf-child', get_stylesheet_directory() . '/languages' );
}

add_filter( 'excerpt_length', 'mf_excerpt_length', 20 );
function mf_excerpt_length( $length ) {
	return 25;
}

add_filter( 'the_content', 'mf_add_note' );
function mf_add_note( $content ) {
	if ( is_single() && in_the_loop() && is_main_query() ) {
		$note     = esc_html__( 'Masz pytania o remont lub wycenę? Napisz do nas przez formularz w zakładce Kontakt.', 'mf-child' );
		$content .= '<p class="mf-note">' . $note . '</p>';
	}

	return $content;
}

add_action( 'init', 'mf_register_block_styles' );
function mf_register_block_styles() {
	register_block_style(
		'core/button',
		array(
			'name'         => 'mf-cien',
			'label'        => __( 'Z cieniem', 'mf-child' ),
			'inline_style' => '.wp-block-button.is-style-mf-cien .wp-block-button__link { background-color: #0b5d7a; color: #ffffff; border-radius: 6px; box-shadow: 0 4px 0 #1a1a1a; } .wp-block-button.is-style-mf-cien .wp-block-button__link:hover { background-color: #8a3b00; color: #ffffff; }',
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'         => 'mf-karta',
			'label'        => __( 'Karta', 'mf-child' ),
			'inline_style' => '.wp-block-group.is-style-mf-karta { background-color: #ffffff; color: #1a1a1a; padding: 1.5rem; border: 2px solid #0b5d7a; border-radius: 10px; box-shadow: 0 4px 12px rgba(26, 26, 26, 0.08); }',
		)
	);
}

add_action( 'init', 'mf_register_custom_blocks' );
function mf_register_custom_blocks() {
	register_block_type( get_stylesheet_directory() . '/blocks/info-firmy' );
}

/**
 * Błąd podglądu w edytorze dla elementu info o firmie
 */
add_action( 'enqueue_block_editor_assets', 'mf_enqueue_editor_ssr' );
function mf_enqueue_editor_ssr() {
	wp_enqueue_script( 'wp-server-side-render' );
}