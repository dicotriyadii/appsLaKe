<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Page
$route['default_controller'] = 'Clogin';
$route['login']              = 'Clogin';
$route['dashboard']          = 'CPage';
$route['formInput']          = 'CPage/formInput';

// Proses 
$route['prosesLogin']           = 'Clogin/prosesLogin';
$route['LogOut']                = 'Clogin/prosesLogOut';
$route['simpanData']            = 'CSimpan/prosesSimpan';
$route['cetakPdf']              = 'CSimpan/cetakPdf';
$route['delete/delete/(:any)']  = 'CSimpan/delete/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
