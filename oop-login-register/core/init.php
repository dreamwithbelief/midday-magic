<?php
/**
 * Original Creation Information
 *      Author: Kyle Stafford
 *      Date:   6/30/14
 *      Time:   11:07 PM
 */

session_start();

$GLOBALS[ 'config' ] = array( 'mysql' => array( 'host' => 'mysql.development.speakoutscc.com', 'username' => 'kstafford', 'password' => '2007AudiRS4', 'db' => 'speakout_development' ), 'remember' => array( 'cookie_name' => 'hash', 'cookie_expiry' => 2629740 ), 'session' => array( 'session_name' => 'user' ) );

spl_autoload_register( function ( $class ) {
    require_once 'classes/' . $class . '.php';
} );

require_once 'functions/sanitize.php';
?>