<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_master', function (Blueprint $table) {
            $table->id();
            $table->string('name',200);
            $table->text('address');
            $table->string('phone', 16);
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
        Schema::dropIfExists('member_master');
    }
}