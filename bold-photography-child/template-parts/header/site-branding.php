<?php
/**
 * Template part for site-branding
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bold_Photography
 */

?>

<div class="site-branding">
	<?php has_custom_logo() ? the_custom_logo() : ''; ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<div class="site-identity boxContrast">
			<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
			<?php else : ?>
				<p class="site-title"><?php bloginfo( 'name' ); ?></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding-text-->
	</a>	
</div><!-- .site-branding -->

