<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.09.2020
 * Time: 20:29
 */

namespace App\Http\Controllers;


class TestRoute3Controller
{
    public $route_arrs = [
        [
            'admin',
            'cucu'
        ],
        [
            'admin',
            'materials',
            'show',
            'frog',
        ],
        [
            'materials',
            'show'
        ],
        [
            'materials',
            'cucu'
        ],
        ];
    public $new_route = [];
    public $count = 0;
    public $limit;

    public function index()
    {
        foreach ($this->route_arrs as $foreach_arr) {
            $this->count = 0;
            $this->limit = count($foreach_arr) - 1;
            if (1 == count($foreach_arr)) {
                $this->tree($this->new_route, $foreach_arr);
            } else {
                $this->tree($this->new_route[$foreach_arr[$this->count++]], $foreach_arr);
            }
        }
        dd($this->new_route);
    }

    public function tree(&$arr, array $func_arr)
    {
        if ($this->count >= $this->limit) {
            $arr[$func_arr[$this->count]] = [];
        } else {
            $this->tree($arr[$func_arr[$this->count++]], $func_arr);
        }
    }
}