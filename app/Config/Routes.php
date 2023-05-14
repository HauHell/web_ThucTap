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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/admin', 'Admin\DashBoards::index');
//routes user
$routes->get('/admin/user', 'Admin\User::listUser');
$routes->post('/admin/user/deleteUser', 'Admin\User::delete');
$routes->post('/admin/user/addUser', 'Admin\User::add');
$routes->post('/admin/user/editUser','Admin\User::edit');
//routes product
$routes->get('/admin/product', 'Admin\Product::listProduct');
$routes->post('/admin/product/addProduct', 'Admin\Product::add');
$routes->post('/admin/product/editProduct','Admin\Product::edit');
$routes->post('/admin/product/deleteProduct', 'Admin\Product::delete');
//routes category
$routes->get('/admin/category', 'Admin\Category::listCategory');
$routes->post('/admin/category/addCategory', 'Admin\Category::add');
$routes->post('/admin/category/editCategory','Admin\Category::edit');
$routes->post('/admin/category/deleteCategory', 'Admin\Category::delete');
//order
$routes->get('/admin/order', 'Admin\Order::listOrder');
$routes->post('/admin/order/deleteorder', 'Admin\Order::delete');
$routes->post('/admin/order/editorder', 'Admin\Order::edit');
$routes->post('/admin/order/getorder', 'Admin\Order::getorder');
$routes->get('/admin/order/print', 'Admin\Order::export');
//customer account
$routes->get('/admin/customeraccount', 'Admin\Customer::listCustomer');
$routes->post('admin/customer/addcustomeraccount', 'Admin\Customer::add');
$routes->post('admin/customer/editcustomeraccount', 'Admin\Customer::edit');
$routes->post('admin/customer/deletecustomeraccount', 'Admin\Customer::delete');
//routes login
$routes->get('/admin/login', 'Admin\User::loginPage');
$routes->post('/admin/loginAction', 'Admin\User::loginAction');


//routes client
$routes->get('helloworld', '\App\Controllers\HelloWorld::getIndex');
$routes->get('/', 'Home::index');
$routes->get('/shop', 'Home::listshop');
$routes->get('/checkout', 'Home::checkout');
$routes->get('/contact', 'Home::contact');
$routes->get('/lookup', 'Home::lookup');
$routes->get('/productdetail', 'Home::productdetail');
$routes->get('/updateproduct', 'Home::updateproduct');
$routes->post('/addcart', 'Home::addcart');
$routes->get('/removecart', 'Home::remove');
$routes->post('/updatecart', 'Home::update');
$routes->post('/productdetail/update_quantity', 'Home::CheckQuantity');
$routes->get('/login', 'Home::login');
$routes->post('/login/checklogin', 'Home::loginAction');
$routes->get('/logout', 'Home::logout');
$routes->get('/register', 'Home::register');
$routes->post('/regsiter/checkregsiter', 'Home::registerAction');

$routes->post('/search', 'Home::Search');
$routes->get('/search', 'Home::Search');


//routers place order
$routes->post('/createorder', 'Home::placeorder');
$routes->get('/placeorder', 'Home::placeorderdetail');
$routes->post('/lookuporder', 'Home::lookuporder');

// profile
$routes->get('/profile', 'Home::profile');
$routes->post('/updateprofile', 'Home::updateprofile');
$routes->post('/changepassword', 'Home::changepassword');





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
