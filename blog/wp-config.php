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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'kd_blog');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'N>I%yw7b^|kiC20 &MqmVC;*B_2+2gV&8Cx|QSY_MMs H4cpT#*5bdBjYJ!Oup0[');
define('SECURE_AUTH_KEY',  'Q1-A4R_F?V}`SNJg63g9,G-w[Y,29eC ;?n>J`hD_2Q+0reajY|e>o<i4}/LXTo4');
define('LOGGED_IN_KEY',    '1wUpiB6FGx&eH[DAY:el^)EBvaz|=M<H$y/ _|lTx`6^3641XY>>T?eqJ8cK;N#}');
define('NONCE_KEY',        'Df*2BTS)!)7!0^4re2.yAny.^c4 (IdP4en2>q<NWnuT7YEGc=!~o$,^C#Ujz&(8');
define('AUTH_SALT',        'k`_Y-FntHM>FBC{$NoZpMG_I;3S6$iZzyjshbP*y<$SSvwnN<$c;7:#w)?b2+(ZF');
define('SECURE_AUTH_SALT', '(PdmYLSm_)@! (e.7vm^G,q#RTcz:G$+|GA|2&}dTLY{W>k7k>noX[M..rO@MJxE');
define('LOGGED_IN_SALT',   'ga6|$g5/oYx=el_Ul%z[ jS>@IHKQ}w7+euXjS2J]`B+{}S< dLHhyKVt<@{#5Q?');
define('NONCE_SALT',       'JE eOf4`2cLS:!,OU8+u%J tF/P,D)#J9.v2V,XGKDG<_,*]:AYgB5l_`PfOtw#w');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'kd_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
