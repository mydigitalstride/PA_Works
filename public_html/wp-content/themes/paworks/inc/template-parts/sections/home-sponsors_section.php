<?php
/**
 * Section: Sponsors Carousel
 *
 * Auto-rotating logo carousel. Each card flips on hover to reveal the
 * company name and links out to the sponsor's URL in a new tab.
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$sub_header = get_sub_field( 'sub_header' );
$header     = get_sub_field( 'header' );
$body_text  = get_sub_field( 'body_text' );
$sponsors   = get_sub_field( 'sponsors' );
?>

<section class="pw-sponsors pw-section">
    <div class="pw-container">
        <?php if ( $sub_header ) : ?>
            <p class="pw-section-label"><?php echo esc_html( $sub_header ); ?></p>
        <?php endif; ?>

        <?php if ( $header ) : ?>
            <h2 class="pw-sponsors__title"><?php echo esc_html( $header ); ?></h2>
        <?php endif; ?>

        <?php if ( $body_text ) : ?>
            <p class="pw-sponsors__body"><?php echo esc_html( $body_text ); ?></p>
        <?php endif; ?>

        <?php if ( $sponsors ) : ?>
            <div class="pw-sponsors__carousel">
                <div class="pw-sponsors__track">
                    <?php
                    // Render the set twice so the marquee loop is seamless.
                    for ( $pass = 0; $pass < 2; $pass++ ) :
                        foreach ( $sponsors as $sponsor ) :
                            $logo    = $sponsor['logo'];
                            $company = $sponsor['company'];
                            $url     = $sponsor['url'];
                            $tag     = $url ? 'a' : 'div';
                            ?>
                            <<?php echo $tag; ?>
                                class="pw-sponsors__card"
                                <?php if ( $url ) : ?>
                                    href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer"
                                <?php endif; ?>
                                aria-hidden="<?php echo esc_attr( $pass === 1 ? 'true' : 'false' ); ?>"
                                <?php if ( $pass === 1 ) : ?>tabindex="-1"<?php endif; ?>
                            >
                                <div class="pw-sponsors__card-inner">
                                    <div class="pw-sponsors__card-front">
                                        <?php if ( ! empty( $logo ) ) : ?>
                                            <img src="<?php echo esc_url( $logo['url'] ); ?>"
                                                 alt="<?php echo esc_attr( $logo['alt'] ?: $company ); ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="pw-sponsors__card-back">
                                        <span><?php echo esc_html( $company ); ?></span>
                                    </div>
                                </div>
                            </<?php echo $tag; ?>>
                        <?php endforeach;
                    endfor;
                    ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
