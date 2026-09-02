<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: UsersController
 */
class UsersController extends Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->call->model('UsersModel');
        $data['users'] = $this->UsersModel->getAll();

        $this->load->view('users_view', $data);
    }
}