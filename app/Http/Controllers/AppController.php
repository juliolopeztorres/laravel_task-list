<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    /**
     * Function to show the welcome template
     * @return View view of welcome template
     */
    public function displayWelcomePage()
    {
        if (Auth::guest()) {
          return view('welcome');
        }

        return (new TaskController)->display();
    }
}
