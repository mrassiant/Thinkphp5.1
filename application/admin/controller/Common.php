<?php

namespace app\admin\controller;

use think\Controller;

class Common extends Controller
{

 protected function initialize()
 {
  parent::initialize();


  if (!session("admin_user")) {
   /**
    * 如果没有session 则直接跳转登录页面
    */
   $this->redirect(url('/login', '', false));
  }

  $admin_user = session("admin_user");
  $ad = json_decode($admin_user);

  $this->assign('admin_user', $ad);
 }
}
