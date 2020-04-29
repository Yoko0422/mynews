<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 以下を追記することでProfile Modelが扱えるようになる。PHP/Laravel 14 投稿データを保存しよう
use App\Profile;

// PHP17課題以下を追記
use App\Phistory;
use Carbon\Carbon;


class ProfileController extends Controller
{
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

      return redirect('admin/profile/');
  }

// PHP/Laravel 15 投稿したニュース一覧を表示しよう
 public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Profile::where('title', $cond_title)->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = Profile::all();
      }
      return view('admin.profile.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }

// PHP/Laravel 16 投稿したニュースを更新/削除しよう

 public function edit(Request $request)
  {
      // Profile Modelからデータを取得する
      $profile = Profile::find($request->id);
      if (empty($profile)) {
        abort(404);    
      }
      return view('admin.profile.edit', ['profile_form' => $profile]);
  }


  public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Profile::$rules);
      // Profile Modelからデータを取得する
      $profile = Profile::find($request->id);
      // 送信されてきたフォームデータを格納する
      $profile_form = $request->all();
      unset($profile_form['_token']);
      
      // 該当するデータを上書きして保存する
      $profile->fill($profile_form)->save();

       // PHP17課題以下を追記
        $phistory = new Phistory;
        $phistory->profile_id = $profile->id;
        $phistory->edited_at = Carbon::now();
        $phistory->save();

      return redirect('admin/profile/');
  }
  
// PHP/Laravel 16 投稿したニュースを更新/削除しよう　　
  public function delete(Request $request)
  {
      // 該当するProfile Modelを取得
      $profile = Profile::find($request->id);
      // 削除する
      $profile->delete();
      return redirect('admin/profile/');
  }  


}