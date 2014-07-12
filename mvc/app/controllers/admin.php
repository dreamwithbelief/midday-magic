<?php

class Admin extends Controller {

    public function index() {
        Model::is_auth();
        $this->view( 'admin/index', array( 'name' => Session::get( 'name' ) ) );
    }

    public function events() {
        Model::is_auth();
        $this->view( 'admin/events' );
    }

    public function contact() {
        Model::is_auth();
        $this->view( 'admin/contact' );
    }

    public function officers() {
        Model::is_auth();
        $this->view( 'admin/officers' );
    }

    public function gallery() {
        Model::is_auth();
        $this->view( 'admin/gallery' );
    }

    public function about() {
        Model::is_auth();
        $this->view( 'admin/about' );
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
        $this->view( 'admin/login' );
    }

    public function logout() {
        Session::delete( 'logged_in' );
        Session::delete( 'user_id' );
        Cookie::delete( Config::get( 'remember/cookie_name' ) );
        Redirect::to( 'login' );
    }
}