<form method="POST" action="{{ route('create') }}" aria-label="{{ __('Register User') }}">
    @csrf

    <div class="form-group row">
        <label for="u-name" class="col-md-5 col-form-label text-md-right">{{ __('Имя') }}</label>

        <div class="col-md-6">
            <input id="u-name" type="text" class="form-control" name="u_name">
        </div>
    </div>
    <div class="form-group row">
        <label for="u-surname" class="col-md-5 col-form-label text-md-right">{{ __('Фамилия') }}</label>

        <div class="col-md-6">
            <input id="u-surname" type="text" class="form-control" name="u_surname">
        </div>
    </div>
    <div class="form-group row">
        <label for="u-login" class="col-md-5 col-form-label text-md-right">{{ __('Логин') }}</label>

        <div class="col-md-6">
            <input id="u-login" type="text" class="form-control" name="u_login">
        </div>
    </div>
    <div class="form-group row">
        <label for="u-email" class="col-md-5 col-form-label text-md-right">{{ __('Email') }}</label>

        <div class="col-md-6">
            <input id="u-email" type="text" class="form-control" name="u_email">
        </div>
    </div>
    <div class="form-group row">
        <label for="u-mobile" class="col-md-5 col-form-label text-md-right">{{ __('Телефон в формате xxx-xxx-xxxx') }}</label>

        <div class="col-md-6">
            <input id="u-tell" type="text" class="form-control" name="u_phone">
        </div>
    </div>
    <div class="form-group row">
        <label for="password" class="col-md-5 col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control" name="password">
        </div>
    </div>

    <div class="form-group row">
        <label for="password_confirm" class="col-md-5 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

        <div class="col-md-6">
            <input id="password_confirm" type="password" class="form-control" name="password_confirmation">
        </div>
    </div>

    <div class="form-group row">
        <label for="positions" class="col-md-5 col-form-label text-md-right">{{ __('Должность') }}</label>

        <div class="col-md-6">
            <select class="form-control" id="positions" name="u_position">
                <option></option>
                @foreach($positions as $position)
                    <option value="{{ $position->upos_id }}">{{ $position->upos_name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="departments" class="col-md-5 col-form-label text-md-right">{{ __('Отдел') }}</label>

        <div class="col-md-6">
            <select class="form-control" id="departments" name="u_department">
                <option></option>
                @foreach($departments as $department)
                    <option value="{{ $department->dep_id }}">{{ $department->dep_name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="groups" class="col-md-5 col-form-label text-md-right">{{ __('Группа') }}</label>

        <div class="col-md-6">
            <select class="form-control" id="groups" name="u_group">
                <option></option>
                @foreach($groups as $group)
                    <option value="{{ $group->ugroups_id }}">{{ $group->ugroups_name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="u-lang" class="col-md-5 col-form-label text-md-right">{{ __('Язык интерфейса') }}</label>

        <div class="col-md-6">
            <select class="form-control" id="u-lang" name="u_lang">
                <option></option>
                @foreach($u_lang as $key => $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="u-active" class="col-md-5 col-form-label text-md-right">{{ __('Активность') }}</label>

        <div class="col-md-6">
            <select class="form-control" id="u-active" name="u_active">
                <option></option>
                @foreach($u_active as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="u-ip-restrict" class="col-md-5 col-form-label text-md-right">{{ __('Ограничение доступа') }}</label>

        <div class="col-md-6">
            <select class="form-control" id="u-ip-restrict" name="u_ip_restrict">
                <option></option>
                @foreach($u_ip_restrict as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="user-perm" class="col-md-5 col-form-label text-md-right">{!! __('Область видимости и </br> права доступа user') !!}</label>

        <div class="col-md-6">
            <select class="form-control" id="user-perm" name="user_perm[]" multiple="multiple">
                <option></option>
                @foreach($user_perms as $user_perm)
                    <option value="{{ $user_perm->up_id }}">{{ $user_perm->up_operation }} {{ $user_perm->up_access_level }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>
        </div>
    </div>
</form>
