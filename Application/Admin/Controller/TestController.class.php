<?php
//声明命名空间
namespace Admin\Controller;
//引入父类控制器
use Think\Controller;
//声明并继承父类控制器
class TestController extends Controller{
	public function test(){
		//echo "string";
	}

	public function test8()
	{
		# code...
		//定义数组
		$array = array('李白' , '杜甫','白居易','王安石');
		$this ->assign('array',$array);
		//展示模版
		$this->display();
	}

	//常规验证码
	public function test41(){
		//实例化验证码
		
	}

	//table方法联表查询
	public function test43(){
		//实例化模型
		$model =M('user');//执行原生的sql语句
		//定义sql语句
		//$sql ="select t1.*,t2.name as deptname from sp_user as t1,sp_dept as t2 where t1.dept_id = t2.id;";
		//$result = $model -> query($sql);
		//打印
		//连贯操作
		$result = $model -> field('t1.*,t2.name as deptname') -> table('sp_user as t1,sp_dept as t2') -> where('t1.dept_id = t2.id') -> select();
		
		dump($result);
	}
	//join方法实现联表
	public function test44(){
		//实例化模型
		$model =M('Dept');
		//$sql ="select t1.*,t2.name as deptname from sp_dept as t1 left join sp_dept as t2 on t1.pid= t2.id;";
		//$result = $model -> query($sql);
		//联表查询
		$result = $model -> field('t1.*,t2.name as deptname') ->alias('t1') ->join('left join sp_dept as t2 on t1.pid= t2.id') -> select();
		dump($result);
	}
}