<?php
session_start();

class UsersController extends VanillaController
{

//    function index() {
//        $this->Category->orderBy('brand', 'ASC');
//        $this->Category->showHasOne();
//        $this->Category->showHasMany();
////            $this->Category->where('parent_id', '0');
//        $categories = $this->Category->search();
//        $this->set('categories', $categories);
//    }

    function beforeAction()
    {

    }

    function afterAction()
    {

    }

    function login()
    {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($username == '' || $password == '') {
                echo 'Please fill in all blank!';
            } else {
                $this->User->where('username', $username);
                $this->User->where('password', $password);
                $user = $this->User->search($username, $password);
                //var_dump($user);
                if ($user) {
                    // save username to session
                    $_SESSION['user']['username'] = $username;
                    header('Location: ../orders/index');    //redirect to payout page
                } else echo "Username or password incorrect !";
                $this->set('user', $user); // maybe dont need this
            }

        }

    }

    function logout()
    {
        if (isset($_SESSION['username'])) {
            unset($_SESSION['username']);
            header('Location: ../../products/index');
        }

    }


    function register()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        if ($username == '' || $password == '' || $name == '' || $email == '' || $phone == '' || $address == '') {
            echo 'Please fill in all blank';
        } else {
            // Check if there exists an account
            $this->User->where('username', $username);
            if ($this->User->search($username)) {
                echo '<h1>Already exist this username</h1>';
            } else {
                echo '<h1>Register successfully!!!</h1>';
                $this->User->id = NULL;
                $this->User->username = $username;
                $this->User->password = $password;
                $this->User->email = $email;
                $this->User->phone = $phone;
                $this->User->name = $name;
                $this->User->address = $address;
                $this->User->save();
                //header('Location: index.php');  // redirect to order page
            }
        }

        //$this->set('user', $user);
    }

    function update()   // just a copy of register function, haven't dev yet
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        if ($username == '' || $password == '' || $name == '' || $email == '' || $phone == '' || $address == '') {
            echo 'Please fill in all blank';
        } else {
            // Check if there exists an account
            $this->User->where('username', $username);
            if ($this->User->search($username)) {
                echo '<h1>Already exist this username</h1>';
            } else {
                echo '<h1>Register successfully!!!</h1>';
                $this->User->id = NULL;
                $this->User->username = $username;
                $this->User->password = $password;
                $this->User->email = $email;
                $this->User->phone = $phone;
                $this->User->name = $name;
                $this->User->address = $address;
                $this->User->save();
                //header('Location: index.php');  // redirect to order page
            }
        }

        //$this->set('user', $user);
    }
    
    function findAll() {
        return $this->User->search();
    }

}