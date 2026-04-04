<?php
/**
 * Fellowship Page Section: Intro
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$header       = get_sub_field( 'header' );
$body_content = get_sub_field( 'body_content' );
$btn_text     = get_sub_field( 'button_text' );
$btn_url      = get_sub_field( 'button_url' );
$quote        = get_sub_field( 'quote' );
$quote_author = get_sub_field( 'quote_author' );
?>

<section class="pw-fellowship-intro pw-section">
    <div class="pw-container">
        <?php if ( $header ) : ?>
            <h1 class="pw-fellowship-intro__title"><?php echo esc_html( $header ); ?></h1>
        <?php endif; ?>

        <?php if ( $body_content ) : ?>
            <div class="pw-fellowship-intro__body"><?php echo wp_kses_post( $body_content ); ?></div>
        <?php endif; ?>

        <?php if ( $btn_text && $btn_url ) : ?>
            <a href="<?php echo esc_url( $btn_url ); ?>" class="pw-btn pw-btn--secondary">
                <?php echo esc_html( $btn_text ); ?>
            </a>
        <?php endif; ?>

        <?php if ( $quote ) : ?>
            <blockquote class="pw-fellowship-intro__quote">
                <p>&ldquo;<?php echo esc_html( $quote ); ?>&rdquo;</p>
                <?php if ( $quote_author ) : ?>
                    <cite><?php echo esc_html( $quote_author ); ?></cite>
                <?php endif; ?>
            </blockquote>
        <?php endif; ?>
    </div>
</section>
