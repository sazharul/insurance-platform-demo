<?php

use App\Http\Controllers\Admin\CmsController;

Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('cms', [CmsController::class, 'cms'])->name('admin.cms');
    Route::get('home', [CmsController::class, 'home'])->name('admin.home');
    Route::get('popup', [CmsController::class, 'popup'])->name('admin.notice');
    Route::get('who-we-are', [CmsController::class, 'whoWeAre'])->name('admin.cms.who_we_are');
    Route::get('product-services', [CmsController::class, 'productServices'])->name('admin.cms.product_services');
    Route::get('financial-indicators', [CmsController::class, 'financialIndicators'])->name('admin.cms.financial_indicators');
    Route::get('investors-relation', [CmsController::class, 'investorsRelation'])->name('admin.cms.investors_relation');
    Route::get('contact', [CmsController::class, 'Contact'])->name('admin.cms.contact');
    Route::get('contact-messages', [CmsController::class, 'contactMessages'])->name('admin.cms.contact_messages');
    Route::get('more', [CmsController::class, 'more'])->name('admin.cms.more');
});

