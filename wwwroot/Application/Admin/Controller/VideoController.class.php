<?php

namespace Admin\Controller;

use EasyDingTalk\Application;
use Think\Model;

class VideoController extends AdminController
{
    /**
     * 显示视频列表页面
     */
    public function index()
    {
        $this->display();
    }

    public function create()
    {
        $this->display();
    }

    public function createSubmit()
    {
        echo 1;
    }

    /**
     * 部门显示页面，展示部门列表
     */
    public function department()
    {
        /** @var Model $model */
        $model = M('Department');
        $departments = $model->order('departmentId')->select();
        $this->assign('departments', $departments);
        $this->display();
    }

    /**
     * 从钉钉获取部门信息，并刷新本方数据
     */
    public function refreshDepartment()
    {
        $config = C('DING_TALT');
        $app = new Application($config);
        $result = $app->department->list();

        $departments = $result['department'];
        $data = array_map(function($department) {
            return [
                'departmentId' => $department['id'],
                'name' => $department['name'],
                'parentId' => $department['parentid'],
            ];
        }, $departments);

        $model = M('Department');
        $number = $model->addAll($data);
        return $this->ajaxReturn([
            'status' => 1,
            'number' => (int)$number
        ]);
    }
}
