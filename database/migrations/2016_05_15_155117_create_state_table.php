<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStateTable extends Migration
{

    const STATE_OPEN = 1;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name")->unique();
            $table->string("description");
            $table->string("icon");
            $table->boolean("eraseable")->default(true);
            $table->timestamps();
        });

        // Add state_id column to tasks table
        Schema::table('tasks', function($table){
          $table->integer("state_id")->default(self::STATE_OPEN)->after("id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('states');

        // Delete state_id column of tasks table
        Schema::table('tasks', function($table){
          $table->dropColumn("state_id");
        });

    }
}
