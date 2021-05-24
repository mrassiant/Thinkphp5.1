<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

use app\admin\model\Website;

use think\facade\Env;

use app\admin\controller\Common;

class Index extends Common
{
 /**
  * 显示资源列表
  *
  * @return \think\Response
  */
 public function index()
 {

  // dump(session('admin_user'));
  return $this->fetch("/index");
 }

 public function console()
 {
  return $this->fetch("home/console");
 }

 public function homea()
 {
  return $this->fetch("home/homepage1");
 }

 public function homeb()
 {
  return $this->fetch("home/homepage2");
 }


 public function homeland()
 {
  $website = Website::get(1);
  $this->assign('webinfo', $website);
  // echo Env::get("app_path");

  return $this->fetch('home/homeland');
 }



 /**
  * 显示创建资源表单页.
  *
  * @return \think\Response
  */
 public function create()
 {
  //
 }

 /**
  * 保存新建的资源
  *
  * @param  \think\Request  $request
  * @return \think\Response
  */
 public function save(Request $request)
 {
  //
 }

 /**
  * 显示指定的资源
  *
  * @param  int  $id
  * @return \think\Response
  */
 public function read($id)
 {
  //
 }

 /**
  * 显示编辑资源表单页.
  *
  * @param  int  $id
  * @return \think\Response
  */
 public function edit($id)
 {
  //
 }

 /**
  * 保存更新的资源
  *
  * @param  \think\Request  $request
  * @param  int  $id
  * @return \think\Response
  */
 public function update(Request $request, $id)
 {
  //
 }

 /**
  * 删除指定资源
  *
  * @param  int  $id
  * @return \think\Response
  */
 public function delete($id)
 {
  //
 }
}
