<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoeyController;
use App\Http\Controllers\SubcategoeyController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\SubdistrictController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebSiteSettingController;

// frontend
Route::get('/', [FrontendController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//CategoeyController
Route::get('/category/index', [CategoeyController::class, 'index'])->name('category.index');
Route::post('/category/store', [CategoeyController::class, 'store'])->name('category.store');
Route::get('/category/delete/{id}', [CategoeyController::class, 'delete'])->name('category.delete');
Route::get('/category/edit/{id}', [CategoeyController::class, 'edit'])->name('category.edit');
Route::post('/category/update/{id}', [CategoeyController::class, 'update'])->name('category.update');

//User Role Route


Route::get('/index/writer', [HomeController::class, 'indexUser'])->name('index.writer');
Route::get('/insert/writer', [HomeController::class, 'insertUser'])->name('insert.writer');
Route::post('/store/writer', [HomeController::class, 'storeUser'])->name('store.writer');
Route::get('/edit/writer/{id}', [HomeController::class, 'editUser'])->name('edit.writer');
Route::post('/update/writer/{id}', [HomeController::class, 'updateUser'])->name('update.writer');



//SubcategoeyController
Route::get('/subcategory/index', [SubcategoeyController::class, 'index'])->name('subcategory.index');
Route::post('/subcategory/store', [SubcategoeyController::class, 'store'])->name('subcategory.store');
Route::get('/subcategory/delete/{id}', [SubcategoeyController::class, 'delete'])->name('subcategory.delete');
Route::get('/subcategory/edit/{id}', [SubcategoeyController::class, 'edit'])->name('subcategory.edit');
Route::post('/subcategory/update/{id}', [SubcategoeyController::class, 'update'])->name('subcategory.update');

//DistrictController
Route::get('/district/index/',[DistrictController::class, 'index'])->name('district.index');
Route::post('/district/store/',[DistrictController::class, 'store'])->name('district.store');
Route::get('/district/delete/{id}',[DistrictController::class, 'delete'])->name('district.delete');
Route::get('/district/edit/{id}',[DistrictController::class, 'edit'])->name('district.edit');
Route::post('/district/update/{id}',[DistrictController::class, 'update'])->name('district.update');

// SubdistrictController
Route::get('/subdistrict/index/',[SubdistrictController::class, 'index'])->name('subdistrict.index');
Route::post('/subdistrict/store/',[SubdistrictController::class, 'store'])->name('subdistrict.store');
Route::get('/subdistrict/delete/{id}',[SubdistrictController::class, 'delete'])->name('subdistrict.delete');
Route::get('/subdistrict/edit/{id}',[SubdistrictController::class, 'edit'])->name('subdistrict.edit');
Route::post('/subdistrict/update/{id}',[SubdistrictController::class, 'update'])->name('subdistrict.update');

// json Data Multiple Dependency
Route::get('get/subcatagory/{category_id}',[PostController::class, 'Getsubcatagory']);
Route::get('get/subdistrict/{subdistrict_id}',[PostController::class, 'Getsubdistrict']);

// PostController
Route::get('/post/insert/',[PostController::class, 'create'])->name('insert.post');
Route::post('/post/store/',[PostController::class, 'store'])->name('store.post');
Route::get('/all/post/',[PostController::class, 'index'])->name('all.post');
Route::get('/post/delete/{id}',[PostController::class, 'destroy'])->name('post.delete');
Route::get('/post/edit/{id}',[PostController::class, 'edit'])->name('post.edit');
Route::post('/post/update/{id}',[PostController::class, 'update'])->name('post.update');

// Social Routting
Route::get('/social/setting/',[SettingController::class, 'SocialSetting'])->name('social.setting');
Route::post('/social/update/{id}',[SettingController::class, 'UpdateSocial'])->name('social.update');

// Sco Routting
Route::get('/sco/setting/',[SettingController::class, 'ScoSetting'])->name('sco.setting');
Route::post('/sco/update/{id}',[SettingController::class, 'UpdateSco'])->name('sco.update');

// Namaz Routting
Route::get('/namaz/setting/',[SettingController::class, 'NamazSetting'])->name('namaz.setting');
Route::post('/namaz/update/{id}',[SettingController::class, 'UpdateNamaz'])->name('namaz.update');

// LiveTV Routting
Route::get('/livetv/setting/',[SettingController::class, 'liveTvSetting'])->name('livetv.setting');
Route::post('/livetv/update/{id}',[SettingController::class, 'UpdateLivetv'])->name('livetv.update');
Route::get('/active/livetv/{id}',[SettingController::class, 'ActiveLivetv'])->name('active.livetv');
Route::get('/deactive/livetv/{id}',[SettingController::class, 'DeactiveLivetv'])->name('deactive.livetv');

// Advertisement Route All
Route::get('/horizontalvertical/ads/',[AdsController::class, 'HorizontalVerticalAds'])->name('horizontalvertical.ads');
Route::post('horizontalvertical/ads/store/',[AdsController::class, 'HorizontalVerticalAdsStore'])->name('horizontalverticalads.store');
Route::get('horizontalvertical/ads/delete/{id}',[AdsController::class, 'HorizontalVerticalAdsDelete'])->name('horizontalverticalads.delete');
Route::get('horizontalvertical/ads/edit/{id}',[AdsController::class, 'HorizontalVerticalAdsEdit'])->name('horizontalverticalads.edit');
Route::post('horizontalvertical/ads/update/{id}',[AdsController::class, 'HorizontalVerticalAdsUpdate'])->name('horizontalverticalads.update');



Route::get('/notice/setting/',[SettingController::class, 'NoticeSetting'])->name('notice.setting');
Route::post('/notice/update/{id}',[SettingController::class, 'UpdateNotice'])->name('notice.update');
Route::get('/active/notice/{id}',[SettingController::class, 'ActiveNotice'])->name('active.notice');
Route::get('/deactive/notice/{id}',[SettingController::class, 'DeactiveNotice'])->name('deactive.notice');

Route::get('/insert/improtantwebsite/',[SettingController::class, 'create'])->name('insert.improtantwebsite');
Route::post('/store/improtantwebsite',[SettingController::class, 'store'])->name('store.improtantwebsite');
Route::get('/delete/improtantwebsite/{id}',[SettingController::class, 'destroy'])->name('delete.improtantwebsite');
Route::get('/edit/improtantwebsite/{id}',[SettingController::class, 'edit'])->name('edit.improtantwebsite');
Route::post('/update/improtantwebsite/{id}',[SettingController::class, 'update'])->name('update.improtantwebsite');
// Route::get('/active/improtantwebsite/{id}',[SettingController::class, 'ActiveWebsite'])->name('active.improtantwebsite');
Route::get('/deactive/improtantwebsite/{id}',[SettingController::class, 'GetStatusWebsite'])->name('deactive.improtantwebsite');

Route::get('/insert/photo/',[GalleryController::class, 'create'])->name('insert.photo');
Route::post('/store/photo/',[GalleryController::class, 'store'])->name('store.photo');
Route::get('/delete/photo/{id}',[GalleryController::class, 'destroy'])->name('delete.photo');
Route::get('/edit/photo/{id}',[GalleryController::class, 'edit'])->name('edit.photo');
Route::post('/update/photo/{id}',[GalleryController::class, 'update'])->name('update.photo');
Route::get('/activedeactive/photo/{id}',[GalleryController::class, 'ActiveDeactive'])->name('activedeactive.photo');

Route::get('/insert/video/',[GalleryController::class, 'Videocreate'])->name('insert.video');
Route::post('/store/video/',[GalleryController::class, 'Videostore'])->name('store.video');
Route::get('/delete/video/{id}',[GalleryController::class, 'Videodestroy'])->name('delete.video');
Route::get('/edit/video/{id}',[GalleryController::class, 'Videoedit'])->name('edit.video');

Route::get('/website/setting/',[WebSiteSettingController::class, 'WebsiteSetting'])->name('website.setting');
Route::post('/update/website/setting/{id}',[WebSiteSettingController::class, 'WebsiteSettingUpdate'])->name('update.websitesetting');




Route::get('/lang/english', [FrontendController::class, 'English'])->name('lang.english');
Route::get('/lang/bangla', [FrontendController::class, 'Bangla'])->name('lang.bangla');


Route::get('view-post/{id}/{slug}', [FrontendController::class, 'SingelPost']);

Route::get('posts/{id}/{subcategory_bangla}', [FrontendController::class, 'AllPost']);
Route::get('post/{id}/{category_bangla}', [FrontendController::class, 'AllPostCategory']);
Route::get('/get/subdistrict/frontend/{district_id}', [FrontendController::class, 'GetSubDistrict']);

Route::get('/saradesh', [FrontendController::class, 'Saradesh'])->name('saradesh.news');
Route::get('/saradeshall', [FrontendController::class, 'Saradeshall']);
