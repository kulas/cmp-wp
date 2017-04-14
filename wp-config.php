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
define('DB_NAME', 'cmp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'Jjtb!8~b iza_)y7FhE$F8j^<(CU*h9fESGyh[B~2Z>Uq>PQxh=q5ad13q(yU?X2');
define('SECURE_AUTH_KEY',  'R|n&F+?YhpZTfpcU6$>NR6)~Yz~f2P|f(<tBo&U1kP+4Yv18LYD!M Dd!z{SmaYT');
define('LOGGED_IN_KEY',    'pylSnHJW8OP8N=BYDZS`Hj/y9MX3uNEfhHVzW/o}r=C;U.Cl!n}|XF?!W@ptg`R)');
define('NONCE_KEY',        'cb@ .Te`{%{n_jtbtlAN--R wY!< A_Yfg4#fwJ=3Gz=nNVN<FP0O(([kTX}cYK}');
define('AUTH_SALT',        'zlvnq?k^5(dnDu_!Y/VK,R3EXEm9+hOpxfk][zk|0gX?w,d+NI@#R>]E:p{_[4T[');
define('SECURE_AUTH_SALT', ';ePstaJTkTu$B.C1<TOY_,)EZ3>Gd{hKcKnGaGfk1g05v.NEpG>8KTgum2y|7`c6');
define('LOGGED_IN_SALT',   '~QnTrWen_<jA#uhDz#5fWCCdGjra_7$~;e=CAn[r)XF_e5nDOslw0[>bw0:wSFK%');
define('NONCE_SALT',       'wjr+!~61&S4lf:LxE2>|PKo8jrC?*2WX4[/vp5S$?sF)(LE!rSIa8S&l<4zkVJ6w');

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

@ini_set( 'upload_max_size' , '12M' );
@ini_set( 'post_max_size', '13M');
@ini_set( 'memory_limit', '15M' );
