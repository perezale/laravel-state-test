<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('process_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('date_from');
            $table->timestamp('date_to');
            $table->unsignedBigInteger('camera_id');
            $table->string('state');
            $table->timestamps();
            $table->foreign('camera_id')->references('id')->on('cameras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('process_requests');
    }
}
