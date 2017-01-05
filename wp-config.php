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
//db parameters
require_once('environment.php');

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
define('AUTH_KEY',         ':B(`vE0-:`b|jk94.,b.^$+gb5Ds1DUvL4}!x+cQR);9@p4sNV4S2b3QdSQv~rNI');
define('SECURE_AUTH_KEY',  '|}9Z7 %>v3Q[~Du!P]>3_{gH/)bcI9`$=BpW[|Mbj[w]3Y*y{KXEjfqNb)0 yy(&');
define('LOGGED_IN_KEY',    'Ve1+ltC~O(`9#.n**WeCJs=E@vRW.hlY%$df|?MdL7OLe;>$1{WgDk]2V,mv=[RL');
define('NONCE_KEY',        '+h1~D6i#Gv<e/}trv%IYv*miWz}dUfZy4C2?[QN!Z|V#U-x1~!iy Lh!$h]$S/JR');
define('AUTH_SALT',        '=jqB_`]W[-EC,I`Km8Xz8;Mg:.,_nZ4j<Ye]n0G1Z3>z8bWQ2}C82e@aiV3Yk:)x');
define('SECURE_AUTH_SALT', 'T|-4QK-Ae!%@>-*U)h0[ WBiD4@qM#,,9?1LoK~Rkb,3m7G=m73Khv@lff#W l$q');
define('LOGGED_IN_SALT',   'jCB[A1>NC%pQP1_i=JXqg>:xio,f0t:)VWQr:j*?jB ^?3<ZEjob+)sxWtk6 GBj');
define('NONCE_SALT',       'R6JRQ+|6GFP4lq)]NfFK(v8|{cpc]CQ>L5*N58y{b`PN^//qnznr6}i>OP[Rf9c6');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
