<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('account_id');
            $table->unsignedInteger('faculty_id');
            $table->integer('account_number');
            $table->string('activity_type');
            $table->string('activity_desc');
            $table->string('budget_type');
            $table->integer('amount');
            $table->timestamps();
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entries');
    }
}
