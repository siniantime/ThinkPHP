<?php
//定义命名空间
namespace Home\controller;
//引入父类控制器
use Think\Controller;
//定义控制器并且继承父类
class UserController extends Controller{
	//测试方法
	public function test(){
		//phpinfo();
		echo $_GET['id'];
	}
}