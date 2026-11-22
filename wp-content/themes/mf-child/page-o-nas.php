<?php
/**
 * Szablon tylko dla strony o slugu "o-nas".
 * Hierarchia: page-o-nas.php (child) -> page.php (rodzic) -> index.php.
 *
 * @package mf-child
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'mf-o-nas' ); ?>>
		<header class="entry-header alignwide">
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php if ( has_excerpt() ) : ?>
				<p class="mf-lead"><?php echo esc_html( get_the_excerpt() ); ?></p>
			<?php else : ?>
				<p class="mf-lead"><?php esc_html_e( 'Remonty, budowa domów i wykończenia wnętrz — sprawdzona ekipa budowlana.', 'mf-child' ); ?></p>
			<?php endif; ?>
		</header>

		<div class="entry-content">
			<?php the_content(); ?>

			<section class="mf-o-nas-box" aria-labelledby="mf-dane-firmy-naglowek">
				<h2 id="mf-dane-firmy-naglowek"><?php esc_html_e( 'Dane firmy i szybki kontakt', 'mf-child' ); ?></h2>
				<p>
					<strong><?php esc_html_e( 'Bud-Spec Usługi Budowlane', 'mf-child' ); ?></strong><br>
					<?php esc_html_e( 'Telefon:', 'mf-child' ); ?>
					<a href="<?php echo esc_url( 'tel:+48123123123' ); ?>"><?php echo esc_html( '+48 123 123 123' ); ?></a><br>
					<?php esc_html_e( 'E-mail:', 'mf-child' ); ?>
					<a href="<?php echo esc_url( 'mailto:wyceny@bud-spec.pl' ); ?>"><?php echo esc_html( 'wyceny@bud-spec.pl' ); ?></a>
				</p>
			</section>
		</div>
	</article>
	<?php
endwhile;

get_footer();