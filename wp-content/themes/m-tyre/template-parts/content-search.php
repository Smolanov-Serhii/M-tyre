<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package m-tyre
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="search__image">
        <?php m_tyre_post_thumbnail(); ?>
    </div>
    <div class="search__content">
        <header class="entry-header">
            <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

            <?php if ( 'post' === get_post_type() ) : ?>
                <div class="entry-meta">
                    <?php
                    m_tyre_posted_on();
                    m_tyree_posted_by();
                    ?>
                </div><!-- .entry-meta -->
            <?php endif; ?>
        </header><!-- .entry-header -->

        <div class="entry-summary">
            <?php the_excerpt(); ?>
        </div><!-- .entry-summary -->
    </div>

</article><!-- #post-<?php the_ID(); ?> -->
