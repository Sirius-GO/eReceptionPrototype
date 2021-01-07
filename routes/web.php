<?php


// Pages controller
// Public Pages
Route::get('/hub', 'PagesController@hub');
Route::get('/sign_in_options', 'PagesController@sign_in_options');
Route::get('/policies', 'PagesController@policies');

//Auth Pages
Route::get('/hue_sat', 'PagesController@hue_sat');
Route::get('/hue_sat_pass', 'PagesController@hue_sat_pass');
Route::get('/hue_sat_vis', 'PagesController@hue_sat_vis');
Route::get('/settings', 'PagesController@settings');
Route::get('/firesafety', 'PagesController@fireSafety');
Route::get('/fire', 'PagesController@fire');
Route::get('/firereports', 'PagesController@fireReports');
Route::get('/firereportsdetails/{id}', 'PagesController@fireReportShow');
Route::get('/firecheckreportsdetails/{id}', 'PagesController@fireCheckReportShow');
Route::get('/fire_details/{id}', 'PagesController@RegisterDetails');
Route::get('/fire/{id}', 'PagesController@firePresent');
Route::post('/fire', ['as' => 'pagescontroller.fire_not_present', 'uses' => 'PagesController@fireNotPresent']);
Route::get('/account', 'PagesController@account');
Route::get('/qr-code', 'PagesController@qr');
Route::get('/scan', 'PagesController@scan');
Route::get('/sign_in', 'PagesController@sign_in');
Route::get('/scanout', 'PagesController@scanout');
Route::get('/scan_out', 'PagesController@scan_out');
Route::get('/register_in_out', 'PagesController@register_in_out');
Route::post('register_in_out', ['as' => 'master.register', 'uses' => 'PagesController@register_in_out']);
Route::post('reg', ['as' => 'PagesController.forceSignout', 'uses' => 'PagesController@forceSignout']);
Route::get('/capture_cam', 'PagesController@capture_cam');
Route::get('/subscriptions', 'PagesController@subscriptions');
Route::get('/checkout_success', 'PagesController@checkout_success');
Route::get('/checkout_cancel', 'PagesController@checkout_cancel');
Route::get('/reports', 'PagesController@reports');
Route::post('reports', ['as' => 'download.report', 'uses' => 'PagesController@downloadReport']);
Route::post('reports2', ['as' => 'download.failed', 'uses' => 'PagesController@downloadFailed']);
Route::post('reports3', ['as' => 'download.in', 'uses' => 'PagesController@downloadSignedIn']);
Route::post('reports4', ['as' => 'download.vcp', 'uses' => 'PagesController@downloadVisitorParking']);
Route::get('/preregister', 'PagesController@preregister');
Route::post('preregister', ['as' => 'pre.register', 'uses' => 'PagesController@storePreRegister']);



//Documents
Route::get('/documents', 'DocumentsController@showDoc');
Route::post('create_doc', ['as' => 'create.doc', 'uses' => 'DocumentsController@createDoc']);
Route::post('edit_doc', ['as' => 'edit.doc', 'uses' => 'DocumentsController@editDoc']);
Route::get('/hub_docs', ['uses' => 'DocumentsController@hub_docs']);
Route::get('/sign/{id}', ['uses' => 'DocumentsController@esign_doc']);
Route::get('/esign/{id}', ['uses' => 'DocumentsController@esign_show']);
Route::post('esign', ['as' => 'esign.store', 'uses' => 'DocumentsController@esign_store']);
Route::get('/tas', ['uses' => 'DocumentsController@tas']);

//DailyChecklist
Route::get('/daily_checklist', 'PagesController@daily_checklist');
Route::post('daily_checklist', ['as' => 'pagescontroller.daily_checklist', 'uses' => 'PagesController@dailyChecklist']);
//Weekly Checklist
Route::get('/weekly_checklist', 'PagesController@weekly_checklist');
Route::post('weekly_checklist', ['as' => 'pagescontroller.weekly_checklist', 'uses' => 'PagesController@weeklyChecklist']);
//MonthlyChecklist
Route::get('/monthly_checklist', 'PagesController@monthly_checklist');
Route::post('monthly_checklist', ['as' => 'pagescontroller.monthly_checklist', 'uses' => 'PagesController@monthlyChecklist']);
//Yearly Checklist
Route::get('/yearly_checklist', 'PagesController@yearly_checklist');
Route::post('yearly_checklist', ['as' => 'pagescontroller.yearly_checklist', 'uses' => 'PagesController@yearlyChecklist']);
//Fire Risk Assessment
Route::get('/fire_risk_assessment', 'PagesController@fire_risk_assessment');
Route::post('fire_risk_assessment', ['as' => 'pagescontroller.fire_risk_assessment', 'uses' => 'PagesController@fireRiskAssessment']);


Auth::routes(['verify' => true]);

// Login Dashboard
Route::get('/dashboard', 'DashboardController@index');

// Set Language Route
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

// eReception Controller
Route::post('department', ['as' => 'ereception.department', 'uses' => 'EreceptionController@department']);
Route::post('location', ['as' => 'ereception.location', 'uses' => 'EreceptionController@location']);
Route::post('nameout', ['as' => 'ereception.nameout', 'uses' => 'EreceptionController@nameout']);
Route::post('name', ['as' => 'ereception.name', 'uses' => 'EreceptionController@name']);
Route::post('user_cred', ['as' => 'ereception.user_cred', 'uses' => 'EreceptionController@user_cred']);
Route::post('comp_cred', ['as' => 'ereception.comp_cred', 'uses' => 'EreceptionController@comp_cred']);
Route::post('account_cred', ['as' => 'ereception.account_cred', 'uses' => 'EreceptionController@account_cred']);
Route::post('loc_add', ['as' => 'ereception.loc_add', 'uses' => 'EreceptionController@loc_add']);
Route::post('loc_edit', ['as' => 'ereception.loc_edit', 'uses' => 'EreceptionController@loc_edit']);
Route::post('dep_add', ['as' => 'ereception.dep_add', 'uses' => 'EreceptionController@dep_add']);
Route::post('dep_edit', ['as' => 'ereception.dep_edit', 'uses' => 'EreceptionController@dep_edit']);
Route::get('/search_by_dep', 'EreceptionController@department');
Route::get('/search_by_name', 'EreceptionController@name');
Route::post('visitor', ['as' => 'ereception.visitor', 'uses' => 'EreceptionController@visitor_sign_in']);
Route::post('delivery', ['as' => 'ereception.delivery', 'uses' => 'EreceptionController@delivery_notice']);
Route::post('contractor', ['as' => 'ereception.contractor', 'uses' => 'EreceptionController@contractor_sign_in']);
Route::get('signin/{id}', ['uses' => 'EreceptionController@signin']);
Route::get('signout/{id}', ['uses' => 'EreceptionController@signout']);
Route::post('scan_in', ['as' => 'ereception.scan_in', 'uses' => 'EreceptionController@scan_in']);
Route::post('scan_out', ['as' => 'ereception.scan_out', 'uses' => 'EreceptionController@scan_out']);



//Registrations Controller
Route::resource('administration', 'RegistrationsController');
Route::post('/account', ['as' => 'clogo.store', 'uses' => 'RegistrationsController@companyLogoStore']);
Route::post('mug_shot', ['as' => 'mugshot.store', 'uses' => 'RegistrationsController@mugShotStore']);
Route::post('administration/create', 'RegistrationsController@store');
Route::post('administration', ['as' => 'bulk_reg.store', 'uses' => 'RegistrationsController@bulkUploadStore']);
Route::get('/visitor_index', 'RegistrationsController@visitor_index');

//Website Controller
Route::get('/', 'WebsiteController@index');
Route::get('/home', 'WebsiteController@index');
//Route::get('/defaultsite', 'WebsiteController@index');
Route::get('/defaultsite', function () {
    return redirect('/');
});
Route::get('/about', 'WebsiteController@about');
Route::get('/services', 'WebsiteController@services');
Route::get('/contact', 'WebsiteController@contact');
Route::post('/contact', ['as' => 'contact.form', 'uses' => 'WebsiteController@contact_form']);

//Environment Controller
Route::post('/colours', ['as' => 'environment.colourstore', 'uses' => 'EnvironmentController@colourStore']);
Route::post('/colourspass', ['as' => 'environment.colourstorepass', 'uses' => 'EnvironmentController@colourStorePass']);
Route::post('/coloursvis', ['as' => 'environment.colourstorevis', 'uses' => 'EnvironmentController@colourStoreVis']);
Route::post('/settings', ['as' => 'environment.wallpaperstore', 'uses' => 'EnvironmentController@wallpaperStore']);
Route::post('colourpick', ['as' => 'colour.select', 'uses' => 'EnvironmentController@colourSelect']);
Route::post('choice', ['as' => 'environment.choice', 'uses' => 'EnvironmentController@choiceStore']);
Route::post('txtchange', ['as' => 'txt.pick', 'uses' => 'EnvironmentController@txtChange']);
Route::post('changeMsg', ['as' => 'change.msg', 'uses' => 'EnvironmentController@changeMsg']);

//Logout
Route::get('logout', 'Auth\LoginController@logout');
