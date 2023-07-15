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
$routes->setDefaultController('Quiz');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Quiz::index');
$routes->get('logout', 'Quiz::index/1');
$routes->match(['get', 'put','post'],'showHomePage','Quiz::showPage');
// $routes->match(['get', 'put','post'],'showTestPage','Quiz::showPage/1');
$routes->match(['get', 'put','post'],'showQuestionList','Quiz::showPage/2');
$routes->match(['get', 'put','post'],'showQuizList','Quiz::showPage/3');

$routes->post('chkLogin', 'Quiz::chkLogin');



//$routes->Post('getqid', 'Quiz::getqid');

$routes->post('saveQuiz','QuizList::saveQuiz');
$routes->post('getQuizList','QuizList::getQuizList');
$routes->post('delQuiz','QuizList::delQuiz');
$routes->post('editQuiz','QuizList::editQuiz');
$routes->post('getTopicList','QuizList::getTopicList');

$routes->post('saveQuestion','QuestionList::saveQuestion');
$routes->post('getQuestionList','QuestionList::getQuestionList');
$routes->post('delQuestion','QuestionList::delQuestion');
$routes->post('editQuestion','QuestionList::editQuestion');
$routes->post('getTest','QuestionList::getTest');


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
