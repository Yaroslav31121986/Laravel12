<form method="POST" action="{{ route('create_group') }}" aria-label="{{ __('Register Group') }}">
    @csrf
    <div class="form-group row">
        <label for="ugroups-name" class="col-md-5 col-form-label text-md-right">{{ __('Название Группы') }}</label>

        <div class="col-md-6">
            <input id="ugroups-name" type="text" class="form-control" name="ugroups_name">
        </div>
    </div>

    <div class="form-group row">
        <label for="ugroups-description" class="col-md-5 col-form-label text-md-right">{{ __('Описание Группы') }}</label>

        <div class="col-md-6">
            <textarea class="form-control" id="ugroups-description" rows="3" name="ugroups_description"></textarea>
        </div>
    </div>

    <div class="form-group row">
        <label for="groups-perm" class="col-md-5 col-form-label text-md-right">{!! __('Область видимости и </br> права доступа group') !!}</label>

        <div class="col-md-6">
            <select class="form-control" id="groups-perm" name="groups_perm[]" multiple="multiple">
                @foreach($groups_perm as $group_perm)
                    <option value="{{ $group_perm->ugp_id }}">{{ $group_perm->ugp_operation }} {{ $group_perm->ugp_access_level }}</option>
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
