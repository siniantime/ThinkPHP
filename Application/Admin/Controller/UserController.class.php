<?php
//声明命名空间
namespace Admin\Controller;
//引入父类控制器
use Think\Controller;
//声明并继承父类控制器
class UserController extends Controller{
	//add方法
	public function add(){
		//判断请求
		if(IS_POST){
			//处理表单提交
			$model =M('User');
			//创建数据对象
			$data =$model ->create();
			//添加事件字段
			$data['addtime']=time();
			//dump($data);
			//写入数据库
			$result=$model ->add($data);
			if($result){
				$this ->success('添加成功',U('showList'),3);
			}else{
				//失败
				$this->error('添加失败！');
			}
		}else{
			//查询部门信息
			$data =M('Dept')-> field('id,name')->select();
			//分配到模版
			$this ->assign('data',$data);
			//展示模版
			$this -> display();
		}
	}

	//showList
	public function showList(){
		//模型实例化
		$model =M('User');
		//分页第一步：查询总的记录数
		$count =$model->count();
		//分页第二步：实例化分页类，传递参数
		$page =new\Think\Page($count,1);
		//分页第三步
		$page -> setConfig('prev','上一页');
		$page -> setConfig('next','下一页');
		$page -> setConfig('last','末页');
		$page -> setConfig('first','首页');
		//分页第四步：使用show方法生成url
		$show = $page -> show();
		//分页第五步:展示数据
		$data=$model -> limit($page->firstRow,$page->listRows) -> select();
		//dump($data);die;
		//分页第六步
		$this ->assign('data',$data);
		$this ->assign('show',$show);
		//分页第七步：展示模版
		$this->display();

		//展示数据
		//$data = M('User') ->select();
		//传递给模版
		//$this->assign('data',$data);
		//$this->display();
	}
}