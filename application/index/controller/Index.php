<?php

namespace app\index\controller;

use think\Controller;
// use think\facade\Request;

use think\facade\Request;



class Index extends Controller
{
 public function index()
 {
  $img = $_SERVER['DOCUMENT_ROOT'] . '/static/3.jpg';

  // $info = exif_imagetype($img);
  var_dump(exif_imagetype($img) === IMAGETYPE_WBMP);

  return 'hello world!';
 }

 public function hello($name = 'ThinkPHP5')
 {

  // $parrent = '/^\/book\/\d+(-\d+)?.html$/';

  // $str = "/book/123.html";
  // $ins = preg_match($parrent, $str);
  // dump($ins);

  return 123;
  // $req = Request::instance();
  // dump($req);


  // dump($_SERVER);
 }

 public function err()
 {
  return '404';
 }
}
