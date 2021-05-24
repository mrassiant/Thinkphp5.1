<?php

namespace app\admin\controller;

use think\Controller;

use think\facade\Request;

use think\Db;

class Upload extends Controller
{

 public function upload()
 {
  // request()->file('file');
  $files = request()->file('file');

  // $ps = Request::post();




  if ($files) {

   $info = $files->move('../uploads');

   if ($info) {
    $results = array();
    $results['status'] = 0;
    $results['url'] = '../uploads/' . $info->getSavename();
    return json($results);
   } else {
    echo $files->getError();
   }
  }


  // $info = $file->move('../uploads');
  // if ($info) {

  //  echo $info->getSavename();
  // } else {
  //  echo $file->getError();
  // }
 }

 public function update()
 {
  $params = Request::get();


  $web_name = $params['web_name'];
  $web_host = $params['web_host'];
  $web_cache = $params['web_cache'];
  $web_upsize = $params['web_upsize'];
  $web_filetype = $params['web_filetype'];
  $web_title = $params['web_title'];
  $web_keywords = $params['web_keywords'];
  $web_desc = $params['web_desc'];
  $web_copyright = $params['web_copyright'];
  $web_logo = $params['web_logo'];

  $res = Db::name("website")->where('id', 1)->data(['web_name' => $web_name, 'web_host' => $web_host, 'web_cache' => $web_cache, 'web_upsize' => $web_upsize, 'web_filetype' => $web_filetype, 'web_title' => $web_title, 'web_keywords' => $web_keywords, 'web_desc' => $web_desc, 'web_copyright' => $web_copyright, 'web_logo' => $web_logo,])->update();
  $result = array();
  if ($res) {

   $result['msg'] = '更新成功';
   $result['code'] = 0;
  } else {
   $result['msg'] =  '更新失败';
   $result['code'] = -1;
  }

  return json($result);
 }
}
