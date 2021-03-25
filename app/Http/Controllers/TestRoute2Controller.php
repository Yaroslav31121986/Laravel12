<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestRoute2Controller extends Controller
{
    public $array_routes = [
        [
            'message',
        ],
        [
            'admin',
        ],
        [
            'admin',
            'materials',
        ],
        [
            'admin',
            'materials',
            'create',
            'good',
        ],
        [
            'admin',
            'materials',
            'show',
        ],
        [
            'materials',
            'show',
        ],
    ];
    public $tree_route = [];
    public $this_array_route;
    public $this_route;


    public function index()
    {
        foreach ($this->array_routes as $array_route){
            for ($i = 0; $i < count($array_route); $i++){
                if ($i == 0) {
                    if (!array_key_exists($array_route[$i], $this->tree_route)) {
                        $this->tree_route[$array_route[$i]] = [];
                    }
                }
            }
        }

        foreach ($this->array_routes as $array_route) {
            if (1 < count($array_route)) {
                $this->this_array_route = $array_route;
                for ($b = 0; $b < count($array_route); $b++) {
                    $this->this_route = $array_route[$b];
                }
                print_r($this->this_route);
                echo '<br>';
//                $this->tree_route[$array_route[0]] = $this->tree($this->this_route, $this->tree_route[$this->this_array_route[0]],0, count($array_route));
            }
        }

//        dd($this->tree_route);
    }

    public function tree(array $route, $element, $count, $index_this)
    {

    }
}
