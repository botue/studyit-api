<?php
namespace app\api\controller;

use think\Request;
use think\Db;

class Login {
    public function index(Request $request) {
        // 登录信息
        $where['tc_name'] = $request->param('tc_name');
        $where['tc_pass'] = md5($request->param('tc_pass'));

        $result = Db::name('teacher')
            ->where($where)
            ->find();

        if($result) {
            // 记录session信息
            session('loginfo', $result);

            return json([
                'code' => 200,
                'msg' => '登录成功!',
                'result' => $result,
                'time' => time()
            ]);

        } else {
            abort(404, '用户名或密码错误!');
        }

    }
}