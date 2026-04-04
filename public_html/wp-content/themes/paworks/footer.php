<?php
/**
 * Theme Footer
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$footer_logo        = get_field( 'footer_logo', 'option' );
$footer_email       = get_field( 'footer_email', 'option' );
$footer_address     = get_field( 'footer_address', 'option' );
$footer_instagram   = get_field( 'footer_instagram', 'option' );
$footer_linkedin    = get_field( 'footer_linkedin', 'option' );
$footer_youtube     = get_field( 'footer_youtube', 'option' );
$footer_copyright   = get_field( 'footer_copyright', 'option' );
$footer_privacy_url = get_field( 'footer_privacy_url', 'option' );
$footer_privacy_text = get_field( 'footer_privacy_text', 'option' );
$footer_show_search = get_field( 'footer_show_search', 'option' );

// Replace [year] placeholder in copyright text
$copyright_text = str_replace( '[year]', date( 'Y' ), $footer_copyright ?: 'All rights reserved. Copyright ' . date( 'Y' ) );
?>

</main><!-- #main-content -->

<footer class="pw-footer" role="contentinfo">
    <div class="pw-footer__inner">
        <div class="pw-footer__left">
            <?php if ( $footer_logo ) : ?>
                <div class="pw-footer__logo">
                    <img src="<?php echo esc_url( $footer_logo['url'] ); ?>" alt="<?php echo esc_attr( $footer_logo['alt'] ?: get_bloginfo( 'name' ) ); ?>">
                </div>
            <?php endif; ?>

            <div class="pw-footer__contact">
                <?php if ( $footer_email ) : ?>
                    <a href="mailto:<?php echo esc_attr( $footer_email ); ?>">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display:inline-block; vertical-align:middle; margin-right:6px;">
                            <rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                        </svg>
                        <?php echo esc_html( $footer_email ); ?>
                    </a>
                <?php endif; ?>

                <?php if ( $footer_address ) : ?>
                    <div>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display:inline-block; vertical-align:middle; margin-right:6px;">
                            <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/>
                        </svg>
                        <?php echo wp_kses_post( $footer_address ); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="pw-footer__right">
            <?php if ( $footer_instagram || $footer_linkedin || $footer_youtube ) : ?>
                <div class="pw-footer__social">
                    <?php if ( $footer_instagram ) : ?>
                        <a href="<?php echo esc_url( $footer_instagram ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="5"/><circle cx="17.5" cy="6.5" r="1.5" fill="currentColor" stroke="none"/></svg>
                        </a>
                    <?php endif; ?>

                    <?php if ( $footer_linkedin ) : ?>
                        <a href="<?php echo esc_url( $footer_linkedin ); ?>" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                    <?php endif; ?>

                    <?php if ( $footer_youtube ) : ?>
                        <a href="<?php echo esc_url( $footer_youtube ); ?>" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if ( $footer_show_search ) : ?>
                <form class="pw-footer__search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <input type="search" name="s" placeholder="Search ..." value="<?php echo get_search_query(); ?>">
                    <button type="submit" aria-label="Search">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                    </button>
                </form>
            <?php endif; ?>
        </div>
    </div>

    <div class="pw-footer__bottom">
        <span><?php echo esc_html( $copyright_text ); ?></span>
        <?php if ( $footer_privacy_url ) : ?>
            <a href="<?php echo esc_url( $footer_privacy_url ); ?>">
                <?php echo esc_html( $footer_privacy_text ?: 'Privacy Policy' ); ?>
            </a>
        <?php endif; ?>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
