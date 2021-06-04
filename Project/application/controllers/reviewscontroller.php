<?php
    
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
            if(isset($_POST['content']) && isset($_POST['idForReview']) && isset($_POST['rating']))
            {
                $id = $_POST['idForReview'];
                $content = $_POST['content'];
                $rating = $_POST['rating'];
                if ($id == '' || $content == '') {
                    echo 'Please fill in all blank';
                } else {
                        echo $_SESSION['user']['id'];
                        $this->Review->id = null;
                        $this->Review->user_id = $_SESSION['user']['id'];
                        $this->Review->product_id = $id;
                        $this->Review->content = $content;
                        $this->Review->rating = $rating;
                        if ($this->Review->save() == -1) {
                            echo "<script type='text/javascript'>alert('post review failed, try again!');</script>";
                        }
                       # header('Location: '.BASE_PATH.'/products/view/'.$id);
                }
            }
        }
    }
