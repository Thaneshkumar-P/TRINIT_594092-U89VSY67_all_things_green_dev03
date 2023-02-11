<?php
define( 'WP_CACHE', true );
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
define( 'DB_NAME', 'u960396052_kE6Ij' );

/** Database username */
define( 'DB_USER', 'u960396052_pFiHV' );

/** Database password */
define( 'DB_PASSWORD', 'pZ3GYSyWRf' );

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
define( 'AUTH_KEY',          'E|6Z~e fsgo@HqYrLo|S,q-_}?$)A-Z9<z}Z7 z/=88~B9Wgyp->Q.hN&H0I-V!n' );
define( 'SECURE_AUTH_KEY',   'pkjqs0EXS_ Udrv%;O6r._)UU=+y~y$4xT2Fnw}ToSAk|EL}`(IXlbDL),GXPv,3' );
define( 'LOGGED_IN_KEY',     '{tS;%6vCv~2w1NO,_[7.YZ5<`NFnjgRnx%&iB|FsO-g;0iP3BmW-KCU%-bmfy(%P' );
define( 'NONCE_KEY',         'plSvT.Zb2(nI@BE_W+-3JH;._)_TtCjNNwlgq>K_5xvN~]fp}`d6~ZX^> `]h}3F' );
define( 'AUTH_SALT',         'a-o!CoV5FtZwv-zd>K|H6v`x~s !2zN%keJ<lu@=O)#Bi&F!X_bkic, PEj/6.aP' );
define( 'SECURE_AUTH_SALT',  ' T~?WNQANanIO,t}>(F[>C5CfX{[wh1o,O=#Gm?*,l3$3Zx)r$9-GHQGM:$I*7uH' );
define( 'LOGGED_IN_SALT',    '|`0rsL&*b@5&qouj4[|EE</jd~5>%PQ@q}|c:.=Wc9UO^Yec&6tl$JF %0F%M$_5' );
define( 'NONCE_SALT',        '?h9YT!{=<(lZL5,e^=Ah3YS<}crk@swo|PN5)d?=D=o3@S;f~X4l8sB$TjF&X`[Y' );
define( 'WP_CACHE_KEY_SALT', ':4t^SJqHmLy9Cmc9#,#W*Inn$P (0X+!eAu_WRWm7$$wNaEH4#=Sd6<t,Dyo]K%k' );


/**#@-*/

/**
 * WordPress database table prefix.
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


/* Add any custom values between this line and the "stop editing" line. */



define( 'FS_METHOD', 'direct' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
