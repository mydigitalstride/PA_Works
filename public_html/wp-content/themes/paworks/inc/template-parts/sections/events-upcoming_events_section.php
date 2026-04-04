<?php
/**
 * Events Page Section: Upcoming Events
 *
 * Supports either a calendar shortcode or manual events list.
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$sub_header          = get_sub_field( 'sub_header' );
$header              = get_sub_field( 'header' );
$calendar_shortcode  = get_sub_field( 'calendar_shortcode' );
$events_list         = get_sub_field( 'events_list' );
?>

<section class="pw-upcoming-events pw-section">
    <div class="pw-container">
        <?php if ( $sub_header ) : ?>
            <p class="pw-section-label"><?php echo esc_html( $sub_header ); ?></p>
        <?php endif; ?>

        <?php if ( $header ) : ?>
            <h2 class="pw-upcoming-events__title"><?php echo esc_html( $header ); ?></h2>
        <?php endif; ?>

        <?php if ( $calendar_shortcode ) : ?>
            <div class="pw-upcoming-events__calendar">
                <?php echo do_shortcode( $calendar_shortcode ); ?>
            </div>
        <?php elseif ( $events_list ) : ?>
            <div class="pw-upcoming-events__list">
                <?php foreach ( $events_list as $event ) :
                    $is_featured = ! empty( $event['featured'] );
                    $card_class = $is_featured ? 'pw-event-card pw-event-card--featured' : 'pw-event-card';
                ?>
                    <div class="<?php echo esc_attr( $card_class ); ?>">
                        <?php if ( ! empty( $event['title'] ) ) : ?>
                            <h3 class="pw-event-card__title"><?php echo esc_html( $event['title'] ); ?></h3>
                        <?php endif; ?>

                        <div class="pw-event-card__meta">
                            <?php if ( ! empty( $event['date'] ) ) : ?>
                                <span class="pw-event-card__date">
                                    <strong><?php echo esc_html( $event['date'] ); ?></strong>
                                </span>
                            <?php endif; ?>

                            <?php if ( ! empty( $event['time'] ) ) : ?>
                                <span class="pw-event-card__time">(<?php echo esc_html( $event['time'] ); ?>)</span>
                            <?php endif; ?>
                        </div>

                        <?php if ( ! empty( $event['presenter'] ) ) : ?>
                            <p class="pw-event-card__presenter">
                                Presented by <?php echo esc_html( $event['presenter'] ); ?>
                            </p>
                        <?php endif; ?>

                        <?php if ( ! empty( $event['description'] ) ) : ?>
                            <p class="pw-event-card__description"><?php echo esc_html( $event['description'] ); ?></p>
                        <?php endif; ?>

                        <?php if ( ! empty( $event['register_url'] ) ) : ?>
                            <a href="<?php echo esc_url( $event['register_url'] ); ?>" class="pw-btn pw-btn--orange" target="_blank" rel="noopener noreferrer">
                                Register
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
