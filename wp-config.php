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
define('DB_NAME', 'blerina');

/** MySQL database username */
define('DB_USER', 'blerina');

/** MySQL database password */
define('DB_PASSWORD', 'tech4policy');

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
define('AUTH_KEY',         'X7D.p@9O%JPUf+Zapz`{u:E0=/hsgi%E+px9C7(WWM{7<MdVUY)6Va9B&Ii`s#_h');
define('SECURE_AUTH_KEY',  '%!stFK=lvrsL:r@5Y&Ew /,H8tRyFwdM98Vc-fB:WR}Mif3w+Kz|^%xl^YGyrYbs');
define('LOGGED_IN_KEY',    'L}DTXbHswPM}g--Snlb?K0!Sw/!& k)dJsJ,t}Uo2%(%L4,3Ncgd|y{&{&1$shcF');
define('NONCE_KEY',        'frX|@uA/ n-mE]L vt$(W:QseRcA>#`4m#]oqgz+iX4:FyupsEFr*5a|5+FzUD#%');
define('AUTH_SALT',        'k{ Wal2HD?%g1>Z^?+KxdwJKf&#9*oYxxdfA$o3T>hGi#x!=SlW:Z}2N6hd^Eo|>');
define('SECURE_AUTH_SALT', 'J:J/Z6?kpYl)EbiBU/Q65>yD):>7?Rw`~d#,QR,SG~Gagv*t/Tt7*Q0~}>)_F1B0');
define('LOGGED_IN_SALT',   '09hh?m*8x$V8{#B4t_M0pgLsy>cKJ.gLct>$[M *p,opp^3v.T?Kr ,I]v=/P{l6');
define('NONCE_SALT',       '){{pzKA=9qR8hTTWEKtY+tE|?aLJ>_xwDVp3X]`3%v7os,w31`0]n<M@Mh}5_Q5;');

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
