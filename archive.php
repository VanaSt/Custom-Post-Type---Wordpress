<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since 1.0.0
 */

get_header();

$description = get_the_archive_description();
?>

<?php if ( have_posts() ) : ?>

	<header class="page-header alignwide">
		<?php if ( $description ) : ?>
			<div class="archive-description"><?php echo wp_kses_post( wpautop( $description ) ); ?></div>
		<?php endif; ?>
	</header><!-- .page-header -->

<div class="row">

	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>


        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



        <div class="card-wrapper">

        
            <div class="col-image">
                <?php twenty_twenty_one_post_thumbnail(); ?>
            </div>

            <div class="col-content">
                <div class="content-wrapper">
                    <?php if ( is_singular() ) : ?>
                        <?php the_title( '<h1 class="entry-title default-max-width">', '</h1>' ); ?>
                    <?php else : ?>
                        <?php the_title( sprintf( '<h2 class="entry-title default-max-width"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                    <?php endif; ?>

                    <div class="line"></div>

                    <div class="content">
                        <?php
                        the_content(
                            twenty_twenty_one_continue_reading_text()
                        );

                        wp_link_pages(
                            array(
                                'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'twentytwentyone' ) . '">',
                                'after'    => '</nav>',
                                /* translators: %: Page number. */
                                'pagelink' => esc_html__( 'Page %', 'twentytwentyone' ),
                            )
                        ); ?>
                    </div>
                </div>
            </div>
        </div>
    



<footer class="entry-footer default-max-width">
    <?php twenty_twenty_one_entry_meta_footer(); ?>
</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->


		<?php //get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) ); ?>
	<?php endwhile; ?>
</div>	

	<?php twenty_twenty_one_the_posts_navigation(); ?>

<?php else : ?>
	<?php get_template_part( 'template-parts/content/content-none' ); ?>
<?php endif; ?>








