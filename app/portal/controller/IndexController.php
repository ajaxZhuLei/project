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
use think\Db;

class IndexController extends HomeBaseController
{
    public function index()
    {
        return $this->fetch(':index');
    }
	public function add(){
		$data = $this->request->post();
		if((date("H") >='8' && date("i") >='30') && (date("H") <= '10' && date("i") <= '30')){
			$data['type'] =  "1";
		}else if((date("H") >='14' && date("i") >='30') && (date("H") < '17')){
			$data['type'] = "2";  
		}else{
			$this->error('报名已截止');
		}
		$data['createtime'] = date("Y-m-d H:i:s");
    	if(request()->isPost()){
            if (Db::name('tongji')->insert($data)) {
            	$this->success('报名成功');
            }else{
            	$this->error('报名失败');
            }
    	}else{
			$this->error('报名失败');
		}
	}
}
