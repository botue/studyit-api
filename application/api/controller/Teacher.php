<?php
namespace app\api\controller;

use think\Db;

class Teacher {
    public function index() {
        $data = Db::name('teacher')->select();
        return json($data);
    }
}