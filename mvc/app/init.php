<?php
session_start();
require_once 'core/App.php';
require_once 'core/Controller.php';


$GLOBALS[ 'config' ] = array(
    'db' => array(
        'host' => '',
        'name' => '',
        'user' => '',
        'pass' => ''
    ),
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800
    ),
    'session' => array(
        'session_name' => 'user'
    )
);

$fn = function( $class )
{
    require_once 'classes/'.$class.'.php';
};

spl_autoload_register( $fn );

require_once 'functions/sanitize.php';