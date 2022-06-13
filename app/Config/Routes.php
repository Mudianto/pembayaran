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
$routes->get('/', 'Cytransaksi::index');


$routes->get('transaksi', 'Cytransaksi::index');
$routes->post('transaksicari', 'Cytransaksicari::index');
$routes->post('transaksicari/bayar', 'Cytransaksicari::bayar');


$routes->get('siswa', 'Cysiswa::index');
$routes->post('siswadetail', 'Cysiswadetail::index');

$routes->get('siswaaktif', 'Cysiswaaktif::index');
$routes->post('siswaaktifedit', 'Cysiswaaktifedit::index');
$routes->post('siswaaktifeditubah', 'Cysiswaaktifedit::ubah');

$routes->get('lembaga', 'Cylembaga::index');

$routes->get('jenistagihan', 'Cyjenistagihan::index');
$routes->post('jenistagihanedit', 'Cyjenistagihanedit::index');
$routes->post('jenistagihaneditubah', 'Cyjenistagihanedit::ubah');
$routes->post('jenistagihangenerate', 'Cyjenistagihangenerate::index');
$routes->get('jenistagihantambah', 'Cyjenistagihantambah::index');
$routes->post('jenistagihantambahsimpan', 'Cyjenistagihantambah::simpan');

$routes->get('cicilan', 'Cycicilan::index');
$routes->get('user', 'Cyuser::index');

$routes->get('r_tingkat', 'Cyr_tingkat::index');
$routes->get('r_ruang', 'Cyr_ruang::index');
$routes->get('r_status', 'Cyr_status::index');
$routes->get('r_kelompok', 'Cyr_kelompok::index');
$routes->get('r_madin', 'Cyr_madin::index');
$routes->get('r_kamar', 'Cyr_kamar::index');

$routes->get('nota/(:num)', 'Cynota::cetaknota/$1');

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