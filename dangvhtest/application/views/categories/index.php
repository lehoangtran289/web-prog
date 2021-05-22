<div><h2>Please select a category</h2>
    <?php foreach ($categories as $category): ?>
        <div class="category">
            
            <?php
            echo 'Hey Im here why dont notice me';
            var_dump($category);
            echo $html->link($category['Category']['brand'], 'categories/view/' . $category['Category']['id'] . '/' . $category['Category']['brand']) ?>
        
        </div>
    <?php endforeach ?>
</div>