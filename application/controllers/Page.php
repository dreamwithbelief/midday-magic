<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

    public function index()
    {
        $this->data['title'] = 'Home';
        $this->template->load('layout', 'page/home', $this->data);
    }

    public function about()
    {
        $this->data['title'] = 'About Us';
        $this->template->load('layout', 'page/about', $this->data);
    }

    public function gallery()
    {
        $this->data['title'] = 'Club Gallery';
        $this->template->load('layout', 'page/gallery', $this->data);
    }

    public function events($year = null, $month = null)
    {
        $y = empty($year) ? date('Y') : $year;
        $m = empty($month) ? date('n') : $month;
        $this->load->library('calendar', array(
            'show_next_prev' => true,
            'next_prev_url' => site_url('events'),
            'day_type' => 'short',
            'template' => calendar_template()
        ));
        $this->data['calendar'] = $this->calendar->generate($y, $m);
        $this->data['title'] = 'Club Events';
        $this->template->load('layout', 'page/events', $this->data);
    }

    public function officers()
    {
        $this->data['title'] = 'Club Officers';
        $this->template->load('layout', 'page/officers', $this->data);
    }

    public function contact()
    {
        $this->data['title'] = 'Contact Us';
        $this->template->load('layout', 'page/contact', $this->data);
    }
}