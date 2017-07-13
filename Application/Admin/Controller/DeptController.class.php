<?php
//声明命名空间
namespace Admin\Controller;
//引入父类控制器
use Think\Controller;
//声明并继承父类控制器
class DeptController extends Controller{
	//展示模版
	public function shilihua(){
		//普通实例化
		//$model = new \Admin\Model\DeptModel();
		//D方法实例化
		//$model=D();

		//实例化父类
		$model=M('dept');
		dump($model);
	}

	//add方法使用
	public function tianjia(){
		//实例化模型
		$model=M('Dept');//直接使用基本的增删该查可以使用父类模型
		//声明数据（关联数组）
		/*
		$data =array(
				'name'=>'财务',
				'pid'=>'0',
				'sort'=>'2',
				'remark'=>'这是人事部门',
			);
		$result = $model -> add($data);//增加操作
		*/
		$data =array(
				array(
						'pid' =>'0',
						'name'=>'公共关系',
						'sort'=>'3',
						'remark'=>'公共关系维护'
					),
				array(
						'pid' =>'0',
						'name'=>'总裁办',
						'sort'=>'4',
						'remark'=>'权利最高的部门'
					),
			);
		//dump($data);
		$result=$model->addAll($data);
		dump($result);
	}

	//save方法的使用
	public function xiugai(){
		//实例化模型
		$model=M('Dept');
		//修改操作
		$data=array(
				'id'=>'2',
				'sort'=>'2',
				'remark'=>'今天发工资',
			);
		$result = $model -> save ($data);
		//打印
		dump($result);
	}

	//查询
	public function chaxun(){
		//实例化模型
		$model=M('dept');
		//$data = $model -> select();//查询全部
		//$data =$model -> select('1,2');

		$data=$model->find(2);
		//打印
		dump($data);
	}

	//删除
	public function shanchu(){
		//实例化模型
		$model=M('dept');
		//删除操作

		$result = $model -> delete(1);//删除指定id

		//打印
		dump($result);
	}

	//showList展示
	public function showList(){
		//展示模版
		//$this->display();
		//模型实例化
		$model = M('Dept');
		//查询
		$data=$model ->order('sort asc') ->  select();
		//二次遍历顶级部门
		foreach ($data as $key => $value) {
			# 查询pid对应的部门信息
			if ($value['pid']>0) {
				# code...
				$info = $model -> find($value['pid']);
				//只需要保留其中的name
				$data[$key]['deptname']=$info['name'];
			}
		}
		//dump($data);
		$this ->assign('data',$data);
		//展示模版
		$this->display();
	}
	//add方法
	public function add(){
		if (IS_POST) {
			# code...
			//处理表单提交
			$post =I('post.');
			//dump($post);
			$model=M('Dept');
			$result=$model -> add($post);
			//判断返回值
			if($result){
				$this -> success('添加成功',U('showList'),3);
			}else{
				//失败
				$this -> error('添加失败');
			}
		}else{
			//查询出顶级部门
			$model=M('Dept');
			$data =$model -> where('pid=0') -> select();
			$this ->assign('data',$data);
			//展示模版
			$this->display();
		}
	}

	//del
	public function del(){
		//接收参数
		$id = I('get.id');
		//模型实例化
		$model =M('Dept');
		//删除
		$result =$model -> delete($id);
		if($result){
			//删除成功
			$this -> success('删除成功！');
		}else{
			$this -> error('删除失败！');
		}
	}

}