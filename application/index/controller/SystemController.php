<?php
namespace app\index\controller;

use app\index\controller\BaseController;
use think\Db;

class SystemController extends BaseController
{
    public $url_path = 'system';

    public function setup()
    {
        $system_setup = Db::table('l_variable')->where(array('key'=>'system_setup'))->find();

        $data['goback'] = url('admin/'.$this->url_path.'/setup');
        $data['action'] = url('admin/'.$this->url_path.'/setup_submit');
        $data['module_name']    = '系统参数';
        $data['data']    = (array)json_decode($system_setup['value']);
        return view($this->url_path.'/setup', $data);
    }

    /**
     * 系统设置表单提交
     */
    public function setup_submit()
    {
        $formData = input('request.');

        $data = [
            'key'          => 'system_setup',
            'value'      => json_encode($formData),
        ];
        $system_setup = Db::table('l_variable')->where(array('key'=>'system_setup'))->find();
        if($system_setup){
            $result = Db::table('l_variable')->where(array('key'=>'system_setup'))->update($data);
        }else{
            $result = Db::table('l_variable')->insert($data);
        }

//        $id = Db::table($this->table)->getLastInsID();

        if($result){
            $this->success('设置成功', 'admin/'.$this->url_path.'/setup');
        }else{
            $this->error('设置失败');
        }
    }

    public function admin_account()
    {
        $data['goback'] = url('admin/'.$this->url_path.'/admin_account');
        $data['action'] = url('admin/'.$this->url_path.'/admin_account_submit');
        $data['module_name']    = '管理员账号';
        return view($this->url_path.'/admin_account', $data);
    }

    /**
     * 添加表单提交
     */
    public function admin_account_submit()
    {
        $formData = input('request.');

        if($formData['password1'] != $formData['password2']){
            $this->error('两次输入密码不一致');
        }

        $data = [
            'name'          => 'admin',
            'password'      => md5($formData['password1']),
        ];
        $admin = Db::table('l_admin_user')->where(array('name'=>'admin'))->find();
        if($admin){
            $result = Db::table('l_admin_user')->where(array('name'=>'admin'))->update($data);
        }else{
            $result = Db::table('l_admin_user')->insert($data);
        }

//        $id = Db::table($this->table)->getLastInsID();

        if($result){
            $this->success('设置成功', 'admin/'.$this->url_path.'/admin_account');
        }else{
            $this->error('设置失败');
        }
    }
}
