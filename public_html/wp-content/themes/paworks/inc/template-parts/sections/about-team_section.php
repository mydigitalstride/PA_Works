<?php
/**
 * About Page Section: Our Team
 * Same visual output as the home page team section.
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$header    = get_sub_field( 'header' );
$bg_image  = get_sub_field( 'background_image' );
$members   = get_sub_field( 'members' );
$btn_text  = get_sub_field( 'button_text' );
$btn_url   = get_sub_field( 'button_url' );

$bg_style = $bg_image ? 'background-image: url(' . esc_url( $bg_image['url'] ) . ');' : '';
?>

<section class="pw-team" style="<?php echo esc_attr( $bg_style ); ?>">
    <div class="pw-team__inner">
        <?php if ( $header ) : ?>
            <h2 class="pw-team__title"><?php echo esc_html( $header ); ?></h2>
        <?php endif; ?>

        <?php if ( $members ) : ?>
            <div class="pw-team__grid">
                <?php foreach ( $members as $member ) : ?>
                    <div class="pw-team__member">
                        <?php if ( ! empty( $member['photo'] ) ) : ?>
                            <div class="pw-team__photo">
                                <img src="<?php echo esc_url( $member['photo']['sizes']['pw-team'] ?? $member['photo']['url'] ); ?>"
                                     alt="<?php echo esc_attr( $member['photo']['alt'] ?: $member['name'] ); ?>">
                            </div>
                        <?php endif; ?>

                        <?php if ( ! empty( $member['name'] ) ) : ?>
                            <p class="pw-team__name">
                                <?php echo esc_html( $member['name'] ); ?>
                                <?php if ( ! empty( $member['title'] ) ) : ?>
                                    <span>, <?php echo esc_html( $member['title'] ); ?></span>
                                <?php endif; ?>
                            </p>
                        <?php endif; ?>

                        <?php if ( ! empty( $member['role'] ) ) : ?>
                            <p class="pw-team__role"><?php echo esc_html( $member['role'] ); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ( $btn_text && $btn_url ) : ?>
            <a href="<?php echo esc_url( $btn_url ); ?>" class="pw-btn pw-btn--secondary">
                <?php echo esc_html( $btn_text ); ?>
            </a>
        <?php endif; ?>
    </div>
</section>
