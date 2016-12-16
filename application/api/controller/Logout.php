<?php
namespace app\api\controller;

class Logout {

    public function index() {

        session('loginfo', null);

        return json(['code' => '200', 'msg' => '退出成功', 'time' => time()]);
    }

}