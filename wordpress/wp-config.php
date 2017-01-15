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
define('DB_NAME', 'podhalanskiOvcar');

/** MySQL database username */
define('DB_USER', 'zkrsvc');

/** MySQL database password */
define('DB_PASSWORD', 'zkrsvc2407');

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
define('AUTH_KEY',         'y:O[$u,WYGh&Uu6{r^bMpZ^r/5%ASJbR,F. lU@]Xn=dij=,.`OM?_Rs=g<gVOPH');
define('SECURE_AUTH_KEY',  'FHh(zMe6>_He$yaaNrh_ Kl!YA9`Q_f,)`7|DG,Yt3I/cl60HVng&Fo.p,/po*>5');
define('LOGGED_IN_KEY',    'XI<-O+x-Hu]_ru2lvNddvbJyiZ*CFZ@d1M>>%#ODe9;HCQ};|MuorIh=e4CB5[^F');
define('NONCE_KEY',        'i&=)khh2upSRr|C:,B*x.eC4rLpg|hdPv}8(tGr!Z6{K2{ BQ6I]0h/!is 1*`N+');
define('AUTH_SALT',        'B_)atb)0CLQ@15$h,`+rYXlY5d@3]^LnLM/,ZaNRmL2k]2><D-q.SPgEa)T<:bV<');
define('SECURE_AUTH_SALT', '+o]2#.[mB-Dp+th=T v%){R<)ZCv/mi}i&<%@?1vu(8F^bNokBb|Zxj?yrJErVHC');
define('LOGGED_IN_SALT',   '`7}^Y,:D){z]-y*hSnIFp?VJ-z^JwIs:@PoL{ii`5|op k~bE.xGjYgvV1=_Go0@');
define('NONCE_SALT',       '(}<OWADqRch`5]#SE7~w+Or[;e7iON&[s.2^} ul,byU^O2Y=IV==_Qm$/O5H$ZW');

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
