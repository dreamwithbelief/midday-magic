<?php

class Home extends Controller {
    public function index() {
        $this->view( 'admin/index', array( 'name' => Session::get( 'name' ) ) );
    }

    public function events() {
        $this->view( 'home/events' );
    }

    public function contact() {
        $this->view( 'home/contact' );
    }

    public function officers() {
        $this->view( 'home/officers' );
    }

    public function gallery() {
        $this->view( 'home/gallery' );
    }

    public function about() {
        $this->view( 'home/about' );
    }
}