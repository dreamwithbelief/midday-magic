<?php

class Member extends Controller {
    public function index() {
        Model::is_auth();
        $this->view( 'member/index' );
    }

    public function listing() {
        Model::is_auth();
        $this->view( 'member/listing' );
    }

    public function register() {
        if ( Input::exists() ) {
            if ( Token::check( Input::get( 'token' ) ) ) {
                $v = new Validation();
                $validate = $v->check( $_POST, array( 'username' => array( 'required' => true ), 'password' => array( 'required' => true ), 'name' => array( 'required' => true ) ) );
                if ( $validate->passed() ) {
                    // User Exists?
                    $user = $this->model( 'user' );
                    $user->find( Input::get( 'username' ) );
                    if ( $user->count() ) {
                        Session::set_flash( 'register', 'User Already Exists' );
                    } else {
                        $salt = Hash::salt();
                        $password = Hash::make( Input::get( 'password' ), $salt );
                        $inserted = $user->insert( array( 'username' => Input::get( 'username' ), 'password' => $password, 'salt' => $salt, 'name' => Input::get( 'name' ), 'joined' => date( 'Y-m-d' ) ) );
                        if ( $inserted ) {
                            Session::set_flash( 'register', 'User Successfully Registered' );
                        } else {
                            Session::set_flash( 'register', $user->error() );
                        }
                    }
                } else {
                    Session::set_flash( 'register', $validate->errors( true ) );
                }
            }
        }
        $this->view( 'member/register' );
    }

    public function login() {
        if ( Input::exists() ) {
            if ( Token::check( Input::get( 'token' ) ) ) {
                $v = new Validation();
                $validate = $v->check( $_POST, array( 'username' => array( 'required' => true ), 'password' => array( 'required' => true ) ) );
                if ( $validate->passed() ) {
                    // Log User In
                    $user = $this->model( 'user' );
                    $authorized = $user->auth( Input::get( 'username' ), Input::get( 'password' ) );
                    if ( $authorized ) {
                        if ( $user->login( $authorized ) ) {
                            Redirect::to( 'index' );
                        }
                    } else {
                        Session::set_flash( 'login', 'Invalid Username/Password' );
                    }
                } else {
                    Session::set_flash( 'login', $validate->errors( true ) );
                }
            }
        }
        $this->view( 'member/login' );
    }

    public function logout() {
        Session::delete( 'logged_in' );
        Session::delete( 'user_id' );
        Session::delete( 'name' );
        Cookie::delete( Config::get( 'remember/cookie_name' ) );
        Redirect::to( 'index' );
    }
}