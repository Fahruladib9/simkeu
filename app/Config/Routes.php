<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// login
$routes->get('/login', 'Auth::index');
$routes->get('/logout', 'Auth::logout');
$routes->post('/proses-login', 'Auth::proses');

// super admin :
$routes->get('/', 'super_admin\Home::index');
// users
$routes->get('/users', 'super_admin\C_Users::index');
$routes->post('/users/tambah', 'super_admin\C_Users::tambah');
$routes->get('/users/edit/(:any)', 'super_admin\C_Users::edit/$1');
$routes->post('/users/update/(:any)', 'super_admin\C_Users::update/$1');
$routes->post('/users/delete/(:any)', 'super_admin\C_Users::delete/$1');

// Santri
$routes->get('/santri', 'super_admin\C_Santri::index');
$routes->post('/santri/tambah', 'super_admin\C_Santri::tambah');
$routes->get('/santri/edit/(:any)', 'super_admin\C_Santri::edit/$1');
$routes->post('/santri/update/(:any)', 'super_admin\C_Santri::update/$1');
$routes->post('/santri/delete/(:any)', 'super_admin\C_Santri::delete/$1');

// Donatur
$routes->get('/donatur', 'super_admin\C_Donatur::index');
$routes->post('/donatur/tambah', 'super_admin\C_Donatur::tambah');
$routes->get('/donatur/edit/(:any)', 'super_admin\C_Donatur::edit/$1');
$routes->post('/donatur/update/(:any)', 'super_admin\C_Donatur::update/$1');
$routes->post('/donatur/delete/(:any)', 'super_admin\C_Donatur::delete/$1');

// Kelas
$routes->get('/kelas', 'super_admin\C_Kelas::index');
$routes->post('/kelas/tambah', 'super_admin\C_Kelas::tambah');
$routes->get('/kelas/edit/(:any)', 'super_admin\C_Kelas::edit/$1');
$routes->post('/kelas/update/(:any)', 'super_admin\C_Kelas::update/$1');
$routes->post('/kelas/delete/(:any)', 'super_admin\C_Kelas::delete/$1');

// keuangan masuk spp
$routes->get('/spp', 'super_admin\keuangan_masuk\C_Spp::index');
$routes->post('/spp/tambah', 'super_admin\keuangan_masuk\C_Spp::tambah');
$routes->get('/spp/edit/(:any)', 'super_admin\keuangan_masuk\C_Spp::edit/$1');
$routes->post('/spp/update/(:any)', 'super_admin\keuangan_masuk\C_Spp::update/$1');
$routes->post('/spp/delete/(:any)', 'super_admin\keuangan_masuk\C_Spp::delete/$1');
$routes->get('/spp/show/(:any)', 'super_admin\keuangan_masuk\C_Spp::show/$1');

// keuangan masuk donatur
$routes->get('/masuk/donatur', 'super_admin\keuangan_masuk\C_Donatur::index');
$routes->post('/masuk/donatur/tambah', 'super_admin\keuangan_masuk\C_Donatur::tambah');
$routes->get('/masuk/donatur/edit/(:any)', 'super_admin\keuangan_masuk\C_Donatur::edit/$1');
$routes->post('/masuk/donatur/update/(:any)', 'super_admin\keuangan_masuk\C_Donatur::update/$1');
$routes->post('/masuk/donatur/delete/(:any)', 'super_admin\keuangan_masuk\C_Donatur::delete/$1');

// keuangan masuk koperasi
$routes->get('/masuk/koperasi', 'super_admin\keuangan_masuk\C_Koperasi::index');
$routes->post('/masuk/koperasi/tambah', 'super_admin\keuangan_masuk\C_Koperasi::tambah');
$routes->get('/masuk/koperasi/edit/(:any)', 'super_admin\keuangan_masuk\C_Koperasi::edit/$1');
$routes->post('/masuk/koperasi/update/(:any)', 'super_admin\keuangan_masuk\C_Koperasi::update/$1');
$routes->post('/masuk/koperasi/delete/(:any)', 'super_admin\keuangan_masuk\C_Koperasi::delete/$1');

// keuangan masuk barber
$routes->get('/masuk/barber', 'super_admin\keuangan_masuk\C_Barber::index');
$routes->post('/masuk/barber/tambah', 'super_admin\keuangan_masuk\C_Barber::tambah');
$routes->get('/masuk/barber/edit/(:any)', 'super_admin\keuangan_masuk\C_Barber::edit/$1');
$routes->post('/masuk/barber/update/(:any)', 'super_admin\keuangan_masuk\C_Barber::update/$1');
$routes->post('/masuk/barber/delete/(:any)', 'super_admin\keuangan_masuk\C_Barber::delete/$1');

// keuangan keluar
$routes->get('/keluar', 'super_admin\keuangan_keluar\C_Keluar::index');
$routes->post('/keluar/tambah', 'super_admin\keuangan_keluar\C_Keluar::tambah');
$routes->get('/keluar/edit/(:any)', 'super_admin\keuangan_keluar\C_Keluar::edit/$1');
$routes->post('/keluar/update/(:any)', 'super_admin\keuangan_keluar\C_Keluar::update/$1');
$routes->post('/keluar/delete/(:any)', 'super_admin\keuangan_keluar\C_Keluar::delete/$1');

// laporan spp
$routes->get('/laporan/spp', 'super_admin\laporan\C_LaporanSpp::index');
$routes->post('/laporan/spp/cetak', 'super_admin\laporan\C_LaporanSpp::cetak');

// laporan donatur
$routes->get('/laporan/donatur', 'super_admin\laporan\C_LaporanDonatur::index');
$routes->post('/laporan/donatur/cetak', 'super_admin\laporan\C_LaporanDonatur::cetak');

// laporan koperasi
$routes->get('/laporan/koperasi', 'super_admin\laporan\C_LaporanKoperasi::index');
$routes->post('/laporan/koperasi/cetak', 'super_admin\laporan\C_LaporanKoperasi::cetak');

// laporan barber
$routes->get('/laporan/barber', 'super_admin\laporan\C_LaporanBarber::index');
$routes->post('/laporan/barber/cetak', 'super_admin\laporan\C_LaporanBarber::cetak');

// Admin :
$routes->get('/admin', 'admin\Home::index');

// spp masuk
$routes->get('/admin/masuk/spp', 'admin\keuangan_masuk\C_Spp::index');
$routes->post('/admin/masuk/spp', 'admin\keuangan_masuk\C_Spp::tambah');
$routes->get('/admin/masuk/spp/edit/(:any)', 'admin\keuangan_masuk\C_Spp::edit/$1');
$routes->post('/admin/masuk/spp/update/(:any)', 'admin\keuangan_masuk\C_Spp::update/$1');
$routes->post('/admin/masuk/spp/delete/(:any)', 'admin\keuangan_masuk\C_Spp::delete/$1');

// donatur masuk
$routes->get('/admin/masuk/donatur', 'admin\keuangan_masuk\C_Donatur::index');
$routes->post('/admin/masuk/donatur/tambah', 'admin\keuangan_masuk\C_Donatur::tambah');
$routes->get('/admin/masuk/donatur/edit/(:any)', 'admin\keuangan_masuk\C_Donatur::edit/$1');
$routes->post('/admin/masuk/donatur/update/(:any)', 'admin\keuangan_masuk\C_Donatur::update/$1');
$routes->post('/admin/masuk/donatur/delete/(:any)', 'admin\keuangan_masuk\C_Donatur::delete/$1');

// donatur masuk
$routes->get('/admin/masuk/koperasi', 'admin\keuangan_masuk\C_Koperasi::index');
$routes->post('/admin/masuk/koperasi/tambah', 'admin\keuangan_masuk\C_Koperasi::tambah');
$routes->get('/admin/masuk/koperasi/edit/(:any)', 'admin\keuangan_masuk\C_Koperasi::edit/$1');
$routes->post('/admin/masuk/koperasi/update/(:any)', 'admin\keuangan_masuk\C_Koperasi::update/$1');
$routes->post('/admin/masuk/koperasi/delete/(:any)', 'admin\keuangan_masuk\C_Koperasi::delete/$1');

// donatur masuk
$routes->get('/admin/masuk/barber', 'admin\keuangan_masuk\C_Barber::index');
$routes->post('/admin/masuk/barber/tambah', 'admin\keuangan_masuk\C_Barber::tambah');
$routes->get('/admin/masuk/barber/edit/(:any)', 'admin\keuangan_masuk\C_Barber::edit/$1');
$routes->post('/admin/masuk/barber/update/(:any)', 'admin\keuangan_masuk\C_Barber::update/$1');
$routes->post('/admin/masuk/barber/delete/(:any)', 'admin\keuangan_masuk\C_Barber::delete/$1');

// keuangan keluar
$routes->get('/admin/keluar', 'admin\keuangan_keluar\C_Keluar::index');
$routes->post('/admin/keluar/tambah', 'admin\keuangan_keluar\C_Keluar::tambah');
$routes->get('/admin/keluar/edit/(:any)', 'admin\keuangan_keluar\C_Keluar::edit/$1');
$routes->post('/admin/keluar/update/(:any)', 'admin\keuangan_keluar\C_Keluar::update/$1');
$routes->post('/admin/keluar/delete/(:any)', 'admin\keuangan_keluar\C_Keluar::delete/$1');

// Kepala Pondok :
$routes->get('/kepala', 'kepala_pondok\Home::index');
//user :
$routes->get('/kepala/users', 'kepala_pondok\C_k_users::index');

//santri :
$routes->get('/kepala/santri', 'kepala_pondok\C_k_santri::index');

//donatur:
$routes->get('/kepala/donatur', 'kepala_pondok\C_k_donatur::index');

//kelas:
$routes->get('/kepala/kelas', 'kepala_pondok\C_k_kelas::index');

//keuangan_masuk spp:
$routes->get('/kepala/masuk/spp', 'kepala_pondok\keuangan_masuk\C_k_spp::index');

// keuangan masuk donatur
$routes->get('/kepala/masuk/donatur', 'kepala_pondok\keuangan_masuk\C_k_donatur::index');

// keuangan masuk koperasi
$routes->get('/kepala/masuk/koperasi', 'kepala_pondok\keuangan_masuk\C_k_koperasi::index');

//keuangan masuk barber
$routes->get('/kepala/masuk/barber', 'kepala_pondok\keuangan_masuk\C_k_barber::index');

// keuangan keluar
$routes->get('/kepala/keluar', 'kepala_pondok\keuangan_keluar\C_k_keluar::index');

// laporan spp
$routes->get('/kepala/laporan/spp', function () {
    return view('kepala_pondok/laporan/spp/laporan_spp');
});
$routes->post('/laporan/spp/cetak', 'super_admin\laporan\C_LaporanSpp::cetak');

// laporan donatur
$routes->get('/kepala/laporan/donatur', function () {
    return view('kepala_pondok/laporan/donatur/laporan_donatur');
});
$routes->post('/laporan/donatur/cetak', 'super_admin\laporan\C_LaporanDonatur::cetak');

// laporan koperasi
$routes->get('/kepala/laporan/koperasi', function () {
    return view('kepala_pondok/laporan/koperasi/laporan_koperasi');
});
$routes->post('/laporan/koperasi/cetak', 'super_admin\laporan\C_LaporanKoperasi::cetak');

// laporan barber
$routes->get('/kepala/laporan/barber', function () {
    return view('kepala_pondok/laporan/barber/laporan_barber');
});
$routes->post('/laporan/barber/cetak', 'super_admin\laporan\C_LaporanBarber::cetak');
