<?php

use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 10; $i++) {
          DB::table('tasks')->insert([
            "name" => "Task" . $i,
            "created_at" => DB::raw('CURRENT_TIMESTAMP'),
            "updated_at" => DB::raw('CURRENT_TIMESTAMP')
          ]);
        }
    }
}
