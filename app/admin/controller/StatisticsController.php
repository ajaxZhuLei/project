<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2019 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: Powerless < wzxaini9@gmail.com>
// +----------------------------------------------------------------------
namespace app\admin\controller;

use cmf\controller\AdminBaseController;
use think\Db;
use app\admin\model\AdminMenuModel;
use think\Pageself;

class StatisticsController extends AdminBaseController
{

    public function index(){
        $buildSql = Db::name('tongji')
			->field("DATE_FORMAT(createtime,'%Y-%m-%d') as time,count(*) as count,type")
			->where("type = 1 and is_in = '是'")
			->group("time")
			->order("time desc")
            ->buildSql();
		$list=Db::table($buildSql)->alias("tj")->paginate(10);
		
		$data = [];
		foreach($list as $v){
			$data[$v['time']] = $v;	
		}
		$page = $list->render();
        // 获取分页显示
		$this->assign("page", $page);
        $this->assign("list", $data);
        return $this->fetch();
	}
	
	public function month(){
		$buildSql = Db::name('tongji')
			->field("DATE_FORMAT(createtime,'%Y-%m') as time,count(*) as count,type")
			->where("type = 1 and is_in = '是'")
			->group("time")
			->order("time desc")
            ->buildSql();
		$list=Db::table($buildSql)->alias("tj")->paginate(10);
		$data = [];
		foreach($list as $v){
			$data[$v['time']] = $v;	
		}
		$page = $list->render();
        // 获取分页显示
		$this->assign("page", $page);
        $this->assign("list", $data);
        return $this->fetch();
	}
	public function year(){
		$buildSql = Db::name('tongji')
			->field("DATE_FORMAT(createtime,'%Y') as time,count(*) as count,type")
			->where("type = 1 and is_in = '是'")
			->group("time")
			->order("time desc")
            ->buildSql();
		$list=Db::table($buildSql)->alias("tj")->paginate(10);
		
		$data = [];
		foreach($list as $v){
			$data[$v['time']] = $v;	
		}
		$page = $list->render();
        // 获取分页显示
		$this->assign("page", $page);
        $this->assign("list", $data);
        return $this->fetch();
	}
	public function list1(){
		$buildSql = Db::name('tongji')
			->field("DATE_FORMAT(createtime,'%Y-%m-%d') as time,count(*) as count,type")
			->where("type = 2 and is_in = '是'")
			->group("time")
			->order("time desc")
            ->buildSql();
		$list=Db::table($buildSql)->alias("tj")->paginate(10);
		$data = [];
		foreach($list as &$v){
			$info = Db::name('tongji')
			->field("department,count(*) as count")
			->where("type = 2 and is_in = '是' and createtime like '{$v['time']}%'")->group("department")->select();
			$v['department'] = $info ;
			$data[] = $v;
		}
		$page = $list->render();
        // 获取分页显示
		$this->assign("page", $page);
        $this->assign("list", $data);
        return $this->fetch();
	}
	
	public function listMonth(){
		$buildSql = Db::name('tongji')
			->field("DATE_FORMAT(createtime,'%Y-%m') as time,count(*) as count,type")
			->where("type = 2 and is_in = '是'")
			->group("time")
			->order("time desc")
            ->buildSql();
		$list=Db::table($buildSql)->alias("tj")->paginate(10);
		$data = [];
		foreach($list as &$v){
			$info = Db::name('tongji')
			->field("department,count(*) as count")
			->where("type = 2 and is_in = '是' and createtime like '{$v['time']}%'")->group("department")->select();
			$v['department'] = $info ;
			$data[] = $v;
		}
		$page = $list->render();
        // 获取分页显示
		$this->assign("page", $page);
        $this->assign("list", $data);
        return $this->fetch("listMonth");
	}
	public function listYear(){
		$buildSql = Db::name('tongji')
			->field("DATE_FORMAT(createtime,'%Y') as time,count(*) as count,type")
			->where("type = 2 and is_in = '是'")
			->group("time")
			->order("time desc")
            ->buildSql();
		$list=Db::table($buildSql)->alias("tj")->paginate(10);
		$data = [];
		foreach($list as &$v){
			$info = Db::name('tongji')
			->field("department,count(*) as count")
			->where("type = 2 and is_in = '是' and createtime like '{$v['time']}%'")->group("department")->select();
			$v['department'] = $info ;
			$data[] = $v;
		}
		$page = $list->render();
        // 获取分页显示
		$this->assign("page", $page);
        $this->assign("list", $data);
        return $this->fetch("listYear");
	}
}