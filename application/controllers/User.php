<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function login()
    {
        $this->data['title'] = 'User Login';
        $this->template->load('layout', 'user/login', $this->data);
    }

    public function register()
    {
        $this->data['title'] = 'User Registration';
        $this->template->load('layout', 'user/register', $this->data);
    }

    public function logout()
    {

    }

    public function create()
    {

    }

    public function authenticate()
    {

    }
}