<?php
/**
 * Advocacy Page Section: Content + Strategies
 *
 * Two-column layout: body content on left, numbered strategies list on right.
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$sub_header   = get_sub_field( 'sub_header' );
$header       = get_sub_field( 'header' );
$body_text    = get_sub_field( 'body_text' );
$btn_text     = get_sub_field( 'button_text' );
$btn_url      = get_sub_field( 'button_url' );
$list_header  = get_sub_field( 'list_header' );
$strategies   = get_sub_field( 'strategies' );
?>

<section class="pw-strategies pw-section">
    <div class="pw-container">
        <?php if ( $sub_header ) : ?>
            <p class="pw-section-label"><?php echo esc_html( $sub_header ); ?></p>
        <?php endif; ?>

        <?php if ( $header ) : ?>
            <h2 class="pw-strategies__title"><?php echo esc_html( $header ); ?></h2>
        <?php endif; ?>

        <div class="pw-strategies__grid">
            <div class="pw-strategies__content">
                <?php if ( $body_text ) : ?>
                    <div class="pw-strategies__body"><?php echo wp_kses_post( $body_text ); ?></div>
                <?php endif; ?>

                <?php if ( $btn_text && $btn_url ) : ?>
                    <a href="<?php echo esc_url( $btn_url ); ?>" class="pw-btn pw-btn--primary">
                        <?php echo esc_html( $btn_text ); ?>
                    </a>
                <?php endif; ?>
            </div>

            <?php if ( $strategies ) : ?>
                <div class="pw-strategies__list-box">
                    <?php if ( $list_header ) : ?>
                        <h3 class="pw-strategies__list-header"><?php echo esc_html( $list_header ); ?></h3>
                    <?php endif; ?>

                    <ol class="pw-strategies__list">
                        <?php foreach ( $strategies as $index => $strategy ) : ?>
                            <li>
                                <span class="pw-strategies__number"><?php echo esc_html( $index + 1 ); ?></span>
                                <span class="pw-strategies__text"><?php echo esc_html( $strategy['text'] ); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
