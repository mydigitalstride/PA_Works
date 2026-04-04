<?php
/**
 * Advocacy Page Section: Call to Action
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$sub_header = get_sub_field( 'sub_header' );
$header     = get_sub_field( 'header' );
$body_text  = get_sub_field( 'body_text' );
$btn_text   = get_sub_field( 'button_text' );
$btn_url    = get_sub_field( 'button_url' );
$bg_style   = get_sub_field( 'bg_style' );

$section_classes = 'pw-cta pw-section';
switch ( $bg_style ) {
    case 'blue':
        $section_classes .= ' pw-cta--blue';
        break;
    case 'navy':
        $section_classes .= ' pw-cta--navy';
        break;
    case 'yellow':
        $section_classes .= ' pw-cta--yellow';
        break;
    default:
        $section_classes .= ' pw-cta--light';
        break;
}
?>

<section class="<?php echo esc_attr( $section_classes ); ?>">
    <div class="pw-container pw-text-center">
        <?php if ( $sub_header ) : ?>
            <p class="pw-cta__subheader"><?php echo esc_html( $sub_header ); ?></p>
        <?php endif; ?>

        <?php if ( $header ) : ?>
            <h2 class="pw-cta__header"><?php echo esc_html( $header ); ?></h2>
        <?php endif; ?>

        <?php if ( $body_text ) : ?>
            <p class="pw-cta__body"><?php echo wp_kses_post( $body_text ); ?></p>
        <?php endif; ?>

        <?php if ( $btn_text && $btn_url ) : ?>
            <a href="<?php echo esc_url( $btn_url ); ?>" class="pw-btn pw-btn--orange">
                <?php echo esc_html( $btn_text ); ?>
            </a>
        <?php endif; ?>
    </div>
</section>
