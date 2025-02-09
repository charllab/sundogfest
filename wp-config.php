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
 * @link    https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// Project root path
$root = dirname(__DIR__);

// Composer autoloader
require_once $root.'/../vendor/autoload.php';

// dotenv
$dotenv = new Dotenv\Dotenv($root.'/../');
$dotenv->load();

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', getenv('DB_DATABASE'));

/** MySQL database username */
define('DB_USER', getenv('DB_USER'));

/** MySQL database password */
define('DB_PASSWORD', getenv('DB_PASSWORD'));

/** MySQL hostname */
define('DB_HOST', getenv('DB_SERVER'));

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_HOME', getenv('SITE_URL'));
define('WP_SITEURL', getenv('SITE_URL').'/wordpress');

define('DISALLOW_FILE_EDIT', true);

define('WP_AUTO_UPDATE_CORE', true);

define('DISABLE_WP_CRON', true);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         's?_v>)xocxYX{A- @r+ i<-hg;7WyFX|x8R?-uw2`|Vc_WtVOKBf +z%0|{?Lp8X');
define('SECURE_AUTH_KEY',  'MGUU/b@6G`u_W6E.>m-Sug_-Vt%(3<wKas7MEw*xW_? 6:RbR>a*pe;d>O>-u*[:');
define('LOGGED_IN_KEY',    'zM4&%I)NfaVConx)xX!{DS k3)f{zGy`m|x+D:Pxu)IgLgy8{4a1M[tVMOo-$,c!');
define('NONCE_KEY',        '$5_BP/ZGhl~8bMJ83)t7^Zc[})Ve#$^NkslF?VGC.6=|i G.1PM*{V$)J#]m(,v<');
define('AUTH_SALT',        'N(DF?k2m$32v(EQ2K@&A%5Pb#N(#MD9%m@|LN-Vd?a*:stlc`,E?5[.E!U{,,t,+');
define('SECURE_AUTH_SALT', 'ICZ6mf<y^Z=x?tZhx/%`*81X2#]q+F/-K@~AaPw_wH]0VBab|L`X]--|G:[=8!zS');
define('LOGGED_IN_SALT',   'Hga]3Eh4l5CVfHl-|gU)uT0wAB]*D>H]vu&ES_`lt/O#xyBwo]KY.E!zWSl|({e-');
define('NONCE_SALT',       'g*WF{DW}+r`7P%At#~q~nR(`J u+Z6{1#;25B;Pd12<BJ{~,LPNfaD/}kz}eb0;D');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = getenv('DB_TABLE_PREFIX');

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
define('WP_DEBUG', filter_var(getenv('DEV_MODE'), FILTER_VALIDATE_BOOLEAN));

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__).'/');
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH.'wp-settings.php');
