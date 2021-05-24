<?php

namespace app\admin\controller;

use think\Controller;

use think\captcha\Captcha;

class Login extends Controller
{
 public function index()
 {

  if (session("admin_user")) {
   $this->redirect(url('/admin', '', ''));
  } else {
   return  $this->fetch("user/login");
  }
 }

 public function makecode()
 {

  $code = new Captcha();
  return $code->entry();
 }

 public function checkcode()
 {
  $code = new Captcha();
  $result = array();
  // $param = request()->post('code');

  $code = request()->post('code');

  if (captcha_check($code)) {

   $result['msg'] = '登录成功';
   $result['code'] = 0;
  } else {
   $result['msg'] = '验证码错误';
   $result['code'] = 1;
  }
  return json($result);
 }

 public function checklogin()
 {



  if (request()->post()) {


   $param = request()->post();
   $code = $param['vercode'];
   if (!captcha_check($code)) {

    $result['msg'] = '验证码错误';
    $result['code'] = 404;

    return json($result);
   } else {

    $username = $param['username'];

    $password = $param['password'];

    $user =  db("user")->where('name', $username)->field(['id', 'name', 'password', 'email', 'nickname'])->find();
    if ($user) {

     if ($user['password'] == md5($password)) {


      unset($user['password']);
      session('admin_user', json_encode($user));
      return [
       'msg' => '登录成功',
       'code' => 200
      ];
     } else {
      return [
       'msg' => '用户名密码错误',
       'code' => 404
      ];
     }
    } else {
     return [
      'msg' =>  '用户名不存在',
      'code' => 404
     ];
    }
   }
  }
 }

 public function logout()
 {
  session('admin_user', null);
  return [
   'msg' => '退出成功',
   'code' => 0,
   'data' => null
  ];
 }
}
