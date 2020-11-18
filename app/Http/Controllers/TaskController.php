<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TaskController extends Controller
{     
    public function index(Request $request){
        
        return Http::get('https://jsonplaceholder.typicode.com/todos/1')->body();
        
  
    }
    
}
