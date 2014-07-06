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
            $data = $this->get( array($field, '=', $user ) );

            if( $data->count() )
            {
                return $data->first();
            }
        }
        return false;
    }

    public function authenticate( $username = null, $password = null )
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
            Session::put( 'username', $user->username );
        }
    }
}