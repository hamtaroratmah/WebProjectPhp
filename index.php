<?php
    session_start();

    date_default_timezone_set("Europe/Brussels");


    define('VIEWS_PATH','views/');
    define('SESSION_ID',session_id());
    define('CONTROLLERS_PATH','controllers/');

	function loadClass($className) {
		require_once('models/' . $className . '.class.php');
	}
	spl_autoload_register('loadClass');

	$db=Db::getInstance();

	require_once(VIEWS_PATH.'header.php');

	if(!$_SESSION['authenticated'] && !isset($_GET['action'])){
	    $_GET['action']='login';
    }

	if(isset($_GET['action'])){
        switch ($_GET['action']) {
            case 'home': # action=home
                require_once('controllers/HomeController.php');
                $controller = new HomeController($db);
                break;
            case 'login': # action=login
                require_once('controllers/LoginController.php');
                $controller = new LoginController($db);
                break;
            case 'register':
                require_once('controllers/RegisterController.php');
                $controller = new RegisterController($db);
                break;
            case 'admin': # action=admin
                require_once('controllers/AdminController.php');
                $controller = new AdminController();
                break;
            case 'profile':
                require_once ('controllers/ProfileController.php');
                $controller = new ProfileController($db);
                break;
            case 'add_idea':
                require_once ('controllers/AddControllers.php');
                $controller = new AddControllers($db);
                break;
            case 'admin_members':
                require_once ('controllers/AdminMembersControllers.php');
                $controller = new AdminMembersControllers($db);
                break;
            case 'admin_ideas':
                require_once ('controllers/AdminIdeasControllers.php');
                $controller = new AdminIdeasControllers($db);
                break;
            case 'logout':
                require_once ('controllers/LogoutControllers.php');
                $controller = new LogoutController();
                break;
            case 'addcomment':
                require_once ('controllers/CommentController.php');
                $controller = new CommentController();
                break;

            default: require_once('controllers/LoginController.php');
                $controller = new LoginController($db);
        }
    } else{
        require_once('controllers/LoginController.php');
        $controller = new LoginController($db);
        $_SESSION=array();

    }

    $controller->run();

	include(VIEWS_PATH.'footer.php');
