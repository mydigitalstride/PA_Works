<?php
/**
 * Section: WYSIWYG
 *
 * Single WYSIWYG field rendered inside a 60vw container.
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$body_text = get_sub_field( 'body_text' );
?>

<section class="pw-wysiwyg pw-section">
    <div class="pw-wysiwyg__container">
        <?php echo wp_kses_post( $body_text ); ?>
    </div>
</section>
