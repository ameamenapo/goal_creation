<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('nickname')->default('名無しさん');
            $table->string('profile_image')->default('default.png');
            $table->integer('age');
            $table->string('hobby');
            $table->string('a_word');
            $table->foreignId('user_id')->constrained();//laravel7からこういう簡易的な書き方が可能になった。user_idに関してのみ。
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
