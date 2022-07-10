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
define('DB_NAME', 'admin_tzyirdb');

/** MySQL database username */
define('DB_USER', 'admin_tazingh');

/** MySQL database password */
define('DB_PASSWORD', 'VE4GvJ8KXz39BFs4');

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
define('AUTH_KEY',         '8VB*2!F&{9y<NDUe|EH>R%hNyDQt7,Y-RmOg2{zdp+-Gt j#qMz8%g#>~qaSVX)5');
define('SECURE_AUTH_KEY',  'r$3`=SMdm2K^#0#f$Ad|HmF(5K)^Q#/m_Gq},B N,0~N?Z1l*}|}GnXiz{=HM,7 ');
define('LOGGED_IN_KEY',    '9DGPv}-Ka,Rv,->Uh({W8;$mj~-MOszW1c7{uBlv<jZ=c11pBX|~)kF/ws0KTSh<');
define('NONCE_KEY',        'J >TxWC8L>v|GCu]A7aqxgp+)cXZ2n~C.z]Fz@IL!oS)<DczT HY#6kKC}4r;mzb');
define('AUTH_SALT',        'NqK[b1@(0(w^x_,p{sApE5<1NO?=*(o#}yK:7A5<Gf$^Y^3yb$`k-M/TgzNP9K_Y');
define('SECURE_AUTH_SALT', 'aodVQ>]eFG+Z[inS:@~8[/8c>eH;3P*?Gn(Pi)tA)>s:BxR>:s?y~Mkrr 5wipTX');
define('LOGGED_IN_SALT',   'RdBXp>^0UVU^O.+56E#8(ugQw9bn5A4[EHM?lS]91,C6 k^}&cr1fGq+-YoRsZt.');
define('NONCE_SALT',       '^UcKAQ#X1p@U^&kUs?y1l0q1t$!`yz$=/5RpLK+k5um;1l`@|[!8AIsw_nb?zWHn');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'R_';

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
