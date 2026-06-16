<?php
/**
 * Advocacy Page Section: WIOA / Legislation
 *
 * Two-column layout: body text on left, image + quick links card on right.
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$sub_header    = get_sub_field( 'sub_header' );
$header        = get_sub_field( 'header' );
$body_content  = get_sub_field( 'body_content' );
$image         = get_sub_field( 'image' );
$links_header  = get_sub_field( 'links_header' );
$quick_links   = get_sub_field( 'quick_links' );
?>

<section class="pw-wioa pw-section">
    <div class="pw-container">
        <?php if ( $sub_header ) : ?>
            <p class="pw-section-label"><?php echo esc_html( $sub_header ); ?></p>
        <?php endif; ?>

        <?php if ( $header ) : ?>
            <h2 class="pw-wioa__title"><?php echo esc_html( $header ); ?></h2>
        <?php endif; ?>

        <div class="pw-wioa__grid">
            <div class="pw-wioa__content">
                <?php if ( $body_content ) : ?>
                    <div class="pw-wioa__body"><?php echo wp_kses_post( $body_content ); ?></div>
                <?php endif; ?>
            </div>

            <?php if ( $image || $quick_links ) : ?>
                <div class="pw-wioa__sidebar">
                    <?php if ( $image ) : ?>
                        <div class="pw-wioa__image">
                            <img src="<?php echo esc_url( $image['url'] ); ?>"
                                 alt="<?php echo esc_attr( $image['alt'] ); ?>">
                        </div>
                    <?php endif; ?>

                    <?php if ( $quick_links ) : ?>
                        <div class="pw-wioa__links">
                            <?php if ( $links_header ) : ?>
                                <h3 class="pw-wioa__links-header"><?php echo esc_html( $links_header ); ?></h3>
                            <?php endif; ?>

                            <ul class="pw-wioa__links-list">
                                <?php foreach ( $quick_links as $link ) : ?>
                                    <li>
                                        <a href="<?php echo esc_url( $link['url'] ); ?>" target="_blank" rel="noopener noreferrer">
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M8 5v14l11-7z"/></svg>
                                            <?php echo esc_html( $link['text'] ); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
