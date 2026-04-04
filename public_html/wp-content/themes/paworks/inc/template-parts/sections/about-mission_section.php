<?php
/**
 * About Page Section: Our Mission
 *
 * Two-column layout: body text on left, info boxes on right.
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$sub_header = get_sub_field( 'sub_header' );
$header     = get_sub_field( 'header' );
$body_text  = get_sub_field( 'body_text' );
$info_boxes = get_sub_field( 'info_boxes' );
?>

<section class="pw-mission pw-section">
    <div class="pw-container">
        <?php if ( $sub_header ) : ?>
            <p class="pw-section-label"><?php echo esc_html( $sub_header ); ?></p>
        <?php endif; ?>

        <?php if ( $header ) : ?>
            <h2 class="pw-mission__title"><?php echo esc_html( $header ); ?></h2>
        <?php endif; ?>

        <div class="pw-mission__grid">
            <div class="pw-mission__body">
                <?php if ( $body_text ) : ?>
                    <div class="pw-mission__text"><?php echo wp_kses_post( $body_text ); ?></div>
                <?php endif; ?>
            </div>

            <?php if ( $info_boxes ) : ?>
                <div class="pw-mission__boxes">
                    <?php foreach ( $info_boxes as $box ) :
                        $style = ! empty( $box['box_style'] ) ? $box['box_style'] : 'yellow';
                    ?>
                        <div class="pw-mission__box pw-mission__box--<?php echo esc_attr( $style ); ?>">
                            <?php if ( ! empty( $box['box_header'] ) ) : ?>
                                <h3 class="pw-mission__box-header"><?php echo esc_html( $box['box_header'] ); ?></h3>
                            <?php endif; ?>

                            <?php if ( ! empty( $box['items'] ) ) : ?>
                                <ul class="pw-mission__box-list">
                                    <?php foreach ( $box['items'] as $item ) : ?>
                                        <li><?php echo esc_html( $item['text'] ); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
