<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Le script de création wp-config.php utilise ce fichier lors de l'installation.
 * Vous n'avez pas à utiliser l'interface web, vous pouvez directement
 * renommer ce fichier en "wp-config.php" et remplir les variables à la main.
 * 
 * Ce fichier contient les configurations suivantes :
 * 
 * * réglages MySQL ;
 * * clefs secrètes ;
 * * préfixe de tables de la base de données ;
 * * ABSPATH.
 * 
 * @link https://codex.wordpress.org/Editing_wp-config.php 
 * 
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'p3-new-website');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '}4vk=DWKUc54zUhd0A-$0Ah/kX@)^x+J&@#wpX$d[`Fc!nP2WEszH+A}u^?R6u>[');
define('SECURE_AUTH_KEY',  'Q+Ww+!FY[bD-4Zi0Qjbm)aPjq>4ZJH]W<Ss1%vUR0e?@1tq&VePixk3s*8zkr{Ti');
define('LOGGED_IN_KEY',    'vt^6wqgN@>^LN3l13f5PM+;N{!k,}G.LR7`mKLZ){GSzg1xbx8MBU|G1*ja6u?|d');
define('NONCE_KEY',        ']NR-;DQqly9)U6D)l0OIYsO^s4*;Hjix-Na~uT4;Hi4A:9({rh2btFcO1TFD<lhT');
define('AUTH_SALT',        '6twORG[qvK#O^x}uC|%bEk-pY*Y0l(|Yh+f/K!G<8TK1=]>C4p=g{&NZ{E@w?*lS');
define('SECURE_AUTH_SALT', 'sfi8mo@4Q@`pN{6NjS#@/d-0shqx/[Twt$]?LJ|Ke0yqOT.eRsxN:+K7_0cpHTs/');
define('LOGGED_IN_SALT',   'MfJKg!?<@J+4|V9F+,2})L;mt<i*`KAc|=HeyM2PR5/]vt`O C+n]Lu>)r.:aaH{');
define('NONCE_SALT',       'VFO=t&t%+v&J~uvBpGKTC|Z`9W*4PgmH-fJ1;w7}sSa3Flo(AZSHc6t9b,-o({Zb');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'wp_';

/** 
 * Pour les développeurs : le mode déboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 * 
 * Pour obtenir plus d'information sur les constantes 
 * qui peuvent être utilisée pour le déboguage, consultez le Codex.
 * 
 * @link https://codex.wordpress.org/Debugging_in_WordPress 
 */ 
define('WP_DEBUG', false); 

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');