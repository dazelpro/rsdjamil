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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'dashboard';

// Login
$route['login'] = 'authorization';

// Master
$route['master/room']                           = 'master/pageRoom';
$route['master/insert-room']                    = 'master/insertRoom';
$route['master/update-room']                    = 'master/editRoom';
$route['master/delete-room']                    = 'master/deleteRoom';

$route['master/film-size']                      = 'master/pageFilmSize';
$route['master/insert-film-size']               = 'master/insertFilmSize';
$route['master/update-film-size']               = 'master/editFilmSize';
$route['master/delete-film-size']               = 'master/deleteFilmSize';

// Patient
$route['patient']                               = 'patient/pagePatient';
$route['patient/new']                           = 'patient/pageInsertPatient';
$route['patient/edit/(:any)']                   = 'patient/pageEditPatient/$1';
$route['patient/detail/(:any)']                 = 'patient/pageDetailPatient/$1';
$route['patient/insert-patient']                = 'patient/insertPatient';
$route['patient/update-patient']                = 'patient/updatePatient';
$route['patient/delete-patient']                = 'patient/deletePatient';

// Hendling
$route['handling']                              = 'handling/pageHandling';
$route['handling/insert-handling']              = 'handling/insertHandling';
$route['handling/update-handling']              = 'handling/editHandling';
$route['handling/delete-handling']              = 'handling/deleteHandling';

$route['handling/radiology']                    = 'handling/pageRadiology';
$route['handling/radiology/new']                = 'handling/pageInsertRadiology';
$route['handling/radiology/edit/(:any)']        = 'handling/pageEditRadiology/$1';
$route['handling/radiology/detail/(:any)']      = 'handling/pageDetailRadiology/$1';
$route['handling/radiology/insert-radiology']   = 'handling/insertRadiology';
$route['handling/radiology/update-radiology']   = 'handling/updateRadiology';
$route['handling/radiology/delete-radiology']   = 'handling/deleteRadiology';

$route['handling/radiology-reading']                    = 'handling/pageReading';
$route['handling/radiology-reading/input/(:any)']       = 'handling/pageInputReading/$1';
$route['handling/radiology-reading/edit/(:any)']        = 'handling/pageEditReading/$1';
$route['handling/radiology-reading/preview/(:any)']     = 'handling/pagePreviewReading/$1';
$route['handling/radiology-reading/insert-reading']     = 'handling/insertReading';
$route['handling/radiology-reading/update-reading']     = 'handling/updateReading';
$route['handling/radiology-reading/delete-reading']     = 'handling/deleteReading';

// Account
$route['account/admin']                         = 'account/pageAdmin';
$route['account/insert-admin']                  = 'account/insertAdmin';
$route['account/update-admin']                  = 'account/editAdmin';
$route['account/reset-pass-admin']              = 'account/resetPasswordAdmin';
$route['account/delete-admin']                  = 'account/deleteAdmin';

$route['account/doctor']                        = 'account/pageDoctor';
$route['account/insert-doctor']                 = 'account/insertDoctor';
$route['account/update-doctor']                 = 'account/editDoctor';
$route['account/reset-pass-doctor']             = 'account/resetPasswordDoctor';
$route['account/delete-doctor']                 = 'account/deleteDoctor';

$route['account/radiology-doctor']              = 'account/pageRadiologyDoctor';
$route['account/insert-radiology-doctor']       = 'account/insertRadiologyDoctor';
$route['account/update-radiology-doctor']       = 'account/editRadiologyDoctor';
$route['account/reset-pass-radiology-doctor']   = 'account/resetPasswordRadiologyDoctor';
$route['account/delete-radiology-doctor']       = 'account/deleteRadiologyDoctor';

// Report
$route['report/service-radiographer']           = 'report/pageServiceRadiographer';
$route['report/service-radiographer-print']     = 'report/printServiceRadiographer';
$route['report/service-doctor']                 = 'report/pageDoctorRadiology';
$route['report/service-doctor-print']           = 'report/printDoctorRadiology';
$route['report/handling']                       = 'report/pageHandling';
$route['report/handling-print']                 = 'report/printHandling';
$route['report/film-use']                       = 'report/pageFilm';
$route['report/film-use-print']                 = 'report/printFilm';
// $route['report/stock']                          = 'report/pageStock';
// $route['report/stock-print']                    = 'report/printStock';
$route['report/room']                           = 'report/pageRoom';
$route['report/room-print']                     = 'report/printRoom';

$route['report/income']                         = 'report/pageIncome';
$route['report/income/film']                    = 'report/printIncomeFilm';
$route['report/income/handling']                = 'report/printIncomeHandling';
$route['report/income/room']                    = 'report/printIncomeRoom';
$route['report/preview-print/(:any)']           = 'report/printPreview/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
