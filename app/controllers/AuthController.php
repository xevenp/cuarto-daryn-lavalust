<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->call->database();
            $this->call->model('UsersModel');
            $username = trim((string) $this->request->post('username'));
            $password = (string) $this->request->post('password');
            $user = $this->UsersModel->find_by_username($username);

            if ($user && password_verify($password, $user['password'])) {
                session_regenerate_id(true);
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                redirect('products');
            }

            $error = 'Invalid username or password.';
        }

        $this->call->view('auth/login', ['error' => $error]);
    }

    public function register()
    {
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->call->database();
            $this->call->model('UsersModel');
            $username = trim((string) $this->request->post('username'));
            $email = trim((string) $this->request->post('email'));
            $password = (string) $this->request->post('password');

            if ($username === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 6) {
                $error = 'Enter a username, valid email, and password with at least 6 characters.';
            } elseif ($this->UsersModel->find_by_username($username)) {
                $error = 'That username is already taken.';
            } else {
                $this->UsersModel->create_user($username, $email, $password);
                redirect('login');
            }
        }

        $this->call->view('auth/register', ['error' => $error]);
    }

    public function logout()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $_SESSION = [];
        session_destroy();
        redirect('login');
    }
}