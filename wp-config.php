<?php
define( 'WP_CACHE', true ); // By Speed Optimizer by SiteGround

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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'dbbpy361cisdqg' );

/** Database username */
define( 'DB_USER', 'ua6rowrv7helm' );

/** Database password */
define( 'DB_PASSWORD', 'cjrrjezrz08r' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'XD0kGz[.%`=z*<18[Uv3Oeswi~e=}L)uGtGkCU^EV,OBSQzbGEavnD14-,Y,La8/' );
define( 'SECURE_AUTH_KEY',   'Q.UnDAw~a,Vh({3mRi]Th2ZxXwa6z4:q+Fu20]s;dW7/!-vuq=pXdYH#^f9G8~{g' );
define( 'LOGGED_IN_KEY',     'WlFnoE^5dt**DLUpcXv(iCP|NZ,0bk6&Zx?jTAqXe=xLpR@~h:08M)-GrUb,Rk=m' );
define( 'NONCE_KEY',         'm3@_Qo]3/_Ko1acb;aX;()v-,~(k5[F{Y}YXNVS4LXyXMnj_o4v&=JqgA>mpL820' );
define( 'AUTH_SALT',         '*z&~b;+BJL]!)lQx2!z_u<~91h1#AxL+j:Op:<f..EPIgK7{_6mO?<fGvpjfsIN_' );
define( 'SECURE_AUTH_SALT',  'o`4Zn,Ph>W}Np$EPi~@XFOGm9|u1(V mu7x,D&%Kc`rRKl6}65SA,&/S[rX@Iu$!' );
define( 'LOGGED_IN_SALT',    'm&cLzE{x0:nym XOGWr?4M0#+^#I4&W|`dI^mn#Yc0-ajd)Q$N`3=T/>Anc/~n>~' );
define( 'NONCE_SALT',        'Gvu`.{:~RaEuVAT3*I8%umJooD$ti|m!b;KCy)v0zF JHrajfbD{Wl-X1?(P[AOZ' );
define( 'WP_CACHE_KEY_SALT', '7!A>uF3}RnwM|tGVA|[<ehyW_y49_ZXV)NSv<Psp^WH{c:0fI?,t1G}A-sUlMHY>' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'hkj_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
define( 'WP_ENVIRONMENT_TYPE', 'staging' ); // Added by SiteGround WordPress Staging system
@include_once('/var/lib/sec/wp-settings-pre.php'); // Added by SiteGround WordPress management system
require_once ABSPATH . 'wp-settings.php';
@include_once('/var/lib/sec/wp-settings.php'); // Added by SiteGround WordPress management system
