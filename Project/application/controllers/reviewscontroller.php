<?php
    session_start();
    class ReviewsController extends VanillaController {
        
        function beforeAction() {
        
        }
        
        function afterAction() {
        
        }

        function findAll($product_id = NULL)
        {
            if($product_id != NULL)
            {
                $this->Review->where('product_id', $product_id);
                $this->Review->showHasOne();
                return $this->Review->search();
            }
        }

        function addReview() {
            $this->render = 0;
            error_reporting(0);
            if (isset($_SESSION['user']) == 0) {
                echo "<script type='text/javascript'>alert('You need to log in to post a review!, try again!');";
                echo "window.location.replace(\"" .BASE_PATH. "/users/login\");";
                echo "</script>";
                return;
            } 
                
            if(isset($_POST['postReview'])) {
                $user_id = $_SESSION['user']['id'];
                $product_id = $_POST['idForReview'];
                $content = $_POST['content'];
                $rating = $_POST['rating'];

                $is_bought = performAction('orders', 'is_bought', array($user_id, $product_id));
                if ($is_bought == false) {
                    echo "<script type='text/javascript'>alert('You need to purchase this item to post a review!, try again!');";
                    echo "window.location.replace(\"" .BASE_PATH. "/products/view/" .$product_id. "\");";
                    echo "</script>";
                    #header('Location: '.BASE_PATH.'/products/view/'.$product_id);
                    return;
                }
                $this->Review->id = null;
                $this->Review->user_id = $user_id;
                $this->Review->product_id = $product_id;
                $this->Review->content = htmlspecialchars($content, ENT_COMPAT);
                $this->Review->rating = $rating;
                if ($this->Review->save() == -1) {
                    echo "<script type='text/javascript'>alert('Post review failed!, try again!');";
                    echo "window.location.replace(\"" .BASE_PATH. "/products/view/" .$product_id. "\");";
                    echo "</script>";
                }
                header('Location: '.BASE_PATH.'/products/view/'.$product_id);
            }
        }
    }
