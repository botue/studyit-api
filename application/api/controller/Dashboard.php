<?php
namespace app\api\controller;

use think\Db;
use think\Request;
use app\api\controller\Base;

class Dashboard extends Base {

    public function index() {
        // 模拟数据
        $data = [
            'title' => [
                'text' => 'ECharts 入门示例'
            ],
            'tooltip' => ['' =>''],
            'legend' => [
                'data' => ['销量']
            ],
            'xAxis' => [
                'data' => ["衬衫","羊毛衫","雪纺衫","裤子","高跟鞋","袜子"]
            ],
            'yAxis' => ['' => ''],
            'series' => [[
                'name' => '销量',
                'type' => 'bar',
                'data' => [5, 20, 36, 10, 10, 20]
            ]]
        ];

        return json($data);
    }

    public function settings(Request $request) {

        $data = Db::name('teacher')->find(1);
        
        return json($data);
    }

    public function repass() {
        return json(['msg' => '修改密码']);
    }
}
