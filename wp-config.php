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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress-test-app' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         ';BPG>!ntnP7ocrL}zMV%A-Kz30z?t@eHzqN8&Kyn>u/[Hn)qF:e>uLOk.p4p +m6' );
define( 'SECURE_AUTH_KEY',  'xXLk1dPJ;*E*%09P#P3sp;X#n/}U,$[XJUhB~d>34kV>vt4MfM/ppTwaU4/S7N~0' );
define( 'LOGGED_IN_KEY',    'c@(I,?,>Cy}I}H037gX)qqcc4aUi>r>e[vY]ez],0s1&+_KxT-vI4^NDSqbdg>} ' );
define( 'NONCE_KEY',        'fE(j:t$lYv-lt<yQFl0aR?WDR0r4xj!g>AF5NbzT@gM*K!Zdb)KV19}yH+YI>oyc' );
define( 'AUTH_SALT',        '&^ctyf[6z(Y;nvAE=9qg#b(FQlBgnqS#u>RV&<R]st<> 3!j DW]8H{tzp~U^Jvj' );
define( 'SECURE_AUTH_SALT', 'QtFP+H|C<t#U`)<L ]D5=wbB_*n.;{;<iHM&-j8P_[nJaf:y$AHZi%k!oFI><~S ' );
define( 'LOGGED_IN_SALT',   'W;t=XfZZ-STzm~wq1=$o-S(l7A+l1RRH<N]}&.Q9nW|FYRDc:@oPC2->11d<`tBG' );
define( 'NONCE_SALT',       '?8df:9]Oe/|/d7!zRPt4:{n;IrG<yjcIfe2o9uLuT$H_L[uF:rNDNryeH(9h]i,o' );

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
