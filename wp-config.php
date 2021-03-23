<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cursowp' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Te4}}NZ>q8=[g_HY^uF$SqcU~m,.kznrq4(nvW-Y6PT!mP:caq~3Vb0T3=!Wras0' );
define( 'SECURE_AUTH_KEY',  'X/.[}**v).e~nFcHqLfg4Rfxq;hkm.wsFNR>RxZR!@[q<uNK~+DNcA>UP>V5$~LR' );
define( 'LOGGED_IN_KEY',    'd;h#J$KG7)!xwg=rb<8<pK<KiET?zEAP-g99hJU> TuGB-IZ3/P?*ZR*#dMO $8M' );
define( 'NONCE_KEY',        'S@ET19;HUqub|h6adMhoH(92S@OFf`nZqK$!($byeTY@{n]Ipt!)4N~VUF)q+71/' );
define( 'AUTH_SALT',        '=/sQ/${&>Oj.heF>b@qHN<RRZ}(L9*V[ pL,/rHn]IMtG/#a`U-6X+hy+Zwn3WG<' );
define( 'SECURE_AUTH_SALT', 'kXZp!(A.>w^+xp,Qw|eYrOLX<O4nlyDF[/uiNVwO0J$wH5D<Q)+,Q+T qvHR~3) ' );
define( 'LOGGED_IN_SALT',   '/d{1TIP#/zQl9d!%p4iI-@k*9MiYsb>SW-#re^>FZMfnF75qp)eJA2S8M;Ze$NH=' );
define( 'NONCE_SALT',       'iqVkB.6n?O-&W.:|p@.)uxm+]14./pyG+}W#[1>y-%PSg&RKXJPpOT(a~8$=lMJ0' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
