<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function index()
    {
        $this->data['title'] = 'Users';
        $this->template->load('layout', 'page/home', $this->data);
    }

    public function register()
    {

    }

    public function login()
    {
        $this->data['title'] = 'User Login';
        $this->template->load('layout', 'user/login', $this->data);
    }

    public function logout()
    {

    }
}