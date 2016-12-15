<?php

class AdminController extends BaseController
{
    function index() {

    if ($this->isPost){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $userId = $this->model->login($username,$password);
        if ($userId!==false){
            $_SESSION['username']=$username;
            $_SESSION['user_id']=$userId;



            $this->addInfoMessage("Login Successful");
            $this->redirect("");
        }else{
            $this->addErrorMessage("Username or Password incorrect");
        }
    }

    }
    public function logout()
    {
        session_destroy();
        $this->redirect("");
    }

}
