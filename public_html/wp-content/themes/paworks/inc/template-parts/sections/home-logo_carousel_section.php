<?php
/**
 * Section: Logo Carousel
 *
 * Horizontal scrolling carousel of logo/organization cards with hover gradient.
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$header = get_sub_field( 'header' );
$logos  = get_sub_field( 'logos' );
?>

<section class="pw-logo-carousel pw-section">
    <div class="pw-container">
        <?php if ( $header ) : ?>
            <h2 class="pw-logo-carousel__title"><?php echo esc_html( $header ); ?></h2>
        <?php endif; ?>

        <?php if ( $logos ) : ?>
            <div class="pw-logo-carousel__track">
                <?php foreach ( $logos as $logo ) : ?>
                    <div class="pw-logo-carousel__card">
                        <div class="pw-logo-carousel__card-inner">
                            <?php if ( ! empty( $logo['image'] ) ) : ?>
                                <div class="pw-logo-carousel__image">
                                    <img src="<?php echo esc_url( $logo['image']['url'] ); ?>"
                                         alt="<?php echo esc_attr( $logo['image']['alt'] ?: $logo['name'] ); ?>">
                                </div>
                            <?php endif; ?>

                            <?php if ( ! empty( $logo['organization'] ) ) : ?>
                                <h3 class="pw-logo-carousel__org"><?php echo esc_html( $logo['organization'] ); ?></h3>
                            <?php endif; ?>

                            <?php if ( ! empty( $logo['name'] ) ) : ?>
                                <p class="pw-logo-carousel__name"><?php echo esc_html( $logo['name'] ); ?></p>
                            <?php endif; ?>

                            <?php if ( ! empty( $logo['title'] ) ) : ?>
                                <p class="pw-logo-carousel__role"><?php echo esc_html( $logo['title'] ); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
