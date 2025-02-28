<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'db_popup_plugin' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'gH?G{p_UIMf>3R8+9: AMZDV-W3sI]1g?wKGncsu7eth[G9_hfv6_$:be!`1sFrF' );
define( 'SECURE_AUTH_KEY',  'N @AmY7((Bc-r*w:>9R/-9aUA]c:EbKQb66BpVGNSUIe}UnxmIx5H+DgAlt)D{1S' );
define( 'LOGGED_IN_KEY',    'Le@pe;?vnR*b&5|FJ %@KSy;1{cYxXM^q Dl/Qa Gdb#@yAO&Y,&YnH66-:txfl~' );
define( 'NONCE_KEY',        'pmRgLH|eeyT3Wf!6p%eLAh`3H1JFy,{g>CW #+g&MjZjAjq?Ua=5m,u7wAp49[I0' );
define( 'AUTH_SALT',        'zkxl:F?oO(ybISE[fxvvYZjH33d7UvM^.lMVN&`SVm(fw^zwI(%a4F(zwyB*WB70' );
define( 'SECURE_AUTH_SALT', 'Z!~[6E,~{5R^1S4O; /o>OQ-`,To0d2v+*D_r8Q<*;*aEUJ,.nv^(`kZw0_DJ4.U' );
define( 'LOGGED_IN_SALT',   'wKTF6htNbqdZTn(j%5V2WV4(9<bESI|1d70GgvLp0P-q?,.-`H@!Z80Dt_Qo<_R;' );
define( 'NONCE_SALT',       'RZPEsxI-ZY] 6/fR!$(F3W1 ,#r]|kS1|bWZovSW9H[<:U 6GQ a@1Iy$AX-%c5,' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

