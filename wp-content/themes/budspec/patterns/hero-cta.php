<?php
/**
 * Title: Hero z wezwaniem do działania
 * Slug: budspec/hero-cta
 * Categories: featured, banner
 */
?>
<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"3.5rem","bottom":"3.5rem","left":"2rem","right":"2rem"},"margin":{"bottom":"2.5rem"}},"border":{"radius":"8px"}},"backgroundColor":"primary","textColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-base-color has-primary-background-color has-text-color has-background" style="border-radius:8px;margin-bottom:2.5rem;padding-top:3.5rem;padding-right:2rem;padding-bottom:3.5rem;padding-left:2rem">
	<!-- wp:heading {"level":1,"textAlign":"center","textColor":"base"} -->
	<h1 class="wp-block-heading has-text-align-center has-base-color has-text-color"><?php esc_html_e( 'Bud-Spec Usługi Budowlane', 'budspec' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center"><?php esc_html_e( 'Kompleksowe remonty mieszkań, budowa domów i wykończenia wnętrz pod klucz. Terminowo i z gwarancją jakości.', 'budspec' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"backgroundColor":"base","textColor":"contrast"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-contrast-color has-base-background-color has-text-color has-background wp-element-button" href="<?php echo esc_url( home_url( '/kontakt/' ) ); ?>"><?php esc_html_e( 'Poproś o wycenę', 'budspec' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->