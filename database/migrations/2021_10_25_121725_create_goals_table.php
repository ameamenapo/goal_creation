<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('theme');
            $table->string('first_day');
            $table->string('second_day');
            $table->string('third_day');
            $table->string('fourth_day');
            $table->string('fifth_day');
            $table->string('sixth_day');
            $table->string('seventh_day');
            $table->foreignId('user_id')->constrained(); //本来は、この（）の中に紐付けたいテーブル名を入れる。
            //$table->softDeletes('deleted_at', 0);
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
        Schema::dropIfExists('goals');
    }
}
