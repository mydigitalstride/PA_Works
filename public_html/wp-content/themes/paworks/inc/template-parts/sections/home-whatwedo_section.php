<?php
/**
 * Home Page Section: What We Do
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$header       = get_sub_field( 'header' );
$btn_text     = get_sub_field( 'button_text' );
$btn_url      = get_sub_field( 'button_url' );
$items        = get_sub_field( 'items' );
$description  = get_sub_field( 'description' );
$bg_image     = get_sub_field( 'background_image' );
$bg_position  = get_sub_field( 'bg_image_position' ) ?: 'center';
?>

<section class="pw-whatwedo">

    <?php if ( $bg_image ) : ?>
        <div class="pw-section-bg" aria-hidden="true" style="background-image: url('<?php echo esc_url( $bg_image['url'] ); ?>'); background-position: <?php echo esc_attr( $bg_position ); ?>;"></div>
    <?php endif; ?>

    <div class="pw-whatwedo__inner">
        <div class="pw-whatwedo__left">
            <?php if ( $header ) : ?>
                <h2 class="pw-whatwedo__title"><?php echo esc_html( $header ); ?></h2>
            <?php endif; ?>

            <?php if ( $btn_text && $btn_url ) : ?>
                <a href="<?php echo esc_url( $btn_url ); ?>" class="pw-btn pw-btn--primary">
                    <?php echo esc_html( $btn_text ); ?>
                </a>
            <?php endif; ?>
        </div>

        <div class="pw-whatwedo__right">
            <?php if ( $items ) : ?>
                <div class="pw-whatwedo__accordion">
                    <?php foreach ( $items as $index => $item ) :
                        $item_id = 'wwd-item-' . $index;
                    ?>
                        <div class="pw-whatwedo__accordion-item" data-accordion>
                            <button class="pw-whatwedo__accordion-trigger"
                                    aria-expanded="false"
                                    aria-controls="<?php echo esc_attr( $item_id ); ?>">
                                <span><?php echo esc_html( $item['text'] ); ?></span>
                                <span class="pw-whatwedo__accordion-icon" aria-hidden="true">+</span>
                            </button>
                            <?php if ( ! empty( $item['description'] ) ) : ?>
                                <div class="pw-whatwedo__accordion-body" id="<?php echo esc_attr( $item_id ); ?>" role="region">
                                    <?php echo esc_html( $item['description'] ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if ( $description ) : ?>
                <p class="pw-whatwedo__description"><?php echo esc_html( $description ); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>
