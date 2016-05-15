<?php

use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
  const STATE_OPEN = 1;
  const TABLE = "states";

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
      DB::table(self::TABLE)->insert([
        "name" => "Open",
        "description" => "The task is still open, go for it!",
        "icon" => "fa fa-calendar-o",
        "created_at" => DB::raw('CURRENT_TIMESTAMP'),
        "updated_at" => DB::raw('CURRENT_TIMESTAMP')
      ]);

      DB::table(self::TABLE)->insert([
        "name" => "Developing",
        "description" => "The task is currently being developed",
        "icon" => "fa fa-paper-plane",
        "eraseable" => "0",
        "created_at" => DB::raw('CURRENT_TIMESTAMP'),
        "updated_at" => DB::raw('CURRENT_TIMESTAMP')
      ]);

      DB::table(self::TABLE)->insert([
        "name" => "Done",
        "description" => "The task is totally done :)",
        "icon" => "fa fa-calendar-check-o",
        "created_at" => DB::raw('CURRENT_TIMESTAMP'),
        "updated_at" => DB::raw('CURRENT_TIMESTAMP')
      ]);

      DB::table(self::TABLE)->insert([
        "name" => "Cancelled",
        "description" => "The task is cancelled cause it had no sense :S",
        "icon" => "fa fa-calendar-times-o",
        "created_at" => DB::raw('CURRENT_TIMESTAMP'),
        "updated_at" => DB::raw('CURRENT_TIMESTAMP')
      ]);

      DB::table('tasks')->update(['state_id' => self::STATE_OPEN]);
  }
}
