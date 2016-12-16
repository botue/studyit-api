<?php
namespace app\api\controller;

class Course {
    public function index() {
        return json(['msg' => '课程管理']);
    }
}