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
            $table->string('first_name',55);
            $table->string('last_name',55);
            $table->string('name',110);
            $table->string('mobile',15)->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->smallInteger('user_role')->default(2)->comment('1=>Admin, 2=>Users');
            $table->integer('gender')->default(0)->comment('1=>Male, 2=>Female');
            $table->string('city',255)->nullable();
            $table->string('address',755)->nullable();            
            $table->smallInteger('confirm_status')->default(0)->comment('Email confirmation(0=>not confirm, 1=> Confirmed)');
            $table->smallInteger('status')->default(0)->comment('0=>Inactivate, 1=> Activate');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
