<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//==================BACKEND===================================================================
//==================contoh====================================================================
//$route['produk'] = 'ProdukController';
//$route['produk/create'] = 'ProdukController/create';
//$route['produk/edit/(:any)'] = 'ProdukController/edit/$1';
//$route['produk/delete/(:any)'] = 'ProdukController/delete/$1';
//url = controller...

$route['dashboard'] = 'Dashboard';
//=================DETAIL PRODUK=================================================================
$route['dashboard/produk'] = 'Dashboard/produk';
//=================DETAIL ID PRODUK==============================================================
//TIDAK DI PAKE KARENA DATA KOLOM SUDAH TAMPIL SEMUAH DI TABLE
//$route['dashboard/produk/(:any)'] = 'Dashboard/produk/$1';
//=================CREATE PRODUK================================================================
//TIDAK DI PAKE KARENA MENGGUNAKAN MODAL INPUT
//$route['dashboard/produk_create'] = 'Dashboard/produk_create';
//=================UPDATE PRODUK=================================================================
//TIDAK DI PAKE KARENA MENGGUNAKAN MODAL INPUT
//$route['dashboard/produk_edit/(:any)'] = 'Dashboard/produk_edit/$1';
//=================DELETE PRODUK==============================================================
//TIDAK DI PAKE KARENA MENGGUNAKAN MODAL INPUT
//$route['dashboard/produk_delete/(:any)'] = 'Dashboard/produk_delete/$1';

//=================GET KATEGORI===============================================================
$route['dashboard/kategori'] = 'Dashboard/kategori';
//=================GET ID KATEGORI============================================================
//TIDAK DI PAKE KARENA MENGGUNAKAN MODAL INPUT
//$route['dashboard/kategori/(:any)'] = 'Dashboard/kategori/$1';
//=================POST KATEGORI==============================================================
//TIDAK DI PAKE KARENA MENGGUNAKAN MODAL INPUT
//$route['dashboard/kategori_create'] = 'Dashboard/kategori_create';
//=================PUT KATEGORI===============================================================
//TIDAK DI PAKE KARENA MENGGUNAKAN MODAL INPUT
//$route['dashboard/kategori_edit/(:any)'] = 'Dashboard/kategori_edit/$1';
//=================DELETE KATEGORI============================================================
//TIDAK DI PAKE KARENA MENGGUNAKAN MODAL INPUT
//$route['dashboard/kategori_delete/(:any)'] = 'Dashboard/kategori_delete/$1';

//==================FRONTEND==================================================================
$route['home'] = 'Home';
$route['shop'] = 'Home/shop';
$route['shop/(:num)'] = 'Home/shop/$1';
// application/config/routes.php

//$route['kategori'] = 'Home/kategori';
//$route['about'] = 'Home/about';
//$route['kontak'] = 'Home/kontak';