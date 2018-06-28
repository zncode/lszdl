<?php
use think\Route;

Route::get('wap/index',        'wap/IndexController/index');
Route::get('wap/product',      'wap/IndexController/product_info');
Route::get('wap/company',      'wap/IndexController/company');
Route::get('wap/success',      'wap/IndexController/buy_success');
