<?php

class User extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function find( $user = null )
    {
        if( !empty( $user ) )
        {
            $field = ( is_numeric( $user ) ) ? 'id' : 'username';
            $user = $this->get( array($field, '=', $user ) );
            var_dump($user);
            if( !empty($user) )
            {
                return $user;
            }
        }
        return false;
    }

    public function auth( $username = null, $password = null )
    {
        $user = $this->find( $username );
        if($user)
        {
            if($user->password === Hash::make( $password, $user->salt ))
            {
                return $user->id;
            }
        }
        return false;
    }

    public function login( $user_id )
    {
        $user = $this->get( array( 'id', '=', $user_id ) );
        if( $user->count() )
        {
            Session::put( 'logged_in', true );
            Session::put( 'user_id', $user->id );
            Redirect::to( 'admin/index' );
        }
    }

    public function remember( $user_id, $table = 'sessions' )  // Sets Cookie for Remember Me feature
    {
        $hash = Hash::unique();
        Cookie::put( Config::get( 'remember/cookie_name' ), $hash, Config::get( 'remember/cookie_expiry' ) );
        $fields = array( 'user_id' => $user_id, 'hash' => $hash );
        $session = $this->insert( $fields, $table );
        return $session;
    }

    public function is_remembered()
    {
        if( Cookie::exists( Config::get( 'remember/cookie_name' ) ) && !Session::exists( Config::get( 'session/session_name' ) ) )
        {
            $hash = Cookie::get( Config::get( 'remember/cookie_name' ) );
            $session = $this->get( array( 'hash', '=', $hash ), 'sessions' );
            if($session->count())
            {
                $this->login( $session->user_id );
            }
        }
    }
}