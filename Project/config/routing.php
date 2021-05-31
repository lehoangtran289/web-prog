<?php
    /**
     * 1. specify default controller and action
     * 2. specify custom redirects using regex
     *      http://localhost/framework/admin/categories/view will become
     *      http://localhost/framework/admin/categories_view
     *      where admin is the controller and categories_view is the action
     */
    
    $routing = array(
        '/admin\/(.*?)\/(.*?)\/(.*)/' => 'admin/\1_\2/\3',
        '/admin\/users\/add/' => 'admin/users_add',
        '/admin\/products\/add/' => 'admin/products_add',
        '/admin\/categories\/add/' => 'admin/categories_add',
        '/admin\/shipments\/add/' => 'admin/shipments_add',
        '/admin\/payments\/add/' => 'admin/payments_add'
    );
    
    // define a 2d array
    $default['controller'] = 'products';
    $default['action'] = 'index';