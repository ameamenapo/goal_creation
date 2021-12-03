<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchievementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('theme');
            $table->integer('progress')->default(0);
            $table->foreignId('user_id')->constrained();
            //$table->foreign('user_id')->references('id')->on('users');こういう書き方もできるという例。
            $table->foreignId('goal_id')->references('id')->on('goals')
                                                                ->cascadeOnDelete()  // ON DELETE で CASCADE
                                                                ->cascadeOnUpdate(); // ON UPDATE で CASCADE
                                                                //上記の２行を足すことで、goalsテーブルのレコードを削除したらachievementsテーブルの紐づいたレコードも一緒に消してくれる。
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
        Schema::dropIfExists('achievements');
    }
}
