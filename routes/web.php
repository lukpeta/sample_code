<?php

use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\Payments\Transfer24PackageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CompanyController;

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

Route::domain('{slug}.domain.pl')->group(function () {
    Route::get('/', [CompanyController::class, 'index'])->name('company_view');
});
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/p/{slug}', [PageController::class, 'textPage'])->name('textPage');
Route::get('/integracja', [PageController::class, 'integration'])->name('integration');
Route::get('/jak-dzialamy', [PageController::class, 'howWeWork'])->name('howWeWork');
Route::get('/cennik', [PageController::class, 'priceList'])->name('priceList');
Route::get('/polityka-prywatnosci', [PageController::class, 'privacyPolicy'])->name('privacyPolicy');
Route::get('/firma/{slug}', [CompanyController::class, 'index'])->name('company');
Route::post('/firma-wyslij-wiadomosc/{slug}', [CompanyController::class, 'contactWithCompany'])->name('contactWithCompany');
Route::post('/firma/zamow-paczke/{slug}', [CompanyController::class, 'orderPackage'])->name('orderPackage');
Route::get('/oblicz-cene', [CompanyController::class, 'calculatePrice'])->name('calculatePrice');
Route::get('/oblicz-cene-rabatu', [CompanyController::class, 'calculateDiscountPrice'])->name('calculateDiscountPrice');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blogView');
Route::get('/sledzenie-przesylki', [HomeController::class, 'tracking'])->name('tracking');
Route::post('/payment-status', [Transfer24PackageController::class, 'status'])->name('transfer-status-package')->middleware('platnosci_ip_allowed');
Route::get('/payment-callback', [Transfer24PackageController::class, 'callback'])->name('transfer-callback-package');
Route::get('/payment-confirm', [Transfer24PackageController::class, 'confirm'])->name('parcel-payment-confirm');

