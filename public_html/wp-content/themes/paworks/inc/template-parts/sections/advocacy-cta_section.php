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
$buttons    = get_sub_field( 'buttons' );
$bg_style   = get_sub_field( 'bg_style' );

if ( empty( $buttons ) && $btn_text && $btn_url ) {
    $buttons = array( array( 'button_text' => $btn_text, 'button_url' => $btn_url, 'button_target' => 0, 'hide_on_mobile' => 0 ) );
}

$section_classes = 'pw-cta pw-section';
switch ( $bg_style ) {
    case 'sky':
        $section_classes .= ' pw-cta--sky';
        break;
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

        <?php if ( ! empty( $buttons ) ) : ?>
            <div class="pw-cta__buttons">
                <?php foreach ( $buttons as $button ) :
                    if ( empty( $button['button_text'] ) || empty( $button['button_url'] ) ) {
                        continue;
                    }
                    $btn_classes = 'pw-btn pw-btn--orange';
                    if ( ! empty( $button['hide_on_mobile'] ) ) {
                        $btn_classes .= ' pw-btn--hide-mobile';
                    }
                    $btn_target_attr = ! empty( $button['button_target'] ) ? ' target="_blank" rel="noopener noreferrer"' : '';
                ?>
                    <a href="<?php echo esc_url( $button['button_url'] ); ?>" class="<?php echo esc_attr( $btn_classes ); ?>"<?php echo $btn_target_attr; ?>>
                        <?php echo esc_html( $button['button_text'] ); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
