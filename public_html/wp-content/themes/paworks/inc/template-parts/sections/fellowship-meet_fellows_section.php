<?php
/**
 * Fellowship Page Section: Meet the Fellows
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$sub_header      = get_sub_field( 'sub_header' );
$header          = get_sub_field( 'header' );
$video_url       = get_sub_field( 'video_url' );
$video_thumbnail = get_sub_field( 'video_thumbnail' );
$body_content    = get_sub_field( 'body_content' );

// Convert YouTube URL to embed URL
$embed_url = '';
if ( $video_url ) {
    if ( preg_match( '/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $video_url, $matches ) ) {
        $embed_url = 'https://www.youtube.com/embed/' . $matches[1];
    } elseif ( preg_match( '/vimeo\.com\/(\d+)/', $video_url, $matches ) ) {
        $embed_url = 'https://player.vimeo.com/video/' . $matches[1];
    }
}
?>

<section class="pw-meet-fellows pw-section">
    <div class="pw-container">
        <?php if ( $sub_header ) : ?>
            <p class="pw-section-label"><?php echo esc_html( $sub_header ); ?></p>
        <?php endif; ?>

        <?php if ( $header ) : ?>
            <h2 class="pw-meet-fellows__title"><?php echo esc_html( $header ); ?></h2>
        <?php endif; ?>

        <?php if ( $embed_url ) : ?>
            <div class="pw-meet-fellows__video">
                <iframe
                    src="<?php echo esc_url( $embed_url ); ?>"
                    width="100%"
                    height="500"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                    loading="lazy"
                ></iframe>
            </div>
        <?php elseif ( $video_thumbnail ) : ?>
            <div class="pw-meet-fellows__video">
                <a href="<?php echo esc_url( $video_url ); ?>" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo esc_url( $video_thumbnail['url'] ); ?>"
                         alt="<?php echo esc_attr( $video_thumbnail['alt'] ); ?>">
                </a>
            </div>
        <?php endif; ?>

        <?php if ( $body_content ) : ?>
            <div class="pw-meet-fellows__body"><?php echo wp_kses_post( $body_content ); ?></div>
        <?php endif; ?>
    </div>
</section>
