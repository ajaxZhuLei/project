<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2019 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 老猫 <thinkcmf@126.com>
// +----------------------------------------------------------------------
namespace app\portal\controller;

use cmf\controller\HomeBaseController;
use think\Validate;

class IndexController extends HomeBaseController
{
    public function index()
    {
        return $this->fetch(':index');
    }
	public function add(){
		$data = $this->request->post();
    	if(request()->isPost()){
            if (db('tongji')->insert($data)) {
            	$this->success('报名成功');
            }else{
            	$this->error('报名失败');
            }
            return;
    	}
	}
}
