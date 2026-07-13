<?php
/**
 * Home Page Section: Cards (Events/News)
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$cards               = get_sub_field( 'cards' );
$section_title       = get_sub_field( 'section_title' );
$disable_neg_margin  = get_sub_field( 'disable_negative_margin' );
if ( ! $cards ) {
    return;
}

$section_class = 'pw-cards';
if ( $disable_neg_margin ) {
    $section_class .= ' pw-cards--no-negative-margin';
}
?>

<section class="<?php echo esc_attr( $section_class ); ?>">
    <?php if ( ! empty( $section_title ) ) : ?>
        <h2 class="pw-cards__section-title"><?php echo esc_html( $section_title ); ?></h2>
    <?php endif; ?>

    <div class="pw-cards__grid">
        <?php foreach ( $cards as $card ) : ?>
            <div class="pw-card<?php echo empty( $card['image'] ) ? ' pw-card--no-image' : ''; ?>">
                <div class="pw-card__content">
                    <?php if ( ! empty( $card['label'] ) ) : ?>
                        <span class="pw-card__label"><?php echo esc_html( $card['label'] ); ?></span>
                    <?php endif; ?>

                    <?php if ( ! empty( $card['title'] ) ) : ?>
                        <h3 class="pw-card__title"><?php echo esc_html( $card['title'] ); ?></h3>
                    <?php endif; ?>

                    <?php if ( ! empty( $card['body'] ) ) : ?>
                        <div class="pw-card__body"><?php echo wp_kses_post( $card['body'] ); ?></div>
                    <?php endif; ?>

                    <?php if ( ! empty( $card['link_text'] ) && ! empty( $card['link_url'] ) ) : ?>
                        <a href="<?php echo esc_url( $card['link_url'] ); ?>" class="pw-card__link">
                            <?php echo esc_html( $card['link_text'] ); ?>
                        </a>
                    <?php endif; ?>
                </div>

                <?php if ( ! empty( $card['image'] ) ) : ?>
                    <div class="pw-card__image">
                        <img src="<?php echo esc_url( $card['image']['sizes']['pw-card'] ?? $card['image']['url'] ); ?>"
                             alt="<?php echo esc_attr( $card['image']['alt'] ); ?>">
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>
