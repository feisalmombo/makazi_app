<?php

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

// Route::get('/', function () {
//     if (\Auth::user()) {
//         return redirect()->back();
//     }
//     return view('welcome');
//     });


	Route::get('/', function () {
		
		return view('auth.login');
		});

// Auth::routes();
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'Auth\LoginController@login');
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Authentication Routes...
Route::get('login', [
	'as' => 'login',
	'uses' => 'Auth\LoginController@showLoginForm'
  ]);
  Route::post('login', [
	'as' => '',
	'uses' => 'Auth\LoginController@login'
  ]);
  Route::post('logout', [
	'as' => 'logout',
	'uses' => 'Auth\LoginController@logout'
  ]);
  
  // Password Reset Routes...
  Route::post('password/email', [
	'as' => 'password.email',
	'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
  ]);
  Route::get('password/reset', [
	'as' => 'password.request',
	'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
  ]);
  Route::post('password/reset', [
	'as' => 'password.update',
	'uses' => 'Auth\ResetPasswordController@reset'
  ]);
  Route::get('password/reset/{token}', [
	'as' => 'password.reset',
	'uses' => 'Auth\ResetPasswordController@showResetForm'
  ]);

Route::resource('/user/auth/registration_user', 'RegistrationsController');
Route::get('/user/auth/registration_user', 'RegistrationsController@registerUser');
Route::post('/user/auth/registration_user', 'RegistrationsController@store');

// Route::get('/user/auth/registration_user', 'RegistrationsController@edit');

Route::get('/applicant/customer/profile', 'RegistrationsController@userProfile');
Route::get('/applicantion/user/profile', 'RegistrationsController@systemUserProfileInformation');


Route::get('/user/auth/registration_user/all/district/list','RegistrationsController@getAllDistrictList');
Route::get('/user/auth/registration_user/all/ward/list','RegistrationsController@getAllWardList');


Route::resource('/dropdownlist','DropdownController');
Route::get('/dropdownlist','DropdownController@index');
Route::get('/all/district/list','DropdownController@getAllDistrictList');
Route::get('/all/ward/list','DropdownController@getAllWardList');


Route::get('/change_password',function(){
	return view('auth.passwords.new_user_change_pwd');
});
Route::post('/change_password','ChangePasswordController@updateNewuser');
Route::group(['middleware'=>'CheckUserStatus'],function(){

	Route::group(['middleware' => 'ValidateButtonHistory'], function() {


		Route::group(['middleware' => 'auth'], function(){
			Route::get('/home', 'HomeController@index')->name('home');

			// Route::resource('/incidents', 'HelpDeskController');
			// Route::post('/search-incidents', 'HelpDeskController@search_by_incidence');
			// Route::post('/search-incidents-engineer', 'HelpDeskController@search_by_eng');
			// Route::post('/search-incidents-atm', 'HelpDeskController@search_by_atm');
			// Route::post('/incidents', 'HelpDeskController@store');

			Route::resource('/applicant/view/users', 'ViewUsersController');

			Route::post('/applicant/view/users', 'ViewUsersController@store');
			Route::get('/reset/{id}','ViewUsersController@resetpwd');


			// ROUTE FOR ADD DETAILS 
			Route::resource('/add/user/details', 'UsersDetailsController');
			Route::get('/add/user/details', 'UsersDetailsController@userDetails');
			Route::post('/add/user/details', 'UsersDetailsController@store');

			Route::get('/add/user/details', 'UsersDetailsController@edit');

			// Route::resource('/view-bank', 'ViewBankController');
			// Route::post('/view-bank', 'ViewBankController@store');

			// Route::resource('/view-atm_model', 'ViewAtmController');
			// Route::post('/view-atm_model', 'ViewAtmController@store');
			// Route::post('/view-atm/store_atm', 'ViewAtmController@store_atm');
			// Route::get('/view-atm/create', 'ViewAtmController@create_atm');
			// Route::get('/view-atm', 'ViewAtmController@displayAtm');
			// Route::get('/view-atm/fetch', 'ViewAtmController@ajax_fetch')->name('ajax_fetch');
			// Route::get('/incidents-fetch', 'HelpDeskController@ajax_loc_fetch')->name('ajax_location_fetch');
			// Route::delete('/view-atm/{id}', 'ViewAtmController@destroyAtm');



			// Route::resource('/view-task', 'ViewTasksController');
			// Route::resource('/daily_report', 'DailyReportController');
			// Route::get('/daily_report', 'ReportController@daily_report');
			// Route::resource('/view-feedback', 'FeedbackController');

			
			// Route::get('/weekly_report','ReportController@weekly_report');
			// Route::get('/monthly_report','ReportController@monthly_report');


			Route::resource('/change-password', 'ChangePasswordController');
			Route::post('/change-password', 'ChangePasswordController@update');

			// Route::get('/solvedSolution','SolutionController@solvedSolution');
			// Route::get('/unsolvedSolution','SolutionController@unsolvedSolution');
			// Route::get('/unsolvedSolution/{id}','SolutionController@show_unsolved');
			// Route::resource('/solvedSolutions','SolutionController');


		    // Route::get('/pdf/{view_type}', 'HelpDeskController@report');downloadExcel
			//Route::get('/incidents/report/pdf/{view_type}', 'HelpDeskController@report');
			// Route::post('/incidents/report/pdf/{view_type}', 'HelpDeskController@report');
			// Route::get('/incidents/{id}', 'HelpDeskController@show');
			// Route::post('/incidents/report/excel/{view_type}', 'HelpDeskController@downloadExcel');


			Route::post('/applicant/view/users/report/pdf/{view_type}', 'ViewUsersController@report');
			Route::post('/applicant/view/users/report/excel/{view_type}', 'ViewUsersController@downloadExcel');

			// Route::post('/view-task/report/pdf/{view_type}', 'ViewTasksController@report');
			// Route::post('/view-task/report/excel/{view_type}', 'ViewTasksController@downloadExcel');


			// Route::post('/view-bank/report/pdf/{view_type}', 'ViewBankController@report');
			// Route::post('/view-bank/report/excel/{view_type}', 'ViewBankController@downloadExcel');


			// Route::post('/view-atm_model/report/pdf/{view_type}', 'ViewAtmController@report');
			// Route::post('/view-atm/report/pdf/{view_type}', 'ViewAtmController@report_atm');

			// Route::post('/view-atm_model/report/excel/{view_type}', 'ViewAtmController@downloadExcel');
			// Route::post('/view-atm/report/excel/{view_type}', 'ViewAtmController@downloadExcel_atm');


			// Route::post('/unsolvedSolution/report/pdf/{view_type}', 'SolutionController@report');
			// Route::post('/unsolvedSolution/report/excel/{view_type}', 'SolutionController@downloadExcel');


			// Route::post('/solvedSolution/report/pdf/{view_type}', 'SolutionController@reportSolved');
			// Route::post('/solvedSolution/report/excel/{view_type}', 'SolutionController@downloadExcelSolved');

		    // Route::resource('/notifications','NotificationController');
			// Route::get('/finance/tasks_with_cost', 'FinancesController@tasks_with_cost');
			// Route::post('/finance/save_cost', 'FinancesController@save_cost');
			// Route::get('/finance/getatmcosts', 'FinancesController@getatmcosts');
			// Route::get('/finance/get_tickets', 'FinancesController@get_tickets');
			// Route::resource('/finance', 'FinancesController');

			// Route::get('/finance/tasks_with_cost/report/pdf/{view_type}', 'FinancesController@report');
			// Route::get('/finance/tasks_with_cost/report/excel/{view_type}', 'FinancesController@downloadExcel');

			//Routes for Permissions
			//Call entrust users view
			Route::get('/settings/manage_users/permissions/entrust_user','PermissionsController@entrust_user');
			//Get all permissions for specific user
			Route::get('/settings/manage_users/permissions/entrust','PermissionsController@entrust');
			//Entrust user route
			Route::post('/settings/manage_users/permissions/entrust_usr','PermissionsController@entrust_user_permissions');
			//get permission for role
			Route::get('/settings/manage_users/permissions/entrustRole','PermissionsController@entrust_roles');
			//Route to entrust permissions to the role
			Route::post('/settings/manage_users/permissions/entrust_role_permissions','PermissionsController@entrust_role_permissions');
			//call roles view
			Route::get('/settings/manage_users/permissions/entrust_role','PermissionsController@entrust_role');
			Route::resource('/settings/manage_users/permissions/','PermissionsController');

			//ROUTES FOR ROLES

			Route::get('/settings/manage_users/roles/entrust','RolesController@get_roles');
			Route::post('/settings/manage_users/roles/entrust','RolesController@post_roles');
			Route::get('/settings/manage_users/roles/add','RolesController@add');
			Route::resource('/settings/manage_users/roles','RolesController');

		});

	});
});
