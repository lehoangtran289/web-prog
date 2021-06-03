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
            if(isset($_POST['content']) && isset($_POST['idForReview']))
            {
                $id = $_POST['idForReview'];
                $content = $_POST['content'];
                if ($id == '' || $content == '') {
                    echo 'Please fill in all blank';
                } else {
                        echo '<h2>Review successfully!!!</h2>';
                        $this->Review->id = NULL;
                        $this->Review->user_id = NULL;
                        $this->Review->product_id = NULL;
                        $this->Review->content = $content;
                        $this->Review->rating = NULL;
                        $this->Review->save();
                        header('Location: '.BASE_PATH.'/products/view/'.$id);
                }
            }
        }
    }
