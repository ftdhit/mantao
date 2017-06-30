<?php

namespace app\index\controller;

use think\Db;

class User
{
	public function index()
	{
	
		
	
		$subQuery = Db::table('think_data')
						->field('id,name')
						->where('id','>',1)
						//->select(false);
						//->fetchSql(true)
						//->select();
						->buildSql();
		dump($subQuery);
		/*
		Db::name('data')->where('status', '>', 0)
			->chunk(2, function ($list) {
				// 处理100条记录
				foreach($list as $data){
					echo $data['name'] . '<br />';
					if ($data['name'] == 'topthink') {
						return false;
					}
				}
				echo '=======<br />';
			});
		*/
		/*
		// 获取data表的name列
		$list = Db::name('data')->where('status', 1)->column('name','id');
		dump($list);
		*/
		/*
		// 获取id为8的data数据的name字段值
		$name = Db::name('data')->where('id', 8)->value('name');
		dump($name);
		*/
		/*
		$query = new \think\db\Query;
		$query->name('data')->where('name', 'like', '%think%')
							->where('id', 'in', '1,2,3')
							->limit(10);
		$result = Db::select($query);
		dump($result);
		*/
		/*
		//闭包查询
		$result = Db::name('data')->select(function ($query) {
			$query->where('name', 'like', '%think%')
			->where('id', 'in', '1,2,3')
			->limit(10);
		});
		dump($result);
		*/
		/*
		$data = Db::name('data')->find();
		dump($data);
		*/
	
	}
}