<?php
namespace app\index\controller;

use app\index\controller\BaseController;

class IndexController extends BaseController
{
    public function index()
    {
        echo '网站建设中~~~';die;
        return view('index/index');
    }

    public function resource_list()
    {
//        echo 'test';die;
        return view('index/resource_list');
    }
}
