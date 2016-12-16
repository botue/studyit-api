<?php
namespace app\api\controller;

class Advert {
    public function index() {
        return json(['msg' => '广告管理']);
    }
}