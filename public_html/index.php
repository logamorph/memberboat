<?php namespace ThisAmericanLab\Memberboat;

ini_set('display_errors',1);
error_reporting(E_ALL);

switch($_SERVER['HTTP_HOST']) {
	
	case 'project':
		$URL_PATH = '/memberboat/public_html';
		break;
	case 'memberboat.org':
	case 'www.memberboat.org':
	default:
		$URL_PATH = '';
		break;
}

require_once dirname(__FILE__).'/config/mysqli_db_config.php';
require_once dirname(__FILE__).'/lib/klein/klein/klein.php';
// require_once dirname(__FILE__).'/lib/ThisAmericanLab/Memberboat/BaseService.php';


// 
//*********************************************************************
respond(function ($request, $response, $app) {
	global $mysqli_db;
	global $URL_PATH;
	
    // Handle exceptions => flash the message and redirect to the referrer
    $response->onError(function ($response, $err_msg) {
        $response->flash($err_msg);
        $response->back();
    });
	
	// check session
	
    // The third parameter can be used to share scope and global objects
    $app->URL_PATH = $URL_PATH;
    $app->db = $mysqli_db;

	$response->URL_PATH = $URL_PATH;
    // $app also can store lazy services, e.g. if you don't want to
    // instantiate a database connection on every response
    //$app->register('db', function() {
     //   return new PDO(...);
    //});
});

//*********************************************************************

respond($URL_PATH.'/', function ($request, $response) {
	$response->render('view/home_view.php');
});

//*********************************************************************
respond('GET', $URL_PATH.'/memberform', function ($request, $response, $app) {
	
	// var_dump($app->service);
	require_once dirname(__FILE__).'/lib/ThisAmericanLab/Memberboat/BaseService.php';
	//use ThisAmericanLab\MemberBoat\BaseService as BaseService;
	
	$controller = new BaseService();
	$controller->name = 'some controller';
	var_dump($controller);
	
	// controller
    $response->render('view/memberform.php');
    
});

respond('POST', $URL_PATH.'/memberform_submit', function ($request, $response, $app) {
	
	// var_dump($app->service);
	
	// controller
    $response->render('submit_memberform.php');
    
});


//*********************************************************************
respond('GET', $URL_PATH.'/group/[a:urlname]', function ($request, $response, $app) {
	
	// ********************************************************
	// CONTROLLER
	
	require_once dirname(__FILE__).'/lib/ThisAmericanLab/Memberboat/GroupService.php';
	
	$service = new GroupService();

	$group = $service->getByUrlname($request->param('urlname'));
	
	// ********************************************************
	// VIEW
	$response->group = $group;
	
    $response->render('view/memberform_view.php');
    
});

respond('GET', $URL_PATH.'/[a:page]', function ($request, $response, $app) {
	
	// ToDo: validate a:page, security, etc
	$view_file = "view/{$request->param('page')}_view.php";
	if (file_exists($view_file)) {
		
		$response->render("view/{$request->param('page')}_view.php");
		
	} else {
		// should do a redirect instead
		$response->render("view/home_view.php");
	}
});


//*********************************************************************
// LOGIN-PROTECTED REQUESTS
//   i.e. uses group-specific database

respond('GET', $URL_PATH.'/test/redirect', function ($request, $response, $app) {
	
	$response->render('view/dashboard_view.php');
});

respond('GET', $URL_PATH.'/test/redirect', function ($request, $response, $app) {
	
	$response->redirect($app->URL_PATH .'/pricing');
});

respond('GET', $URL_PATH.'/subscription/list', function ($request, $response, $app) {
// get list of current subscribers (i.e. membership list)
	
	// $auth
	//if ( FALSE == Auth::is_logged_in() ) {
	//	$response->redirect($app->URL_PATH.'/login');
	
	// *******************************************
	// determine the database to use
	
	// *******************************************
	require_once dirname(__FILE__).'/lib/ThisAmericanLab/Memberboat/SubscriptionController.php';
	
	$subscription_controller = new SubscriptionController();
	$subscription_controller->set_mysqli_db($app->db);
	
	// WORKING ON THIS !!!
	$viewmodel_list = $subscription_controller->getList();
	
	// check session
	$response->viewmodel_list = $viewmodel_list;
	
	$response->render('view/subscription_list_view.php');
});
// respond('GET', $URL_PATH.'/subscription/id/[n:id]', function ($request, $response, $app) {
// respond('GET', $URL_PATH.'/subscription/group/', function ($request, $response, $app) {

//*********************************************************************
// LOGIN

respond('GET', $URL_PATH.'/login', function ($request, $response, $app) {
	
	$response->redirect($app->URL_PATH .'/pricing');
});

dispatch();
