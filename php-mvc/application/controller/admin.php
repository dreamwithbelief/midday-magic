<?php

class Admin extends Controller
{
    public function index() {
        $this->isAuth();
        $this->loadView( 'admin/index' );
    }

    public function events() {
        $this->isAuth();
        $this->loadView( 'admin/events' );
    }

    public function contact() {
        $this->isAuth();
        $this->loadView( 'admin/contact' );
    }

    public function officers() {
        $this->isAuth();
        $this->loadView( 'admin/officers' );
    }

    public function gallery() {
        $this->isAuth();
        $this->loadView( 'admin/gallery' );
    }

    public function about() {
        $this->isAuth();
        $this->loadView( 'admin/about' );
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
$this->loadView( 'admin/login' );
}

public function logout() {
    Session::delete( 'logged_in' );
    Session::delete( 'user_id' );
    Cookie::delete( Config::get( 'remember/cookie_name' ) );
    Redirect::to( 'login' );
}
}
