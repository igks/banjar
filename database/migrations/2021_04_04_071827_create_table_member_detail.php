<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMemberDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_master_id')->references('id')->on('member_master');
            $table->string('name', 200);
            $table->tinyInteger('status');
            $table->string('phone', 16)->nullable();
            $table->boolean('isActive')->nullable();
            $table->boolean('isPay')->nullable();
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
        Schema::dropIfExists('member_detail');
    }
}