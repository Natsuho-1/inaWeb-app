<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function menuadmin(){
        return view('menu.admin');
    }
}
