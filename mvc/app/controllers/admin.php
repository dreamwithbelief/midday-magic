<?php

class Admin extends Controller
{
    public function index()
    {
        $user = $this->model( 'user' );
        $current_user = $user->find( Session::get('user_id') );
        $username = $current_user->username;
        $this->view( 'admin/index' );
    }

    public function user_manager()
    {
        $this->view( 'admin/user_manager' );
    }

    public function register( $key = null )
    {
        if( Input::exists() )
        {
            if( Token::check( Input::get( 'token' ) ) )
            {
                $v = new Validation();
                $validate = $v->check($_POST, array(
                    'username' => array( 'required' => true ),
                    'password' => array( 'required' => true )
                ) );
                if( $validate->passed() )
                {
                    // User Exists?
                    $user = $this->model( 'user' );
                    if( $user->find( Input::get( 'username' ) ) )
                    {
                        Session::set_flash( 'register', 'User Already Exists' );
                    }
                    else
                    {
                        $salt = Hash::salt();
                        $password = Hash::make( Input::get( 'password' ), $salt );
                        $created = $user->insert( array( ':username' => Input::get( 'username' ), ':password' => $password, ':salt' => $salt ) );
                        if($created)
                        {
                            Session::set_flash( 'register', 'User Successfully Registered' );
                        }
                        else
                        {
                            Session::set_flash( 'register', $user->error() );
                        }
                    }
                }
                else
                {
                    Session::set_flash( 'register', $validate->errors( true ) );
                }
            }
        }
        $this->view( 'admin/register' );
    }

    public function login()
    {
        if( Input::exists() )
        {
            if( Token::check( Input::get( 'token' ) ) )
            {
                $v = new Validation();
                $validate = $v->check($_POST, array(
                    'username' => array( 'required' => true ),
                    'password' => array( 'required' => true )
                ) );
                if( $validate->passed() )
                {
                    // Log User In
                    $user = $this->model( 'user' );
                    $auth = $user->auth( Input::get( 'username' ), Input::get( 'password' ) );
                    var_dump($auth);
                    if( $auth )
                    {
                        $user->login( $auth );
                    }
                    else
                    {
                        Session::set_flash( 'login', 'Invalid Username/Password' );
                    }
                }
                else
                {
                    Session::set_flash( 'login', $validate->errors( true ) );
                }
            }
        }
        $this->view( 'admin/login' );
    }

    public function logout()
    {
        Session::delete( 'logged_in' );
        Session::delete( 'user_id' );
        Cookie::delete( Config::get( 'remember/cookie_name' ) );
        Redirect::to( 'login' );
    }
}