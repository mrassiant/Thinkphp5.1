<?php

namespace app\admin\controller;

use app\admin\controller\Common;

use think\Db;
use think\Request;

class News extends Common
{

 public function index()
 {

  return $this->fetch('news/index');
 }

 public function getdata(Request $request)
 {
  $page = $request->param('page');
  $limit = $request->param('limit');
  $news = Db::table("tp_news")->page($page, $limit)->select();
  $count = Db::table('tp_news')->select();

  $all['code'] = 0;
  $all['msg'] = '';
  $all['count'] = count($count);
  $all['data'] = $news;
  // return  json_encode($all);
  echo  json_encode($all, JSON_UNESCAPED_UNICODE);
 }
}
