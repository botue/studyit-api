<?php
namespace app\api\controller;

use think\Db;

class Category {
    public function index() {
        $data = Db::name('category')->select();
        return json($data);
    }
}