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
define('DB_NAME', 'youmeopc_cold-calling');

/** MySQL database username */
define('DB_USER', 'youmeopc_cold-c');

/** MySQL database password */
define('DB_PASSWORD', 'Ky!oag(&b@m8');

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
define('AUTH_KEY',         '>t!v1y0q9DSvp0_{^Dib|><ko[r;0Z:TA_37pLtkf_b.0h[<JTe#HU<Y1(i}(n?5');
define('SECURE_AUTH_KEY',  'a9QVif>k$S?*D,QEX_$+[tzZn(JfAk#Us:>(xw[2PH|tz }OI+m?@?PGkV0fZ66m');
define('LOGGED_IN_KEY',    'p1B*LUM.c([[oNfctw*n^8R2,2s{!/z@IN@`;!iGUJ+jwG>sUUlR@&ybbQQA*Pke');
define('NONCE_KEY',        'edbf<ta`aT$0WaO:xHKGI^_wvDPAGeGklzkLPYWaz}G>|SCfN~zH,P5g my7D``~');
define('AUTH_SALT',        'J+a$xzpg]Go! dpC$g8|cJ9{4S|[Fw2[W<EL1b [GTgTS+GL]LYYw Th N8$QP%u');
define('SECURE_AUTH_SALT', '7 Q!S~Uxfe ._oY,&jl*C+E=Ad|RJW29#2(m7Q>& G^^<rNq}PRifv?a15jE/$J{');
define('LOGGED_IN_SALT',   '@7J#oK@Kl^Zn(8yKhn02Vkl6M!XhvAg]T>9zUf.Xax`u2EDK&e.^wI.t#B.q2BK!');
define('NONCE_SALT',       'm(O?:ryIRJVV=H-eC|8++goblXrGx2] [}ZUA.eGb37pK#Kl$IVaJOSqRM97/?(2');

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
define( 'WP_MAX_MEMORY_LIMIT', '256M' );

define('FS_METHOD','direct');


ob_start();
error_reporting(0);
