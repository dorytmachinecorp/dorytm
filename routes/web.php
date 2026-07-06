<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/industries', [IndustryController::class, 'index'])->name('industries.index');
Route::get('/industries/{slug}', [IndustryController::class, 'show'])->name('industries.show');

Route::get('/about', [PageController::class, 'about'])->name('about.index');
Route::get('/contact', [PageController::class, 'contact'])->name('contact.index');
Route::post('/contact', [PageController::class, 'postContact'])->name('contact.post')->middleware('throttle:5,1');
Route::get('/gallery', [PageController::class, 'gallery'])->name('galleries.index');
Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('privacy.index');
Route::get('/terms-of-service', [PageController::class, 'terms'])->name('terms.index');
Route::get('/downloads', [DownloadController::class, 'index'])->name('downloads.index');
Route::get('/downloads/{id}/file', [DownloadController::class, 'download'])->name('downloads.download');
Route::get('/certificates', [CertificateController::class, 'index'])->name('certificates.index');

Route::get('/blog', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blogs.show');

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap.xml');
Route::get('/sitemap', [SitemapController::class, 'html'])->name('sitemap.html');
