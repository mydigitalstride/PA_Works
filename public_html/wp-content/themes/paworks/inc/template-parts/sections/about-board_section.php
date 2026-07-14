<?php
/**
 * About Page Section: Board of Directors
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$sub_header = get_sub_field( 'sub_header' );
$header     = get_sub_field( 'header' );
$members    = get_sub_field( 'members' );
?>

<section class="pw-board pw-section">
    <div class="pw-container">
        <?php if ( $sub_header ) : ?>
            <p class="pw-section-label"><?php echo esc_html( $sub_header ); ?></p>
        <?php endif; ?>

        <?php if ( $header ) : ?>
            <h2 class="pw-board__title"><?php echo esc_html( $header ); ?></h2>
        <?php endif; ?>

        <?php if ( $members ) : ?>
            <div class="pw-board__grid">
                <?php foreach ( $members as $member ) :
                    $highlighted_class = ! empty( $member['highlighted'] ) ? ' pw-board__member--highlighted' : '';
                    $link_url          = $member['link_url'] ?? '';
                    $tag               = $link_url ? 'a' : 'div';
                    $link_attrs        = '';
                    if ( $link_url ) {
                        $link_attrs = ' href="' . esc_url( $link_url ) . '"';
                        if ( ! empty( $member['link_target'] ) ) {
                            $link_attrs .= ' target="_blank" rel="noopener"';
                        }
                    }
                ?>
                    <<?php echo $tag; ?> class="pw-board__member<?php echo esc_attr( $highlighted_class ); ?>"<?php echo $link_attrs; ?>>
                        <?php if ( ! empty( $member['photo'] ) ) : ?>
                            <div class="pw-board__photo">
                                <img src="<?php echo esc_url( $member['photo']['sizes']['pw-team'] ?? $member['photo']['url'] ); ?>"
                                     alt="<?php echo esc_attr( $member['photo']['alt'] ?: $member['name'] ); ?>">
                            </div>
                        <?php endif; ?>

                        <?php if ( ! empty( $member['organization'] ) ) : ?>
                            <h3 class="pw-board__org"><?php echo esc_html( $member['organization'] ); ?></h3>
                        <?php endif; ?>

                        <?php if ( ! empty( $member['name'] ) ) : ?>
                            <p class="pw-board__name"><?php echo esc_html( $member['name'] ); ?></p>
                        <?php endif; ?>

                        <?php if ( ! empty( $member['position'] ) ) : ?>
                            <p class="pw-board__position"><?php echo esc_html( $member['position'] ); ?></p>
                        <?php endif; ?>
                    </<?php echo $tag; ?>>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
