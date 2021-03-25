<form method="POST" action="{{ route('create_perm') }}" aria-label="{{ __('Register Perm') }}">
    @csrf
    <div class="form-group row">
        <label for="operation" class="col-md-5 col-form-label text-md-right">{{ __('Название Perm') }}</label>

        <div class="col-md-6">
            <input id="operation" type="text" class="form-control" name="operation">
        </div>
    </div>

    <div class="form-group row">
        <label for="access-level" class="col-md-5 col-form-label text-md-right">{{ __('Уровень доступа') }}</label>

        <div class="col-md-6">
            <input id="access-level" type="text" class="form-control" name="access_level">
        </div>
    </div>

    <div class="form-group row">
        <label for="description" class="col-md-5 col-form-label text-md-right">{{ __('Описание доступа') }}</label>

        <div class="col-md-6">
            <textarea class="form-control" id="description" rows="3" name="description"></textarea>
        </div>
    </div>

    <div class="form-group row">
        <label for="notice" class="col-md-5 col-form-label text-md-right">{{ __('Примечание') }}</label>

        <div class="col-md-6">
            <textarea class="form-control" id="notice" rows="3" name="notice"></textarea>
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
