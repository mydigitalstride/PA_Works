<?php
/**
 * Advocacy / Shared Page Section: Two Column Engage
 *
 * Two titled WYSIWYG columns side by side, each with its own optional
 * buttons, plus an optional centered button beneath both columns.
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$left_header     = get_sub_field( 'left_header' );
$left_content    = get_sub_field( 'left_content' );
$left_buttons    = get_sub_field( 'left_buttons' );
$right_header    = get_sub_field( 'right_header' );
$right_content   = get_sub_field( 'right_content' );
$right_buttons   = get_sub_field( 'right_buttons' );
$center_btn_text = get_sub_field( 'center_button_text' );
$center_btn_url  = get_sub_field( 'center_button_url' );
$section_bg      = get_sub_field( 'section_bg_image' );

$section_style = '';
if ( ! empty( $section_bg['url'] ) ) {
    $section_style = ' style="position:relative;"';
}
?>

<section class="pw-engage pw-section"<?php echo $section_style; ?>>

    <?php if ( ! empty( $section_bg['url'] ) ) : ?>
        <div class="pw-engage__section-bg" style="background-image: url('<?php echo esc_url( $section_bg['url'] ); ?>');"></div>
    <?php endif; ?>

    <div class="pw-container" style="position:relative; z-index:1;">
        <div class="pw-engage__grid">
            <div class="pw-engage__col">
                <?php if ( $left_header ) : ?>
                    <h2 class="pw-engage__title"><?php echo esc_html( $left_header ); ?></h2>
                <?php endif; ?>

                <?php if ( $left_content ) : ?>
                    <div class="pw-engage__content"><?php echo wp_kses_post( $left_content ); ?></div>
                <?php endif; ?>

                <?php if ( ! empty( $left_buttons ) ) : ?>
                    <div class="pw-engage__buttons">
                        <?php foreach ( $left_buttons as $button ) : ?>
                            <?php if ( ! empty( $button['button_text'] ) && ! empty( $button['button_url'] ) ) : ?>
                                <a href="<?php echo esc_url( $button['button_url'] ); ?>" class="pw-btn <?php echo esc_attr( $button['button_style'] ?: 'pw-btn--primary' ); ?>">
                                    <?php echo esc_html( $button['button_text'] ); ?>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="pw-engage__col">
                <?php if ( $right_header ) : ?>
                    <h2 class="pw-engage__title"><?php echo esc_html( $right_header ); ?></h2>
                <?php endif; ?>

                <?php if ( $right_content ) : ?>
                    <div class="pw-engage__content"><?php echo wp_kses_post( $right_content ); ?></div>
                <?php endif; ?>

                <?php if ( ! empty( $right_buttons ) ) : ?>
                    <div class="pw-engage__buttons">
                        <?php foreach ( $right_buttons as $button ) : ?>
                            <?php if ( ! empty( $button['button_text'] ) && ! empty( $button['button_url'] ) ) : ?>
                                <a href="<?php echo esc_url( $button['button_url'] ); ?>" class="pw-btn <?php echo esc_attr( $button['button_style'] ?: 'pw-btn--primary' ); ?>">
                                    <?php echo esc_html( $button['button_text'] ); ?>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php if ( $center_btn_text && $center_btn_url ) : ?>
            <div class="pw-engage__center-btn">
                <a href="<?php echo esc_url( $center_btn_url ); ?>" class="pw-btn pw-btn--primary">
                    <?php echo esc_html( $center_btn_text ); ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>
