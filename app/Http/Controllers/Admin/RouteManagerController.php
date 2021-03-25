<?php

namespace App\Http\Controllers\Admin;

use App\Models\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class RouteManagerController extends Controller
{
    public $routers;
    public $count;
    public $limit;
    public $array_routers;
    public $one_router;
    public $new_route = [];

    public function index()
    {
        $user_id = Auth::user()->id;

        $routers_groups = Route::whereHas('userGroupsPerm', function (Builder $query) use ($user_id){
            $query->whereHas('usersGroups', function (Builder $query2) use ($user_id){
                $query2->whereHas('users', function (Builder $query3) use ($user_id){
                    $query3->where('users.id', '=', $user_id);
                });
            });
        })->pluck('r_path')->toArray();

        $routers_user = Route::whereHas('userPerm', function (Builder $query4) use ($user_id){
            $query4->whereHas('users', function (Builder $query5) use ($user_id){
                $query5->where('users.id', '=', $user_id);
            });
        })->pluck('r_path')->toArray();

        $this->routers = $routers_groups;

        //формируем массив всех доступных маршрутов для данного пользователя
        foreach ($routers_user as $key => $value){
            if(!in_array($value, $routers_groups)){
                $this->routers[] = $value;
            }
        }

        //Удаляем ненужные маршруты (/, login, logout)
        foreach ($this->routers as $router){
            if ($router === '/' || strpos($router, 'login') || strpos($router, 'logout')){
                continue;
            }
            $this->array_routers[] = explode( '/', $router );
        }

        //Удаляем в массиве пустые ячейки ""
        foreach ($this->array_routers as $array => $val){
            foreach ($val as $key => $value){
                if($value === ""){
                    unset($this->array_routers[$array][$key]);
                }
            }
        }

        //формируем дерево маршрутов
        foreach ($this->array_routers as $foreach_arrs) {
            $this->count = 1;
            $this->limit = count($foreach_arrs) - 1;

            if (1 == count($foreach_arrs)) {
                $this->tree($this->new_route, $foreach_arrs);
            } else {
                $this->tree($this->new_route[$foreach_arrs[$this->count++]], $foreach_arrs);
            }
        }
        return json_encode($this->new_route);
    }

    //функция формирует дерево маршрутов
    public function tree(&$arrs, array $func_arr)
    {
        if ($this->count >= $this->limit) {
            $arrs[$func_arr[$this->count]] = [];
        } else {
            $this->tree($arrs[$func_arr[$this->count++]], $func_arr);
        }
    }

}
