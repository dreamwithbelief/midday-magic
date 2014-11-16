<?php

class User_model extends CI_Model {
    public $username, $password, $salt, $admin, $created_at;

    public function __construct()
    {
        parent::__construct();
    }

    public function get_newest_user()
    {
        $this->db->get();
    }

    public function get_all_users()
    {
        $this->db->select('*');
        $this->db->from('profile');
        $this->db->join('users', 'users.id = profile.user_id');
        $query = $this->db->get();
        $this->db->where('admin &', 3);
        return $query->result();
    }

    public function all_members()
    {
        $this->db->select('*');
        $this->db->from('profile');
        $this->db->join('users', 'users.id = profile.user_id');
        $query = $this->db->get();
        $this->db->where('admin &', 1);
        return $query->result();
    }

    public function all_officers()
    {
        $this->db->select('*');
        $this->db->from('profile');
        $this->db->join('users', 'users.id = profile.user_id');
        $this->db->where('profile.position !=', 'member');
        $this->db->where('admin &', 2);
        $query = $this->db->get();
        return $query->result();
    }

    public function create_user()
    {

    }

    public function delete_user()
    {

    }

    public function suspend_user()
    {

    }

    public function edit_user()
    {

    }
}