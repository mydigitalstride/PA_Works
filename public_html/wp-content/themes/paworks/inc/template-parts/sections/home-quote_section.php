<?php
/**
 * Section: Quote
 *
 * Centered quote block with bold attribution name below.
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$quote_text = get_sub_field( 'quote_text' );
$quote_name = get_sub_field( 'quote_name' );
?>

<section class="pw-quote pw-section">
    <div class="pw-container">
        <?php if ( $quote_text ) : ?>
            <blockquote class="pw-quote__block">
                <p class="pw-quote__text">&ldquo;<?php echo esc_html( $quote_text ); ?>&rdquo;</p>
                <?php if ( $quote_name ) : ?>
                    <cite class="pw-quote__name"><?php echo esc_html( $quote_name ); ?></cite>
                <?php endif; ?>
            </blockquote>
        <?php endif; ?>
    </div>
</section>
