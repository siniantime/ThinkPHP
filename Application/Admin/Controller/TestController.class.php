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
		$verify
	}
}