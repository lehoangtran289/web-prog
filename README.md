# IT4552E-ICT03-K62

To run this website, you need to:

- Add config.php file to config folder
  Content of config.php as follow:
    
    define("PUBLIC_PATH", dirname(__FILE__) . "/../public");

    const DEVELOPMENT_ENVIRONMENT = 'true'
    //db information
    const DB_NAME = '';
    const DB_USER = '';
    const DB_PASSWORD = '';
    const DB_HOST = '';
    // base path of the project
    const BASE_PATH = '';
    
    const PAGINATE_LIMIT = '5';
    
- Add folder tmp/cache to the Project
