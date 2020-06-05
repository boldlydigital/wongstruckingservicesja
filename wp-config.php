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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wongtruckingservicesja' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '(MFWA[u0ySo;2NIt@),-<Nv:xnu/(^5u5PX-Il]{]YiGwzBFf<Pc~?&s|<Y}6kZw' );
define( 'SECURE_AUTH_KEY',  '<N:byMe_W**#Py{=>B:,cGS)@Sf?+D=fa+Mtwmn&!.rB,@hNxcd.NlDm>H5l.bN@' );
define( 'LOGGED_IN_KEY',    ' i8p(0zGM$ibfQ zzG/Up85rB8aX(}tb3Y=S+OMPXo}|DMMR#TjMl2=@(}L(% LN' );
define( 'NONCE_KEY',        'd]9=h`Y*>,_?[[s,40Lr.rQ3c*)SzZ+41@G9QbxkPI}*/K<4|cwM l LEJvpy9s>' );
define( 'AUTH_SALT',        '62fF3Ty6Fm5wwAzL~SJK=Li&L,O~s!zN=|z>*#xgr}T(ylmG8H{yssp^L*7#5d2M' );
define( 'SECURE_AUTH_SALT', 'jA5m-Lnwy~@q/08 PYiO(c9^GSrEtK-/(Sy,Xr2^Bg!}_xrw:z[S Hoz:MG%GPKf' );
define( 'LOGGED_IN_SALT',   'Citepu<-JVA2HtAS5!9B@sX6?|/9XaD!E4dK+jwDZpT4*Ey~`w>y{AWh)sT0}%v8' );
define( 'NONCE_SALT',       '3jSdF)E^|ma8Q`B6dL+&E9ir&HL_sg+yS//imE~rKd<uv/v(Xp{=[hkqH|c|5xL{' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
