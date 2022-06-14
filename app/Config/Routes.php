<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/user/list/search','Profile::searchUser');
$routes->get('user/listdata','Profile::userList');
$routes->get('/', 'Home::index',['filter' => 'authGuard']);
$routes->get('/userlist','Profile::index');
$routes->post('/addnewuser','Profile::addUser');
$routes->get('/home','Home::home');
$routes->get('/lang/{locale}', 'Language::index');
$routes->get('/homepage', 'Home::home');
$routes->get('/loginpage','Login::index');
$routes->post('/login','Login::login');
$routes->get('/logout','Login::logout');
$routes->get('/course','Course::index');
$routes->get('course/courselist','Course::courselist');

$routes->get('/position','Position::index');
$routes->get('position/positionlist','Position::positionlist');
$routes->get('position/searchposition','Position::searchposition');
$routes->get('createuser','Profile::createUser');
$routes->get('position/createposition','Position::createposition');
$routes->post('position/addposition','Position::addposition');
$routes->post('position/editposition','Position::editposition');
$routes->post('position/deleteposition','Position::deleteposition');
$routes->get('position/export','Position::export');

$routes->get('user/edit/(:alphanum)','Profile::updateUser/$1');
$routes->post('user/update/(:alphanum)','Profile::editUser/$1');
$routes->post('user/delete/(:alphanum)','Profile::editUser/$1');

$routes->get('/Department','Department::index');
$routes->get('Department/Departmentlist','Department::Departmentlist');
$routes->get('Department/searchDepartment','Department::searchDepartment');
$routes->get('Department/createDepartment','Department::createDepartment');
$routes->post('Department/addDepartment','Department::addDepartment');
$routes->post('Department/editDepartment','Department::editDepartment');
$routes->post('Department/deleteDepartment','Department::deleteDepartment');

$routes->get('course/searchcourse','Course::searchcourse');
$routes->get('course/createcourse','Course::createcourse');
$routes->get('course/editcourse/(:alphanum)','Course::editcourse');
$routes->get('course/updatecourse/(:alphanum)','Course::updatecourse');
$routes->get('course/deletecourse/(:alphanum)','Course::deletecourse');
$routes->get('course/paticipant/(:alphanum)','Course::paticipant');
$routes->get('course/paticipantlist/(:alphanum)','Course::paticipantlist');
$routes->get('course/deletepaticipant/(:alphanum)','Course::deletepaticipant');
$routes->get('course/addpaticipant/(:alphanum)','Course::addpaticipant');
$routes->get('course/uploadfilexls/(:alphanum)','Course::uploadfilexls');

$routes->get('/position','Department::index');
$routes->get('/equipment','Equipment::index');
$routes->get('/searchequipment','Equipment::searchequipment');
$routes->get('/registerEquipment','Equipment::registerEquipment');
$routes->get('Equipment/addequipment','Equipment::addequipment');
$routes->get('Equipment/editEquipment/(:alphanum)','Equipment::editEquipment');
$routes->get('Equipment/updateequipment/(:alphanum)','Equipment::updateequipment');
$routes->get('Equipment/deleteequipment/(:alphanum)','Equipment::deleteequipment');
$routes->get('Equipment/getemployee','Equipment::getemployee');

$routes->get('/config','Config::index');
$routes->get('config/configlist','Config::configlist');
$routes->get('config/searchconfig','Config::searchconfig');
$routes->get('config/createconfig','Config::createconfig');
$routes->post('config/addconfig','Config::addconfig');
$routes->post('config/editconfig','Config::editconfig');
$routes->post('config/deleteconfig','Config::deleteconfig');
$routes->get('config/export','Config::export');
$routes->get('config/gettype','Config::gettype');

$routes->get('homepage/getlistconfig','Home::getlistconfig');
$routes->get('homepage/updatechart/(:alphanum)','Home::updatechart/$1');

$routes->get('manager',"Manager::index");
$routes->post('manager/getuser','Manager::searchUser');
$routes->post('manager/getuser/(:alphanum)','Manager::searchUser');
$routes->get('manager/(:alphanum)',"Manager::getUser2/$1");
$routes->post('manager/addEquip','Manager::addEquip');
$routes->post('manager/reomveEquip','Manager::reomveEquip');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
