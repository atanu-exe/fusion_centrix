<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ResellerController;
use App\Http\Controllers\ServicesController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/reseller-program', [ResellerController::class, 'index'])->name('resellers');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/contact-us', [HomeController::class, 'contact_us'])->name('contact_us');
Route::post('/contact-us', [HomeController::class, 'contact_us_submit'])->name('contact.submit');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');

Route::get('/services/web-app-development', [ServicesController::class, 'web_and_app_development'])->name('services.web_app_development');
Route::get('/services/e-commerce-development', [ServicesController::class, 'e_commerce'])->name('services.e_commerce');
Route::get('/services/digital-marketing', [ServicesController::class, 'marketing'])->name('services.digital_marketing');
Route::get('/services/custom-software-development', [ServicesController::class, 'custom_software'])->name('services.custom_software');
Route::get('/services/ui-ux-design', [ServicesController::class, 'graphics'])->name('services.ui_ux_design');
Route::get('/services/branding-identity', [ServicesController::class, 'branding'])->name('services.branding_identity');


