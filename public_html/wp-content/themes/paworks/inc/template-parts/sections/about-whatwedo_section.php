<?php
/**
 * About Page Section: Accordion (What We Do)
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$sub_header  = get_sub_field( 'sub_header' );
$header      = get_sub_field( 'header' );
$body_text   = get_sub_field( 'body_text' );
$btn_text    = get_sub_field( 'button_text' );
$btn_url     = get_sub_field( 'button_url' );
$items       = get_sub_field( 'items' );
$description = get_sub_field( 'description' );
$bg_image    = get_sub_field( 'background_image' );

$bg_style = $bg_image ? 'background-image: url(' . esc_url( $bg_image['url'] ) . ');' : '';
?>

<section class="pw-whatwedo" style="<?php echo esc_attr( $bg_style ); ?>">
    <div class="pw-whatwedo__inner">
        <div class="pw-whatwedo__left">
            <?php if ( $sub_header ) : ?>
                <p class="pw-whatwedo__subheader"><?php echo esc_html( $sub_header ); ?></p>
            <?php endif; ?>

            <?php if ( $header ) : ?>
                <h2 class="pw-whatwedo__title"><?php echo esc_html( $header ); ?></h2>
            <?php endif; ?>

            <?php if ( $body_text ) : ?>
                <div class="pw-whatwedo__body"><?php echo wp_kses_post( $body_text ); ?></div>
            <?php endif; ?>

            <?php if ( $btn_text && $btn_url ) : ?>
                <a href="<?php echo esc_url( $btn_url ); ?>" class="pw-btn pw-btn--primary">
                    <?php echo esc_html( $btn_text ); ?>
                </a>
            <?php endif; ?>
        </div>

        <div class="pw-whatwedo__right">
            <?php if ( $items ) : ?>
                <div class="pw-whatwedo__items">
                    <?php foreach ( $items as $item ) : ?>
                        <div class="pw-whatwedo__item">
                            <?php echo esc_html( $item['text'] ); ?>
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
