<?php

class Admin extends Controller
{
    public function index()
    {
        $this->view( 'admin/index' );
        $user = $this->model( 'user' );
    }

    public function user_manager()
    {
        $this->view( 'admin/user_manager' );
    }

    public function login()
    {
        $this->view( 'admin/login' );
        if( Input::exists() )
        {
            if( Token::check( Input::get( 'token' ) ) )
            {
                $v = new Validation();
                $validate = $v->check( array(
                    'username' => array( 'required' => true ),
                    'password' => array( 'required' => true )
                ) );
                if( $validate->passed() )
                {
                    // Log User In
                    $user = $this->model( 'user' );
                    $auth = $user->auth( Input::get( 'username' ), Input::get( 'password' ) );
                    if( $auth )
                    {
                        $user->login( $auth );
                    }
                    else
                    {
                        Session::flash( 'login', 'Invalid Username/Password' );
                    }
                }
                else
                {
                    Session::flash( 'login', $validate->errors( 1 ) );
                }
            }
        }
    }

    public function logout()
    {
        Session::delete( 'logged_in' );
        Session::delete( 'user_id' );
        Cookie::delete( Config::get( 'remember/cookie_name' ) );
        Redirect::to( 'admin/login' );
    }
}