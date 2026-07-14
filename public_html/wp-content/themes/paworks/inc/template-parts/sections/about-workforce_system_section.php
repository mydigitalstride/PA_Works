<?php
/**
 * About Page Section: PA's Local Workforce System
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$sub_header    = get_sub_field( 'sub_header' );
$header        = get_sub_field( 'header' );
$map_image     = get_sub_field( 'map_image' );
$map_width     = get_sub_field( 'map_width' );
$map_alignment = get_sub_field( 'map_alignment' ) ?: 'left';
$body_content  = get_sub_field( 'body_content' );
$btn_text      = get_sub_field( 'button_text' );
$btn_url       = get_sub_field( 'button_url' );
$btn_target    = get_sub_field( 'button_target' );
$target_attr   = $btn_target ? ' target="_blank" rel="noopener noreferrer"' : '';
$map_style     = $map_width ? ' style="max-width: ' . esc_attr( $map_width ) . ';"' : '';
?>

<section class="pw-workforce-system pw-section">
    <div class="pw-container">
        <?php if ( $sub_header ) : ?>
            <p class="pw-section-label"><?php echo esc_html( $sub_header ); ?></p>
        <?php endif; ?>

        <?php if ( $header ) : ?>
            <h2 class="pw-workforce-system__title"><?php echo esc_html( $header ); ?></h2>
        <?php endif; ?>

        <?php if ( $body_content ) : ?>
            <div class="pw-workforce-system__body">
                <?php echo wp_kses_post( $body_content ); ?>
            </div>
        <?php endif; ?>

        <?php if ( $btn_text && $btn_url ) : ?>
            <a href="<?php echo esc_url( $btn_url ); ?>" class="pw-btn pw-btn--primary pw-workforce-system__btn"<?php echo $target_attr; ?>>
                <?php echo esc_html( $btn_text ); ?>
            </a>
        <?php endif; ?>

        <?php if ( $map_image ) : ?>
            <div class="pw-workforce-system__map pw-workforce-system__map--<?php echo esc_attr( $map_alignment ); ?>"<?php echo $map_style; ?>>
                <img src="<?php echo esc_url( $map_image['url'] ); ?>"
                     alt="<?php echo esc_attr( $map_image['alt'] ); ?>">
            </div>
        <?php endif; ?>
    </div>
</section>
