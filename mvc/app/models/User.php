<?php

class User extends Model {
    public function __construct() {
        parent::__construct(); // User parent constructor when this class is instantiated.  (See core/Model.php)
    }

    public function find( $user = null ) // Find Single User using id or username
    {
        if ( !empty( $user ) ) {
            $field = ( is_numeric( $user ) ) ? 'id' : 'username';
            return $this->get( $field . ' = ' . $user );
        }
        return false;
    }

    public function auth( $username = null, $password = null ) // Authenticate User
    {
        if ( $this->find( $username ) ) {
            if ( $this->first()->password === Hash::make( $password, $this->first()->salt ) ) {
                return true;
            }
        }
        return false;
    }

    public function login( $auth ) // Logs User In aka Create Session boolean from auth() required as parameter
    {
        if ( $auth ) {
            Session::put( 'logged_in', true );
            Session::put( 'user_id', $this->first()->id );
            Session::put( 'name', $this->first()->name );
        }
        return Session::exists( 'logged_in' );
    }

    public function remember( $table = 'sessions' ) // Sets Cookie for Remember Me feature // Untested
    {
        $hash = Hash::unique();
        Cookie::put( Config::get( 'remember/cookie_name' ), $hash, Config::get( 'remember/cookie_expiry' ) );
        $fields = array( 'user_id' => $this->first()->id, 'hash' => $hash );
        return $this->insert( $fields, $table );
    }

    public function is_remembered() // Auto login if remembered user  // Untested
    {
        if ( Cookie::exists( Config::get( 'remember/cookie_name' ) ) && !Session::exists( Config::get( 'session/session_name' ) ) ) {
            $hash = Cookie::get( Config::get( 'remember/cookie_name' ) );
            $this->get( 'hash = ' . $hash, 'user_sessions' );
            if ( $this->count() ) {
                $this->login( true );
            }
        }
    }
}