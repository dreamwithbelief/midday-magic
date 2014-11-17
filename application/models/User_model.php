<?php

class User_model extends CI_Model {
    public $username, $password, $salt, $admin, $created_at;

    public function __construct()
    {
        parent::__construct();
    }

    public function get_newest_user()
    {
        $this->db->select('*');
        $this->db->from('profile');
        $this->db->join('users', 'users.id = profile.user_id');
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_users()
    {
        $this->db->select('*');
        $this->db->from('profile');
        $this->db->join('users', 'users.id = profile.user_id');
        $this->db->where('admin &', 3);
        $query = $this->db->get();
        return $query->result();
    }

    public function all_members()
    {
        $this->db->select('*');
        $this->db->from('profile');
        $this->db->join('users', 'users.id = profile.user_id');
        $this->db->where('admin &', 1);
        $query = $this->db->get();
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
        $this->db->insert('users', $this);
    }

    public function delete_user($id)
    {
        $this->db->delete('users', array('id' => $id));
    }

    public function suspend_user($id)
    {
        $this->db->update('users', array('suspend' => true), array('id' => $id));
    }

    public function edit_user()
    {

    }
}