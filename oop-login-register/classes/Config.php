<?php

/**
 * Original Creation Information
 *      Author: Kyle Stafford
 *      Date:   6/30/14
 *      Time:   11:03 PM
 */
class Config {
    public static function get( $path = null ) {
        if ( $path ) {
            $config = $GLOBALS[ 'config' ];
            $path = explode( '/', $path );

            foreach ( $path as $bit ) {
                if ( isset( $config[ $bit ] ) ) {
                    $config = $config[ $bit ];
                }
            }
            return $config;
        }
        return false;
    }
}

?>