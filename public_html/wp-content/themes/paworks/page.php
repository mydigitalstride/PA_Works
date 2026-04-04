<?php
/**
 * Default Page Template
 *
 * @package PAWorks
 */

get_header();
?>

<div class="pw-container" style="padding: 60px 24px;">
    <?php while ( have_posts() ) : the_post(); ?>
        <article>
            <h1><?php the_title(); ?></h1>
            <div><?php the_content(); ?></div>
        </article>
    <?php endwhile; ?>
</div>

<?php
get_footer();
