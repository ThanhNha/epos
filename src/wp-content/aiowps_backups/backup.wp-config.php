<?php
define( 'WP_CACHE', true ); // Added by WP Rocket

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
define( 'DB_NAME', 'eposcomsg' ); //epos

/** Database username */
define( 'DB_USER', 'epos' );

/** Database password */
define( 'DB_PASSWORD', 'yk0vwfnwu7e1sq2xd0zgxrjs92jnas8c4oxkt0' );

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
define( 'AUTH_KEY',         'q{S]<u^8!0Dof6MU=`?I$w(a^Pu~O(2=Kp$q9l=*p`Q5& 56s-n5m*ftaae01=3m' );
define( 'SECURE_AUTH_KEY',  'm <LNoQ*klbwWjZ 1E}j-di#EF),st0VhxTI!Ikn-&$uCvf8,p[DXjRN7+#ma5[i' );
define( 'LOGGED_IN_KEY',    '1,a5HCYJ=CAQTUi;zymDo6]iq%H@)[s<V#Woqo_uCxXira8uO$1a@+euAT4H<c V' );
define( 'NONCE_KEY',        '.m9047EVe+lC7LdiW}F&GtEC~tS}MgA3TAQ*Bp+uE 0Ob<L#(_]axQ$[qu(p4K B' );
define( 'AUTH_SALT',        'K{RQ,V*Xz%K^ACoLx)&|)$bnJIR5JqPJjj#d52LnXVCm@L4lcd.;]d|X}~JiHXdy' );
define( 'SECURE_AUTH_SALT', '$biNZ?OZ<!3r!AVsW_F[(P&:92]OHSG,sitoCZ%fXzngZ@l@m,g;Mu;XwH#WKpbH' );
define( 'LOGGED_IN_SALT',   'e}XCe+9w,(Yv[ b[^R193))`.H2(>Ail4e5>ivBtc2(m0<]B!dFmuSJtiiz2&Bw}' );
define( 'NONCE_SALT',       'FjZ]F22_&Kptmkly,ux$18%vb3*VVCU@|!3*cH4A%.yhBYn6>%TyTMmJ]A+a+mOO' );

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
define( 'FS_METHOD', 'direct' );
/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
