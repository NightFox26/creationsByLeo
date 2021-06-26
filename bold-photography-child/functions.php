<?php

//charge le CSS
function fox_enqueue_script(){
     wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    
     wp_enqueue_script( 'fox_script', get_stylesheet_directory_uri() . '/assets/js/animation.js', array ( 'jquery' ), "1.0", true);    
}
add_action( 'wp_enqueue_scripts', 'fox_enqueue_script' );

//charge un css pour l'admin
function admin_css() {
	$admin_handle = 'admin_css';
	$admin_stylesheet = get_stylesheet_directory_uri() . '/admin.css';

	wp_enqueue_style($admin_handle, $admin_stylesheet);
}
add_action('admin_print_styles', 'admin_css', 11);

//surcharge de la disposition des blocs que la homepage
function bold_photography_sections( $selector = 'header' ) {
    get_template_part( 'template-parts/header/header-media' );
    get_template_part( 'template-parts/hero-content/content-hero' );
    get_template_part( 'template-parts/slider/display-slider' );
    get_template_part( 'template-parts/featured-content/display-featured' );
    get_template_part( 'template-parts/portfolio/display-portfolio' );
    get_template_part( 'template-parts/services/display-services' );
    get_template_part( 'template-parts/testimonial/display-testimonial' );
}

//surcharge du template du slogan dans la homepage
function bold_photography_header_media_text() {

		if ( ! bold_photography_has_header_media_text() ) {
			// Bail early if header media text is disabled on front page
			return false;
		}

		$content_alignment = get_theme_mod( 'bold_photography_header_media_content_alignment', 'content-align-left' );
		$text_alignment = get_theme_mod( 'bold_photography_header_media_text_alignment', 'text-align-left' );

		$header_media_logo = get_theme_mod( 'bold_photography_header_media_logo' );
		?>
		<div class="custom-header-content sections header-media-section <?php echo esc_attr( $content_alignment ); ?> <?php echo esc_attr( $text_alignment ); ?>">
			<div class="custom-header-content-wrapper boxContrast">
				<?php
				$enable_homepage_logo = get_theme_mod( 'bold_photography_header_media_logo_option', 'homepage' );
				if ( bold_photography_check_section( $enable_homepage_logo ) && $header_media_logo ) {  ?>
					<div class="site-header-logo">
						<img src="<?php echo esc_url( $header_media_logo ); ?>" title="<?php echo esc_url( home_url( '/' ) ); ?>" />
					</div><!-- .site-header-logo -->
				<?php } ?>

				<?php
				$before = '<div class="section-title-wrapper"><h2 class="section-title entry-title';

				if ( is_singular() ) {
					$before = '<div class="section-title-wrapper"><h1 class="entry-title';
				}

				if ( ! is_page() ) {
					$before .= ' section-title';
				}

				$before .= '">';

				if ( is_singular() ) {
					bold_photography_header_title( $before, '</h1></div>' );
				} else {
					bold_photography_header_title( $before, '</h2></div>' );
				}
				?>

				<?php bold_photography_header_description( '<div class="site-header-text">', '</div>' ); ?>

				<?php if ( is_front_page() ) :
					$header_media_url      = get_theme_mod( 'bold_photography_header_media_url', '#' );
					$header_media_url_text = get_theme_mod( 'bold_photography_header_media_url_text', esc_html__( 'View More', 'bold-photography' ) );
				?>

					<?php if ( $header_media_url_text ) : ?>
						<span class="more-link">
							<a href="<?php echo esc_url( $header_media_url ); ?>" target="<?php echo get_theme_mod( 'bold_photography_header_url_target' ) ? '_blank' : '_self'; ?>" class="readmore"><?php echo esc_html( $header_media_url_text ); ?><span class="screen-reader-text"><?php echo wp_kses_post( $header_media_url_text ); ?></span></a>
						</span>
					<?php endif; ?>
				<?php endif; ?>
			</div><!-- .custom-header-content-wrapper -->
		</div><!-- .custom-header-content -->
		<?php
	}

function bold_photography_footer_content() {
	$theme_data = wp_get_theme();

	$footer_content = sprintf( _x( 'Copyright &copy; %1$s %2$s %3$s', '1: Year, 2: Site Title with home URL, 3: Privacy Policy Link', 'bold-photography' ), esc_attr( date_i18n( __( 'Y', 'bold-photography' ) ) ),'<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>', function_exists( 'get_the_privacy_policy_link' ) ? get_the_privacy_policy_link() : '' );

	echo '<div class="site-info">' . $footer_content . '</div><!-- .site-info -->';
}

//ShortCode pour la creation de la page /blog/
function afficherTexte() {
	$html ="";
	$i=0;
	$posts = get_posts();
	if($posts){
		foreach ( $posts as $post ) {
			$align = $i%2 == 0? "left":"right";
			setup_postdata( $post );
			$idThumbnail = get_post_thumbnail_id( $post->ID );
			$alt = get_post_meta($idThumbnail, '_wp_attachment_image_alt', true); 
			$html .= '<div class="wp-block-media-text alignwide has-media-on-the-'.$align.'">
						<figure class="wp-block-media-text__media">
							<img src="'.get_the_post_thumbnail_url($post->ID,'full').'" alt="'.$alt.'" class="wp-image-644" srcset="'.get_the_post_thumbnail_url($post->ID,'full').'" sizes="(max-width: 480px) 100vw, 480px">
						</figure>
						<div class="wp-block-media-text__content">
							<h3><a href="'.get_permalink( $post ).'">'.$post->post_title.'</a></h3>
							<p class="postExcerpt">'.$post->post_excerpt.'</p>
						</div>
					</div>';
			$i++;
		}
		wp_reset_postdata();
	}	
	return $html;
}

add_shortcode('foxShortCode', 'afficherTexte');
