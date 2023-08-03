<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'SigninController::index');
$routes->get('/register', 'SignupController::index');
$routes->match(['get', 'post'], 'SignupController/store', 'SignupController::store');
$routes->match(['get', 'post'], 'SigninController/loginAuth', 'SigninController::loginAuth');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('churchmember', 'Churchmember::index');
$routes->get('addnewmember', 'Churchmember::addNew');
$routes->match(['get', 'post'], 'addMemberdataRequest', 'Churchmember::AjaxRequestData');
$routes->match(['get', 'post'], 'cell_leader_list', 'Churchmember::ajaxCellLeaderList');
$routes->get('SigninController/logout', 'SigninController::logout');
$routes->match(['get', 'post'], 'employee', 'Employee::index');
$routes->match(['get', 'post'], 'employee/upload_csv', 'Employee::upload_csv');
$routes->match(['get', 'post'], 'employee/get_employee', 'Employee::getEmployee');
$routes->match(['get', 'post'], 'employee/edit/(:num)', 'Employee::edit/$1');
$routes->match(['get', 'post'], 'employee/update_employee', 'Employee::update_employee_data');
$routes->get('time', 'Time::index');
$routes->match(['get', 'post'], 'time/timeinout', 'Time::getEmployeInOut');
$routes->match(['get', 'post'], 'time/upload_file', 'Time::upload_file');

$routes->get('participants', 'Users::index');
$routes->match(['get', 'post'], 'users/add_participant', 'Users::add_participant');
$routes->match(['get', 'post'], 'users/get_participant', 'Users::getParticipant');
$routes->match(['get', 'post'], 'participants/edit/(:num)', 'Users::edit/$1');
$routes->match(['get', 'post'], 'participants/update_participant', 'Users::update_participant');
$routes->match(['get', 'post'], 'participants/delete/(:num)', 'Users::delete_participant/$1');
$routes->match(['get', 'post'], 'participants/add_certificate', 'Users::add_certificate');


$routes->get('(:any)', 'Pages::view/$1');

// $routes->match(['get', 'post'], 'member_model', 'MemberModel::getAllCellLeader');

// $routes->get('dashboard', 'Dashboard::index');


$routes->options('(:any)', 'BaseController/options');

// $routes->get('/signin', '');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
