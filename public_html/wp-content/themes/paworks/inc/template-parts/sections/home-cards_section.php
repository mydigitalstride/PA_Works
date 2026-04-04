<?php
/**
 * Home Page Section: Cards (Events/News)
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$cards = get_sub_field( 'cards' );
if ( ! $cards ) {
    return;
}
?>

<section class="pw-cards">
    <div class="pw-cards__grid">
        <?php foreach ( $cards as $card ) : ?>
            <div class="pw-card">
                <div class="pw-card__content">
                    <?php if ( ! empty( $card['label'] ) ) : ?>
                        <span class="pw-card__label"><?php echo esc_html( $card['label'] ); ?></span>
                    <?php endif; ?>

                    <?php if ( ! empty( $card['title'] ) ) : ?>
                        <h3 class="pw-card__title"><?php echo esc_html( $card['title'] ); ?></h3>
                    <?php endif; ?>

                    <?php if ( ! empty( $card['body'] ) ) : ?>
                        <p class="pw-card__body"><?php echo esc_html( $card['body'] ); ?></p>
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
