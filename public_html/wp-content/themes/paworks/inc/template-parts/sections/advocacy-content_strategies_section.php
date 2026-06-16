<?php
/**
 * Advocacy Page Section: Content + Strategies
 *
 * Two-column layout: body content on left, numbered strategies list on right.
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$sub_header      = get_sub_field( 'sub_header' );
$header          = get_sub_field( 'header' );
$body_text       = get_sub_field( 'body_text' );
$accordion_items = get_sub_field( 'accordion_items' );
$btn_text        = get_sub_field( 'button_text' );
$btn_url         = get_sub_field( 'button_url' );
$section_bg      = get_sub_field( 'section_bg_image' );
$list_header     = get_sub_field( 'list_header' );
$list_bg_image   = get_sub_field( 'list_bg_image' );
$strategies      = get_sub_field( 'strategies' );

$section_style = '';
if ( ! empty( $section_bg['url'] ) ) {
    $section_style = ' style="position:relative;"';
}

$list_box_style = '';
if ( ! empty( $list_bg_image['url'] ) ) {
    $list_box_style = ' style="background-image: url(\'' . esc_url( $list_bg_image['url'] ) . '\');"';
}
?>

<section class="pw-strategies pw-section"<?php echo $section_style; ?>>

    <?php if ( ! empty( $section_bg['url'] ) ) : ?>
        <div class="pw-strategies__section-bg" style="background-image: url('<?php echo esc_url( $section_bg['url'] ); ?>');"></div>
    <?php endif; ?>

    <div class="pw-container" style="position:relative; z-index:1;">
        <?php if ( $sub_header ) : ?>
            <p class="pw-section-label"><?php echo esc_html( $sub_header ); ?></p>
        <?php endif; ?>

        <?php if ( $header ) : ?>
            <h2 class="pw-strategies__title"><?php echo esc_html( $header ); ?></h2>
        <?php endif; ?>

        <div class="pw-strategies__grid">
            <div class="pw-strategies__content">
                <?php if ( $body_text ) : ?>
                    <div class="pw-strategies__body"><?php echo wp_kses_post( $body_text ); ?></div>
                <?php endif; ?>

                <?php if ( ! empty( $accordion_items ) ) : ?>
                    <div class="pw-strategies__accordion">
                        <?php foreach ( $accordion_items as $index => $item ) : ?>
                            <div class="pw-strategies__accordion-item" data-accordion>
                                <button
                                    class="pw-strategies__accordion-trigger"
                                    aria-expanded="false"
                                    aria-controls="strat-acc-<?php echo esc_attr( $index ); ?>"
                                >
                                    <span><?php echo esc_html( $item['title'] ); ?></span>
                                    <span class="pw-strategies__accordion-icon" aria-hidden="true"></span>
                                </button>
                                <div
                                    class="pw-strategies__accordion-body"
                                    id="strat-acc-<?php echo esc_attr( $index ); ?>"
                                >
                                    <div class="pw-strategies__accordion-inner">
                                        <?php echo wp_kses_post( $item['content'] ); ?>
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

            <?php if ( $strategies ) : ?>
                <div class="pw-strategies__list-box<?php echo ! empty( $list_bg_image['url'] ) ? ' pw-strategies__list-box--has-bg' : ''; ?>"<?php echo $list_box_style; ?>>
                    <div class="pw-strategies__list-box-overlay"></div>
                    <div class="pw-strategies__list-box-inner">
                        <?php if ( $list_header ) : ?>
                            <h3 class="pw-strategies__list-header"><?php echo esc_html( $list_header ); ?></h3>
                        <?php endif; ?>

                        <ol class="pw-strategies__list">
                            <?php foreach ( $strategies as $index => $strategy ) : ?>
                                <li>
                                    <span class="pw-strategies__number"><?php echo esc_html( $index + 1 ); ?></span>
                                    <span class="pw-strategies__text"><?php echo esc_html( $strategy['text'] ); ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ol>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
