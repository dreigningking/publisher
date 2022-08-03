<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert(array(
            array('id' => 1, 'name'=> 'John Obi', 'email'=>'john@gmail.com','password'=> '$2y$10$ZxnL0COxkUv76zLvHofNWeUIOy5PRrUmD0v0mZ3sisITjQfoGb31q','created_at'=> now(),'updated_at'=> now()),
            array('id' => 2, 'name'=> 'Favour Tobi', 'email'=>'tobi@gmail.com','password'=> '$2y$10$ZxnL0COxkUv76zLvHofNWeUIOy5PRrUmD0v0mZ3sisITjQfoGb31q','created_at'=> now(),'updated_at'=> now()),
            array('id' => 3, 'name'=> 'Favour Thomas', 'email'=>'favour@gmail.com','password'=> '$2y$10$ZxnL0COxkUv76zLvHofNWeUIOy5PRrUmD0v0mZ3sisITjQfoGb31q','created_at'=> now(),'updated_at'=> now()),
            array('id' => 4, 'name'=> 'Mike Adedipe', 'email'=>'mike@gmail.com','password'=> '$2y$10$ZxnL0COxkUv76zLvHofNWeUIOy5PRrUmD0v0mZ3sisITjQfoGb31q','created_at'=> now(),'updated_at'=> now()),
            array('id' => 5, 'name'=> 'Bukky Olumide', 'email'=>'bukky@gmail.com','password'=> '$2y$10$ZxnL0COxkUv76zLvHofNWeUIOy5PRrUmD0v0mZ3sisITjQfoGb31q','created_at'=> now(),'updated_at'=> now()),
            array('id' => 6, 'name'=> 'Kasi Favour', 'email'=>'kaosi@gmail.com','password'=> '$2y$10$ZxnL0COxkUv76zLvHofNWeUIOy5PRrUmD0v0mZ3sisITjQfoGb31q','created_at'=> now(),'updated_at'=> now()),
            array('id' => 7, 'name'=> 'Adedipe Mercy', 'email'=>'mercy@gmail.com','password'=> '$2y$10$ZxnL0COxkUv76zLvHofNWeUIOy5PRrUmD0v0mZ3sisITjQfoGb31q','created_at'=> now(),'updated_at'=> now()),
            array('id' => 8, 'name'=> 'Gayman Tope', 'email'=>'tope@gmail.com','password'=> '$2y$10$ZxnL0COxkUv76zLvHofNWeUIOy5PRrUmD0v0mZ3sisITjQfoGb31q','created_at'=> now(),'updated_at'=> now()),
            array('id' => 9, 'name'=> 'Peace Adewale', 'email'=>'peace@gmail.com','password'=> '$2y$10$ZxnL0COxkUv76zLvHofNWeUIOy5PRrUmD0v0mZ3sisITjQfoGb31q','created_at'=> now(),'updated_at'=> now()),
            array('id' => 10, 'name'=> 'Helen Arthur', 'email'=>'helen@gmail.com','password'=> '$2y$10$ZxnL0COxkUv76zLvHofNWeUIOy5PRrUmD0v0mZ3sisITjQfoGb31q','created_at'=> now(),'updated_at'=> now()),
            array('id' => 11, 'name'=> 'Mark Olawole', 'email'=>'mark@gmail.com','password'=> '$2y$10$ZxnL0COxkUv76zLvHofNWeUIOy5PRrUmD0v0mZ3sisITjQfoGb31q','created_at'=> now(),'updated_at'=> now())
        
        ));
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
};
