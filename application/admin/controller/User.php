<?php

namespace app\admin\controller;

use app\admin\controller\Common;

use think\Db;

class User extends Common
{

 public function index()
 {

  $username = json_decode(session("admin_user"));
  $uid = $username->id;

  $userinfo = db("user")->where('id', $uid)->find();
  unset($userinfo['password']);

  $this->assign('userinfo', $userinfo);

  return $this->fetch("set/user/info");
 }

 public function update()
 {
  $param = request()->post();

  unset($param['name']);
  // unset($param['id']);

  $num  = Db::name('user')->where('id', $param['id'])->update($param);
  if ($num) {
   return json(['msg' => '更新成功', 'code' => 0]);
  } else {
   return json(['msg' => '更新失败', 'code' => -1]);
  }
 }
}
