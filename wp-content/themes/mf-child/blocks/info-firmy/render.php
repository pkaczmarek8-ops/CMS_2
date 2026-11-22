<?php
/**
 * Renderowanie po stronie serwera dla bloku mf-child/info-firmy.
 * Dostępne zmienne: $attributes, $content, $block.
 *
 * @package mf-child
 */

$mf_firma   = get_bloginfo( 'name' );
$mf_telefon = get_option( 'mf_telefon', '+48 123 123 123' );
$mf_tel_url = 'tel:' . preg_replace( '/\s+/', '', $mf_telefon );
?>
<div <?php echo get_block_wrapper_attributes(); ?>>
	<p><strong><?php echo esc_html( $mf_firma ); ?></strong></p>
	<?php if ( ! empty( $attributes['pokazTelefon'] ) ) : ?>
		<p>
			<?php esc_html_e( 'Telefon:', 'mf-child' ); ?>
			<a href="<?php echo esc_url( $mf_tel_url ); ?>">
				<?php echo esc_html( $mf_telefon ); ?>
			</a>
		</p>
	<?php endif; ?>
</div>