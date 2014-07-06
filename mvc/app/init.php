<?php
session_start();
require_once 'core/App.php';
require_once 'core/Controller.php';
require_once 'core/Model.php';


$GLOBALS[ 'config' ] = array(
    'db' => array(
        'host' => '127.0.0.1',
        'name' => 'codest6_mvcdev',
        'user' => 'codest6_m8brgarc',
        'pass' => 'acain31493149'
    ),
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800
    ),
    'session' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    ),
    'register' => array(
        'key' => 'kdnnislkehvankdpoinseknioapd'
    )
);

$fn = function( $class )
{
    require_once 'classes/'.$class.'.php';
};

spl_autoload_register( $fn );

require_once 'functions/sanitize.php';