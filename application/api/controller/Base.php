<?php
namespace app\api\controller;

use think\Controller;

class Base extends Controller {

    public function _initialize() {
        $this->checkLogin();
    }

    public function checkLogin() {
        $session = $this->request->session();

        if(!isset($session['loginfo'])) {
            abort(401, '未登录');
        }
    }
}