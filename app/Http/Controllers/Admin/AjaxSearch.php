<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxSearch extends Controller
{
    protected const PAGINATE = 15;

    public function search(Request $request)
    {
        $u_name = $request->u_name;
        $u_login = $request->u_login;
        $u_phone = $request->u_phone;
        $u_group = $request->u_group;
        $u_position = $request->u_position;
        $u_department = $request->u_department;
        $u_ip_restrict = $request->u_ip_restrict;

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

        $table = '';
        $paginate = '';
        $count_page = 1;
        $count_row = 1;
        $arr_html = [];

        foreach ($users as $user)
        {
            if ($user->u_active == 0){
                $table .= '<tr class="grey">';
            } else {
                $table .= '<tr>';
            }
            $table .= '<td>'. $count_row++ .'</td>';
            $table .= '<td>'. $user->u_name .'';
            $table .= '<td>'. $user->u_login .'</td>';
            $table .= '<td>'. $user->u_phone .'</td>';
            $table .= '<td>'. $user->usersGroups->ugroups_name .'</td>';
            $table .= '<td>'. $user->position->upos_name .'</td>';
            $table .= '<td>'. $user->department->dep_name .'</td>';

            if ($user->u_ip_restrict === 1) {
                $table .= '<td><i class="fas fa-check"></i></td>';
            } else {
                $table .= '<td></td>';
            }
            $table .= '<td><i class="far fa-file"></i></td>';
            $table .= '</tr>';
        }

        if ($users->LastPage() > 1) {

            $paginate .= '<li class="page-item disabled" aria-disabled="true" aria-label="« Previous" id="test">'.
                '<span class="page-link" aria-hidden="true">‹</span></li>';
            $paginate .= '<li class="page-item active" aria-current="page"><span class="page-link">1</span></li>';

            for ($i = 2; $i <= $users->LastPage(); $i++) {
                $paginate .= '<li class="page-item"><a class="page-link" href="http://l12.stspecmontag.com.ua/admin/user/search?u_name='.
                    $u_name.'&u_login='.$u_login.'&u_phone='.$u_phone.'&u_group='.$u_group.'&u_position='.$u_position.'&u_department='.$u_department.'&u_ip_restrict='.$u_ip_restrict.'&page='.$i.'">'.$i.'</a></li>';
            }
            $paginate .= '<li class="page-item">'
               .'<a class="page-link" href="http://l12.stspecmontag.com.ua/admin/user/search?u_name='.
                $u_name.'&u_login='.$u_login.'&u_phone='.$u_phone.'&u_group='.$u_group.'&u_position='.$u_position.'&u_department='.$u_department.'&u_ip_restrict='.$u_ip_restrict.'&page='.$users->LastPage().'">›</a>'.
            '</li>';
        }

        $arr_html[] = $table;
        $arr_html[] = $paginate;

        return json_encode($arr_html);
    }
}
