<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller {

    public function index() {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $_SESSION['student_access'] = true;
        $this->call->view('student/home');
    }

    public function profile() {
        $student = [
            'student_id' => 'MCC2024-00029',
            'name'       => 'Daryn Solares Cuarto',
            'course'     => 'Bachelor of Science in Information Technology',
            'year'       => '3rd Year',
            'section'    => '3F4',
            'email'      => 'darynsolares@gmail.com'
        ];

        $this->call->view('student/profile', $student);
    }
}
?>