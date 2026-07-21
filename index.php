<?php get_header(); ?>

<main id="site-content">
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'template-parts/content', get_post_format() ); ?>
        <?php endwhile; ?>
    <?php else : ?>
        <p><?php _e( 'No content found', 'custom-theme' ); ?></p>
    <?php endif; ?>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>