<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
// 「PHP/Laravel 08 ControllerとRoutingの関係について理解しよう」で追記
  public function add()
  {
      return view('admin.news.create');
  }
}
