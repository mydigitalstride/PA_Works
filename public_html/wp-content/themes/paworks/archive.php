<?php
/**
 * Blog Archive Template (News)
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

$hero_bg       = get_field( 'blog_hero_bg_image', 'option' );
$hero_subhead  = get_field( 'blog_hero_subheader', 'option' );
$hero_title    = get_field( 'blog_hero_title', 'option' );
$hero_body     = get_field( 'blog_hero_body', 'option' );
$hero_btn_text = get_field( 'blog_hero_btn_text', 'option' );
$hero_btn_url  = get_field( 'blog_hero_btn_url', 'option' );

$hero_bg_style = $hero_bg ? 'background-image: url(' . esc_url( $hero_bg['url'] ) . ');' : '';
?>

<section class="pw-hero" style="<?php echo esc_attr( $hero_bg_style ); ?>">
    <div class="pw-hero__content">
        <?php if ( $hero_subhead ) : ?>
            <p class="pw-hero__subheader"><?php echo esc_html( $hero_subhead ); ?></p>
        <?php endif; ?>

        <?php if ( $hero_title ) : ?>
            <h1 class="pw-hero__title"><?php echo esc_html( $hero_title ); ?></h1>
        <?php endif; ?>

        <?php if ( $hero_body ) : ?>
            <p class="pw-hero__body"><?php echo esc_html( $hero_body ); ?></p>
        <?php endif; ?>

        <?php if ( $hero_btn_text && $hero_btn_url ) : ?>
            <a href="<?php echo esc_url( $hero_btn_url ); ?>" class="pw-btn pw-btn--primary">
                <?php echo esc_html( $hero_btn_text ); ?>
            </a>
        <?php endif; ?>
    </div>
</section>

<section class="pw-blog-list pw-section">
    <div class="pw-container">
        <?php if ( have_posts() ) : ?>
            <?php
            while ( have_posts() ) :
                the_post();
                $is_highlight = is_sticky();
                ?>
                <article class="pw-blog-list__item">
                    <h3 class="pw-blog-list__title<?php echo $is_highlight ? ' pw-blog-list__title--highlight' : ''; ?>">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <p class="pw-blog-list__date"><?php echo esc_html( get_the_date() ); ?></p>
                    <div class="pw-blog-list__excerpt"><?php the_excerpt(); ?></div>
                </article>
            <?php endwhile; ?>

            <div class="pw-blog-list__pagination">
                <?php
                the_posts_pagination( array(
                    'prev_text' => __( '&laquo; Previous', 'paworks' ),
                    'next_text' => __( 'Next &raquo;', 'paworks' ),
                ) );
                ?>
            </div>
        <?php else : ?>
            <p><?php esc_html_e( 'No news found.', 'paworks' ); ?></p>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
