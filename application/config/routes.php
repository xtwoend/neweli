<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "pages";
$route['404_override'] = '';

// All re-mappings must begin with '^(en|et|ru)' !!!

$route['admin(/.*)?'] = 'admin$1';
$route['auth(/.*)?'] = 'auth$1';
//test routers
$route['test(/.*)?'] = 'test$1';

//Frontend routers
$route['email(/.*)?'] = 'email$1';

$route['news(/.*)?'] = 'news$1';
$route['^(en|id)/news(/.*)?'] = 'news$2';

$route['what-they-say(/.*)?'] = 'blogs$1';
$route['^(en|id)/what-they-say(/.*)?'] = 'blogs$2';

$route['registers(/.*)?'] = 'registers$1';
$route['^(en|id)/registers(/.*)?'] = 'registers$2';

$route['questions(/.*)?'] = 'questions$1';
$route['^(en|id)/questions(/.*)?'] = 'questions$2';

$route['programs(/.*)?'] = 'programs$1';
$route['^(en|id)/programs(/.*)?'] = 'programs$2';

//CMS routers
$route['^(en|id)/(.+)$'] = "$2";
//$route['^(en|id)$'] = $route['default_controller'];
$route['(.*)'] = $route['default_controller'].'/index/$1';
$route['^(en|id)/(.+)$'] = $route['default_controller'].'/index/$2';


/* End of file routes.php */
/* Location: ./application/config/routes.php */