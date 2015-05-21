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
define('DB_NAME', 'Yixiuge1');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'VWn+LTW1okZ$SwR-x9`{kA_3KK1o&2xR8|_YLJ7}!_Q1B<hDdQV)||o&-j-84~wi');
define('SECURE_AUTH_KEY',  '74pD8P`+hGK]t3|aFA{*+=6)C;yPm]n_0%?T1mE1eM[HjLxE~=D)Qv//R=q)Z*K1');
define('LOGGED_IN_KEY',    'ZY 5]X)O.5f&qk|qTf}6JeB-D}O6Ex%rqeVs(O %BAMD^~~B-nO#ISt,f+PmiS#T');
define('NONCE_KEY',        'ME-Bus+%|y=0Qqh3`cQF|`iU3q8+pi78rB)eF9OH T(]vJ/ohnQGyPIB9mvda$X}');
define('AUTH_SALT',        'vS)JV,[(m!d[m-V|_yVP_KAf-LpWN<Ek0_>z^}Cc]Jkr@C3_O$>&X]q91`Q4Kr6U');
define('SECURE_AUTH_SALT', '+Psac(#g]Qt$I!:tDvw(=Zhnqb:b`YCX}t66!IZ|U/n@ytj|7X$E`)E,T|[TzaKF');
define('LOGGED_IN_SALT',   'VZf|@?a9[VDpZmU9;_DND<Lcak.|NBnKOYKmyL0F|4dXA|Z*w[ quaH/9&A:%h><');
define('NONCE_SALT',       '1+s%->Gp(|%zsp%e ?Lu4B[t;Ss3 XL2(y!LaK8AVEfq.uV`7X*<G8F]p!RF)=Sz');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'yxg';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
