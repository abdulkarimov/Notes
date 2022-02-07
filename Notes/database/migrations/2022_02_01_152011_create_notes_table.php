<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('text');
            $table->dateTime('now_date')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable();
            $table->date('send_date');
            $table->integer('priority');
            $table->foreign('priority')->references('id')->on('priorities');
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
        Schema::dropIfExists('notes');
    }
}
