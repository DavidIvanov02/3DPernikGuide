<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFortressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fortress', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('total_count')->nullable();
            $table->timestamp('last_visit')->nullable();
            $table->date('date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fortress');
    }
}
