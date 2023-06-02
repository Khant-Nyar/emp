<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('welcome',function(){
// 	return view('home');
// });
Route::get('/', function () {
    return view('Admin.contact.dashboard');
});
//for country
Route::get('/country', 'CountryController@index');
Route::post('/add_country','CountryController@store');
Route::get('edit_country/{id}','CountryController@edit');
Route::post('/update_country/{id}','CountryController@update');
Route::get('/delete_country/{id}','CountryController@destroy');

//for relationship
Route::get('/relationship','RelationshipController@index');
Route::post('/add_relationship','RelationshipController@store');
Route::get('/edit_relationship/{id}','RelationshipController@edit');
Route::post('/update_relationship/{id}','RelationshipController@update');
Route::get('/delete_relationship/{id}','RelationshipController@destroy');

//for company
Route::get('/create_company','CompanyController@create');
Route::post('/add_company','CompanyController@store');
Route::get('/view_company','CompanyController@index');
Route::get('/edit_company/{id}','CompanyController@edit');
Route::post('/update_company/{id}','CompanyController@update');
Route::get('/delete_company/{id}','CompanyController@destroy');

//Employee
Route::get('/view_employee','EmployeeController@index');
Route::post('/add_employee','EmployeeController@store');
Route::get('/edit_employee/{id}','EmployeeController@edit');
Route::post('/edit_employee/{id}','EmployeeController@update');
Route::get('/delete_employee/{id}','EmployeeController@destroy');

//Dependent
Route::get('/view_dependent','DependentController@index');
Route::post('/add_dependent','DependentController@store');
Route::get('/edit_dependent/{id}','DependentController@edit');
Route::post('/edit_dependent/{id}','DependentController@update');
Route::get('/delete_dependent/{id}','DependentController@destroy');

//User
Route::get('/view_user','UserController@index');
Route::post('/add_user','UserController@store');
Route::get('/edit_user/{id}','UserController@edit');
Route::post('/edit_user/{id}','UserController@update');
Route::get('/delete_user/{id}','UserController@destroy');

// Route::get('/getdatabase', '';
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Position
// Route::resource('position', 'PositionController');
Route::get('/view_position', 'PositionController@index');
Route::post('/add_position', 'PositionController@store');
Route::get('/edit_position/{id}', 'PositionController@edit');
Route::post('/edit_position/{id}', 'PositionController@update');
Route::get('/delete_position/{id}','PositionController@destroy');

//StayPermits
Route::get('employee_approve','StaypermitController@employee_approve');
Route::get('edit_employee_approve/{id}','StaypermitController@employee_approve_edit');
Route::post('edit_employee_approve/{id}','StaypermitController@employee_approve_update');

//search Controller
Route::get('company_search','SearchController@company_search');
Route::post('company_search','SearchController@company_search');

Route::get('employee_search','SearchController@employee_search');
Route::post('employee_search','SearchController@employee_view');

Route::get('country_search','SearchController@country_search');
Route::post('country_search','SearchController@country_search');

Route::get('bod_search','SearchController@bod_search');
Route::post('bod_view','SearchController@bod_view');
Route::get('bod_detail/{id}','SearchController@bod_detail');
//From Date Search
Route::get('fromdate_search','SearchController@fromdate_search');
Route::post('fromdate_search','SearchController@fromdate_view');
//Depend Search
Route::get('depend_search','SearchController@depend_search');
Route::post('depend_search','SearchController@depend_view');
Route::get('depend_detail/{id}','SearchController@depend_detail');





Route::get('permit_resign/{id}','SearchController@resigner');
//testing
use App\Role;
use Illuminate\Support\Facades\Auth;
Route::get('getrole',function(){
	$role_id = Auth::user()->role;
	$role = Role::where('id',$role_id)->get('role_name');
	foreach($role as $rolename){
		return $rolename->role_name;
	}
});
Route::get('tester','tester@index');
//END TESTING