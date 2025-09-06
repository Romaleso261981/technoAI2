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
define( 'DB_NAME', 'technoai' );

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
define( 'AUTH_KEY',         'w^,wx-oM7)uqI/QUWkHtnTh`w3yC0zbdnFdTnc= F==+=$bSv~?mZ!hdzRWDt=,k' );
define( 'SECURE_AUTH_KEY',  'eQC]>@b+rb:-}nrJ4i>uS9XIS;z%1[pcJxx3N63$5Mc}CCk_ A:4R8>t!$(nZ!KC' );
define( 'LOGGED_IN_KEY',    'S~7B6~YLs_>EkTU^5jJ[M`^o=c-a>0ZY`)E+Xtxa{=*&fGq<thV;l43/!NfIIO#f' );
define( 'NONCE_KEY',        ')`<qCkhmW#1[>Zwb-B0ud3uV}_swurX|*JtrY<eUthdcfn0mC{P:S2KehMR[[w1H' );
define( 'AUTH_SALT',        'Ee3JW^LK17wAZ2P(Z_Xn][f7]}9QEmpC)L.,JSOf.n?tnWHO6>Ko5,dCR(t5D3t<' );
define( 'SECURE_AUTH_SALT', '#;#{W_N$a,=._/jJp1-Ak4(?=T*^<@&Eu`na`Jwv^-RF7A_P3W^VjsO[$Aw~gXgx' );
define( 'LOGGED_IN_SALT',   '0Sz^:yh`_r%,z}@Cj MG2!m?Eq3h&!([#rwk5rkdQM{BG#y46:H,6p=V+SyKXSFq' );
define( 'NONCE_SALT',       'GucDk){`rV=h;X+|*?Bj:[E152.c#=MS0E+TyEZvq(K`/N)P&di%Dy6/W{<-hOzP' );

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
