<form method="POST" action="{{ route('create_process') }}" aria-label="{{ __('Create Process') }}">
    @csrf

    <div class="form-group row">
        <label for="pr-name" class="col-md-5 col-form-label text-md-right">{{ __('Название процесса') }}</label>

        <div class="col-md-6">
            <input id="pr-name" type="text" class="form-control" name="pr_name">
        </div>
    </div>

    <div class="form-group row">
        <label for="pr-active" class="col-md-5 col-form-label text-md-right">{{ __('Блокировка/активация процесса') }}</label>
        <div class="col-md-6">
            <select class="form-control" id="pr-active" name="pr_active">
                <option></option>
                <option value="0">Нет</option>
                <option value="1">Да</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="pr-type" class="col-md-5 col-form-label text-md-right">{{ __('Тип процесса') }}</label>

        <div class="col-md-6">
            <input id="pr-type" type="text" class="form-control" name="pr_type">
        </div>
    </div>

    <div class="form-group row">
        <label for="pr-options" class="col-md-5 col-form-label text-md-right">{{ __('Опциональные параметры') }}</label>

        <div class="col-md-6">
            <input id="pr-options" type="text" class="form-control" name="pr_options">
        </div>
    </div>

    <div class="form-group row">
        <label for="pr-notice" class="col-md-5 col-form-label text-md-right">{{ __('Примечание') }}</label>
        <div class="col-md-6">
            <textarea class="form-control" id="pr_notice" rows="3" id="m-notice" name="pr_notice">
            </textarea>
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
