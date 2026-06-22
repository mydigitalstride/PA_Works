<?php
/**
 * Fellowship Page Section: Expectations & Requirements
 *
 * Renders multiple bullet-list sections (Fellows Can Expect, Will Learn, Who Should Apply).
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$content_lists = get_sub_field( 'content_lists' );
if ( ! $content_lists ) {
    return;
}
?>

<section class="pw-expectations pw-section">
    <div class="pw-container">
        <?php foreach ( $content_lists as $list ) : ?>
            <div class="pw-expectations__block">
                <?php if ( ! empty( $list['header'] ) ) : ?>
                    <h3 class="pw-expectations__header"><?php echo esc_html( $list['header'] ); ?></h3>
                <?php endif; ?>

                <?php if ( ! empty( $list['items'] ) ) : ?>
                    <ul class="pw-expectations__list">
                        <?php foreach ( $list['items'] as $item ) :
                            $text = trim( $item['text'] );

                            // If an editor pasted/typed an entire <ul>/<ol> into one
                            // item's WYSIWYG field, unwrap it so its <li> children
                            // become direct children of pw-expectations__list instead
                            // of nesting a list inside this item's own <li>.
                            if ( preg_match( '/^<(ul|ol)[^>]*>(.*)<\/\1>$/is', $text, $matches ) ) :
                                echo wp_kses_post( $matches[2] );
                            else :
                                ?>
                                <li>
                                    <?php
                                    // Support both plain textarea and wysiwyg values
                                    echo ( strpos( $text, '<' ) !== false )
                                        ? wp_kses_post( $text )
                                        : esc_html( $text );
                                    ?>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>
