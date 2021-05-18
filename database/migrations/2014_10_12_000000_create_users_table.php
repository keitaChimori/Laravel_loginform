<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('last_name',64);
            $table->string('first_name',64);
            $table->string('last_kana',64);
            $table->string('first_kana',64);
            $table->string('email')->unique();
            $table->string('tel',13)->unique();
            $table->string('password');
            $table->string('birthyear',4);
            $table->string('birthmonth',2);
            $table->string('birthday',2);
            $table->tinyInteger('gender')->unsigned();
            $table->string('post',7);
            $table->tinyInteger('prefecture');
            $table->string('address1');
            $table->string('address2');
            $table->tinyInteger('mailmagazin')->unsigned()->default(1);
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->tinyInteger('locked_flag')->default(0);
            $table->integer('error_count')->unsigned()->default(0);
            $table->softDeletes();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
