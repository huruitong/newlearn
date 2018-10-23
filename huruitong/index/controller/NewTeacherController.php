<?php 
namespace app\index\controller;
use app\common\model\NewTeacher;
use think\Request;
use think\Controller;
use think\Model;

/**
 * 新教师管理
 * 目标功能：
 * 链接数据库tp6
 * 增删改查
 * 分页
 * 模糊查询
 */

class NewTeacherController extends Controller
{
	
	public function index() 
	{
		$Teacher = new NewTeacher;
		$teachers = $Teacher->select();
		$this->assign('teachers',$teachers);
		return $this->fetch();
	}

	public function insert() 
	{
		// 写法一，先实例化一个数组，然后把数组里的数据赋给Teacher对象，并save
		// $teacher = array();
		// $teacher['name'] = '王五';
		// $teacher['sex'] = '1';
		// $teacher['email'] = 'wangwu@123.com';
		// $teacher['username'] = 'wangwu';
		// $Teacher = new NewTeacher;
		// $Teacher->data($teacher)->save();
		// return $Teacher->id;

		// 写法二：直接实例化一个NewTeacher类的对象Teacher，赋值，save
		// $Teacher = new NewTeacher;
		// $Teacher->name = '王五';
		// $Teacher->sex = '1';
		// $Teacher->email = 'wangwu@123.com';
		// $Teacher->username = 'wangwu';
		// $Teacher->save();
		// // 注意字符串和对象之间加"."，不然报错。
		// return '新增id：' . $Teacher->id;
		
		// 增加add功能
		$Teacher = new NewTeacher;
		$Teacher->name = input('post.name');
		$Teacher->sex = input('post.sex');
		$Teacher->username = input('post.username');
		$Teacher->email = input('post.username');
		$Teacher->save();
		return '新增id：' . $Teacher->id;
	}

	public function add() 
	{
		return $this->fetch();
	}

	public function delete() 
	{
		$Teacher = NewTeacher::get(input('param.id/d'));
		$Teacher->delete();
		return $this->success('删除成功',url('index'));
	}
}