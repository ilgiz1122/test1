<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController; // добавлена для связи с категориями
use App\Http\Controllers\Admin\PodcategoryController; // добавлена для связи с подкатегориями
use App\Http\Controllers\Admin\UrokyController; // добавлена для связи с подкатегориями
use App\Http\Controllers\TestController; // добавлена для связи с подкатегориями
use App\Http\Controllers\EdituserController;
use App\Http\Controllers\EdituserprofilController;
use App\Http\Controllers\KursController;
use App\Http\Controllers\PodcatController;
use App\Http\Controllers\UrokpajeController;
use App\Http\Controllers\KupitController;
use App\Http\Controllers\KupitmaterialovController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ModeratorController;
use App\Http\Controllers\Admin\MaterialcategoryController;
use App\Http\Controllers\Admin\MaterialpodcategoryController;
use App\Http\Controllers\Admin\MaterialyController;
use App\Http\Controllers\FordeleteController;
use App\Http\Controllers\PartnerkaController;
use App\Http\Controllers\TestCategoryController;
use App\Http\Controllers\TestPodcategoryController;
use App\Http\Controllers\TestsKupitController;
use App\Http\Controllers\OlimpiadaController;
use App\Http\Controllers\OlimpiadaTuryController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\ZadanieController;
use App\Http\Controllers\CertificateShablonController;
use App\Http\Controllers\VitrinaController;
use App\Http\Controllers\VitrinaCategoryController;
use App\Http\Controllers\VitrinaPodcategoryController;
use App\Http\Controllers\KreativeRezumeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CertificateUserController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\OnlainSabakMugalimController;
use App\Http\Controllers\PoputkaTaxiController;
/*
|--------------------------------------------------------------------------


|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['domain' => '{subdomain}.'.config('app.short_url')], function() {

	//ORT start
	Route::get('/', [App\Http\Controllers\HomeController::class, 'ort_view1'])->name('ort_view1');
	Route::get('/negizgi_test', [App\Http\Controllers\TestCategoryController::class, 'ort_negizgi_test'])->name('ort_negizgi_test');
	Route::get('/predmettik_test', [App\Http\Controllers\TestCategoryController::class, 'ort_predmettik_test'])->name('ort_predmettik_test');
	Route::get('/negizgi_test/{id}', [App\Http\Controllers\TestController::class, 'ort_negizgi_test_podcat'])->name('ort_negizgi_test_podcat');
	Route::get('/predmettik_test/{id}', [App\Http\Controllers\TestController::class, 'ort_predmettik_test_podcat'])->name('ort_predmettik_test_podcat');
	Route::get('/negizgi_test/test/{for_action}/{id}', [App\Http\Controllers\TestController::class, 'ort_negizgi_test_opentest'])->name('ort_negizgi_test_opentest');
	Route::get('/predmettik_test/test/{for_action}/{id}', [App\Http\Controllers\TestController::class, 'ort_predmettik_test_opentest'])->name('ort_predmettik_test_opentest');
	Route::get('/negizgi_test/play/{id}/{for_action}', [App\Http\Controllers\TestController::class, 'ort_play_negizgi_test'])->middleware('auth')->name('ort_play_negizgi_test');
	Route::get('/predmettik_test/play/{id}/{for_action}', [App\Http\Controllers\TestController::class, 'ort_play_predmettik_test'])->middleware('auth')->name('ort_play_predmettik_test');
	Route::post('/negizgi_test/{test_id}/jyiyntyk_saktoo/{test_controls_id}/{for_action}', [App\Http\Controllers\TestController::class, 'ort_result_test'])->middleware('auth')->name('ort_result_test');
	Route::get('/negizgi_test/{test_id}/jyiyntyk/{test_controls_id}/{for_action}', [App\Http\Controllers\TestController::class, 'ort_result_test_one'])->middleware('auth')->name('ort_result_negizgi_test_one');
	Route::get('/predmettik_test/{test_id}/jyiyntyk/{test_controls_id}/{for_action}', [App\Http\Controllers\TestController::class, 'ort_result_test_one'])->middleware('auth')->name('ort_result_predmettik_test_one');

	Route::get('/contact', [App\Http\Controllers\HomeController::class, 'ort_contact'])->name('ort_contact');
	Route::get('/profile', [App\Http\Controllers\EdituserprofilController::class, 'ort_profile'])->middleware('auth')->name('ort_profile');
	Route::get('/profile/password', [App\Http\Controllers\EdituserprofilController::class, 'profile_password'])->middleware('auth')->name('profile_password');
	Route::get('/profile/edit', [App\Http\Controllers\EdituserprofilController::class, 'ort_profile_edit'])->middleware('auth')->name('ort_profile_edit');
	Route::put('/profile/update', [App\Http\Controllers\EdituserprofilController::class, 'ort_profile_update'])->middleware('auth')->name('ort_profile_update');
	Route::put('/profile/password/update', [App\Http\Controllers\EdituserprofilController::class, 'ort_profile_password_update'])->middleware('auth')->name('ort_profile_password_update');

	Route::get('/login_', [App\Http\Controllers\HomeController::class, 'ort_login'])->name('ort_login');
	Route::get('/register_', [App\Http\Controllers\HomeController::class, 'ort_register'])->name('ort_register');
	Route::get('/password_reset', [App\Http\Controllers\HomeController::class, 'ort_password_reset'])->name('ort_password_reset');
	
	Route::get('/politika_confidensialnosti', [App\Http\Controllers\HomeController::class, 'ort_politika_confidensialnosti'])->name('ort_politika_confidensialnosti');

	Route::get('/menin_ort_testterim', [TestsKupitController::class, 'moi_ort_testy1'])->middleware('auth')->name('moi_ort_testy1');

	Route::get('/online_sabak', [App\Http\Controllers\OnlainSabakMugalimController::class, 'user_online_sabak_view'])->name('user_online_sabak_view');
	Route::get('/online_sabak/{onlain_sabak_id}', [App\Http\Controllers\OnlainSabakMugalimController::class, 'user_online_sabak_one_view'])->name('user_online_sabak_one_view');
	Route::post('/online_sabak/{onlain_sabak_id}/satyp_aluu', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_online_sabak_satyp_aluu'])->middleware('auth')->name('ort_online_sabak_satyp_aluu');
	
	//ORT end 
	
	
	Route::prefix('p_download')->group(function ()  {
		Route::get('/file_download_2/{id}/', [App\Http\Controllers\PoputkaTaxiController::class, 'file_download_2_taxi'])->name('file_download_2_taxi');
		
	});
	Route::prefix('p')->group(function ()  {
		Route::get('/{ssylka}', [App\Http\Controllers\PoputkaTaxiController::class, 'reklama_index_1'])->name('reklama_index_1');
		Route::get('/{ssylka}/{category_id}', [App\Http\Controllers\PoputkaTaxiController::class, 'reklama_index_2'])->name('reklama_index_2');
		Route::get('/t/{ssylka}/tirkeme_jonundo', [App\Http\Controllers\PoputkaTaxiController::class, 'poputka_taxi_tirkeme_jonundo'])->name('poputka_taxi_tirkeme_jonundo');
		Route::get('/t/{ssylka}/baska_aimaktar', [App\Http\Controllers\PoputkaTaxiController::class, 'poputka_taxi_bashka_aimaktar'])->name('poputka_taxi_bashka_aimaktar');
		Route::get('/t/{ssylka}/user/jarya_koshuu', [App\Http\Controllers\PoputkaTaxiController::class, 'jarya_koshuu'])->name('jarya_koshuu');
		Route::post('/t/{ssylka}/user/jarya_koshuu/store', [App\Http\Controllers\PoputkaTaxiController::class, 'jarya_koshuu_store'])->name('jarya_koshuu_store');
	}); 
	
//admin panel
	Route::middleware(['role:moderator|admin'])->prefix('p_admin_panel')->group(function ()  {
		Route::get('/', [App\Http\Controllers\PoputkaTaxiController::class, 'popytka_taxi_admin_index'])->middleware('auth')->name('popytka_taxi_admin_index');
		




		
		Route::get('/create', [App\Http\Controllers\PoputkaTaxiController::class, 'popytka_taxi_admin_create'])->middleware('auth')->name('popytka_taxi_admin_create');
		Route::get('/create_pluse_raion/{oblast_id}', [App\Http\Controllers\PoputkaTaxiController::class, 'popytka_taxi_admin_create_pluse_raion'])->name('popytka_taxi_admin_create_pluse_raion');
		Route::get('/create_pluse_raion2/{oblast_id}', [App\Http\Controllers\PoputkaTaxiController::class, 'popytka_taxi_admin_create_pluse_raion2'])->name('popytka_taxi_admin_create_pluse_raion2');
		Route::post('/reklama_store/{dop_role}', [App\Http\Controllers\PoputkaTaxiController::class, 'reklama_store'])->middleware('auth')->name('reklama_store');
		
	}); 
// end admin panel

});



Route::prefix('portfolio_panel')->group(function ()  {
	Route::get('/', [App\Http\Controllers\PortfolioController::class, 'portfolio'])->name('portfolio');
	Route::get('/domain', [App\Http\Controllers\PortfolioController::class, 'portfolio_domain'])->name('portfolio_domain');
});



 
Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
	Artisan::call('route:clear');
    return "Кэш очищен.";
});

Route::get('/', function () {return view('welcome');});

Auth::routes(); 






Route::get('/st', [App\Http\Controllers\CertificateUserController::class, 'proverka_certificatov2'])->name('proverka_certificatov2');
Route::get('/certificate', [App\Http\Controllers\CertificateUserController::class, 'proverka_certificatov'])->name('proverka_certificatov');
Route::post('/certificate/search', [App\Http\Controllers\CertificateUserController::class, 'proverka_sertificatov_search'])->name('proverka_sertificatov_search');



Route::get('/service/kreative-taalim/resume', [App\Http\Controllers\KreativeRezumeController::class, 'kreative_taalim_resume'])->name('kreative_taalim_resume');
Route::get('/service/kreative-taalim/resume/create', [App\Http\Controllers\KreativeRezumeController::class, 'kreative_taalim_resume_create'])->name('kreative_taalim_resume_create');
Route::post('/service/kreative-taalim/resume/store', [App\Http\Controllers\KreativeRezumeController::class, 'kreative_taalim_resume_store'])->name('kreative_taalim_resume_store');
Route::delete('/service/kreative-taalim/resume/delete/{id}', [App\Http\Controllers\KreativeRezumeController::class, 'kreative_taalim_resume_destroy'])->name('kreative_taalim_resume_destroy');
Route::get('/service/kreative-taalim/resume/edit/{id}', [App\Http\Controllers\KreativeRezumeController::class, 'kreative_taalim_resume_edit'])->name('kreative_taalim_resume_edit');
Route::put('/service/kreative-taalim/resume/update/{id}', [App\Http\Controllers\KreativeRezumeController::class, 'kreative_taalim_resume_update'])->name('kreative_taalim_resume_update');
Route::get('/service/kreative-taalim/resume/{id}/frame', [App\Http\Controllers\KreativeRezumeController::class, 'kreative_taalim_resume_frame'])->name('kreative_taalim_resume_frame');
Route::get('/service/kreative-taalim/resume/{id}/frame2', [App\Http\Controllers\KreativeRezumeController::class, 'kreative_taalim_resume_frame2'])->name('kreative_taalim_resume_frame2');







Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/jardam', [App\Http\Controllers\HomeController::class, 'jardam'])->name('jardam');
Route::post('/contact/sms1', [App\Http\Controllers\SmsController::class, 'contact_sms_store1'])->name('contact_sms_store1');
Route::post('/contact/sms2', [App\Http\Controllers\SmsController::class, 'contact_sms_store2'])->name('contact_sms_store2');

Route::get('/vse_kursy', [App\Http\Controllers\HomeController::class, 'vse_kursy'])->name('vse_kursy');
Route::get('/vse_testy/{for_action}', [App\Http\Controllers\HomeController::class, 'vse_testy'])->name('vse_testy');
Route::get('/vse_testy_ort', [App\Http\Controllers\HomeController::class, 'vse_testy_ort'])->name('vse_testy_ort');
Route::get('/vse_testy_nct', [App\Http\Controllers\HomeController::class, 'vse_testy_nct'])->name('vse_testy_nct');


Route::get('/vse_materialy/{for_action}', [App\Http\Controllers\HomeController::class, 'vse_materialy'])->name('vse_materialy');

Route::get('/olimpiada', [App\Http\Controllers\OlimpiadaController::class, 'olimpiada'])->name('olimpiada');
Route::get('/olimpiada/{olimpiada_id}/info', [App\Http\Controllers\OlimpiadaController::class, 'olimpiada_info'])->name('olimpiada_info');
Route::get('/olimpiada/info/raion/{id}', [App\Http\Controllers\OlimpiadaController::class, 'olimpiada_raion']);
Route::post('/olimpiada/{olimpiada_id}/registrasia', [App\Http\Controllers\OlimpiadaController::class, 'olimpiada_registrasia_user'])->name('olimpiada_registrasia_user');


Route::get('/category/{category}', [App\Http\Controllers\Admin\PodcategoryController::class, 'index2'])->name('podcat');

Route::get('/vitrina/{for_action}', [App\Http\Controllers\VitrinaController::class, 'vitrina'])->name('vitrina');
Route::get('/vitrina/{for_action}/{vitrina_id}', [App\Http\Controllers\VitrinaController::class, 'vitrina_one'])->name('vitrina_one');



Route::get('/vse_testy/{for_action}/category/{id}', [App\Http\Controllers\TestCategoryController::class, 'index2'])->name('testpodcategory');
Route::get('/vse_testy/{for_action}/category/podcategory/{id}', [App\Http\Controllers\TestController::class, 'index2'])->name('vsetesty');
Route::get('/vse_testy/{for_action}/category/podcategory/test/{id}', [App\Http\Controllers\TestController::class, 'opentest'])->name('opentest');
Route::get('/vse_testy/category/podcategory/test2/{id}', [App\Http\Controllers\TestController::class, 'opentest2'])->middleware('auth')->name('opentest2');
Route::get('/vse_testy/category/podcategory/test/play/{id}', [App\Http\Controllers\TestController::class, 'play_test'])->middleware('auth')->name('play_test');
Route::get('/vse_testy/category/podcategory/test/play_for_kurs/{id}', [App\Http\Controllers\TestController::class, 'play_test_for_kurs'])->middleware('auth')->name('play_test_for_kurs');
Route::post('/vse_testy/category/podcategory/test/result_test/{test_id}/{test_controls_id}', [App\Http\Controllers\TestController::class, 'result_test'])->name('result_test');
Route::get('/vse_testy/category/podcategory/test/result_test_one/{test_id}/{test_controls_id}', [App\Http\Controllers\TestController::class, 'result_test_one'])->name('result_test_one');
Route::get('/vse_testy/category/podcategory/test/kupit/{id}', [App\Http\Controllers\TestsKupitController::class, 'kupit_test'])->name('kupit_test');



Route::get('/materialcategory/{for_action}/{materialcategory}', [App\Http\Controllers\Admin\MaterialpodcategoryController::class, 'index2'])->name('materialpodcategory');
Route::get('/materialcategory/{for_action}/materialpodcategory/{id}', [App\Http\Controllers\Admin\MaterialyController::class, 'index2'])->name('vsematerialy');
Route::get('/materialcategory/{for_action}/materialpodcategory/{podcat_id}/materialy/{id}/download', [App\Http\Controllers\Admin\MaterialyController::class, 'index3'])->name('skachatmaterialov');
Route::get('/materialcategory/materialpodcategory/materialy/{id}/download2', [App\Http\Controllers\Admin\MaterialyController::class, 'index03'])->middleware('auth')->name('skachatmaterialov2');

Route::get('/materialcategory/materialpodcategory/materialy/{ssylka}/download1', [App\Http\Controllers\Admin\MaterialyController::class, 'download'])->name('download');

Route::get('/materialcategory/materialpodcategory/materialy/{id}/download02', [App\Http\Controllers\Admin\MaterialyController::class, 'download02'])->name('download02');








Route::get('/category/podcat/{podcat_id}/kurs/{id}', [App\Http\Controllers\Admin\UrokyController::class, 'showurok'])->name('urokpaje');
Route::get('/category/podcat/{podcat_id}/kurs02/{id}', [App\Http\Controllers\Admin\UrokyController::class, 'showurok2'])->middleware('auth')->name('showurok2');
Route::get('/kurs_download/{id}', [App\Http\Controllers\Admin\UrokyController::class, 'kurs_download'])->name('kurs_download');
Route::get('/kurs_zadanie_download/{id}', [App\Http\Controllers\Admin\UrokyController::class, 'kurs_zadanie_download'])->name('kurs_zadanie_download');


Route::post('/category/podcat/kurs/{urok_id}/otpravit_zadanie_k_avtoru_kursa/{zadanie_id}/{kupit_id}', [App\Http\Controllers\Admin\UrokyController::class, 'otpravit_zadanie_k_avtoru_kursa'])->name('otpravit_zadanie_k_avtoru_kursa');

Route::put('/category/podcat/kurs/otpravit_zadanie_k_avtoru_kursa_update/{zadanie_otvet_id}', [App\Http\Controllers\Admin\UrokyController::class, 'otpravit_zadanie_k_avtoru_kursa_update'])->name('otpravit_zadanie_k_avtoru_kursa_update');

Route::get('/category/podcat/kurs/user/delete_user_otvet_file/{zadanie_otvet_id}', [App\Http\Controllers\Admin\UrokyController::class, 'delete_user_otvet_file'])->name('delete_user_otvet_file');

Route::get('/category/podcat/kurs/user/delete_user_otvet_imgs/{zadanie_otvet_id}', [App\Http\Controllers\Admin\UrokyController::class, 'delete_user_otvet_imgs'])->name('delete_user_otvet_imgs');


Route::post('/category/podcat/kurs/{kurs_id}/proverka_coda', [App\Http\Controllers\Admin\PodcategoryController::class, 'kurs_code_proverka'])->middleware('auth')->name('kurs_code_proverka');

Route::get('/category/podcat/{id}', [App\Http\Controllers\KursController::class, 'index'])->name('kurs');

Route::post('/otpravit_otzyv_kursa/{for_role}/{product_id}', [App\Http\Controllers\KursController::class, 'otpravit_otzyv_kursa'])->name('otpravit_otzyv_kursa');

Route::put('/otpravit_otzyv_kursa_update/{comment_id}/{product_id}', [App\Http\Controllers\KursController::class, 'otpravit_otzyv_kursa_update'])->name('otpravit_otzyv_kursa_update');


Route::get('/category/podcat_for_moderator/{id}', [App\Http\Controllers\KursController::class, 'kurs_index_for_moderator'])->name('kurs_index_for_moderator');
Route::post('/moikursy/category/podcat/{id}', [App\Http\Controllers\KursController::class, 'index2'])->name('kurs2');
//Route::get('/materialcategory/materialpodcategory/materialy/{materialpodcategory}/bay_kupon2/{id}', [App\Http\Controllers\KursController::class, 'bay4'])->name('bay4');

Route::get('/materialcategory/{for_action}/materialpodcategory/{podcat_id}/materialy/{materialyId}/bay_kupon2/{proverkaId}', [App\Http\Controllers\KupitmaterialovController::class, 'bay4'])->name('bay4');
Route::get('/category/podcat/{podcatid}/bay_kupon2/{id}', [App\Http\Controllers\KursController::class, 'kupit_kupon_index'])->name('kupit_kupon_index');








Route::get('auth/facebook', [SocialController::class, 'facebookRedirect'])->name('auth.facebook');
Route::get('auth/facebook/callback', [SocialController::class, 'loginWithFacebook']);

Route::get('auth/google', [SocialController::class, 'googleRedirect'])->name('auth.google');
Route::get('auth/google/callback', [SocialController::class, 'loginWithGoogle']);

Route::get('auth/instagram', [SocialController::class, 'instagramRedirect'])->name('auth.instagram');
Route::get('auth/instagram/callback', [SocialController::class, 'loginWithInstagram']);

Route::resource('profil', EdituserprofilController::class);
Route::get('/profil/{id}/password', [App\Http\Controllers\EdituserprofilController::class, 'edit2'])->middleware('auth')->name('pass');
Route::put('/profil/{id}/password2', [App\Http\Controllers\EdituserprofilController::class, 'update2'])->middleware('auth')->name('pass2');
Route::post('/popolnenie_balansa', [App\Http\Controllers\EdituserprofilController::class, 'popolnenie_balansa'])->middleware('auth')->name('popolnenie_balansa');
Route::post('/result_popolnenie_balansa', [App\Http\Controllers\EdituserprofilController::class, 'result_popolnenie_balansa'])->middleware('auth')->name('result_popolnenie_balansa');
Route::get('/paybox_success', [App\Http\Controllers\EdituserprofilController::class, 'paybox_success'])->middleware('auth')->name('paybox_success');
Route::get('/paybox_failure', [App\Http\Controllers\EdituserprofilController::class, 'paybox_failure'])->middleware('auth')->name('paybox_failure');

Route::post('/zaiavka_balansa_na_som', [App\Http\Controllers\EdituserprofilController::class, 'zaiavka_balansa_na_som'])->middleware('auth')->name('zaiavka_balansa_na_som');


Route::get('/materialcategory/materialpodcategory/materialy/{id}/download_bay', [KupitmaterialovController::class, 'pokupkymaterialov'])->middleware('auth')->name('pokupkymaterialov');

Route::get('/moi_materialy/{for_action}', [KupitmaterialovController::class, 'moi_materialy'])->middleware('auth')->name('moi_materialy');


Route::get('/moi_testy/{for_action}', [TestsKupitController::class, 'moi_testy'])->middleware('auth')->name('moi_testy');
Route::get('/moi_ort_testy', [TestsKupitController::class, 'moi_ort_testy'])->middleware('auth')->name('moi_ort_testy');
Route::get('/moi_nct_testy', [TestsKupitController::class, 'moi_nct_testy'])->middleware('auth')->name('moi_nct_testy');

Route::get('/materialcategory/materialpodcategory/materialy/{id}/bay_kupon/{id2}', [KupitmaterialovController::class, 'store_kupon'])->middleware('auth')->name('store_kupon');
Route::get('/materialcategory/materialpodcategory/materialy/{materialpodcategory}/bay', [App\Http\Controllers\KupitmaterialovController::class, 'bay2'])->name('bay2');
Route::get('/materialcategory/materialpodcategory/materialy/{materialpodcategory}/bay_kupon', [App\Http\Controllers\KupitmaterialovController::class, 'bay3'])->name('bay3');








Route::get('/moikursy/category', [App\Http\Controllers\KupitController::class, 'index'])->name('moikursy');
Route::get('/category/{category}/bay', [App\Http\Controllers\KupitController::class, 'bay2'])->name('bay');
Route::post('/category/podcat/{podcat_id}/bay', [KupitController::class, 'store'])->middleware('auth')->name('pokupky');
Route::post('/category/podcat/{podcat_id}/bay_kupon2/{id}', [KupitController::class, 'store_kupon_kurs'])->middleware('auth')->name('store_kupon_kurs');








Route::resource('promocod', PartnerkaController::class);
Route::post('/promocod/proverka/{id}', [PartnerkaController::class, 'proverka'])->name('proverka_promo');
Route::post('/promocod/proverka2/{id}', [PartnerkaController::class, 'proverka_kursa'])->middleware('auth')->name('proverka_kursa');




Route::resource('zaiavka', ModeratorController::class);


Route::get('/moderatorlor', [App\Http\Controllers\ModeratorController::class, 'moderatorlor_for_user'])->name('moderatorlor_for_user');
Route::get('/moderator/{user_id}', [App\Http\Controllers\ModeratorController::class, 'moderatorlor_for_user_one'])->name('moderatorlor_for_user_one');
Route::get('/moderator/{user_id}/kurs', [App\Http\Controllers\Admin\PodcategoryController::class, 'moderator_user_id_kurs'])->name('moderator_user_id_kurs');




/*Админ панел route('elfinder.tinymce5');*/
Route::middleware(['role:admin'])->prefix('admin_panel')->group(function ()  {
	Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('homeAdmin');

	Route::resource('category', CategoryController::class);
	
	Route::resource('podcategory', PodcategoryController::class);

	Route::resource('uroky', UrokyController::class);

	Route::resource('user', EdituserController::class);

	Route::resource('materialcategory', MaterialcategoryController::class);

	Route::resource('materialpodcategory', MaterialpodcategoryController::class);

	Route::resource('materialy', MaterialyController::class);

	Route::get('/material_category/{for_action}', [App\Http\Controllers\Admin\MaterialcategoryController::class, 'material_category'])->name('material_category');

	Route::get('/material_category/{for_action}/create', [App\Http\Controllers\Admin\MaterialcategoryController::class, 'material_category_create'])->name('material_category_create');

	Route::post('/material_category/{for_action}/store', [App\Http\Controllers\Admin\MaterialcategoryController::class, 'material_category_store'])->name('material_category_store');

	Route::get('/material_category/{for_action}/edit/{id}', [App\Http\Controllers\Admin\MaterialcategoryController::class, 'material_category_edit'])->name('material_category_edit');

	Route::put('/material_category/{for_action}/update/{id}', [App\Http\Controllers\Admin\MaterialcategoryController::class, 'material_category_update'])->name('material_category_update');

	Route::delete('/material_category/{for_action}/delete/{id}', [App\Http\Controllers\Admin\MaterialcategoryController::class, 'material_category_destroy'])->name('material_category_destroy');

	Route::get('/material_category/{for_action}/{id}/podcategory', [App\Http\Controllers\Admin\MaterialpodcategoryController::class, 'material_podcategory'])->name('material_podcategory');

	Route::get('/material_category/{for_action}/{id}/podcategory/create', [App\Http\Controllers\Admin\MaterialpodcategoryController::class, 'material_podcat_create'])->name('material_podcat_create');

	Route::post('/material_category/{for_action}/{id}/podcategory/store', [App\Http\Controllers\Admin\MaterialpodcategoryController::class, 'material_podcat_store'])->name('material_podcat_store');

	Route::get('/material_category/{for_action}/{id}/podcategory/edit', [App\Http\Controllers\Admin\MaterialpodcategoryController::class, 'material_podcat_edit'])->name('material_podcat_edit');

	Route::put('/material_category/{for_action}/{id}/podcategory/update', [App\Http\Controllers\Admin\MaterialpodcategoryController::class, 'material_podcat_update'])->name('material_podcat_update');

	Route::delete('/material_category/{for_action}/{id}/podcategory/delete', [App\Http\Controllers\Admin\MaterialpodcategoryController::class, 'material_podcategory_destroy'])->name('material_podcategory_destroy');


	Route::get('/vitrina_category/{for_action}', [App\Http\Controllers\VitrinaCategoryController::class, 'vitrina_category'])->name('vitrina_category');
	Route::get('/vitrina_category/{for_action}/create', [App\Http\Controllers\VitrinaCategoryController::class, 'vitrina_category_create'])->name('vitrina_category_create');
	Route::post('/vitrina_category/{for_action}/store', [App\Http\Controllers\VitrinaCategoryController::class, 'vitrina_category_store'])->name('vitrina_category_store');
	Route::get('/vitrina_category/{for_action}/edit/{id}', [App\Http\Controllers\VitrinaCategoryController::class, 'vitrina_category_edit'])->name('vitrina_category_edit');
	Route::put('/vitrina_category/{for_action}/update/{id}', [App\Http\Controllers\VitrinaCategoryController::class, 'vitrina_category_update'])->name('vitrina_category_update');
	Route::delete('/vitrina_category/{for_action}/delete/{id}', [App\Http\Controllers\VitrinaCategoryController::class, 'vitrina_category_destroy'])->name('vitrina_category_destroy');
	Route::get('/vitrina_category/{for_action}/{id}/podcategory', [App\Http\Controllers\VitrinaPodcategoryController::class, 'vitrina_podcategory'])->name('vitrina_podcategory');
	Route::get('/vitrina_category/{for_action}/{id}/podcategory/create', [App\Http\Controllers\VitrinaPodcategoryController::class, 'vitrina_podcat_create'])->name('vitrina_podcat_create');
	Route::post('/vitrina_category/{for_action}/{id}/podcategory/store', [App\Http\Controllers\VitrinaPodcategoryController::class, 'vitrina_podcat_store'])->name('vitrina_podcat_store');
	Route::get('/vitrina_category/{for_action}/{id}/podcategory/edit', [App\Http\Controllers\VitrinaPodcategoryController::class, 'vitrina_podcat_edit'])->name('vitrina_podcat_edit');
	Route::put('/vitrina_category/{for_action}/{id}/podcategory/update', [App\Http\Controllers\VitrinaPodcategoryController::class, 'vitrina_podcat_update'])->name('vitrina_podcat_update');
	Route::delete('/vitrina_category/{for_action}/{id}/podcategory/delete', [App\Http\Controllers\VitrinaPodcategoryController::class, 'vitrina_podcategory_destroy'])->name('vitrina_podcategory_destroy');



	Route::get('/test_category/{for_action}', [App\Http\Controllers\TestCategoryController::class, 'test_category'])->name('test_category');
	Route::get('/test_category/{for_action}/create', [App\Http\Controllers\TestCategoryController::class, 'test_category_create'])->name('test_category_create');
	Route::post('/test_category/{for_action}/store', [App\Http\Controllers\TestCategoryController::class, 'test_category_store'])->name('test_category_store');
	Route::get('/test_category/{for_action}/edit/{id}', [App\Http\Controllers\TestCategoryController::class, 'test_category_edit'])->name('test_category_edit');
	Route::put('/test_category/{for_action}/update/{id}', [App\Http\Controllers\TestCategoryController::class, 'test_category_update'])->name('test_category_update');
	Route::delete('/test_category/{for_action}/delete/{id}', [App\Http\Controllers\TestCategoryController::class, 'test_category_destroy'])->name('test_category_destroy');

	Route::get('/test_category/{for_action}/{id}/podcategory1', [App\Http\Controllers\TestPodcategoryController::class, 'test_podcat_index'])->name('test_podcat_index');
	Route::get('/test_category/{for_action}/{id}/podcategory1/create', [App\Http\Controllers\TestPodcategoryController::class, 'test_podcat_create'])->name('test_podcat_create');
	Route::post('/test_category/{for_action}/{id}/podcategory1/store', [App\Http\Controllers\TestPodcategoryController::class, 'test_podcat_store'])->name('test_podcat_store');
	Route::get('/test_category/{for_action}/{id}/podcategory1/edit', [App\Http\Controllers\TestPodcategoryController::class, 'test_podcat_edit'])->name('test_podcat_edit');
	Route::put('/test_category/{for_action}/{id}/podcategory1/update', [App\Http\Controllers\TestPodcategoryController::class, 'test_podcat_update'])->name('test_podcat_update');
	Route::delete('/test_category/{for_action}/{id}/podcategory1/delete', [App\Http\Controllers\TestPodcategoryController::class, 'test_podcat_destroy'])->name('test_podcat_destroy');

	Route::get('/nct_category', [App\Http\Controllers\TestCategoryController::class, 'nct_category'])->name('nct_category');
	Route::get('/nct_category/create', [App\Http\Controllers\TestCategoryController::class, 'nct_category_create'])->name('nct_category_create');
	Route::post('/nct_category/store', [App\Http\Controllers\TestCategoryController::class, 'nct_category_store'])->name('nct_category_store');
	Route::get('/nct_category/{id}/edit', [App\Http\Controllers\TestCategoryController::class, 'nct_category_edit'])->name('nct_category_edit');
	Route::put('/nct_category/{id}/update', [App\Http\Controllers\TestCategoryController::class, 'nct_category_update'])->name('nct_category_update');
	Route::delete('/nct_category/{id}/delete', [App\Http\Controllers\TestCategoryController::class, 'nct_category_destroy'])->name('nct_category_destroy');


	Route::get('/nct_category/{id}/podcategory2', [App\Http\Controllers\TestPodcategoryController::class, 'nct_podcat_index'])->name('nct_podcat_index');
	Route::get('/nct_category/{id}/podcategory2/create', [App\Http\Controllers\TestPodcategoryController::class, 'nct_podcat_create'])->name('nct_podcat_create');
	Route::post('/nct_category/{id}/podcategory2/store', [App\Http\Controllers\TestPodcategoryController::class, 'nct_podcat_store'])->name('nct_podcat_store');
	Route::get('/nct_category/{id}/podcategory2/edit', [App\Http\Controllers\TestPodcategoryController::class, 'nct_podcat_edit'])->name('nct_podcat_edit');
	Route::put('/nct_category/{id}/podcategory2/update', [App\Http\Controllers\TestPodcategoryController::class, 'nct_podcat_update'])->name('nct_podcat_update');
	Route::delete('/nct_category/{id}/podcategory2/delete', [App\Http\Controllers\TestPodcategoryController::class, 'nct_podcat_destroy'])->name('nct_podcat_destroy');

	Route::get('/banner', [App\Http\Controllers\BannerController::class, 'banner_index'])->name('banner_index');
	Route::get('/banner/create', [App\Http\Controllers\BannerController::class, 'banner_create'])->name('banner_create');
	Route::post('/banner/store', [App\Http\Controllers\BannerController::class, 'banner_store'])->name('banner_store');
	Route::delete('/banner/{id}/destroy', [App\Http\Controllers\BannerController::class, 'banner_destroy'])->name('banner_destroy');
	Route::put('/banner/{id}/status1', [App\Http\Controllers\BannerController::class, 'banner_update_status1'])->name('banner_update_status1');
	Route::put('/banner/{id}/status2', [App\Http\Controllers\BannerController::class, 'banner_update_status2'])->name('banner_update_status2');

	Route::get('/banner/{id}/edit', [App\Http\Controllers\BannerController::class, 'banner_edit'])->name('banner_edit');
	Route::put('/banner/{id}/update', [App\Http\Controllers\BannerController::class, 'banner_update'])->name('banner_update');


	Route::get('/sms', [App\Http\Controllers\SmsController::class, 'sms_index'])->name('sms_index');

	Route::get('/sms/sdelat_moderatorom/{id}/{user_id}', [App\Http\Controllers\SmsController::class, 'sdelat_moderatorom'])->name('sdelat_moderatorom');
	Route::get('/sms/otkaz_rola_moderatora/{id}/{user_id}', [App\Http\Controllers\SmsController::class, 'otkaz_rola_moderatora'])->name('otkaz_rola_moderatora');
	Route::get('/sms/udalit_sms/{sms_id}', [App\Http\Controllers\SmsController::class, 'udalit_sms'])->name('udalit_sms');
	Route::put('/sms/otvet_balans_na_som/{id}', [App\Http\Controllers\SmsController::class, 'otvet_balans_na_som'])->name('otvet_balans_na_som');


	Route::get('/olimpiada/moderators', [App\Http\Controllers\OlimpiadaController::class, 'admin_olimpiada_moderators'])->name('admin_olimpiada_moderators');
	Route::post('/olimpiada/moderators/{user_id}/plus', [App\Http\Controllers\OlimpiadaController::class, 'admin_olimpiada_moderators_plus'])->name('admin_olimpiada_moderators_plus');
	Route::post('/olimpiada/moderators/{user_id}/minus', [App\Http\Controllers\OlimpiadaController::class, 'admin_olimpiada_moderators_minus'])->name('admin_olimpiada_moderators_minus');

	

	Route::get('/kurs/moderators_settings', [App\Http\Controllers\Admin\PodcategoryController::class, 'admin_kurs_moderators_settings'])->name('admin_kurs_moderators_settings');
	Route::post('/kurs/moderators_settings/{user_id}/minus', [App\Http\Controllers\Admin\PodcategoryController::class, 'admin_kurs_moderators_settings_minus'])->name('admin_kurs_moderators_settings_minus');
	Route::post('/kurs/moderators_settings/{user_id}/plus', [App\Http\Controllers\Admin\PodcategoryController::class, 'admin_kurs_moderators_settings_plus'])->name('admin_kurs_moderators_settings_plus');


	Route::get('/certificate_users', [App\Http\Controllers\CertificateUserController::class, 'admin_certificate_users_view'])->name('admin_certificate_users_view');
	Route::get('/certificate_users/plus', [App\Http\Controllers\CertificateUserController::class, 'admin_certificate_users_plus'])->name('admin_certificate_users_plus');
	Route::post('/certificate_users/plus/store', [App\Http\Controllers\CertificateUserController::class, 'admin_certificate_users_plus_store'])->name('admin_certificate_users_plus_store');
	Route::get('/certificate_users/status/{certificate_user_id}', [App\Http\Controllers\CertificateUserController::class, 'admin_certificate_users_status'])->name('admin_certificate_users_status');
	Route::get('/certificate_users/edit/{certificate_user_id}', [App\Http\Controllers\CertificateUserController::class, 'admin_certificate_users_edit'])->name('admin_certificate_users_edit');
	Route::put('/certificate_users/update/{certificate_user_id}', [App\Http\Controllers\CertificateUserController::class, 'admin_certificate_users_plus_update'])->name('admin_certificate_users_plus_update');
	Route::delete('/certificate_users/delete/{certificate_user_id}', [App\Http\Controllers\CertificateUserController::class, 'admin_certificate_users_delete'])->name('admin_certificate_users_delete');
});
/**/ 







/*Модератор панел*/
Route::middleware(['role:moderator|admin'])->prefix('moderator_panel')->group(function ()  {

	Route::get('/', [App\Http\Controllers\Admin\MaterialyController::class, 'moderator_panel'])->name('moderator_panel');

	Route::get('/profile', [App\Http\Controllers\ModeratorController::class, 'moderator_profile_index_for_moderator'])->name('moderator_profile_index_for_moderator');

	Route::get('/materialy/{for_action}', [App\Http\Controllers\Admin\MaterialyController::class, 'moderator_materials_index'])->name('moderator_materials_index');

	Route::get('/materialy/{for_action}/create', [App\Http\Controllers\Admin\MaterialyController::class, 'moderator_materials_create'])->name('moderator_materials_create');

	Route::get('/materialy/create_for_primaya_ssylka', [App\Http\Controllers\Admin\MaterialyController::class, 'moderator_materials_create_for_primaya_ssylka'])->name('moderator_materials_create_for_primaya_ssylka');

	Route::post('/materialy/{for_action}/store', [App\Http\Controllers\Admin\MaterialyController::class, 'moderator_materials_store'])->name('moderator_materials_store');

	Route::post('/materialy/store_for_primaya_ssylka', [App\Http\Controllers\Admin\MaterialyController::class, 'moderator_materials_store_for_primaya_ssylka'])->name('moderator_materials_store_for_primaya_ssylka');

	Route::resource('matdelete', FordeleteController::class);

	/* для инпутов */
	Route::get('/materialy/findProductName/{id}', [App\Http\Controllers\Admin\MaterialyController::class, 'moderator_materials_findProductName']);
	/* для инпутов */

	Route::get('/materialy/{for_action}/edit/{id}', [App\Http\Controllers\Admin\MaterialyController::class, 'moderator_materials_edit'])->name('moderator_materials_edit');
	Route::get('/materialy/edit2/{id}', [App\Http\Controllers\Admin\MaterialyController::class, 'moderator_materials_edit2'])->name('moderator_materials_edit2');
	Route::get('/materialy/edit3/{id}', [App\Http\Controllers\Admin\MaterialyController::class, 'moderator_materials_edit3'])->name('moderator_materials_edit3');

	Route::get('/materialy/edit3/deleteimage/{id}', [App\Http\Controllers\Admin\MaterialyController::class, 'deleteimage'])->name('deleteimage');

	Route::get('/materialy/edit_for_primaya_ssylka/{id}', [App\Http\Controllers\Admin\MaterialyController::class, 'moderator_materials_edit_for_primaya_ssylka'])->name('moderator_materials_edit_for_primaya_ssylka');

	Route::put('/materialy/{for_action}/update/{id}', [App\Http\Controllers\Admin\MaterialyController::class, 'moderator_materials_update'])->name('moderator_materials_update');
	Route::put('/materialy/update3/{id}', [App\Http\Controllers\Admin\MaterialyController::class, 'moderator_materials_update3'])->name('moderator_materials_update3');

	Route::put('/materialy/update_for_primaya_ssylka/{id}', [App\Http\Controllers\Admin\MaterialyController::class, 'moderator_materials_update_for_primaya_ssylka'])->name('moderator_materials_update_for_primaya_ssylka');



	Route::put('/materialy/update_partnerka2/{id}', [App\Http\Controllers\Admin\MaterialyController::class, 'moderator_materialy_update_partnerka2'])->name('moderator_materialy_update_partnerka2');

	Route::put('/materialy/update_partnerka1/{id}', [App\Http\Controllers\Admin\MaterialyController::class, 'moderator_materialy_update_partnerka1'])->name('moderator_materialy_update_partnerka1');

	Route::put('/materialy/update_price/{id}', [App\Http\Controllers\Admin\MaterialyController::class, 'moderator_materialy_update_price'])->name('moderator_materialy_update_price');

	

	Route::get('/statistika', [App\Http\Controllers\Admin\MaterialyController::class, 'moderator_statistika'])->name('moderator_statistika');

	Route::get('/statistika/material/{id}', [App\Http\Controllers\Admin\MaterialyController::class, 'moderator_statistika_otdelno'])->name('moderator_statistika_otdelno');

	Route::get('/statistika/kurs/{id}', [App\Http\Controllers\Admin\MaterialyController::class, 'moderator_statistika_otdelno_kurs'])->name('moderator_statistika_otdelno_kurs');

	Route::get('/kursy', [App\Http\Controllers\Admin\PodcategoryController::class, 'moderator_kurs_index'])->name('moderator_kurs_index');
	
	Route::get('/kursy/create', [App\Http\Controllers\Admin\PodcategoryController::class, 'moderator_kursy_create'])->name('moderator_kursy_create');

	Route::post('/kursy/store', [App\Http\Controllers\Admin\PodcategoryController::class, 'moderator_kursy_store'])->name('moderator_kursy_store');

	Route::get('/kursy/edit/{id}', [App\Http\Controllers\Admin\PodcategoryController::class, 'moderator_kursy_edit'])->name('moderator_kursy_edit');

	Route::get('/kursy/{kurs_id}/code', [App\Http\Controllers\Admin\PodcategoryController::class, 'moderator_kurs_code'])->name('moderator_kurs_code');
	Route::post('/kursy/{kurs_id}/code/store', [App\Http\Controllers\Admin\PodcategoryController::class, 'moderator_kursy_code_store'])->name('moderator_kursy_code_store');
	Route::get('/kursy/code/cheked/{kurs_id}', [App\Http\Controllers\Admin\PodcategoryController::class, 'moderator_kurs_code_cheked'])->name('moderator_kurs_code_cheked');

	Route::put('/kursy/update/{id}', [App\Http\Controllers\Admin\PodcategoryController::class, 'moderator_kursy_update'])->name('moderator_kursy_update');




	Route::get('/kursy/{kurs_id}/comment', [App\Http\Controllers\CommentController::class, 'moderator_kurs_comment_view'])->name('moderator_kurs_comment_view');
	Route::get('/kursy/moderator_kurs_comment_update_status/{comment_id}', [App\Http\Controllers\CommentController::class, 'moderator_kurs_comment_update_status'])->name('moderator_kurs_comment_update_status');
	Route::get('/kursy/moderator_kurs_comment_edit_text/{comment_id}', [App\Http\Controllers\CommentController::class, 'moderator_kurs_comment_edit_text'])->name('moderator_kurs_comment_edit_text');
	Route::put('/kursy/moderator_kurs_comment_update_text/{comment_id}', [App\Http\Controllers\CommentController::class, 'moderator_kurs_comment_update_text'])->name('moderator_kurs_comment_update_text');


	Route::put('/kursy/update_contact1/{kurs_id}', [App\Http\Controllers\Admin\PodcategoryController::class, 'moderator_kursy_update_contact1'])->name('moderator_kursy_update_contact1');

	Route::put('/kursy/update_status1/{podcat_id}/{podcatcat_id}', [App\Http\Controllers\Admin\PodcategoryController::class, 'moderator_kursy_update_status1'])->name('moderator_kursy_update_status1');

	Route::put('/kursy/update_status2/{podcat_id}/{podcatcat_id}', [App\Http\Controllers\Admin\PodcategoryController::class, 'moderator_kursy_update_status2'])->name('moderator_kursy_update_status2');

	Route::put('/kursy/update_partnerka2/{id}', [App\Http\Controllers\Admin\PodcategoryController::class, 'moderator_kursy_update_partnerka2'])->name('moderator_kursy_update_partnerka2');

	Route::put('/kursy/update_partnerka1/{id}', [App\Http\Controllers\Admin\PodcategoryController::class, 'moderator_kursy_update_partnerka1'])->name('moderator_kursy_update_partnerka1');

	Route::put('/kursy/update_srok_dostup1/{id}', [App\Http\Controllers\Admin\PodcategoryController::class, 'moderator_kursy_update_srok_dostup1'])->name('moderator_kursy_update_srok_dostup1');

	Route::put('/kursy/update_srok_dostup2/{id}', [App\Http\Controllers\Admin\PodcategoryController::class, 'moderator_kursy_update_srok_dostup2'])->name('moderator_kursy_update_srok_dostup2');

	Route::put('/kursy/update_price/{id}', [App\Http\Controllers\Admin\PodcategoryController::class, 'moderator_kursy_update_price'])->name('moderator_kursy_update_price');

	Route::delete('/kursy/delete/{id}', [App\Http\Controllers\Admin\PodcategoryController::class, 'moderator_kursy_destroy'])->name('moderator_kursy_destroy');


	Route::get('/kursy/{id}/uroki/', [App\Http\Controllers\Admin\UrokyController::class, 'moderator_kurs_urok_index'])->name('moderator_kurs_urok_index');

	Route::get('/kursy/{kurs_id}/dostijenie_studentov/grup_number/{grup_number}', [App\Http\Controllers\Admin\UrokyController::class, 'moderator_kurs_dostijenie_studentov'])->name('moderator_kurs_dostijenie_studentov');

	Route::get('/kursy/{kurs_id}/dostijenie_studentov/_gruppa', [App\Http\Controllers\Admin\UrokyController::class, 'moderator_kurs_dostijenie_studentov_gruppa22'])->name('moderator_kurs_dostijenie_studentov_gruppa22');

	Route::get('/kursy/{kurs_id}/dostijenie_studentov/plus_gruppa', [App\Http\Controllers\Admin\UrokyController::class, 'moderator_kursy_dostijenie_studentov_plus_gruppa'])->name('moderator_kursy_dostijenie_studentov_plus_gruppa');

	Route::get('/kursy/{kurs_id}/dostijenie_studentov/minus_gruppa', [App\Http\Controllers\Admin\UrokyController::class, 'moderator_kursy_dostijenie_studentov_minus_gruppa'])->name('moderator_kursy_dostijenie_studentov_minus_gruppa');

	Route::put('/kursy/{kurs_id}/dostijenie_studentov/perevod_gruppa', [App\Http\Controllers\Admin\UrokyController::class, 'moderator_kursy_dostijenie_studentov_perevod_gruppa'])->name('moderator_kursy_dostijenie_studentov_perevod_gruppa');
	
	Route::get('/kursy/{kurs_id}/dostijenie_studentov2/{kupit_id}/', [App\Http\Controllers\Admin\UrokyController::class, 'moderator_kurs_dostijenie_studentov2'])->name('moderator_kurs_dostijenie_studentov2');
	
	Route::get('/kursy/moderator_kurs_dostijenie_studentov2_dostupnye_moduly_plus/{kupit_id}/{modul_number}', [App\Http\Controllers\Admin\UrokyController::class, 'moderator_kurs_dostijenie_studentov2_dostupnye_moduly_plus'])->name('moderator_kurs_dostijenie_studentov2_dostupnye_moduly_plus');


	Route::put('/kursy/dostijenie_studentov/comment/{zadanie_otvet_id}', [App\Http\Controllers\Admin\UrokyController::class, 'kurs_zadanie_otvet_comment'])->name('kurs_zadanie_otvet_comment');

	Route::put('/kursy/dostijenie_studentov/comment2/{zadanie_otvet_id}', [App\Http\Controllers\Admin\UrokyController::class, 'kurs_zadanie_otvet_comment2'])->name('kurs_zadanie_otvet_comment2');



	Route::get('/kursy/kursy/uroki/youtube_control_status/{urok_id}/{type}', [App\Http\Controllers\Admin\UrokyController::class, 'moderator_kurs_urok_youtube_control_status'])->name('moderator_kurs_urok_youtube_control_status');




	Route::get('/kurs_zadanie_otvet_download/{id}', [App\Http\Controllers\Admin\UrokyController::class, 'kurs_zadanie_otvet_download'])->name('kurs_zadanie_otvet_download');

	Route::get('/kursy/{id}/uroki/create', [App\Http\Controllers\Admin\UrokyController::class, 'moderator_kurs_urok_create'])->name('moderator_kurs_urok_create');

	Route::post('/kursy/{id}/uroki/store', [App\Http\Controllers\Admin\UrokyController::class, 'moderator_kurs_urok_store'])->name('moderator_kurs_urok_store');

	Route::delete('/kursy/{podid}/uroki/delete/{id}', [App\Http\Controllers\Admin\UrokyController::class, 'moderator_kurs_urok_destroy'])->name('moderator_kurs_urok_destroy');

	Route::get('/kursy/{podcat_id}/uroki/edit/{id}', [App\Http\Controllers\Admin\UrokyController::class, 'moderator_kurs_urok_edit'])->name('moderator_kurs_urok_edit');

	Route::put('/kursy/{podcat_id}/uroki/update{id}/', [App\Http\Controllers\Admin\UrokyController::class, 'moderator_kurs_urok_update'])->name('moderator_kurs_urok_update');

	Route::get('/kursy/{id}/uroki/download', [App\Http\Controllers\Admin\UrokyController::class, 'moderator_kurs_urok_material_download'])->name('moderator_kurs_urok_material_download');

	Route::put('/kursy/{podcat_id}/uroki/update_status1/{id}', [App\Http\Controllers\Admin\UrokyController::class, 'moderator_kurs_urok_update_status1'])->name('moderator_kurs_urok_update_status1');

	Route::put('/kursy/{podcat_id}/uroki/update_status2/{id}', [App\Http\Controllers\Admin\UrokyController::class, 'moderator_kurs_urok_update_status2'])->name('moderator_kurs_urok_update_status2');

	Route::put('/kursy/{podcat_id}/uroki_num', [App\Http\Controllers\Admin\UrokyController::class, 'moderator_kurs_uroki_num_update'])->name('moderator_kurs_uroki_num_update');

	Route::get('/kursy/{kurs_id}/uroki/{urok_id}/zadanie/create', [App\Http\Controllers\ZadanieController::class, 'moderator_kurs_urok_zadanie_create'])->name('moderator_kurs_urok_zadanie_create');

	Route::post('/kursy/{kurs_id}/uroki/{urok_id}/zadanie/store', [App\Http\Controllers\ZadanieController::class, 'moderator_kurs_urok_zadanie_store'])->name('moderator_kurs_urok_zadanie_store');

	Route::get('/kursy/{kurs_id}/uroki/{urok_id}/zadanie/edit', [App\Http\Controllers\ZadanieController::class, 'moderator_kurs_urok_zadanie_edit'])->name('moderator_kurs_urok_zadanie_edit');

	Route::put('/kursy/{kurs_id}/uroki/{urok_id}/zadanie/{id}/update', [App\Http\Controllers\ZadanieController::class, 'moderator_kurs_urok_zadanie_update'])->name('moderator_kurs_urok_zadanie_update');

	Route::get('/kursy/uroki/zadanie/deleteimage/{id}', [App\Http\Controllers\ZadanieController::class, 'zadanie_deleteimage'])->name('zadanie_deleteimage');

	Route::delete('/kursy/uroki/zadanie/delete/{id}', [App\Http\Controllers\ZadanieController::class, 'moderator_kurs_urok_zadanie_destroy'])->name('moderator_kurs_urok_zadanie_destroy');

	Route::get('/kursy/{kurs_id}/uroki/{urok_id}/test/create', [App\Http\Controllers\TestController::class, 'moderator_kurs_urok_tests_create'])->name('moderator_kurs_urok_tests_create');

	Route::get('/kursy/{kurs_id}/uroki/{urok_id}/test/edit', [App\Http\Controllers\TestController::class, 'moderator_kurs_urok_tests_edit'])->name('moderator_kurs_urok_tests_edit');

	Route::delete('/kursy/{kurs_id}/uroki/{urok_id}/test/{test_id}/delete/', [App\Http\Controllers\TestController::class, 'moderator_kurs_urok_tests_destroy'])->name('moderator_kurs_urok_tests_destroy');

	Route::put('/kursy/{kurs_id}/uroki/{urok_id}/test_vybrate', [App\Http\Controllers\Admin\UrokyController::class, 'moderator_kurs_urok_tests_vybrate'])->name('moderator_kurs_urok_tests_vybrate');

	Route::put('/kursy/{kurs_id}/uroki/{urok_id}/test_izyat', [App\Http\Controllers\Admin\UrokyController::class, 'moderator_kurs_urok_tests_izyat'])->name('moderator_kurs_urok_tests_izyat');

	Route::get('/kursy/{kurs_id}/certificate', [App\Http\Controllers\CertificateShablonController::class, 'moderator_kurs_certificate'])->name('moderator_kurs_certificate');

	Route::get('/kursy/{kurs_id}/certificate/{certificate_shablon_id}', [App\Http\Controllers\CertificateShablonController::class, 'moderator_kurs_certificate_shablon'])->name('moderator_kurs_certificate_shablon');

	Route::get('/kursy/certificatedownload', [App\Http\Controllers\CertificateShablonController::class, 'moderator_kurs_certificate_download'])->name('moderator_kurs_certificate_download');

	Route::get('/testy/{for_action}', [App\Http\Controllers\TestController::class, 'moderator_tests_index'])->name('moderator_tests_index');

	Route::delete('/testy_ort/delete/{id}', [App\Http\Controllers\TestController::class, 'moderator_tests_destroy'])->name('moderator_tests_destroy');


	Route::get('/testy/{for_action}/create', [App\Http\Controllers\TestController::class, 'moderator_tests_create'])->name('moderator_tests_create');

	Route::get('/testy/findProductName/{id}', [App\Http\Controllers\TestController::class, 'moderator_tests_findProductName']);

	Route::post('/testy/store/{for_action}', [App\Http\Controllers\TestController::class, 'moderator_tests_store'])->name('moderator_tests_store');

	Route::put('/testy/update_partnerka2/{id}', [App\Http\Controllers\TestController::class, 'moderator_testy_update_partnerka2'])->name('moderator_testy_update_partnerka2');

	Route::put('/testy/update_partnerka1/{id}', [App\Http\Controllers\TestController::class, 'moderator_testy_update_partnerka1'])->name('moderator_testy_update_partnerka1');

	Route::put('/testy/update_status1/{id}', [App\Http\Controllers\TestController::class, 'moderator_testy_update_status1'])->name('moderator_testy_update_status1');

	Route::put('/testy/update_status2/{id}', [App\Http\Controllers\TestController::class, 'moderator_testy_update_status2'])->name('moderator_testy_update_status2');
	Route::put('/testy/update_price/{id}', [App\Http\Controllers\TestController::class, 'moderator_testy_update_price'])->name('moderator_testy_update_price');
	Route::put('/testy/update_srok_dostup1/{id}', [App\Http\Controllers\TestController::class, 'moderator_testy_update_srok_dostup1'])->name('moderator_testy_update_srok_dostup1');

	Route::put('/testy/update_pokaz_otvetov1/{id}', [App\Http\Controllers\TestController::class, 'moderator_testy_update_pokaz_otvetov1'])->name('moderator_testy_update_pokaz_otvetov1');

	Route::put('/testy/update_srok_dostup2/{id}', [App\Http\Controllers\TestController::class, 'moderator_testy_update_srok_dostup2'])->name('moderator_testy_update_srok_dostup2');

	Route::put('/testy/update_pokaz_otvetov2/{id}', [App\Http\Controllers\TestController::class, 'moderator_testy_update_pokaz_otvetov2'])->name('moderator_testy_update_pokaz_otvetov2');

	Route::get('/testy/findProductName2/{id}', [App\Http\Controllers\TestController::class, 'moderator_tests_findProductName2']);
	Route::get('/testy/{for_action}/edit/{id}', [App\Http\Controllers\TestController::class, 'moderator_tests_edit'])->name('moderator_tests_edit');

	Route::put('/testy/{for_action}/update/{id}', [App\Http\Controllers\TestController::class, 'moderator_tests_update'])->name('moderator_tests_update');



	Route::get('/vitrina/{for_action}', [App\Http\Controllers\VitrinaController::class, 'moderator_vitrina_index'])->name('moderator_vitrina_index');
	Route::get('/vitrina/{for_action}/create', [App\Http\Controllers\VitrinaController::class, 'moderator_vitrina_create'])->name('moderator_vitrina_create');
	Route::get('/vitrina/vitrina_poluchenie_podcategorii/{id}', [App\Http\Controllers\VitrinaController::class, 'moderator_vitrina_poluchenie_podcategorii']);
	Route::post('/vitrina/{for_action}/store', [App\Http\Controllers\VitrinaController::class, 'moderator_vitrina_store'])->name('moderator_vitrina_store');
	Route::put('/vitrina/update_status1/{id}', [App\Http\Controllers\VitrinaController::class, 'moderator_vitrina_update_status1'])->name('moderator_vitrina_update_status1');
	Route::put('/vitrina/update_status0/{id}', [App\Http\Controllers\VitrinaController::class, 'moderator_vitrina_update_status0'])->name('moderator_vitrina_update_status0');
	Route::put('/vitrina/update_price/{id}', [App\Http\Controllers\VitrinaController::class, 'moderator_vitrina_update_price'])->name('moderator_vitrina_update_price');
	Route::put('/vitrina/update_phone_for_zvonok/{id}', [App\Http\Controllers\VitrinaController::class, 'moderator_vitrina_update_phone_for_zvonok'])->name('moderator_vitrina_update_phone_for_zvonok');
	Route::put('/vitrina/update_phone_for_whatsapp/{id}', [App\Http\Controllers\VitrinaController::class, 'moderator_vitrina_update_phone_for_whatsapp'])->name('moderator_vitrina_update_phone_for_whatsapp');

	Route::get('/vitrina/{for_action}/edit/{id}', [App\Http\Controllers\VitrinaController::class, 'moderator_vitrina_edit'])->name('moderator_vitrina_edit');

	Route::delete('/vitrina/delete/{id}', [App\Http\Controllers\VitrinaController::class, 'moderator_vitrina_destroy'])->name('moderator_vitrina_destroy');

	Route::get('/vitrina/edit/deleteimage/{id}', [App\Http\Controllers\VitrinaController::class, 'moderator_vitrina_deleteimage'])->name('moderator_vitrina_deleteimage');
	Route::get('/vitrina/edit/deletefile/{id}', [App\Http\Controllers\VitrinaController::class, 'moderator_vitrina_deletefile'])->name('moderator_vitrina_deletefile');
	Route::put('/vitrina/{for_action}/update/{id}', [App\Http\Controllers\VitrinaController::class, 'moderator_vitrina_update'])->name('moderator_vitrina_update');






	Route::get('/olimpiada/', [App\Http\Controllers\OlimpiadaController::class, 'moderator_olimpiada_index'])->name('moderator_olimpiada_index');
	Route::get('/olimpiada/create', [App\Http\Controllers\OlimpiadaController::class, 'moderator_olimpiada_create'])->name('moderator_olimpiada_create');
	Route::post('/olimpiada/store', [App\Http\Controllers\OlimpiadaController::class, 'moderator_olimpiada_store'])->name('moderator_olimpiada_store');
	Route::get('/olimpiada/{olimpiada_id}/edit', [App\Http\Controllers\OlimpiadaController::class, 'moderator_olimpiada_edit'])->name('moderator_olimpiada_edit');
	Route::put('/olimpiada/{olimpiada_id}/update', [App\Http\Controllers\OlimpiadaController::class, 'moderator_olimpiada_update'])->name('moderator_olimpiada_update');
	Route::get('/olimpiada/{olimpiada_id}/tury/{olimpiada_tury_id}/edit', [App\Http\Controllers\OlimpiadaTuryController::class, 'moderator_olimpiada_tury_edit'])->name('moderator_olimpiada_tury_edit');
	Route::put('/olimpiada/{olimpiada_id}/tury/{olimpiada_tury_id}/update', [App\Http\Controllers\OlimpiadaTuryController::class, 'moderator_olimpiada_tury_update'])->name('moderator_olimpiada_tury_update');
	Route::get('/olimpiada/{olimpiada_id}/user_zaiavka/{oplata}', [App\Http\Controllers\OlimpiadaController::class, 'moderator_olimpiada_user_zaiavka'])->name('moderator_olimpiada_user_zaiavka');


	Route::put('/olimpiada/{olimpiada_id}/tury/{olimpiada_tury_id}/data_okonchanie_tura_1', [App\Http\Controllers\OlimpiadaTuryController::class, 'moderator_olimpiada_tury_update_data_okonchanie_tura_1'])->name('moderator_olimpiada_tury_update_data_okonchanie_tura_1');



	Route::get('/olimpiada/{id}/tury', [App\Http\Controllers\OlimpiadaTuryController::class, 'moderator_olimpiada_tury_index'])->name('moderator_olimpiada_tury_index');
	Route::get('/olimpiada/{id}/tury/create', [App\Http\Controllers\OlimpiadaTuryController::class, 'moderator_olimpiada_tury_create'])->name('moderator_olimpiada_tury_create');
	Route::post('/olimpiada/{id}/tury/store', [App\Http\Controllers\OlimpiadaTuryController::class, 'moderator_olimpiada_tury_store'])->name('moderator_olimpiada_tury_store');
	Route::put('/olimpiada/update_phone_for_zvonok/{id}', [App\Http\Controllers\OlimpiadaController::class, 'moderator_olimpiada_update_phone_for_zvonok'])->name('moderator_olimpiada_update_phone_for_zvonok');
	Route::put('/olimpiada/update_phone_for_whatsapp/{id}', [App\Http\Controllers\OlimpiadaController::class, 'moderator_olimpiada_update_phone_for_whatsapp'])->name('moderator_olimpiada_update_phone_for_whatsapp');
	Route::put('/olimpiada/update_phone_for_telegram/{id}', [App\Http\Controllers\OlimpiadaController::class, 'moderator_olimpiada_update_phone_for_telegram'])->name('moderator_olimpiada_update_phone_for_telegram');
	Route::put('/olimpiada/update_status1/{id}', [App\Http\Controllers\OlimpiadaController::class, 'moderator_olimpiada_update_status1'])->name('moderator_olimpiada_update_status1');
	Route::put('/olimpiada/update_status0/{id}', [App\Http\Controllers\OlimpiadaController::class, 'moderator_olimpiada_update_status0'])->name('moderator_olimpiada_update_status0');
	Route::put('/olimpiada/tury/{olimpiada_tury_id}/test_vybrate', [App\Http\Controllers\OlimpiadaTuryController::class, 'moderator_olimpiada_tury_tests_vybrate'])->name('moderator_olimpiada_tury_tests_vybrate');
	Route::put('/olimpiada/tury/{olimpiada_tury_id}/update_status1', [App\Http\Controllers\OlimpiadaTuryController::class, 'moderator_olimpiada_tury_update_status1'])->name('moderator_olimpiada_tury_update_status1');
	Route::put('/olimpiada/tury/{olimpiada_tury_id}/update_status2', [App\Http\Controllers\OlimpiadaTuryController::class, 'moderator_olimpiada_tury_update_status2'])->name('moderator_olimpiada_tury_update_status2');
	Route::get('/olimpiada/tury/{olimpiada_tury_id}/test_izyat', [App\Http\Controllers\OlimpiadaTuryController::class, 'moderator_olimpiada_tury_tests_izyat'])->name('moderator_olimpiada_tury_tests_izyat');
	Route::get('/olimpiada/{olimpiada_id}/plus_user/{user_id}', [App\Http\Controllers\OlimpiadaController::class, 'moderator_olimpiada_plus_user'])->name('moderator_olimpiada_plus_user');

	Route::get('/olimpiada/status1_user/{olimpiada_registrasia_user_id}', [App\Http\Controllers\OlimpiadaController::class, 'moderator_olimpiada_status1_user'])->name('moderator_olimpiada_status1_user');
	Route::get('/olimpiada/status2_user/{olimpiada_registrasia_user_id}', [App\Http\Controllers\OlimpiadaController::class, 'moderator_olimpiada_status2_user'])->name('moderator_olimpiada_status2_user');


	
});
/**/

/*Модератор панел ОРТ*/
Route::middleware(['role:moderator|admin'])->prefix('moderator_panel_ort')->group(function ()  {
	Route::get('/', [App\Http\Controllers\OnlainSabakMugalimController::class, 'moderator_panel_ort'])->name('moderator_panel_ort');
	Route::get('/online_sabak', [App\Http\Controllers\OnlainSabakMugalimController::class, 'moderator_panel_ort_online_sabak'])->name('moderator_panel_ort_online_sabak');
	Route::post('/sabak_koshuu', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_sabak_koshuu'])->name('ort_moderator_sabak_koshuu');
	Route::get('/online_sabak_edit/{online_sabak_id}', [App\Http\Controllers\OnlainSabakMugalimController::class, 'moderator_panel_online_sabak_edit'])->name('moderator_panel_online_sabak_edit');
	Route::get('/online_sabak_edit/plus_kunu/{sabak_id}/{kunu}/{ubaktysy}', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_sabak_plus_kunu'])->name('ort_moderator_online_sabak_plus_kunu');
	Route::get('/online_sabak_edit/minus_kunu/{sabak_id}/{onlain_sabak_day_id}', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_sabak_minus_kunu'])->name('ort_moderator_online_sabak_minus_kunu');
	Route::put('/online_sabak_edit/update/{online_sabak_id}', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_sabak_edit'])->name('ort_moderator_sabak_edit');
	Route::put('/online_sabak_edit_akcia/update/{online_sabak_id}', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_sabak_edit_akcia'])->name('ort_moderator_sabak_edit_akcia');
	Route::get('/online_sabak_edit_akcia/chek/{online_sabak_id}', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_sabak_edit_akcia_chek'])->name('ort_moderator_sabak_edit_akcia_chek');
	Route::put('/online_sabak_edit_nes_mes/chek2/{online_sabak_id}/{data_id2}', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_sabak_edit_nes_mes_chek'])->name('ort_moderator_sabak_edit_nes_mes_chek');
	Route::get('/online_sabak_edit_nes_mes/chek/{online_sabak_id}/{data_id2}', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_sabak_edit_nes_mes_chek2'])->name('ort_moderator_sabak_edit_nes_mes_chek2');
	Route::get('/online_sabak_edit/chek_status/{online_sabak_id}', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_sabak_edit_chek_status'])->name('ort_moderator_sabak_edit_chek_status');
	Route::get('/online_sabak_edit/{online_sabak_id}/kunu', [App\Http\Controllers\OnlainSabakMugalimController::class, 'moderator_panel_online_sabak_edit_kunu'])->name('moderator_panel_online_sabak_edit_kunu');
	Route::get('/online_sabak_edit/plus_dni/{online_sabak_id}', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_sabak_plus_dni'])->name('ort_moderator_sabak_plus_dni');
	Route::put('/online_sabak_edit/dni_izmenit/{online_sabak_id}', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_sabak_dni_izmenit'])->name('ort_moderator_online_sabak_dni_izmenit');
	Route::get('/online_sabak_edit/dni_udalit/{online_sabak_id}/{onlain_sabak_day_id}', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_sabak_dni_udalit'])->name('ort_moderator_online_sabak_dni_udalit');
	Route::get('/online_sabak_edit/kunu_edit/{online_sabak_id}/{online_sabak_kunu_id}', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_sabak_kunu_edit'])->name('ort_moderator_online_sabak_kunu_edit');
	Route::get('/online_sabak_edit/kunu_edit/chek_pokaz/{online_sabak_id}/{online_sabak_kunu_id}', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_sabak_edit_chek_pokaz'])->name('ort_moderator_online_sabak_edit_chek_pokaz');
	Route::get('/online_sabak_edit/kunu_edit/chek_youtube_0/{online_sabak_id}/{online_sabak_kunu_id}', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_sabak_edit_chek_youtube_0'])->name('ort_moderator_online_sabak_edit_chek_youtube_0');
	Route::get('/online_sabak_edit/kunu_edit/chek_youtube_1/{online_sabak_id}/{online_sabak_kunu_id}', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_sabak_edit_chek_youtube_1'])->name('ort_moderator_online_sabak_edit_chek_youtube_1');
	Route::get('/online_sabak_edit/kunu_edit/chek_youtube_2/{online_sabak_id}/{online_sabak_kunu_id}', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_sabak_edit_chek_youtube_2'])->name('ort_moderator_online_sabak_edit_chek_youtube_2');
	Route::put('/online_sabak_edit/kunu_edit/urok_maalymat_update/{online_sabak_id}/{online_sabak_kunu_id}', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_sabak_urok_maalymat_update'])->name('ort_moderator_online_sabak_urok_maalymat_update');
	Route::put('/online_sabak_edit/kunu_edit/urok_conferens_ssylka_update/{online_sabak_id}/{online_sabak_kunu_id}', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_sabak_urok_conferens_ssylka_update'])->name('ort_moderator_online_sabak_urok_conferens_ssylka_update');
	Route::get('/online_sabak/{online_sabak_id}/delete', [App\Http\Controllers\OnlainSabakMugalimController::class, 'moderator_panel_online_sabak_delete'])->name('moderator_panel_online_sabak_delete');
	
	
	Route::get('/test', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_test_view'])->name('ort_moderator_online_test_view');

	Route::get('/test/create', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_test_create'])->name('ort_moderator_online_test_create');
	Route::post('/test/store', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_test_store'])->name('ort_moderator_online_test_store');
	Route::get('/test/{test_id}/edit', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_test_edit'])->name('ort_moderator_online_test_edit');
	Route::put('/test/{test_id}/update', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_test_update'])->name('ort_moderator_online_test_update');
	Route::put('/test/{test_id}/vopros_testa/{vopros_testa_id}/update', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_test_vopros_testa_update'])->name('ort_moderator_online_test_vopros_testa_update');
	Route::put('/test/{test_id}/otvet_testa/{test_otvety_id}/update', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_test_otvet_testa_update'])->name('ort_moderator_online_test_otvet_testa_update');
	Route::get('/test/{test_id}/pluse_otvet_testa/{test_voprosy_id}', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_test_pluse_otvet_testa'])->name('ort_moderator_online_test_pluse_otvet_testa');
	Route::put('/test/{test_id}/vopros_ball/{vopros_testa_id}/update', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_test_vopros_ball_update'])->name('ort_moderator_online_test_vopros_ball_update');
	Route::get('/test/{vopros_testa_id}/vopros_checked/{test_otvety_id}', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_test_vopros_checked'])->name('ort_moderator_online_test_vopros_checked');
	Route::get('/test/{test_id}/variant_delet/{test_otvety_id}', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_test_variant_delet'])->name('ort_moderator_online_test_variant_delet');
	Route::post('/test/{test_id}/img_12/{test_voprosy_id}/update', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_test_img12_update'])->name('ort_moderator_online_test_img12_update');
	Route::get('/test/{test_id}/plus_novyi_vopros', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_test_plus_novyi_vopros'])->name('ort_moderator_online_test_plus_novyi_vopros');
	Route::get('/test/{test_id}/img_delet/{test_voprosy_id}', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_test_img_delet'])->name('ort_moderator_online_test_img_delet');
	Route::get('/test/{test_id}/vopros_delet/{test_voprosy_id}', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_test_vopros_delet'])->name('ort_moderator_online_test_vopros_delet');
	Route::get('/test/{test_id}/pokaz_otvetov_1', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_test_pokaz_otvetov_1'])->name('ort_moderator_online_test_pokaz_otvetov_1');
	Route::put('/test/{test_id}/pokaz_otvetov_2', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_test_pokaz_otvetov_2'])->name('ort_moderator_online_test_pokaz_otvetov_2');

	Route::get('/test/{test_id}/srok_dostupa_1', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_test_srok_dostupa_1'])->name('ort_moderator_online_test_srok_dostupa_1');
	Route::put('/test/{test_id}/srok_dostupa_2', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_test_srok_dostupa_2'])->name('ort_moderator_online_test_srok_dostupa_2');

	Route::get('/test/{test_id}/status', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_test_status'])->name('ort_moderator_online_test_status');

	Route::get('/test/{test_id}/delet', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_test_destroy'])->name('ort_moderator_online_test_destroy');

	Route::get('/test/{test_id}/redaktor_formul', [App\Http\Controllers\OnlainSabakMugalimController::class, 'ort_moderator_online_test_redaktor_formul'])->name('ort_moderator_online_test_redaktor_formul');

});
/**/ 