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
$buttons    = get_sub_field( 'buttons' );
?>

<section class="pw-section pw-text-center">
    <div class="pw-container">
        <?php if ( $sub_header ) : ?>
            <p class="pw-section-label"><?php echo esc_html( $sub_header ); ?></p>
        <?php endif; ?>

        <?php if ( $header ) : ?>
            <h2 style="margin-bottom: 24px;"><?php echo esc_html( $header ); ?></h2>
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
