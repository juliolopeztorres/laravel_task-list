<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add description column to tasks table
        Schema::table('tasks', function($table){
          $table->string("description")->default("")->after("name");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Delete description column of tasks table
        Schema::table('tasks', function($table){
          $table->dropColumn("description");
        });
    }
}
