<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function loginAction()
    {
        if (isset($_SESSION['admin'])) {
            header('Location: /admin');
        }
        $this->view->layout = 'login';

        if (!empty($_POST)) {
            $user = new User();
            if (!$user->login()) {
                $this->view->message('Wrong login or password!');
            } else {
                $this->view->message(['url' => 'admin']);
            }
        }
        $this->view->render('Login');
    }

    public function logoutAction()
    {
        unset($_SESSION['admin']);
        header('Location: /');
    }

    public function addAction()
    {
        if (!empty($_POST)) {
            if (!$this->model->userValidate($_POST)) {
                $this->view->message($this->model->error);
            }
            $this->model->addUser($_POST);
            $this->view->message(['url' => 'admin']);
        }
    }
}