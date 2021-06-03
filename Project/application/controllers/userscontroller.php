<?php
    session_start();

    class UsersController extends VanillaController {

//    function index() {
//        $this->Category->orderBy('brand', 'ASC');
//        $this->Category->showHasOne();
//        $this->Category->showHasMany();
////            $this->Category->where('parent_id', '0');
//        $categories = $this->Category->search();
//        $this->set('categories', $categories);
//    }

        function beforeAction() {
//
        }

        function afterAction() {

        }

        function login() {
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];

                if ($username == '' || $password == '') {
                    echo 'Please fill in all blank!';
                } else {
                    $this->User->where('username', $username);
                    $user = $this->User->search($username)[0]['User'];

                    if(!password_verify($password, $user['password'] )) unset($user);
                    if ($user) {
                        // save username to session
                        $_SESSION['user']['username'] = $username;
                        $_SESSION['user']['role'] = $user['role'];
                        $_SESSION['user']['id'] = $user['id'];
                        echo '<script>localStorage.setItem("isLoggedIn", "true")</script>';
                        if($user['role'] == 'user')
                            echo '<script>location.href = "' . BASE_PATH. '/orders/index' .'"</script>';
                        else if($user['role'] == 'admin')
                            echo '<script>location.href = "' . BASE_PATH. '/admin/index' .'"</script>';

                    } else echo "Username or password incorrect !";
                    $this->set('user', $user); // maybe dont need this
                }
            }
        }

        function logout() {
            if (isset($_SESSION['user']))
                unset($_SESSION['user']);
//                redirectAction('products','index',array());
            echo '<script>localStorage.setItem("isLoggedIn", "false")</script>';
            echo '<script>location.href = "' . BASE_PATH .'"</script>';
        }


        function register() {
            if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['email']) && isset($_POST['name']))
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
                        $this->User->password = password_hash($password, PASSWORD_BCRYPT);
                        $this->User->email = $email;
                        $this->User->phone = $phone;
                        $this->User->name = $name;
                        $this->User->address = $address;
                        $this->User->save();
                        header('Location: '.BASE_PATH.'/users/login');
//                    redirectAction('users','login',array());
                    }
                }
            }
        }

        function update()
        {
            if(!isset($_SESSION['user']))
                header('Location: '.BASE_PATH.'/users/login');
            $this->User->where('username', $_SESSION['user']['username']);
            $currentUser = $this->User->search($_SESSION['user']['username'])[0]['User'];
            $this->set('currentUser', $currentUser);
            if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['email']) && isset($_POST['name']))
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
                    $user = $this->User->search($username)[0]['User'];

                    if ($user && $user['username'] != $_SESSION['user']['username']) {
                        echo '<h1>You can\'t change to that username, there already has one</h1>';
                    } else {
                        echo '<h1>Update successfully!!!</h1>';
                        $this->User->id = $currentUser['id'];
                        $this->User->username = $username;
                        $this->User->password = password_hash($password, PASSWORD_BCRYPT);
                        $this->User->email = $email;
                        $this->User->phone = $phone;
                        $this->User->name = $name;
                        $this->User->address = $address;
                        $this->User->save();
                        $_SESSION['user']['username'] = $username;
                            header('Location: '.BASE_PATH.'/users/update');  // redirect to update
                    }

                }
            }

        }

        function findAll() {
            return $this->User->search();
        }

        function findById($id = '') {
            if ($id != '') {
                $this->User->where('id', $id);
                return $this->User->search();
            }
        }
    }