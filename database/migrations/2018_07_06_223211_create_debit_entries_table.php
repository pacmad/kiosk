<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDebitEntriesTable extends Migration
{
    public function up()
    {
        Schema::create('debit_entries', function (Blueprint $table) {
            $table->increments('id');
            $table->double('value')->nullable(false);
            $table->unsignedInteger('child_id')->nullable(false);
            $table->timestamps();

            $table->foreign('child_id')->references('id')->on('children')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('debit_entries');
    }
}
