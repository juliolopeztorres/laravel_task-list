<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * Function to get the state associated to a Task
     * @return State state object
     */
    public function state()
    {
      return $this->belongsTo("App\State");
    }
}
