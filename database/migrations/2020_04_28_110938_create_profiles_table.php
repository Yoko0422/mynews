<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');// 14課題プロフィールの名前を保存するカラム
            $table->string('gender');// 14課題プロフィールの性別を保存するカラム
            $table->string('hobby');// 14課題プロフィールの趣味を保存するカラム
            $table->string('introduction');// 14課題プロフィールの自己紹介欄を保存するカラム
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
