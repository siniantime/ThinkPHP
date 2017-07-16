<?php
//声明命名空间
namespace Admin\Controller;
//引入父类控制器
use Think\Controller;
//use Thikn\verify;
//声明并继承父类控制器
class PublicController extends Controller{
	//展示模版
	public function login(){
		
		$this->display();
		//$str = $this->fetch();
		//dump打印
		//dump($str);
	}

	public function captcha(){
		//配置
		$cfg =array(
			'fontSize' => 12,
			'useImgBg' => false
			'useCurve' => false,
			'useNoise' => false,
			'imageH' => 35,
			'imageW' => 80,
			'length' => 4,
			'fontttf' => '4.ttf',
			);
		//实例化验证码类
		$verify = new \Think\Verify($cfg);
		//输出验证码
		$verify -> entry(); 
	}

	//checkLogin
	public function checkLogin(){
		$post =I('post.');
		//dump($post);
		$verify =new \Think\Verify();
		//验证
		//dump($post['captcha']);
		$result =$verify ->check($post['captcha']);
		//dump($result);
		if ($result) {
			# code...
			$model = M('user');
			//查询
			//删除验证码
			unset($post['captcha']);
			$data = $model -> where($post) -> find();
			if ($data) {
				//存在用户
				session('id',$data['id']);
				session('username',$data['username']);
				session('role_id',$data['role_id']);
				//跳转
				$this -> success('登录成功',U('Index/index'),3);
			}else{
				//不存在用户
				$this -> error('用户名或密码错误');
			}
		}else{
			//验证码不正确
			$this -> error('您输入的验证码不正确');
		}
		
	}

	//退出方法
	public function logout(){
		//清楚session
		session(null);

		$this -> success('退出成功',U('login'),3);
		//修改跳转地址
	}
}