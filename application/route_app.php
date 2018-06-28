<?php
use think\Route;

Route::get('wap/index',        'wap/IndexController/index');
Route::get('wap/product',      'wap/IndexController/product_info');

