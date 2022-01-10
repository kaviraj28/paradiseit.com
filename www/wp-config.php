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
define('DB_NAME', 'parait_staging_db');

/** MySQL database username */
define('DB_USER', 'parait');

/** MySQL database password */
define('DB_PASSWORD', 'Ciwp418!');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define('AUTH_KEY',         'mK4vkjugEn$!>cczc] #%F.b:WbwT@J=u]3.?(V0Vg{tI!6@&w6@LfDs@OPy[1(<');
define('SECURE_AUTH_KEY',  'h5r+nOqiG$,}||h7:a^Wch:ld!6%)W}5`s=BbpZZSss+S/)_)WgTn6<m5a+<Blf{');
define('LOGGED_IN_KEY',    '8;H)%C8!]Jk|?F;>,&-$gA:??S+yq)=T7f3w-A-/Os3%,NFV06q=Wd}FM;`T)Wm!');
define('NONCE_KEY',        'JWiCQcHI^>RY|j`lpgl} NP@CJGIF#+w{)F2P@|-d-JJ&#p=]@<^G-%X8&qQN7Vv');
define('AUTH_SALT',        '.>ytKcJJ.D,/;kdLa4D#b;r5&A!Ttr48ZM`4iAHKX3&N/UM%hp8x3rND;m+~v7h.');
define('SECURE_AUTH_SALT', '-1{=Vns1kR!8IxF5#zqA[YD`bLj+7zv0}QochEBO{zA:z`@#==3f?~W+QOn09+_s');
define('LOGGED_IN_SALT',   'a879jw}ndUGvC 7/f*t3@xsBz>R(vWej54D[AS:oASd-bd#4@1}xgarAMPnX{@vj');
define('NONCE_SALT',       '1Lw*LOo8Z57;w$V<8ZcoX445u KOG.O;PTp0leF[7IgeV`9qrw3>Fi$*LuL?rFWL');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'pit_';

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
define('WP_DEBUG', false);
define('UPLOADS', 'media');

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
