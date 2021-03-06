<?php
namespace app\wap\controller;

use app\wap\controller\BaseController;

class IndexController extends BaseController
{
    public function index()
    {
        return view('index/index');
    }

    public function product_info(){
        $id = input('id') ? input('id') : 1;

        return view('index/product_info');
    }

    public function company()
    {
        return view('index/company');
    }

    public function buy_success()
    {
        return view('index/success');
    }
}
