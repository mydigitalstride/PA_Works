<?php
/**
 * Main Index Template
 *
 * @package PAWorks
 */

get_header();
?>

<div class="pw-container" style="padding: 60px 24px;">
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <article>
                <h1><?php the_title(); ?></h1>
                <div><?php the_content(); ?></div>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <p><?php esc_html_e( 'No content found.', 'paworks' ); ?></p>
    <?php endif; ?>
</div>

<?php
get_footer();
