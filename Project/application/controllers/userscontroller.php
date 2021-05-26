<?php

class UsersController extends VanillaController {

//    function index() {
//        $this->Category->orderBy('brand', 'ASC');
//        $this->Category->showHasOne();
//        $this->Category->showHasMany();
////            $this->Category->where('parent_id', '0');
//        $categories = $this->Category->search();
//        $this->set('categories', $categories);
//    }

    function login() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $this->User->where('username', $username);
        $this->User->where('password', $password);
        $user = $this->User->search($username, $password);
        echo $username;
        echo $password;
        var_dump($user);
        $this->set('user', $user);
    }



}