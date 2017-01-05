<?php
namespace app\api\controller;

class Base {

    public function _initialize() {
        $this->checkLogin();
    }

    public function checkLogin() {
        $session = session('loginfo');

        if(!$session) {
            abort(401, 'Unauthorized');
        }
    }
}