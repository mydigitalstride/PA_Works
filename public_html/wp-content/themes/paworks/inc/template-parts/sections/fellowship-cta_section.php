<?php
/**
 * Fellowship Page Section: CTA Button
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$buttons = get_sub_field( 'buttons' );
?>

<?php if ( ! empty( $buttons ) ) : ?>
<section class="pw-section pw-text-center">
    <div class="pw-container">
        <div class="pw-cta__buttons">
            <?php foreach ( $buttons as $button ) :
                if ( empty( $button['button_text'] ) || empty( $button['button_url'] ) ) {
                    continue;
                }
                $btn_classes = 'pw-btn pw-btn--secondary';
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
    </div>
</section>
<?php endif; ?>
