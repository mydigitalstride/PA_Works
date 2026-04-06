<?php
/**
 * Home Page Section: Our Impact
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$header        = get_sub_field( 'header' );
$impact_logo   = get_sub_field( 'impact_logo' );
$facts_label   = get_sub_field( 'facts_label' );
$big_stat_text = get_sub_field( 'big_stat_text' );
$big_stat_sub  = get_sub_field( 'big_stat_subtitle' );
$source        = get_sub_field( 'source' );
$stats         = get_sub_field( 'stats' );
$bg_image      = get_sub_field( 'background_image' );
$bg_position   = get_sub_field( 'bg_image_position' ) ?: 'center';
?>

<section class="pw-impact pw-section">

    <?php if ( $bg_image ) : ?>
        <div class="pw-section-bg" aria-hidden="true" style="background-image: url('<?php echo esc_url( $bg_image['url'] ); ?>'); background-position: <?php echo esc_attr( $bg_position ); ?>;"></div>
    <?php endif; ?>

    <div class="pw-impact__inner">
        <div class="pw-impact__left">
            <?php if ( $header ) : ?>
                <h2 class="pw-impact__section-title"><?php echo esc_html( $header ); ?></h2>
            <?php endif; ?>

            <?php if ( $impact_logo ) : ?>
                <img src="<?php echo esc_url( $impact_logo['url'] ); ?>"
                     alt="<?php echo esc_attr( $impact_logo['alt'] ); ?>"
                     class="pw-impact__logo">
            <?php endif; ?>

            <?php if ( $facts_label ) : ?>
                <p class="pw-impact__facts-label"><?php echo esc_html( $facts_label ); ?></p>
            <?php endif; ?>

            <?php if ( $big_stat_text ) : ?>
                <p class="pw-impact__big-stat"><?php echo esc_html( $big_stat_text ); ?></p>
            <?php endif; ?>

            <?php if ( $big_stat_sub ) : ?>
                <p style="font-size: 0.9rem; color: var(--pw-dark-gray);"><?php echo esc_html( $big_stat_sub ); ?></p>
            <?php endif; ?>

            <?php if ( $source ) : ?>
                <p class="pw-impact__source"><?php echo esc_html( $source ); ?></p>
            <?php endif; ?>
        </div>

        <?php if ( $stats ) : ?>
            <div class="pw-impact__stats">
                <?php foreach ( $stats as $stat ) : ?>
                    <div class="pw-impact__stat">
                        <?php if ( ! empty( $stat['icon'] ) ) : ?>
                            <div class="pw-impact__stat-icon">
                                <img src="<?php echo esc_url( $stat['icon']['url'] ); ?>"
                                     alt="<?php echo esc_attr( $stat['icon']['alt'] ); ?>">
                            </div>
                        <?php endif; ?>

                        <div class="pw-impact__stat-content">
                            <?php if ( ! empty( $stat['number'] ) ) : ?>
                                <div class="pw-impact__stat-number"><?php echo esc_html( $stat['number'] ); ?></div>
                            <?php endif; ?>

                            <?php if ( ! empty( $stat['label'] ) ) : ?>
                                <div class="pw-impact__stat-label"><?php echo esc_html( $stat['label'] ); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
