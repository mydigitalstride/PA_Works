<?php
/**
 * Theme Header
 *
 * @package PAWorks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
// Announcement Bar
$announcement_enabled = get_field( 'announcement_enabled', 'option' );
if ( $announcement_enabled ) :
    $announcement_text      = get_field( 'announcement_text', 'option' );
    $announcement_link_text = get_field( 'announcement_link_text', 'option' );
    $announcement_link_url  = get_field( 'announcement_link_url', 'option' );
?>
<div class="pw-announcement">
    <div class="pw-announcement__inner">
        <span><?php echo esc_html( $announcement_text ); ?></span>
        <?php if ( $announcement_link_text && $announcement_link_url ) : ?>
            <a href="<?php echo esc_url( $announcement_link_url ); ?>" class="pw-btn pw-btn--primary" style="padding: 8px 20px; font-size: 0.75rem;">
                <?php echo esc_html( $announcement_link_text ); ?>
            </a>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>

<?php
// Header
$header_logo       = get_field( 'header_logo', 'option' );
$nav_items         = get_field( 'header_nav_items', 'option' );
$signin_text       = get_field( 'header_signin_text', 'option' );
$signin_url        = get_field( 'header_signin_url', 'option' );
?>
<header class="pw-header" role="banner">
    <div class="pw-header__inner">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="pw-header__logo">
            <?php if ( $header_logo ) : ?>
                <img src="<?php echo esc_url( $header_logo['url'] ); ?>" alt="<?php echo esc_attr( $header_logo['alt'] ?: get_bloginfo( 'name' ) ); ?>">
            <?php else : ?>
                <span style="font-family: var(--pw-font-heading); font-size: 1.25rem; font-weight: 800; color: var(--pw-navy);">
                    <?php bloginfo( 'name' ); ?>
                </span>
            <?php endif; ?>
        </a>

        <button class="pw-header__toggle" aria-label="Toggle navigation" onclick="this.nextElementSibling.classList.toggle('is-open')">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <nav class="pw-header__nav" role="navigation">
            <?php if ( $nav_items ) : ?>
                <?php foreach ( $nav_items as $item ) : ?>
                    <a href="<?php echo esc_url( $item['url'] ); ?>"<?php echo $item['highlight'] ? ' class="active"' : ''; ?>>
                        <?php echo esc_html( $item['label'] ); ?>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if ( $signin_text && $signin_url ) : ?>
                <a href="<?php echo esc_url( $signin_url ); ?>" class="pw-header__signin">
                    <?php echo esc_html( $signin_text ); ?>
                </a>
            <?php endif; ?>
        </nav>
    </div>
</header>

<main id="main-content" role="main">
