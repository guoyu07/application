<?php
/**
 * Spiral Framework, SpiralScout LLC.
 *
 * @package   spiralFramework
 * @author    Anton Titov (Wolfy-J)
 * @copyright ©2009-2011
 */
define('SPIRAL_INITIAL_TIME', microtime(true));

//No comments
mb_internal_encoding('UTF-8');

//Error reporting
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', true);

//Root directory
$root = dirname(__DIR__) . '/';

//Composer
require $root . 'vendor/autoload.php';

//Forcing work directory
chdir($root);

//Let's start!
App::init([
    'root'        => $root,
    'libraries'   => $root . '/vendor/',
    'application' => $root . '/app/'
], null, false);