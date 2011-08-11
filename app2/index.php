<?php
/*
 * Configurações necessárias do PHP
 */
error_reporting(E_ALL);
ini_set('session.use_trans_sid', false);
ini_set('output_buffering', 1);
date_default_timezone_set('America/Sao_Paulo');

/*
 *  0 = Producão, não mostrar mensagens de erro 
 *  1 = DEBUG, mostrar mensagens de erro 
 */
DEFINE('XMODE', 1);

ini_set('display_errors', XMODE);

if ( XMODE == 1 ) {
	
	$base			= dirname(__FILE__);
	$assets			= $base . '/assets';
	$runtime		= $base . '/protected/runtime';
	$data			= $base . '/protected/Data';
	
	if(!is_writable($assets))
		die("É necessário permissão de escrita para pasta $assets");
	if(!is_writable($runtime))
		die("É necessário permissão de escrita para pasta $runtime");
	
	if(!extension_loaded("pdo_sqlite"))
		die("Módulo SQLite não instalado.");
}

/*
 * Iniciar aplicação 
 */
$framework = '../prado-3.1.9.r2973/framework/prado.php';
require_once($framework);

$gAplication = new TApplication();
$gAplication->run();