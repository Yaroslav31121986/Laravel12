<?php

namespace App\Http\Controllers\Admin;

use App\Models\UserPerm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\UsersGroups;
use App\Models\Positions;
use App\Models\Departments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserAccess extends Controller
{
    protected const PAGINATE = 15;

    public function show()
    {
        $users = User::with('position', 'department', 'usersGroups', 'userPerm')->get()->toArray();

        return response()->json($users, 200);
    }

    public function search(Request $request)
    {
        $u_name = $request->u_name;
        $u_login = $request->u_login;
        $u_phone = $request->u_phone;
        $u_group = $request->u_group;
        $u_position = $request->u_position;
        $u_department = $request->u_department;
        $u_ip_restrict = $request->u_ip_restrict;

        $groups = UsersGroups::all('ugroups_id', 'ugroups_name');
        $positions = Positions::all('upos_id', 'upos_name');
        $departments = Departments::all('dep_id', 'dep_name');
        $ips = User::all('u_ip_restrict')->unique('u_ip_restrict');

        $users = User::with('UsersGroups', 'position', 'department');

        if (!empty($u_name)) {
            $users = $users->where('u_name','like', '%'.$u_name.'%');
        }
        if (!empty($u_login)) {
            $users = $users->where('u_login','like', '%'.$u_login.'%');
        }
        if (!empty($u_phone)) {
            $users = $users->where('u_phone','like', '%'.$u_phone.'%');
        }
        if (!empty($u_group)) {
            $users = $users->whereHas('UsersGroups', function ($query) use ($u_group) {
                $query->where('ugroups_id', $u_group);
            });
        }
        if (!empty($u_position)) {
            $users = $users->whereHas('position', function ($query) use ($u_position) {
                $query->where('upos_id', $u_position);
            });
        }
        if (!empty($u_department)) {
            $users = $users->whereHas('department', function ($query) use ($u_department) {
                $query->where('dep_id', $u_department);
            });
        }
        if (!empty($u_ip_restrict) || $u_ip_restrict == '0') {
            $users = $users->where('u_ip_restrict',$u_ip_restrict);
        }

        $users = $users->paginate(self::PAGINATE)->withPath("?" . $request->getQueryString());

        return view('admin.user_access', [
            'users' => $users,
            'groups' => $groups,
            'positions' => $positions,
            'departments' => $departments,
            'ips' => $ips,
        ]);
    }

    public function userView($id)
    {
        $user = User::findOrFail($id);

        $user_json = [];

        $user_json += [
            'id' => $user->id,
            'u_name' => $user->u_name,
            'u_surname' => $user->u_surname,
            'u_login' => $user->u_login,
            'u_email' => $user->u_email,
            'u_phone' => $user->u_phone,
            'positions' => $user->position->upos_name,
            'departments' => $user->department->dep_name,
            'users_groups' => $user->usersGroups->ugroups_name,
            'u_lang' => $user->u_lang,
            'u_active' => $user->u_active,
            'u_ip_restrict' => $user->u_ip_restrict,
            'u_ip_list' => $user->u_ip_list,
            'user_perm' => [],
        ];

        if ($user->userPerm->first()) {
            foreach ($user->userPerm as $perm) {
                $user_json['user_perm'] += [
                    $perm->up_operation => $perm->up_access_level,
                ];
            }
        }

        if ($user->usersGroups->usersGroupsPerms) {
            foreach ($user->usersGroups->usersGroupsPerms as $perm) {
                $user_json['user_perm'] += [
                    $perm->ugp_operation => $perm->ugp_access_level,
                ];
            }
        }

        return $user_json;
    }

    public function usersView()
    {
        $users = User::all();
        $user_json = [];
        $count = 0;

        foreach ($users as $user) {
            $user_json[] = [
                'id' => $user->id,
                'u_name' => $user->u_name,
                'u_surname' => $user->u_surname,
                'u_login' => $user->u_login,
                'u_email' => $user->u_email,
                'u_phone' => $user->u_phone,
                'positions' => $user->position->upos_name ?? NULL,
                'departments' => $user->department->dep_name ??  NULL,
                'users_groups' => $user->usersGroups->ugroups_name,
                'u_lang' => $user->u_lang,
                'u_active' => $user->u_active,
                'u_ip_restrict' => $user->u_ip_restrict,
                'u_ip_list' => $user->u_ip_list,
                'user_perm' => [],
            ];

            if ($user->userPerm->first()) {
                foreach ($user->userPerm as $perm) {
                    $user_json[$count]['user_perm'] += [
                        $perm->up_operation => $perm->up_access_level,
                    ];
                }
            }

            if ($user->usersGroups->usersGroupsPerms) {
                foreach ($user->usersGroups->usersGroupsPerms as $perm) {
                    $user_json[$count]['user_perm'] += [
                        $perm->ugp_operation => $perm->ugp_access_level,
                    ];
                }
            }

            ++$count;
        }

        return $user_json;
    }

    public function createForm()
    {
        $positions = Positions::all(['upos_id', 'upos_name']);
        $departments = Departments::all(['dep_id', 'dep_name']);
        $groups = UsersGroups::all(['ugroups_id', 'ugroups_name']);
        $user_perms = UserPerm::all(['up_id', 'up_operation', 'up_access_level']);
        $u_lang = ['en','ru','ua'];
        $u_active = ['Нет', 'Да'];
        $u_ip_restrict = ['Нет', 'Да'];

        return view('admin.layouts.body', [
            'positions' => $positions,
            'departments' => $departments,
            'groups' => $groups,
            'u_lang' => $u_lang,
            'u_active' => $u_active,
            'u_ip_restrict' => $u_ip_restrict,
            'user_perms' => $user_perms,
        ]);
    }

    public function createUser(Request $request)
    {
        //указываем правила валидации
        $validator = Validator::make($request->all(), [
            'u_name' => 'required|max:255',
            'u_surname' => 'required|max:255',
            'u_login' => 'required|max:255|unique:users',
            'u_email' => 'required|max:255|email',
            'u_phone' => 'required|regex:/^([+]?380[0-9]{9})$/i',
            'password' => 'required|max:255|min:5|confirmed',
            'u_position' => 'required',
            'u_department' => 'required',
            'u_group' => 'required',
            'u_lang' => 'required',
            'u_active' => 'required',
            'u_ip_restrict' => 'required',
            'user_perm' => 'required',
        ]);

        //если валидацию не прошли отправляем сообщение об ошибки
        if ($validator->fails()) {
            $messages = $validator->messages();
            return json_encode($messages);
        }

        //сохнаняем user
        $user = User::create([
            'u_name' => $request->u_name,
            'u_login' => $request->u_login,
            'u_surname' => $request->u_surname,
            'u_email' => $request->u_email,
            'u_phone' => $request->u_phone,
            'password' => Hash::make($request->password),
            'u_group' => $request->u_group,
            'u_lang' => $request->u_lang,
            'u_position' => $request->u_position,
            'u_department' => $request->u_department,
            'u_active' => $request->u_active,
            'u_ip_restrict' => $request->u_ip_restrict,
            'u_who_create' => Auth::user()->id,
        ]);

        $user->userPerm()->attach($request->user_perm);

        return json_encode('Пользаватель '. $request->u_name .' успешно добавлен');
    }

    public function updateUser(Request $request, $id)
    {
        //указываем правила валидации
        $validator = Validator::make($request->all(), [
            'u_name' => 'required|max:255',
            'u_surname' => 'required|max:255',
            'u_login' => 'required|max:255',
            'u_email' => 'required|max:255|email',
            'u_phone' => 'required|regex:/^([+]?380[0-9]{9})$/i',
            'password' => 'required|max:255|min:5|confirmed',
            'u_position' => 'required',
            'u_department' => 'required',
            'u_group' => 'required',
            'u_lang' => 'required',
            'u_active' => 'required',
            'u_ip_restrict' => 'required',
            'user_perm' => 'required',
        ]);

        //если валидацию не прошли отправляем сообщение об ошибки
        if ($validator->fails()) {
            $messages = $validator->messages();
            return json_encode($messages);
        }

        //проверяем есть ли такой Логин в БД не учитывая текущего пользователя
        $search_log = User::where('u_login', $request->u_login)->where('id', '<>', $id)->get()->first();

        if ($search_log) {
            $massag = 'Такой логин: '. $request->u_login .' уже существует';
            return json_encode($massag);
        }

        //проверяем есть ли такой email в БД не учитывая текущего пользователя
        $search_email = User::where('u_email', $request->u_email)->where('id', '<>', $id)->get()->first();

        if ($search_email) {
            $massag = 'Такой email: '. $request->u_email .' уже существует';
            return json_encode($massag);
        }

        //изменяем user
        $user = User::findOrFail($id);
        $user->u_name = $request->u_name;
        $user->u_surname = $request->u_surname;
        $user->u_login = $request->u_login;
        $user->u_email = $request->u_email;
        $user->u_phone = $request->u_phone;
        $user->password = Hash::make($request->password);
        $user->u_position = $request->u_position;
        $user->u_department = $request->u_department;
        $user->u_group = $request->u_group;
        $user->u_lang = $request->u_lang;
        $user->u_active = $request->u_active;
        $user->u_ip_restrict = $request->u_ip_restrict;
        $user->u_who_lastedit = Auth::user()->id;
        $user->save();

        //добавляем user Область видимости и права доступа
        if (empty($user->userPerm->first())) {
            $user->userPerm()->attach($request->user_perm);
        } else {
            foreach ($request->user_perm as $key => $value) {
                if ($user->userPerm->where('up_id', $value)->first()) {
                    continue;
                } else {
                    $user->userPerm()->attach($value);
                }
            }
            foreach ($user->userPerm as $perm) {
                if (in_array($perm->up_id, $request->user_perm)) {
                    continue;
                } else {
                    $user->userPerm()->detach($perm->up_id);
                }
            }
        }

        $massag = 'Пользаватель '. $request->u_name .' успешно изменен';
        return json_encode($massag);
    }
}

