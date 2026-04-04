<?php
/**
 * Home Page Section: About
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$header      = get_sub_field( 'header' );
$body_text   = get_sub_field( 'body_text' );
$btn_text    = get_sub_field( 'button_text' );
$btn_url     = get_sub_field( 'button_url' );
$image       = get_sub_field( 'image' );
$bg_image    = get_sub_field( 'background_image' );
$bg_position = get_sub_field( 'bg_image_position' ) ?: 'center';
?>

<section class="pw-about pw-section">

    <?php if ( $bg_image ) : ?>
        <div class="pw-section-bg" aria-hidden="true" style="background-image: url('<?php echo esc_url( $bg_image['url'] ); ?>'); background-position: <?php echo esc_attr( $bg_position ); ?>;"></div>
    <?php endif; ?>

    <div class="pw-about__inner">
        <div class="pw-about__content">
            <?php if ( $header ) : ?>
                <h2 class="pw-about__title"><?php echo esc_html( $header ); ?></h2>
            <?php endif; ?>

            <?php if ( $body_text ) : ?>
                <div class="pw-about__body"><?php echo wp_kses_post( $body_text ); ?></div>
            <?php endif; ?>

            <?php if ( $btn_text && $btn_url ) : ?>
                <a href="<?php echo esc_url( $btn_url ); ?>" class="pw-btn pw-btn--orange">
                    <?php echo esc_html( $btn_text ); ?>
                </a>
            <?php endif; ?>
        </div>

        <?php if ( $image ) : ?>
            <div class="pw-about__image">
                <img src="<?php echo esc_url( $image['sizes']['pw-about'] ?? $image['url'] ); ?>"
                     alt="<?php echo esc_attr( $image['alt'] ); ?>">
            </div>
        <?php endif; ?>
    </div>
</section>
