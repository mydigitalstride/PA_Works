<?php
/**
 * Home Page Section: Our Team
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$header        = get_sub_field( 'header' );
$bg_image      = get_sub_field( 'background_image' );
$overlay_image = get_sub_field( 'overlay_image' );
$members       = get_sub_field( 'members' );
$btn_text      = get_sub_field( 'button_text' );
$btn_url       = get_sub_field( 'button_url' );

// Full background image sets a CSS var; gradient stays as base
$bg_style = $bg_image ? '--pw-bg-image: url(' . esc_url( $bg_image['url'] ) . ');' : '';
?>

<section class="pw-team<?php echo $bg_image ? ' pw-team--has-bg' : ''; ?>" style="<?php echo esc_attr( $bg_style ); ?>">

    <?php if ( $overlay_image ) : ?>
        <div class="pw-team__overlay" aria-hidden="true">
            <img src="<?php echo esc_url( $overlay_image['url'] ); ?>"
                 alt="">
        </div>
    <?php endif; ?>

    <div class="pw-team__inner">
        <?php if ( $header ) : ?>
            <h2 class="pw-team__title"><?php echo esc_html( $header ); ?></h2>
        <?php endif; ?>

        <?php if ( $members ) : ?>
            <div class="pw-team__grid">
                <?php foreach ( $members as $member ) : ?>
                    <div class="pw-team__member">
                        <div class="pw-team__member-card">
                            <?php if ( ! empty( $member['photo'] ) ) : ?>
                                <div class="pw-team__photo">
                                    <img src="<?php echo esc_url( $member['photo']['sizes']['pw-team'] ?? $member['photo']['url'] ); ?>"
                                         alt="<?php echo esc_attr( $member['photo']['alt'] ?: ( $member['name'] ?? '' ) ); ?>">
                                </div>
                            <?php endif; ?>

                            <div class="pw-team__member-info">
                                <?php if ( ! empty( $member['name'] ) ) : ?>
                                    <p class="pw-team__name">
                                        <?php echo esc_html( $member['name'] ); ?>
                                        <?php if ( ! empty( $member['title'] ) ) : ?>
                                            <span class="pw-team__credentials">, <?php echo esc_html( $member['title'] ); ?></span>
                                        <?php endif; ?>
                                    </p>
                                <?php endif; ?>

                                <?php if ( ! empty( $member['role'] ) ) : ?>
                                    <p class="pw-team__role"><?php echo esc_html( $member['role'] ); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ( $btn_text && $btn_url ) : ?>
            <a href="<?php echo esc_url( $btn_url ); ?>" class="pw-btn pw-btn--primary">
                <?php echo esc_html( $btn_text ); ?>
            </a>
        <?php endif; ?>
    </div>
</section>
