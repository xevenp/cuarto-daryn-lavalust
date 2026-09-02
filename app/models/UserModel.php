<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: UserModel
 */
class UserModel extends Model {
    protected $table = 'users';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        return $this->db->table($this->table)->get()->getResult();
    }
}