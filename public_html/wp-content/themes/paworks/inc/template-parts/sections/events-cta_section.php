<?php
/**
 * Events Page Section: CTA
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$sub_header = get_sub_field( 'sub_header' );
$header     = get_sub_field( 'header' );
$btn_text   = get_sub_field( 'button_text' );
$btn_url    = get_sub_field( 'button_url' );
?>

<section class="pw-section pw-text-center">
    <div class="pw-container">
        <?php if ( $sub_header ) : ?>
            <p class="pw-section-label"><?php echo esc_html( $sub_header ); ?></p>
        <?php endif; ?>

        <?php if ( $header ) : ?>
            <h2 style="margin-bottom: 24px;"><?php echo esc_html( $header ); ?></h2>
        <?php endif; ?>

        <?php if ( $btn_text && $btn_url ) : ?>
            <a href="<?php echo esc_url( $btn_url ); ?>" class="pw-btn pw-btn--orange">
                <?php echo esc_html( $btn_text ); ?>
            </a>
        <?php endif; ?>
    </div>
</section>
