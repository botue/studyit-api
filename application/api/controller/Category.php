<?php
namespace app\api\controller;

use think\Db;
use think\Request;
use app\api\controller\Base;

class Category extends Base {

    public function index() {
        $data = Db::name('category')->select();

        $tree = $this->tree($data, 0, 0);

        return json([
            'code' => 200,
            'msg' => 'ok',
            'result' => $tree
        ]);
    }

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
}