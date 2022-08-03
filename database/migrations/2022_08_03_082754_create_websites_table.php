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
        Schema::create('websites', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        DB::table('websites')->insert(array(
            array('id' => 1, 'name'=> 'Dell'),
            array('id' => 2, 'name'=> 'Samsung'),
            array('id' => 3, 'name'=> 'Apple'),
            array('id' => 4, 'name'=> 'Huawei'),
            array('id' => 5, 'name'=> 'Panasonic'),
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('websites');
    }
};
