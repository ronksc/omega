<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
//define('DB_NAME', 'fpproducti_omega');
//
///** MySQL database username */
//define('DB_USER', 'fpproducti_root');
//
///** MySQL database password */
//define('DB_PASSWORD', 'P@ssw0rd');
//
///** MySQL hostname */
//define('DB_HOST', 'localhost');
//
///** Database Charset to use in creating database tables. */
//define('DB_CHARSET', 'utf8mb4');
//
///** The Database Collate type. Don't change this if in doubt. */
//define('DB_COLLATE', '');


switch ($_SERVER['SERVER_NAME']) {

	case "www.omegacompliance.com":
		define('DB_NAME', 'omega');
		define('WP_SITEURL',  'https://www.omegacompliance.com' );
    	define('WP_HOME', 'https://www.omegacompliance.com' );
		define('DB_USER', 'root');
		define('DB_PASSWORD', 'root');
		define('DB_HOST', 'localhost');

	case "local.omega.com":
		define('DB_NAME', 'omega');
		define('WP_SITEURL',  'http://local.omega.com' );
    	define('WP_HOME', 'http://local.omega.com' );
		define('DB_USER', 'root');
		define('DB_PASSWORD', 'root');
		define('DB_HOST', 'localhost');

	case "omega.fp-production.com":
		define('DB_NAME', 'fpproducti_omega');
		define('WP_SITEURL',  'http://omega.fp-production.com' );
    	define('WP_HOME', 'http://omega.fp-production.com' );
		define('DB_USER', 'fpproducti_root');
		define('DB_PASSWORD', 'P@ssw0rd');
		define('DB_HOST', 'localhost');

	case "omega-v2.nowwhat.hk":
	    define( 'DB_NAME',     'nowwhat_omega' );
	    define( 'WP_SITEURL',  'http://omega-v2.nowwhat.hk' );
	    define( 'WP_HOME', 'http://omega-v2.nowwhat.hk' );
	    define( 'DB_USER',     'nowwhat' );
	    define( 'DB_PASSWORD', '20273214' );
	    define( 'DB_HOST',     'localhost' );
}

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '_8VOak2^|,(M<U#fH$iw_A%B`^P3x9W-?-/^w{l4u+G$thmKRpmkfKONq~Ci}lTw');
define('SECURE_AUTH_KEY',  'ypkq`0S+rjFi#s0QEb&F2}qh@dY}.Jj6eR*.@Ls~`x!#F]Z=..pC^:C p0Gv$Mv9');
define('LOGGED_IN_KEY',    'uNB{[|=iU}Mir|z4YS#C~[JfZ|i-_G&Twf!^3Xe;k9AG{<0oBO}3!fxwV^_AADQ,');
define('NONCE_KEY',        '<5NN!@O))O6HXx>?6d%*%!0Zxq,psC0%;S9yqm1/qTBa{qocGkKX+Lq5f61i[/DC');
define('AUTH_SALT',        'g +1@KUn}+Fw#PU>Cwut+i4*&!$/9:K6@vy?2dpvlQzQ.4o6=]Am-StW`XFS?<*#');
define('SECURE_AUTH_SALT', 'Q>fMf,Qk3-%)q&|-8Pn(4uX}z dAv=c;|/#T6%#?3=qNYYV-;P?Vh+kO>k-fnFKm');
define('LOGGED_IN_SALT',   '-gK3]sEy*Z3jYupOocyd5XB15reBcCRs<veq_ eW94rrD1K9>[XpTQF8m0;}>3Zy');
define('NONCE_SALT',       'vI_(s|VpbFLvgs3--}}t^eg*UE,Pn]yimn4.T1 xyXuj%NyX$ArQa-<]^;V-o9@l');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

//define('WP_ENV', 'production');
define('WP_ENV', 'development');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
