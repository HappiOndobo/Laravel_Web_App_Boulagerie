<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Commenting out the session table creation as it already exists.
        // Schema::create('sessions', function (Blueprint $table) {
        //     $table->string('id')->unique();
        //     $table->text('payload');
        //     $table->integer('last_activity')->index();
        // });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}