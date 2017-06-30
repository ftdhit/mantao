<?php

namespace app\index\controller;

use think\Db;

use app\index\model\User as UserModel;
use app\index\model\Profile;

class User
{
	public function delete()
	{
		UserModel::destroy(4);
		/*
		$user = UserModel::get(2);
		$user->delete();
		*/
	}
	public function update()
	{
		$user = UserModel::get(2);
		$user->username = 'xxx';
		$user->save();
	}
	public function read()
	{
		//只查询一次
		$user = UserModel::get(3,'profile');
		//下面有关联查询，还会再次进行查询
		//$user = UserModel::get(3);
		echo $user->username . '<br />';
		echo $user->profile->truename . '<br />';
		/*
		$user = UserModel::get(3);
		echo $user->status . '<br />';
		echo $user->getData('status') . '<br />';
		//dump(UserModel::all());
		
		//$user = UserModel::get(1);
		//$user = UserModel::getById(1);
		$user = UserModel::getByEmail('321@163.com');
		dump($user->username);
		dump($user['username']);
		dump($user->toArray());
		*/
	}
	public function add()
	{
		//关联新增
		$user = UserModel::get(3);
		$profile = new Profile();
		$profile->truename = '王大花';
		$profile->phone = '13513865432';
		$user->profile()->save($profile);
		/*
		$user = new UserModel();
		
		$user->username = 'xiaoming';
		$user->password = '123456';
		$user->email = '123@163.com';
		$user->save();
		
		$data = [
					'username' 	=> 	'dahuang',
					'password' 	=>	'654321',
					'email'		=>	'321@163.com'
				];
		$user->save($data);
		*/
		$data = [
					'username' 	=> 	'world',
					'password' 	=>	'hello',
					'email'		=>	'aaaaaa@163.com'
				];
		UserModel::create($data);
	}
	public function query()
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

	public function index()
	{
		// 插入记录
		//$result = Db::execute('insert into think_data (id, name ,status) values (5, "thinkphp",1)');
		// 查询数据
		//$result = Db::query('select * from think_data');
		//参数绑定
		//Db::execute('insert into think_data (id, name ,status) values (?, ?, ?)', [8, 'thinkphp', 1]);
		//$result = Db::query('select * from think_data where id = ?', [8]);
		//Db::execute('insert into think_data (id, name , status) values (:id, :name, :status)',['id' => 10, 'name' => 'thinkphp', 'status' => 1]);
		//$result = Db::query('select * from think_data where id=:id', ['id' => 10]);
		Db::table('think_data')
			->insert(['id' => 18, 'name' => 'thinkphp', 'status' => 1]);
		$result = Db::table('think_data')
					->where('id', 18)
					->select();
		dump($result);
	}
}