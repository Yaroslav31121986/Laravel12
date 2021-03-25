
<form method="POST" action="{{ route('create_stage') }}" aria-label="{{ __('Create Stage') }}">
    @csrf
    <div class="form-group row">
        <label for="st-abbr" class="col-md-5 col-form-label text-md-right">{{ __('Название процесса') }}</label>

        <div class="col-md-6">
            <input id="st-abbr" type="text" class="form-control" name="st_abbr">
        </div>
    </div>

    <div class="form-group row">
        <label for="st-options" class="col-md-5 col-form-label text-md-right">{{ __('Опции процесса') }}</label>

        <div class="col-md-6">
            <input id="st-options" type="text" class="form-control" name="st_options">
        </div>
    </div>

    <div class="form-group row">
        <label for="st-notice" class="col-md-5 col-form-label text-md-right">{{ __('Примечание процесса') }}</label>

        <div class="col-md-6">
            <input id="st-notice" type="text" class="form-control" name="st_notice">
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
