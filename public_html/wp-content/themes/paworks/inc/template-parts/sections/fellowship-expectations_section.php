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
                        <?php foreach ( $list['items'] as $item ) : ?>
                            <li><?php echo wp_kses_post( $item['text'] ); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>
