<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

    public function index()
    {
        $data = array('title' => 'Home');
        $this->template->load('layout', 'home', $data);
    }
}