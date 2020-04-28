<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    // PHP08課題5
     public function add()
    {
        return view('admin.profile.create');
    }

    public function create(Request $request)
  {
      // 以下を追記
      // Varidationを行う
      $this->validate($request, Profile::$rules);

      $profile = new Profile;
      $form = $request->all();

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);

      // データベースに保存する
      $profile->fill($form);
      $profile->save();

      return redirect('admin/profile/create');
  }


   // PHP/Laravel 16 投稿したニュースを更新/削除しよう

 public function edit(Request $request)
  {
      // News Modelからデータを取得する
      $profile = Profile::find($request->id);
      if (empty($profile)) {
        abort(404);    
      }
      return view('admin.profile.edit', ['profile_form' => $profile]);
  }

    public function update()
    {
        return redirect('admin/profile/edit');
    }
    
  
}
