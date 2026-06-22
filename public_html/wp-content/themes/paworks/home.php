<?php
/**
 * Blog Posts Page Template (News)
 *
 * WordPress routes the static "Posts page" set in Settings > Reading
 * through home.php (falling back to index.php) -- archive.php only
 * applies to taxonomy/post-type/date archive views, never the posts
 * page itself. Mirrors archive.php's hero + listing layout so /news/
 * gets the same formatting.
 *
 * @package PAWorks
 */

get_header();

$posts_page_id  = get_option( 'page_for_posts' );
$featured_image = $posts_page_id ? get_the_post_thumbnail_url( $posts_page_id, 'full' ) : false;
$bg_image       = get_field( 'news_archive_background_image', 'option' );
$bg_url         = $featured_image ? $featured_image : ( $bg_image['url'] ?? '' );

$sub_header = get_field( 'news_archive_sub_header', 'option' );
$header     = get_field( 'news_archive_header', 'option' );
$body_text  = get_field( 'news_archive_body_text', 'option' );
$btn_text   = get_field( 'news_archive_button_text', 'option' );
$btn_url    = get_field( 'news_archive_button_url', 'option' );
$btn_target = get_field( 'news_archive_button_target', 'option' );

$mailing_text = get_field( 'news_archive_mailing_list_text', 'option' );
$mailing_url  = get_field( 'news_archive_mailing_list_url', 'option' );

$bg_style     = $bg_url ? 'background-image: url(' . esc_url( $bg_url ) . ');' : '';
$target_attr  = $btn_target ? ' target="_blank" rel="noopener noreferrer"' : '';
?>

<section class="pw-hero" style="<?php echo esc_attr( $bg_style ); ?>">
    <div class="pw-hero__content">
        <?php if ( $sub_header ) : ?>
            <p class="pw-hero__subheader"><?php echo esc_html( $sub_header ); ?></p>
        <?php endif; ?>

        <?php if ( $header ) : ?>
            <h1 class="pw-hero__title"><?php echo esc_html( $header ); ?></h1>
        <?php endif; ?>

        <?php if ( $body_text ) : ?>
            <div class="pw-hero__body"><?php echo wp_kses_post( $body_text ); ?></div>
        <?php endif; ?>

        <?php if ( $btn_text && $btn_url ) : ?>
            <a href="<?php echo esc_url( $btn_url ); ?>" class="pw-btn pw-btn--primary"<?php echo $target_attr; ?>>
                <?php echo esc_html( $btn_text ); ?>
            </a>
        <?php endif; ?>
    </div>
</section>

<section class="pw-archive pw-section">
    <div class="pw-container">
        <?php if ( have_posts() ) : ?>
            <ul class="pw-archive__list">
                <?php while ( have_posts() ) : the_post(); ?>
                    <li class="pw-archive__post">
                        <a href="<?php the_permalink(); ?>" class="pw-archive__title">
                            <?php the_title(); ?>
                        </a>
                        <span class="pw-archive__date"><?php echo esc_html( get_the_date() ); ?></span>
                        <p class="pw-archive__excerpt">
                            <?php echo esc_html( wp_trim_words( get_the_excerpt(), 40 ) ); ?>
                        </p>
                    </li>
                <?php endwhile; ?>
            </ul>

            <?php
            the_posts_pagination( array(
                'mid_size'  => 2,
                'prev_text' => '&laquo; &lsaquo;',
                'next_text' => '&rsaquo; &raquo;',
            ) );
            ?>

            <?php if ( $mailing_text && $mailing_url ) : ?>
                <div class="pw-archive__mailing-cta">
                    <a href="<?php echo esc_url( $mailing_url ); ?>" class="pw-btn pw-btn--primary" target="_blank" rel="noopener noreferrer">
                        <?php echo esc_html( $mailing_text ); ?>
                    </a>
                </div>
            <?php endif; ?>
        <?php else : ?>
            <p><?php esc_html_e( 'No articles found.', 'paworks' ); ?></p>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
