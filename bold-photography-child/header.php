<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Odier Thierry">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-163617611-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-163617611-1');
	</script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bold-photography' ); ?></a>

	<header id="masthead" class="site-header featured-image">
		<div class="site-header-main">
			<div class="wrapper">
				<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>

				<?php get_template_part( 'template-parts/navigation/navigation', 'primary' ); ?>
			</div><!-- .wrapper -->
		</div><!-- .site-header-main -->
	</header><!-- #masthead -->

	<?php get_template_part( 'template-parts/navigation/navigation', 'social-floating' ); ?>

	<?php bold_photography_sections(); ?>

	<div id="content" class="site-content section">
		<div class="wrapper">		
