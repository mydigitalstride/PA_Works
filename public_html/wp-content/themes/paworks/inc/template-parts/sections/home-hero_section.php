<?php
/**
 * Home Page Section: Hero
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$bg_image     = get_sub_field( 'background_image' );
$sub_header   = get_sub_field( 'sub_header' );
$header       = get_sub_field( 'header' );
$body_text    = get_sub_field( 'body_text' );
$btn_text     = get_sub_field( 'button_text' );
$btn_url      = get_sub_field( 'button_url' );
$btn_target   = get_sub_field( 'button_target' );
$btn2_text    = get_sub_field( 'button2_text' );
$btn2_url     = get_sub_field( 'button2_url' );
$btn2_target  = get_sub_field( 'button2_target' );

$bg_style      = $bg_image ? 'background-image: url(' . esc_url( $bg_image['url'] ) . ');' : '';
$target_attr   = $btn_target ? ' target="_blank" rel="noopener noreferrer"' : '';
$target2_attr  = $btn2_target ? ' target="_blank" rel="noopener noreferrer"' : '';
?>

<section class="pw-hero" style="<?php echo esc_attr( $bg_style ); ?>">
    <div class="pw-hero__content">
        <?php if ( $sub_header ) : ?>
            <p class="pw-hero__subheader"><?php echo esc_html( $sub_header ); ?></p>
        <?php endif; ?>

        <?php if ( $header ) : ?>
            <h1 class="pw-hero__title"><?php echo esc_html( $header ); ?></h1>
        <?php endif; ?>

        <?php if ( $body_text ) : ?>
            <div class="pw-hero__body"><?php echo wp_kses_post( $body_text ); ?></div>
        <?php endif; ?>

        <?php if ( ( $btn_text && $btn_url ) || ( $btn2_text && $btn2_url ) ) : ?>
            <div class="pw-hero__buttons">
                <?php if ( $btn_text && $btn_url ) : ?>
                    <a href="<?php echo esc_url( $btn_url ); ?>" class="pw-btn pw-btn--primary"<?php echo $target_attr; ?>>
                        <?php echo esc_html( $btn_text ); ?>
                    </a>
                <?php endif; ?>

                <?php if ( $btn2_text && $btn2_url ) : ?>
                    <a href="<?php echo esc_url( $btn2_url ); ?>" class="pw-btn pw-btn--hero-secondary"<?php echo $target2_attr; ?>>
                        <?php echo esc_html( $btn2_text ); ?>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
