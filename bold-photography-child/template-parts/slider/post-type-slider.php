<?php
/**
 * The template used for displaying slider
 *
 * @package Bold_Photography
 */

$quantity     = get_theme_mod( 'bold_photography_slider_number', 4 );
$no_of_post   = 0; // for number of posts
$post_list    = array(); // list of valid post/page ids
$show_content = get_theme_mod( 'bold_photography_slider_content_show', 'hide-content' );

$args = array(
	'post_type'           => 'any',
	'orderby'             => 'post__in',
	'ignore_sticky_posts' => 1, // ignore sticky posts
);

	for ( $i = 1; $i <= $quantity; $i++ ) {
		$post_id = '';

		$post_id = get_theme_mod( 'bold_photography_slider_page_' . $i );

		if ( $post_id && '' !== $post_id ) {
			$post_list = array_merge( $post_list, array( $post_id ) );

			$no_of_post++;
		}
	}

	$args['post__in'] = $post_list;


if ( ! $no_of_post ) {
	return;
}

$args['posts_per_page'] = $no_of_post;

$loop = new WP_Query( $args );

while ( $loop->have_posts() ) :
	$loop->the_post();

	$classes = 'post post-' . get_the_ID() . ' hentry slides';
	
	$thumbnail = 'post-thumbnail';
	?>
	<article class="<?php echo esc_attr( $classes ); ?>">
		<div class="hentry-inner">
			<?php bold_photography_post_thumbnail( $thumbnail, 'html', true, true ); ?>
			
			<div class="entry-container">
				<header class="entry-header">
					<h2 class="entry-title boxContrast centerText">
						<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h2>
				</header>

				<?php
				if ( 'excerpt' === $show_content ) {
					echo '<div class="entry-summary"><p>' . wp_kses_post( get_the_excerpt() ) . '</p></div><!-- .entry-summary -->';
				} elseif ( 'full-content' === $show_content ) {
					$content = apply_filters( 'the_content', get_the_content() );
					$content = str_replace( ']]>', ']]&gt;', $content );
					echo '<div class="entry-content">' . wp_kses_post( $content ) . '</div><!-- .entry-content -->';
				} 
				?>
			</div><!-- .entry-container -->
		</div><!-- .hentry-inner -->
	</article><!-- .slides -->
<?php
endwhile;

wp_reset_postdata();
