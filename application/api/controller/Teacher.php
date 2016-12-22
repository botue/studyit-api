<?php
namespace app\api\controller;

use think\Db;
use think\Controller;
use app\api\controller\Base;

class Teacher extends Base {
    // 权限检测
    protected function checkType() {
        // 判断讲师类型
        $tc_type = $this->request->session()['loginfo']['tc_type'];

        if($tc_type) {
            return abort(403, 'Forbidden');
        }        
    }

    // 讲师列表
    public function index() {

        $this->checkType();

        // 查询讲师列表
        $result = Db::name('teacher')
            ->field('tc_id, tc_name, tc_roster, tc_gender, tc_cellphone, tc_email, tc_status, tc_brithday, tc_join_date')
            ->where('tc_type', '<>', 0)
            ->select();

        if($result) {
            return json([
                'code' => 200,
                'msg' => 'OK',
                'result' => $result
            ]);
        }

        abort(500, 'Internal Server Error');
    }

    // 添加讲师
    public function add() {

        $this->checkType();

        // 接收提交参数
        $param = $this->request->param();
        // md5加密
        $param['tc_pass'] = md5($param['tc_pass']);

        // 存入数据库
        $result = Db::name('teacher')
            ->insert($param);

        if($result) {
            return json([
                'code' => 200,
                'msg' => 'OK',
                'time' => time()
            ]);
        }

        abort(500, 'Internal Server Error');
    }

    // 编辑讲师
    public function edit() {

        $this->checkType();

        // 讲师id
        $tc_id = $this->request->param('tc_id');

        $result = Db::name('teacher')
            ->field('tc_id, tc_name, tc_pass, tc_join_date, tc_type, tc_gender')
            ->where(['tc_id' => $tc_id])
            ->find();

        if($result) {
            return json([
                'code' => 200,
                'msg' => 'OK',
                'result' => $result,
                'time' => time()
            ]);
        }

        abort(500, 'Internal Server Error');
    }

    // 查看讲师资料
    public function view() {

        $this->checkType();

        // 讲师id
        $tc_id = $this->request->param('tc_id');

        $result = Db::name('teacher')
            ->field('tc_id, tc_name, tc_roster, tc_brithday, tc_join_date, tc_type, tc_gender, tc_cellphone, tc_email, tc_hometown, tc_introduce')
            ->where(['tc_id' => $tc_id])
            ->find();

        if($result) {
            return json([
                'code' => 200,
                'msg' => 'OK',
                'result' => $result,
                'time' => time()
            ]);
        }

        abort(500, 'Internal Server Error');
    }

    // 注销/启用讲师
    public function handle() {

        $this->checkType();

        // 获取参数
        $param = $this->request->param();
        // 讲师id
        $tc_id = $param['tc_id'];
        // 讲师状态
        $status = abs($param['tc_status'] - 1);

        $result = Db::name('teacher')
            ->where(['tc_id' => $tc_id])
            ->update(['tc_status' => $status]);

        if($result) {
            return json([
                'code' => 200,
                'msg' => 'OK',
                'time' => time()
            ]);
        }

        abort(500, 'Internal Server Error');
    }

    // 修改讲师资料
    public function modify() {

        // 读取登录信息
        $loginfo = $this->request->session()['loginfo'];

        $tc_login_id = $loginfo['tc_id'];

        $tc_type = $loginfo['tc_type'];

        // 获取参数
        $param = $this->request->param();

        $tc_id = $param['tc_id'];

        unset($param['tc_id']);

        // 只能修改自已资料
        if($tc_login_id != $tc_id && $tc_type != 0) {
            return abort(403, 'Forbidden');
        }

        // 写放数据库
        $result = Db::name('teacher')
            ->where(['tc_id' => $tc_id])
            ->update($param);

        if($result) {
            return json([
                'code' => 200,
                'msg' => 'OK',
                'time' => time()
            ]);
        }

        abort(500, 'Internal Server Error');
    }

    // 修改密码
    public function repass() {
        // 登录信息
        $loginfo = $this->request->session()['loginfo'];
        $tc_login_pass = $loginfo['tc_pass'];
        $tc_login_id = $loginfo['tc_id'];

        // 获取参数
        $param = $this->request->param();

        $tc_pass = md5($param['tc_pass']);
        $tc_new_pass = md5($param['tc_new_pass']);

        if($tc_login_pass != $tc_pass) {
            return abort(403, 'Forbidden');
        }

        $result = Db::name('teacher')
            ->where(['tc_id' => $tc_login_id, 'tc_pass' => $tc_pass])
            ->update(['tc_pass' => $tc_new_pass]);

        if($result) {
            return json([
                'code' => 200,
                'msg' => 'OK',
                'time' => time()
            ]);
        }

        abort(500, 'Internal Server Error');
    }
}





