@extends('layouts.admin')

@section('content_admin')
    <div class="row">
        <div class="col-md-6 col-xl-1 a1"></div>
        <div class="col-md-6 col-xl-10 a2">
            <div class="justify-content-center px-lg-4 py-4 col-12">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">{{ __('User Access') }}</div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">№</th>
                                        <th scope="col">Имя</th>
                                        <th scope="col">Логин</th>
                                        <th scope="col">Телефон</th>
                                        <th scope="col">Группа</th>
                                        <th scope="col">Должности</th>
                                        <th scope="col">Департамент</th>
                                        <th scope="col">IP-restrict</th>
                                        <th scope="col">Действие</th>
                                    </tr>
                                    <tr>
                                        <form action="#" method="get">
                                            <th scope="col"></th>
                                            <th scope="col">
                                                <div class="form-group">
                                                    <input type="text" class="form-control search" name="u_name"
                                                           placeholder="Имя" id="u-name" @if(!empty(request()->u_name))
                                                           value="{{ request()->u_name }}" @endif>
                                                </div>
                                            </th>
                                            <th scope="col">
                                                <div class="form-group">
                                                    <input type="text" class="form-control search" name="u_login"
                                                           placeholder="Логин" id="u-login" @if(!empty(request()->u_login))
                                                    value="{{ request()->u_login }}" @endif>
                                                </div>
                                            </th>
                                            <th scope="col">
                                                <div class="form-group">
                                                    <input type="text" class="form-control search" name="u_phone"
                                                           @if(!empty(request()->u_phone))
                                                           value="{{ request()->u_phone }}" @endif
                                                           placeholder="Телефон" id="u-phone">
                                                </div>
                                            </th>
                                            <th scope="col">
                                                <div class="form-group">
                                                    <select class="form-control search" name="u_group" id="u-group">
                                                        <option></option>
                                                        @foreach($groups as $group)
                                                            @if($group->ugroups_id == request()->u_group)
                                                                <option selected value="{{ $group->ugroups_id }}">
                                                            @else
                                                                <option value="{{ $group->ugroups_id }}">
                                                            @endif
                                                                {{ $group->ugroups_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </th>
                                            <th scope="col">
                                                <div class="form-group">
                                                    <select class="form-control search" name="u_position" id="u-position">
                                                        <option></option>
                                                        @foreach($positions as $position)
                                                            @if($position->upos_id == request()->u_position)
                                                                <option selected value="{{ $position->upos_id }}">
                                                            @else
                                                                <option value="{{ $position->upos_id }}">
                                                            @endif
                                                                {{ $position->upos_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </th>
                                            <th scope="col">
                                                <div class="form-group">
                                                    <select class="form-control search" name="u_department" id="u-department">
                                                        <option></option>
                                                        @foreach($departments as $department)
                                                            @if($department->dep_id == request()->u_department)
                                                                <option selected value="{{ $department->dep_id }}">
                                                            @else
                                                                <option value="{{ $department->dep_id }}">
                                                            @endif
                                                                {{ $department->dep_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </th>
                                            <th scope="col">
                                                <div class="form-group">
                                                    <select class="form-control search" name="u_ip_restrict" id="u-ip-restrict">
                                                        <option>
                                                        </option>
                                                        @foreach($ips as $ip)
                                                            @if($ip->u_ip_restrict === 1)
                                                                <option value="{{ $ip->u_ip_restrict }}">
                                                                    Да
                                                                </option>
                                                            @else
                                                                <option value="{{ $ip->u_ip_restrict }}">
                                                                    Нет
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </th>
                                        </form>
                                    </tr>
                                    </thead>
                                    <tbody id="table-user">
                                    @foreach($users as $user)
                                        @if($user->u_active == 0)
                                            <tr class="grey">
                                        @else
                                            <tr>
                                        @endif
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $user->u_name }}</td>
                                        <td>{{ $user->u_login }}</td>
                                        <td>{{ $user->u_phone }}</td>
                                            @if(!empty($user->usersGroups->ugroups_name))
                                        <td>{{ $user->usersGroups->ugroups_name }}</td>
                                            @else
                                                <td></td>
                                            @endif
                                            @if(!empty($user->position->upos_name))
                                        <td>{{ $user->position->upos_name }}</td>
                                            @else
                                                <td></td>
                                            @endif
                                            @if(!empty($user->department->dep_name))
                                                <td>{{ $user->department->dep_name }}</td>
                                            @else
                                                <td></td>
                                            @endif
                                        <td>
                                            @if($user->u_ip_restrict === 1)
                                                <i class="fas fa-check"></i>
                                            @endif
                                        </td>
                                        <td><i class="far fa-file"></i></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row margin-page">
                            <div class="col-md-6 col-xl-12 a2">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-1 a3"></div>
    </div>
    <script src="{{asset('js/admin/search.js')}}"></script>
@endsection
