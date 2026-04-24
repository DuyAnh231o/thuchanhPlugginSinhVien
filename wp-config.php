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
define( 'DB_NAME', 'duyanh_blog' );

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

define('WP_ALLOW_MULTISITE', true);

define('ALLOW_UNFILTERED_UPLOADS', true);
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
define( 'AUTH_KEY',         '!H5k+:fvV1s*d@|4,x%<}xhqkUW0uI&4hKhw)ydQ{Xld_HS?cbm6RML}AO16h`Gv' );
define( 'SECURE_AUTH_KEY',  '?%HbCd`cH,T]FFxC4|AfEf8^#Akdr6~tx#_:7TMK>eR];f..5W7[PGR5%B95r/4J' );
define( 'LOGGED_IN_KEY',    'v0*y!b<D>>L_G!R[l{cXRPvA{1lojo(Wz4+;*P*VwMlb`xi4//v,Iw{6,V;km):R' );
define( 'NONCE_KEY',        'C>2F0Y~G;iG<A|%Vp=F 0|/=oDrP#yr@ ;<934*`k#&Zral7pRgn`ta9,/rHYR}]' );
define( 'AUTH_SALT',        '0_vS-Jha.1`&D|:I$4Vn=UwFs4j9$lN{VrDr!p/4OgEHj(rSS9xK+x/1K$+UD#XL' );
define( 'SECURE_AUTH_SALT', '$,_CG_aJ#rOVXzx4a.S4VZzG7-Ka)(ydxD|,;r*Rg-)UU+8b9o,;YWd[/@]}7ARl' );
define( 'LOGGED_IN_SALT',   ':T5Lt* vcsv+1|q{_xW>5QYQj+n9>,tSbiQ[NJr[xw`C,i@EJQ4)H(<q.lpBS|^6' );
define( 'NONCE_SALT',       ')73mRT< neGHX,/iI?F5g3A&C0j/MdutY]i{2jYym/b7Vuw*?m-C1hvied8GMS_K' );

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

define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', false );
define( 'DOMAIN_CURRENT_SITE', 'localhost' );
define( 'PATH_CURRENT_SITE', '/duyanhblog/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}



/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
