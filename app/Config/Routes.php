<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/predict', 'AiController::prediksi');
$routes->get('/getpredict', 'AiController::prediksi');
$routes->post('/predict-home', 'AiController::prediksi');
$routes->get('/admin', 'AdminController::index');
$routes->get('/admin/proses-klasifikasi', 'AdminController::prosesKlasifikasi');
$routes->get('/admin/proses-klasifikasi/edit', 'AdminController::prosesEditKlasifikasi');
$routes->post('/admin/proses-klasifikasi/update', 'AdminController::prosesUpdateKlasifikasi');
$routes->get('/admin/proses-klasifikasi/delete', 'AdminController::prosesDeleteKlasifikasi');
$routes->get('/admin/ajax-klasifikasi', 'AdminController::ajaxKlasifikasi');
$routes->get('/admin/get-klasifikasi', 'AdminController::getDataKlasifikasi');
$routes->get('/admin/pertumbuhan-balita', 'AdminController::pertumbuhanBalita');
$routes->get('/admin/data-balita', 'AdminController::dataBalita');
$routes->get('/admin/sdidtk', 'AdminController::sdidtk');


$routes->get('/admin/kms', 'AdminController::kms');
$routes->get('/admin/lihat-kms', 'AdminController::kms_online');


$routes->get('/admin/tambah-data-bayi', 'AdminController::formBayi');
$routes->get('/admin/edit-data-bayi/(:num)', 'AdminController::formBayi/$1');

$routes->get('/admin/hapus-data-bayi/(:num)', 'AdminController::deleteBayi/$1');

$routes->post('/print', 'AdminController::print');

// proses admin
$routes->post('/admin/proses-tambah-bayi', 'AdminController::prosesTambahBayi');
$routes->post('/admin/proses-edit-bayi/', 'AdminController::prosesEditBayi');

$routes->post('/data-bayi', 'AdminController::getOneDataBayiByKodeBayi');

// data ibu
$routes->get('/admin/data-ibu', 'AdminController::dataIbu');
$routes->get('/admin/edit-ibu', 'AdminController::editIbu');
$routes->post('/admin/update-ibu', 'AdminController::updateIbu');

// delete data ibu
$routes->get('/admin/hapus-data-ibu/(:num)', 'AdminController::deleteIbu/$1');

// auth
$routes->get('/login', 'Home::login');
$routes->get('/register', 'Home::register');
$routes->get('/logout', 'Home::logout');
// proses auth
$routes->post('/proses-register', 'UserController::prosesRegister');
$routes->post('/proses-login', 'UserController::prosesLogin');


// user routes
$routes->get('/user/dashboard', 'Home::dashboard');
$routes->get('/user/kms-online', 'Home::kms_online');

// forbidden
$routes->get('/forbidden', 'Home::forbidden');



// ?testing
$routes->get('/user', 'UserController::index');

// api
$routes->post('/api/tambah-data', 'AdminController::apiTambahDataBayi');

// testing
$routes->get('/testing', 'TestingController::index');
$routes->post('/testing/prediksi', 'AiController::prediksi');


$routes->get('/testingai', 'NaiveBayesClassifier::doPredict');
