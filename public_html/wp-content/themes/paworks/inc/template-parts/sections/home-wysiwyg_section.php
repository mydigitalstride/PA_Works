<?php
/**
 * Section: WYSIWYG (Free-form Content)
 *
 * Supports stacking multiple header/content/button blocks within a
 * single section instance.
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$header  = get_sub_field( 'header' );
$content = get_sub_field( 'content' );
$blocks  = get_sub_field( 'blocks' );

if ( empty( $blocks ) && ( $header || $content ) ) {
    $blocks = array( array( 'header' => $header, 'content' => $content, 'button_text' => '', 'button_url' => '', 'button_target' => 0 ) );
}

if ( empty( $blocks ) ) {
    return;
}
?>

<section class="pw-wysiwyg pw-section">
    <div class="pw-container">
        <?php foreach ( $blocks as $block ) :
            $block_header  = $block['header'] ?? '';
            $block_content = $block['content'] ?? '';
            $btn_text      = $block['button_text'] ?? '';
            $btn_url       = $block['button_url'] ?? '';
            $target_attr   = ! empty( $block['button_target'] ) ? ' target="_blank" rel="noopener noreferrer"' : '';

            if ( ! $block_header && ! $block_content && ! ( $btn_text && $btn_url ) ) {
                continue;
            }
        ?>
            <div class="pw-wysiwyg__block">
                <?php if ( $block_header ) : ?>
                    <h2 class="pw-wysiwyg__title"><?php echo esc_html( $block_header ); ?></h2>
                <?php endif; ?>

                <?php if ( $block_content ) : ?>
                    <div class="pw-wysiwyg__content"><?php echo wp_kses_post( $block_content ); ?></div>
                <?php endif; ?>

                <?php if ( $btn_text && $btn_url ) : ?>
                    <a href="<?php echo esc_url( $btn_url ); ?>" class="pw-btn pw-btn--primary pw-wysiwyg__btn"<?php echo $target_attr; ?>>
                        <?php echo esc_html( $btn_text ); ?>
                    </a>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>
