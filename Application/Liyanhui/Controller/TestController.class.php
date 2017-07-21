<?php
//声明命名空间
namespace Liyanhui\Controller;
//引入父类控制器
use Think\Controller;
//声明并继承父类控制器
class TestController extends Controller{
	public function test(){
		$model =M('stu');
		$stu= $model -> where(" stuadd = '北京' ") -> select();
		dump($stu);
	}
}