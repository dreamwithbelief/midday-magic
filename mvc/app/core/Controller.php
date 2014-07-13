<?php

class Controller {
    public function is_auth() {
        if ( !Session::get( 'logged_in' ) || ( Session::get( 'user_id' ) < 1 ) ) {
            Redirect::to( 'login' );
        }
    }

    public function model( $model, $table = '' ) // Load model in controller
    {
        require_once '../app/models/' . $model . '.php';
        $m = new $model();
        $table = empty( $table ) ? $model : $table;
        $m->set_table( $table ); // Automatically set table name // Rule model name is singular, table is plural.
        return $m;
    }

    public function view( $view = 'home/index', $data = array(), $layout = 'index' ) // Load view in controller
    {
        $user = array( 'name' => Session::get( 'name' ), 'user_id' => Session::get( 'user_id' ) );
        $yield = '../app/views/' . $view . '.php';
        require_once '../app/views/layout/' . $layout . '.php';
    }
}