<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = array('id');
    //　14課題
    public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
        'hobby' => 'required',
        'introduction' => 'required',
    );
    
    // PHP17課題
    // Profileモデルに関連付けを行う
    public function phistories()
    {
      return $this->hasMany('App\Phistory');

    }

}
