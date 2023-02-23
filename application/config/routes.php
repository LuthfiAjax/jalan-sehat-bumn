<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['undian'] = 'Welcome/undian';
$route['daftar/peserta'] = 'Welcome/daftar';
$route['bukti-daftar/(:any)'] = 'Welcome/bukti_daftar/$1';


$route['generate-barcode/(:any)'] = 'GenerateBarcode/generateBarcode/$1';

// cms
$route['cms/dashboard'] = 'Cms/dashboard';
$route['cms/all-peserta'] = 'Cms/all_peserta';
$route['cms/peserta-hadir'] = 'Cms/peserta_hadir';
$route['cms/undian'] = 'Cms/undian';
$route['verifikasi-peserta/(:any)'] = 'Cms/verifikasi_peserta/$1';


// login
$route['portal/login'] = 'Login/index';
$route['portal/registration'] = 'Login/registration';
$route['portal/logout'] = 'Login/logout';
