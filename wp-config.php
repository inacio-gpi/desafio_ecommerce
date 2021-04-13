<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'd_ecommerce' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', 'root' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '#_R|T~jC[%f!ixMO+M<ICyuX$F)/d,CJ (xDEuDlRqkqG~0t3k2Iqc%tKon ~6Ry' );
define( 'SECURE_AUTH_KEY',  ',UE=c7GEP[<a1+C}K]wI1orwKf1OV3UDFBb**TO<P78t!r`_RS{{0VeY;Z)zrvz?' );
define( 'LOGGED_IN_KEY',    'h8^pG@3MO2N]-DIc`Q~r)qPe>;NI.$`jKZZOzYQ%1Inp8n!W3C7[%nFVg}ETHCn<' );
define( 'NONCE_KEY',        'D0Wq#%>sPdfpSHa>?elus]^1u_1+M%UJy]qso?<)B:Rv@95mUwe*dY@t8A2nobM[' );
define( 'AUTH_SALT',        '2drk@TmgY?1o`t,DP+1?fN65XI>yo}8coPMYz6ePuEBc%jYAf0Y*io%>?g:5eq>`' );
define( 'SECURE_AUTH_SALT', 'F7~A`jD.[TC}ath2zb LX~^#U0)]89aO43?0QLCAQj$ch^d#3%<O2|6|ff>o|c>b' );
define( 'LOGGED_IN_SALT',   '{<zWsA`4F<>r)v/tW+vG3s$N`idiVaVw7<.Dwk=NHC~O~tJE|;UP+nCrHW>{![4g' );
define( 'NONCE_SALT',       ';r|dKR70RJTmza3CA^86OEx:5S@}*CF5jf~-$8lJn(uu?-CS$`{SiII[2O2#|KB!' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'd_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
