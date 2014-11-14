<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function index()
    {
        $data = array('title' => 'Home');
        $this->template->load('layout', 'home', $data);
    }

    public function register()
    {

    }

    public function login()
    {

    }

    public function logout()
    {

    }
}