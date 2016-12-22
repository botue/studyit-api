<?php
namespace app\api\controller;

use think\Db;
use think\Controller;
use app\api\controller\Base;

class Category extends Base {
    // 分类列表
    public function index() {
        $result = Db::name('category')->select();

        if($result) {
            $tree = $this->tree($result, 0, 0);

            return json([
                'code' => 200,
                'msg' => 'OK',
                'result' => $tree
            ]);
        }

        abort(500, 'Internal Server Error');
    }

    // 数据处理
    protected function tree($arr, $pid, $lev) {
        static $tree;
        foreach($arr as $row) {
            if($row['cg_pid'] == $pid) {
                $row['level'] = $lev++;
                $tree[] = $row;
                $this->tree($arr, $row['cg_id'], $lev);
            }
        }
        return $tree;
    }

    // 添加分类
    public function add() {
        // 获取参数
        $param = $this->request->param();

        $result = Db::name('category')
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
}





