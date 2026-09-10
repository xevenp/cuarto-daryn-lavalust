<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: UsersModel
 */
class UsersModel extends Model {
    protected $table = 'users';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        return $this->db->table($this->table)->get_all() ?: [];
    }

    public function find_by_username($username)
    {
        return $this->db->table($this->table)->where('username', $username)->get();
    }

    public function create_user($username, $email, $password)
    {
        return $this->db->table($this->table)->insert([
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role' => 'user',
            'is_active' => 1,
        ]);
    }
}