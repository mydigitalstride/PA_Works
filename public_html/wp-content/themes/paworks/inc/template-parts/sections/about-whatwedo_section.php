<?php
/**
 * About Page Section: What We Do
 * Same visual output as the home page What We Do section.
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$header      = get_sub_field( 'header' );
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
