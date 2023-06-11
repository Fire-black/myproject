<?php

class controller_user extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new Model_user();
        $this->view = new View();
    }
    // login page
    public function login(){
        $error = [];

        if(isset($_POST['login'], $_POST['password'])){
            // получаем пользователя и сравниваем пароль
            $user = $this->model->get_user_by_login($_POST['login']);
            if(is_array($user) && ($user['password'] == $_POST['password'])){
                $_SESSION['user'] = $user;
                header('Location: /');
                exit;
            }
            $error['errlogin'] = 'Неверный логин или пароль!';
        }

        $this->view->generate('login_view.php', $error);
    }

    public function register(){

        if(isset($_POST['login'], $_POST['password'], $_POST['password_confirm'])){
            if($_POST['password'] == $_POST['password_confirm']){
                $this->model->register($_POST['login'], $_POST['password']);
                $_SESSION['user'] = $this->model->get_user_by_login($_POST['login']);
                header('Location: /');
                exit;
            }
            $error['errregister'] = 'Введенные пароли не совпадают';
            $this->view->generate('login_view.php', $error);
        } else {
            die('err');
            header('Location: /');
        }
    }

    public function logout(){
        session_destroy();
        header('Location: /');
    }
}