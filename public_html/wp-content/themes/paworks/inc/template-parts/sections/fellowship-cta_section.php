<?php
/**
 * Fellowship Page Section: CTA Button
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$btn_text = get_sub_field( 'button_text' );
$btn_url  = get_sub_field( 'button_url' );
?>

<?php if ( $btn_text && $btn_url ) : ?>
<section class="pw-section pw-text-center">
    <div class="pw-container">
        <a href="<?php echo esc_url( $btn_url ); ?>" class="pw-btn pw-btn--secondary">
            <?php echo esc_html( $btn_text ); ?>
        </a>
    </div>
</section>
<?php endif; ?>
