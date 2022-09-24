<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //

    public function index(){
        $testVar = 'sasfasf';
        var_dump($testVar);  //log data
        dd($testVar);        //log data with stop code
//        return('test');
    }


}
