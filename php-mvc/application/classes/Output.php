<?php

class Output {
    public static function esc( $string )
    {
        return htmlentities( $string, ENT_QUOTES, 'UTF-8' );
    }
}