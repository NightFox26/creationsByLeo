<?php
/**
 * Primary Menu Template
 *
 * @package Bold_Photography Pro
 */

?>
	<div id="site-header-menu" class="site-header-menu">
		<div id="primary-menu-wrapper" class="menu-wrapper">
			<div class="menu-toggle-wrapper">
				<button id="menu-toggle"  class="menu-toggle" aria-controls="top-menu" aria-expanded="false"><?php echo bold_photography_get_svg( array( 'icon' => 'bars' ) ); echo bold_photography_get_svg( array( 'icon' => 'close' ) ); ?><span class="menu-label"><?php echo esc_html_e( 'Menu', 'bold-photography' ); ?></span></button>
			</div><!-- .menu-toggle-wrapper -->

			<div class="menu-inside-wrapper boxContrast">
				<?php if ( has_nav_menu( 'primary-menu' ) ) : ?>

					<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'bold-photography' ); ?>">
						<?php
							wp_nav_menu( array(
									'container'      => '',
									'theme_location' => 'primary-menu',
									'menu_id'        => 'primary-menu',
									'menu_class'     => 'menu nav-menu',
								)
							);
						?>

				<?php else : ?>

					<nav id="site-navigation" class="main-navigation default-page-menu" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'bold-photography' ); ?>">
						<?php wp_page_menu(
							array(
								'menu_class' => 'primary-menu-container',
								'before'     => '<ul id="menu-primary-items" class="menu nav-menu">',
								'after'      => '</ul>',
							)
						); ?>

				<?php endif; ?>

					</nav><!-- .main-navigation -->
				
			</div><!-- .menu-inside-wrapper -->
		</div><!-- #primary-menu-wrapper.menu-wrapper -->

		
	</div><!-- .site-header-menu -->
