<?php

namespace App\Http\Controllers\Admin;

use App\Models\UserGroupsPerm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UsersGroups;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class GroupAccess extends Controller
{
    public function showGroups()
    {
        //достаем список всех групп
        $groups = UsersGroups::with('usersGroupsPerms:ugp_operation,ugp_access_level')->get([
            'ugroups_id',
            'ugroups_name',
            'ugroups_who_create',
            'ugroups_who_lastedit',
            'created_at',
            'updated_at',
        ]);

         return json_encode($groups);
    }

    public function createForm()
    {
        $groups_perm = UserGroupsPerm::all();

        return view('admin.layouts.group', ['groups_perm' => $groups_perm]);
    }

    public function createGroup(Request $request)
    {
        //указываем правила валидации
        $validator = Validator::make($request->all(), [
            'ugroups_name' => 'required|max:255',
            'ugroups_description' => 'required',
            'groups_perm' => 'required',
        ]);

        //если валидацию не прошли отправляем сообщение об ошибки
        if ($validator->fails()) {
            $messages = $validator->messages();
            return json_encode($messages);
        }

        //сохраняем группу и указываем ей права
        $group = UsersGroups::create([
            'ugroups_name' => $request->ugroups_name,
            'ugroups_description' => $request->ugroups_description,
            'ugroups_who_create' => Auth::user()->id,
        ]);

        $group->usersGroupsPerms()->attach($request->groups_perm);

        return json_encode('Группа '. $request->ugroups_name .' успешно добавлена');
    }

    public function groupView($id)
    {
        $group = UsersGroups::with('usersGroupsPerms:ugp_operation,ugp_access_level')->find($id,[
            'ugroups_id',
            'ugroups_name',
            'ugroups_who_create',
            'ugroups_who_lastedit',
            'created_at',
            'updated_at',
        ]);

        return json_encode($group);
    }

    public function updateGroups(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'ugroups_name' => 'required|max:255',
            'ugroups_description' => 'required',
            'groups_perm' => 'required',
        ]);

        //если валидацию не прошли отправляем сообщение об ошибки
        if ($validator->fails()) {
            $messages = $validator->messages();
            return json_encode($messages);
        }

        $group = UsersGroups::find($id);
        $group->ugroups_name = $request->ugroups_name;
        $group->ugroups_description = $request->ugroups_description;
        $group->ugroups_who_lastedit = Auth::user()->id;
        $group->save();

        $group->usersGroupsPerms()->detach();
        $group->usersGroupsPerms()->attach($request->groups_perm);

        $massag = 'Группа '. $request->u_name .' успешно изменена';
        return json_encode($massag);
    }
}
