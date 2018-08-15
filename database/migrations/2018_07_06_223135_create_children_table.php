<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildrenTable extends Migration
{
    public function up()
    {
        Schema::create('children', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->unsignedInteger('godparenthood_id')->nullable(false);
            $table->timestamps();

            $table->foreign('godparenthood_id')->references('id')->on('godparenthoods')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('children');
    }
}
