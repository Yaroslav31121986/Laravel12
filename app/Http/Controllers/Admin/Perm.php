<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserPerm;
use App\Models\UserGroupsPerm;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class Perm extends Controller
{
    /**
     * @return false|string (возвращяет список всех Perm в json формате)
     */
    public function showPerm()
    {
        $groups_perm = UserGroupsPerm::all();
        $perm = [];

        foreach ($groups_perm as $group_perm) {
            $perm[] = [
                'operation' => $group_perm->ugp_operation,
                'access_level' => $group_perm->ugp_access_level,
                'who_create' => $group_perm->ugp_who_create,
                'who_lastedit' => $group_perm->ugp_who_lastedit,
                'created_at' => $group_perm->created_at,
                'updated_at' => $group_perm->updated_at,
            ];
        }

        return json_encode($perm);
    }

    public function createForm()
    {
        return view('admin.layouts.perm');
    }

    public function createPerm(Request $request)
    {
        //указываем правила валидации
        $validator = Validator::make($request->all(), [
            'operation' => 'required|max:255',
            'access_level' => 'required|max:255',
            'description' => 'required',
            'notice' => 'required',
        ]);

        //если валидацию не прошли отправляем сообщение об ошибки
        if ($validator->fails()) {
            $messages = $validator->messages();
            return json_encode($messages);
        }

        $perms = $request->all();
        $group_perms = [];
        $user_perms = [];
        unset($perms['_token']);

        foreach ($perms as $perm => $value) {
            $group_perms += ["ugp_".$perm."" => $value];
        }

        $group_perms += ["ugp_who_create" => Auth::user()->id];

        foreach ($perms as $perm => $value) {
            $user_perms += ["up_".$perm."" => $value];
        }

        $user_perms += ["u_who_create" => Auth::user()->id];

        UserGroupsPerm::create($group_perms);
        UserPerm::create($user_perms);

        return json_encode('Perm '. $request->operation .' успешно добавлен');
    }

    public function deletePerm($id)
    {
        $group_perm = UserGroupsPerm::find($id);
        $user_perms = UserPerm::where('up_operation', $group_perm->ugp_operation)
            ->where('up_access_level', $group_perm->ugp_access_level)->get()->first();
        $massage = $group_perm->ugp_operation;
        $group_perm->delete();
        $user_perms->delete();

        return json_encode('Perm '. $massage .' успешно удален');
    }
}
