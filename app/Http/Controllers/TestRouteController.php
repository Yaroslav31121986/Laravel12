<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestRouteController extends Controller
{
    public $count = 0;
    public $limit = 5;

    public function index()
    {
        $test = ['test'];

        function foo(&$var) {
            $var++;
            var_dump($var);
        }

        $a = 5;
        foo($a);


//      $route = $this->route($test, $this->count, $this->limit);
//
//      dd($route);
    }

//    public function route($route_arr, $count, $limit)
//    {
//        $route_arr[] = ['test'];
//        foreach ($route_arr as $arrs){
//            if(is_array($arrs) ){
//                $this->count++;
//                if ($this->count == $this->limit){
//                    return $route_arr;
//                }
//                $this->route(&arrs, $this->count, $this->limit);
//            }
//        }
//    }
}
