<?php
/**
 * Section: WYSIWYG (Free-form Content)
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$header  = get_sub_field( 'header' );
$content = get_sub_field( 'content' );

if ( ! $header && ! $content ) {
    return;
}
?>

<section class="pw-wysiwyg pw-section">
    <div class="pw-container">
        <?php if ( $header ) : ?>
            <h2 class="pw-wysiwyg__title"><?php echo esc_html( $header ); ?></h2>
        <?php endif; ?>

        <?php if ( $content ) : ?>
            <div class="pw-wysiwyg__content"><?php echo wp_kses_post( $content ); ?></div>
        <?php endif; ?>
    </div>
</section>
