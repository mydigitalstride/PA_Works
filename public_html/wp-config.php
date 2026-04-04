<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'dbdvkiwtvrjyye' );

/** Database username */
define( 'DB_USER', 'u5b7xs6mgjhii' );

/** Database password */
define( 'DB_PASSWORD', '7jvym7a6yria' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          ':&LP~Tv|^K$h_k!zPQVr%b#QDJ3r,OaDTFRt-:aJ|)A(4xCRiQ*l,b|!`F%UYjf!' );
define( 'SECURE_AUTH_KEY',   '}M&cLHWd!Lj^iZ0Y9tPp*Be=A2Q,tOe29_+8-K []hqS H0`~T+aq ps,HLdI-xT' );
define( 'LOGGED_IN_KEY',     '{rljy_%u(Amaz5t?{X?Co1f W5I;<_(puLmy,xMWRb[Ug7nWt+b6Gq`S51H9vQNW' );
define( 'NONCE_KEY',         'ZbEf=v&_*/Q++M*hf6gv}9Nz@s _?^!h_lAlD_l|WdX=o0d q`t-pK+~_chxR8r>' );
define( 'AUTH_SALT',         '%r,:]0lZM%)-|8a8>P*Tf1v(..r7D2VKiXI%fy?{I(`Qdz<(t{3(t;ZbBuvsA<n(' );
define( 'SECURE_AUTH_SALT',  'OAGS7g@ZY ,GspXj4/AU^kQ&=*[l/m{Y4^]i7@rqu~+nh9MaSERd2;6XLL=;9f@`' );
define( 'LOGGED_IN_SALT',    'VQvMso=)<HQU#j&tni2?_GzIYY,wU6X}F37,OdMo?~D=i~Z.Qdf*`P7</*ux3SIY' );
define( 'NONCE_SALT',        '>v4q9#hLOcc2??G0U:ro}T|%nkwqc$?HC~ E:k,OXd;6mEr]AUPJtTy2m:u(p +2' );
define( 'WP_CACHE_KEY_SALT', '}5)nF3Sf2d!wV4ht%(Fe^A[@__lmy+K|Ms#d4lHn_~EX.ewrwzoP0.iGw&<;&`=b' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'doo_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
@include_once('/var/lib/sec/wp-settings-pre.php'); // Added by SiteGround WordPress management system
require_once ABSPATH . 'wp-settings.php';
@include_once('/var/lib/sec/wp-settings.php'); // Added by SiteGround WordPress management system
