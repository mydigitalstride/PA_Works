<?php
/**
 * Fellowship Page Section: Program Details
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$sub_header      = get_sub_field( 'sub_header' );
$header          = get_sub_field( 'header' );
$body_content    = get_sub_field( 'body_content' );
$details         = get_sub_field( 'details' );
$schedule_header = get_sub_field( 'schedule_header' );
$schedule        = get_sub_field( 'schedule' );
?>

<section class="pw-program pw-section">
    <div class="pw-container">
        <?php if ( $sub_header ) : ?>
            <p class="pw-section-label"><?php echo esc_html( $sub_header ); ?></p>
        <?php endif; ?>

        <?php if ( $header ) : ?>
            <h2 class="pw-program__title"><?php echo esc_html( $header ); ?></h2>
        <?php endif; ?>

        <?php if ( $body_content ) : ?>
            <div class="pw-program__body"><?php echo wp_kses_post( $body_content ); ?></div>
        <?php endif; ?>

        <?php if ( $details ) : ?>
            <div class="pw-program__details">
                <h3 class="pw-program__details-header">Program Details</h3>
                <dl class="pw-program__details-list">
                    <?php foreach ( $details as $detail ) : ?>
                        <div class="pw-program__detail">
                            <dt><?php echo esc_html( $detail['label'] ); ?>:</dt>
                            <dd><?php echo esc_html( $detail['value'] ); ?></dd>
                        </div>
                    <?php endforeach; ?>
                </dl>
            </div>
        <?php endif; ?>

        <?php if ( $schedule ) : ?>
            <div class="pw-program__schedule">
                <?php if ( $schedule_header ) : ?>
                    <h3 class="pw-program__schedule-header"><?php echo esc_html( $schedule_header ); ?></h3>
                <?php endif; ?>

                <div class="pw-program__schedule-list">
                    <?php foreach ( $schedule as $item ) : ?>
                        <div class="pw-program__schedule-item">
                            <span class="pw-program__schedule-date"><?php echo esc_html( $item['date'] ); ?></span>
                            <span class="pw-program__schedule-desc"><?php echo esc_html( $item['description'] ); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
