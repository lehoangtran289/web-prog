<?php
session_start();

class AdminController extends VanillaController
{

    function index() {
        if(isset())
//            $this->Category->where('parent_id', '0');
        $users = $this->Admin->custom('SELECT username FROM users');
        $this->set('users', $users);
    }

    function beforeAction()
    {
        if(isset($_SESSION['user']['username']) && $_SESSION['user']['role'] == 'admin'){

        }
    }

    function afterAction()
    {

    }
    function users(){
        $users = $this->Admin->custom('SELECT username FROM users');
        $this->set('users', $users);
    }


}